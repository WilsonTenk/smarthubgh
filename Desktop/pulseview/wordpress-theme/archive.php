<?php
/**
 * The template for displaying archive pages
 *
 * @package PulseView
 */

get_header();

$title = get_the_archive_title();
$description = get_the_archive_description();
$post_count = $wp_query->found_posts;
$is_archives_page = is_post_type_archive('post') || is_home(); // If they use a static page for archives, this might differ, but for standard archives:
?>

<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="border-b-4 border-black mb-12 pb-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <span class="text-[10px] font-black text-red-600 uppercase tracking-[0.2em] block mb-2">
                <?php
                if (is_category())
                    echo 'Category';
                elseif (is_tag())
                    echo 'Tag';
                elseif (is_author())
                    echo 'Author';
                elseif (is_date())
                    echo 'Date Archive';
                else
                    echo 'Archives';
                ?>
            </span>
            <h1 class="text-5xl md:text-7xl font-serif font-bold capitalize tracking-tighter">
                <?php echo wp_kses_post($title); ?>
            </h1>
        </div>
        <p class="text-gray-400 text-sm font-medium">
            <?php echo esc_html($post_count); ?> Stories available
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
        <?php if (have_posts()): ?>
            <?php while (have_posts()):
                the_post(); ?>
                <?php get_template_part('template-parts/content', 'card', ['variant' => 'medium']); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-span-full py-40 text-center">
                <h3 class="text-2xl font-bold mb-4">No stories found.</h3>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                    class="text-red-600 font-bold uppercase text-xs border-b border-red-600 pb-1">Return Home</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="mt-12">
        <?php the_posts_pagination([
            'prev_text' => '&larr; Previous',
            'next_text' => 'Next &rarr;',
            'class' => 'flex justify-center'
        ]); ?>
    </div>

    <!-- Year Archives (Only show on main archives if feasible, but usually WP archives are specific. We can show this always as footer navigation for archives) -->
    <div class="mt-20 pt-20 border-t border-gray-100 grid grid-cols-1 md:grid-cols-4 gap-8">
        <?php
        // Show last 3 years
        $years = [date('Y'), date('Y') - 1, date('Y') - 2];
        foreach ($years as $year):
            ?>
            <div>
                <h4 class="font-black text-xs uppercase tracking-widest text-red-600 mb-4"><?php echo esc_html($year); ?>
                </h4>
                <ul class="space-y-2 text-sm text-gray-500">
                    <?php for ($m = 1; $m <= 12; $m++):
                        $month_name = date("F", mktime(0, 0, 0, $m, 10));
                        $archive_link = get_month_link($year, $m);
                        ?>
                        <li><a href="<?php echo esc_url($archive_link); ?>"
                                class="hover:text-red-600 cursor-pointer"><?php echo esc_html($month_name); ?></a></li>
                    <?php endfor; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
get_footer();