<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
    protected $table = 'ms_foto';
    protected $primaryKey = 'id_ms_foto';
    protected $allowedFields = ['foto', 'aktif', 'keterangan', 'id_ms_album'];
    public function getAllFotoWithAlbum()
    {
        return $this->select('ms_foto.*, ms_album.nama_album')
            ->join('ms_album', 'ms_album.id_ms_album = ms_foto.id_ms_album')
            ->findAll();
    }
}
