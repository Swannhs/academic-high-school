<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultModel extends Model
{
    protected $table = 'results';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title',
        'title_bn',
        'exam_name',
        'exam_name_bn',
        'class_name',
        'session_year',
        'file_path',
        'publish_date',
        'description',
        'description_bn',
        'status',
        'category',
        'year',
        'stats',
        'download_url',
        'exam_type',
        'class_category',
        'created_by',
        'updated_by',
    ];
}
