<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table = 'teachers';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'name',
        'name_bn',
        'photo',
        'photo_url',
        'designation',
        'designation_bn',
        'department',
        'department_bn',
        'subject',
        'subject_bn',
        'qualification',
        'qualification_bn',
        'phone',
        'email',
        'joining_date',
        'display_order',
        'status',
        'created_by',
        'updated_by',
    ];
}
