<!-- Page Banner & Breadcrumbs -->
<section class="relative min-h-[400px] flex items-center overflow-hidden bg-slate-900">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-tr from-primary-dark via-primary to-primary/30 opacity-90 mix-blend-multiply"></div>
        <img class="w-full h-full object-cover opacity-30 grayscale" src="https://images.unsplash.com/photo-1541339907198-e08756ebafe3?q=80&w=2000" alt="Institutional Leadership">
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-emerald-500/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-8 relative z-10 w-full py-20">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-12">
            <div class="flex-1">
                <nav class="flex items-center gap-2 text-emerald-400 mb-8 text-[11px] uppercase font-black tracking-[0.3em]">
                    <a class="hover:text-white transition-colors flex items-center gap-1" href="<?= base_url() ?>">
                        <span class="material-symbols-outlined text-sm">home</span>
                        <?= lang('App.breadcrumb.home') ?>
                    </a>
                    <span class="text-white/30">•</span>
                    <span class="text-white/50"><?= lang('App.nav.administration') ?></span>
                </nav>
                <h1 class="text-6xl md:text-8xl font-black font-headline text-white tracking-tighter leading-[0.9] mb-8">
                    <?= lang('App.headers.administration') ?>
                </h1>
                <p class="text-white/80 max-w-xl text-xl font-medium leading-relaxed italic border-l-4 border-emerald-500/30 pl-6">
                    "<?= lang('App.headers.administration_sub') ?>"
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Executive Leadership Section -->
<section class="max-w-7xl mx-auto px-8 py-28">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
        <!-- Principal Card (Hardcoded for aesthetics, localized quote) -->
        <div class="lg:col-span-12 bg-white rounded-[40px] p-10 md:p-16 flex flex-col md:flex-row gap-12 border-b-8 border-accent shadow-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-8 opacity-5 pointer-events-none group-hover:scale-110 transition-transform duration-700">
                <span class="material-symbols-outlined text-[200px]" style="font-variation-settings: 'FILL' 1;">school</span>
            </div>
            
            <div class="w-full md:w-[320px] aspect-[3/4] rounded-[32px] overflow-hidden shrink-0 border-8 border-slate-50 shadow-inner group-hover:border-emerald-50 transition-all duration-500">
                <img alt="Principal Portrait" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1000">
            </div>
            
            <div class="flex flex-col justify-center relative z-10 flex-1">
                <div class="inline-block mb-4">
                    <span class="text-accent font-black text-[10px] tracking-[0.3em] uppercase bg-red-50 px-4 py-1.5 rounded-full border border-red-100">Principal & Head Teacher</span>
                </div>
                <h2 class="text-4xl md:text-6xl font-black font-headline text-slate-900 mb-6 tracking-tighter">Dr. Mohammad <br class="hidden lg:block">Abdus Salam</h2>
                <div class="bg-slate-50 p-8 rounded-3xl mb-8 border-l-4 border-accent relative">
                    <span class="material-symbols-outlined text-accent/20 text-6xl absolute -top-8 right-4">format_quote</span>
                    <p class="text-slate-700 italic text-xl leading-relaxed font-serif">
                        "<?= lang('App.home.principal_quote') ?>"
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Administrative Staff Table -->
<section class="max-w-7xl mx-auto px-8 py-28 relative">
    <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-[80px]"></div>
    
    <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
        <div>
            <span class="text-primary font-black tracking-[0.3em] uppercase text-[10px] bg-emerald-50 px-3 py-1 rounded-full">Institutional Support</span>
            <h2 class="text-4xl md:text-5xl font-black font-headline text-slate-900 mt-4 tracking-tighter">Administrative Staff</h2>
        </div>
    </div>
    
    <div class="bg-white rounded-[40px] shadow-2xl border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900 text-white">
                        <th class="px-10 py-8 text-[10px] font-black uppercase tracking-[0.2em]">Full Name</th>
                        <th class="px-10 py-8 text-[10px] font-black uppercase tracking-[0.2em]">Responsibility</th>
                        <th class="px-10 py-8 text-[10px] font-black uppercase tracking-[0.2em]">Department</th>
                        <th class="px-10 py-8 text-[10px] font-black uppercase tracking-[0.2em] text-right">Contact</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    <?php if (empty($staffs)): ?>
                    <tr>
                        <td colspan="4" class="px-10 py-20 text-center text-slate-400 font-bold">No administrative staff members listed.</td>
                    </tr>
                    <?php else: foreach($staffs as $s): ?>
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-10 py-8">
                            <div class="flex items-center gap-4">
                                <?php if($s['photo']): ?>
                                    <img src="<?= base_url('uploads/staff/'.$s['photo']) ?>" class="w-12 h-12 rounded-xl object-cover border-2 border-slate-100">
                                <?php else: ?>
                                    <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-slate-400">
                                        <span class="material-symbols-outlined">person</span>
                                    </div>
                                <?php endif; ?>
                                <div class="font-black text-slate-800 text-lg group-hover:text-primary transition-colors"><?= esc(ld($s, 'name')) ?></div>
                            </div>
                        </td>
                        <td class="px-10 py-8">
                            <div class="text-slate-600 font-bold text-sm uppercase tracking-tight"><?= esc(ld($s, 'role')) ?></div>
                        </td>
                        <td class="px-10 py-8">
                            <div class="text-[10px] font-black text-primary/60 uppercase tracking-widest"><?= esc(ld($s, 'department')) ?></div>
                        </td>
                        <td class="px-10 py-8 text-right font-black text-slate-400 text-sm"><?= esc($s['contact']) ?></td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>