<footer class="bg-[#050505] text-white pt-32 pb-12 font-sans border-t border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Top Row: Brand & Newsletter -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-24 items-start">
            <div class="lg:col-span-5">
                <a href="<?php echo esc_url(home_url('/')); ?>"
                    class="text-5xl font-black text-red-600 tracking-tighter mb-6 block">
                    PulseView<span class="text-white">.</span>
                </a>
                <div class="flex items-center gap-4 mb-8">
                    <span class="h-px w-8 bg-red-600"></span>
                    <p class="text-[10px] font-black uppercase tracking-[0.4em] text-gray-500">Truth • Speed • Depth</p>
                </div>
                <p class="text-gray-400 text-lg leading-relaxed max-w-md mb-10 font-medium">
                    We monitor the global collective consciousness, tracing the patterns that shape our shared future.
                </p>

                <!-- Social Links -->
                <div class="flex gap-3">
                    <?php
                    $socials = ['Twitter', 'Instagram', 'LinkedIn'];
                    foreach ($socials as $social):
                        ?>
                        <button
                            class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center hover:bg-red-600 hover:border-red-600 transition-all group"
                            aria-label="<?php echo esc_attr($social); ?>">
                            <span
                                class="text-[10px] font-black uppercase tracking-tighter text-gray-400 group-hover:text-white transition-colors">
                                <?php echo substr($social, 0, 2); ?>
                            </span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div
                class="lg:col-span-7 bg-white/[0.03] border border-white/5 rounded-[2.5rem] p-8 md:p-12 relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-red-600/5 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/2">
                </div>
                <div class="relative z-10">
                    <h3 class="text-2xl font-serif font-bold mb-4 italic text-red-100">Subscribe to The Dispatch.</h3>
                    <p class="text-gray-400 text-sm mb-8 max-w-sm font-medium">Get our high-fidelity daily briefing
                        delivered straight to your inbox every morning at 6:00 AM.</p>

                    <form class="flex flex-col sm:flex-row gap-3">
                        <input type="email" placeholder="name@company.com"
                            class="flex-grow bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm focus:outline-none focus:border-red-600 focus:bg-white/10 transition-all placeholder:text-gray-600" />
                        <button
                            class="bg-red-600 text-white px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-[11px] hover:bg-white hover:text-red-600 transition-all shadow-xl hover:shadow-red-900/20 active:scale-95">
                            Join The Pulse
                        </button>
                    </form>
                    <p class="text-[9px] text-gray-600 font-bold uppercase tracking-widest mt-6">No spam. Only
                        high-impact journalism. Unsubscribe anytime.</p>
                </div>
            </div>
        </div>

        <!-- Middle Row: Links Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-12 mb-24 pt-24 border-t border-white/5">

            <?php if (is_active_sidebar('footer-1')): ?>
                <?php dynamic_sidebar('footer-1'); ?>
            <?php else: ?>
                <div>
                    <h4 class="font-black text-[10px] uppercase tracking-[0.3em] text-red-600 mb-8">The Beats</h4>
                    <ul class="space-y-4">
                        <?php
                        $beats = get_categories(array('orderby' => 'count', 'order' => 'DESC', 'number' => 6));
                        if ($beats):
                            foreach ($beats as $beat):
                                ?>
                                <li>
                                    <a href="<?php echo esc_url(get_category_link($beat->term_id)); ?>"
                                        class="text-gray-400 text-sm hover:text-white transition-all font-medium flex items-center gap-2 group">
                                        <span class="w-0 h-px bg-red-600 group-hover:w-3 transition-all"></span>
                                        <?php echo esc_html($beat->name); ?>
                                    </a>
                                </li>
                            <?php endforeach;
                        else: ?>
                            <li><span class="text-gray-600 text-sm">No categories yet.</span></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div>
                    <h4 class="font-black text-[10px] uppercase tracking-[0.3em] text-red-600 mb-8">Platform</h4>
                    <ul class="space-y-4">
                        <?php
                        // Show Pages
                        $pages = get_pages(array('number' => 5, 'sort_column' => 'menu_order'));
                        if ($pages):
                            foreach ($pages as $p):
                                ?>
                                <li><a href="<?php echo get_permalink($p->ID); ?>"
                                        class="text-gray-400 text-sm hover:text-white transition-all font-medium flex items-center gap-2 group"><span
                                            class="w-0 h-px bg-red-600 group-hover:w-3 transition-all"></span><?php echo esc_html($p->post_title); ?></a>
                                </li>
                            <?php endforeach;
                        else: ?>
                            <li><span class="text-gray-600 text-sm">No pages found.</span></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div>
                    <h4 class="font-black text-[10px] uppercase tracking-[0.3em] text-red-600 mb-8">Company</h4>
                    <ul class="space-y-4">
                        <?php
                        // Just listing more pages or specific ones if needed, for now let's show archives
                        ?>
                        <li><a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>"
                                class="text-gray-400 text-sm hover:text-white transition-all font-medium flex items-center gap-2 group"><span
                                    class="w-0 h-px bg-red-600 group-hover:w-3 transition-all"></span>Projects</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>"
                                class="text-gray-400 text-sm hover:text-white transition-all font-medium flex items-center gap-2 group"><span
                                    class="w-0 h-px bg-red-600 group-hover:w-3 transition-all"></span>Contact</a></li>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Status Column -->
            <div>
                <h4 class="font-black text-[10px] uppercase tracking-[0.3em] text-red-600 mb-8">Pulse Health</h4>
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <span
                            class="w-2 h-2 bg-green-500 rounded-full animate-pulse shadow-[0_0_8px_rgba(34,197,94,0.6)]"></span>
                        <span class="text-[11px] font-bold text-gray-500 uppercase tracking-widest">Network
                            Online</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="w-2 h-2 bg-blue-500 rounded-full shadow-[0_0_8px_rgba(59,130,246,0.6)]"></span>
                        <span class="text-[11px] font-bold text-gray-500 uppercase tracking-widest">Global CDN
                            Active</span>
                    </div>
                    <p class="text-[10px] text-gray-600 leading-relaxed font-bold uppercase tracking-tighter">
                        Last Intelligence Sync:<br />
                        <span class="text-gray-400"><?php echo date('h:i:s A'); ?></span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Bottom Bar: Legal & Credit -->
        <div class="flex flex-col md:flex-row justify-between items-center pt-12 border-t border-white/5 gap-8">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <p class="text-gray-600 text-[10px] font-black uppercase tracking-widest">
                    &copy; <?php echo date('Y'); ?> PulseView Digital Media Group.
                </p>
                <div class="flex gap-6">
                    <a href="#"
                        class="text-gray-600 text-[10px] uppercase font-bold tracking-widest hover:text-red-600 transition-colors">Privacy</a>
                    <a href="#"
                        class="text-gray-600 text-[10px] uppercase font-bold tracking-widest hover:text-red-600 transition-colors">Legal</a>
                    <a href="#"
                        class="text-gray-600 text-[10px] uppercase font-bold tracking-widest hover:text-red-600 transition-colors">Sitemap</a>
                </div>
            </div>

            <div class="flex items-center gap-8">
                <div class="hidden sm:flex items-center gap-2">
                    <div class="w-4 h-4 bg-white/5 rounded flex items-center justify-center p-1">
                        <div class="w-full h-full bg-red-600 rounded-[1px]"></div>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-gray-500">Tier 1 Newsroom</span>
                </div>
                <button onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
                    class="group flex items-center gap-3 bg-white/5 hover:bg-red-600 px-6 py-3 rounded-full transition-all border border-white/5 hover:border-red-600"
                    aria-label="Scroll to top">
                    <span
                        class="text-[9px] font-black uppercase tracking-[0.2em] text-gray-400 group-hover:text-white transition-colors">Back
                        to Top</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-3 w-3 text-red-600 group-hover:text-white group-hover:-translate-y-1 transition-all"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="3"
                            d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</footer>

<!-- Search Modal (Using pure HTML/JS from React SearchModal.tsx) -->
<div id="search-modal" class="fixed inset-0 z-[100] hidden">
    <!-- Backdrop -->
    <div id="search-backdrop" class="absolute inset-0 bg-black/80 backdrop-blur-sm transition-opacity opacity-0"></div>

    <!-- Modal Content -->
    <div id="search-content"
        class="absolute top-0 left-0 w-full bg-white transform -translate-y-full transition-transform duration-300 ease-out shadow-2xl">
        <div class="max-w-4xl mx-auto px-4 py-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-xs font-black uppercase tracking-widest text-red-600">Search The Pulse</h2>
                <button id="search-close" class="p-2 hover:bg-gray-100 rounded-full transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative mb-12">
                <input type="text" name="s" autoFocus placeholder="Type to search..."
                    class="w-full text-4xl md:text-5xl font-serif font-bold text-gray-900 placeholder:text-gray-200 outline-none border-b-2 border-transparent focus:border-red-600 pb-4 transition-all" />
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 opacity-60 hover:opacity-100 transition-opacity">
                <div>
                    <h3 class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4">Trending Topics</h3>
                    <div class="flex flex-wrap gap-2">
                        <?php
                        $tags = get_tags(array('number' => 5, 'orderby' => 'count', 'order' => 'DESC'));
                        if ($tags) {
                            foreach ($tags as $tag) {
                                echo '<a href="' . get_tag_link($tag->term_id) . '" class="bg-gray-100 px-3 py-1 rounded-full text-xs font-bold text-gray-600 hover:bg-red-600 hover:text-white transition-colors">#' . $tag->name . '</a>';
                            }
                        } else {
                            echo '<span class="text-xs text-gray-400">No tags found.</span>';
                        }
                        ?>
                    </div>
                </div>
                <div>
                    <h3 class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4">Recent Archives</h3>
                    <ul class="space-y-2">
                        <?php
                        $recent_posts = wp_get_recent_posts(array('numberposts' => 3));
                        foreach ($recent_posts as $post) {
                            echo '<li><a href="' . get_permalink($post['ID']) . '" class="text-sm font-serif font-bold text-gray-800 hover:text-red-600 transition-colors">' . $post['post_title'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchToggle = document.getElementById('search-toggle');
        const searchModal = document.getElementById('search-modal');
        const searchBackdrop = document.getElementById('search-backdrop');
        const searchContent = document.getElementById('search-content');
        const searchClose = document.getElementById('search-close');

        function openSearch() {
            searchModal.classList.remove('hidden');
            // Trigger reflow
            void searchModal.offsetWidth;

            searchBackdrop.classList.remove('opacity-0');
            searchContent.classList.remove('-translate-y-full');

            // Focus input
            const input = searchModal.querySelector('input');
            if (input) setTimeout(() => input.focus(), 100);
        }

        function closeSearch() {
            searchBackdrop.classList.add('opacity-0');
            searchContent.classList.add('-translate-y-full');

            setTimeout(() => {
                searchModal.classList.add('hidden');
            }, 300);
        }

        if (searchToggle) searchToggle.addEventListener('click', openSearch);
        if (searchClose) searchClose.addEventListener('click', closeSearch);
        if (searchBackdrop) searchBackdrop.addEventListener('click', closeSearch);
    });
</script>

<?php wp_footer(); ?>
</body>

</html>