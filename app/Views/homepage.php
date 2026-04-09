<!-- Homepage Sections -->

<!-- 1. Hero Section -->
<section class="relative h-[650px] flex items-center overflow-hidden shadow-2xl">
    <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover" src="https://objectstorage.ap-dcc-gazipur-1.oraclecloud15.com/n/axvjbnqprylg/b/V2Ministry/o/npf-themes/theme_2025/assets/images/bg_main_july.gif" alt="Campus Background"/>
        <div class="absolute inset-0 bg-gradient-to-r from-primary/90 via-primary/70 to-primary/30"></div>
    </div>
    <div class="relative z-10 w-full px-4 lg:px-16 text-white">
        <div class="max-w-4xl space-y-8 animate-in fade-in slide-in-from-left-8 duration-700">
            <div class="space-y-4">
                <p class="text-xs lg:text-sm font-black uppercase tracking-widest text-emerald-400 bg-emerald-400/10 w-fit px-4 py-2 rounded-full border border-emerald-400/20"><?= esc(ld($settings, 'tagline')) ?: 'Established 1998 • Excellence in Education' ?></p>
                <h2 class="text-4xl lg:text-7xl font-black leading-none drop-shadow-lg"><?= esc(ld($settings, 'school_name')) ?></h2>
            </div>
            <p class="text-lg lg:text-2xl font-medium opacity-90 border-l-4 border-emerald-400 pl-8 max-w-2xl italic leading-relaxed">
                "<?= esc(ld($settings, 'homepage_hero') ?: 'Nurturing moral values and academic brilliance for a brighter Bangladesh.') ?>"
            </p>
            <div class="flex flex-wrap gap-4 pt-8">
                <a href="<?= base_url('notices') ?>" class="bg-primary-dark border border-emerald-600 text-white px-10 py-5 rounded-xl font-black text-xs uppercase tracking-widest hover:bg-emerald-400 hover:text-primary transition-all duration-300 shadow-2xl active:scale-95"><?= lang('App.hero.notices') ?></a>
                <a href="<?= base_url('admission') ?>" class="bg-white text-primary px-10 py-5 rounded-xl font-black text-xs uppercase tracking-widest hover:scale-105 transition-all shadow-2xl active:scale-95"><?= lang('App.hero.admission') ?></a>
                <a href="<?= base_url('results') ?>" class="bg-accent text-white px-10 py-5 rounded-xl font-black text-xs uppercase tracking-widest hover:bg-red-800 transition-all shadow-2xl active:scale-95"><?= lang('App.hero.results') ?></a>
            </div>
        </div>
    </div>
</section>

<!-- 2. Notice Board Section -->
<section class="py-24 bg-white border-b overflow-hidden">
    <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 lg:grid-cols-12 gap-20">
        <!-- Left: Notices (8/12) -->
        <div class="lg:col-span-8 space-y-12">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] uppercase font-black tracking-[0.2em] text-accent mb-2"><?= lang('App.homepage.announcement_hub') ?></p>
                    <h3 class="text-4xl font-black text-primary tracking-tight"><?= lang('App.notices.latest') ?></h3>
                </div>
                <a href="<?= base_url('notices') ?>" class="flex items-center gap-3 text-secondary font-black text-xs uppercase tracking-widest border-b-2 border-secondary pb-1 hover:gap-6 transition-all group">
                    <?= lang('App.notices.archive') ?> <span class="material-symbols-outlined text-sm group-hover:text-accent">arrow_right_alt</span>
                </a>
            </div>
            
            <div class="space-y-6">
                <?php if (empty($recentNotices)): ?>
                    <p class="text-gray-400 italic">No recent notices available.</p>
                <?php else: foreach ($recentNotices as $notice): 
                    $date = strtotime($notice['publish_date']);
                ?>
                <!-- Notice Item -->
                <a href="<?= base_url('notice-details?id='.$notice['id']) ?>" class="group flex items-center gap-8 p-6 bg-surface rounded-2xl border border-transparent hover:border-emerald-100 hover:shadow-xl transition-all cursor-pointer no-underline block">
                    <div class="flex flex-col items-center justify-center min-w-[80px] h-[80px] bg-white rounded-xl shadow-sm border border-gray-100 group-hover:bg-primary group-hover:text-white transition-colors text-gray-900">
                        <span class="text-[10px] uppercase font-black opacity-60 group-hover:opacity-80"><?= date('M', $date) ?></span>
                        <span class="text-3xl font-black"><?= date('d', $date) ?></span>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-xl font-black text-gray-900 group-hover:text-primary transition-colors"><?= esc(ld($notice, 'title')) ?></h4>
                        <p class="text-sm text-gray-500 font-medium mt-1 italic">Published on <?= date('M j, Y', $date) ?></p>
                    </div>
                    <?php if ($notice['attachment']): ?>
                        <span class="material-symbols-outlined text-red-400 group-hover:text-emerald-500 transition-colors">picture_as_pdf</span>
                    <?php else: ?>
                        <span class="material-symbols-outlined text-gray-300 group-hover:text-emerald-500 transition-colors">description</span>
                    <?php endif; ?>
                </a>
                <?php endforeach; endif; ?>
            </div>
        </div>

        <!-- Right: Stats -->
        <div class="lg:col-span-4 bg-primary text-white p-12 rounded-3xl space-y-10 relative overflow-hidden shadow-2xl">
            <h4 class="text-lg font-black uppercase tracking-widest border-b border-white/10 pb-4"><?= lang('App.homepage.campus_snapshot') ?></h4>
            <div class="space-y-8">
                <div class="flex items-end gap-4">
                    <span class="text-5xl font-black text-emerald-400 leading-none"><?= esc($settings['stat_1_value'] ?? '98.5%') ?></span>
                    <p class="text-[10px] uppercase font-black tracking-widest opacity-60 pb-1"><?= esc(ld($settings, 'stat_1_label') ?: lang('App.homepage.ssc_success')) ?></p>
                </div>
                <div class="flex items-end gap-4">
                    <span class="text-5xl font-black text-emerald-400 leading-none"><?= esc($settings['stat_2_value'] ?? '42+') ?></span>
                    <p class="text-[10px] uppercase font-black tracking-widest opacity-60 pb-1"><?= esc(ld($settings, 'stat_2_label') ?: lang('App.homepage.lab_facilities')) ?></p>
                </div>
                <div class="flex items-end gap-4">
                    <span class="text-5xl font-black text-emerald-400 leading-none"><?= esc($settings['stat_3_value'] ?? '1,200+') ?></span>
                    <p class="text-[10px] uppercase font-black tracking-widest opacity-60 pb-1"><?= esc(ld($settings, 'stat_3_label') ?: lang('App.homepage.digital_library')) ?></p>
                </div>
            </div>
            <a href="<?= base_url('academic-info') ?>" class="block w-full bg-white text-primary text-center py-5 rounded-2xl font-black uppercase text-xs tracking-widest shadow-lg hover:scale-95 transition-all"><?= lang('App.homepage.download_prospectus') ?></a>
        </div>
    </div>
</section>

<!-- 3. Principal's Message -->
<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-8 flex flex-col md:flex-row items-center gap-20">
        <div class="md:w-5/12 relative">
            <div class="aspect-[3/4] rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                <img class="w-full h-full object-cover" data-alt="Portrait of South Asian academic professional" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=800"/>
            </div>
            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-emerald-400/20 backdrop-blur-xl rounded-full border border-emerald-400/30 -z-10 animate-pulse"></div>
        </div>
        <div class="md:w-7/12 space-y-8">
            <div>
                <p class="text-[10px] uppercase font-black tracking-[0.2em] text-primary mb-2"><?= lang('App.principal.title') ?></p>
                <h3 class="text-5xl font-black text-gray-900 leading-tight"><?= lang('App.homepage.principal_quote') ?></h3>
                <h4 class="text-2xl font-bold text-gray-500 italic uppercase"><?= lang('App.homepage.principal_subtitle') ?></h4>
            </div>
            <div class="text-gray-600 text-lg leading-relaxed font-medium space-y-4">
                <?= ld($settings, 'principal_message_snippet') ?: 'Welcome to Prottasha Academic High School. Our institution is not just a building; it is a vision to shape the future of our nation through disciplined education and moral grounding.' ?>
            </div>
            <div class="pt-6">
                <p class="text-2xl font-black text-primary"><?= esc(ld($settings, 'principal_name') ?: 'Md. Abdur Rahman') ?></p>
                <p class="text-xs uppercase font-black tracking-widest text-gray-400"><?= esc(ld($settings, 'principal_title') ?: 'Principal') ?>, <?= esc(ld($settings, 'school_name')) ?></p>
                <a href="<?= base_url('about') ?>" class="inline-block mt-8 text-primary font-black text-xs uppercase tracking-widest border-2 border-primary px-8 py-3 rounded-full hover:bg-primary hover:text-white transition-all"><?= lang('App.principal.read_more') ?></a>
            </div>
        </div>
    </div>
</section>
<!-- 4. Quick Link Grid -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <p class="text-[10px] uppercase font-black tracking-[0.2em] text-accent mb-2"><?= lang('App.homepage.quick_resources') ?></p>
            <h3 class="text-4xl font-black text-primary"><?= lang('App.homepage.essential_links') ?></h3>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-6">
            <!-- Admission Card -->
            <a href="<?= base_url('admission') ?>" class="group p-10 bg-surface rounded-3xl border border-transparent hover:border-emerald-100 hover:bg-white hover:shadow-2xl transition-all text-center space-y-6">
                <div class="w-20 h-20 bg-primary/5 rounded-2xl mx-auto flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-4xl">person_add</span>
                </div>
                <span class="block text-sm font-black uppercase tracking-widest text-gray-900 group-hover:text-primary transition-colors">Admission Info</span>
            </a>
            <!-- Results Card -->
            <a href="<?= base_url('results') ?>" class="group p-10 bg-surface rounded-3xl border border-transparent hover:border-red-100 hover:bg-white hover:shadow-2xl transition-all text-center space-y-6">
                <div class="w-20 h-20 bg-accent/5 rounded-2xl mx-auto flex items-center justify-center text-accent group-hover:bg-accent group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-4xl">military_tech</span>
                </div>
                <span class="block text-sm font-black uppercase tracking-widest text-gray-900 group-hover:text-accent transition-colors">Result Portal</span>
            </a>
            <!-- Routine Card -->
            <a href="<?= base_url('routines') ?>" class="group p-10 bg-surface rounded-3xl border border-transparent hover:border-emerald-100 hover:bg-white hover:shadow-2xl transition-all text-center space-y-6">
                <div class="w-20 h-20 bg-secondary/5 rounded-2xl mx-auto flex items-center justify-center text-secondary group-hover:bg-secondary group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-4xl">calendar_today</span>
                </div>
                <span class="block text-sm font-black uppercase tracking-widest text-gray-900 group-hover:text-secondary transition-colors">Class Routine</span>
            </a>
            <!-- Teachers Card -->
            <a href="<?= base_url('teachers') ?>" class="group p-10 bg-surface rounded-3xl border border-transparent hover:border-emerald-100 hover:bg-white hover:shadow-2xl transition-all text-center space-y-6">
                <div class="w-20 h-20 bg-primary/5 rounded-2xl mx-auto flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                    <span class="material-symbols-outlined text-4xl">groups</span>
                </div>
                <span class="block text-sm font-black uppercase tracking-widest text-gray-900 group-hover:text-primary transition-colors"><?= lang('App.nav.teachers') ?></span>
            </a>
        </div>
    </div>
</section>

<!-- 5. Featured Gallery -->
<section class="py-24 bg-surface border-t">
    <div class="max-w-7xl mx-auto px-8 space-y-12">
        <div class="flex items-end justify-between">
            <div>
                <p class="text-[10px] uppercase font-black tracking-[0.2em] text-primary mb-2"><?= lang('App.homepage.campus_moments') ?></p>
                <h3 class="text-4xl font-black text-gray-900 leading-tight"><?= lang('App.homepage.gallery_highlights') ?></h3>
            </div>
            <a href="<?= base_url('gallery') ?>" class="bg-primary text-white px-8 py-3 rounded-full font-black text-xs uppercase tracking-widest hover:bg-emerald-600 transition-all"><?= lang('App.homepage.view_all_gallery') ?></a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
                $galleryImages = $featuredImages ?? [];
                $heroImg   = $galleryImages[0] ?? null;
                $thumbImg1 = $galleryImages[1] ?? null;
                $thumbImg2 = $galleryImages[2] ?? null;
                $imgBase   = base_url('uploads/gallery/');
            ?>
            <?php if ($heroImg): ?>
            <div class="md:col-span-2 aspect-[16/9] rounded-3xl overflow-hidden border-4 border-white shadow-xl group">
                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
                     src="<?= safe_safe_upload_url('gallery', $heroImg['image_path'] ?? null) ?>"
                     alt="<?= esc(ld($heroImg, 'caption') ?: ld($heroImg, 'album_title')) ?>">
            </div>
            <?php else: ?>
            <div class="md:col-span-2 aspect-[16/9] rounded-3xl overflow-hidden border-4 border-white shadow-xl bg-slate-100 flex items-center justify-center">
                <span class="material-symbols-outlined text-6xl text-slate-300">photo_library</span>
            </div>
            <?php endif; ?>
            <div class="space-y-6">
                <div class="aspect-square rounded-3xl overflow-hidden border-4 border-white shadow-xl group bg-slate-100">
                    <?php if ($thumbImg1): ?>
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
                         src="<?= safe_safe_upload_url('gallery', $thumbImg1['image_path'] ?? null) ?>"
                         alt="<?= esc(ld($thumbImg1, 'caption') ?: '') ?>">
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center"><span class="material-symbols-outlined text-4xl text-slate-300">image</span></div>
                    <?php endif; ?>
                </div>
                <div class="aspect-square rounded-3xl overflow-hidden border-4 border-white shadow-xl group bg-slate-100">
                    <?php if ($thumbImg2): ?>
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000"
                         src="<?= safe_safe_upload_url('gallery', $thumbImg2['image_path'] ?? null) ?>"
                         alt="<?= esc(ld($thumbImg2, 'caption') ?: '') ?>">
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center"><span class="material-symbols-outlined text-4xl text-slate-300">image</span></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>