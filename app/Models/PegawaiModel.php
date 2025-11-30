<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    
    protected $allowedFields    = [
        'nama_pegawai',
        'jenis_kelamin',
        'foto_pegawai',
        'divisi',
        'tanggal_lahir',
    ];

    protected $validationRules = [
        'nama_pegawai' => 'required|min_length[3]|max_length[255]',
        'jenis_kelamin' => 'required|in_list[laki-laki,perempuan]',
        'divisi' => 'required|in_list[IT,Marketing,HR,Operasional]',
        'tanggal_lahir' => 'required|valid_date[Y-m-d]',
    ];

    protected $validationMessages = [
        'nama_pegawai' => [
            'required' => 'Nama pegawai harus diisi',
            'min_length' => 'Nama pegawai minimal 3 karakter',
            'max_length' => 'Nama pegawai maksimal 255 karakter',
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin harus dipilih',
            'in_list' => 'Jenis kelamin harus laki-laki atau perempuan',
        ],
        'divisi' => [
            'required' => 'Divisi harus dipilih',
            'in_list' => 'Divisi harus IT, Marketing, HR, atau Operasional',
        ],
        'tanggal_lahir' => [
            'required' => 'Tanggal lahir harus diisi',
            'valid_date' => 'Format tanggal lahir tidak valid (gunakan YYYY-MM-DD)',
        ],
    ];

    /**
     * Get pegawai by divisi
     */
    public function getByDivisi(string $divisi): array
    {
        return $this->where('divisi', $divisi)->findAll();
    }

    /**
     * Get all divisi
     */
    public function getAllDivisi(): array
    {
        return ['IT', 'Marketing', 'HR', 'Operasional'];
    }
}


