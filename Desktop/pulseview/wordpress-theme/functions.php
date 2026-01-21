<?php
/**
 * PulseView Theme Functions
 *
 * @package PulseView
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Theme Setup
 */
function pulseview_setup()
{
	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	// Let WordPress manage the document title.
	add_theme_support('title-tag');

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support('post-thumbnails');

	// Register Navigation Menus
	register_nav_menus(
		array(
			'primary' => esc_html__('Primary Menu', 'pulseview'),
			'footer' => esc_html__('Footer Menu', 'pulseview'),
		)
	);

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action('after_setup_theme', 'pulseview_setup');

/**
 * Enqueue scripts and styles.
 */
function pulseview_scripts()
{
	// Enqueue Google Fonts
	wp_enqueue_style('pulseview-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,700;1,700&display=swap', array(), null);

	// Enqueue Tailwind CSS (Script from CDN as per original site)
	// Note: Tailwind script fits better as a script than style in WP enqueuing if it's the JS-based CDN version.
	wp_enqueue_script('pulseview-tailwindcss', 'https://cdn.tailwindcss.com?plugins=typography,forms,aspect-ratio,line-clamp', array(), null, false);

	// Enqueue Main Stylesheet
	wp_enqueue_style('pulseview-style', get_stylesheet_uri(), array(), '1.0.0');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'pulseview_scripts');

/**
 * Register Widget Areas
 */
function pulseview_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'pulseview'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'pulseview'),
			'before_widget' => '<section id="%1$s" class="widget %2$s mb-8">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title text-xl font-bold mb-4">',
			'after_title' => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name' => esc_html__('Footer Widgets', 'pulseview'),
			'id' => 'footer-1',
			'description' => esc_html__('Add widgets here.', 'pulseview'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="font-bold mb-4 uppercase text-xs tracking-widest text-red-600">',
			'after_title' => '</h3>',
		)
	);
}
add_action('widgets_init', 'pulseview_widgets_init');

/**
 * Register Projects Custom Post Type
 */
function pulseview_register_projects_cpt()
{
	$labels = array(
		'name' => _x('Projects', 'Post Type General Name', 'pulseview'),
		'singular_name' => _x('Project', 'Post Type Singular Name', 'pulseview'),
		'menu_name' => __('Projects', 'pulseview'),
		'name_admin_bar' => __('Project', 'pulseview'),
		'archives' => __('Project Archives', 'pulseview'),
		'attributes' => __('Project Attributes', 'pulseview'),
		'parent_item_colon' => __('Parent Project:', 'pulseview'),
		'all_items' => __('All Projects', 'pulseview'),
		'add_new_item' => __('Add New Project', 'pulseview'),
		'add_new' => __('Add New', 'pulseview'),
		'new_item' => __('New Project', 'pulseview'),
		'edit_item' => __('Edit Project', 'pulseview'),
		'update_item' => __('Update Project', 'pulseview'),
		'view_item' => __('View Project', 'pulseview'),
		'view_items' => __('View Projects', 'pulseview'),
		'search_items' => __('Search Projects', 'pulseview'),
		'not_found' => __('Not found', 'pulseview'),
		'not_found_in_trash' => __('Not found in Trash', 'pulseview'),
		'featured_image' => __('Project Image', 'pulseview'),
		'set_featured_image' => __('Set project image', 'pulseview'),
		'remove_featured_image' => __('Remove project image', 'pulseview'),
		'use_featured_image' => __('Use as project image', 'pulseview'),
		'insert_into_item' => __('Insert into project', 'pulseview'),
		'uploaded_to_this_item' => __('Uploaded to this project', 'pulseview'),
		'items_list' => __('Projects list', 'pulseview'),
		'items_list_navigation' => __('Projects list navigation', 'pulseview'),
		'filter_items_list' => __('Filter projects list', 'pulseview'),
	);
	$args = array(
		'label' => __('Project', 'pulseview'),
		'description' => __('Portfolio Projects', 'pulseview'),
		'labels' => $labels,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
		'taxonomies' => array('category', 'post_tag'),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-portfolio',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'show_in_rest' => true, // Enable Gutenberg
	);
	register_post_type('project', $args);
}
add_action('init', 'pulseview_register_projects_cpt', 0);

/**
 * Add Custom Fields for Projects (Meta Boxes)
 */
function pulseview_add_project_meta_boxes()
{
	add_meta_box(
		'pulseview_project_details',
		'Project Details',
		'pulseview_project_details_callback',
		'project',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'pulseview_add_project_meta_boxes');

function pulseview_project_details_callback($post)
{
	wp_nonce_field('pulseview_save_project_details', 'pulseview_project_details_nonce');

	$technologies = get_post_meta($post->ID, '_pulseview_technologies', true);
	$live_url = get_post_meta($post->ID, '_pulseview_live_url', true);
	$github_url = get_post_meta($post->ID, '_pulseview_github_url', true);

	?>
	<p>
		<label for="pulseview_technologies">Technologies Used (comma separated):</label><br>
		<input type="text" id="pulseview_technologies" name="pulseview_technologies"
			value="<?php echo esc_attr($technologies); ?>" class="widefat" />
	</p>
	<p>
		<label for="pulseview_live_url">Live Project URL:</label><br>
		<input type="url" id="pulseview_live_url" name="pulseview_live_url" value="<?php echo esc_attr($live_url); ?>"
			class="widefat" />
	</p>
	<p>
		<label for="pulseview_github_url">GitHub Repository URL:</label><br>
		<input type="url" id="pulseview_github_url" name="pulseview_github_url" value="<?php echo esc_attr($github_url); ?>"
			class="widefat" />
	</p>
	<?php
}

function pulseview_save_project_details($post_id)
{
	if (!isset($_POST['pulseview_project_details_nonce']) || !wp_verify_nonce($_POST['pulseview_project_details_nonce'], 'pulseview_save_project_details')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (isset($_POST['pulseview_technologies'])) {
		update_post_meta($post_id, '_pulseview_technologies', sanitize_text_field($_POST['pulseview_technologies']));
	}

	if (isset($_POST['pulseview_live_url'])) {
		update_post_meta($post_id, '_pulseview_live_url', esc_url_raw($_POST['pulseview_live_url']));
	}

	if (isset($_POST['pulseview_github_url'])) {
		update_post_meta($post_id, '_pulseview_github_url', esc_url_raw($_POST['pulseview_github_url']));
	}
}
add_action('save_post', 'pulseview_save_project_details');

/**
 * Filter to add Tailwind classes to the body
 */
function pulseview_body_classes($classes)
{
	$classes[] = 'bg-white text-[#1a1a1a] font-sans antialiased';
	return $classes;
}
add_filter('body_class', 'pulseview_body_classes');

/**
 * Recommend Plugins
 */
function pulseview_recommend_plugins()
{
	if (!class_exists('WPCF7') && current_user_can('install_plugins')) {
		echo '<div class="notice notice-info is-dismissible">
            <p>' . esc_html__('The PulseView theme recommends installing <strong>Contact Form 7</strong> to enable the contact form functionality.', 'pulseview') . '</p>
        </div>';
	}

	// Recommend Classic Editor
	// We check if the class exists or if the function is active. 
	// Note: is_plugin_active is not always available without including plugin.php, so using class check is safer if the plugin defines one exposed, 
	// or we just rely on the user knowing. But let's try a simple recommendation.
	if (!function_exists('classic_editor_init') && !class_exists('Classic_Editor') && current_user_can('install_plugins')) {
		echo '<div class="notice notice-info is-dismissible">
            <p>' . esc_html__('The PulseView theme requires the <strong>Classic Editor</strong> plugin for the best writing experience and formatting control.', 'pulseview') . '</p>
        </div>';
	}

	// Recommend RankMath SEO
	if (!defined('RANK_MATH_VERSION') && current_user_can('install_plugins')) {
		echo '<div class="notice notice-info is-dismissible">
            <p>' . esc_html__('The PulseView theme recommends <strong>RankMath SEO</strong> for optimal search engine performance.', 'pulseview') . '</p>
        </div>';
	}
}
add_action('admin_notices', 'pulseview_recommend_plugins');


// Include Shortcodes for Elementor/Editor Compatibility
require_once get_template_directory() . '/inc/shortcodes.php';

/**
 * Create Default Content on Theme Activation
 */
function pulseview_create_dummy_content()
{
	// 1. Create Categories
	$categories = array(
		'Politics',
		'Business',
		'Tech',
		'Health',
		'Sports',
		'Opinion',
		'How To',
		'Top 10',
		'Global Health',
		'Tech Pulse'
	);

	foreach ($categories as $cat) {
		if (!term_exists($cat, 'category')) {
			wp_insert_term($cat, 'category');
		}
	}

	// 2. Create Pages
	$pages = array(
		'Home' => array(
			'slug' => 'home',
			'title' => 'Home',
			'template' => 'template-home.php',
			// We keep the template assigned, but the template itself will now render the_content()
			'content' => "<!-- wp:shortcode -->[pulseview_home_hero]<!-- /wp:shortcode -->\n<!-- wp:shortcode -->[pulseview_breaking_news]<!-- /wp:shortcode -->\n<!-- wp:shortcode -->[pulseview_home_grid]<!-- /wp:shortcode -->\n<!-- wp:shortcode -->[pulseview_top_10]<!-- /wp:shortcode -->\n<!-- wp:shortcode -->[pulseview_subs_cta]<!-- /wp:shortcode -->"
		),
		'Contact' => array(
			'slug' => 'contact',
			'title' => 'Contact',
			'template' => 'template-contact.php',
			'content' => 'Get in touch with PulseView.'
		),
		'About Us' => array(
			'slug' => 'about-us',
			'title' => 'About Us',
			'template' => 'template-about.php',
			'content' => 'About PulseView Media.'
		),
		'Pulse Jobs' => array(
			'slug' => 'pulse-jobs',
			'title' => 'Pulse Jobs',
			'template' => 'template-jobs.php',
			'content' => "<!-- wp:shortcode -->[pulseview_jobs_board]<!-- /wp:shortcode -->"
		),
		'The Dispatch' => array(
			'slug' => 'newsletter',
			'title' => 'The Dispatch',
			'template' => '', // Default
			'content' => 'Subscribe to our high-fidelity daily briefing.'
		)
	);

	foreach ($pages as $key => $page) {
		$existing_page = get_page_by_path($page['slug']);
		if (!$existing_page) {
			$page_args = array(
				'post_type' => 'page',
				'post_title' => $page['title'],
				'post_content' => $page['content'],
				'post_status' => 'publish',
				'post_author' => 1,
			);

			$page_id = wp_insert_post($page_args);

			if ($page_id && !is_wp_error($page_id)) {
				if (!empty($page['template'])) {
					update_post_meta($page_id, '_wp_page_template', $page['template']);
				}

				// If it's the Home page, set it as Front Page
				if ($key === 'Home') {
					update_option('show_on_front', 'page');
					update_option('page_on_front', $page_id);
				}
			}
		}
	}
}
add_action('after_switch_theme', 'pulseview_create_dummy_content');


