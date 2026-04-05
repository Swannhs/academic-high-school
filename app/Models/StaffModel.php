<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'photo', 'role', 'department', 'contact', 'display_order', 'status', 'created_by', 'updated_by'];
}
