<?php

namespace App\Models;

use CodeIgniter\Model;

class RoutineModel extends Model
{
    protected $table = 'routines';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title',
        'routine_type',
        'class_name',
        'file_path',
        'publish_date',
        'notes',
        'status',
        'created_by',
        'updated_by',
    ];
}
