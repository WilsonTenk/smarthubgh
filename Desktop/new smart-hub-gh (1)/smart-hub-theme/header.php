<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/SMART-HUB-LOGO-ORIGINAL.png" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Navbar -->
    <nav
        class="absolute top-0 left-0 w-full z-[100] bg-white dark:bg-slate-900 border-b border-slate-100 dark:border-white/5 py-4 md:py-5 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">

                <a href="<?php echo home_url('/'); ?>" class="flex items-center gap-3 group relative z-[110]">
                    <img src="<?php echo get_template_directory_uri(); ?>/SMART-HUB-LOGO-ORIGINAL.png"
                        alt="Smart Hub Logo" class="h-16 w-auto object-contain" />
                </a>

                <div class="hidden lg:flex items-center gap-8">
                    <div class="flex items-center gap-6">
                        <?php
                        $menu_items = array(
                            'Home' => '/',
                            'About' => '/about',
                            'Projects' => '/projects',
                            'Gallery' => '/gallery',
                            'Blog' => '/blog'
                        );

                        foreach ($menu_items as $name => $path) {
                            // Determine if active
                            $active_class = (is_page(ltrim($path, '/')) || ($path === '/' && is_front_page())) ? 'text-brand-blue' : 'text-slate-500 dark:text-slate-400 hover:text-brand-navy dark:hover:text-white';
                            $line_active = (is_page(ltrim($path, '/')) || ($path === '/' && is_front_page())) ? 'w-full' : '';

                            // Allow WP Menu to override if set, otherwise fallback to static links
                            echo '<a href="' . home_url($path) . '" class="text-[11px] font-bold tracking-[0.15em] uppercase transition-all relative group py-1 ' . $active_class . '">';
                            echo $name;
                            echo '<span class="absolute bottom-0 left-0 w-0 h-0.5 transition-all duration-300 group-hover:w-full bg-brand-blue ' . $line_active . '"></span>';
                            echo '</a>';
                        }
                        ?>
                    </div>

                    <div class="flex items-center gap-4">
                        <button onclick="toggleTheme()"
                            class="p-2 rounded-xl bg-slate-50 dark:bg-white/5 text-brand-navy dark:text-white hover:bg-slate-100 dark:hover:bg-white/10 transition-colors"
                            aria-label="Toggle theme">
                            <!-- Sun/Moon Icon logic handled by JS or simple SVG -->
                            <svg id="theme-icon-sun" class="w-[18px] h-[18px] hidden dark:block"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="4" />
                                <path d="M12 2v2" />
                                <path d="M12 20v2" />
                                <path d="m4.93 4.93 1.41 1.41" />
                                <path d="m17.66 17.66 1.41 1.41" />
                                <path d="M2 12h2" />
                                <path d="M20 12h2" />
                                <path d="m6.34 17.66-1.41 1.41" />
                                <path d="m19.07 4.93-1.41 1.41" />
                            </svg>
                            <svg id="theme-icon-moon" class="w-[18px] h-[18px] block dark:hidden"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                            </svg>
                        </button>

                        <a href="<?php echo home_url('/contact'); ?>"
                            class="px-6 py-2.5 rounded-xl font-black uppercase text-[10px] tracking-[0.15em] transition-all bg-brand-navy dark:bg-white text-white dark:text-brand-navy hover:bg-brand-blue dark:hover:bg-brand-green shadow-lg active:scale-95 flex items-center gap-2">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                            </svg>
                            Donate
                        </a>
                    </div>
                </div>

                <!-- Mobile Menu Toggle -->
                <div class="lg:hidden flex items-center gap-4 relative z-[110]">
                    <button onclick="toggleTheme()" class="p-2 rounded-xl text-brand-navy dark:text-white">
                        <svg id="theme-icon-sun-mob" class="w-[20px] h-[20px] hidden dark:block"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="4" />
                            <path d="M12 2v2" />
                            <path d="M12 20v2" />
                            <path d="m4.93 4.93 1.41 1.41" />
                            <path d="m17.66 17.66 1.41 1.41" />
                            <path d="M2 12h2" />
                            <path d="M20 12h2" />
                            <path d="m6.34 17.66-1.41 1.41" />
                            <path d="m19.07 4.93-1.41 1.41" />
                        </svg>
                        <svg id="theme-icon-moon-mob" class="w-[20px] h-[20px] block dark:hidden"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                        </svg>
                    </button>
                    <button
                        onclick="document.getElementById('mobile-menu').classList.toggle('-translate-y-full'); document.getElementById('mobile-menu').classList.toggle('opacity-0');"
                        class="text-brand-navy dark:text-white p-2 hover:bg-slate-50 dark:hover:bg-white/5 rounded-lg transition-colors">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="4" x2="20" y1="12" y2="12" />
                            <line x1="4" x2="20" y1="6" y2="6" />
                            <line x1="4" x2="20" y1="18" y2="18" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu"
            class="lg:hidden fixed inset-0 bg-white dark:bg-slate-900 z-[105] transition-all duration-500 flex flex-col justify-center items-center p-8 -translate-y-full opacity-0">
            <div class="flex flex-col gap-8 text-center">
                <?php foreach ($menu_items as $name => $path):
                    $active_class = (is_page(ltrim($path, '/')) || ($path === '/' && is_front_page())) ? 'text-brand-blue' : 'text-slate-300 dark:text-slate-700 hover:text-brand-navy dark:hover:text-white';
                    ?>
                    <a href="<?php echo home_url($path); ?>"
                        class="text-4xl font-black uppercase tracking-tighter transition-all <?php echo $active_class; ?>">
                        <?php echo $name; ?>
                    </a>
                <?php endforeach; ?>

                <a href="<?php echo home_url('/contact'); ?>"
                    class="mt-6 bg-brand-navy dark:bg-white text-white dark:text-brand-navy px-10 py-4 rounded-2xl font-black uppercase text-lg tracking-widest shadow-xl flex items-center justify-center gap-3">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                    </svg> Donate Now
                </a>
            </div>
        </div>
    </nav>

    <script>
        function toggleTheme() {
            const isDark = document.documentElement.classList.contains('dark');
            if (isDark) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>