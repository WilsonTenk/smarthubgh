<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20 border-b border-gray-50">
                <div class="flex items-center gap-10">
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                        class="hover:opacity-80 transition-all transform hover:-rotate-1 flex items-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/pulseview-logo.png" alt="PulseView"
                            class="h-10 md:h-14 w-auto object-contain">
                    </a>
                    <div class="hidden lg:flex items-center gap-6">
                        <span class="h-4 w-px bg-gray-200"></span>
                        <div
                            class="flex items-center gap-1 text-[10px] font-bold text-red-600 uppercase tracking-widest animate-pulse">
                            <span class="w-1.5 h-1.5 bg-red-600 rounded-full"></span>
                            Breaking
                        </div>
                        <?php
                        // Get latest post title for ticker
                        $latest_post = new WP_Query(array('posts_per_page' => 1));
                        if ($latest_post->have_posts()):
                            while ($latest_post->have_posts()):
                                $latest_post->the_post();
                                ?>
                                <p class="text-xs text-gray-500 font-medium truncate max-w-[300px]">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-red-600 transition-colors">
                                        <?php the_title(); ?>
                                    </a>
                                </p>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else:
                            ?>
                            <p class="text-xs text-gray-500 font-medium truncate max-w-[300px]">
                                Market volatility spikes as Fed signals higher rates...
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <button id="search-toggle"
                        class="p-2 md:p-2.5 text-gray-400 hover:text-red-600 transition-all group rounded-full hover:bg-red-50 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-5 md:w-5 group-hover:scale-110"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span class="hidden sm:inline text-[10px] font-black uppercase tracking-widest">Search</span>
                    </button>
                    <a href="<?php echo esc_url(site_url('/newsletter')); ?>"
                        class="hidden md:block text-xs font-bold uppercase tracking-widest px-8 py-3 rounded-full transition-all shadow-lg hover:shadow-red-100 bg-black text-white hover:bg-red-600">
                        Subscribe
                    </a>
                    <!-- Mobile Subscribe Button - Icon only -->
                    <a href="<?php echo esc_url(site_url('/newsletter')); ?>" class="md:hidden p-2 text-red-600"
                        aria-label="Subscribe">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Category Nav - Horizontal Scroll on Mobile -->
            <nav
                class="flex items-center justify-start md:justify-center gap-6 md:gap-8 h-12 overflow-x-auto no-scrollbar scroll-smooth">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'flex items-center gap-6 md:gap-8',
                    'items_wrap' => '<ul id="%1$s" class="%2$s h-full">%3$s</ul>',
                    'fallback_cb' => false, // Fallback to nothing if no menu assigned
                    // We'll need to use a filter in functions.php or JS to add exact classes to <a> tags if we want exact 1:1 match, 
                    // but standard WP menu classes + Tailwind global typography might suffice or be close. 
                    // To be safe and "identical", I will assume the user will set up the menu. 
                    // For now, I'll hardcode the lists if the menu is empty to ensure it looks good out of the box.
                ));

                if (!has_nav_menu('primary')):
                    $categories = get_categories(array(
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'number' => 8,
                        'hide_empty' => false // Show them even if empty so the menu isn't blank on fresh install
                    ));

                    if ($categories):
                        foreach ($categories as $cat):
                            $cat_link = get_category_link($cat->term_id);
                            ?>
                                        <a href="<?php echo esc_url($cat_link); ?>"
                                            class="text-[10px] md:text-[11px] font-bold uppercase tracking-[0.15em] whitespace-nowrap transition-colors border-b-2 py-1 shrink-0 text-gray-500 border-transparent hover:text-red-600">
                                            <?php echo esc_html($cat->name); ?>
                                        </a>
                                <?php endforeach;
                    else: ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-[10px] md:text-[11px] font-bold uppercase tracking-[0.15em] whitespace-nowrap transition-colors border-b-2 py-1 shrink-0 text-gray-500 border-transparent hover:text-red-600">Home</a>
                        <?php endif; endif; ?>
            </nav>
        </div>
    </header>