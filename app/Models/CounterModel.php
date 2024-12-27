<?php

namespace App\Models;

use CodeIgniter\Model;

class CounterModel extends Model
{
    protected $table = 'counter';
    protected $primaryKey = 'id_counter';
    protected $allowedFields = ['jumlah', 'tgl'];
    public function getTodayVisitor($today)
    {
        return $this->where('tgl', $today)->first();
    }
    public function getDailyVisitors()
    {
        return $this->orderBy('tgl', 'ASC')->findAll();
    }
    public function incrementVisitor($id)
    {
        $this->set('jumlah', 'jumlah + 1', false)
            ->where('id_counter', $id)
            ->update();
    }
}
