<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryImageModel extends Model
{
    protected $table = 'gallery_images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['album_id', 'image_path', 'caption', 'display_order', 'created_at'];
    protected $useTimestamps = false;
}
