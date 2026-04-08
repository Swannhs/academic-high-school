<?php $date = strtotime($notice['publish_date']); ?>
<!-- Breadcrumb & Back Action -->
<nav class="mb-12 flex items-center">
    <a class="group flex items-center gap-2 text-primary font-black hover:gap-4 transition-all duration-300 no-underline" href="<?= base_url('notices') ?>">
        <span class="material-symbols-outlined">arrow_back</span>
        <span class="text-[10px] uppercase tracking-widest"><?= lang('App.notices.back_to_list') ?></span>
    </a>
</nav>

<!-- Notice Header Card -->
<article class="bg-white rounded-3xl p-8 lg:p-12 shadow-2xl border border-slate-100 relative overflow-hidden">
    <!-- Tonal Accent Layer -->
    <div class="absolute top-0 left-0 w-2 h-full bg-primary"></div>
    
    <div class="flex flex-wrap items-center gap-4 mb-8">
        <span class="bg-emerald-50 text-primary-dark px-4 py-1.5 rounded-full text-[10px] font-black tracking-widest uppercase border border-primary/10">
            <?= esc($notice['category_name'] ?? 'General Notice') ?>
        </span>
        <div class="flex items-center gap-2 text-slate-400 font-bold text-xs uppercase tracking-widest bg-slate-50 px-4 py-1.5 rounded-full border border-slate-100">
            <span class="material-symbols-outlined text-[16px]">calendar_today</span>
            <?= date('d M, Y', $date) ?>
        </div>
    </div>

    <h1 class="text-4xl lg:text-6xl font-black font-headline text-slate-900 leading-[1.1] mb-12 tracking-tighter">
        <?= esc(ld($notice, 'title')) ?>
    </h1>

    <!-- Notice Content -->
    <div class="space-y-8">
        <div class="prose prose-lg max-w-none text-slate-600 font-medium leading-relaxed notice-content">
            <?= ld($notice, 'description') ?>
        </div>
        
        <?php if($notice['attachment']): ?>
        <hr class="my-12 opacity-10">
        
        <!-- Action Section: Download -->
        <div class="bg-slate-900 rounded-3xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden group">
            <div class="absolute inset-0 bg-primary/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="flex items-center gap-6 relative z-10">
                <div class="w-20 h-20 bg-emerald-500/20 text-emerald-400 flex items-center justify-center rounded-2xl shadow-inner border border-emerald-500/30">
                    <span class="material-symbols-outlined text-4xl">picture_as_pdf</span>
                </div>
                <div>
                    <p class="font-black text-xl text-white mb-1"><?= lang('App.notices.official_attachment') ?></p>
                    <p class="text-xs text-emerald-400/70 font-black uppercase tracking-widest">Available in PDF Format</p>
                </div>
            </div>
            <a href="<?= base_url('uploads/notices/'.$notice['attachment']) ?>" target="_blank" class="w-full md:w-auto bg-emerald-500 text-white px-12 py-5 rounded-2xl font-black flex items-center justify-center gap-4 hover:bg-emerald-400 hover:scale-105 transition-all shadow-xl shadow-emerald-500/20 active:scale-95 no-underline uppercase text-xs tracking-widest relative z-10">
                <span class="material-symbols-outlined">download</span>
                <?= lang('App.notices.download_btn') ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</article>

<!-- Secondary Meta Information -->
<div class="mt-12 flex flex-wrap gap-12 items-start px-4">
    <div class="flex flex-col gap-2">
        <span class="text-[9px] font-black text-slate-400 uppercase tracking-[0.3em]">Institutional Seal</span>
        <div class="flex items-center gap-3">
             <img src="<?= base_url('assets/images/logo_bw.png') ?>" alt="PAHS" class="h-8 opacity-20 grayscale">
             <span class="font-black text-slate-300 text-xs uppercase tracking-widest">Office of the Secretary</span>
        </div>
    </div>
    <div class="flex flex-col gap-2">
        <span class="text-[9px] font-black text-slate-400 uppercase tracking-[0.3em]"><?= lang('App.contact.email') ?> Inquiry</span>
        <span class="font-black text-slate-600 text-sm tracking-tight">info@prottasha.edu.bd</span>
    </div>
</div>

<style>
.notice-content p { margin-bottom: 2rem; }
.notice-content ul { list-style: disc; padding-left: 2rem; margin-bottom: 2rem; }
.notice-content ol { list-style: decimal; padding-left: 2rem; margin-bottom: 2rem; }
</style>