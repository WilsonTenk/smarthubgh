<?php get_header(); ?>

<div class="bg-brand-light dark:bg-brand-navy min-h-screen transition-colors duration-300">

    <!-- Header -->
    <div class="bg-brand-navy text-white pt-32 md:pt-40 pb-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-x-12"
                style="animation-fill-mode: forwards;">
                <h1 class="font-display text-5xl md:text-8xl uppercase mb-6 tracking-tighter leading-none">Our <span
                        class="text-brand-green">Projects</span></h1>
                <p class="text-base md:text-xl text-gray-400 max-w-2xl font-medium leading-relaxed">
                    Successfully implemented high-impact projects across Ghana. Explore our journey of impact below.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-10">

            <?php
            if (have_posts()):
                $i = 0;
                while (have_posts()):
                    the_post();
                    $sponsor = get_post_meta(get_the_ID(), 'sponsor', true) ?: 'Sponsor';
                    $period = get_post_meta(get_the_ID(), 'period', true) ?: '2023';
                    $reach = get_post_meta(get_the_ID(), 'reach', true) ?: 'Impact';
                    $delay = $i * 0.1;
                    ?>

                    <div class="h-full opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-y-12"
                        style="animation-fill-mode: forwards; animation-delay: <?php echo $delay; ?>s;">
                        <div
                            class="group bg-white dark:bg-slate-900 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-white/5 flex flex-col h-full">
                            <div class="relative overflow-hidden h-52 md:h-64">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-105']);
                                } else { ?>
                                    <div class="w-full h-full bg-slate-200 dark:bg-slate-800"></div>
                                <?php } ?>
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="bg-brand-blue text-white text-[9px] md:text-[10px] font-black uppercase tracking-widest px-4 py-2 rounded-lg shadow-lg">
                                        <?php echo esc_html($sponsor); ?>
                                    </span>
                                </div>
                            </div>

                            <div class="p-8 md:p-10 flex flex-col flex-grow">
                                <h3
                                    class="font-black text-xl md:text-2xl text-brand-navy dark:text-white mb-4 leading-tight uppercase tracking-tight line-clamp-2">
                                    <?php the_title(); ?>
                                </h3>
                                <div class="flex flex-wrap gap-3 mb-6">
                                    <div
                                        class="flex items-center gap-2 text-[9px] md:text-[10px] font-black text-gray-500 dark:text-slate-400 uppercase tracking-widest bg-gray-50 dark:bg-white/5 px-3 py-1.5 rounded-full transition-colors">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="text-brand-green">
                                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                            <line x1="16" x2="16" y1="2" y2="6" />
                                            <line x1="8" x2="8" y1="2" y2="6" />
                                            <line x1="3" x2="21" y1="10" y2="10" />
                                        </svg>
                                        <span>
                                            <?php echo esc_html($period); ?>
                                        </span>
                                    </div>
                                    <div
                                        class="flex items-center gap-2 text-[9px] md:text-[10px] font-black text-gray-500 dark:text-slate-400 uppercase tracking-widest bg-gray-50 dark:bg-white/5 px-3 py-1.5 rounded-full transition-colors">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="text-brand-green">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        </svg>
                                        <span>
                                            <?php echo esc_html($reach); ?>
                                        </span>
                                    </div>
                                </div>
                                <div
                                    class="text-gray-500 dark:text-slate-400 text-sm md:text-lg leading-relaxed font-medium mb-8 line-clamp-3 flex-grow transition-colors">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>"
                                    class="inline-flex items-center gap-2 text-brand-blue font-black text-xs md:text-sm uppercase tracking-widest hover:text-brand-navy dark:hover:text-white transition-colors mt-auto">
                                    View Details <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="5" x2="19" y1="12" y2="12" />
                                        <polyline points="12 5 19 12 12 19" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                endwhile;
            else:
                echo '<p class="text-center col-span-2 text-slate-500">No projects found.</p>';
            endif;
            ?>

        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(3rem);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<?php get_footer(); ?>