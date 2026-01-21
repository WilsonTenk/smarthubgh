<?php
/**
 * The template for displaying project archives
 *
 * @package PulseView
 */

get_header();

$description = get_the_archive_description();
?>

<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="border-b-4 border-black mb-12 pb-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <span class="text-[10px] font-black text-red-600 uppercase tracking-[0.2em] block mb-2">
                Portfolio
            </span>
            <h1 class="text-5xl md:text-7xl font-serif font-bold tracking-tighter">
                Projects
            </h1>
        </div>
        <p class="text-gray-400 text-sm font-medium">
            Selected Works & Case Studies
        </p>
    </div>

    <?php if (have_posts()): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php while (have_posts()):
                the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="group block">
                    <div class="relative rounded-2xl overflow-hidden aspect-[4/3] mb-6 bg-gray-100">
                        <div class="absolute inset-0 z-10 bg-black/0 group-hover:bg-black/20 transition-colors duration-500">
                        </div>
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-700']); ?>
                        <?php else: ?>
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                        <?php endif; ?>

                        <!-- Hover Overlay Icon -->
                        <div
                            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform translate-y-4 group-hover:translate-y-0">
                            <span class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'category');
                            if ($terms && !is_wp_error($terms)) {
                                $cat_names = array_map(function ($term) {
                                    return $term->name; }, $terms);
                                echo '<span class="text-[10px] font-black uppercase tracking-[0.2em] text-red-600">' . esc_html(implode(', ', $cat_names)) . '</span>';
                            }
                            ?>
                        </div>
                        <h3 class="text-2xl font-serif font-bold group-hover:text-red-600 transition-colors mb-2">
                            <?php the_title(); ?>
                        </h3>
                        <div class="text-gray-500 text-sm leading-relaxed line-clamp-2">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>

        <div class="mt-16">
            <?php the_posts_pagination([
                'prev_text' => '&larr; Previous',
                'next_text' => 'Next &rarr;',
                'class' => 'flex justify-center'
            ]); ?>
        </div>

    <?php else: ?>
        <div class="py-40 text-center">
            <h3 class="text-2xl font-bold mb-4">No projects found.</h3>
            <p class="text-gray-500">Check back soon for new case studies.</p>
        </div>
    <?php endif; ?>
</div>

<?php
get_footer();
