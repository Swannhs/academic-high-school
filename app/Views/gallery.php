<!-- Gallery Page -->
<div class="max-w-7xl mx-auto px-8 py-16">
<!-- Gallery Header -->
<section class="mb-16">
    <div class="flex flex-col md:flex-row justify-between items-end border-b-2 border-surface-container pb-8 gap-8">
        <div>
            <span class="text-tertiary font-black tracking-[0.2em] text-[10px] uppercase mb-2 block">Visual Memories</span>
            <h2 class="text-5xl font-black font-headline text-primary tracking-tighter leading-none">Photo Gallery</h2>
            <p class="text-on-surface-variant mt-4 max-w-lg leading-relaxed font-medium">
                Capturing the vibrant life, academic pursuits, and cultural heritage of Prottasha Academic High School.
            </p>
        </div>
        
        <!-- Category Filter -->
        <div class="flex flex-wrap gap-2" id="gallery-filters">
            <button data-filter="all" class="filter-btn px-6 py-2 rounded-full border-2 border-primary bg-primary text-white text-xs font-black uppercase tracking-widest transition-all">All</button>
            <?php foreach ($categories as $cat): ?>
                <button data-filter="<?= esc($cat) ?>" class="filter-btn px-6 py-2 rounded-full border-2 border-surface-container text-on-surface-variant hover:border-primary hover:text-primary text-xs font-black uppercase tracking-widest transition-all"><?= esc($cat) ?></button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Image Grid -->
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="gallery-grid">
    <?php if (empty($images)): ?>
        <div class="col-span-full py-20 text-center bg-surface-container-low rounded-3xl">
            <span class="material-symbols-outlined text-6xl text-outline mb-4">photo_library</span>
            <p class="text-on-surface-variant font-bold uppercase tracking-widest">No photos found in the gallery.</p>
        </div>
    <?php else: ?>
        <?php foreach ($images as $img): ?>
            <div class="gallery-item group relative aspect-square rounded-3xl overflow-hidden bg-emerald-950 shadow-xl border-4 border-white transition-all duration-500" data-category="<?= esc($img['category']) ?>">
                <img src="<?= esc($img['image_url']) ?>" alt="<?= esc($img['title']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000 opacity-90 group-hover:opacity-100">
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-primary/95 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 p-8 flex flex-col justify-end">
                    <span class="text-[10px] font-black uppercase tracking-widest text-emerald-400 mb-2"><?= esc($img['category']) ?></span>
                    <h4 class="text-white text-xl font-black leading-tight"><?= esc($img['title']) ?></h4>
                    <div class="mt-4 flex gap-4">
                        <button class="view-btn flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg backdrop-blur-md border border-white/20 transition-all group/btn" onclick="openLightbox('<?= esc($img['image_url']) ?>', '<?= esc($img['title']) ?>')">
                            <span class="material-symbols-outlined text-white text-sm group-hover/btn:scale-125 transition-transform">fullscreen</span>
                            <span class="text-[10px] font-bold text-white uppercase tracking-widest">View</span>
                        </button>
                    </div>
                </div>

                <!-- Simple Label (Always visible on mobile, hover on desktop) -->
                <div class="absolute top-4 left-4 lg:hidden group-hover:block transition-all">
                   <span class="bg-black/50 backdrop-blur-md text-white text-[8px] font-black uppercase tracking-widest px-3 py-1 rounded-full border border-white/20">
                    <?= esc($img['category']) ?>
                   </span>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 z-[100] bg-black/95 backdrop-blur-xl hidden flex-col items-center justify-center p-4">
    <button class="absolute top-8 right-8 text-white hover:text-emerald-400 transition-colors" onclick="closeLightbox()">
        <span class="material-symbols-outlined text-4xl">close</span>
    </button>
    
    <div class="max-w-5xl w-full">
        <img id="lightbox-img" src="" alt="" class="w-full h-auto max-h-[80vh] object-contain rounded-2xl shadow-2xl">
        <div class="mt-6 text-center">
            <h3 id="lightbox-title" class="text-white text-2xl font-black font-headline tracking-tight"></h3>
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
                b.classList.remove('bg-primary', 'text-white', 'border-primary');
                b.classList.add('border-surface-container', 'text-on-surface-variant');
            });
            btn.classList.add('bg-primary', 'text-white', 'border-primary');
            btn.classList.remove('border-surface-container', 'text-on-surface-variant');

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
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }

    function closeLightbox() {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = 'auto'; // Restore scrolling
    }

    // Close lightbox on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLightbox();
    });
</script>
</div><!-- /.max-w-7xl -->