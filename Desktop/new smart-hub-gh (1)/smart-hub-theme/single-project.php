<?php get_header(); ?>

<?php while (have_posts()):
    the_post();
    $sponsor = get_post_meta(get_the_ID(), 'sponsor', true) ?: 'Sponsor';
    $period = get_post_meta(get_the_ID(), 'period', true) ?: '2023';
    $reach = get_post_meta(get_the_ID(), 'reach', true) ?: 'Impact';
    $communities = get_post_meta(get_the_ID(), 'communities', true) ?: 'Various';
    $gallery_images = get_post_meta(get_the_ID(), 'gallery_images', true); // Assumes serialized array or handled properly
    ?>

    <div class="bg-white dark:bg-brand-navy min-h-screen transition-colors duration-300">

        <!-- Hero Image -->
        <div class="relative h-[60vh] bg-brand-navy overflow-hidden">
            <div class="absolute inset-0">
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('full', ['class' => 'w-full h-full object-cover opacity-60']);
                } else { ?>
                    <div class="w-full h-full bg-slate-800 opacity-60"></div>
                <?php } ?>
                <div class="absolute inset-0 bg-gradient-to-t from-brand-navy via-transparent to-transparent"></div>
            </div>
            <div class="absolute bottom-0 left-0 w-full p-4 sm:p-8 lg:p-12">
                <div class="max-w-7xl mx-auto">
                    <a href="<?php echo home_url('/projects'); ?>"
                        class="inline-flex items-center gap-2 text-white/80 hover:text-brand-green mb-6 transition-colors font-display uppercase tracking-widest text-sm">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <line x1="19" y1="12" x2="5" y2="12" />
                            <polyline points="12 19 5 12 12 5" />
                        </svg> Back to Projects
                    </a>
                    <h1 class="font-display text-5xl md:text-7xl text-white uppercase leading-tight mb-4 tracking-tighter">
                        <?php the_title(); ?>
                    </h1>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16">

                <!-- Sidebar / Metadata -->
                <div class="lg:col-span-1">
                    <div class="bg-brand-light dark:bg-slate-900/50 p-8 rounded-2xl sticky top-24 border border-slate-100 dark:border-white/5 transition-colors opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-y-12"
                        style="animation-fill-mode: forwards;">
                        <h3
                            class="font-display text-2xl uppercase mb-6 text-brand-navy dark:text-white border-b border-gray-200 dark:border-white/10 pb-4 tracking-tight">
                            Project Data</h3>
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-white dark:bg-white/10 flex items-center justify-center text-brand-green shrink-0 shadow-sm">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                        <line x1="16" x2="16" y1="2" y2="6" />
                                        <line x1="8" x2="8" y1="2" y2="6" />
                                        <line x1="3" x2="21" y1="10" y2="10" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Timeline</p>
                                    <p class="text-brand-navy dark:text-white font-bold">
                                        <?php echo esc_html($period); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-white dark:bg-white/10 flex items-center justify-center text-brand-green shrink-0 shadow-sm">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="8" r="7" />
                                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Sponsor</p>
                                    <p class="text-brand-navy dark:text-white font-bold">
                                        <?php echo esc_html($sponsor); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-white dark:bg-white/10 flex items-center justify-center text-brand-green shrink-0 shadow-sm">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Reach</p>
                                    <p class="text-brand-navy dark:text-white font-bold">
                                        <?php echo esc_html($reach); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-white dark:bg-white/10 flex items-center justify-center text-brand-green shrink-0 shadow-sm">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                        <circle cx="12" cy="10" r="3" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Communities
                                    </p>
                                    <p class="text-brand-navy dark:text-white font-bold">
                                        <?php echo esc_html($communities); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2 opacity-0 animate-[fadeIn_0.6s_ease-out_0.2s_forwards] translate-y-12"
                    style="animation-fill-mode: forwards; animation-delay: 0.2s;">
                    <h2
                        class="text-3xl md:text-4xl font-black uppercase text-brand-navy dark:text-white mb-8 tracking-tighter">
                        Overview</h2>
                    <div
                        class="project-content text-gray-600 dark:text-slate-400 font-medium leading-relaxed space-y-6 text-base md:text-xl transition-colors">
                        <?php the_content(); ?>
                    </div>

                    <div
                        class="mt-8 text-gray-600 dark:text-slate-400 font-medium leading-relaxed space-y-6 text-base md:text-xl transition-colors">
                        <p>
                            Established to bridge the gap between opportunity and capacity, SMART HUB GH focuses on
                            equipping children, adolescents, and youth with the knowledge, tools, and platforms they need to
                            make informed decisions about their health, careers, and communities.
                        </p>
                        <p>
                            Recognizing the importance of expertise in executing our mandates, our staff undergo continuous
                            training and workshops. These sessions are meticulously crafted to equip our team with the
                            necessary skills and knowledge.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Collage Section -->
        <!-- Note: This requires gallery_images meta field to be an array of image URLs -->
        <?php if (!empty($gallery_images) && is_array($gallery_images)): ?>
            <div class="py-24 bg-brand-navy overflow-hidden relative">
                <div
                    class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-brand-blue to-transparent">
                </div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <div class="text-center mb-16 opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-y-12"
                        style="animation-fill-mode: forwards;">
                        <h2 class="font-display text-5xl md:text-7xl text-white uppercase tracking-tighter">Impact <span
                                class="text-brand-green">Visuals</span></h2>
                    </div>

                    <div class="relative h-[600px] w-full">
                        <?php foreach ($gallery_images as $i => $img):
                            $rotation = [0 => '-6deg', 1 => '3deg', 2 => '5deg', 3 => '-4deg'];
                            $styles = [
                                0 => 'w-[40%] top-0 left-0',
                                1 => 'w-[45%] top-20 right-0',
                                2 => 'w-[35%] bottom-0 left-20',
                                3 => 'w-[30%] bottom-10 right-20'
                            ];
                            $pos = [
                                0 => "left: 5%;",
                                1 => "right: 5%;",
                                2 => "left: 15%;",
                                3 => "right: 10%;"
                            ];
                            ?>
                            <div class="absolute rounded-2xl overflow-hidden shadow-2xl border-4 border-white/10 dark:border-white/5 transform hover:z-50 hover:scale-105 transition-all duration-500 opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-y-12 <?php echo $styles[$i] . ' rotate-[' . $rotation[$i] . ']'; ?>"
                                style="<?php echo $pos[$i]; ?> animation-delay: <?php echo $i * 0.2; ?>s; animation-fill-mode: forwards;">
                                <img src="<?php echo esc_url($img); ?>" alt="Gallery" class="w-full h-full object-cover" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

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