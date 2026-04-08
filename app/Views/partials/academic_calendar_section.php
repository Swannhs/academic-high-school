<?php
$monthName   = date('F', mktime(0, 0, 0, $cal_month, 1, $cal_year));
$daysInMonth = (int) date('t', mktime(0, 0, 0, $cal_month, 1, $cal_year));
$firstDow    = (int) date('w', mktime(0, 0, 0, $cal_month, 1, $cal_year));

$eventsByDay = [];
foreach ($cal_events as $ev) {
    $day = (int) date('j', strtotime($ev['event_date']));
    $eventsByDay[$day][] = $ev;
}

$prevMonth = $cal_month - 1;
$prevYear = $cal_year;
if ($prevMonth < 1) {
    $prevMonth = 12;
    $prevYear--;
}

$nextMonth = $cal_month + 1;
$nextYear = $cal_year;
if ($nextMonth > 12) {
    $nextMonth = 1;
    $nextYear++;
}

$selectedDay = null;
if (! empty($cal_events)) {
    $selectedDay = (int) date('j', strtotime($cal_events[0]['event_date']));
}

$categoryColors = [
    'exam'    => ['bg' => 'bg-primary', 'dot' => 'bg-primary', 'badge' => 'bg-emerald-50 text-primary border-emerald-200', 'icon' => 'assignment_turned_in'],
    'holiday' => ['bg' => 'bg-red-500', 'dot' => 'bg-red-400', 'badge' => 'bg-red-50 text-red-600 border-red-200', 'icon' => 'beach_access'],
    'event'   => ['bg' => 'bg-amber-500', 'dot' => 'bg-amber-400', 'badge' => 'bg-amber-50 text-amber-700 border-amber-200', 'icon' => 'celebration'],
    'general' => ['bg' => 'bg-slate-600', 'dot' => 'bg-slate-400', 'badge' => 'bg-slate-50 text-slate-600 border-slate-200', 'icon' => 'info'],
];
?>

<section class="py-28 bg-slate-50" id="calendar-section"
         data-calendar-root
         data-current-year="<?= esc((string) $cal_year) ?>"
         data-current-month="<?= esc((string) $cal_month) ?>">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-start">
            <div>
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <span class="text-primary font-black text-[10px] tracking-[0.3em] uppercase bg-emerald-50 px-4 py-1.5 rounded-full border border-emerald-100">Live Calendar</span>
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white border border-slate-200 text-[10px] font-black uppercase tracking-[0.25em] text-slate-500">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <?= esc($monthName) ?> <?= esc((string) $cal_year) ?>
                    </span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-4 tracking-tighter">
                    Academic Calendar<br><span class="text-primary"><?= esc($monthName) ?> <?= esc((string) $cal_year) ?></span>
                </h2>
                <p class="text-slate-500 text-lg font-medium leading-relaxed mb-8">
                    Browse the month view without reloading the full page. Select any highlighted day to inspect scheduled events and holidays.
                </p>

                <form class="grid grid-cols-1 sm:grid-cols-[1fr_1fr_auto] gap-3 mb-10" data-calendar-form>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Month</label>
                        <select name="month" class="w-full bg-white border border-slate-200 rounded-2xl py-3 px-4 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none">
                            <?php for ($monthOption = 1; $monthOption <= 12; $monthOption++): ?>
                                <option value="<?= $monthOption ?>" <?= $monthOption === $cal_month ? 'selected' : '' ?>>
                                    <?= date('F', mktime(0, 0, 0, $monthOption, 1, $cal_year)) ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Year</label>
                        <select name="year" class="w-full bg-white border border-slate-200 rounded-2xl py-3 px-4 text-sm font-bold text-slate-700 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none">
                            <?php for ($yearOption = $cal_year - 2; $yearOption <= $cal_year + 3; $yearOption++): ?>
                                <option value="<?= $yearOption ?>" <?= $yearOption === $cal_year ? 'selected' : '' ?>><?= $yearOption ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="flex items-end gap-3">
                        <button type="submit"
                                class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 bg-primary text-white px-6 py-3 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] hover:brightness-110 transition-all shadow-lg shadow-primary/20">
                            <span class="material-symbols-outlined text-base">search</span>
                            Go
                        </button>
                        <button type="button"
                                data-calendar-today
                                class="inline-flex items-center justify-center gap-2 border border-slate-200 bg-white text-slate-700 px-5 py-3 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] hover:border-primary/30 hover:text-primary transition-all">
                            Today
                        </button>
                    </div>
                </form>

                <div class="flex flex-wrap gap-3 mb-10">
                    <?php foreach (['exam' => 'Examination', 'holiday' => 'Holiday', 'event' => 'Event', 'general' => 'General'] as $key => $label): ?>
                        <span class="flex items-center gap-2 px-4 py-1.5 rounded-full border text-xs font-bold <?= $categoryColors[$key]['badge'] ?>">
                            <span class="w-2 h-2 rounded-full <?= $categoryColors[$key]['dot'] ?>"></span>
                            <?= $label ?>
                        </span>
                    <?php endforeach; ?>
                </div>

                <div class="rounded-[32px] border border-slate-200 bg-white p-6 shadow-sm mb-8" data-calendar-day-panel>
                    <?php if ($selectedDay !== null): ?>
                        <div class="flex items-center justify-between gap-4 mb-5">
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.25em] mb-2">Selected Date</p>
                                <h3 class="text-2xl font-black text-slate-900">
                                    <?= esc(date('F j, Y', strtotime(sprintf('%04d-%02d-%02d', $cal_year, $cal_month, $selectedDay)))) ?>
                                </h3>
                            </div>
                            <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-4 py-2 text-[10px] font-black uppercase tracking-[0.2em] text-primary">
                                <?= count($eventsByDay[$selectedDay]) ?> Event<?= count($eventsByDay[$selectedDay]) > 1 ? 's' : '' ?>
                            </span>
                        </div>
                        <div class="space-y-3">
                            <?php foreach ($eventsByDay[$selectedDay] as $event): $cat = $categoryColors[$event['category']] ?? $categoryColors['general']; ?>
                                <article class="rounded-2xl border border-slate-100 bg-slate-50 p-4">
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="inline-flex items-center gap-1 text-[9px] font-black uppercase tracking-widest px-2 py-0.5 rounded-full border <?= $cat['badge'] ?>">
                                            <span class="material-symbols-outlined text-xs"><?= $cat['icon'] ?></span>
                                            <?= esc(ucfirst($event['category'])) ?>
                                        </span>
                                    </div>
                                    <h4 class="font-black text-slate-800"><?= esc($event['title']) ?></h4>
                                    <?php if (! empty($event['description'])): ?>
                                        <p class="mt-2 text-sm text-slate-500 font-medium leading-relaxed"><?= esc($event['description']) ?></p>
                                    <?php endif; ?>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-slate-400 italic">No events are scheduled for this month yet.</p>
                    <?php endif; ?>
                </div>

                <div class="space-y-5 mb-12">
                    <?php if (empty($upcoming)): ?>
                        <p class="text-slate-400 italic">No upcoming events scheduled.</p>
                    <?php else: ?>
                        <?php foreach ($upcoming as $ev): $cat = $categoryColors[$ev['category']] ?? $categoryColors['general']; $dt = strtotime($ev['event_date']); ?>
                            <div class="flex gap-5 items-center group">
                                <div class="bg-white border border-slate-100 rounded-2xl px-4 py-3 text-center min-w-[72px] shadow-sm group-hover:border-primary/30 transition-all">
                                    <span class="block text-[10px] font-black text-primary uppercase tracking-widest"><?= date('M', $dt) ?></span>
                                    <span class="block text-3xl font-black text-slate-800"><?= date('j', $dt) ?></span>
                                </div>
                                <div class="flex-1">
                                    <span class="inline-flex items-center gap-1 text-[9px] font-black uppercase tracking-widest px-2 py-0.5 rounded-full border <?= $cat['badge'] ?> mb-1">
                                        <span class="material-symbols-outlined text-xs"><?= $cat['icon'] ?></span>
                                        <?= esc(ucfirst($ev['category'])) ?>
                                    </span>
                                    <h5 class="font-black text-slate-800 group-hover:text-primary transition-colors"><?= esc($ev['title']) ?></h5>
                                    <p class="text-slate-500 text-sm font-medium"><?= esc($ev['description']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="bg-white rounded-[40px] shadow-2xl border border-slate-100 p-8 sticky top-8" data-calendar-widget>
                <div class="flex justify-between items-center mb-8 gap-4">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.25em] mb-2">Month View</p>
                        <h4 class="text-2xl font-black text-slate-800"><?= esc($monthName) ?> <?= esc((string) $cal_year) ?></h4>
                    </div>
                    <div class="flex gap-2">
                        <a href="<?= base_url('academic-info?year=' . $prevYear . '&month=' . $prevMonth) ?>"
                           data-calendar-nav
                           data-year="<?= esc((string) $prevYear) ?>"
                           data-month="<?= esc((string) $prevMonth) ?>"
                           class="w-10 h-10 rounded-xl bg-slate-50 hover:bg-slate-100 flex items-center justify-center transition-colors">
                            <span class="material-symbols-outlined text-slate-500">chevron_left</span>
                        </a>
                        <a href="<?= base_url('academic-info?year=' . $nextYear . '&month=' . $nextMonth) ?>"
                           data-calendar-nav
                           data-year="<?= esc((string) $nextYear) ?>"
                           data-month="<?= esc((string) $nextMonth) ?>"
                           class="w-10 h-10 rounded-xl bg-slate-50 hover:bg-slate-100 flex items-center justify-center transition-colors">
                            <span class="material-symbols-outlined text-slate-500">chevron_right</span>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-7 gap-1 text-center mb-1">
                    <?php foreach (['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'] as $index => $dayLabel): ?>
                        <div class="text-[10px] font-black pb-3 <?= $index === 5 ? 'text-red-400' : 'text-slate-400' ?> uppercase"><?= $dayLabel ?></div>
                    <?php endforeach; ?>
                </div>

                <div class="grid grid-cols-7 gap-1 text-center">
                    <?php for ($leadingDay = 0; $leadingDay < $firstDow; $leadingDay++): ?>
                        <div class="h-12"></div>
                    <?php endfor; ?>

                    <?php for ($day = 1; $day <= $daysInMonth; $day++):
                        $dow = ($firstDow + $day - 1) % 7;
                        $isFri = ($dow === 5);
                        $today = ($day === (int) date('j') && $cal_month === (int) date('n') && $cal_year === (int) date('Y'));
                        $hasEvents = isset($eventsByDay[$day]);
                        $eventCategory = $hasEvents ? ($eventsByDay[$day][0]['category'] ?? 'general') : null;
                        $dotColor = $eventCategory ? $categoryColors[$eventCategory]['dot'] : '';
                        $isSelected = $selectedDay === $day;
                        $buttonClasses = 'h-12 rounded-2xl flex flex-col items-center justify-center text-xs font-bold relative transition-all ';
                        if ($today) {
                            $buttonClasses .= 'bg-primary text-white shadow-lg shadow-primary/30 ';
                        } elseif ($isSelected) {
                            $buttonClasses .= 'bg-emerald-50 text-primary ring-1 ring-emerald-200 ';
                        } elseif ($isFri) {
                            $buttonClasses .= 'text-red-400 hover:bg-red-50 ';
                        } else {
                            $buttonClasses .= 'text-slate-600 hover:bg-slate-50 ';
                        }
                        if ($hasEvents && ! $today) {
                            $buttonClasses .= 'ring-1 ring-inset ring-slate-200 ';
                        }
                    ?>
                        <button type="button"
                                class="<?= trim($buttonClasses) ?>"
                                data-calendar-day="<?= $day ?>"
                                data-event-count="<?= $hasEvents ? count($eventsByDay[$day]) : 0 ?>"
                                data-events='<?= $hasEvents ? esc(json_encode(array_map(static function (array $event) use ($categoryColors): array {
                                    $cat = $categoryColors[$event["category"]] ?? $categoryColors["general"];

                                    return [
                                        "title" => $event["title"],
                                        "description" => $event["description"] ?? "",
                                        "category" => ucfirst($event["category"] ?? "general"),
                                        "badge" => $cat["badge"],
                                        "icon" => $cat["icon"],
                                        "date" => $event["event_date"],
                                    ];
                                }, $eventsByDay[$day])), 'attr') : '[]' ?>'
                                <?= $hasEvents ? 'title="' . esc(implode(', ', array_column($eventsByDay[$day], 'title'))) . '"' : '' ?>>
                            <?= $day ?>
                            <?php if ($hasEvents): ?>
                                <span class="absolute bottom-1.5 w-1.5 h-1.5 rounded-full <?= $dotColor ?>"></span>
                            <?php endif; ?>
                        </button>
                    <?php endfor; ?>
                </div>

                <?php if (! empty($cal_events)): ?>
                    <div class="mt-6 pt-6 border-t border-slate-50 space-y-3">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Events this month</p>
                        <?php foreach ($cal_events as $ev): $cat = $categoryColors[$ev['category']] ?? $categoryColors['general']; ?>
                            <button type="button"
                                    class="w-full flex items-center gap-3 text-left rounded-2xl px-3 py-2 hover:bg-slate-50 transition-colors"
                                    data-calendar-day-jump="<?= (int) date('j', strtotime($ev['event_date'])) ?>">
                                <span class="w-2 h-2 rounded-full shrink-0 <?= $cat['dot'] ?>"></span>
                                <span class="text-[11px] font-bold text-slate-600"><?= date('d', strtotime($ev['event_date'])) ?> - <?= esc($ev['title']) ?></span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="mt-6 pt-6 border-t border-slate-50 text-[11px] text-slate-400 italic">No events this month.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
