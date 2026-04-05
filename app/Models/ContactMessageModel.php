<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactMessageModel extends Model
{
    protected $table = 'contact_messages';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;
    protected $allowedFields = ['name', 'phone', 'email', 'subject', 'message', 'is_read', 'created_at'];

    public function unreadCount(): int
    {
        return $this->where('is_read', 0)->countAllResults();
    }
}
