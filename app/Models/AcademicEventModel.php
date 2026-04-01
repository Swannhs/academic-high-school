<?php

namespace App\Models;

use CodeIgniter\Model;

class AcademicEventModel extends Model
{
    protected $table      = 'academic_events';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'description', 'event_date', 'category'];

    public function getByMonth(int $year, int $month): array
    {
        return $this->where('STRFTIME("%Y", event_date)', str_pad($year, 4, '0', STR_PAD_LEFT))
                    ->where('STRFTIME("%m", event_date)', str_pad($month, 2, '0', STR_PAD_LEFT))
                    ->orderBy('event_date', 'ASC')
                    ->findAll();
    }

    public function getUpcoming(int $limit = 5): array
    {
        return $this->where('event_date >=', date('Y-m-d'))
                    ->orderBy('event_date', 'ASC')
                    ->findAll($limit);
    }
}
