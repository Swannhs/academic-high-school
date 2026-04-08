<!-- Page Banner -->
<section class="relative min-h-[400px] flex items-center overflow-hidden bg-slate-900 border-b border-white/5">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-tr from-primary-dark via-primary to-primary/30 opacity-90 mix-blend-multiply"></div>
        <img class="w-full h-full object-cover opacity-20 grayscale" src="https://images.unsplash.com/photo-1534536281715-e28d76689b4d?q=80&w=2000" alt="Contact Us">
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-primary/10 rounded-full blur-[120px]"></div>
    </div>
    
    <!-- Floating Graphic -->
    <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/4 opacity-10 pointer-events-none hidden lg:block text-white">
        <span class="material-symbols-outlined text-[600px] select-none" style="font-variation-settings: 'FILL' 1;">
            contact_support
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
                    <span class="text-white/50"><?= lang('App.nav.contact') ?></span>
                </nav>
                <h1 class="text-6xl md:text-8xl font-black font-headline tracking-tighter leading-[0.9] mb-8">
                    <?= lang('App.headers.contact') ?>
                </h1>
                <p class="text-white/70 max-w-xl text-xl font-medium leading-relaxed italic border-l-4 border-emerald-500/30 pl-6">
                    "<?= lang('App.headers.contact_sub') ?>"
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Main Content Area -->
<section class="max-w-7xl mx-auto px-8 py-20">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
<!-- Left Column: Contact Form -->
<div class="lg:col-span-7 bg-surface-container-lowest p-10 rounded-xl shadow-sm border border-outline-variant/15">
<h2 class="text-3xl font-headline font-bold text-primary mb-8"><?= service('request')->getLocale() == 'bn' ? 'আমাদের বার্তা পাঠান' : 'Send Us a Message' ?></h2>
<form class="space-y-6">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="flex flex-col gap-2">
<label class="text-sm font-label font-semibold text-on-surface-variant uppercase tracking-wider"><?= lang('App.contact_form.name') ?></label>
<input class="bg-surface-container-highest border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 rounded-t-lg px-4 py-3 transition-all" placeholder="<?= service('request')->getLocale() == 'bn' ? 'উদা: আবদুল্লাহ আল মামুন' : 'e.g. Abdullah Al Mamun' ?>" type="text"/>
</div>
<div class="flex flex-col gap-2">
<label class="text-sm font-label font-semibold text-on-surface-variant uppercase tracking-wider"><?= lang('App.contact_form.phone') ?></label>
<input class="bg-surface-container-highest border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 rounded-t-lg px-4 py-3 transition-all" placeholder="+880 1XXX XXXXXX" type="tel"/>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="flex flex-col gap-2">
<label class="text-sm font-label font-semibold text-on-surface-variant uppercase tracking-wider"><?= lang('App.contact_form.email') ?></label>
<input class="bg-surface-container-highest border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 rounded-t-lg px-4 py-3 transition-all" placeholder="name@example.com" type="email"/>
</div>
<div class="flex flex-col gap-2">
<label class="text-sm font-label font-semibold text-on-surface-variant uppercase tracking-wider"><?= lang('App.contact_form.subject') ?></label>
<select class="bg-surface-container-highest border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 rounded-t-lg px-4 py-3 transition-all">
<option>Admission Inquiry</option>
<option>General Feedback</option>
<option>Job Opportunities</option>
<option>Technical Support</option>
</select>
</div>
</div>
<div class="flex flex-col gap-2">
<label class="text-sm font-label font-semibold text-on-surface-variant uppercase tracking-wider"><?= lang('App.contact_form.message') ?></label>
<textarea class="bg-surface-container-highest border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 rounded-t-lg px-4 py-3 transition-all resize-none" placeholder="<?= service('request')->getLocale() == 'bn' ? 'আমরা আপনাকে কিভাবে সাহায্য করতে পারি?' : 'How can we help you?' ?>" rows="6"></textarea>
</div>
<div class="pt-4">
<button class="w-full md:w-auto px-10 py-4 bg-primary text-on-primary font-bold rounded-lg shadow-lg hover:translate-y-[-2px] transition-all flex items-center justify-center gap-2" type="submit">
<span><?= lang('App.contact_form.send') ?></span>
<span class="material-symbols-outlined">send</span>
</button>
</div>
</form>
</div>
<!-- Right Column: Info & Details -->
<div class="lg:col-span-5 space-y-12">
<!-- Direct Contact Card -->
<div class="bg-surface-container-low p-8 rounded-xl relative overflow-hidden group">
<div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
<span class="material-symbols-outlined text-8xl" style="font-variation-settings: 'FILL' 1;">contact_support</span>
</div>
<h3 class="text-2xl font-headline font-bold text-secondary mb-8"><?= service('request')->getLocale() == 'bn' ? 'যোগাযোগের তথ্য' : 'Contact Information' ?></h3>
<div class="space-y-8">
<div class="flex gap-6 items-start">
<div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-primary">location_on</span>
</div>
<div>
<h4 class="font-bold text-on-surface mb-1">Our Campus</h4>
<p class="text-on-surface-variant leading-relaxed">Plot 12, Block C, Academic Avenue<br/>Bashundhara R/A, Dhaka-1229</p>
</div>
</div>
<div class="flex gap-6 items-start">
<div class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-secondary">phone_in_talk</span>
</div>
<div>
<h4 class="font-bold text-on-surface mb-1">Administrative Desk</h4>
<p class="text-on-surface-variant">+880 2-5566-0000</p>
<p class="text-on-surface-variant">+880 1700 000000</p>
</div>
</div>
<div class="flex gap-6 items-start">
<div class="w-12 h-12 bg-tertiary/10 rounded-xl flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-tertiary">mail</span>
</div>
<div>
<h4 class="font-bold text-on-surface mb-1">Official Email</h4>
<p class="text-on-surface-variant">info@academic-prestige.edu.bd</p>
<p class="text-on-surface-variant">admissions@academic-prestige.edu.bd</p>
</div>
</div>
</div>
</div>
<!-- Office Hours Card -->
<div class="bg-surface-container-lowest p-8 rounded-xl shadow-sm border-l-4 border-tertiary">
<h3 class="text-2xl font-headline font-bold text-on-surface mb-6"><?= lang('App.headers.office_hours') ?></h3>
<div class="space-y-4">
    <div class="flex justify-between items-center pb-3 border-b border-outline-variant/30">
        <span class="font-semibold text-on-surface-variant"><?= lang('App.headers.sun_thu') ?></span>
    </div>
    <div class="flex justify-between items-center">
        <span class="font-semibold text-on-surface-variant"><?= lang('App.headers.fri_sat') ?></span>
    </div>
</div>
<div class="mt-6 p-4 bg-tertiary-fixed rounded-lg text-on-tertiary-fixed text-sm font-medium">
                            * Note: Administrative offices are closed during National Holidays.
                        </div>
</div>
</div>
</div>
</section>
<!-- Interactive Map Section -->
<section class="w-full bg-surface-container-high py-20">
<div class="max-w-7xl mx-auto px-8">
<div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-6">
<div>
<h2 class="text-4xl font-headline font-extrabold text-primary tracking-tight">Visit Our Campus</h2>
<p class="text-on-surface-variant mt-2 text-lg">Locate us easily and plan your visit for admission inquiries.</p>
</div>
<a class="inline-flex items-center gap-2 text-secondary font-bold hover:underline" href="#">
<span>Open in Google Maps</span>
<span class="material-symbols-outlined">open_in_new</span>
</a>
</div>
<div class="relative h-[500px] w-full rounded-2xl overflow-hidden shadow-xl">
<img class="w-full h-full object-cover" data-alt="professional stylized map showing the layout of a modern school campus in an urban district with clearly marked roads" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9XaFev53APOmUirEaVSpSmqHRRowi_L-PM-o4HugRwHq8dGswO4lB4_4KC8ohLWxegqE_PQ4fglJpr_7OG8gxuxQuG8nHrlzGyHBunDrOiYE59yvKtLO8QLpN0zpgq8min4KzQS8FwopBy3cawO6hTSAnCcahDQkg4Bv40bzvtZifiyE3BSkICBj4eArV_4x_Kxx3mrWLfHq3jgR2N79zET_8HMlCFAaDkiU7fHnonOHjeYR4yRwxQVVwO4Otgvv0cK12PDV9Sw"/>
<!-- Overlay Marker UI Simulation -->
<div class="absolute inset-0 flex items-center justify-center pointer-events-none">
<div class="bg-white p-4 rounded-xl shadow-2xl flex items-center gap-4 border-2 border-primary">
<div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-white" style="font-variation-settings: 'FILL' 1;">school</span>
</div>
<div>
<h5 class="font-bold text-primary">The Academic Prestige</h5>
<p class="text-xs text-on-surface-variant">Bashundhara R/A, Dhaka</p>
</div>
</div>
</div>
</div>
</div>
</section>