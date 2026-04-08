<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'school_name', 'value' => 'Prottasha Academic High School', 'group' => 'general'],
            ['key' => 'school_name_bn', 'value' => 'প্রত্যাশা একাডেমিক উচ্চ বিদ্যালয়', 'group' => 'general'],
            ['key' => 'eiin', 'value' => '123456', 'group' => 'general'],
            ['key' => 'tagline', 'value' => 'Nurturing Excellence Since 1998', 'group' => 'general'],
            ['key' => 'email', 'value' => 'info@prottasha.edu.bd', 'group' => 'contact'],
            ['key' => 'phone', 'value' => '+880 1234 567890', 'group' => 'contact'],
            ['key' => 'address', 'value' => '123 Academic Avenue, Dhaka-1212, Bangladesh', 'group' => 'contact'],
            ['key' => 'office_hours', 'value' => 'Sat-Thu, 9:00 AM to 4:00 PM', 'group' => 'contact'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/prottasha', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => '', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => '', 'group' => 'social'],
            ['key' => 'homepage_hero', 'value' => 'Excellence in Education', 'group' => 'homepage'],
            ['key' => 'principal_message_snippet', 'value' => 'Welcome to our school...', 'group' => 'homepage'],
            ['key' => 'logo', 'value' => '', 'group' => 'branding'],
            ['key' => 'favicon', 'value' => '', 'group' => 'branding'],
        ];

        $this->db->table('settings')->truncate();
        $this->db->table('settings')->insertBatch($settings);
    }
}
