<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        // 1. Seed Dynamic Pages
        $this->db->table('pages')->truncate();
        $pages = [
            [
                'title'       => 'Our History',
                'title_bn'    => 'আমাদের ইতিহাস',
                'slug'        => 'history',
                'content'     => '<h1>A Legacy of Excellence</h1><p>Founded in 1994, Prottasha Academic High School has been a beacon of learning, blending traditional values with modern pedagogical techniques.</p><p>What started with just three classrooms has blossomed into a prestigious institution.</p>',
                'content_bn'  => '<h1>উৎকর্ষের একটি ঐতিহ্য</h1><p>১৯৯৪ সালে প্রতিষ্ঠিত, প্রত্যাশা একাডেমিক উচ্চ বিদ্যালয় শিক্ষার একটি বাতিঘর হিসেবে কাজ করছে।</p><p>মাত্র তিনটি শ্রেণীকক্ষ দিয়ে শুরু হওয়া এই বিদ্যালয়টি আজ একটি মর্যাদাপূর্ণ প্রতিষ্ঠানে পরিণত হয়েছে।</p>',
                'status'      => 'published',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'title'       => 'Principal\'s Message',
                'title_bn'    => 'অধ্যক্ষের বাণী',
                'slug'        => 'principal-message',
                'content'     => '<h2>Welcome to Prottasha</h2><p>Education is not just about the curriculum; it\'s about the character we build. Every child has a unique light that needs to be nurtured with care and wisdom.</p><p>- Dr. Mahfuzur Rahman</p>',
                'content_bn'  => '<h2>প্রত্যাশায় স্বাগতম</h2><p>শিক্ষা শুধু পাঠ্যক্রমের বিষয় নয়; এটি চরিত্র গঠনের বিষয়। প্রতিটি শিশুর একটি অনন্য আলো আছে যা যত্ন ও প্রজ্ঞার সাথে লালন করা প্রয়োজন।</p><p>- ড. মাহফুজুর রহমান</p>',
                'status'      => 'published',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'title'       => 'Facilities',
                'title_bn'    => 'সুযোগ-সুবিধা',
                'slug'        => 'facilities',
                'content'     => '<ul><li><strong>Science Labs:</strong> Equipped with modern apparatus.</li><li><strong>Library:</strong> Over 15,000 volumes.</li><li><strong>ICT Center:</strong> Fiber connectivity with 50+ workstations.</li></ul>',
                'content_bn'  => '<ul><li><strong>বিজ্ঞান ল্যাব:</strong> আধুনিক যন্ত্রপাতি দিয়ে সজ্জিত।</li><li><strong>গ্রন্থাগার:</strong> ১৫,০০০-এর বেশি বই।</li><li><strong>আইসিটি কেন্দ্র:</strong> উচ্চ গতির ইন্টারনেট সহ ৫০টির বেশি কম্পিউটার।</li></ul>',
                'status'      => 'published',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ]
        ];
        $this->db->table('pages')->insertBatch($pages);

        // 2. Seed Teachers
        $this->db->table('teachers')->truncate();
        $teachers = [
            [
                'name'         => 'Dr. Mahfuzur Rahman',
                'name_bn'      => 'ড. মাহফুজুর রহমান',
                'designation'  => 'Principal',
                'designation_bn'=> 'অধ্যক্ষ',
                'department'   => 'Administration',
                'qualification'=> 'Ph.D in Educational Leadership',
                'photo'        => 'default_principal.jpg',
                'email'        => 'principal@prottasha.edu.bd',
                'phone'        => '01711000001',
                'status'       => 'active',
                'display_order'=> 1
            ],
            [
                'name'         => 'Prof. Abul Kashem',
                'name_bn'      => 'অধ্যাপক আবুল কাসেম',
                'designation'  => 'Senior Teacher',
                'designation_bn'=> 'সিনিয়র শিক্ষক',
                'department'   => 'Science',
                'qualification'=> 'M.Sc in Physics',
                'photo'        => null,
                'email'        => 'physics@prottasha.edu.bd',
                'phone'        => '01711000002',
                'status'       => 'active',
                'display_order'=> 2
            ],
            [
                'name'         => 'Sumaiya Islam',
                'name_bn'      => 'সুমাইয়া ইসলাম',
                'designation'  => 'Teacher',
                'designation_bn'=> 'শিক্ষক',
                'department'   => 'Arts & Humanities',
                'qualification'=> 'M.A. in Bengali Literature',
                'photo'        => null,
                'email'        => 'bengali@prottasha.edu.bd',
                'phone'        => '01711000003',
                'status'       => 'active',
                'display_order'=> 3
            ]
        ];
        $this->db->table('teachers')->insertBatch($teachers);

        // 3. Seed Notices
        $this->db->table('notices')->truncate();
        $this->db->table('notice_categories')->truncate();

        // Create a default category
        $this->db->table('notice_categories')->insert([
            'id' => 1,
            'name' => 'General',
            'name_bn' => 'সাধারণ',
            'slug' => 'general',
            'status' => 'active'
        ]);

        $notices = [
            [
                'category_id'      => 1,
                'title'            => 'Summer Vacation Notice 2024',
                'title_bn'         => 'গ্রীষ্মকালীন ছুটির বিজ্ঞপ্তি ২০২৪',
                'short_description' => '<p>The school will remain closed for summer vacation from May 10 to May 25.</p>',
                'short_description_bn' => '<p>গ্রীষ্মকালীন ছুটি উপলক্ষে আগামী ১০ মে থেকে ২৫ মে পর্যন্ত বিদ্যালয় বন্ধ থাকবে।</p>',
                'content'          => '<p>Dear Parents and Students,</p><p>Please be informed that the school will remain closed for summer vacation from <strong>May 10 to May 25, 2024</strong>. Classes will resume as usual on May 26.</p>',
                'content_bn'       => '<p>প্রিয় অভিভাবক ও শিক্ষার্থীবৃন্দ,</p><p>আপনাদের অবগতির জন্য জানানো যাচ্ছে যে, গ্রীষ্মকালীন ছুটি উপলক্ষে আগামী <strong>১০ মে থেকে ২৫ মে ২০২৪</strong> পর্যন্ত বিদ্যালয় বন্ধ থাকবে। ২৬ মে থেকে যথারীতি ক্লাস শুরু হবে।</p>',
                'publish_date'     => date('Y-m-d', strtotime('-2 days')),
                'status'           => 'active',
                'is_featured'      => 1,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s')
            ],
            [
                'category_id'      => 1,
                'title'            => 'Half Yearly Examination Routine',
                'title_bn'         => 'অর্ধবার্ষিক পরীক্ষার রুটিন',
                'short_description' => '<p>The routine for the upcoming half-yearly examination has been published.</p>',
                'short_description_bn' => '<p>আসন্ন অর্ধবার্ষিক পরীক্ষার রুটিন প্রকাশ করা হয়েছে।</p>',
                'content'          => '<h3>Examination Instructions</h3><ul><li>Students must arrive 30 minutes early.</li><li>Bring your admit card.</li></ul>',
                'content_bn'       => '<h3>পরীক্ষার নির্দেশনাবলী</h3><ul><li>পরীক্ষার্থীদের ৩০ মিনিট আগে উপস্থিত থাকতে হবে।</li><li>অ্যাডমিট কার্ড অবশ্যই সাথে আনতে হবে।</li></ul>',
                'publish_date'     => date('Y-m-d', strtotime('-5 days')),
                'status'           => 'active',
                'is_featured'      => 0,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s')
            ]
        ];
        $this->db->table('notices')->insertBatch($notices);

        echo "Dummy data seeded successfully!\n";
    }
}
