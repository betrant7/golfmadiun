<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class user extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'operator',
            'password' => password_hash('456', PASSWORD_DEFAULT),

            'nama' => 'operator',

        ];
        $this->db->table('ms_user_manager')->insert($data);
    }
}
