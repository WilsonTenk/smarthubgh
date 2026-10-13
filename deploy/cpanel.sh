#!/usr/bin/env bash
set -euo pipefail
umask 022

# cPanel runs this from the checkout when Deploy HEAD is selected.
checkout_root="$(cd -- "$(dirname -- "${BASH_SOURCE[0]}")/.." && pwd)"
build_directory="${SMART_HUB_BUILD_DIR:-$checkout_root/Desktop/new smart-hub-gh (1)/dist}"
uapi_binary="${SMART_HUB_UAPI_BIN:-/usr/local/cpanel/bin/uapi}"
account_directory="${SMART_HUB_ACCOUNT_ROOT:-$HOME}"

if [[ ! -x "$uapi_binary" || ! -f "$build_directory/index.html" || ! -f "$build_directory/.htaccess" ]]; then
  echo 'Missing cPanel API or production build; deployment stopped.' >&2
  exit 1
fi

# Ask cPanel for this exact domain's document root; never guess public_html.
domain_data="$("$uapi_binary" --output=json DomainInfo single_domain_data domain=smarthubgh.com)"
document_root="$(printf '%s' "$domain_data" | perl -MJSON::PP -e '
  my $response = decode_json(do { local $/; <STDIN> });
  my $result = $response->{result};
  die "cPanel domain lookup failed\n" unless $result->{status} == 1;
  my $data = $result->{data};
  die "Wrong domain\n" unless $data->{domain} eq "smarthubgh.com";
  print $data->{documentroot} // die "No document root\n";
')"
document_root="$(realpath -e -- "$document_root")"
account_directory="$(realpath -e -- "$account_directory")"
build_directory="$(realpath -e -- "$build_directory")"
case "$document_root" in
  "$account_directory"/*) ;;
  *) echo 'Document root is outside this cPanel account; deployment stopped.' >&2; exit 1 ;;
esac
if ! grep -q 'https://smarthubgh.com/' "$build_directory/sitemap.xml" || grep -q 'noindex' "$build_directory/index.html"; then
  echo 'This is not the indexable smarthubgh.com production build; deployment stopped.' >&2
  exit 1
fi
if [[ "$document_root" == "$build_directory" ]]; then
  find "$build_directory" -type d -exec chmod 755 -- {} +
  find "$build_directory" -type f -exec chmod 644 -- {} +
  echo 'The domain already serves the committed production build directly.'
  exit 0
fi
if [[ -f "$document_root/index.php" && ! -f "$document_root/index.html" ]]; then
  echo 'The document root currently serves PHP, so automatic static deployment is paused for review.' >&2
  exit 1
fi
if [[ -f "$document_root/index.html" ]] && ! grep -qiE 'SMART[[:space:]_-]*HUB|smarthubgh' "$document_root/index.html"; then
  echo 'The existing HTML is not identified as SMART Hub; deployment stopped for review.' >&2
  exit 1
fi

# Preserve overwritten files outside the public directory; retain other server files.
backup_parent="$account_directory/.smarthub-deploy-backups"
mkdir -p -- "$backup_parent"
chmod 700 "$backup_parent"
backup_directory="$(mktemp -d "$backup_parent/release.XXXXXXXX")"
while IFS= read -r -d '' source_file; do
  relative_path="${source_file#"$build_directory"/}"
  existing_file="$document_root/$relative_path"
  nearest_path="$existing_file"
  while [[ ! -e "$nearest_path" && ! -L "$nearest_path" ]]; do nearest_path="$(dirname -- "$nearest_path")"; done
  resolved_path="$(realpath -e -- "$nearest_path")"
  case "$resolved_path" in
    "$document_root"|"$document_root"/*) ;;
    *) echo 'A destination symlink leaves the document root; deployment stopped.' >&2; exit 1 ;;
  esac
  if [[ -f "$existing_file" ]]; then
    mkdir -p -- "$backup_directory/$(dirname -- "$relative_path")"
    cp -p -- "$existing_file" "$backup_directory/$relative_path"
  fi
done < <(find "$build_directory" -type f -print0)

# Keep existing Google verification when it was configured in the live HTML only.
verification_token=''
if [[ -f "$document_root/index.html" ]]; then
  verification_token="$(perl -0777 -ne 'if (/<meta\b(?=[^>]*\bname=["\x27]google-site-verification["\x27])[^>]*\bcontent=["\x27]([A-Za-z0-9_-]+)["\x27]/i) { print $1 }' "$document_root/index.html")"
fi

# Publish resources first, pages second, and the policy last to avoid missing bundles.
chmod 755 -- "$document_root"
for phase in resources pages policy; do
  while IFS= read -r -d '' source_file; do
    relative_path="${source_file#"$build_directory"/}"
    case "$phase:$relative_path" in
      resources:*.html|resources:.htaccess|pages:.htaccess) continue ;;
      pages:*.html|policy:.htaccess) ;;
      pages:*|policy:*) continue ;;
    esac
    destination="$document_root/$relative_path"
    destination_directory="$(dirname -- "$destination")"
    mkdir -p -- "$destination_directory"
    # Repair existing private directory modes as well as newly created folders.
    while [[ "$destination_directory" != "$document_root" ]]; do
      chmod 755 -- "$destination_directory"
      destination_directory="$(dirname -- "$destination_directory")"
    done
    cp -- "$source_file" "$destination"
    if [[ "$phase" == pages && -n "$verification_token" ]] && ! grep -qi 'name="google-site-verification"' "$destination"; then
      SMART_HUB_VERIFY_TOKEN="$verification_token" perl -0777 -i -pe 's/<head>/<head>\n<meta name="google-site-verification" content="$ENV{SMART_HUB_VERIFY_TOKEN}">/i' "$destination"
    fi
    chmod 644 -- "$destination"
  done < <(find "$build_directory" -type f -print0)
done
echo "Deployed smarthubgh.com. Previous overwritten files: $backup_directory"
