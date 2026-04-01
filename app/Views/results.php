<!-- Hero Banner with Breadcrumbs -->
<section class="relative h-[320px] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img alt="Campus Architecture" class="w-full h-full object-cover grayscale brightness-50" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjqcwk9x7x8VVt_9vVnPfuWcP4sznI1kLVo6zgDwjfl5wPlJc1C6HfirTkcgXoDt69SZeqOE_3JI0TRlEsvEDfwDKW7tYbTpF4tb2gJtc0pyekS2z4267jLkv3-8Sy4SHY63Kg_5f8huBp083LlA3NBMLSJoP3slaLDoykeGXxEYS9QBzFL6my37CvVXUEK6I3fTRyjvk4shl7zYK_P3iZRpfEcaRmaqRuTBnPTfZ3eS-M5XsY37TTjOPEAOVf8TkbccrjVqk2TQ"/>
        <div class="absolute inset-0 bg-gradient-to-r from-primary/80 to-primary/40"></div>
    </div>
    <div class="relative z-10 max-w-screen-2xl mx-auto px-8 w-full">
        <nav class="flex items-center gap-2 text-primary-fixed mb-6 font-label tracking-wider text-xs uppercase font-semibold">
            <a class="hover:text-emerald-400 text-white transition-colors" href="<?= base_url() ?>">Home</a>
            <span class="material-symbols-outlined text-white text-sm">chevron_right</span>
            <span class="text-emerald-400">Results Archive</span>
        </nav>
        <h1 class="text-5xl md:text-6xl font-extrabold text-white leading-tight max-w-2xl">
            Performance <br/><span class="text-emerald-400">Archives</span>
        </h1>
        <p class="text-white/80 mt-4 max-w-md text-lg leading-relaxed font-body">
            A comprehensive record of Prottasha Academic excellence across board and internal assessments.
        </p>
    </div>
</section>

<!-- Filter & Search Section -->
<section class="max-w-screen-2xl mx-auto px-8 -mt-12 relative z-20">
    <div class="bg-white p-8 rounded-xl shadow-xl border-b-4 border-accent">
        <div class="flex flex-col md:flex-row gap-6 items-end">
            <div class="flex-1 w-full">
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2">Search Exam Name</label>
                <div class="relative">
                    <input class="w-full bg-slate-50 border-2 border-slate-100 rounded-lg py-3 px-4 focus:ring-2 focus:ring-primary focus:bg-white transition-all outline-none" placeholder="e.g. SSC 2023" type="text"/>
                    <span class="material-symbols-outlined absolute right-3 top-3 text-slate-400">search</span>
                </div>
            </div>
            <div class="w-full md:w-48">
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2">Year</label>
                <select class="w-full bg-slate-50 border-2 border-slate-100 rounded-lg py-3 px-4 focus:ring-2 focus:ring-primary focus:bg-white transition-all outline-none">
                    <option>All Years</option>
                    <?php foreach ($years as $year): ?>
                        <option><?= $year ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="w-full md:w-48">
                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2">Class</label>
                <select class="w-full bg-slate-50 border-2 border-slate-100 rounded-lg py-3 px-4 focus:ring-2 focus:ring-primary focus:bg-white transition-all outline-none">
                    <option>All Classes</option>
                    <?php foreach ($classes as $cls): ?>
                        <option><?= esc($cls) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="bg-primary text-white px-8 py-3.5 rounded-lg font-black uppercase text-[10px] tracking-widest hover:brightness-110 active:scale-95 transition-all flex items-center gap-2 shadow-lg shadow-primary/20">
                <span class="material-symbols-outlined text-sm">filter_alt</span>
                Apply Filters
            </button>
        </div>
    </div>
</section>

<!-- Board Exam Results -->
<section class="max-w-screen-2xl mx-auto px-8 mt-20">
    <div class="flex items-center gap-4 mb-8">
        <div class="w-2 h-8 bg-accent rounded-full"></div>
        <h2 class="text-3xl font-black text-primary tracking-tight font-headline">Board Exam Results</h2>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900 text-white">
                        <th class="px-8 py-5 text-[10px] uppercase tracking-widest font-black">Exam Name</th>
                        <th class="px-8 py-5 text-[10px] uppercase tracking-widest font-black text-center">Year</th>
                        <th class="px-8 py-5 text-[10px] uppercase tracking-widest font-black text-center">Excellence Status</th>
                        <th class="px-8 py-5 text-[10px] uppercase tracking-widest font-black text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php foreach ($boardResults as $res): ?>
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-8 py-6">
                            <div class="font-black text-primary group-hover:text-accent transition-colors text-lg"><?= esc($res['exam_name']) ?></div>
                            <div class="text-[10px] text-gray-500 font-bold uppercase tracking-wide mt-1"><?= esc($res['category']) ?></div>
                        </td>
                        <td class="px-8 py-6 text-center font-bold text-secondary text-lg"><?= esc($res['year']) ?></td>
                        <td class="px-8 py-6 text-center">
                           <span class="bg-emerald-50 text-emerald-700 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest border border-emerald-100">
                               <?= esc($res['stats']) ?>
                           </span>
                        </td>
                        <td class="px-8 py-6 text-right">
                            <a href="<?= esc($res['download_url']) ?>" target="_blank" class="inline-flex items-center gap-2 bg-primary text-white px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-accent transition-all shadow-md shadow-primary/20">
                                <span>Download</span>
                                <span class="material-symbols-outlined text-sm">download</span>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Internal Exam Results -->
<section class="max-w-screen-2xl mx-auto px-8 mt-20 mb-20">
    <div class="flex items-center gap-4 mb-8">
        <div class="w-2 h-8 bg-primary rounded-full"></div>
        <h2 class="text-3xl font-black text-secondary tracking-tight font-headline">Internal Assessment Archive</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php foreach ($internalResults as $int): ?>
        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:border-primary/20 transition-all group relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-bl-full -mr-12 -mt-12 transition-all group-hover:scale-150 group-hover:bg-primary/10"></div>
            
            <div class="flex justify-between items-start mb-6">
                <span class="text-[10px] font-black text-primary uppercase tracking-[0.2em] bg-emerald-50 px-3 py-1 rounded-full">Session <?= $int['year'] ?></span>
                <span class="material-symbols-outlined text-slate-300 group-hover:text-primary transition-colors">description</span>
            </div>
            
            <h3 class="text-2xl font-black text-slate-800 mb-2 font-headline leading-tight group-hover:text-primary transition-colors"><?= esc($int['exam_name']) ?></h3>
            <p class="text-sm text-gray-500 mb-8 leading-relaxed font-medium"><?= esc($int['stats']) ?></p>
            
            <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                <div class="flex flex-col">
                    <span class="text-[9px] uppercase font-black text-gray-400 tracking-widest">Class Category</span>
                    <span class="text-xs font-bold text-secondary uppercase tracking-tight"><?= esc($int['class_category']) ?></span>
                </div>
                <a href="<?= esc($int['download_url']) ?>" target="_blank" class="bg-slate-900 text-white px-5 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-accent transition-all shadow-lg active:scale-95">
                    View Results
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Official Transcript Banner -->
<section class="max-w-screen-2xl mx-auto px-8 mb-24">
    <div class="bg-slate-900 relative overflow-hidden rounded-[40px] p-12 md:p-20 flex flex-col md:flex-row items-center gap-12 border-[8px] border-white shadow-2xl">
        <div class="absolute top-0 right-0 w-full h-full opacity-5 pointer-events-none">
            <span class="material-symbols-outlined text-[400px] absolute -right-20 -bottom-20 rotate-12">school</span>
        </div>
        
        <div class="relative z-10 flex-1">
            <h2 class="text-4xl md:text-5xl font-black text-white leading-tight mb-6 font-headline tracking-tighter">Need an <span class="text-emerald-400">Official Transcript?</span></h2>
            <p class="text-gray-400 text-lg mb-8 max-w-xl font-medium leading-relaxed">Verified official academic transcripts for immigration or higher studies are processed through the registrar's office with a <span class="text-white font-bold underline decoration-emerald-400">48-hour turnaround</span>.</p>
            <div class="flex flex-wrap gap-4">
                <button class="bg-emerald-500 text-white px-8 py-4 rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-emerald-400 transition-all flex items-center gap-3 shadow-xl shadow-emerald-500/20">
                    <span class="material-symbols-outlined">verified_user</span>
                    Request Verification
                </button>
                <button class="border-2 border-white/10 text-white px-8 py-4 rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-white/5 transition-all">
                    Transcript Guide
                </button>
            </div>
        </div>
        
        <div class="relative z-10 w-full md:w-1/3 bg-white/5 backdrop-blur-3xl border border-white/10 p-10 rounded-[32px]">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-14 h-14 bg-emerald-500 rounded-2xl shadow-lg shadow-emerald-500/30 flex items-center justify-center rotate-3">
                    <span class="material-symbols-outlined text-white text-3xl">contact_support</span>
                </div>
                <div>
                    <h4 class="text-white font-black text-xl tracking-tight">Inquiry Desk</h4>
                    <p class="text-emerald-400 text-[10px] font-black uppercase tracking-widest">Registrar Division</p>
                </div>
            </div>
            <div class="space-y-6">
                <div class="flex flex-col gap-1">
                    <span class="text-[9px] font-black text-gray-500 uppercase tracking-widest">Office Hotline</span>
                    <span class="text-white font-black text-lg">+880 2 1234567</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="text-[9px] font-black text-gray-500 uppercase tracking-widest">Official Support</span>
                    <span class="text-emerald-400 font-bold">results@prottasha.edu</span>
                </div>
            </div>
        </div>
    </div>
</section>