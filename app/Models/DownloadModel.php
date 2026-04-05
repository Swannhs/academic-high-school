<?php

namespace App\Models;

use CodeIgniter\Model;

class DownloadModel extends Model
{
    protected $table = 'downloads';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title',
        'category',
        'file_path',
        'description',
        'status',
        'publish_date',
        'created_by',
        'updated_by',
    ];
}
