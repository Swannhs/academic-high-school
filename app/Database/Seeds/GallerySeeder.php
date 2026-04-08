<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $albums = [
            [
                'title'       => 'Annual Sports Day 2025',
                'category'    => 'Sports',
                'cover_image' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=800',
                'event_date'  => '2025-02-15',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'title'       => 'ICT Workshop',
                'category'    => 'Academic',
                'cover_image' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=800',
                'event_date'  => '2025-03-10',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'title'       => 'Science Fair',
                'category'    => 'Academic',
                'cover_image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=800',
                'event_date'  => '2025-01-20',
                'status'      => 'active',
                'created_at'  => date('Y-m-d H:i:s'),
            ]
        ];

        foreach ($albums as $album) {
            $this->db->table('gallery_albums')->insert($album);
            $albumId = $this->db->insertID();

            // Insert 3 images per album
            for ($i = 1; $i <= 3; $i++) {
                $this->db->table('gallery_images')->insert([
                    'album_id'   => $albumId,
                    'image_path' => $album['cover_image'] . "&id=$i", // Just a fake path for external URLs
                    'caption'    => 'Moment ' . $i . ' from ' . $album['title'],
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
