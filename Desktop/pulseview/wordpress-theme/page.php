<?php
/**
 * The template for displaying all pages
 *
 * @package PulseView
 */

get_header();


while (have_posts()):
    the_post();

    // Check if a category exists with the same slug as this page
    $current_slug = get_post_field('post_name', get_the_ID());
    $category_match = get_term_by('slug', $current_slug, 'category');

    // If category exists and this page is acting as a placeholder (or user wants hybrid), 
    // we query posts. To be safe, we always show page content first (if any), then posts.
    ?>

    <div class="max-w-7xl mx-auto px-4 py-16">
        <!-- Page Header -->
        <div class="border-b-4 border-black mb-12 pb-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <?php if ($category_match): ?>
                    <span class="text-[10px] font-black text-red-600 uppercase tracking-[0.2em] block mb-2">Category</span>
                <?php endif; ?>
                <h1 class="text-5xl md:text-7xl font-serif font-bold capitalize tracking-tighter">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>

        <!-- Page Content -->
        <?php if (get_the_content()): ?>
            <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed whitespace-pre-line mb-20">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>

        <!-- Category Loop (if matching category exists) -->
        <?php if ($category_match): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <?php
                // Running a custom query for the category
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $cat_args = array(
                    'cat' => $category_match->term_id,
                    'posts_per_page' => 9,
                    'paged' => $paged
                );
                $cat_query = new WP_Query($cat_args);

                if ($cat_query->have_posts()):
                    while ($cat_query->have_posts()):
                        $cat_query->the_post();
                        get_template_part('template-parts/content', 'card', ['variant' => 'medium']);
                    endwhile;
                else:
                    ?>
                    <div class="col-span-full py-20 text-center">
                        <h3 class="text-xl font-bold mb-4 text-gray-500">No stories found in this category yet.</h3>
                    </div>
                    <?php
                endif;
                ?>
            </div>

            <!-- Pagination for Category Query -->
            <?php if ($cat_query->max_num_pages > 1): ?>
                <div class="mt-12 flex justify-center">
                    <?php
                    echo paginate_links(array(
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $cat_query->max_num_pages,
                        'prev_text' => '&larr; Previous',
                        'next_text' => 'Next &rarr;',
                    ));
                    ?>
                </div>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

    </div>

    <?php
endwhile;


get_footer();