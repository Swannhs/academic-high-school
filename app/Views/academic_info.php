<!-- Hero Banner -->
<section class="relative h-[360px] flex items-center overflow-hidden bg-primary">
    <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover brightness-50 opacity-40"
             src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvsu06syM6Sz8RqbYRfVgP7SmO5Ythr1COxoY1q7hbzJuDHPL9lHfo_cvBuRIgbhRcgHieM1XLgMq3V8qvJt7_g2X-4RwLdxoPKgBgbrCNBQs6Ig1IgKte2EVYwwWMWWSq13ZBNL7EhrvW7wDc5Nfv_HO63VHkBzYvNWqwGsZ_q-c63I-mdcPrvRlJwlMO2u0HdKojFNDHlDLlDjTEEWzGCDZNVOqt04Gqn1LIq3DD1E4FCPPjCsu1R0MxtqeONES6vDmm-ApMrg"
             alt="School Library">
        <div class="absolute inset-0 bg-gradient-to-r from-primary via-primary/80 to-transparent"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-8 w-full">
        <nav class="flex items-center gap-2 text-white/60 mb-6 text-[10px] uppercase font-black tracking-[0.2em]">
            <a class="hover:text-emerald-400 transition-colors" href="<?= base_url() ?>">Home</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-emerald-400">Academic Information</span>
        </nav>
        <h1 class="text-5xl md:text-7xl font-black font-headline text-white tracking-tighter leading-none mb-6">
            Academic <br/><span class="text-emerald-400">Excellence</span>
        </h1>
        <p class="text-white/70 max-w-xl text-lg font-medium leading-relaxed">
            A comprehensive guide to the educational journey at Prottasha Academic High School — curriculum, schedules, and assessment frameworks.
        </p>
    </div>
</section>

<!-- Stats Row -->
<section class="bg-slate-900 py-0">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-white/10">
            <?php foreach([
                ['6', 'Grade Levels', 'Class VI to X'],
                ['3', 'Academic Streams', 'Science, Business & Arts'],
                ['30%', 'Continuous Marks', 'Tests & Assignments'],
                ['2', 'Major Exams / Year', 'Mid-Term & Final'],
            ] as $stat): ?>
            <div class="py-8 px-10 text-center group hover:bg-white/5 transition-colors">
                <div class="text-4xl font-black text-emerald-400 mb-1"><?= $stat[0] ?></div>
                <div class="text-white font-bold text-sm"><?= $stat[1] ?></div>
                <div class="text-slate-500 text-[11px] font-semibold uppercase tracking-wider mt-1"><?= $stat[2] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Curriculum & Syllabus -->
<section class="py-28 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <div class="mb-16">
            <span class="text-primary font-black text-[10px] tracking-[0.3em] uppercase bg-emerald-50 px-4 py-1.5 rounded-full border border-emerald-100">Curriculum & Syllabus</span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mt-6 tracking-tighter">Our Academic Foundations</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- Featured: Class IX & X -->
            <div class="md:col-span-7 bg-slate-900 rounded-[40px] p-10 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 transition-opacity">
                    <span class="material-symbols-outlined text-[160px]" style="font-variation-settings:'FILL' 1">school</span>
                </div>
                <span class="inline-block bg-emerald-500 text-white text-[9px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest mb-6">Board Examination Level</span>
                <h3 class="text-3xl font-black text-white mb-3 tracking-tight">Secondary Level<br><span class="text-emerald-400">Class IX — X</span></h3>
                <p class="text-slate-400 font-medium leading-relaxed mb-10 max-w-md">
                    Specialized streams with intensive preparation for National SSC Board Examinations. Students select their track at the Class IX entry point.
                </p>
                <div class="grid grid-cols-2 gap-4 relative z-10">
                    <button class="flex items-center justify-between px-6 py-4 bg-white/10 rounded-2xl hover:bg-emerald-500 text-white font-bold text-sm transition-all group/btn border border-white/10">
                        <span>SSC Syllabus 2024</span>
                        <span class="material-symbols-outlined group-hover/btn:translate-y-0.5 transition-transform">download</span>
                    </button>
                    <button class="flex items-center justify-between px-6 py-4 bg-white/10 rounded-2xl hover:bg-emerald-500 text-white font-bold text-sm transition-all group/btn border border-white/10">
                        <span>Subject List</span>
                        <span class="material-symbols-outlined">list_alt</span>
                    </button>
                </div>
            </div>

            <!-- Junior Classes VI–VIII -->
            <div class="md:col-span-5 flex flex-col gap-6">
                <?php foreach([
                    ['VI',   'Class Six',   'General Curriculum & Foundation Skills'],
                    ['VII',  'Class Seven', 'Advanced Logic & Language Development'],
                    ['VIII', 'Class Eight', 'Junior Certificate Preparation'],
                ] as $cls): ?>
                <div class="bg-white border border-slate-100 rounded-[28px] p-7 flex items-center gap-6 hover:border-primary/30 hover:shadow-xl transition-all group cursor-pointer">
                    <div class="w-16 h-16 bg-slate-900 text-white rounded-[20px] flex items-center justify-center font-black text-xl shrink-0 group-hover:bg-primary transition-colors"><?= $cls[0] ?></div>
                    <div class="flex-1">
                        <h4 class="font-black text-slate-800 group-hover:text-primary transition-colors"><?= $cls[1] ?></h4>
                        <p class="text-slate-500 text-sm font-medium mt-1"><?= $cls[2] ?></p>
                    </div>
                    <span class="material-symbols-outlined text-slate-300 group-hover:text-primary group-hover:translate-x-1 transition-all">arrow_forward</span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Academic Calendar -->
<section class="py-28 bg-slate-50">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            <div>
                <span class="text-primary font-black text-[10px] tracking-[0.3em] uppercase bg-emerald-50 px-4 py-1.5 rounded-full border border-emerald-100">Important Dates</span>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mt-6 mb-4 tracking-tighter">Academic Calendar<br><span class="text-primary">2024</span></h2>
                <p class="text-slate-500 text-lg font-medium leading-relaxed mb-12">
                    Stay informed about upcoming assessments, vacations, and institutional milestones. Our calendar balances rigorous study with essential rejuvenation periods.
                </p>

                <div class="space-y-5 mb-12">
                    <?php foreach([
                        ['Mar', '15', 'First Term Assessment Begins', 'Mandatory for all classes VI – X'],
                        ['Apr', '10', 'Eid-ul-Fitr Vacation',         'Institution closed for 10 days'],
                        ['Jun', '01', 'Half-Yearly Exam',             'Mid-year performance review'],
                        ['Nov', '20', 'Annual SSC Mock Test',         'Board exam simulation for Class X'],
                    ] as $ev): ?>
                    <div class="flex gap-5 items-center group">
                        <div class="bg-white border border-slate-100 rounded-2xl px-4 py-3 text-center min-w-[72px] shadow-sm group-hover:border-primary/30 transition-all">
                            <span class="block text-[10px] font-black text-primary uppercase tracking-widest"><?= $ev[0] ?></span>
                            <span class="block text-3xl font-black text-slate-800"><?= $ev[1] ?></span>
                        </div>
                        <div>
                            <h5 class="font-black text-slate-800 group-hover:text-primary transition-colors"><?= $ev[2] ?></h5>
                            <p class="text-slate-500 text-sm font-medium"><?= $ev[3] ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <button class="bg-primary text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest flex items-center gap-3 hover:brightness-110 active:scale-95 transition-all shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined">calendar_today</span>
                    Download Full Calendar (PDF)
                </button>
            </div>

            <!-- Stylized Visual Calendar -->
            <div class="bg-white rounded-[40px] shadow-2xl border border-slate-100 p-8">
                <div class="flex justify-between items-center mb-8">
                    <h4 class="text-2xl font-black text-slate-800">March 2024</h4>
                    <div class="flex gap-2">
                        <button class="w-10 h-10 rounded-xl bg-slate-50 hover:bg-slate-100 flex items-center justify-center transition-colors">
                            <span class="material-symbols-outlined text-slate-400">chevron_left</span>
                        </button>
                        <button class="w-10 h-10 rounded-xl bg-slate-50 hover:bg-slate-100 flex items-center justify-center transition-colors">
                            <span class="material-symbols-outlined text-slate-400">chevron_right</span>
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-7 gap-1 text-center">
                    <?php foreach(['Sun','Mon','Tue','Wed','Thu','Fri','Sat'] as $d): ?>
                    <div class="text-[10px] font-black text-slate-400 uppercase pb-3"><?= $d ?></div>
                    <?php endforeach; ?>
                    <!-- Empty start cells -->
                    <?php for($i=0;$i<5;$i++): ?>
                    <div class="h-10"></div>
                    <?php endfor; ?>
                    <?php for($day=1;$day<=31;$day++):
                        $isFriday = (($day + 4) % 7 === 5);
                        $isEvent  = ($day === 15);
                        $cls = 'h-10 rounded-xl flex items-center justify-center text-sm font-bold transition-all ';
                        if ($isEvent)  $cls .= 'bg-primary text-white shadow-lg shadow-primary/30';
                        elseif ($isFriday) $cls .= 'text-red-400';
                        else $cls .= 'text-slate-600 hover:bg-slate-50';
                    ?>
                    <div class="<?= $cls ?>"><?= $day ?></div>
                    <?php endfor; ?>
                </div>
                <div class="mt-6 pt-6 border-t border-slate-50 flex items-center gap-3">
                    <div class="w-4 h-4 rounded-md bg-primary"></div>
                    <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">March 15 — First Term Assessment</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Academic Streams -->
<section class="py-28 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-20">
            <span class="text-primary font-black text-[10px] tracking-[0.3em] uppercase bg-emerald-50 px-4 py-1.5 rounded-full border border-emerald-100">Specialization Tracks</span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mt-6 tracking-tighter">Academic Sections & Streams</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach([
                ['biotech',   'Science Stream',    '#047857', 'bg-emerald-600', 'Focuses on Physics, Chemistry, Biology, and Higher Mathematics. For students aiming at Engineering or Medical careers.',
                 ['Advanced Lab Access', 'Research Projects', 'Olympiad Coaching']],
                ['payments',  'Business Studies',  '#1d4ed8', 'bg-blue-600',   'Covers Accounting, Finance, Marketing, and Economics. Tailored for future entrepreneurs and finance professionals.',
                 ['Entrepreneurship Workshops', 'Case Study Analysis', 'Digital Literacy']],
                ['palette',   'Humanities',        '#7e22ce', 'bg-purple-600', 'Explores History, Civics, Geography, and Literature. Ideal for Law, Media, Arts, and Civil Service careers.',
                 ['Creative Writing', 'Debate & Eloquence', 'Cultural Heritage Studies']],
            ] as $s): ?>
            <div class="bg-white border border-slate-100 rounded-[40px] p-10 hover:shadow-2xl hover:border-transparent transition-all group relative overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 opacity-0 group-hover:opacity-5 rounded-bl-[100px] -mr-20 -mt-20 transition-opacity <?= $s[3] ?>"></div>
                <div class="w-16 h-16 rounded-[24px] flex items-center justify-center mb-8 <?= $s[3] ?> shadow-xl">
                    <span class="material-symbols-outlined text-white text-3xl" style="font-variation-settings:'FILL' 1"><?= $s[0] ?></span>
                </div>
                <h3 class="text-2xl font-black text-slate-800 mb-4"><?= $s[1] ?></h3>
                <p class="text-slate-500 font-medium leading-relaxed mb-8"><?= $s[4] ?></p>
                <ul class="space-y-3">
                    <?php foreach($s[5] as $feat): ?>
                    <li class="flex items-center gap-3 text-slate-700 font-semibold text-sm">
                        <span class="w-6 h-6 rounded-lg flex items-center justify-center shrink-0 <?= $s[3] ?> opacity-20">
                            <span class="material-symbols-outlined text-white text-sm" style="font-variation-settings:'FILL' 1">check</span>
                        </span>
                        <span class="opacity-100 text-slate-700"><?= $feat ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Assessment & Exam System -->
<section class="py-28 bg-slate-900">
    <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
        <div class="relative rounded-[48px] overflow-hidden shadow-2xl">
            <img class="w-full aspect-[4/3] object-cover"
                 src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_gRSUrjmROYzL88_Hf9eQNWBOgNCeOraI6l39nECMnZdLvbfa6WfgTE03hnL0map9hBPV9oH7gXKEiigqpLLs-Jhjxvzil_TxGfKc-VcA7tL8eOnfWRVHnIhxSNiWn4pr9CIupAfTJSsnHTwCvRWSNlAZp-X0LGvD45vISoLqqrHiJ6Z7CcNMlvgS_6B_2b5Ge-7X-fW_bdmIbJFTdfBNvpmaG-1DLDgrKeKwlGT2F80Gem5djI1LDy3cUev6Wq3NWLneo-AHyg"
                 alt="Exam Hall">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent"></div>
            <div class="absolute bottom-6 left-6">
                <span class="bg-amber-500 text-white text-[9px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest">SSC Board Aligned</span>
            </div>
        </div>

        <div>
            <span class="text-amber-400 font-black text-[10px] tracking-[0.3em] uppercase">Evaluation Framework</span>
            <h2 class="text-4xl md:text-5xl font-black text-white mt-4 mb-6 tracking-tighter leading-tight">Assessment &<br>Examination System</h2>
            <p class="text-slate-400 text-lg font-medium leading-relaxed mb-12">
                Our assessment system measures progress across various cognitive levels — moving beyond rote memorization to creative application and critical thinking.
            </p>

            <div class="space-y-5">
                <?php foreach([
                    ['assignment_turned_in', 'Continuous Assessment', 'Class tests, assignments, and presentations contribute 30% to the final grade.'],
                    ['event_note',           'Term-End Examinations', 'Two major exams (Mid-term & Final) held annually for rigorous performance review.'],
                    ['analytics',           'Creative Questions (CQ)', 'National CQ system designed to enhance critical thinking and applied knowledge skills.'],
                ] as $item): ?>
                <div class="flex items-start gap-5 p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-amber-500/30 hover:bg-white/10 transition-all group">
                    <div class="w-14 h-14 rounded-2xl bg-amber-500/10 flex items-center justify-center shrink-0 group-hover:bg-amber-500/20 transition-colors">
                        <span class="material-symbols-outlined text-amber-400 text-2xl"><?= $item[0] ?></span>
                    </div>
                    <div>
                        <h4 class="font-black text-white text-lg mb-1"><?= $item[1] ?></h4>
                        <p class="text-slate-400 font-medium leading-relaxed"><?= $item[2] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>