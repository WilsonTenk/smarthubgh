<?php
/**
 * Template Name: Home
 * 
 * @package PulseView
 */

get_header();
?>

<div class="bg-white">
    <!-- Hero Headline Section -->
    <section class="max-w-7xl mx-auto px-4 pt-8 md:pt-12 pb-6 md:pb-8 border-b-2 border-black mb-6 md:mb-8"
        aria-label="Masthead">
        <h1
            class="text-4xl md:text-6xl lg:text-8xl font-serif font-bold text-center tracking-tighter leading-none mb-4 md:mb-6">
            The <span class="text-red-600">Pulse</span> of Today
        </h1>
        <div
            class="flex flex-col md:flex-row justify-between items-center gap-2 text-[9px] md:text-[10px] font-black uppercase tracking-widest text-gray-400">
            <span class="text-center md:text-left">PulseView Digital Edition • Global</span>
            <span class="hidden md:block">Issue No. <?php echo date('W'); ?> • <?php echo date('F j, Y'); ?></span>
            <div class="flex gap-4">
                <span class="text-red-600 animate-pulse">Live Feed</span>
                <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>"
                    class="text-black hover:text-red-600 transition-colors">Digital Archives</a>
            </div>
        </div>
    </section>

    <!-- Breaking News Ticker -->
    <section class="max-w-7xl mx-auto px-4 mb-6 md:mb-8" aria-label="Breaking News">
        <div
            class="bg-red-50 border border-red-100 p-2 md:p-3 rounded-2xl flex items-center gap-4 overflow-hidden relative">
            <span
                class="bg-red-600 text-white text-[8px] md:text-[10px] font-black uppercase tracking-[0.2em] px-2 md:px-3 py-1 rounded-lg shrink-0 z-10 shadow-sm">Breaking</span>
            <div class="flex overflow-hidden">
                <div class="animate-marquee flex gap-8 md:gap-12 whitespace-nowrap">
                    <?php
                    $breaking_query = new WP_Query([
                        'posts_per_page' => 5,
                        'tag' => 'breaking' // Assuming 'breaking' tag
                    ]);

                    // Fallback if no breaking tag
                    if (!$breaking_query->have_posts()) {
                        $breaking_query = new WP_Query(['posts_per_page' => 5]);
                    }

                    if ($breaking_query->have_posts()):
                        while ($breaking_query->have_posts()):
                            $breaking_query->the_post();
                            ?>
                            <a href="<?php the_permalink(); ?>"
                                class="text-xs md:text-sm font-bold text-red-900 hover:text-red-600 transition-colors flex items-center gap-2">
                                <span class="w-1 h-1 bg-red-600 rounded-full"></span>
                                <?php the_title(); ?>
                            </a>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Complex Grid -->
    <section class="max-w-7xl mx-auto px-4 mb-16 md:mb-24">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

            <div class="lg:col-span-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-12">
                    <div class="md:col-span-2">
                        <?php
                        // FEATURED POST
                        $featured_query = new WP_Query([
                            'posts_per_page' => 1,
                            // 'tag' => 'featured' // Uncomment if using 'featured' tag
                            'ignore_sticky_posts' => 1
                        ]);
                        $featured_id = 0;

                        if ($featured_query->have_posts()):
                            while ($featured_query->have_posts()):
                                $featured_query->the_post();
                                $featured_id = get_the_ID();
                                get_template_part('template-parts/content', 'card', ['variant' => 'hero']);
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>

                    <?php
                    // MEDIUM POSTS (4 posts, exclude featured)
                    $medium_query = new WP_Query([
                        'posts_per_page' => 4,
                        'post__not_in' => [$featured_id]
                    ]);

                    if ($medium_query->have_posts()):
                        while ($medium_query->have_posts()):
                            $medium_query->the_post();
                            get_template_part('template-parts/content', 'card', ['variant' => 'medium']);
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                    <!-- Mobile Editor Note -->
                    <div
                        class="md:col-span-2 p-6 md:p-10 bg-gray-50 rounded-[2rem] border-l-4 md:border-l-8 border-red-600 relative overflow-hidden">
                        <div
                            class="absolute top-0 right-0 p-4 md:p-8 text-6xl md:text-8xl font-serif text-gray-100 select-none">
                            “</div>
                        <h4 class="text-[10px] font-black uppercase tracking-widest text-red-600 mb-4 md:mb-6">The
                            Editorial View</h4>
                        <p class="text-lg md:text-2xl font-serif italic text-gray-800 leading-relaxed relative z-10">
                            "Our journalism is built on the principle that complexity shouldn't be sacrificed for
                            speed."
                        </p>
                        <div class="mt-6 md:mt-8 flex items-center gap-3 md:gap-4">
                            <!-- Static author for UI match -->
                            <div
                                class="w-8 h-8 md:w-10 md:h-10 rounded-full border-2 border-white shadow-sm bg-gray-300">
                            </div>
                            <p class="text-[9px] md:text-xs font-black text-gray-400 uppercase tracking-widest">— Alex
                                Young, PulseView</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <aside class="lg:col-span-4 flex flex-col gap-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-8">
                    <!-- Sports Widget (Static Mock) -->
                    <div class="relative bg-black rounded-3xl overflow-hidden text-white p-6 shadow-2xl">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-red-600/30 blur-3xl rounded-full pointer-events-none">
                        </div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-8">
                                <h3
                                    class="text-[10px] font-black uppercase tracking-[0.2em] text-red-500 flex items-center gap-2">
                                    Sports Pulse <span class="w-1.5 h-1.5 bg-red-500 rounded-full animate-pulse"></span>
                                </h3>
                            </div>
                            <div class="space-y-6">
                                <div class="bg-white/10 p-4 rounded-2xl border border-white/5">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">NBA
                                            • Final</span>
                                        <span class="text-[10px] font-bold text-red-500">Live</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center gap-3"><span class="font-bold text-lg">LAL</span>
                                        </div>
                                        <span class="text-sm font-mono text-gray-500">112 - 108</span>
                                        <div class="flex items-center gap-3"><span class="font-bold text-lg">GSW</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- More fake matches could go here... -->
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <!-- Market Widget (Static Mock) -->
                        <div class="bg-gray-50 p-6 rounded-3xl border border-gray-100 shadow-sm">
                            <h3
                                class="text-[10px] font-black uppercase tracking-[0.2em] text-red-600 mb-6 flex items-center justify-between">
                                Pulse Markets <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            </h3>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center text-xs">
                                    <span class="font-bold text-gray-700">S&P 500</span>
                                    <div class="text-right">
                                        <div class="font-mono font-bold text-[11px]">5,123.32</div>
                                        <div class="text-[9px] font-black text-green-600">+0.45%</div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center text-xs">
                                    <span class="font-bold text-gray-700">NASDAQ</span>
                                    <div class="text-right">
                                        <div class="font-mono font-bold text-[11px]">16,274.94</div>
                                        <div class="text-[9px] font-black text-green-600">+1.12%</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pulse 10 / Trending Sidebar -->
                        <div class="bg-black text-white p-6 md:p-8 rounded-[2rem] shadow-2xl">
                            <h3
                                class="text-[10px] font-black uppercase tracking-[0.2em] text-red-500 mb-8 pb-4 border-b border-white/10">
                                The Pulse 10</h3>
                            <div class="space-y-6">
                                <?php
                                // Top 5 Trending (Using Most Commented or just Recent for now)
                                $trending_query = new WP_Query([
                                    'posts_per_page' => 5,
                                    'orderby' => 'comment_count',
                                    'order' => 'DESC'
                                ]);

                                if ($trending_query->have_posts()):
                                    $idx = 1;
                                    while ($trending_query->have_posts()):
                                        $trending_query->the_post();
                                        ?>
                                        <a href="<?php the_permalink(); ?>" class="flex gap-4 group">
                                            <span
                                                class="text-xl md:text-2xl font-black text-white/10 group-hover:text-red-600 transition-colors select-none"><?php echo $idx++; ?></span>
                                            <div>
                                                <h4
                                                    class="text-xs font-bold leading-tight group-hover:text-red-400 transition-colors line-clamp-2">
                                                    <?php the_title(); ?></h4>
                                                <span
                                                    class="text-[8px] text-gray-500 font-black uppercase mt-1 block tracking-widest"><?php $c = get_the_category();
                                                    echo !empty($c) ? esc_html($c[0]->name) : 'News'; ?></span>
                                            </div>
                                        </a>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-8">
                    <!-- Currency and Crypto Widgets (Static Mocks) -->
                    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
                        <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-4">FX Rates</h3>
                        <div class="flex justify-between font-mono text-xs font-bold"><span
                                class="text-gray-900">EUR/USD</span><span class="text-gray-600">1.0842</span></div>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <!-- TOP 10 RANKING SECTION -->
    <section class="bg-[#050505] text-white py-16 md:py-32 overflow-hidden border-y border-white/5">
        <div class="max-w-7xl mx-auto px-4">
            <div
                class="flex flex-col md:flex-row items-baseline gap-4 mb-12 md:mb-20 border-b border-white/10 pb-8 md:pb-12">
                <h2
                    class="text-[18vw] md:text-[8vw] font-black tracking-tighter leading-none italic text-red-600 select-none">
                    TOP 10</h2>
                <div class="md:max-w-md">
                    <p class="text-sm md:text-xl font-black uppercase tracking-widest mb-2">The Digital Ranking</p>
                    <p class="text-gray-500 text-xs md:text-sm leading-relaxed">Our editors curated list of the ten most
                        important things happening in the world right now.</p>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12">
                <?php
                $top10_query = new WP_Query([
                    'posts_per_page' => 10,
                    'tag' => 'top-10' // Assuming tag
                ]);

                if (!$top10_query->have_posts()) {
                    $top10_query = new WP_Query(['posts_per_page' => 10, 'offset' => 5]);
                }

                $posts = $top10_query->get_posts();

                // First 3 (Grid)
                echo '<div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">';
                for ($i = 0; $i < min(3, count($posts)); $i++) {
                    $post = $posts[$i];
                    setup_postdata($post);
                    $is_first = ($i === 0);
                    $thumb_url = get_the_post_thumbnail_url($post, 'large');
                    $cat = get_the_category($post->ID);
                    $cat_name = !empty($cat) ? $cat[0]->name : 'News';
                    ?>
                    <a href="<?php echo get_permalink($post); ?>"
                        class="group relative overflow-hidden rounded-[2rem] border border-white/10 hover:border-red-600/50 transition-all duration-500 <?php echo $is_first ? 'md:col-span-2 aspect-[21/9]' : 'aspect-square'; ?>">
                        <?php if ($thumb_url): ?>
                            <img src="<?php echo esc_url($thumb_url); ?>"
                                class="absolute inset-0 w-full h-full object-cover opacity-30 group-hover:scale-105 group-hover:opacity-60 transition-all duration-700"
                                alt="" />
                        <?php else: ?>
                            <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>
                        <div class="absolute inset-0 p-6 md:p-8 flex flex-col justify-end">
                            <span
                                class="text-[12vw] md:text-[4vw] font-serif italic text-red-600 leading-none mb-2 md:mb-4 group-hover:translate-x-4 transition-transform duration-500">#<?php echo $i + 1; ?></span>
                            <h3
                                class="font-bold group-hover:text-red-400 transition-colors leading-tight <?php echo $is_first ? 'text-2xl md:text-5xl' : 'text-lg md:text-2xl'; ?>">
                                <?php echo get_the_title($post); ?></h3>
                            <p class="text-gray-500 text-[9px] md:text-xs uppercase tracking-[0.2em] font-black mt-4">
                                <?php echo esc_html($cat_name); ?></p>
                        </div>
                    </a>
                    <?php
                }
                echo '</div>'; // End col-span-8
                
                // Remaining 7 (List)
                echo '<div class="lg:col-span-4 space-y-4">';
                for ($i = 3; $i < min(10, count($posts)); $i++) {
                    $post = $posts[$i];
                    setup_postdata($post);
                    $cat = get_the_category($post->ID);
                    $cat_name = !empty($cat) ? $cat[0]->name : 'News';
                    ?>
                    <a href="<?php echo get_permalink($post); ?>"
                        class="group flex items-center gap-4 md:gap-6 p-4 rounded-2xl bg-white/5 border border-transparent hover:border-red-600/30 hover:bg-white/[0.07] transition-all">
                        <span
                            class="text-2xl md:text-4xl font-serif italic text-white/20 group-hover:text-red-600 transition-colors">#<?php echo $i + 1; ?></span>
                        <div>
                            <h4
                                class="text-xs md:text-sm font-bold leading-snug group-hover:text-white transition-colors line-clamp-2">
                                <?php echo get_the_title($post); ?></h4>
                            <span
                                class="text-[8px] text-gray-500 font-black uppercase mt-1 block tracking-widest"><?php echo esc_html($cat_name); ?></span>
                        </div>
                    </a>
                    <?php
                }
                echo '</div>'; // End col-span-4
                
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

    <!-- Subscription Callout -->
    <section class="max-w-7xl mx-auto px-4 py-16 md:py-24">
        <div class="bg-red-600 rounded-[2.5rem] p-8 md:p-24 text-center text-white relative overflow-hidden shadow-2xl">
            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="text-4xl md:text-7xl font-serif font-bold mb-6 md:mb-8 leading-none">Join the Pulse.</h2>
                <p class="text-base md:text-xl text-red-100 mb-10 md:mb-12 font-medium">Support independent journalism
                    and unlock deep-dive reporting.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url(site_url('/newsletter')); ?>"
                        class="bg-white text-red-600 px-8 md:px-10 py-4 md:py-5 rounded-full font-black uppercase tracking-widest text-[10px] md:text-xs hover:bg-black hover:text-white transition-all shadow-xl">
                        Become a Member
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>