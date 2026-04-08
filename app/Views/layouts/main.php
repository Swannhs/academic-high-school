<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Academic Institution' ?></title>
    
    <!-- Fonts - Supportive of Bangla & English -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&family=Inter:wght@400;500;600&family=Hind+Siliguri:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    
    <!-- Tailwind CSS (via CDN for consistency with existing screens) -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "primary": "#00503a",
                        "primary-dark": "#003c2c",
                        "secondary": "#1a3a5f",
                        "accent": "#8b0000",
                        "surface": "#f8f9fa",
                    },
                    fontFamily: {
                        "headline": ["Manrope", "Hind Siliguri", "sans-serif"],
                        "body": ["Inter", "Hind Siliguri", "sans-serif"],
                    },
                },
            },
        }
    </script>
    
    <!-- Custom Design Tokens -->
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">

    <style>
        /* Academic pattern: applied to main + all light sections.
           Sections with explicit colors (bg-primary, bg-slate-900, etc.)
           naturally cover it with their own opaque bg-color. */
        main,
        section[class*="bg-white"],
        section[class*="bg-surface"],
        section[class*="bg-slate-50"] {
            background-image: url('<?= base_url('assets/img/bg_academic_pattern.png') ?>');
            background-size: 800px 800px;
            background-attachment: scroll;
            background-repeat: repeat;
            background-position: top left;
        }
    </style>
</head>
<body class="text-gray-900 font-body">

    <!-- Top Utility Bar -->
    <div class="bg-slate-900 text-white text-xs py-2 px-4 flex justify-between items-center">
        <div class="flex items-center gap-6">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">call</span>
                <span><?= esc($settings['phone'] ?? '+880 1234 567890') ?></span>
            </div>
            <div class="hidden sm:flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">mail</span>
                <span><?= esc($settings['email'] ?? 'info@prottasha.edu.bd') ?></span>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <span class="flex items-center gap-1 font-semibold cursor-pointer text-emerald-400">EN</span>
            <span class="h-3 w-px bg-slate-700"></span>
            <span class="flex items-center gap-1 font-semibold cursor-pointer hover:text-emerald-400 transition-colors">বাং</span>
        </div>
    </div>

    <!-- Main Branding Header -->
    <header class="bg-white px-4 py-6 border-b flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 bg-primary rounded-xl flex items-center justify-center text-white shrink-0 overflow-hidden">
                <?php if (!empty($settings['logo'])): ?>
                    <img src="<?= base_url('uploads/settings/' . $settings['logo']) ?>" class="w-full h-full object-contain p-2" alt="Logo">
                <?php else: ?>
                    <span class="material-symbols-outlined text-4xl">school</span>
                <?php endif; ?>
            </div>
            <div>
                <h1 class="text-2xl font-black text-primary leading-none mb-1"><?= esc($settings['school_name_bn'] ?? 'প্রত্যাশা একাডেমিক উচ্চ বিদ্যালয়') ?></h1>
                <h2 class="text-lg font-bold text-secondary uppercase tracking-tight"><?= esc($settings['school_name'] ?? 'Prottasha Academic High School') ?></h2>
                <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mt-1">EIIN: <?= esc($settings['eiin'] ?? '123456') ?> • Registered Institution</p>
            </div>
        </div>
        <div class="hidden lg:flex gap-8 text-right">
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase">Student Portal</p>
                <p class="text-sm font-bold text-primary hover:underline cursor-pointer">Login to Dashboard</p>
            </div>
            <div class="border-l pl-8">
                <p class="text-[10px] font-bold text-gray-400 uppercase">Admissions</p>
                <p class="text-sm font-bold text-accent animate-pulse">Session 2024-25 Open</p>
            </div>
        </div>
    </header>

    <!-- Main Navigation Bar -->
    <nav class="bg-primary px-4 py-2 sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Mobile Menu Toggle -->
            <button class="lg:hidden text-white flex items-center gap-2" id="mobile-menu-btn">
                <span class="material-symbols-outlined">menu</span>
                <span class="text-xs font-bold uppercase">Menu</span>
            </button>
            
            <ul class="hidden lg:flex items-center gap-1">
                <li><a href="<?= base_url() ?>" class="px-4 py-2 text-white hover:bg-white/10 rounded transition-colors text-sm font-bold uppercase tracking-wide">Home</a></li>
                <li><a href="<?= base_url('about') ?>" class="px-4 py-2 text-white/80 hover:bg-white/10 hover:text-white rounded transition-colors text-sm font-bold uppercase tracking-wide">About</a></li>
                <li><a href="<?= base_url('administration') ?>" class="px-4 py-2 text-white/80 hover:bg-white/10 hover:text-white rounded transition-colors text-sm font-bold uppercase tracking-wide">Admin</a></li>
                <li><a href="<?= base_url('teachers') ?>" class="px-4 py-2 text-white/80 hover:bg-white/10 hover:text-white rounded transition-colors text-sm font-bold uppercase tracking-wide">Teachers</a></li>
                <li><a href="<?= base_url('academic-info') ?>" class="px-4 py-2 text-white/80 hover:bg-white/10 hover:text-white rounded transition-colors text-sm font-bold uppercase tracking-wide">Academic</a></li>
                <li><a href="<?= base_url('admission') ?>" class="px-4 py-2 text-white/80 hover:bg-white/10 hover:text-white rounded transition-colors text-sm font-bold uppercase tracking-wide">Admission</a></li>
                <li><a href="<?= base_url('notices') ?>" class="px-4 py-2 text-white/80 hover:bg-white/10 hover:text-white rounded transition-colors text-sm font-bold uppercase tracking-wide">Notices</a></li>
                <li><a href="<?= base_url('results') ?>" class="px-4 py-2 text-white/80 hover:bg-white/10 hover:text-white rounded transition-colors text-sm font-bold uppercase tracking-wide">Results</a></li>
                <li><a href="<?= base_url('routines') ?>" class="px-4 py-2 text-white/80 hover:bg-white/10 hover:text-white rounded transition-colors text-sm font-bold uppercase tracking-wide">Routine</a></li>
                <li><a href="<?= base_url('gallery') ?>" class="px-4 py-2 text-white/80 hover:bg-white/10 hover:text-white rounded transition-colors text-sm font-bold uppercase tracking-wide">Gallery</a></li>
                <li><a href="<?= base_url('downloads') ?>" class="px-4 py-2 text-white/80 hover:bg-white/10 hover:text-white rounded transition-colors text-sm font-bold uppercase tracking-wide">Downloads</a></li>
                <li><a href="<?= base_url('contact') ?>" class="px-4 py-2 text-white/80 hover:bg-white/10 hover:text-white rounded transition-colors text-sm font-bold uppercase tracking-wide">Contact</a></li>
            </ul>

            <div class="flex items-center gap-3">
                <a href="<?= base_url('results') ?>" class="hidden sm:block bg-accent text-white px-4 py-2 rounded font-black text-[10px] uppercase tracking-widest hover:scale-95 transition-all shadow-lg active:scale-90">
                    Result Portal
                </a>
            </div>
        </div>
    </nav>

    <!-- Content Slot -->
    <main>
        <?= $content ?? '' ?>
    </main>

    <!-- Layout Footer -->
    <footer class="bg-primary text-white pt-16 pb-8 px-4">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 border-b border-white/10 pb-12">
            <!-- Brand Column -->
            <div class="space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary rounded flex items-center justify-center">
                        <span class="material-symbols-outlined text-2xl">school</span>
                    </div>
                    <span class="text-lg font-black tracking-tight">Prottasha Academic</span>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed font-medium">
                    Empowering students with excellence since 1998. Recognized as a model institution for academic and moral education.
                </p>
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded bg-white/5 border border-white/10 flex items-center justify-center cursor-pointer hover:bg-primary transition-all duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </div>
                    <!-- Other social links... -->
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-6">
                <h5 class="text-[10px] font-black uppercase tracking-widest text-white bg-primary-dark w-fit px-3 py-1 rounded shadow-sm">Quick Links</h5>
                <ul class="space-y-3 text-sm text-gray-400 font-medium">
                    <li><a href="<?= base_url('academic-calendar') ?>" class="hover:text-emerald-400 transition-colors">Academic Calendar</a></li>
                    <li><a href="<?= base_url('results') ?>" class="hover:text-emerald-400 transition-colors">Result Portal</a></li>
                    <li><a href="<?= base_url('teachers') ?>" class="hover:text-emerald-400 transition-colors">Teacher Directory</a></li>
                    <li><a href="<?= base_url('admission') ?>" class="hover:text-emerald-400 transition-colors">Admission Info</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div class="space-y-6">
                <h5 class="text-[10px] font-black uppercase tracking-widest text-white bg-primary-dark w-fit px-3 py-1 rounded shadow-sm">Support</h5>
                <ul class="space-y-3 text-sm text-gray-400 font-medium">
                    <li><a href="<?= base_url('downloads') ?>" class="hover:text-emerald-400 transition-colors">Downloads Center</a></li>
                    <li><a href="<?= base_url('contact') ?>" class="hover:text-emerald-400 transition-colors">Online Inquiry</a></li>
                    <li><a href="<?= base_url('privacy') ?>" class="hover:text-emerald-400 transition-colors">Privacy Policy</a></li>
                    <li><a href="<?= base_url('terms') ?>" class="hover:text-emerald-400 transition-colors">Terms of Service</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="space-y-6">
                <h5 class="text-[10px] font-black uppercase tracking-widest text-white bg-primary-dark w-fit px-3 py-1 rounded shadow-sm">Contact Us</h5>
                <div class="text-sm text-gray-400 space-y-4 font-medium">
                    <div class="flex gap-3">
                        <span class="material-symbols-outlined text-emerald-400 text-xl">location_on</span>
                        <p>123 Academic Avenue, Dhaka-1212, Bangladesh</p>
                    </div>
                    <div class="flex gap-3">
                        <span class="material-symbols-outlined text-emerald-400 text-xl">call</span>
                        <p>+880 2 1234567</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Base Footer -->
        <div class="mt-12 text-center pt-8 border-t border-white/5">
            <p class="text-[10px] text-gray-500 uppercase font-black tracking-widest">
                © 2024 Prottasha Academic High School. All Rights Reserved. EIIN: 123456.
            </p>
        </div>
    </footer>
</body>
</html>
