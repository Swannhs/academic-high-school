<!-- Page Banner -->
<section class="relative min-h-[400px] flex items-center overflow-hidden bg-slate-900 border-b border-white/5">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-tr from-primary-dark via-primary to-primary/30 opacity-90 mix-blend-multiply"></div>
        <img class="w-full h-full object-cover opacity-20 grayscale" src="https://images.unsplash.com/photo-1544207240-8b1025eb7aeb?q=80&w=2000" alt="Notices Header">
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-accent/10 rounded-full blur-[120px]"></div>
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
                    <span class="text-white/50"><?= lang('App.nav.notices') ?></span>
                </nav>
                <h1 class="text-6xl md:text-8xl font-black font-headline tracking-tighter leading-[0.9] mb-8">
                    <?= lang('App.headers.notices') ?>
                </h1>
                <p class="text-white/70 max-w-xl text-xl font-medium leading-relaxed italic border-l-4 border-emerald-500/30 pl-6">
                    "<?= lang('App.headers.notices_sub') ?>"
                </p>
            </div>
        </div>
    </div>
</section>

<div class="max-w-7xl mx-auto px-8 py-24">
    <section class="mb-20">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 border-b border-slate-100 pb-12">
            <div>
                <span class="text-primary font-black tracking-[0.3em] uppercase text-[10px] bg-emerald-50 px-3 py-1 rounded-full"><?= lang('App.notices.bulletin') ?></span>
                <h2 class="text-4xl font-black font-headline text-slate-900 mt-4 tracking-tighter leading-none"><?= lang('App.notices.all_circulars') ?></h2>
            </div>
            
            <div class="flex flex-wrap gap-3">
                <a href="<?= base_url('notices') ?>" class="px-5 py-2 rounded-full border text-[10px] font-black uppercase tracking-widest <?= !request()->getGet('category') ? 'bg-primary text-white border-primary' : 'bg-white text-slate-500 hover:bg-slate-50' ?>">All</a>
                <?php foreach($categories as $cat): ?>
                    <a href="<?= base_url('notices?category='.$cat['id']) ?>" 
                       class="px-5 py-2 rounded-full border text-[10px] font-black uppercase tracking-widest <?= request()->getGet('category') == $cat['id'] ? 'bg-primary text-white border-primary' : 'bg-white text-slate-500 hover:bg-slate-50' ?>">
                        <?= esc(ld($cat, 'name')) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Notices Grid -->
    <section class="space-y-6">
        <?php if (empty($notices)): ?>
            <div class="text-center py-20 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
                <span class="material-symbols-outlined text-6xl text-slate-300 mb-4">description</span>
                <h3 class="text-xl font-bold text-slate-400">No notices found in this category.</h3>
            </div>
        <?php else: foreach($notices as $notice): 
            $date = strtotime($notice['publish_date']);
        ?>
            <article class="group relative bg-white p-8 rounded-2xl border border-slate-100 flex flex-col md:flex-row gap-8 items-start cursor-pointer transition-all duration-300 hover:shadow-xl hover:border-primary/20" onclick="window.location='<?= base_url('notice-details?id='.$notice['id']) ?>'">
                <div class="flex-shrink-0 w-24 text-center py-4 bg-slate-50 rounded-xl group-hover:bg-primary group-hover:text-white transition-colors">
                    <span class="block text-4xl font-black font-headline leading-none"><?= date('d', $date) ?></span>
                    <span class="block text-[10px] font-black uppercase tracking-widest opacity-60 mt-1"><?= date('M Y', $date) ?></span>
                </div>
                
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="bg-primary/5 text-primary-dark px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border border-primary/10">
                            <?= esc($notice['category_name'] ?? 'Notice') ?>
                        </span>
                        <?php if(!empty($notice['is_featured'])): ?>
                            <span class="bg-red-50 text-red-600 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border border-red-100 flex items-center gap-1">
                                <span class="w-1.5 h-1.5 bg-red-600 rounded-full animate-pulse"></span>
                                Featured
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <h3 class="text-2xl font-black text-slate-900 font-headline leading-tight mb-4 group-hover:text-primary transition-colors"><?= esc(ld($notice, 'title')) ?></h3>
                    
                    <p class="text-slate-500 font-medium leading-relaxed max-w-4xl line-clamp-2">
                        <?= esc(strip_tags(ld($notice, 'short_description'))) ?>
                    </p>
                    
                    <?php if($notice['attachment']): ?>
                        <div class="mt-8 flex items-center gap-4">
                            <a href="<?= base_url('uploads/notices/'.$notice['attachment']) ?>" target="_blank" class="flex items-center gap-2 text-primary font-black text-[10px] uppercase tracking-widest bg-emerald-50 px-4 py-2.5 rounded-xl hover:bg-primary hover:text-white transition-all shadow-sm">
                                <span class="material-symbols-outlined text-lg">picture_as_pdf</span>
                                View Attachment
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="self-center hidden md:block">
                    <span class="material-symbols-outlined text-3xl text-slate-200 group-hover:text-primary group-hover:translate-x-2 transition-all">arrow_forward</span>
                </div>
            </article>
        <?php endforeach; endif; ?>
    </section>

    <!-- Pagination -->
    <div class="mt-16">
        <?= $pager->links() ?>
    </div>
</div>