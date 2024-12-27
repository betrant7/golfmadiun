<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table = 'ms_video';
    protected $primaryKey = 'id_ms_video';
    protected $allowedFields = ['video', 'aktif', 'id_ms_album'];

    public function getAllVideoWithAlbum()
    {
        return $this->select('ms_video.*, ms_album.nama_album')
            ->join('ms_album', 'ms_album.id_ms_album = ms_video.id_ms_album')
            ->findAll();
    }
}
