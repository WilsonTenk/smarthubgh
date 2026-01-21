<?php
/**
 * Template Name: Contact Page
 * 
 * @package PulseView
 */

get_header();

while (have_posts()):
    the_post();
    ?>

    <div class="max-w-4xl mx-auto px-4 py-20">
        <div class="mb-16">
            <h1 class="text-5xl font-serif font-bold mb-6"><?php the_title(); ?></h1>
            <div class="text-xl text-gray-500 leading-relaxed">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 mb-20">
            <div class="space-y-10">
                <div>
                    <h3 class="font-black text-xs uppercase tracking-widest text-red-600 mb-4">Newsroom Tips</h3>
                    <p class="text-gray-700">Have a breaking story or a confidential tip?</p>
                    <p class="text-black font-bold mt-2">tips@pulseview.media</p>
                </div>
                <div>
                    <h3 class="font-black text-xs uppercase tracking-widest text-red-600 mb-4">General Inquiries</h3>
                    <p class="text-gray-700">For feedback, questions, or comments.</p>
                    <p class="text-black font-bold mt-2">hello@pulseview.media</p>
                </div>
                <div>
                    <h3 class="font-black text-xs uppercase tracking-widest text-red-600 mb-4">Press & Media</h3>
                    <p class="text-gray-700">Requests for interviews or press releases.</p>
                    <p class="text-black font-bold mt-2">press@pulseview.media</p>
                </div>
            </div>

            <div class="bg-gray-50 p-10 rounded-3xl border border-gray-100">
                <h3 class="font-bold text-xl mb-6">Send a Message</h3>

                <?php if (shortcode_exists('contact-form-7')): ?>
                    <div class="contact-form-wrapper">
                        <?php
                        // Instructions: User should replace this with their actual shortcode or use the Widget area if I make one.
                        // But to be helpful, let's make it a widget area.
                        if (is_active_sidebar('contact-form-area')) {
                            dynamic_sidebar('contact-form-area');
                        } else {
                            echo '<p class="text-sm text-gray-500 mb-4">Please add your Contact Form 7 widget to the "Contact Form Area" in Appearance > Widgets, or paste the shortcode here in the template.</p>';
                            // Fallback static form for visuals if they haven't set it up yet, so layout isn't broken/empty
                            ?>
                            <form class="space-y-6" action="" method="post"
                                onsubmit="alert('Please install and configure Contact Form 7 to make this form functional.'); return false;">
                                <div>
                                    <label class="text-[10px] font-black uppercase text-gray-400 block mb-2">Your Name</label>
                                    <input type="text" disabled
                                        class="w-full bg-white border border-gray-200 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20"
                                        placeholder="Form not valid yet" />
                                </div>
                                <div>
                                    <label class="text-[10px] font-black uppercase text-gray-400 block mb-2">Email Address</label>
                                    <input type="email" disabled
                                        class="w-full bg-white border border-gray-200 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20" />
                                </div>
                                <div>
                                    <label class="text-[10px] font-black uppercase text-gray-400 block mb-2">Message</label>
                                    <textarea disabled rows="4"
                                        class="w-full bg-white border border-gray-200 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20"></textarea>
                                </div>
                                <button type="submit" disabled
                                    class="w-full py-4 bg-gray-400 text-white font-bold uppercase tracking-widest rounded-full cursor-not-allowed">
                                    Send Dispatch
                                </button>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                <?php else: ?>
                    <!-- Static Form Fallback (Visual Only) -->
                    <form class="space-y-6" action="" method="post">
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 block mb-2">Your Name</label>
                            <input type="text" name="contact_name"
                                class="w-full bg-white border border-gray-200 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20" />
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 block mb-2">Email Address</label>
                            <input type="email" name="contact_email"
                                class="w-full bg-white border border-gray-200 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20" />
                        </div>
                        <div>
                            <label class="text-[10px] font-black uppercase text-gray-400 block mb-2">Message</label>
                            <textarea name="contact_message" rows="4"
                                class="w-full bg-white border border-gray-200 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20"></textarea>
                        </div>
                        <button type="button" onclick="alert('This form requires the Contact Form 7 plugin.')"
                            class="w-full py-4 bg-red-600 text-white font-bold uppercase tracking-widest rounded-full hover:bg-red-700 transition-all shadow-lg hover:shadow-red-100">
                            Send Dispatch
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php
endwhile;

get_footer();
