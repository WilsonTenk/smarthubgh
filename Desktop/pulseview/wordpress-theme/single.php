<?php
/**
 * The template for displaying all single posts
 *
 * @package PulseView
 */

get_header();

while (have_posts()):
    the_post();

    $author_id = get_the_author_meta('ID');
    $author_avatar = get_avatar_url($author_id);
    $categories = get_the_category();
    $cat_name = !empty($categories) ? $categories[0]->name : 'News';
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('pt-10 pb-20'); ?>>
        <div class="max-w-4xl mx-auto px-4 mb-10">
            <header>
                <div class="flex items-center gap-4 text-xs font-bold text-gray-500 mb-8 uppercase tracking-widest">
                    <span class="text-red-600"><?php echo esc_html($cat_name); ?></span>
                    <span>•</span>
                    <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                    <span>•</span>
                    <span>5 min read</span> <!-- Static read time or install reading time plugin -->
                </div>
                <h1 class="text-4xl md:text-6xl font-serif font-bold mb-10 leading-tight">
                    <?php the_title(); ?>
                </h1>
                <div class="flex items-center justify-between py-8 border-y border-gray-100 mb-10">
                    <div class="flex items-center gap-4">
                        <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr(get_the_author()); ?>"
                            class="w-12 h-12 rounded-full" />
                        <div>
                            <p class="font-bold"><?php the_author(); ?></p>
                            <p class="text-xs text-gray-400">Editor, PulseView</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button
                            class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:text-red-600 hover:border-red-600 transition-colors"
                            aria-label="Share">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </header>
        </div>

        <div class="max-w-7xl mx-auto px-4 mb-16">
            <?php if (has_post_thumbnail()): ?>
                <figure class="rounded-3xl overflow-hidden aspect-[21/9] bg-gray-100">
                    <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
                </figure>
            <?php endif; ?>
        </div>

        <div class="max-w-4xl mx-auto px-4">
            <!-- Pulse Points - AI Summary (Simulated with Excerpt) -->
            <?php if (has_excerpt()): ?>
                <section class="bg-black text-white rounded-3xl p-10 mb-16 shadow-2xl relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 w-64 h-64 bg-red-600/10 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/2">
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center shadow-lg shadow-red-600/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fillRule="evenodd"
                                            d="M11.3 1.047a1 1 0 01.897.95L12.285 4.04c.057.436.42.766.86.766h1.254c.484 0 .911.307 1.06.767l.38 1.14c.143.43.023.906-.307 1.21l-.986.914c-.342.316-.442.812-.247 1.23l.564 1.206c.21.45.101.986-.268 1.314l-1.07 1.006c-.352.33-.865.378-1.27.116l-1.123-.728a1.05 1.05 0 00-1.12 0l-1.123.728c-.405.262-.918.214-1.27-.116l-1.07-1.006c-.369-.328-.478-.864-.268-1.314l.564-1.206c.195-.418.095-.914-.247-1.23l-.986-.914c-.33-.304-.45-.78-.307-1.21l.38-1.14a1.102 1.102 0 011.06-.767h1.254c.44 0 .803-.33.86-.766l.088-2.043a1 1 0 01.897-.95zM5 13a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                            clipRule="evenodd" />
                                    </svg>
                                </span>
                                <h3 class="text-xs font-black uppercase tracking-[0.3em] text-red-500">Pulse Points</h3>
                            </div>
                            <span class="text-[10px] font-bold text-gray-600 uppercase tracking-widest">Summary</span>
                        </div>

                        <div class="prose prose-invert max-w-none text-gray-300 leading-relaxed font-medium">
                            <div class="space-y-4 whitespace-pre-line">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                <?php the_content(); ?>
            </div>

            <div class="mt-20 pt-10 border-t border-gray-100">
                <div class="flex flex-wrap gap-3">
                    <?php
                    $tags = get_the_tags();
                    if ($tags) {
                        foreach ($tags as $tag) {
                            echo '<a href="' . get_tag_link($tag->term_id) . '" class="px-5 py-2.5 bg-gray-50 text-gray-500 rounded-full text-xs font-black uppercase tracking-widest hover:bg-red-50 hover:text-red-600 cursor-pointer transition-all border border-transparent hover:border-red-100">#' . $tag->name . '</a>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <section class="max-w-7xl mx-auto px-4 mt-32">
            <div class="flex items-center justify-between mb-12">
                <h2 class="text-3xl font-serif font-bold tracking-tight">Continue Reading</h2>
                <div class="h-px bg-gray-100 flex-grow mx-8"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <?php
                // Related Posts Loop
                $related = new WP_Query(array(
                    'category__in' => wp_get_post_categories(get_the_ID()),
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 3
                ));
                if ($related->have_posts()):
                    while ($related->have_posts()):
                        $related->the_post();
                        get_template_part('template-parts/content', 'card', ['variant' => 'medium']);
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>
    </article>

    <?php
endwhile;

get_footer();