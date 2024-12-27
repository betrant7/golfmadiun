<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table = 'banner';
    protected $primaryKey = 'id_banner';
    protected $allowedFields = ['banner', 'deskripsi', 'aktif'];

    public function getActiveBanners()
    {
        return $this->where('aktif', 1)->findAll();
    }
}
