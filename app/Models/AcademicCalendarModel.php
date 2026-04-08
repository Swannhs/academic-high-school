<?php

namespace App\Models;

use CodeIgniter\Model;

class AcademicCalendarModel extends Model
{
    protected $table = 'academic_calendar';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title',
        'title_bn',
        'category',
        'event_date',
        'end_date',
        'description',
        'description_bn',
        'status',
        'created_by',
        'updated_by',
    ];
}
