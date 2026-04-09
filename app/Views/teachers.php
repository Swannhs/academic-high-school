<!-- Hero Header -->
<section class="relative min-h-[400px] flex items-center overflow-hidden bg-slate-900">
    <!-- Animated Gradient Background -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-tr from-primary-dark via-primary to-primary/30 opacity-90 mix-blend-multiply"></div>
        <img class="w-full h-full object-cover opacity-30 grayscale" src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?q=80&w=2000" alt="Our Educators">
        
        <!-- Decorative Overlays -->
        <div class="absolute top-0 right-0 w-[500px] h-full bg-gradient-to-l from-primary/20 to-transparent"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-emerald-500/10 rounded-full blur-[120px]"></div>
    </div>

    <!-- Floating Graphic -->
    <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/4 opacity-10 pointer-events-none hidden lg:block text-white">
        <span class="material-symbols-outlined text-[600px] select-none" style="font-variation-settings: 'FILL' 1;">
            group
        </span>
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
                    <span class="text-white/50"><?= lang('App.nav.teachers') ?></span>
                </nav>
                
                <h1 class="text-6xl md:text-8xl font-black font-headline tracking-tighter leading-[0.9] mb-8">
                    <?= lang('App.headers.teachers') ?>
                </h1>
                
                <div class="flex items-center gap-6">
                    <span class="h-px w-12 bg-emerald-500/50"></span>
                    <p class="text-white/80 max-w-xl text-xl font-medium leading-relaxed italic">
                        "<?= lang('App.headers.teachers_sub') ?>"
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Teachers Content -->
<section class="bg-white py-2">

<!-- Filter & Search -->
<div class="max-w-7xl mx-auto px-8 -mt-10 relative z-20">
    <div class="bg-white p-6 rounded-2xl shadow-xl border border-slate-100 flex flex-wrap gap-3 items-center">
        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Filter By Department:</span>
        <button data-filter="all" class="dept-btn px-6 py-2.5 rounded-xl bg-primary text-white text-[10px] font-black uppercase tracking-widest transition-all shadow-lg shadow-primary/20">All Faculty</button>
        <?php foreach($departments as $dept): ?>
            <button data-filter="<?= esc($dept) ?>" class="dept-btn px-6 py-2.5 rounded-xl bg-slate-50 text-slate-500 text-[10px] font-black uppercase tracking-widest hover:bg-slate-100 transition-all"><?= esc($dept) ?></button>
        <?php endforeach; ?>
    </div>
</div>

<!-- Teacher Grid -->
<div class="max-w-7xl mx-auto px-8 py-24">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10" id="teacher-grid">
        <?php foreach($teachers as $t): ?>
        <div class="teacher-card group bg-white rounded-[40px] p-8 border border-slate-100 hover:border-primary/20 hover:shadow-2xl transition-all duration-500 flex flex-col items-center text-center relative overflow-hidden" data-dept="<?= esc($t['department']) ?>">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-bl-[100px] -mr-16 -mt-16 group-hover:scale-150 group-hover:bg-primary/10 transition-transform duration-700"></div>
            
            <div class="w-40 h-40 rounded-[48px] overflow-hidden mb-8 ring-8 ring-slate-50 group-hover:ring-emerald-50 transition-all duration-500 shadow-inner">
                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000" src="<?= safe_safe_upload_url('teachers', $t['photo'] ?? null) ?>" alt="<?= esc($t['name']) ?>">
            </div>
            
            <div class="mb-6 relative z-10">
                <h3 class="text-2xl font-black text-slate-800 font-headline tracking-tight group-hover:text-primary transition-colors"><?= esc(ld($t, 'name')) ?></h3>
            </div>
            
            <div class="space-y-2 mb-8 relative z-10">
                <span class="inline-block px-4 py-1.5 bg-slate-900 text-white text-[9px] font-black uppercase tracking-widest rounded-full mb-2 shadow-lg shadow-slate-900/10">
                    <?= esc(ld($t, 'designation')) ?>
                </span>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest"><?= esc(ld($t, 'department')) ?> <?= lang('App.teachers.faculty') ?></p>
                <div class="h-1 w-12 bg-slate-100 mx-auto rounded-full group-hover:w-24 group-hover:bg-primary/20 transition-all"></div>
                <p class="text-sm text-slate-500 font-medium px-4"><?= esc(ld($t, 'qualification')) ?></p>
            </div>
            
            <div class="mt-auto pt-6 w-full border-t border-slate-50 flex justify-center gap-6 relative z-10">
                <button class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 hover:bg-primary hover:text-white transition-all flex items-center justify-center group/icon">
                    <span class="material-symbols-outlined text-xl">mail</span>
                </button>
                <button class="w-10 h-10 rounded-xl bg-slate-50 text-slate-400 hover:bg-primary hover:text-white transition-all flex items-center justify-center group/icon">
                    <span class="material-symbols-outlined text-xl">school</span>
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Recruitment CTA -->
<div class="max-w-7xl mx-auto px-8 pb-24">
    <div class="bg-slate-900 rounded-[48px] p-12 md:p-20 flex flex-col md:flex-row items-center justify-between gap-12 relative overflow-hidden group">
        <div class="absolute inset-0 bg-primary/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
        <div class="max-w-xl relative z-10">
            <h2 class="text-4xl md:text-5xl font-black font-headline text-white mb-6 tracking-tighter">Interested in <br><span class="text-emerald-400">joining our faculty?</span></h2>
            <p class="text-gray-400 text-lg leading-relaxed font-medium">We are always looking for passionate educators to join our mission of excellence. Review our current openings for the upcoming academic session.</p>
        </div>
        <button class="bg-emerald-500 text-white px-10 py-5 rounded-2xl font-black uppercase text-xs tracking-[0.2em] flex items-center gap-4 hover:bg-emerald-400 hover:-translate-y-1 transition-all shadow-xl shadow-emerald-500/20 active:scale-95 group/btn relative z-10">
            Explore Vacancies
            <span class="material-symbols-outlined group-hover/btn:translate-x-2 transition-transform">arrow_forward</span>
        </button>
    </div>
</div>

</section><!-- /.bg-white -->

<script>
    const deptBtns = document.querySelectorAll('.dept-btn');
    const teacherCards = document.querySelectorAll('.teacher-card');

    deptBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.getAttribute('data-filter');
            
            // Switch active styles
            deptBtns.forEach(b => {
                b.classList.remove('bg-primary', 'text-white', 'shadow-lg', 'shadow-primary/20');
                b.classList.add('bg-slate-50', 'text-slate-500');
            });
            btn.classList.add('bg-primary', 'text-white', 'shadow-lg', 'shadow-primary/20');
            btn.classList.remove('bg-slate-50', 'text-slate-500');

            // Filter cards
            teacherCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-dept') === filter) {
                    card.style.display = 'flex';
                    setTimeout(() => card.style.opacity = '1', 10);
                } else {
                    card.style.opacity = '0';
                    setTimeout(() => card.style.display = 'none', 500);
                }
            });
        });
    });
</script>
