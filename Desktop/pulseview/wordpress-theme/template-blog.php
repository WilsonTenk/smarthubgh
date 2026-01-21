<?php
/**
 * Template Name: Blog / News
 * 
 * @package PulseView
 */

get_header();

// Set up query for posts
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'paged' => $paged
);
$the_query = new WP_Query($args);
?>

<div class="max-w-7xl mx-auto px-4 py-16">
    <header class="mb-12 border-b border-gray-100 pb-8">
        <h1 class="text-5xl font-serif font-bold tracking-tighter mb-4"><?php the_title(); ?></h1>
        <div class="text-xl text-gray-500 max-w-2xl">
            <?php echo get_the_content(); ?>
            <!-- If page content is used as intro -->
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        <?php
        if ($the_query->have_posts()):
            while ($the_query->have_posts()):
                $the_query->the_post();
                get_template_part('template-parts/content', 'card', ['variant' => 'medium']);
            endwhile;
        else:
            ?>
            <p><?php _e('Sorry, no posts matched your criteria.', 'pulseview'); ?></p>
        <?php endif; ?>
    </div>

    <div class="mt-16 pt-8 border-t border-gray-100">
        <?php
        echo paginate_links(array(
            'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'total' => $the_query->max_num_pages,
            'current' => max(1, get_query_var('paged')),
            'format' => '?paged=%#%',
            'show_all' => false,
            'type' => 'plain',
            'end_size' => 2,
            'mid_size' => 1,
            'prev_next' => true,
            'prev_text' => sprintf('<i></i> %1$s', __('&larr; Previous', 'pulseview')),
            'next_text' => sprintf('%1$s <i></i>', __('Next &rarr;', 'pulseview')),
            'add_args' => false,
            'add_fragment' => '',
        ));
        wp_reset_postdata();
        ?>
    </div>
</div>

<?php
get_footer();
