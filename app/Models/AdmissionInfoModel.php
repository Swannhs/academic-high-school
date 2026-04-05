<?php

namespace App\Models;

use CodeIgniter\Model;

class AdmissionInfoModel extends Model
{
    protected $table = 'admission_info';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title', 'session_year', 'overview', 'eligibility', 'requirements',
        'important_dates', 'instructions', 'application_form_file', 'circular_file', 'status',
    ];
}
