<?php
/**
 * The template for displaying single projects
 *
 * @package PulseView
 */

get_header();

while (have_posts()):
    the_post();

    // Get Custom Fields
    $technologies = get_post_meta(get_the_ID(), '_pulseview_technologies', true);
    $live_url = get_post_meta(get_the_ID(), '_pulseview_live_url', true);
    $github_url = get_post_meta(get_the_ID(), '_pulseview_github_url', true);
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('pt-12 pb-20'); ?>>
        <!-- Hero Header -->
        <div class="max-w-7xl mx-auto px-4 mb-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-end mb-16">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <span class="h-px w-10 bg-red-600"></span>
                        <span class="text-[10px] font-black uppercase tracking-[0.4em] text-red-600">Project Case
                            Study</span>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-serif font-bold leading-none tracking-tight mb-8">
                        <?php the_title(); ?>
                    </h1>
                    <div class="text-xl text-gray-500 font-medium leading-relaxed max-w-lg">
                        <?php the_excerpt(); ?>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100">
                    <h3 class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-6">Project Metadata</h3>
                    <div class="space-y-6">
                        <?php if ($technologies): ?>
                            <div>
                                <span class="block text-xs font-bold text-gray-900 mb-2">Technologies</span>
                                <div class="flex flex-wrap gap-2">
                                    <?php foreach (explode(',', $technologies) as $tech): ?>
                                        <span
                                            class="px-3 py-1 bg-white border border-gray-200 rounded-full text-[10px] font-bold uppercase tracking-wider text-gray-600">
                                            <?php echo esc_html(trim($tech)); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="flex gap-4 pt-4 border-t border-gray-200">
                            <?php if ($live_url): ?>
                                <a href="<?php echo esc_url($live_url); ?>" target="_blank" rel="noopener noreferrer"
                                    class="flex items-center gap-2 text-xs font-black uppercase tracking-widest text-red-600 hover:text-black transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                    Live Site
                                </a>
                            <?php endif; ?>

                            <?php if ($github_url): ?>
                                <a href="<?php echo esc_url($github_url); ?>" target="_blank" rel="noopener noreferrer"
                                    class="flex items-center gap-2 text-xs font-black uppercase tracking-widest text-gray-900 hover:text-red-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                    </svg>
                                    GitHub
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (has_post_thumbnail()): ?>
                <figure class="rounded-3xl overflow-hidden shadow-2xl mb-20 bg-gray-100">
                    <?php the_post_thumbnail('full', ['class' => 'w-full h-auto']); ?>
                </figure>
            <?php endif; ?>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <div class="lg:col-span-8 lg:col-start-3">
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

        </div>
    </article>

    <?php
endwhile;

get_footer();
