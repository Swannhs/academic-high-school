<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticeCategoryModel extends Model
{
    protected $table = 'notice_categories';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'name_bn', 'slug', 'status'];

    public function withCount(): array
    {
        return $this->db->table('notice_categories nc')
            ->select('nc.*, COUNT(n.id) as notice_count')
            ->join('notices n', 'n.category_id = nc.id', 'left')
            ->groupBy('nc.id')
            ->get()->getResultArray();
    }

    public function isSafeToDelete(int $id): bool
    {
        $count = $this->db->table('notices')->where('category_id', $id)->countAllResults();
        return $count === 0;
    }
}
