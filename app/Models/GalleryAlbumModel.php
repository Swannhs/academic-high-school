<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryAlbumModel extends Model
{
    protected $table = 'gallery_albums';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'title_bn', 'category', 'cover_image', 'event_date', 'description', 'description_bn', 'status'];

    public function withImageCount(): array
    {
        return $this->db->table('gallery_albums a')
            ->select('a.*, COUNT(i.id) as image_count')
            ->join('gallery_images i', 'i.album_id = a.id', 'left')
            ->groupBy('a.id')
            ->orderBy('a.id', 'DESC')
            ->get()->getResultArray();
    }
}
