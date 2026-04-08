<!-- Page Banner -->
<section class="relative min-h-[400px] flex items-center overflow-hidden bg-slate-900 border-b border-white/5">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-tr from-primary-dark via-primary to-primary/30 opacity-90 mix-blend-multiply"></div>
        <img class="w-full h-full object-cover opacity-20 grayscale" src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=2000" alt="Downloads Center">
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-primary/10 rounded-full blur-[120px]"></div>
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
                    <span class="text-white/50"><?= lang('App.nav.downloads') ?></span>
                </nav>
                <h1 class="text-6xl md:text-8xl font-black font-headline tracking-tighter leading-[0.9] mb-8">
                    <?= lang('App.headers.downloads') ?>
                </h1>
                <p class="text-white/70 max-w-xl text-xl font-medium leading-relaxed italic border-l-4 border-emerald-500/30 pl-6">
                    "<?= lang('App.headers.downloads_sub') ?>"
                </p>
            </div>
        </div>
    </div>
</section>

<div class="max-w-7xl mx-auto px-8 py-24">
    <!-- Search & Filter Section -->
    <div class="flex flex-col md:flex-row gap-6 mb-16 items-end border-b border-slate-100 pb-12">
        <div class="flex-1 w-full">
            <label class="block text-[10px] font-black tracking-widest text-slate-400 mb-4 uppercase">Search Resources</label>
            <div class="relative group">
                <input class="w-full bg-slate-50 border-none rounded-2xl px-14 py-5 focus:ring-2 focus:ring-primary focus:bg-white transition-all font-medium text-slate-700 shadow-inner" placeholder="Search by form name or keyword..." type="text"/>
                <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-slate-300">search</span>
            </div>
        </div>
    </div>

    <!-- Downloads Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if (empty($downloads)): ?>
            <div class="col-span-full py-32 text-center bg-slate-50 rounded-[48px] border-2 border-dashed border-slate-200">
                <span class="material-symbols-outlined text-8xl text-slate-200 mb-6">file_download_off</span>
                <p class="text-slate-400 font-bold uppercase tracking-widest">No downloadable resources are available at the moment.</p>
            </div>
        <?php else: foreach ($downloads as $idx => $dl): ?>
            <div class="bg-white p-8 rounded-[40px] border border-slate-100 shadow-sm hover:shadow-2xl hover:border-primary/20 transition-all group flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-8">
                        <div class="w-16 h-16 bg-slate-50 rounded-2xl flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-all duration-500">
                            <span class="material-symbols-outlined text-3xl">description</span>
                        </div>
                        <span class="text-[9px] font-black px-3 py-1 bg-slate-50 text-slate-400 rounded-full border border-slate-100 uppercase tracking-widest"><?= esc($dl['category'] ?? 'Resource') ?></span>
                    </div>
                    
                    <h3 class="text-2xl font-black font-headline text-slate-900 mb-4 tracking-tight group-hover:text-primary transition-colors"><?= esc(ld($dl, 'title')) ?></h3>
                    <p class="text-slate-500 text-sm mb-8 leading-relaxed font-medium line-clamp-3"><?= esc(ld($dl, 'description')) ?></p>
                </div>
                
                <div class="flex items-center justify-between pt-8 border-t border-slate-50">
                    <div class="flex flex-col">
                        <span class="text-[9px] uppercase font-black text-slate-400 tracking-widest">Format</span>
                        <span class="text-xs font-black text-emerald-600 uppercase">OFFICIAL PDF</span>
                    </div>
                    <a href="<?= base_url('uploads/downloads/'.$dl['file_path']) ?>" target="_blank" class="w-14 h-14 bg-slate-900 text-white rounded-2xl flex items-center justify-center hover:bg-emerald-500 transition-all shadow-xl active:scale-95 no-underline">
                        <span class="material-symbols-outlined">download</span>
                    </a>
                </div>
            </div>
        <?php endforeach; endif; ?>
    </div>

    <!-- Support Section -->
    <section class="mt-32 p-12 md:p-20 bg-slate-900 rounded-[64px] flex flex-col md:flex-row items-center gap-20 overflow-hidden relative shadow-2xl border-[8px] border-white">
        <div class="absolute inset-0 bg-primary/10 opacity-50 pointer-events-none"></div>
        <div class="relative z-10 flex-1">
            <p class="text-emerald-400 font-black tracking-[0.3em] uppercase text-[10px] mb-4">Support & Inquiry</p>
            <h3 class="text-4xl md:text-5xl font-black font-headline text-white mb-8 tracking-tighter leading-[1.1]">Can't find a <br><span class="text-emerald-400">specific document?</span></h3>
            <p class="text-gray-400 mb-12 leading-relaxed text-lg font-medium max-w-xl">Our administrative office can provide physical copies or digital scans of any official record. Contact the registrar's division for specialized requests.</p>
            <div class="flex flex-wrap gap-6">
                <a href="<?= base_url('contact') ?>" class="bg-emerald-500 text-white font-black px-10 py-5 rounded-2xl hover:bg-emerald-400 transition-all shadow-xl shadow-emerald-500/20 no-underline uppercase text-xs tracking-widest">Contact Desk</a>
                <a href="#" class="bg-white/5 border border-white/10 text-white font-black px-10 py-5 rounded-2xl hover:bg-white/10 transition-all no-underline uppercase text-xs tracking-widest">Help Center</a>
            </div>
        </div>
        <div class="relative flex-1 w-full hidden lg:block">
            <div class="relative aspect-square">
                 <div class="absolute inset-0 bg-emerald-500/20 rounded-full blur-3xl animate-pulse"></div>
                 <img alt="Office assistance" class="w-full h-full object-cover rounded-[64px] shadow-2xl rotate-3 relative z-10 border-4 border-white/10" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDr2ffGM4iieDc2FZcNx1A2hZIYtPCxKEKm9q1MKzDv_eiXvnJ6gyH64VTbEtRGK0PTkAebhBM89MlsDq9NyE16c56UlV8ZkMtDLZci8POYMG4jDp2SgWOTMFRucgYGuSQ5-P4Br0D_oaWca-lAKAfkvsbILeRo2o5tq9p3hXjTPffq36U8ePywXsreUfDvjjWsUNv0X6MDVfK42hQlgpEENboOqzb1zo0-_D3uEUje8B8uVyaF5UVuU5-NLBO76jdxjSg3k87l2Q"/>
            </div>
        </div>
    </section>
</div>