<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table = 'ms_album';
    protected $primaryKey = 'id_ms_album';
    protected $allowedFields = ['nama_album', 'aktif'];

    public function getFooterbyid($id){
        return $this->where('id_ms_album', $id)->first();
    }
}
