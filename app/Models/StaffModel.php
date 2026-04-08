<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'name_bn', 'photo', 'role', 'role_bn', 'department', 'department_bn', 'contact', 'display_order', 'status', 'created_by', 'updated_by'];
}
