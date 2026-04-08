<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AcademicEventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'Mid-Year Examination Routine Published',
                'description' => 'Routine for classes VI to X is published on the notice board and school website.',
                'event_date' => '2026-06-03',
                'category' => 'general',
            ],
            [
                'title' => 'Half-Yearly Examination Begins',
                'description' => 'Half-yearly examinations begin for all academic sections.',
                'event_date' => '2026-06-08',
                'category' => 'exam',
            ],
            [
                'title' => 'Summer Vacation Starts',
                'description' => 'Academic activities remain closed for the announced summer recess.',
                'event_date' => '2026-06-20',
                'category' => 'holiday',
            ],
            [
                'title' => 'Class Activities Resume',
                'description' => 'Regular classes resume after the summer break.',
                'event_date' => '2026-07-05',
                'category' => 'general',
            ],
            [
                'title' => 'Parents-Teachers Meeting',
                'description' => 'Guardians meet class teachers to review half-yearly performance.',
                'event_date' => '2026-07-18',
                'category' => 'event',
            ],
            [
                'title' => 'Inter-House Debate Competition',
                'description' => 'Students from all houses participate in the annual debate contest.',
                'event_date' => '2026-08-12',
                'category' => 'event',
            ],
            [
                'title' => 'Monthly Class Test Week',
                'description' => 'Short assessment week for continuous evaluation.',
                'event_date' => '2026-08-24',
                'category' => 'exam',
            ],
            [
                'title' => 'Eid-e-Milad Holiday',
                'description' => 'School remains closed for the public holiday.',
                'event_date' => '2026-09-16',
                'category' => 'holiday',
            ],
            [
                'title' => 'SSC Model Test Starts',
                'description' => 'Model tests begin for SSC candidates with revised seat plan.',
                'event_date' => '2026-10-04',
                'category' => 'exam',
            ],
            [
                'title' => 'Annual Cultural অনুষ্ঠান',
                'description' => 'Students participate in music, recitation, and drama performances.',
                'event_date' => '2026-11-07',
                'category' => 'event',
            ],
            [
                'title' => 'Final Examination Begins',
                'description' => 'Final examinations start for classes VI to IX.',
                'event_date' => '2026-11-22',
                'category' => 'exam',
            ],
            [
                'title' => 'Victory Day Programme',
                'description' => 'Special assembly, parade, and cultural tribute for Victory Day.',
                'event_date' => '2026-12-16',
                'category' => 'event',
            ],
            [
                'title' => 'Winter Vacation',
                'description' => 'Winter break begins after publication of annual results.',
                'event_date' => '2026-12-24',
                'category' => 'holiday',
            ],
        ];

        foreach ($events as $event) {
            $exists = $this->db->table('academic_calendar')
                ->where('title', $event['title'])
                ->where('event_date', $event['event_date'])
                ->countAllResults();

            if ($exists === 0) {
                $this->db->table('academic_calendar')->insert([
                    ...$event,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
