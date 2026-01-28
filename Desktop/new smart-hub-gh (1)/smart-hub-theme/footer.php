<footer class="sticky bottom-0 -z-0 w-full bg-slate-50 dark:bg-slate-950 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-8">

            <!-- Big Brand & CTA Section -->
            <div class="lg:col-span-6 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-4 mb-8">
                        <img src="<?php echo get_template_directory_uri(); ?>/SMART-HUB-LOGO-ORIGINAL.png"
                            alt="Smart Hub Logo" class="h-20 w-auto object-contain" />
                        <h2
                            class="text-4xl md:text-6xl font-black text-brand-navy dark:text-white tracking-tighter uppercase leading-none">
                            Impact <br />
                            <span class="text-brand-blue">Starts Now.</span>
                        </h2>
                    </div>
                    <p
                        class="text-slate-500 dark:text-slate-400 text-lg md:text-xl font-medium max-w-md mb-10 leading-relaxed transition-colors">
                        Empowering the next generation of Ghanaian leaders through digital innovation and health
                        advocacy.
                    </p>
                </div>

                <div class="flex flex-wrap gap-4">
                    <a href="https://www.facebook.com/share/1LdwoM8NGF/" target="_blank" rel="noopener noreferrer"
                        class="group flex items-center gap-3 px-6 py-4 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl hover:bg-brand-blue hover:border-brand-blue dark:hover:bg-brand-blue transition-all duration-300">
                        <span class="text-brand-navy dark:text-white group-hover:text-white transition-colors">FB</span>
                        <span
                            class="text-[10px] font-black uppercase tracking-widest text-brand-navy dark:text-white group-hover:text-white transition-colors">Facebook</span>
                    </a>
                    <a href="https://www.instagram.com/smarthub_gh?igsh=MWU5aW4zcHEwcHBrZg==" target="_blank"
                        rel="noopener noreferrer"
                        class="group flex items-center gap-3 px-6 py-4 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl hover:bg-brand-blue hover:border-brand-blue dark:hover:bg-brand-blue transition-all duration-300">
                        <span class="text-brand-navy dark:text-white group-hover:text-white transition-colors">IG</span>
                        <span
                            class="text-[10px] font-black uppercase tracking-widest text-brand-navy dark:text-white group-hover:text-white transition-colors">Instagram</span>
                    </a>
                    <a href="https://www.linkedin.com/company/smarthub-gh/" target="_blank" rel="noopener noreferrer"
                        class="group flex items-center gap-3 px-6 py-4 bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl hover:bg-brand-blue hover:border-brand-blue dark:hover:bg-brand-blue transition-all duration-300">
                        <span class="text-brand-navy dark:text-white group-hover:text-white transition-colors">IN</span>
                        <span
                            class="text-[10px] font-black uppercase tracking-widest text-brand-navy dark:text-white group-hover:text-white transition-colors">LinkedIn</span>
                    </a>
                </div>
            </div>

            <!-- Links Column -->
            <div class="lg:col-span-3">
                <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-brand-green mb-8">Navigation</h4>
                <ul class="space-y-4">
                    <?php
                    $footer_links = [
                        'About the Hub' => '/about',
                        'Impact Projects' => '/projects',
                        'Photo Gallery' => '/gallery',
                        'News Updates' => '/blog',
                        'Support Us' => '/contact'
                    ];
                    foreach ($footer_links as $name => $path): ?>
                        <li>
                            <a href="<?php echo home_url($path); ?>"
                                class="text-2xl md:text-3xl font-black text-brand-navy dark:text-white uppercase tracking-tighter hover:text-brand-blue dark:hover:text-brand-blue transition-all inline-flex items-center gap-2 group">
                                <?php echo $name; ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="opacity-0 -translate-y-2 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
                                    <path d="M7 17L17 7" />
                                    <path d="M7 7h10v10" />
                                </svg>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contact Column -->
            <div class="lg:col-span-3">
                <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-brand-green mb-8">Get in Touch</h4>
                <div class="space-y-8">
                    <div class="group cursor-default">
                        <div class="flex items-center gap-3 text-brand-blue mb-2">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <span class="text-[10px] font-black uppercase tracking-widest">Head Office</span>
                        </div>
                        <p
                            class="text-brand-navy dark:text-white font-bold leading-snug group-hover:text-brand-blue transition-colors">
                            Daglama Street, Near Mirage, <br />
                            Ho, Volta Region. AJ552
                        </p>
                    </div>

                    <div class="group cursor-default">
                        <div class="flex items-center gap-3 text-brand-blue mb-2">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                            <span class="text-[10px] font-black uppercase tracking-widest">Hotline</span>
                        </div>
                        <p
                            class="text-brand-navy dark:text-white font-bold leading-snug group-hover:text-brand-blue transition-colors">
                            +233 20 437 4782 <br />
                            +233 59 409 7370
                        </p>
                    </div>

                    <div class="group cursor-default">
                        <div class="flex items-center gap-3 text-brand-blue mb-2">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                            <span class="text-[10px] font-black uppercase tracking-widest">Email Us</span>
                        </div>
                        <a href="mailto:shub80746@gmail.com"
                            class="text-brand-navy dark:text-white font-bold leading-snug hover:text-brand-blue transition-colors block border-b border-slate-200 dark:border-white/10 pb-1">
                            shub80746@gmail.com
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom Credits -->
        <div
            class="mt-20 pt-10 border-t border-slate-200 dark:border-white/10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-4">
                <div class="flex gap-1 h-3">
                    <div class="w-4 bg-red-600"></div>
                    <div class="w-4 bg-yellow-400"></div>
                    <div class="w-4 bg-green-600"></div>
                </div>
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 dark:text-slate-500">
                    Smart Youth Connkt LBG • Based in Ghana
                </p>
            </div>

            <div class="flex items-center gap-8">
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 dark:text-slate-500">
                    ©
                    <?php echo date('Y'); ?> SMART HUB GH
                </p>
                <button onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
                    class="text-[10px] font-black uppercase tracking-widest text-brand-navy dark:text-white hover:text-brand-blue transition-colors flex items-center gap-2 group">
                    Back to Top
                    <span
                        class="w-6 h-6 rounded-full bg-slate-200 dark:bg-white/10 flex items-center justify-center group-hover:bg-brand-blue group-hover:text-white transition-all">
                        ↑
                    </span>
                </button>
            </div>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>