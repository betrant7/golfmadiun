<?php

namespace App\Models;

use CodeIgniter\Model;

class TournamentModel extends Model
{
    protected $table = 'ms_tournament';

    protected $primaryKey = 'id_ms_tournament';
    protected $allowedFields = ['id_ms_kategori_tournament', 'tgl_awal', 'tgl_akhir', 'judul', 'venue'];

    public function getTournamentWithKategori()
    {
        return $this->join('ms_kategori_tournament', 'ms_tournament.id_ms_kategori_tournament = ms_kategori_tournament.id_ms_kategori_tournament')->findAll();
    }
}
