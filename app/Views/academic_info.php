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
            A comprehensive guide to the educational journey at Prottasha Academic — curriculum, schedules, and assessment frameworks.
        </p>
    </div>
</section>

<!-- Stats Bar -->
<section class="bg-slate-900 py-0">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-white/10">
            <?php foreach ([
                ['6', 'Grade Levels',      'Class VI to X'],
                ['3', 'Academic Streams',  'Science, Business & Arts'],
                ['30%','Continuous Marks', 'Tests & Assignments'],
                ['2',  'Major Exams/Year', 'Mid-Term & Final'],
            ] as $stat): ?>
            <div class="py-8 px-10 text-center hover:bg-white/5 transition-colors">
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
            <!-- Secondary Level Card -->
            <div class="md:col-span-7 bg-slate-900 rounded-[40px] p-10 relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-8 opacity-5 pointer-events-none">
                    <span class="material-symbols-outlined text-[160px]" style="font-variation-settings:'FILL' 1">school</span>
                </div>
                <span class="inline-block bg-emerald-500 text-white text-[9px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest mb-6">Board Examination Level</span>
                <h3 class="text-3xl font-black text-white mb-3 tracking-tight">Secondary Level<br><span class="text-emerald-400">Class IX — X</span></h3>
                <p class="text-slate-400 font-medium leading-relaxed mb-10 max-w-md">
                    Specialized streams with intensive preparation for National SSC Board Examinations.
                </p>
                <div class="grid grid-cols-2 gap-4 relative z-10">
                    <a href="<?= base_url('downloads') ?>"
                       class="flex items-center justify-between px-6 py-4 bg-white/10 rounded-2xl hover:bg-emerald-500 text-white font-bold text-sm transition-all border border-white/10 group/btn">
                        <span>SSC Syllabus 2024</span>
                        <span class="material-symbols-outlined group-hover/btn:translate-y-0.5 transition-transform">download</span>
                    </a>
                    <a href="<?= base_url('downloads') ?>"
                       class="flex items-center justify-between px-6 py-4 bg-white/10 rounded-2xl hover:bg-emerald-500 text-white font-bold text-sm transition-all border border-white/10 group/btn">
                        <span>Subject List</span>
                        <span class="material-symbols-outlined">list_alt</span>
                    </a>
                </div>
            </div>

            <!-- Junior Classes -->
            <div class="md:col-span-5 flex flex-col gap-6">
                <?php foreach ([
                    ['VI',   'Class Six',   'General Curriculum & Foundation Skills'],
                    ['VII',  'Class Seven', 'Advanced Logic & Language Development'],
                    ['VIII', 'Class Eight', 'Junior Certificate Preparation'],
                ] as $cls): ?>
                <button onclick="openClassModal('<?= $cls[0] ?>', '<?= $cls[1] ?>', '<?= $cls[2] ?>')"
                        class="bg-white border border-slate-100 rounded-[28px] p-7 flex items-center gap-6 hover:border-primary/30 hover:shadow-xl transition-all group text-left">
                    <div class="w-16 h-16 bg-slate-900 text-white rounded-[20px] flex items-center justify-center font-black text-xl shrink-0 group-hover:bg-primary transition-colors"><?= $cls[0] ?></div>
                    <div class="flex-1">
                        <h4 class="font-black text-slate-800 group-hover:text-primary transition-colors"><?= $cls[1] ?></h4>
                        <p class="text-slate-500 text-sm font-medium mt-1"><?= $cls[2] ?></p>
                    </div>
                    <span class="material-symbols-outlined text-slate-300 group-hover:text-primary group-hover:translate-x-1 transition-all">arrow_forward</span>
                </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Class Detail Modal -->
<div id="class-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-6 bg-slate-900/70 backdrop-blur-sm">
    <div class="bg-white rounded-[40px] shadow-2xl max-w-lg w-full p-10 relative">
        <button onclick="closeClassModal()" class="absolute top-6 right-6 w-10 h-10 rounded-full bg-slate-50 hover:bg-slate-100 flex items-center justify-center transition-colors">
            <span class="material-symbols-outlined">close</span>
        </button>
        <div id="modal-badge" class="inline-block bg-slate-900 text-white text-[9px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest mb-4"></div>
        <h3 id="modal-title" class="text-3xl font-black text-slate-900 mb-2"></h3>
        <p id="modal-desc" class="text-slate-500 font-medium mb-8"></p>
        <div class="space-y-3">
            <?php foreach ([
                ['Bangla', 'Language & Literature — National Language Mastery'],
                ['English', 'Second Language — Grammar and Comprehension'],
                ['Mathematics', 'Core Numeracy & Problem Solving'],
                ['General Science', 'Foundational Science Concepts'],
                ['Bangladesh & World Affairs', 'Civics and Social Studies'],
                ['Islam & Moral Education', 'Values and Religious Studies'],
                ['ICT', 'Information & Communication Technology'],
            ] as $subj): ?>
            <div class="flex items-center gap-4 p-3 rounded-xl hover:bg-slate-50 transition-colors">
                <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-sm">menu_book</span>
                </div>
                <div>
                    <span class="font-bold text-slate-800 text-sm"><?= $subj[0] ?></span>
                    <span class="text-slate-400 text-xs ml-2"><?= $subj[1] ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <a href="<?= base_url('downloads') ?>" class="mt-8 w-full flex items-center justify-center gap-3 bg-primary text-white py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:brightness-110 transition-all shadow-lg shadow-primary/20">
            <span class="material-symbols-outlined">download</span> Download Full Syllabus
        </a>
    </div>
</div>

<?= view('partials/academic_calendar_section', get_defined_vars()) ?>

<!-- Academic Streams -->
<section class="py-28 bg-white">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-20">
            <span class="text-primary font-black text-[10px] tracking-[0.3em] uppercase bg-emerald-50 px-4 py-1.5 rounded-full border border-emerald-100">Specialization Tracks</span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mt-6 tracking-tighter">Academic Sections & Streams</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ([
                ['biotech',  'Science Stream',   'bg-emerald-600', 'Focuses on Physics, Chemistry, Biology, and Higher Mathematics. For Engineering or Medical careers.',
                 ['Advanced Lab Access', 'Research Projects', 'Olympiad Coaching']],
                ['payments', 'Business Studies', 'bg-blue-600',    'Covers Accounting, Finance, Marketing, and Economics. For entrepreneurs and finance professionals.',
                 ['Entrepreneurship Workshops', 'Case Study Analysis', 'Digital Literacy']],
                ['palette',  'Humanities',       'bg-purple-600',  'Explores History, Civics, Geography, and Literature. For Law, Media, Arts, and Civil Services.',
                 ['Creative Writing', 'Debate & Eloquence', 'Cultural Heritage Studies']],
            ] as $s): ?>
            <div class="bg-white border border-slate-100 rounded-[40px] p-10 hover:shadow-2xl hover:border-transparent transition-all group">
                <div class="w-16 h-16 rounded-[24px] flex items-center justify-center mb-8 <?= $s[2] ?> shadow-xl">
                    <span class="material-symbols-outlined text-white text-3xl" style="font-variation-settings:'FILL' 1"><?= $s[0] ?></span>
                </div>
                <h3 class="text-2xl font-black text-slate-800 mb-4"><?= $s[1] ?></h3>
                <p class="text-slate-500 font-medium leading-relaxed mb-8"><?= $s[3] ?></p>
                <ul class="space-y-3 mb-8">
                    <?php foreach ($s[4] as $feat): ?>
                    <li class="flex items-center gap-3 text-slate-700 font-semibold text-sm">
                        <span class="w-5 h-5 rounded-md <?= $s[2] ?> opacity-80 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-white text-xs" style="font-variation-settings:'FILL' 1">check</span>
                        </span>
                        <?= $feat ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?= base_url('admission') ?>"
                   class="flex items-center justify-between w-full px-5 py-3 rounded-2xl border border-slate-200 hover:border-primary/30 hover:bg-slate-50 transition-all group/link">
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-600 group-hover/link:text-primary">Apply for this stream</span>
                    <span class="material-symbols-outlined text-slate-400 group-hover/link:text-primary group-hover/link:translate-x-1 transition-all">arrow_forward</span>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Assessment System -->
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
                Our assessment system measures progress across various cognitive levels — moving beyond rote memorization to creative application.
            </p>
            <div class="space-y-5">
                <?php foreach ([
                    ['assignment_turned_in', 'Continuous Assessment',  '30%', 'Class tests, assignments, and presentations contribute 30% to the final grade.'],
                    ['event_note',           'Term-End Examinations',  '2×/yr','Two major exams (Mid-term & Final) held annually for rigorous performance review.'],
                    ['analytics',            'Creative Questions (CQ)','NQ',  'National CQ system designed to enhance critical thinking and applied knowledge.'],
                ] as $item): ?>
                <div class="flex items-start gap-5 p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-amber-500/30 hover:bg-white/10 transition-all group">
                    <div class="w-14 h-14 rounded-2xl bg-amber-500/10 flex items-center justify-center shrink-0 group-hover:bg-amber-500/20 transition-colors">
                        <span class="material-symbols-outlined text-amber-400 text-2xl"><?= $item[0] ?></span>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-1">
                            <h4 class="font-black text-white text-lg"><?= $item[1] ?></h4>
                            <span class="text-[9px] font-black bg-amber-500/20 text-amber-400 px-2 py-0.5 rounded-full"><?= $item[2] ?></span>
                        </div>
                        <p class="text-slate-400 font-medium leading-relaxed"><?= $item[3] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <a href="<?= base_url('results') ?>"
               class="mt-10 inline-flex items-center gap-3 bg-amber-500 text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-amber-400 active:scale-95 transition-all shadow-xl shadow-amber-500/20">
                <span class="material-symbols-outlined">leaderboard</span>
                View Results Archive
            </a>
        </div>
    </div>
</section>

<!-- Class Detail Modal JS -->
<script>
    function openClassModal(grade, name, desc) {
        document.getElementById('modal-badge').textContent = 'Class ' + grade;
        document.getElementById('modal-title').textContent = name;
        document.getElementById('modal-desc').textContent  = desc;
        const m = document.getElementById('class-modal');
        m.classList.remove('hidden');
        requestAnimationFrame(() => m.classList.add('flex'));
    }
    function closeClassModal() {
        const m = document.getElementById('class-modal');
        m.classList.add('hidden');
        m.classList.remove('flex');
    }
    document.getElementById('class-modal').addEventListener('click', function(e) {
        if (e.target === this) closeClassModal();
    });

    function formatCalendarDate(dateString) {
        return new Date(dateString + 'T00:00:00').toLocaleDateString('en-US', {
            month: 'long',
            day: 'numeric',
            year: 'numeric'
        });
    }

    function bindAcademicCalendar(root = document) {
        const calendarRoot = root.querySelector('[data-calendar-root]');
        if (!calendarRoot) {
            return;
        }

        const renderDayDetails = (dayButton) => {
            const panel = calendarRoot.querySelector('[data-calendar-day-panel]');
            if (!panel || !dayButton) {
                return;
            }

            calendarRoot.querySelectorAll('[data-calendar-day]').forEach((button) => {
                button.classList.remove('bg-emerald-50', 'text-primary', 'ring-emerald-200');
            });

            if (!dayButton.classList.contains('bg-primary')) {
                dayButton.classList.add('bg-emerald-50', 'text-primary', 'ring-emerald-200');
            }

            const events = JSON.parse(dayButton.dataset.events || '[]');
            const selectedDate = formatCalendarDate(`${calendarRoot.dataset.currentYear}-${String(calendarRoot.dataset.currentMonth).padStart(2, '0')}-${String(dayButton.dataset.calendarDay).padStart(2, '0')}`);

            if (!events.length) {
                panel.innerHTML = `
                    <div class="flex items-center justify-between gap-4 mb-5">
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.25em] mb-2">Selected Date</p>
                            <h3 class="text-2xl font-black text-slate-900">${selectedDate}</h3>
                        </div>
                        <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-[10px] font-black uppercase tracking-[0.2em] text-slate-500">No Events</span>
                    </div>
                    <p class="text-slate-400 italic">Nothing is scheduled for this day.</p>
                `;
                return;
            }

            panel.innerHTML = `
                <div class="flex items-center justify-between gap-4 mb-5">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.25em] mb-2">Selected Date</p>
                        <h3 class="text-2xl font-black text-slate-900">${selectedDate}</h3>
                    </div>
                    <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-4 py-2 text-[10px] font-black uppercase tracking-[0.2em] text-primary">${events.length} Event${events.length > 1 ? 's' : ''}</span>
                </div>
                <div class="space-y-3">
                    ${events.map((event) => `
                        <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="inline-flex items-center gap-1 text-[9px] font-black uppercase tracking-widest px-2 py-0.5 rounded-full border ${event.badge}">
                                    <span class="material-symbols-outlined text-xs">${event.icon}</span>
                                    ${event.category}
                                </span>
                            </div>
                            <h4 class="font-black text-slate-800">${event.title}</h4>
                            ${event.description ? `<p class="mt-2 text-sm text-slate-500 font-medium leading-relaxed">${event.description}</p>` : ''}
                        </article>
                    `).join('')}
                </div>
            `;
        };

        const fetchCalendar = async (year, month) => {
            const requestUrl = new URL(window.location.href);
            requestUrl.searchParams.set('year', year);
            requestUrl.searchParams.set('month', month);
            requestUrl.searchParams.set('fragment', 'calendar');

            calendarRoot.classList.add('opacity-60', 'pointer-events-none');

            try {
                const response = await fetch(requestUrl.toString(), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error('Calendar request failed');
                }

                const payload = await response.json();
                const wrapper = document.createElement('div');
                wrapper.innerHTML = payload.html;
                const replacement = wrapper.firstElementChild;
                calendarRoot.replaceWith(replacement);

                const browserUrl = new URL(window.location.href);
                browserUrl.searchParams.set('year', payload.year);
                browserUrl.searchParams.set('month', payload.month);
                window.history.pushState({ year: payload.year, month: payload.month }, '', browserUrl.toString());

                bindAcademicCalendar(document);
            } catch (error) {
                window.location.href = `${window.location.pathname}?year=${year}&month=${month}`;
            } finally {
                calendarRoot.classList.remove('opacity-60', 'pointer-events-none');
            }
        };

        calendarRoot.querySelectorAll('[data-calendar-nav]').forEach((link) => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                fetchCalendar(link.dataset.year, link.dataset.month);
            });
        });

        const form = calendarRoot.querySelector('[data-calendar-form]');
        form?.addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(form);
            fetchCalendar(formData.get('year'), formData.get('month'));
        });

        calendarRoot.querySelector('[data-calendar-today]')?.addEventListener('click', () => {
            const today = new Date();
            fetchCalendar(today.getFullYear(), today.getMonth() + 1);
        });

        calendarRoot.querySelectorAll('[data-calendar-day]').forEach((button) => {
            button.addEventListener('click', () => renderDayDetails(button));
        });

        calendarRoot.querySelectorAll('[data-calendar-day-jump]').forEach((button) => {
            button.addEventListener('click', () => {
                const targetDay = calendarRoot.querySelector(`[data-calendar-day="${button.dataset.calendarDayJump}"]`);
                if (targetDay) {
                    targetDay.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
                    renderDayDetails(targetDay);
                }
            });
        });
    }

    bindAcademicCalendar(document);

    window.addEventListener('popstate', () => {
        const params = new URLSearchParams(window.location.search);
        const year = params.get('year') || new Date().getFullYear();
        const month = params.get('month') || (new Date().getMonth() + 1);
        const calendarRoot = document.querySelector('[data-calendar-root]');
        if (calendarRoot) {
            const event = new Event('submit', { cancelable: true });
            const form = calendarRoot.querySelector('[data-calendar-form]');
            if (form) {
                form.querySelector('[name="year"]').value = year;
                form.querySelector('[name="month"]').value = month;
                form.dispatchEvent(event);
            }
        }
    });
</script>
