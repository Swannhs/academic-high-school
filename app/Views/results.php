<!-- Hero Banner with Breadcrumbs -->
<section class="relative h-[320px] flex items-center overflow-hidden">
<div class="absolute inset-0 z-0">
<img alt="Campus Architecture" class="w-full h-full object-cover grayscale brightness-50" data-alt="stately classical academic building facade with grand columns under a clear blue sky, professional architectural photography" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjqcwk9x7x8VVt_9vVnPfuWcP4sznI1kLVo6zgDwjfl5wPlJc1C6HfirTkcgXoDt69SZeqOE_3JI0TRlEsvEDfwDKW7tYbTpF4tb2gJtc0pyekS2z4267jLkv3-8Sy4SHY63Kg_5f8huBp083LlA3NBMLSJoP3slaLDoykeGXxEYS9QBzFL6my37CvVXUEK6I3fTRyjvk4shl7zYK_P3iZRpfEcaRmaqRuTBnPTfZ3eS-M5XsY37TTjOPEAOVf8TkbccrjVqk2TQ"/>
<div class="absolute inset-0 bg-gradient-to-r from-primary/80 to-primary/40"></div>
</div>
<div class="relative z-10 max-w-screen-2xl mx-auto px-8 w-full">
<nav class="flex items-center gap-2 text-primary-fixed mb-6 font-label tracking-wider text-xs uppercase font-semibold">
<a class="hover:text-on-primary-container transition-colors" href="<?= base_url() ?>">Home</a>
<span class="material-symbols-outlined text-sm">chevron_right</span>
<a class="hover:text-on-primary-container transition-colors" href="#">Academics</a>
<span class="material-symbols-outlined text-sm">chevron_right</span>
<span class="text-white">Results Archive</span>
</nav>
<h1 class="text-5xl md:text-6xl font-extrabold text-white leading-tight max-w-2xl">
                    Performance <br/><span class="text-tertiary-fixed">Archives</span>
</h1>
<p class="text-white/80 mt-4 max-w-md text-lg leading-relaxed font-body">
                    A comprehensive record of Prottasha Academic excellence across board and internal assessments.
                </p>
</div>
</section>
<!-- Filter & Search Section -->
<section class="max-w-screen-2xl mx-auto px-8 -mt-12 relative z-20">
<div class="bg-surface-container-lowest p-8 rounded-xl shadow-xl border-b-4 border-tertiary">
<div class="flex flex-col md:flex-row gap-6 items-end">
<div class="flex-1 w-full">
<label class="block text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Search Exam Name</label>
<div class="relative">
<input class="w-full bg-surface-container-highest border-none rounded-none py-3 px-4 focus:ring-0 focus:border-primary border-b-2 border-transparent transition-all" placeholder="e.g. SSC 2023" type="text"/>
<span class="material-symbols-outlined absolute right-3 top-3 text-outline">search</span>
</div>
</div>
<div class="w-full md:w-48">
<label class="block text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Year</label>
<select class="w-full bg-surface-container-highest border-none rounded-none py-3 px-4 focus:ring-0 transition-all border-b-2 border-transparent">
<option>All Years</option>
<option>2024</option>
<option>2023</option>
<option>2022</option>
<option>2021</option>
</select>
</div>
<div class="w-full md:w-48">
<label class="block text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Class</label>
<select class="w-full bg-surface-container-highest border-none rounded-none py-3 px-4 focus:ring-0 transition-all border-b-2 border-transparent">
<option>All Classes</option>
<option>Class 10</option>
<option>Class 9</option>
<option>Class 8</option>
<option>HSC</option>
</select>
</div>
<button class="bg-primary text-on-primary px-8 py-3 rounded-lg font-bold hover:brightness-110 active:scale-95 transition-all flex items-center gap-2">
<span class="material-symbols-outlined text-sm">filter_alt</span>
                        Apply Filters
                    </button>
</div>
</div>
</section>
<!-- Board Exam Results -->
<section class="max-w-screen-2xl mx-auto px-8 mt-20">
<div class="flex items-baseline gap-4 mb-8">
<div class="w-1 h-8 bg-tertiary"></div>
<h2 class="text-3xl font-bold text-primary tracking-tight">Board Exam Results</h2>
<span class="text-outline text-sm font-label uppercase tracking-widest font-bold">Public Examinations</span>
</div>
<div class="bg-surface-container-low rounded-xl overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-secondary text-on-secondary">
<th class="px-8 py-5 text-[0.6875rem] uppercase tracking-widest font-bold">Exam Name</th>
<th class="px-8 py-5 text-[0.6875rem] uppercase tracking-widest font-bold">Category</th>
<th class="px-8 py-5 text-[0.6875rem] uppercase tracking-widest font-bold text-center">Year</th>
<th class="px-8 py-5 text-[0.6875rem] uppercase tracking-widest font-bold text-center">GPA 5.00</th>
<th class="px-8 py-5 text-[0.6875rem] uppercase tracking-widest font-bold text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/30">
<tr class="hover:bg-white transition-colors group">
<td class="px-8 py-6">
<div class="font-bold text-on-surface group-hover:text-primary transition-colors">SSC Examination 2023</div>
<div class="text-xs text-on-surface-variant font-medium">Science &amp; Humanities</div>
</td>
<td class="px-8 py-6">
<span class="bg-secondary-container/30 text-on-secondary-container px-3 py-1 rounded-full text-[10px] font-bold uppercase">Secondary</span>
</td>
<td class="px-8 py-6 text-center font-semibold text-secondary">2023</td>
<td class="px-8 py-6 text-center font-bold text-primary">142 Students</td>
<td class="px-8 py-6 text-right">
<button class="bg-surface-container-high hover:bg-primary hover:text-white text-primary p-2 rounded-lg transition-all active:scale-90 inline-flex items-center gap-2 px-4 py-2">
<span class="text-xs font-bold uppercase tracking-wider">Download</span>
<span class="material-symbols-outlined text-sm" data-weight="fill">download</span>
</button>
</td>
</tr>
<tr class="hover:bg-white transition-colors group">
<td class="px-8 py-6">
<div class="font-bold text-on-surface group-hover:text-primary transition-colors">HSC Examination 2022</div>
<div class="text-xs text-on-surface-variant font-medium">All Groups</div>
</td>
<td class="px-8 py-6">
<span class="bg-secondary-container/30 text-on-secondary-container px-3 py-1 rounded-full text-[10px] font-bold uppercase">Higher Secondary</span>
</td>
<td class="px-8 py-6 text-center font-semibold text-secondary">2022</td>
<td class="px-8 py-6 text-center font-bold text-primary">89 Students</td>
<td class="px-8 py-6 text-right">
<button class="bg-surface-container-high hover:bg-primary hover:text-white text-primary p-2 rounded-lg transition-all active:scale-90 inline-flex items-center gap-2 px-4 py-2">
<span class="text-xs font-bold uppercase tracking-wider">Download</span>
<span class="material-symbols-outlined text-sm" data-weight="fill">download</span>
</button>
</td>
</tr>
<tr class="hover:bg-white transition-colors group">
<td class="px-8 py-6">
<div class="font-bold text-on-surface group-hover:text-primary transition-colors">JSC Examination 2022</div>
<div class="text-xs text-on-surface-variant font-medium">General Education</div>
</td>
<td class="px-8 py-6">
<span class="bg-secondary-container/30 text-on-secondary-container px-3 py-1 rounded-full text-[10px] font-bold uppercase">Junior Secondary</span>
</td>
<td class="px-8 py-6 text-center font-semibold text-secondary">2022</td>
<td class="px-8 py-6 text-center font-bold text-primary">215 Students</td>
<td class="px-8 py-6 text-right">
<button class="bg-surface-container-high hover:bg-primary hover:text-white text-primary p-2 rounded-lg transition-all active:scale-90 inline-flex items-center gap-2 px-4 py-2">
<span class="text-xs font-bold uppercase tracking-wider">Download</span>
<span class="material-symbols-outlined text-sm" data-weight="fill">download</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</section>
<!-- Internal Exam Results - Bento Grid Style for Mobile, Table for Web -->
<section class="max-w-screen-2xl mx-auto px-8 mt-20">
<div class="flex items-baseline gap-4 mb-8">
<div class="w-1 h-8 bg-primary"></div>
<h2 class="text-3xl font-bold text-secondary tracking-tight">Internal Assessment Archive</h2>
<span class="text-outline text-sm font-label uppercase tracking-widest font-bold">Academic Sessions</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Internal Result Card 1 -->
<div class="bg-surface-container-lowest p-6 rounded-xl border-l-4 border-primary shadow-sm hover:shadow-md transition-shadow group">
<div class="flex justify-between items-start mb-6">
<span class="text-[0.6875rem] font-bold text-primary uppercase tracking-widest">Academic Year 2024</span>
<span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">description</span>
</div>
<h3 class="text-xl font-bold text-on-surface mb-2">Annual Examination 2023</h3>
<p class="text-sm text-on-surface-variant mb-6 leading-relaxed">Full consolidated result sheet for Class 6 to Class 9. Released on Dec 20, 2023.</p>
<div class="flex items-center justify-between pt-6 border-t border-outline-variant/30">
<div class="flex flex-col">
<span class="text-[10px] uppercase font-bold text-outline">Class Range</span>
<span class="text-xs font-semibold text-on-surface">VI - IX</span>
</div>
<button class="bg-secondary text-on-secondary px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wide hover:brightness-110 active:scale-95 transition-all">
                            View PDF
                        </button>
</div>
</div>
<!-- Internal Result Card 2 -->
<div class="bg-surface-container-lowest p-6 rounded-xl border-l-4 border-tertiary shadow-sm hover:shadow-md transition-shadow group">
<div class="flex justify-between items-start mb-6">
<span class="text-[0.6875rem] font-bold text-tertiary uppercase tracking-widest">Academic Year 2024</span>
<span class="material-symbols-outlined text-outline group-hover:text-tertiary transition-colors">description</span>
</div>
<h3 class="text-xl font-bold text-on-surface mb-2">Half Yearly Assessment</h3>
<p class="text-sm text-on-surface-variant mb-6 leading-relaxed">Cumulative performance report for the mid-session evaluations of 2024.</p>
<div class="flex items-center justify-between pt-6 border-t border-outline-variant/30">
<div class="flex flex-col">
<span class="text-[10px] uppercase font-bold text-outline">Target Class</span>
<span class="text-xs font-semibold text-on-surface">All Classes</span>
</div>
<button class="bg-secondary text-on-secondary px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wide hover:brightness-110 active:scale-95 transition-all">
                            View PDF
                        </button>
</div>
</div>
<!-- Internal Result Card 3 -->
<div class="bg-surface-container-lowest p-6 rounded-xl border-l-4 border-primary shadow-sm hover:shadow-md transition-shadow group">
<div class="flex justify-between items-start mb-6">
<span class="text-[0.6875rem] font-bold text-primary uppercase tracking-widest">Academic Year 2023</span>
<span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">description</span>
</div>
<h3 class="text-xl font-bold text-on-surface mb-2">Pre-Test Examination</h3>
<p class="text-sm text-on-surface-variant mb-6 leading-relaxed">Preliminary board preparation results for SSC candidates of session 2023-24.</p>
<div class="flex items-center justify-between pt-6 border-t border-outline-variant/30">
<div class="flex flex-col">
<span class="text-[10px] uppercase font-bold text-outline">Target Class</span>
<span class="text-xs font-semibold text-on-surface">Class X</span>
</div>
<button class="bg-secondary text-on-secondary px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wide hover:brightness-110 active:scale-95 transition-all">
                            View PDF
                        </button>
</div>
</div>
</div>
<div class="mt-12 text-center">
<button class="text-secondary font-bold text-sm uppercase tracking-widest flex items-center gap-2 mx-auto hover:text-primary transition-colors group">
                    Load More Archives
                    <span class="material-symbols-outlined group-hover:translate-y-1 transition-transform">keyboard_arrow_down</span>
</button>
</div>
</section>
<!-- Academic Distinction Banner -->
<section class="max-w-screen-2xl mx-auto px-8 mt-24 mb-12">
<div class="bg-primary relative overflow-hidden rounded-3xl p-12 md:p-20 flex flex-col md:flex-row items-center gap-12">
<div class="absolute top-0 right-0 w-1/2 h-full opacity-10">
<img alt="Academic Excellence" class="w-full h-full object-cover" data-alt="blurred background of a university graduation ceremony with silhouettes of students in caps and gowns" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB0Z7iygsA8MjIYVrnJGa3NAxBcGhppC8KJYOm1B0G5tW_3XTrLMl9tBaPfj13fgdPfySOJtrScNdFf9MUzbiuF3iOQTHJR9PgGP755eBIh-KuyW1enjJC7pAT595F43VpqfRnHktyakCeBGAxzn5ErcOSUMFyyHGnl4nHJZYEj0NZulFYO61nNqNvBdkWKoVHpjRyBRhallKXevUvKpRSQEFParKGHJUvWSQWxyclmrcvyzkOUMOhFSiHMlU-OskhK365AD-TDpw"/>
</div>
<div class="relative z-10 flex-1">
<h2 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-6">Need an <span class="text-tertiary-fixed">Official Transcript?</span></h2>
<p class="text-white/80 text-lg mb-8 max-w-xl">Verified official academic transcripts for immigration or higher studies are processed through the registrar's office with a 48-hour turnaround.</p>
<div class="flex flex-wrap gap-4">
<button class="bg-tertiary text-on-tertiary px-8 py-4 rounded-xl font-bold hover:brightness-110 transition-all flex items-center gap-3">
<span class="material-symbols-outlined">verified_user</span>
                            Request Verification
                        </button>
<button class="border-2 border-white/30 text-white px-8 py-4 rounded-xl font-bold hover:bg-white/10 transition-all">
                            Transcript Guide
                        </button>
</div>
</div>
<div class="relative z-10 w-full md:w-1/3 bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-2xl">
<div class="flex items-center gap-4 mb-6">
<div class="w-12 h-12 bg-tertiary rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-on-tertiary">contact_support</span>
</div>
<div>
<h4 class="text-white font-bold">Inquiry Desk</h4>
<p class="text-white/60 text-xs">Registrar Division</p>
</div>
</div>
<div class="space-y-4">
<div class="flex justify-between text-sm">
<span class="text-white/60">Phone:</span>
<span class="text-white font-medium">+880 2 1234567</span>
</div>
<div class="flex justify-between text-sm">
<span class="text-white/60">Email:</span>
<span class="text-white font-medium">results@prottasha.edu</span>
</div>
</div>
</div>
</div>
</section>