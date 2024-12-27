<?php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
    protected $table = 'ms_content';
    protected $primaryKey = 'id_ms_content';
    protected $allowedFields = ['judul','isi_content', 'id_ms_menu'];

    public function getContectWithMenu($id)
    {
        return $this->join('ms_menu', 'ms_content.id_ms_menu = ms_menu.id_ms_menu')
            ->where(['ms_content.id_ms_content' => $id])
            ->first();
    }

    public function getMenuById($id_ms_menu)
    {
        return $this->where('id_ms_menu', $id_ms_menu)->first(); // Mengambil satu data berdasarkan id_ms_menu
    }
}
