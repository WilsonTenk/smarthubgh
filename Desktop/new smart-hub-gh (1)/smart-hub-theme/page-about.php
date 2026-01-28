<?php
/* Template Name: About Page */
get_header();
?>

<div class="bg-white dark:bg-brand-navy min-h-screen transition-colors duration-300">

    <!-- Header -->
    <div class="relative bg-brand-navy text-white pt-32 md:pt-40 pb-16 md:pb-24 px-4 overflow-hidden">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-brand-blue/10 blur-[150px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-x-12"
                style="animation-fill-mode: forwards;">
                <h1 class="text-5xl md:text-8xl font-black uppercase mb-6 tracking-tighter leading-none">About <span
                        class="text-brand-blue">Us</span></h1>
                <div class="h-1.5 w-16 bg-brand-green mb-8"></div>
                <p class="text-base md:text-2xl font-medium text-slate-300 max-w-2xl leading-relaxed">
                    A youth-led future of competent, healthy, and like-minded people making Ghana a premier nation.
                </p>
            </div>
        </div>
    </div>

    <!-- Vision & Mission -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">

            <div class="bg-slate-50 dark:bg-slate-900/50 p-8 md:p-10 rounded-3xl border border-slate-100 dark:border-white/5 transition-colors opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-x-12"
                style="animation-fill-mode: forwards;">
                <h2
                    class="text-xl md:text-2xl font-black text-brand-navy dark:text-white uppercase mb-4 tracking-tight">
                    Our Vision</h2>
                <p class="text-base md:text-lg font-medium text-slate-600 dark:text-slate-400 leading-relaxed">
                    A future of competent, healthy and like-minded people making Ghana a premier nation.
                </p>
            </div>

            <div class="bg-brand-blue p-8 md:p-10 rounded-3xl text-white shadow-xl opacity-0 animate-[fadeIn_0.6s_ease-out_0.1s_forwards] translate-x-12"
                style="animation-fill-mode: forwards; animation-delay: 0.1s;">
                <h2 class="text-xl md:text-2xl font-black uppercase mb-4 tracking-tight">Our Mission</h2>
                <p class="text-base md:text-lg font-medium leading-relaxed text-white/90">
                    To impact the Ghanaian society through education, capacity building and advocacy in child
                    protection, adolescents and reproductive health.
                </p>
            </div>
        </div>
    </div>

    <!-- Impact Statistics Section -->
    <section class="py-20 bg-brand-navy text-white overflow-hidden relative">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,_rgba(0,85,255,0.1),transparent)] pointer-events-none">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-y-12"
                style="animation-fill-mode: forwards;">
                <h2 class="text-4xl md:text-6xl font-black uppercase tracking-tighter mb-4">Our <span
                        class="text-brand-green">Footprint</span></h2>
                <p class="text-slate-400 font-medium text-lg">Measurable change across the region since 2016.</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                <?php
                $stats = [
                    ['label' => "Lives Impacted", 'value' => 5000, 'suffix' => "+", 'icon' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>', 'color' => 'text-brand-blue'],
                    ['label' => "Projects Completed", 'value' => 12, 'suffix' => "", 'icon' => '<path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/>', 'color' => 'text-brand-green'],
                    ['label' => "Communities Reached", 'value' => 30, 'suffix' => "+", 'icon' => '<circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>', 'color' => 'text-brand-blue'],
                    ['label' => "Active Volunteers", 'value' => 35, 'suffix' => "+", 'icon' => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>', 'color' => 'text-brand-green']
                ];
                foreach ($stats as $i => $stat): ?>
                    <div class="bg-white/5 backdrop-blur-sm p-8 rounded-[2.5rem] border border-white/10 text-center flex flex-col items-center opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-y-12"
                        style="animation-fill-mode: forwards; animation-delay: <?php echo $i * 0.1; ?>s;">
                        <div
                            class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center mb-6 <?php echo $stat['color']; ?>">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <?php echo $stat['icon']; ?>
                            </svg>
                        </div>
                        <div class="text-4xl md:text-6xl font-black tracking-tighter mb-2 leading-none">
                            <?php echo $stat['value'] . $stat['suffix']; ?>
                        </div>
                        <p class="text-[10px] md:text-xs font-black uppercase tracking-[0.2em] text-slate-400">
                            <?php echo $stat['label']; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Leadership & Partners Sections (Static placeholders as per plan) -->
    <div class="container mx-auto px-4 py-20 text-center">
        <p class="text-slate-500 italic">... Additional Leadership & Partners Sections ...</p>
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