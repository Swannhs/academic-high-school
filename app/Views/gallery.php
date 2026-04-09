<!-- Page Banner -->
<section class="relative min-h-[400px] flex items-center overflow-hidden bg-slate-900 border-b border-white/5">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-tr from-primary-dark via-primary to-primary/30 opacity-90 mix-blend-multiply"></div>
        <img class="w-full h-full object-cover opacity-20 grayscale" src="https://images.unsplash.com/photo-1542810634-71277d95dcbb?q=80&w=2000" alt="Gallery Header">
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
                    <span class="text-white/50"><?= lang('App.nav.gallery') ?></span>
                </nav>
                <h1 class="text-6xl md:text-8xl font-black font-headline tracking-tighter leading-[0.9] mb-8">
                    <?= lang('App.headers.gallery') ?>
                </h1>
                <p class="text-white/70 max-w-xl text-xl font-medium leading-relaxed italic border-l-4 border-emerald-500/30 pl-6">
                    "<?= lang('App.headers.gallery_sub') ?>"
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Content -->
<div class="max-w-7xl mx-auto px-8 py-24">
    <!-- Gallery Header -->
    <section class="mb-16">
        <div class="flex flex-col md:flex-row justify-between items-end border-b border-slate-100 pb-12 gap-8">
            <div>
                <span class="text-primary font-black tracking-[0.2em] text-[10px] uppercase mb-4 block"><?= lang('App.nav.gallery') ?> Filters</span>
                <h2 class="text-5xl font-black font-headline text-slate-900 tracking-tight leading-none">Photo Gallery</h2>
            </div>
            
            <!-- Category Filter -->
            <div class="flex flex-wrap gap-3" id="gallery-filters">
                <button data-filter="all" class="filter-btn px-6 py-2.5 rounded-full border-2 border-primary bg-primary text-white text-[10px] font-black uppercase tracking-widest transition-all shadow-lg shadow-primary/20">All Albums</button>
                <?php foreach ($categories as $cat): ?>
                    <button data-filter="<?= esc($cat) ?>" class="filter-btn px-6 py-2.5 rounded-full border-2 border-slate-50 bg-slate-50 text-slate-500 hover:border-primary hover:text-primary text-[10px] font-black uppercase tracking-widest transition-all"><?= esc($cat) ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Image Grid -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10" id="gallery-grid">
        <?php if (empty($images)): ?>
            <div class="col-span-full py-32 text-center bg-slate-50 rounded-[48px] border-2 border-dashed border-slate-200">
                <span class="material-symbols-outlined text-8xl text-slate-200 mb-6">photo_library</span>
                <p class="text-slate-400 font-bold uppercase tracking-widest">The visual archive is currently empty.</p>
            </div>
        <?php else: ?>
            <?php foreach ($images as $img): 
                // Use album title as fallback for image captions
                $title = ($img['caption'] ?? null) ?: ($img['album_title'] ?? 'Gallery Image');
                // Actually ld() expects an array with field and field_bn
                $item = [
                    'title' => $title,
                    'title_bn' => ($img['caption_bn'] ?? null) ?: ($img['album_title_bn'] ?? null) ?: $title
                ];
                
                $url = safe_safe_upload_url('gallery', $img['image_path'] ?? null);
            ?>
                <div class="gallery-item group relative aspect-square rounded-[40px] overflow-hidden bg-slate-900 shadow-2xl transition-all duration-700 hover:-translate-y-2" data-category="<?= esc($img['category']) ?>">
                    <img src="<?= esc($url) ?>" alt="<?= esc($title) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000 opacity-90 group-hover:opacity-100">
                    
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 p-10 flex flex-col justify-end">
                        <span class="text-[10px] font-black uppercase tracking-widest text-emerald-400 mb-2"><?= esc($img['category']) ?></span>
                        <h4 class="text-white text-2xl font-black font-headline leading-tight tracking-tight"><?= esc(ld($item, 'title')) ?></h4>
                        <div class="mt-8">
                            <button class="view-btn flex items-center gap-3 px-6 py-3 bg-white/10 hover:bg-white text-white hover:text-slate-900 rounded-2xl backdrop-blur-xl border border-white/20 transition-all font-black text-[10px] uppercase tracking-widest" onclick="openLightbox('<?= esc($url) ?>', '<?= esc(ld($item, 'title')) ?>')">
                                <span class="material-symbols-outlined text-sm">fullscreen</span>
                                View High Res
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-[100] bg-slate-900/95 backdrop-blur-2xl hidden flex-col items-center justify-center p-8">
        <button class="absolute top-10 right-10 text-white hover:text-emerald-400 transition-colors bg-white/5 p-4 rounded-full" onclick="closeLightbox()">
            <span class="material-symbols-outlined text-4xl">close</span>
        </button>
        
        <div class="max-w-6xl w-full flex flex-col items-center">
            <div class="bg-white p-4 rounded-[32px] shadow-2xl rotate-1 group">
                <img id="lightbox-img" src="" alt="" class="max-h-[70vh] w-auto object-contain rounded-2xl -rotate-1 group-hover:rotate-0 transition-transform duration-500">
            </div>
            <div class="mt-12 text-center max-w-2xl">
                <h3 id="lightbox-title" class="text-white text-3xl font-black font-headline tracking-tighter leading-tight"></h3>
                <p class="text-emerald-400/70 font-black text-xs uppercase tracking-widest mt-4">Prottasha Academic Cultural Archive</p>
            </div>
        </div>
    </div>

    <script>
        // Filtering Logic
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.getAttribute('data-filter');
                
                // Switch active button styles
                filterButtons.forEach(b => {
                    b.classList.remove('bg-primary', 'text-white', 'border-primary', 'shadow-lg', 'shadow-primary/20');
                    b.classList.add('border-slate-50', 'bg-slate-50', 'text-slate-500');
                });
                btn.classList.add('bg-primary', 'text-white', 'border-primary', 'shadow-lg', 'shadow-primary/20');
                btn.classList.remove('border-slate-50', 'bg-slate-50', 'text-slate-500');

                // Filter items
                galleryItems.forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                        setTimeout(() => item.style.opacity = '1', 10);
                    } else {
                        item.style.opacity = '0';
                        setTimeout(() => item.style.display = 'none', 500);
                    }
                });
            });
        });

        // Lightbox Logic
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');

        function openLightbox(url, title) {
            lightboxImg.src = url;
            lightboxTitle.innerText = title;
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden'; 
        }

        function closeLightbox() {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeLightbox();
        });
    </script>
</div>