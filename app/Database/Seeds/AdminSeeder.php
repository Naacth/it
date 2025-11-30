<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $password = password_hash('admin123', PASSWORD_DEFAULT);

        $data = [
            'name'          => 'Administrator',
            'username'      => 'admin',
            'password_hash' => $password,
        ];

        $this->db->table('admins')->insert($data);
    }
}

