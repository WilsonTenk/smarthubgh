<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package PulseView
 */

get_header();
?>

<div class="py-40 text-center px-4 flex flex-col items-center justify-center min-h-[60vh]">
    <div class="relative mb-12">
        <h1 class="text-[10rem] font-black text-gray-50 leading-none select-none">404</h1>
        <h2
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-4xl font-serif font-bold text-gray-900 w-full">
            Lost in the Pulse
        </h2>
    </div>
    <p class="text-gray-500 mb-10 max-w-md mx-auto text-lg leading-relaxed">
        The headline you're looking for has vanished. It might have been retracted or moved to a different beat.
    </p>
    <a href="<?php echo esc_url(home_url('/')); ?>"
        class="bg-red-600 text-white px-12 py-5 rounded-full font-bold text-lg hover:bg-red-700 transition-all shadow-xl hover:shadow-red-200">
        Back to Breaking News
    </a>
</div>

<?php
get_footer();
