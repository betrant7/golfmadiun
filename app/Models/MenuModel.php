<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'ms_menu';
    protected $primaryKey = 'id_ms_menu';
    protected $allowedFields = ['nama_menu', 'aktif'];
}
