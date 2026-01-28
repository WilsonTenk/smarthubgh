<?php
/* Template Name: Contact Page */
get_header();
?>

<div class="bg-brand-light dark:bg-brand-navy min-h-screen transition-colors duration-300">

    <!-- Header -->
    <div class="bg-brand-navy text-white pt-32 md:pt-40 pb-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-x-12"
                style="animation-fill-mode: forwards;">
                <h1 class="font-black text-5xl md:text-8xl uppercase mb-6 tracking-tighter leading-none">Contact <span
                        class="text-brand-green">& Donate</span></h1>
                <p class="text-base md:text-xl text-gray-400 max-w-2xl font-medium leading-relaxed">
                    Join us in empowering young people across Ghana. Your contribution makes a lasting difference.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">

            <!-- Donation / Bank Info -->
            <div class="order-2 lg:order-1">
                <div class="bg-brand-blue rounded-3xl p-8 md:p-12 text-white relative overflow-hidden shadow-2xl opacity-0 animate-[fadeIn_0.6s_ease-out_forwards] translate-x-12"
                    style="animation-fill-mode: forwards;">
                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-8">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="text-brand-green">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                            </svg>
                            <h2 class="font-black text-2xl md:text-3xl uppercase tracking-tight leading-none">
                                Bank Transfer
                            </h2>
                        </div>

                        <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 md:p-8 border border-white/10 mb-8">
                            <div class="space-y-6 font-mono text-sm md:text-base">
                                <div class="flex flex-col border-b border-white/5 pb-4">
                                    <span
                                        class="text-white/40 uppercase text-[9px] tracking-[0.2em] mb-1 font-black">Bank
                                        Name</span>
                                    <span class="font-black text-base md:text-lg">Fidelity Bank, Ho Branch</span>
                                </div>
                                <div class="flex flex-col border-b border-white/5 pb-4">
                                    <span
                                        class="text-white/40 uppercase text-[9px] tracking-[0.2em] mb-1 font-black">Account
                                        Name</span>
                                    <span class="font-black text-base md:text-lg">The SMART Hub</span>
                                </div>
                                <div class="flex flex-col pt-2">
                                    <span
                                        class="text-white/40 uppercase text-[9px] tracking-[0.2em] mb-1 font-black">Account
                                        Number</span>
                                    <span
                                        class="font-black text-xl md:text-2xl text-brand-green tracking-widest break-all">2090251830214</span>
                                </div>
                            </div>
                        </div>

                        <h3 class="font-black text-lg md:text-xl uppercase mb-4 tracking-tight">Other Contributions</h3>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach (["School Materials", "Sanitary Kits", "Tech Devices"] as $item): ?>
                                <span
                                    class="px-4 py-2 bg-white/5 rounded-full border border-white/10 text-[9px] font-black uppercase tracking-widest">
                                    <?php echo $item; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="order-1 lg:order-2">
                <div class="opacity-0 animate-[fadeIn_0.6s_ease-out_0.2s_forwards] translate-x-12"
                    style="animation-fill-mode: forwards; animation-delay: 0.2s;">
                    <h2
                        class="font-black text-2xl md:text-4xl text-brand-navy dark:text-white uppercase mb-10 tracking-tighter transition-colors">
                        Get In Touch</h2>

                    <div class="grid grid-cols-1 gap-6 md:gap-8">
                        <div
                            class="group flex items-start gap-5 p-6 md:p-8 bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-white/5 shadow-sm transition-all duration-300">
                            <div
                                class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-brand-light dark:bg-white/5 shadow-inner flex items-center justify-center shrink-0 text-brand-navy dark:text-brand-blue group-hover:bg-brand-blue group-hover:text-white transition-all duration-300">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>
                            <div>
                                <h3
                                    class="font-black text-sm md:text-base text-brand-navy dark:text-white uppercase tracking-widest mb-1 transition-colors">
                                    Location</h3>
                                <p
                                    class="text-gray-500 dark:text-slate-400 text-sm md:text-lg leading-tight font-medium transition-colors">
                                    Daglama Street, Near Mirage, Ho. AJ552</p>
                                <p class="text-brand-blue/50 text-[9px] font-black mt-2 uppercase tracking-widest">
                                    VH-0109-9423</p>
                            </div>
                        </div>

                        <div
                            class="group flex items-start gap-5 p-6 md:p-8 bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-white/5 shadow-sm transition-all duration-300">
                            <div
                                class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-brand-light dark:bg-white/5 shadow-inner flex items-center justify-center shrink-0 text-brand-navy dark:text-brand-blue group-hover:bg-brand-blue group-hover:text-white transition-all duration-300">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                            </div>
                            <div>
                                <h3
                                    class="font-black text-sm md:text-base text-brand-navy dark:text-white uppercase tracking-widest mb-1 transition-colors">
                                    Contact</h3>
                                <p
                                    class="text-gray-500 dark:text-slate-400 text-sm md:text-lg leading-tight font-medium transition-colors">
                                    +233 20 437 4782</p>
                                <p
                                    class="text-gray-500 dark:text-slate-400 text-sm md:text-lg leading-tight font-medium transition-colors">
                                    +233 59 409 7370</p>
                            </div>
                        </div>

                        <div
                            class="group flex items-start gap-5 p-6 md:p-8 bg-white dark:bg-slate-900 rounded-3xl border border-slate-100 dark:border-white/5 shadow-sm transition-all duration-300">
                            <div
                                class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-brand-light dark:bg-white/5 shadow-inner flex items-center justify-center shrink-0 text-brand-navy dark:text-brand-blue group-hover:bg-brand-blue group-hover:text-white transition-all duration-300">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                            </div>
                            <div>
                                <h3
                                    class="font-black text-sm md:text-base text-brand-navy dark:text-white uppercase tracking-widest mb-1 transition-colors">
                                    Email</h3>
                                <a href="mailto:shub80746@gmail.com"
                                    class="text-gray-500 dark:text-slate-400 text-sm md:text-lg hover:text-brand-blue transition-colors font-medium border-b border-transparent hover:border-brand-blue transition-all">
                                    shub80746@gmail.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateX(3rem);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>

<?php get_footer(); ?>