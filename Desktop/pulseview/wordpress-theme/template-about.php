<?php
/**
 * Template Name: About Page
 * 
 * @package PulseView
 */

get_header();

while (have_posts()):
    the_post();
    ?>

    <div class="max-w-4xl mx-auto px-4 py-20">
        <h1 class="text-5xl font-serif font-bold mb-12"><?php the_title(); ?></h1>
        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed whitespace-pre-line">
            <?php the_content(); ?>
        </div>
    </div>

    <?php
endwhile;

get_footer();
