<!-- Page Banner -->
<section class="relative min-h-[400px] flex items-center overflow-hidden bg-slate-900">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-tr from-primary-dark via-primary to-primary/30 opacity-90 mix-blend-multiply"></div>
        <img class="w-full h-full object-cover opacity-30 grayscale" src="https://images.unsplash.com/photo-1541339907198-e08756ebafe3?q=80&w=2000" alt="Admission Portal">
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-amber-500/10 rounded-full blur-[120px]"></div>
    </div>

    <!-- Floating Graphic -->
    <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/4 opacity-10 pointer-events-none hidden lg:block text-white">
        <span class="material-symbols-outlined text-[600px] select-none" style="font-variation-settings: 'FILL' 1;">
            assignment_ind
        </span>
    </div>

    <div class="max-w-7xl mx-auto px-8 relative z-10 w-full py-20 text-white">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-12">
            <div class="flex-1">
                <nav class="flex items-center gap-2 text-amber-400 mb-8 text-[11px] uppercase font-black tracking-[0.3em]">
                    <a class="hover:text-white transition-colors flex items-center gap-1" href="<?= base_url() ?>">
                        <span class="material-symbols-outlined text-sm">home</span>
                        <?= lang('App.breadcrumb.home') ?>
                    </a>
                    <span class="text-white/30">•</span>
                    <span class="text-white/50"><?= lang('App.nav.admission') ?></span>
                </nav>
                <h1 class="text-6xl md:text-8xl font-black font-headline tracking-tighter leading-[0.9] mb-8">
                    <?= esc(ld($admission, 'title')) ?: lang('App.headers.admission') ?>
                </h1>
                <p class="text-white/70 max-w-xl text-xl font-medium leading-relaxed italic border-l-4 border-amber-500/30 pl-6">
                    "<?= lang('App.headers.admission_sub') ?>"
                </p>
            </div>
        </div>
    </div>
</section>

<div class="max-w-7xl mx-auto px-8 py-24">
    <?php if (empty($admission)): ?>
        <div class="text-center py-20 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
             <h3 class="text-xl font-bold text-slate-400">Admission information is currently unavailable.</h3>
        </div>
    <?php else: ?>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <!-- Main Content Area -->
        <div class="lg:col-span-8 space-y-20">
            <!-- Section 1: Overview & Eligibility -->
            <section id="overview">
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-12 w-1 bg-amber-500"></div>
                    <h2 class="text-4xl font-black text-slate-900 font-headline tracking-tight"><?= lang('App.admission.overview_title') ?></h2>
                </div>
                <div class="bg-white p-8 lg:p-12 rounded-[40px] shadow-2xl shadow-slate-200/50 border border-slate-100">
                    <div class="prose prose-lg max-w-none text-slate-600 font-medium leading-relaxed mb-12">
                        <?= ld($admission, 'overview') ?>
                    </div>
                    
                    <div class="p-8 bg-amber-50 rounded-3xl border border-amber-100">
                        <h4 class="font-black text-amber-900 mb-4 flex items-center gap-2 uppercase text-xs tracking-widest">
                            <span class="material-symbols-outlined text-xl">verified</span>
                            <?= lang('App.admission.eligibility') ?>
                        </h4>
                        <div class="text-slate-700 font-medium leading-relaxed">
                            <?= ld($admission, 'eligibility') ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 2: Requirements -->
            <section id="requirements">
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-12 w-1 bg-amber-500"></div>
                    <h2 class="text-4xl font-black text-slate-900 font-headline tracking-tight"><?= lang('App.admission.requirements_title') ?></h2>
                </div>
                <div class="bg-slate-900 text-white p-12 rounded-[40px] shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500 opacity-10 rounded-full blur-3xl -mr-32 -mt-32"></div>
                    <div class="relative z-10 text-lg leading-relaxed opacity-90">
                        <?= ld($admission, 'requirements') ?>
                    </div>
                </div>
            </section>

            <!-- Section 4: Detailed Instructions -->
            <section id="instructions">
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-12 w-1 bg-amber-500"></div>
                    <h2 class="text-4xl font-black text-slate-900 font-headline tracking-tight"><?= lang('App.admission.instructions_title') ?></h2>
                </div>
                <div class="bg-white p-8 lg:p-12 rounded-[40px] shadow-2xl shadow-slate-200/50 border border-slate-100 italic font-medium text-slate-600 leading-relaxed text-lg">
                    <?= ld($admission, 'instructions') ?>
                </div>
            </section>

            <!-- Large CTA -->
            <section class="py-10 grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php if($admission['application_form_file']): ?>
                <a class="group bg-slate-100 p-8 rounded-3xl border border-transparent hover:border-amber-200 hover:bg-white hover:shadow-2xl transition-all no-underline flex items-center justify-between" href="<?= base_url('uploads/admission/'.$admission['application_form_file']) ?>" target="_blank">
                    <div>
                        <h4 class="text-xl font-black text-slate-900 mb-1"><?= lang('App.admission.download_form') ?></h4>
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">PDF</p>
                    </div>
                    <span class="material-symbols-outlined text-4xl text-amber-500 group-hover:scale-110 transition-transform">download</span>
                </a>
                <?php endif; ?>

                <?php if($admission['circular_file']): ?>
                <a class="group bg-slate-100 p-8 rounded-3xl border border-transparent hover:border-amber-200 hover:bg-white hover:shadow-2xl transition-all no-underline flex items-center justify-between" href="<?= base_url('uploads/admission/'.$admission['circular_file']) ?>" target="_blank">
                    <div>
                        <h4 class="text-xl font-black text-slate-900 mb-1"><?= lang('App.admission.download_circular') ?></h4>
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">PDF</p>
                    </div>
                    <span class="material-symbols-outlined text-4xl text-amber-500 group-hover:scale-110 transition-transform">picture_as_pdf</span>
                </a>
                <?php endif; ?>
            </section>
        </div>

        <!-- Sidebar Content -->
        <aside class="lg:col-span-4 space-y-8">
            <div class="bg-slate-50 p-8 rounded-[40px] border border-slate-100 shadow-inner">
                <h3 class="text-xl font-black text-slate-900 mb-8 flex items-center gap-3 uppercase text-xs tracking-[0.2em]">
                    <span class="material-symbols-outlined text-amber-500">event</span>
                    <?= lang('App.admission.important_dates') ?>
                </h3>
                <div class="space-y-8 text-slate-600 font-medium">
                    <?= ld($admission, 'important_dates') ?>
                </div>
            </div>

            <!-- Help Desk Card -->
            <div class="bg-primary text-white p-10 rounded-[40px] relative overflow-hidden shadow-2xl">
                <div class="absolute -right-8 -bottom-8 opacity-10">
                    <span class="material-symbols-outlined text-[120px]">contact_support</span>
                </div>
                <h3 class="text-2xl font-black mb-4">Admission Desk</h3>
                <p class="text-white/70 text-sm mb-8 font-medium">Have questions? Our staff is here to help you through every step.</p>
                <div class="space-y-4 font-black text-xs uppercase tracking-widest">
                    <p class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-amber-400">call</span>
                        <?= esc($settings['phone'] ?? '+880 1234 567890') ?>
                    </p>
                    <p class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-amber-400">mail</span>
                        <?= esc($settings['email'] ?? 'admissions@prottasha.edu.bd') ?>
                    </p>
                </div>
            </div>

            <!-- Notice / Session Badge -->
            <div class="bg-amber-500 p-8 rounded-[40px] text-white">
                <p class="text-[10px] font-black uppercase tracking-widest opacity-80 mb-1"><?= lang('App.admission.session') ?></p>
                <p class="text-4xl font-black"><?= esc($admission['session_year']) ?></p>
                <div class="mt-8 flex items-center gap-2 bg-white/20 w-fit px-4 py-1.5 rounded-full">
                    <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                    <span class="text-[9px] font-black uppercase tracking-widest">
                        <?= $admission['status'] === 'active' ? lang('App.admission.open_badge') : lang('App.admission.closed_badge') ?>
                    </span>
                </div>
            </div>
        </aside>
    </div>
    <?php endif; ?>
</div>