<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriTournamentModel extends Model
{
    protected $table = 'ms_kategori_tournament';
    protected $primaryKey = 'id_ms_kategori_tournament';
    protected $allowedFields = ['nama_kategori'];
}
