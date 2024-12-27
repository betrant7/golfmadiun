<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriBeritaModel extends Model
{
    protected $table = 'ms_kategori_berita';
    protected $primaryKey = 'id_ms_kategori_berita';
    protected $allowedFields = ['nama_kategori', 'aktif'];
}
