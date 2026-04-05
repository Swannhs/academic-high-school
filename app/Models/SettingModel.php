<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['key', 'value', 'group', 'updated_at'];

    public function getAll(): array
    {
        $rows = $this->findAll();
        $result = [];
        foreach ($rows as $row) {
            $result[$row['key']] = $row['value'];
        }
        return $result;
    }

    public function set(string $key, ?string $value): void
    {
        $existing = $this->where('key', $key)->first();
        if ($existing) {
            $this->where('key', $key)->set(['value' => $value, 'updated_at' => date('Y-m-d H:i:s')])->update();
        } else {
            $this->insert(['key' => $key, 'value' => $value, 'updated_at' => date('Y-m-d H:i:s')]);
        }
    }

    public function getByGroup(string $group): array
    {
        return $this->where('group', $group)->findAll();
    }
}
