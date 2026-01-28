<?php get_header(); ?>

<?php while (have_posts()):
    the_post();
    $post_date = get_the_date('M d, Y');
    $author_name = get_the_author();
    $categories = get_the_category();
    $cat_name = !empty($categories) ? $categories[0]->name : 'Uncategorized';
    ?>

    <div class="bg-brand-light dark:bg-brand-navy min-h-screen transition-colors duration-300">

        <!-- Header Section -->
        <div class="bg-brand-navy text-white pt-32 md:pt-40 pb-16 px-4">
            <div class="max-w-4xl mx-auto">
                <div class="opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-y-12"
                    style="animation-fill-mode: forwards;">
                    <a href="<?php echo home_url('/blog'); ?>"
                        class="inline-flex items-center gap-2 text-white/60 hover:text-brand-green mb-8 font-black uppercase tracking-widest text-xs transition-colors">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <line x1="19" y1="12" x2="5" y2="12" />
                            <polyline points="12 19 5 12 12 5" />
                        </svg> Back to Blog
                    </a>

                    <div
                        class="flex flex-wrap items-center gap-6 mb-6 text-[10px] font-black text-white/80 uppercase tracking-[0.2em]">
                        <span class="flex items-center gap-2 text-brand-green"><svg width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z" />
                                <path d="M7 7h.01" />
                            </svg>
                            <?php echo esc_html($cat_name); ?>
                        </span>
                        <span class="flex items-center gap-2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                <line x1="16" x2="16" y1="2" y2="6" />
                                <line x1="8" x2="8" y1="2" y2="6" />
                                <line x1="3" x2="21" y1="10" y2="10" />
                            </svg>
                            <?php echo $post_date; ?>
                        </span>
                        <span class="flex items-center gap-2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            <?php echo $author_name; ?>
                        </span>
                    </div>

                    <h1 class="text-4xl md:text-7xl text-white font-black uppercase leading-[1.05] tracking-tighter">
                        <?php the_title(); ?>
                    </h1>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10 pb-20">

            <!-- Featured Image -->
            <div class="opacity-0 animate-[fadeIn_0.6s_ease-out_0.2s_forwards] translate-y-12 mb-12"
                style="animation-fill-mode: forwards; animation-delay: 0.2s;">
                <div
                    class="rounded-[2.5rem] overflow-hidden shadow-2xl h-[350px] md:h-[500px] w-full border-[8px] border-white dark:border-slate-800">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']);
                    } else { ?>
                        <div class="w-full h-full bg-slate-800"></div>
                    <?php } ?>
                </div>
            </div>

            <!-- Content -->
            <div class="opacity-0 animate-[fadeIn_0.6s_ease-out_0.3s_forwards] translate-y-12 bg-white dark:bg-slate-900 p-8 md:p-16 rounded-[2.5rem] shadow-sm mb-12 border border-slate-50 dark:border-white/5 transition-colors"
                style="animation-fill-mode: forwards; animation-delay: 0.3s;">
                <div
                    class="text-gray-600 dark:text-slate-400 font-medium leading-relaxed space-y-8 text-base md:text-xl transition-colors">
                    <p
                        class="text-xl md:text-3xl font-black text-brand-navy dark:text-white leading-tight border-l-8 border-brand-green pl-8 transition-colors">
                        <?php echo get_the_excerpt(); ?>
                    </p>
                    <div class="blog-content prose dark:prose-invert max-w-none">
                        <?php the_content(); ?>
                    </div>
                </div>

                <div class="py-12 border-t border-gray-100 dark:border-white/10 mt-16">
                    <h3
                        class="text-xl md:text-2xl font-black text-brand-navy dark:text-white uppercase mb-8 tracking-tighter transition-colors">
                        Share Impact</h3>
                    <div class="flex flex-wrap gap-3">
                        <?php foreach (['Facebook', 'Twitter', 'LinkedIn'] as $platform): ?>
                            <button
                                class="px-6 py-3 border-2 border-slate-100 dark:border-white/10 rounded-xl text-slate-500 dark:text-slate-400 hover:bg-brand-blue hover:text-white hover:border-brand-blue transition-all font-black uppercase text-[10px] tracking-widest">
                                <?php echo $platform; ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
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

<?php endwhile; ?>

<?php get_footer(); ?>