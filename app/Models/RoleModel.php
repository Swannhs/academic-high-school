<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'label', 'description', 'is_protected'];

    public function withPermissions(int $roleId): array
    {
        return $this->db->table('role_permissions rp')
            ->select('p.*')
            ->join('permissions p', 'p.id = rp.permission_id')
            ->where('rp.role_id', $roleId)
            ->get()->getResultArray();
    }

    public function syncPermissions(int $roleId, array $permissionIds): void
    {
        $this->db->table('role_permissions')->where('role_id', $roleId)->delete();
        if (! empty($permissionIds)) {
            $rows = array_map(fn($pid) => ['role_id' => $roleId, 'permission_id' => (int)$pid], $permissionIds);
            $this->db->table('role_permissions')->insertBatch($rows);
        }
    }
}
