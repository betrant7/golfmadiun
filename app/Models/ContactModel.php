<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'ms_footer';
    protected $primaryKey = 'id_ms_footer';
    protected $allowedFields = ['isi_footer', 'aktif'];

    public function getFooterbyid($id){
        return $this->where('id_ms_footer', $id)->first();
    }
}
