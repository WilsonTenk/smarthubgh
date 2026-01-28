<?php get_header(); ?>

<div class="bg-brand-light dark:bg-brand-navy min-h-screen transition-colors duration-300">
    <div class="bg-brand-navy text-white pt-32 md:pt-40 pb-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-x-12"
                style="animation-fill-mode: forwards;">
                <h1 class="text-5xl md:text-8xl font-black uppercase mb-6 tracking-tighter">News & <span
                        class="text-brand-green">Updates</span></h1>
                <p class="text-base md:text-xl text-gray-400 max-w-2xl font-medium leading-relaxed">
                    Stories, insights, and updates from the field.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
            <?php if (have_posts()):
                $i = 0;
                while (have_posts()):
                    the_post();
                    $delay = $i * 0.1;
                    $author_name = get_the_author();
                    $post_date = get_the_date('M d, Y');
                    $categories = get_the_category();
                    $cat_name = !empty($categories) ? $categories[0]->name : 'Uncategorized';
                    ?>
                    <div class="opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-y-12"
                        style="animation-fill-mode: forwards; animation-delay: <?php echo $delay; ?>s;">
                        <div
                            class="bg-white dark:bg-slate-900 rounded-3xl overflow-hidden border border-gray-100 dark:border-white/5 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col h-full">
                            <div class="h-56 overflow-hidden relative">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover transition-transform duration-700 hover:scale-110']);
                                } else { ?>
                                    <div class="w-full h-full bg-slate-200 dark:bg-slate-800"></div>
                                <?php } ?>
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="bg-brand-green text-white text-[10px] font-black uppercase tracking-widest px-4 py-2 rounded-lg shadow-sm">
                                        <?php echo esc_html($cat_name); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="p-8 flex flex-col flex-grow">
                                <div
                                    class="flex items-center gap-4 text-[10px] font-black text-gray-400 dark:text-slate-500 uppercase tracking-widest mb-4 transition-colors">
                                    <span class="flex items-center gap-1"><svg width="14" height="14" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="text-brand-green">
                                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                            <line x1="16" x2="16" y1="2" y2="6" />
                                            <line x1="8" x2="8" y1="2" y2="6" />
                                            <line x1="3" x2="21" y1="10" y2="10" />
                                        </svg>
                                        <?php echo $post_date; ?>
                                    </span>
                                    <span class="flex items-center gap-1"><svg width="14" height="14" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="text-brand-green">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </svg>
                                        <?php echo $author_name; ?>
                                    </span>
                                </div>
                                <h3
                                    class="text-xl md:text-2xl font-black text-brand-navy dark:text-white uppercase mb-4 tracking-tight line-clamp-2 flex-grow hover:text-brand-blue transition-colors">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <div
                                    class="text-gray-500 dark:text-slate-400 text-sm md:text-base font-medium mb-8 line-clamp-3 leading-relaxed transition-colors">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>"
                                    class="inline-flex items-center gap-2 text-brand-blue font-black uppercase tracking-widest hover:text-brand-navy dark:hover:text-white text-[11px] mt-auto">
                                    Read Article <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
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