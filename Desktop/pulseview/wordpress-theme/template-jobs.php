<?php
/**
 * Template Name: Job Board
 * 
 * @package PulseView
 */

get_header();
?>

<div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <section class="bg-black text-white pt-24 pb-20 overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="flex items-center gap-4 mb-8">
                <span class="h-px w-12 bg-red-600"></span>
                <span class="text-[10px] font-black uppercase tracking-[0.4em] text-red-500">Careers at PulseView</span>
            </div>
            <h1 class="text-6xl md:text-8xl font-serif font-bold mb-10 tracking-tighter">
                Join the <span class="text-red-600 italic underline decoration-white/20">Movement</span>.
            </h1>
            <p class="max-w-2xl text-xl text-gray-400 leading-relaxed font-medium">
                We are building the definitive news platform for the high-fidelity era. We're looking for thinkers,
                creators, and builders who care about the truth.
            </p>
        </div>
        <div
            class="absolute top-0 right-0 w-1/3 h-full bg-red-600/10 blur-[120px] rounded-full translate-x-1/2 -translate-y-1/2">
        </div>
    </section>

    <!-- Interface Section -->
    <section class="max-w-7xl mx-auto px-4 -mt-10 mb-24 relative z-20">
        <div class="bg-white rounded-[2.5rem] shadow-2xl border border-gray-100 p-8 md:p-12">

            <!-- Static Controls for UI Mock -->
            <div class="flex flex-col lg:flex-row gap-8 items-center justify-between mb-16">
                <div class="w-full lg:max-w-md relative group">
                    <input type="text" placeholder="Search by role or department..."
                        class="w-full bg-gray-50 border-2 border-transparent focus:border-red-600 focus:bg-white rounded-2xl px-6 py-5 text-lg font-medium transition-all outline-none" />
                    <div
                        class="absolute right-6 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-red-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 justify-center">
                    <?php
                    $filters = ['All', 'Editorial', 'Engineering', 'Product', 'Design', 'Marketing'];
                    foreach ($filters as $i => $f) {
                        $active = $i === 0 ? 'bg-red-600 text-white shadow-lg' : 'bg-gray-100 text-gray-500 hover:bg-gray-200';
                        echo "<button class='px-6 py-3 rounded-full text-xs font-bold uppercase tracking-widest transition-all {$active}'>{$f}</button>";
                    }
                    ?>
                </div>
            </div>

            <!-- Job List (Static Mock as per design) -->
            <div class="space-y-4">
                <?php
                // Mock Jobs
                $jobs = [
                    ['title' => 'Senior Political Editor', 'dept' => 'Editorial', 'loc' => 'London/Remote', 'type' => 'Full-time', 'posted' => '2d ago', 'salary' => '$85k - $110k'],
                    ['title' => 'Full Stack Engineer (React/Next)', 'dept' => 'Engineering', 'loc' => 'Remote', 'type' => 'Full-time', 'posted' => '3d ago', 'salary' => '$120k - $160k']
                ];
                foreach ($jobs as $job):
                    ?>
                    <div
                        class="group p-8 rounded-3xl border border-gray-100 hover:border-red-200 hover:bg-red-50/30 transition-all flex flex-col md:flex-row md:items-center justify-between gap-8">
                        <div class="flex-grow">
                            <div class="flex items-center gap-3 mb-2">
                                <span
                                    class="px-3 py-1 bg-red-100 text-red-600 text-[9px] font-black uppercase tracking-widest rounded-full"><?php echo $job['dept']; ?></span>
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">• Posted
                                    <?php echo $job['posted']; ?></span>
                            </div>
                            <h3 class="text-2xl font-bold group-hover:text-red-600 transition-colors">
                                <?php echo $job['title']; ?></h3>
                            <div class="flex flex-wrap gap-4 mt-4">
                                <div
                                    class="flex items-center gap-2 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    <span class="text-gray-400">📍</span> <?php echo $job['loc']; ?>
                                </div>
                                <div
                                    class="flex items-center gap-2 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    <span class="text-gray-400">💼</span> <?php echo $job['type']; ?>
                                </div>
                                <div
                                    class="flex items-center gap-2 text-xs font-bold text-red-600/60 uppercase tracking-wider">
                                    <span class="text-gray-400">💰</span> <?php echo $job['salary']; ?>
                                </div>
                            </div>
                        </div>
                        <button
                            class="whitespace-nowrap bg-black text-white px-10 py-5 rounded-2xl font-black uppercase tracking-widest text-[11px] hover:bg-red-600 transition-all active:scale-95 shadow-lg group-hover:shadow-red-200">
                            Apply Now
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Perks Section -->
    <section class="bg-gray-50 py-32">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-serif font-bold mb-6">Why work with us?</h2>
                <p class="text-gray-500 max-w-xl mx-auto font-medium">We invest in our people so they can invest in the
                    stories that matter.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Perks Mock -->
                <div
                    class="bg-white p-12 rounded-[2.5rem] border border-gray-100 text-center hover:-translate-y-2 transition-transform">
                    <div class="text-5xl mb-8">🌍</div>
                    <h3 class="text-xl font-bold mb-4">Remote First</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Work from anywhere in the world. We value outcomes
                        over desk-time.</p>
                </div>
                <div
                    class="bg-white p-12 rounded-[2.5rem] border border-gray-100 text-center hover:-translate-y-2 transition-transform">
                    <div class="text-5xl mb-8">🧠</div>
                    <h3 class="text-xl font-bold mb-4">Health & Wellness</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Comprehensive premium health coverage and mental
                        health support.</p>
                </div>
                <div
                    class="bg-white p-12 rounded-[2.5rem] border border-gray-100 text-center hover:-translate-y-2 transition-transform">
                    <div class="text-5xl mb-8">📚</div>
                    <h3 class="text-xl font-bold mb-4">Learning Budget</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Annual stipend for books, courses, and conferences
                        to sharpen your pulse.</p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
