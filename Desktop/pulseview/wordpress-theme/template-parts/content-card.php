<?php
/**
 * Template part for displaying posts in card format
 *
 * @package PulseView
 */

$variant = $args['variant'] ?? 'medium';
$post_id = get_the_ID();
$category = get_the_category();
$cat_name = !empty($category) ? $category[0]->name : 'News';
$author_id = get_the_author_meta('ID');
$author_avatar = get_avatar_url($author_id);
$author_name = get_the_author();
// Mock Organization for now or get from user meta
$author_org = 'PulseView';

// "Watermark" HTML
$watermark_html = '
<div class="absolute bottom-3 right-3 z-10 pointer-events-none bg-black/30 backdrop-blur-md px-2 py-1 rounded-md border border-white/10 flex items-center gap-1.5">
    <div class="w-1.5 h-1.5 bg-red-600 rounded-full animate-pulse"></div>
    <span class="text-[8px] font-black uppercase tracking-widest text-white/90">PulseView</span>
</div>';

// HERO VARIANT
if ($variant === 'hero'): ?>
    <a href="<?php the_permalink(); ?>"
        class="group relative block w-full bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-50">
        <div class="flex flex-col lg:flex-row h-full">
            <div class="lg:w-3/5 overflow-hidden bg-gray-100 relative min-h-[300px] lg:min-h-[500px]">
                <div class="absolute inset-0 z-5 bg-transparent" aria-hidden="true"></div>
                <?php echo $watermark_html; ?>
                <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-700']); ?>
                <?php endif; ?>
            </div>
            <div class="lg:w-2/5 p-6 lg:p-12 flex flex-col justify-center">
                <div class="flex items-center gap-2 text-[10px] font-bold text-gray-400 mb-4 uppercase tracking-[0.2em]">
                    <span class="text-red-600"><?php echo esc_html($cat_name); ?></span>
                    <span>•</span>
                    <span><?php echo get_the_date(); ?></span>
                </div>
                <h2
                    class="text-2xl md:text-3xl lg:text-5xl font-serif font-bold mb-4 lg:mb-6 group-hover:text-red-600 transition-colors leading-tight">
                    <?php the_title(); ?>
                </h2>
                <div class="text-gray-500 text-sm lg:text-lg leading-relaxed mb-6 line-clamp-2 lg:line-clamp-3">
                    <?php the_excerpt(); ?>
                </div>
                <div class="flex items-center justify-between mt-auto pt-6 border-t border-gray-50">
                    <div class="flex items-center gap-3">
                        <img src="<?php echo esc_url($author_avatar); ?>" alt=""
                            class="w-8 h-8 rounded-full ring-2 ring-gray-50" />
                        <div>
                            <p class="text-[10px] font-black uppercase text-gray-900"><?php echo esc_html($author_name); ?>
                            </p>
                            <p class="text-[9px] text-gray-400 font-bold uppercase"><?php echo esc_html($author_org); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>

<?php
    // HORIZONTAL VARIANT
elseif ($variant === 'horizontal'): ?>
    <a href="<?php the_permalink(); ?>"
        class="group flex gap-4 py-6 border-b border-gray-100 last:border-0 hover:bg-gray-50/50 rounded-2xl px-2 transition-all">
        <div class="w-1/3 sm:w-1/4 lg:w-1/3 rounded-xl overflow-hidden aspect-square shrink-0 bg-gray-100 relative">
            <div class="absolute inset-0 z-5 bg-transparent" aria-hidden="true"></div>
            <?php echo $watermark_html; ?>
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500']); ?>
            <?php endif; ?>
        </div>
        <div class="w-2/3 sm:w-3/4 lg:w-2/3 flex flex-col justify-center">
            <div class="flex items-center gap-2 text-[9px] uppercase tracking-[0.2em] font-black text-gray-400 mb-1">
                <span class="text-red-600"><?php echo esc_html($cat_name); ?></span>
                <span>•</span>
                <span><?php echo get_the_date(); ?></span>
            </div>
            <h3
                class="text-sm md:text-lg font-bold group-hover:text-red-600 transition-colors mb-1 leading-snug line-clamp-2">
                <?php the_title(); ?>
            </h3>
            <div class="hidden sm:block text-gray-500 text-xs line-clamp-2 leading-relaxed">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </a>

<?php
    // DEFAULT / MEDIUM / SMALL VARIANTS
else: ?>
    <a href="<?php the_permalink(); ?>" class="group block h-full flex flex-col">
        <div class="relative rounded-2xl overflow-hidden aspect-[16/10] mb-4 bg-gray-100 shrink-0">
            <div class="absolute inset-0 z-5 bg-transparent" aria-hidden="true"></div>
            <?php echo $watermark_html; ?>
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-700']); ?>
            <?php endif; ?>
        </div>
        <div class="flex flex-col flex-grow">
            <div class="flex items-center gap-2 text-[9px] uppercase tracking-[0.2em] font-black text-gray-400 mb-2">
                <span class="text-red-600"><?php echo esc_html($cat_name); ?></span>
                <span>•</span>
                <span><?php echo get_the_date(); ?></span>
            </div>
            <h3
                class="font-bold group-hover:text-red-600 transition-colors leading-tight mb-2 line-clamp-2 <?php echo ($variant === 'large' ? 'text-xl md:text-2xl' : 'text-base md:text-lg'); ?>">
                <?php the_title(); ?>
            </h3>
            <?php if ($variant !== 'small'): ?>
                <div class="text-gray-500 text-xs md:text-sm line-clamp-2 mb-4 leading-relaxed">
                    <?php the_excerpt(); ?>
                </div>
            <?php endif; ?>
            <div class="flex items-center gap-3 mt-auto">
                <img src="<?php echo esc_url($author_avatar); ?>" alt="" class="w-5 h-5 rounded-full" />
                <span
                    class="text-[9px] font-black uppercase text-gray-400 tracking-widest"><?php echo esc_html($author_name); ?></span>
            </div>
        </div>
    </a>
<?php endif; ?>