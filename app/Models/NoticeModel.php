<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticeModel extends Model
{
    protected $table = 'notices';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title',
        'title_bn',
        'slug',
        'category_id',
        'short_description',
        'short_description_bn',
        'content',
        'content_bn',
        'attachment',
        'publish_date',
        'is_featured',
        'status',
        'created_by',
        'updated_by',
    ];
}
