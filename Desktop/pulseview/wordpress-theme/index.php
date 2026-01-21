<?php
/**
 * The main template file
 * 
 * @package PulseView
 */

get_header(); ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <?php if (have_posts()): ?>

        <header class="mb-12 border-b border-gray-100 pb-8">
            <h1 class="text-4xl font-serif font-bold text-gray-900 mb-4"><?php single_post_title(); ?></h1>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php
            /* Start the Loop */
            while (have_posts()):
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('group flex flex-col h-full'); ?>>
                    <?php if (has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>" class="block overflow-hidden rounded-2xl mb-6 relative aspect-[4/3]">
                            <?php the_post_thumbnail('medium_large', array('class' => 'object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-700 ease-out')); ?>
                        </a>
                    <?php endif; ?>

                    <div class="flex-grow">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-1.5 h-1.5 bg-red-600 rounded-full"></span>
                            <span class="text-[10px] font-bold text-red-600 uppercase tracking-widest">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                } else {
                                    echo 'News';
                                }
                                ?>
                            </span>
                        </div>

                        <h2
                            class="text-xl font-serif font-bold text-gray-900 mb-3 leading-snug group-hover:text-red-600 transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <div class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t border-gray-100 mt-auto">
                        <div class="flex items-center gap-2 text-xs font-medium text-gray-400">
                            <span><?php echo get_the_date(); ?></span>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="mt-16 pt-8 border-t border-gray-100">
            <?php
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('Previous', 'pulseview'),
                'next_text' => __('Next', 'pulseview'),
            ));
            ?>
        </div>

    <?php else: ?>

        <div class="py-20 text-center">
            <h1 class="text-2xl font-bold mb-4">Nothing Found</h1>
            <p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
            <?php get_search_form(); ?>
        </div>

    <?php endif; ?>
</div>

<?php
get_footer();