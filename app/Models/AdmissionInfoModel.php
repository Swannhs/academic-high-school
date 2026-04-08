<?php

namespace App\Models;

use CodeIgniter\Model;

class AdmissionInfoModel extends Model
{
    protected $table = 'admission_info';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title', 'title_bn', 'session_year', 'overview', 'overview_bn', 'eligibility', 'eligibility_bn', 'requirements', 'requirements_bn',
        'important_dates', 'important_dates_bn', 'instructions', 'instructions_bn', 'application_form_file', 'circular_file', 'status',
    ];
}
