<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pegawai extends BaseController
{
    public function index()
    {
        $pegawaiModel = new PegawaiModel();
        
        // Get all pegawai grouped by divisi
        $data['divisiList'] = $pegawaiModel->getAllDivisi();
        $data['pegawaiByDivisi'] = [];
        
        foreach ($data['divisiList'] as $divisi) {
            $data['pegawaiByDivisi'][$divisi] = $pegawaiModel->getByDivisi($divisi);
        }
        
        echo view('pegawai', $data);
    }

    public function divisi($divisi)
    {
        $pegawaiModel = new PegawaiModel();
        
        // Validate divisi
        $validDivisi = ['IT', 'Marketing', 'HR', 'Operasional'];
        if (!in_array($divisi, $validDivisi)) {
            throw PageNotFoundException::forPageNotFound();
        }
        
        $data['divisi'] = $divisi;
        $data['pegawai'] = $pegawaiModel->getByDivisi($divisi);
        $data['divisiList'] = $pegawaiModel->getAllDivisi();
        
        echo view('pegawai_divisi', $data);
    }

    public function detail($id)
    {
        $pegawaiModel = new PegawaiModel();
        $pegawai = $pegawaiModel->find($id);

        if (!$pegawai) {
            throw PageNotFoundException::forPageNotFound('Pegawai tidak ditemukan');
        }

        $data['pegawai'] = $pegawai;

        echo view('pegawai_detail', $data);
    }
}



