<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title', 'slug', 'banner_title', 'content', 'featured_image',
        'status', 'meta_title', 'meta_description', 'created_by', 'updated_by',
    ];
}
