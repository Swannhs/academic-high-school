<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title', 'title_bn', 'slug', 'banner_title', 'banner_title_bn', 'content', 'content_bn', 'featured_image',
        'status', 'meta_title', 'meta_title_bn', 'meta_description', 'meta_description_bn', 'created_by', 'updated_by',
    ];
}
