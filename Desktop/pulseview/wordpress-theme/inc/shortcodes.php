<?php
/**
 * PulseView Theme Shortcodes
 * 
 * Extracts complex logic from templates to make them compatible with Elementor/Gutenberg.
 */

/**
 * [pulseview_home_hero]
 */
function pulseview_sc_home_hero()
{
    ob_start();
    ?>
    <section class="max-w-7xl mx-auto px-4 pt-8 md:pt-12 pb-6 md:pb-8 border-b-2 border-black mb-6 md:mb-8"
        aria-label="Masthead">
        <h1
            class="text-4xl md:text-6xl lg:text-8xl font-serif font-bold text-center tracking-tighter leading-none mb-4 md:mb-6">
            The <span class="text-red-600">Pulse</span> of Today
        </h1>
        <div
            class="flex flex-col md:flex-row justify-between items-center gap-2 text-[9px] md:text-[10px] font-black uppercase tracking-widest text-gray-400">
            <span class="text-center md:text-left">PulseView Digital Edition • Global</span>
            <span class="hidden md:block">Issue No.
                <?php echo date('W'); ?> •
                <?php echo date('F j, Y'); ?>
            </span>
            <div class="flex gap-4">
                <span class="text-red-600 animate-pulse">Live Feed</span>
                <a href="<?php echo home_url('/archives'); ?>"
                    class="text-black hover:text-red-600 transition-colors">Digital Archives</a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('pulseview_home_hero', 'pulseview_sc_home_hero');

/**
 * [pulseview_breaking_news]
 */
function pulseview_sc_breaking_news()
{
    ob_start();
    ?>
    <section class="max-w-7xl mx-auto px-4 mb-6 md:mb-8" aria-label="Breaking News">
        <div
            class="bg-red-50 border border-red-100 p-2 md:p-3 rounded-2xl flex items-center gap-4 overflow-hidden relative">
            <span
                class="bg-red-600 text-white text-[8px] md:text-[10px] font-black uppercase tracking-[0.2em] px-2 md:px-3 py-1 rounded-lg shrink-0 z-10 shadow-sm">Breaking</span>
            <div class="flex overflow-hidden w-full">
                <div class="animate-marquee flex gap-8 md:gap-12 whitespace-nowrap">
                    <?php
                    $breaking_query = new WP_Query(array('posts_per_page' => 5, 'category_name' => 'breaking'));
                    if (!$breaking_query->have_posts()) {
                        $breaking_query = new WP_Query(array('posts_per_page' => 5));
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
    <?php
    return ob_get_clean();
}
add_shortcode('pulseview_breaking_news', 'pulseview_sc_breaking_news');

/**
 * [pulseview_home_grid]
 */
function pulseview_sc_home_grid()
{
    ob_start();
    ?>
    <section class="max-w-7xl mx-auto px-4 mb-16 md:mb-24">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

            <!-- Main Content Area (8 Cols) -->
            <div class="lg:col-span-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-12">

                    <!-- Featured Post -->
                    <div class="md:col-span-2">
                        <?php
                        $featured_query = new WP_Query(array(
                            'posts_per_page' => 1,
                            'meta_key' => 'is_featured',
                            'meta_value' => '1'
                        ));
                        if (!$featured_query->have_posts()) {
                            $featured_query = new WP_Query(array('posts_per_page' => 1));
                        }
                        global $pulseview_exclude_ids;
                        $pulseview_exclude_ids = array();

                        if ($featured_query->have_posts()):
                            while ($featured_query->have_posts()):
                                $featured_query->the_post();
                                get_template_part('template-parts/content', 'card', array('variant' => 'hero'));
                                $pulseview_exclude_ids[] = get_the_ID();
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>

                    <!-- Medium Article Grid -->
                    <?php
                    $grid_query = new WP_Query(array(
                        'posts_per_page' => 4,
                        'post__not_in' => $pulseview_exclude_ids,
                        'ignore_sticky_posts' => 1
                    ));

                    if ($grid_query->have_posts()):
                        while ($grid_query->have_posts()):
                            $grid_query->the_post();
                            get_template_part('template-parts/content', 'card', array('variant' => 'medium'));
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
                        <h4 class="text-[10px] font-black uppercase tracking-widest text-red-600 mb-4 md:mb-6">The Editorial
                            View</h4>
                        <p class="text-lg md:text-2xl font-serif italic text-gray-800 leading-relaxed relative z-10">
                            "Our journalism is built on the principle that complexity shouldn't be sacrificed for speed."
                        </p>
                        <div class="mt-6 md:mt-8 flex items-center gap-3 md:gap-4">
                            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-gray-300 border-2 border-white shadow-sm">
                            </div>
                            <p class="text-[9px] md:text-xs font-black text-gray-400 uppercase tracking-widest">— Alex
                                Young, PulseView</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar (4 Cols) -->
            <aside class="lg:col-span-4 flex flex-col gap-10">
                <!-- Widget Area for Sidebar if needed -->
                <?php if (is_active_sidebar('home_sidebar')): ?>
                    <?php dynamic_sidebar('home_sidebar'); ?>
                <?php else: ?>
                    <!-- Default Static Widgets -->
                    <div
                        class="bg-[#0a0a0a] text-white rounded-[2rem] overflow-hidden shadow-2xl border border-white/5 font-sans p-6 min-h-[300px] flex flex-col justify-center items-center">
                        <div class="w-8 h-8 border-2 border-red-600/20 border-t-red-600 rounded-full animate-spin mb-4"></div>
                        <span class="text-[9px] font-black text-gray-600 uppercase tracking-widest animate-pulse">Syncing
                            Globals...</span>
                        <p class="text-[10px] text-gray-500 mt-2 text-center">Sports Widget requires backend configuration</p>
                    </div>

                    <div class="space-y-8">
                        <div class="bg-gray-50 p-6 rounded-3xl border border-gray-100 shadow-sm">
                            <h3
                                class="text-[10px] font-black uppercase tracking-[0.2em] text-red-600 mb-6 flex items-center justify-between">
                                Pulse Markets <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            </h3>
                            <div class="space-y-4">
                                <?php
                                $markets = [
                                    ['n' => 'S&P 500', 'v' => '5,123.32', 'c' => '+0.45%', 'u' => true],
                                    ['n' => 'NASDAQ', 'v' => '16,274.94', 'c' => '+1.12%', 'u' => true],
                                    ['n' => 'BTC / USD', 'v' => '68,432.10', 'c' => '-2.34%', 'u' => false],
                                ];
                                foreach ($markets as $item): ?>
                                    <div class="flex justify-between items-center text-xs">
                                        <span class="font-bold text-gray-700">
                                            <?php echo $item['n']; ?>
                                        </span>
                                        <div class="text-right">
                                            <div class="font-mono font-bold text-[11px]">
                                                <?php echo $item['v']; ?>
                                            </div>
                                            <div
                                                class="text-[9px] font-black <?php echo $item['u'] ? 'text-green-600' : 'text-red-600'; ?>">
                                                <?php echo $item['c']; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Popular Posts -->
                        <div class="bg-black text-white p-6 md:p-8 rounded-[2rem] shadow-2xl">
                            <h3
                                class="text-[10px] font-black uppercase tracking-[0.2em] text-red-500 mb-8 pb-4 border-b border-white/10">
                                The Pulse 10</h3>
                            <div class="space-y-6">
                                <?php
                                $popular_query = new WP_Query(array('posts_per_page' => 5, 'orderby' => 'comment_count'));
                                $idx = 1;
                                if ($popular_query->have_posts()):
                                    while ($popular_query->have_posts()):
                                        $popular_query->the_post();
                                        ?>
                                        <a href="<?php the_permalink(); ?>" class="flex gap-4 group">
                                            <span
                                                class="text-xl md:text-2xl font-black text-white/10 group-hover:text-red-600 transition-colors select-none">
                                                <?php echo $idx++; ?>
                                            </span>
                                            <div>
                                                <h4
                                                    class="text-xs font-bold leading-tight group-hover:text-red-400 transition-colors line-clamp-2">
                                                    <?php the_title(); ?>
                                                </h4>
                                                <span class="text-[8px] text-gray-500 font-black uppercase mt-1 block tracking-widest">
                                                    <?php $cats = get_the_category();
                                                    echo !empty($cats) ? $cats[0]->name : 'News'; ?>
                                                </span>
                                            </div>
                                        </a>
                                    <?php endwhile;
                                    wp_reset_postdata(); endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </aside>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('pulseview_home_grid', 'pulseview_sc_home_grid');

/**
 * [pulseview_top_10]
 */
function pulseview_sc_top_10()
{
    ob_start();
    ?>
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
                <div class="lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                    <?php
                    $top_grid_query = new WP_Query(array('posts_per_page' => 3));
                    $idx = 1;
                    if ($top_grid_query->have_posts()):
                        while ($top_grid_query->have_posts()):
                            $top_grid_query->the_post();
                            $style_class = ($idx === 1) ? 'md:col-span-2 aspect-[21/9]' : 'aspect-square';
                            $image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=1200&q=80';
                            ?>
                            <a href="<?php the_permalink(); ?>"
                                class="group relative overflow-hidden rounded-[2rem] border border-white/10 hover:border-red-600/50 transition-all duration-500 <?php echo $style_class; ?>">
                                <img src="<?php echo esc_url($image_url); ?>"
                                    class="absolute inset-0 w-full h-full object-cover opacity-30 group-hover:scale-105 group-hover:opacity-60 transition-all duration-700"
                                    alt="" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>
                                <div class="absolute inset-0 p-6 md:p-8 flex flex-col justify-end">
                                    <span
                                        class="text-[12vw] md:text-[4vw] font-serif italic text-red-600 leading-none mb-2 md:mb-4 group-hover:translate-x-4 transition-transform duration-500">#
                                        <?php echo $idx++; ?>
                                    </span>
                                    <h3
                                        class="font-bold group-hover:text-red-400 transition-colors leading-tight <?php echo ($idx === 2) ? 'text-2xl md:text-5xl' : 'text-lg md:text-2xl'; ?>">
                                        <?php the_title(); ?>
                                    </h3>
                                    <p class="text-gray-500 text-[9px] md:text-xs uppercase tracking-[0.2em] font-black mt-4">
                                        <?php $cats = get_the_category();
                                        echo !empty($cats) ? $cats[0]->name : 'News'; ?> • 5 min
                                        read
                                    </p>
                                </div>
                            </a>
                        <?php endwhile;
                        wp_reset_postdata(); endif; ?>
                </div>
                <div class="lg:col-span-4 space-y-4">
                    <?php
                    $top_list_query = new WP_Query(array('posts_per_page' => 7, 'offset' => 3));
                    if ($top_list_query->have_posts()):
                        while ($top_list_query->have_posts()):
                            $top_list_query->the_post();
                            ?>
                            <a href="<?php the_permalink(); ?>"
                                class="group flex items-center gap-4 md:gap-6 p-4 rounded-2xl bg-white/5 border border-transparent hover:border-red-600/30 hover:bg-white/[0.07] transition-all">
                                <span
                                    class="text-2xl md:text-4xl font-serif italic text-white/20 group-hover:text-red-600 transition-colors">#
                                    <?php echo $idx++; ?>
                                </span>
                                <div>
                                    <h4
                                        class="text-xs md:text-sm font-bold leading-snug group-hover:text-white transition-colors line-clamp-2">
                                        <?php the_title(); ?>
                                    </h4>
                                    <span class="text-[8px] text-gray-500 font-black uppercase mt-1 block tracking-widest">
                                        <?php $cats = get_the_category();
                                        echo !empty($cats) ? $cats[0]->name : 'News'; ?>
                                    </span>
                                </div>
                            </a>
                        <?php endwhile;
                        wp_reset_postdata(); endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('pulseview_top_10', 'pulseview_sc_top_10');

/**
 * [pulseview_subs_cta]
 */
function pulseview_sc_subs_cta()
{
    ob_start();
    ?>
    <section class="max-w-7xl mx-auto px-4 py-16 md:py-24">
        <div class="bg-red-600 rounded-[2.5rem] p-8 md:p-24 text-center text-white relative overflow-hidden shadow-2xl">
            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="text-4xl md:text-7xl font-serif font-bold mb-6 md:mb-8 leading-none">Join the Pulse.</h2>
                <p class="text-base md:text-xl text-red-100 mb-10 md:mb-12 font-medium">Support independent journalism and
                    unlock deep-dive reporting.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo home_url('/newsletter'); ?>"
                        class="bg-white text-red-600 px-8 md:px-10 py-4 md:py-5 rounded-full font-black uppercase tracking-widest text-[10px] md:text-xs hover:bg-black hover:text-white transition-all shadow-xl">
                        Become a Member
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('pulseview_subs_cta', 'pulseview_sc_subs_cta');

/**
 * [pulseview_jobs_board]
 */
function pulseview_sc_jobs_board()
{
    ob_start();
    ?>
    <div class="min-h-screen bg-white">
        <!-- Hero -->
        <section class="bg-black text-white pt-24 pb-20 overflow-hidden relative">
            <div class="max-w-7xl mx-auto px-4 relative z-10">
                <div class="flex items-center gap-4 mb-8">
                    <span class="h-px w-12 bg-red-600"></span>
                    <span class="text-[10px] font-black uppercase tracking-[0.4em] text-red-500">Careers at PulseView</span>
                </div>
                <h1 class="text-6xl md:text-8xl font-serif font-bold mb-10 tracking-tighter">
                    Join the <span class="text-red-600 italic underline decoration-white/20">Movement</span>.
                </h1>
                <p class="max-w-2xl text-xl text-gray-400 leading-relaxed font-medium">
                    We are building the definitive news platform for the high-fidelity era. We're looking for thinkers,
                    creators, and builders who care about the truth.
                </p>
            </div>
            <div
                class="absolute top-0 right-0 w-1/3 h-full bg-red-600/10 blur-[120px] rounded-full translate-x-1/2 -translate-y-1/2">
            </div>
        </section>

        <!-- Interface -->
        <section class="max-w-7xl mx-auto px-4 -mt-10 mb-24 relative z-20">
            <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 p-8 md:p-12">

                <!-- Controls -->
                <div class="flex flex-col lg:flex-row gap-8 items-center justify-between mb-16">
                    <div class="w-full lg:max-w-md relative group">
                        <input type="text" placeholder="Search by role or department..."
                            class="w-full bg-gray-50 border-2 border-transparent focus:border-red-600 focus:bg-white rounded-2xl px-6 py-5 text-lg font-medium transition-all outline-none" />
                        <div
                            class="absolute right-6 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-red-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 justify-center">
                        <?php
                        $filters = ['All', 'Editorial', 'Engineering', 'Product', 'Design', 'Marketing'];
                        foreach ($filters as $i => $f) {
                            $active = $i === 0 ? 'bg-red-600 text-white shadow-lg' : 'bg-gray-100 text-gray-500 hover:bg-gray-200';
                            echo "<button class='px-6 py-3 rounded-full text-xs font-bold uppercase tracking-widest transition-all {$active}'>{$f}</button>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Job List -->
                <div class="space-y-4">
                    <?php
                    $jobs = [
                        ['title' => 'Senior Political Editor', 'dept' => 'Editorial', 'loc' => 'London/Remote', 'type' => 'Full-time', 'posted' => '2d ago', 'salary' => '$85k - $110k'],
                        ['title' => 'Full Stack Engineer (React/Next)', 'dept' => 'Engineering', 'loc' => 'Remote', 'type' => 'Full-time', 'posted' => '3d ago', 'salary' => '$120k - $160k']
                    ];
                    foreach ($jobs as $job):
                        ?>
                        <div
                            class="group p-8 rounded-3xl border border-gray-100 hover:border-red-200 hover:bg-red-50/30 transition-all flex flex-col md:flex-row md:items-center justify-between gap-8">
                            <div class="flex-grow">
                                <div class="flex items-center gap-3 mb-2">
                                    <span
                                        class="px-3 py-1 bg-red-100 text-red-600 text-[9px] font-black uppercase tracking-widest rounded-full">
                                        <?php echo $job['dept']; ?>
                                    </span>
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">• Posted
                                        <?php echo $job['posted']; ?>
                                    </span>
                                </div>
                                <h3 class="text-2xl font-bold group-hover:text-red-600 transition-colors">
                                    <?php echo $job['title']; ?>
                                </h3>
                                <div class="flex flex-wrap gap-4 mt-4">
                                    <div
                                        class="flex items-center gap-2 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        <span class="text-gray-400">📍</span>
                                        <?php echo $job['loc']; ?>
                                    </div>
                                    <div
                                        class="flex items-center gap-2 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        <span class="text-gray-400">💼</span>
                                        <?php echo $job['type']; ?>
                                    </div>
                                    <div
                                        class="flex items-center gap-2 text-xs font-bold text-red-600/60 uppercase tracking-wider">
                                        <span class="text-gray-400">💰</span>
                                        <?php echo $job['salary']; ?>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="whitespace-nowrap bg-black text-white px-10 py-5 rounded-2xl font-black uppercase tracking-widest text-[11px] hover:bg-red-600 transition-all active:scale-95 shadow-lg group-hover:shadow-red-200">Apply
                                Now</button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Perks -->
        <section class="bg-gray-50 py-32">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-20">
                    <h2 class="text-4xl md:text-5xl font-serif font-bold mb-6">Why work with us?</h2>
                    <p class="text-gray-500 max-w-xl mx-auto font-medium">We invest in our people so they can invest in the
                        stories that matter.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div
                        class="bg-white p-12 rounded-[2.5rem] border border-gray-100 text-center hover:-translate-y-2 transition-transform">
                        <div class="text-5xl mb-8">🌍</div>
                        <h3 class="text-xl font-bold mb-4">Remote First</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Work from anywhere in the world. We value outcomes
                            over desk-time.</p>
                    </div>
                    <div
                        class="bg-white p-12 rounded-[2.5rem] border border-gray-100 text-center hover:-translate-y-2 transition-transform">
                        <div class="text-5xl mb-8">🧠</div>
                        <h3 class="text-xl font-bold mb-4">Health & Wellness</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Comprehensive premium health coverage and mental
                            health support.</p>
                    </div>
                    <div
                        class="bg-white p-12 rounded-[2.5rem] border border-gray-100 text-center hover:-translate-y-2 transition-transform">
                        <div class="text-5xl mb-8">📚</div>
                        <h3 class="text-xl font-bold mb-4">Learning Budget</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Annual stipend for books, courses, and conferences
                            to sharpen your pulse.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('pulseview_jobs_board', 'pulseview_sc_jobs_board');
