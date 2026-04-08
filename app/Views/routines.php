<section class="relative min-h-[400px] flex items-center overflow-hidden bg-slate-900 border-b border-white/5">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-tr from-primary-dark via-primary to-primary/30 opacity-90 mix-blend-multiply"></div>
        <img class="w-full h-full object-cover opacity-20 grayscale" src="https://images.unsplash.com/photo-1506784911079-5097eaa61ea8?q=80&w=2000" alt="Routines Header">
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-emerald-500/10 rounded-full blur-[120px]"></div>
    </div>
    <div class="max-w-7xl mx-auto px-8 relative z-10 w-full py-20 text-white">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-12">
            <div class="flex-1">
                <nav class="flex items-center gap-2 text-emerald-400 mb-8 text-[11px] uppercase font-black tracking-[0.3em]">
                    <a class="hover:text-white transition-colors flex items-center gap-1" href="<?= base_url() ?>">
                        <span class="material-symbols-outlined text-sm">home</span>
                        <?= lang('App.breadcrumb.home') ?>
                    </a>
                    <span class="text-white/30">•</span>
                    <span class="text-white/50"><?= lang('App.nav.routines') ?></span>
                </nav>
                <h1 class="text-6xl md:text-8xl font-black font-headline tracking-tighter leading-[0.9] mb-8">
                    <?= lang('App.headers.routines') ?>
                </h1>
                <p class="text-white/70 max-w-xl text-xl font-medium leading-relaxed italic border-l-4 border-emerald-500/30 pl-6">
                    "<?= lang('App.headers.routines_sub') ?>"
                </p>
            </div>
        </div>
    </div>
</section>

<div class="max-w-7xl mx-auto px-8 py-24 space-y-32">
    <!-- Section 1: Class Routines -->
    <section>
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-10">
            <div class="space-y-4">
                <span class="text-primary font-black tracking-[0.3em] uppercase text-[10px] bg-emerald-50 px-3 py-1 rounded-full">Academic Timetables</span>
                <h2 class="text-4xl font-black font-headline text-slate-900 tracking-tight leading-none">Class Routines</h2>
            </div>
            <p class="text-slate-500 max-w-md text-sm leading-relaxed font-medium">Weekly academic schedules categorized by class and section. Please ensure you are viewing the most recent update.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(empty($classRoutines)): ?>
                <div class="lg:col-span-3 text-center py-20 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
                    <p class="text-slate-400 font-bold">No class routines have been published yet.</p>
                </div>
            <?php else: foreach($classRoutines as $idx => $r): ?>
                <div class="<?= $idx === 0 ? 'lg:col-span-2' : '' ?> bg-white p-8 rounded-[40px] border border-slate-100 shadow-sm hover:shadow-2xl hover:border-primary/20 transition-all group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-[100px] -mr-16 -mt-16 group-hover:scale-150 group-hover:bg-primary/10 transition-transform duration-700"></div>
                    
                    <div class="flex justify-between items-start mb-8 relative z-10">
                        <div class="w-16 h-16 bg-emerald-500/10 text-emerald-600 rounded-2xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-3xl">school</span>
                        </div>
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-100">Updated: <?= date('M d, Y', strtotime($r['created_at'])) ?></span>
                    </div>
                    
                    <h3 class="text-2xl font-black font-headline text-slate-900 mb-4 tracking-tight group-hover:text-primary transition-colors"><?= esc(ld($r, 'title')) ?></h3>
                    <?php if($r['notes']): ?>
                        <p class="text-slate-500 text-sm mb-8 leading-relaxed font-medium line-clamp-2"><?= esc(ld($r, 'notes')) ?></p>
                    <?php endif; ?>
                    
                    <div class="flex items-center justify-between pt-8 border-t border-slate-50 relative z-10">
                        <div class="flex flex-col">
                            <span class="text-[9px] uppercase font-black text-slate-400 tracking-widest">Format</span>
                            <span class="text-xs font-black text-primary-dark uppercase">PDF DOCUMENT</span>
                        </div>
                        <a href="<?= base_url('uploads/routines/'.$r['file_path']) ?>" target="_blank" class="bg-slate-900 text-white px-8 py-3.5 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-emerald-500 transition-all shadow-xl active:scale-95 no-underline">Download Routine</a>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </section>

    <!-- Section 2: Exam Routines -->
    <section class="pb-24">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-10">
            <div class="space-y-4">
                <span class="text-red-600 font-black tracking-[0.3em] uppercase text-[10px] bg-red-50 px-3 py-1 rounded-full">Examination Board</span>
                <h2 class="text-4xl font-black font-headline text-slate-900 tracking-tight leading-none">Exam Routines</h2>
            </div>
            <p class="text-slate-500 max-w-md text-sm leading-relaxed font-medium">Seasonal and final assessment schedules for all academic departments and shifts.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <?php if(empty($examRoutines)): ?>
                <div class="lg:col-span-2 text-center py-20 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
                    <p class="text-slate-400 font-bold">No examination routines are currently available.</p>
                </div>
            <?php else: foreach($examRoutines as $idx => $r): ?>
                <div class="bg-slate-900 text-white p-12 rounded-[48px] shadow-2xl relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500 opacity-5 rounded-full blur-3xl -mr-32 -mt-32 group-hover:opacity-10 transition-opacity"></div>
                    
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-10 relative z-10">
                        <div class="space-y-6 flex-1">
                            <?php if($idx === 0): ?>
                                <span class="inline-flex items-center gap-2 bg-red-600 text-white px-4 py-1 rounded-full text-[9px] font-black uppercase tracking-[0.2em] animate-pulse">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                                    Published Today
                                </span>
                            <?php endif; ?>
                            <h3 class="text-3xl font-black font-headline tracking-tighter leading-tight text-white"><?= esc(ld($r, 'title')) ?></h3>
                            <div class="flex flex-wrap gap-6 font-black text-[10px] uppercase tracking-widest opacity-60">
                                <span class="flex items-center gap-2"><span class="material-symbols-outlined text-emerald-400 text-lg">calendar_month</span> <?= date('M d, Y', strtotime($r['created_at'])) ?></span>
                                <span class="flex items-center gap-2"><span class="material-symbols-outlined text-emerald-400 text-lg">history_edu</span> Final Assessment</span>
                            </div>
                            <?php if($r['notes']): ?>
                                <p class="text-gray-400 text-sm leading-relaxed font-medium"><?= esc(ld($r, 'notes')) ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="flex flex-col gap-4 w-full md:w-auto">
                            <a href="<?= base_url('uploads/routines/'.$r['file_path']) ?>" target="_blank" class="bg-emerald-500 text-white px-10 py-5 rounded-2xl font-black text-center text-xs uppercase tracking-widest hover:bg-emerald-400 hover:-translate-y-1 shadow-lg shadow-emerald-500/20 transition-all active:scale-95 no-underline">Download PDF</a>
                            <a href="<?= base_url('uploads/routines/'.$r['file_path']) ?>" target="_blank" class="bg-white/5 border border-white/10 text-white px-10 py-5 rounded-2xl font-black text-center text-xs uppercase tracking-widest hover:bg-white/10 transition-all no-underline">Full Screen</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </section>
</div>