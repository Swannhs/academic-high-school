<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'name', 'username', 'email', 'password_hash', 'role_id',
        'avatar', 'status', 'last_login',
    ];

    public function findByEmail(string $email): ?array
    {
        return $this->where('email', $email)->first();
    }

    public function findByUsername(string $username): ?array
    {
        return $this->where('username', $username)->first();
    }

    public function withRole(): array
    {
        return $this->db->table('users u')
            ->select('u.*, r.name as role_name, r.label as role_label')
            ->join('roles r', 'r.id = u.role_id', 'left')
            ->get()->getResultArray();
    }

    public function getPermissions(int $roleId): array
    {
        $rows = $this->db->table('role_permissions rp')
            ->select('p.key')
            ->join('permissions p', 'p.id = rp.permission_id')
            ->where('rp.role_id', $roleId)
            ->get()->getResultArray();
        return array_column($rows, 'key');
    }
}
