<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePegawai extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel pegawai
        $this->forge->addField([
            'id_pegawai' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_pegawai' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'jenis_kelamin' => [
                'type'           => 'ENUM',
                'constraint'     => ['laki-laki', 'perempuan'],
                'null'           => false,
            ],
            'foto_pegawai' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => true,
            ],
            'divisi' => [
                'type'           => 'ENUM',
                'constraint'     => ['IT', 'Marketing', 'HR', 'Operasional'],
                'null'           => false,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);

        // Membuat primary key
        $this->forge->addKey('id_pegawai', TRUE);

        // Membuat tabel pegawai
        $this->forge->createTable('pegawai', TRUE);
    }

    public function down()
    {
        // menghapus tabel pegawai
        $this->forge->dropTable('pegawai');
    }
}
