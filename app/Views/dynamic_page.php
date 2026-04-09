<section class="min-h-[400px] flex items-center overflow-hidden bg-slate-900 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-primary-dark via-primary to-primary/30 opacity-90 mix-blend-multiply"></div>
    <div class="absolute top-0 right-0 w-[500px] h-full bg-gradient-to-l from-primary/20 to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-8 relative z-10 w-full py-20 text-white">
        <h1 class="text-5xl md:text-7xl font-black font-headline tracking-tighter leading-tight mb-6">
            <?= esc(ld($pageData, 'title')) ?>
        </h1>
        <div class="flex items-center gap-4 text-emerald-400 text-xs font-black uppercase tracking-widest">
            <a href="<?= base_url() ?>" class="hover:text-white transition-colors">Home</a>
            <span class="text-white/30">•</span>
            <span><?= esc(ld($pageData, 'title')) ?></span>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-8 relative">
        <div class="prose prose-lg md:prose-xl max-w-none text-slate-700 font-medium leading-relaxed">
            <?= ld($pageData, 'content') ?>
        </div>
    </div>
</section>

<style>
/* Add beautiful prose overrides so Jodit's content looks stunning */
.prose h1, .prose h2, .prose h3 {
    font-weight: 900;
    font-family: 'Outfit', sans-serif;
    color: #0f172a;
    letter-spacing: -0.05em;
    margin-top: 2em;
    margin-bottom: 1em;
}
.prose h2 { font-size: 2.25rem; }
.prose ul { list-style-type: disc; padding-left: 1.5rem; margin: 1.5rem 0;}
.prose ol { list-style-type: decimal; padding-left: 1.5rem; margin: 1.5rem 0;}
.prose li { margin-bottom: 0.5rem; }
.prose p { margin-bottom: 1.5rem; }
.prose img { border-radius: 1rem; box-shadow: 0 10px 40px rgba(0,0,0,0.1); margin: 2rem 0; }
.prose table { width: 100%; border-collapse: collapse; margin: 2rem 0; }
.prose th, .prose td { border: 1px solid #e2e8f0; padding: 1rem; }
.prose th { background-color: #065f46; color: white; }
</style>
