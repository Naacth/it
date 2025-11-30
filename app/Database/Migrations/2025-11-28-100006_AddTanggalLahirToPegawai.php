<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTanggalLahirToPegawai extends Migration
{
    public function up()
    {
        $fields = [
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
                'after' => 'divisi',
            ],
        ];

        $this->forge->addColumn('pegawai', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('pegawai', 'tanggal_lahir');
    }
}
