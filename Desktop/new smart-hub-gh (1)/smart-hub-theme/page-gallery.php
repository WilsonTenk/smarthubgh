<?php
/* Template Name: Gallery Page */
get_header();

// Collect all images from Projects
$args = array(
    'post_type' => 'project',
    'posts_per_page' => -1,
);
$query = new WP_Query($args);
$all_images = [];

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();

        // Add featured image
        if (has_post_thumbnail()) {
            $all_images[] = get_the_post_thumbnail_url(get_the_ID(), 'large');
        }

        // Add gallery images meta
        $gallery_meta = get_post_meta(get_the_ID(), 'gallery_images', true);
        if (!empty($gallery_meta) && is_array($gallery_meta)) {
            $all_images = array_merge($all_images, $gallery_meta);
        }
    }
    wp_reset_postdata();
}
?>

<div class="bg-white dark:bg-brand-navy min-h-screen transition-colors duration-300">
    <!-- Header -->
    <div class="bg-brand-navy text-white pt-32 md:pt-40 pb-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-x-12"
                style="animation-fill-mode: forwards;">
                <h1 class="text-5xl md:text-8xl font-black uppercase mb-6 tracking-tighter">Our <span
                        class="text-brand-green">Gallery</span></h1>
                <p class="text-base md:text-xl text-gray-400 max-w-2xl font-medium leading-relaxed">
                    Moments of impact, connection, and change captured across our various projects in Ghana.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <!-- Masonry Layout (using columns) -->
        <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8">
            <?php if (!empty($all_images)):
                foreach ($all_images as $idx => $img_url):
                    // Basic unique ref, assuming URLs are unique enough or just index
                    ?>
                    <div class="break-inside-avoid opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-y-12"
                        style="animation-fill-mode: forwards; animation-delay: <?php echo $idx * 0.05; ?>s;">
                        <div
                            class="relative group rounded-2xl overflow-hidden shadow-sm border border-slate-100 dark:border-white/5">
                            <img src="<?php echo esc_url($img_url); ?>" alt="Gallery Item"
                                class="w-full h-auto transform group-hover:scale-105 transition-transform duration-700" />
                            <div
                                class="absolute inset-0 bg-brand-navy/0 group-hover:bg-brand-navy/40 transition-colors duration-300">
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
            else: ?>
                <p class="text-slate-500">No images found in projects.</p>
            <?php endif; ?>
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

<?php get_footer(); ?>