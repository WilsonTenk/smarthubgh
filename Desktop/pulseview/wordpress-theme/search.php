<?php
/**
 * The template for displaying search results pages
 *
 * @package PulseView
 */

get_header();

$query = get_search_query();
$count = $wp_query->found_posts;
?>

<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="border-b-4 border-black mb-12 pb-8">
        <span class="text-[10px] font-black text-red-600 uppercase tracking-[0.2em] block mb-2">
            Search Results
        </span>
        <h1 class="text-5xl font-serif font-bold tracking-tighter">
            <?php printf(esc_html__('Results for "%s"', 'pulseview'), '<span>' . esc_html($query) . '</span>'); ?>
        </h1>
        <p class="text-gray-400 text-sm font-medium mt-4">
            Found <?php echo esc_html($count); ?> matches in the PulseView archive
        </p>
    </div>

    <?php if (have_posts()): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <?php while (have_posts()):
                the_post(); ?>
                <?php get_template_part('template-parts/content', 'card', ['variant' => 'medium']); ?>
            <?php endwhile; ?>
        </div>

        <div class="mt-12">
            <?php the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('Previous', 'pulseview'),
                'next_text' => __('Next', 'pulseview'),
                'class' => 'flex justify-center'
            )); ?>
        </div>

    <?php else: ?>
        <div class="py-40 text-center">
            <div class="text-6xl mb-6">🔍</div>
            <h3 class="text-2xl font-bold mb-4">No matches found.</h3>
            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                We couldn't find any articles matching your search. Try broader keywords or browse our categories.
            </p>
            <a href="<?php echo esc_url(home_url('/')); ?>"
                class="text-red-600 font-bold uppercase text-xs border-b border-red-600 pb-1">Return Home</a>
        </div>
    <?php endif; ?>
</div>

<?php
get_footer();
