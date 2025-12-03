<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pegawai extends BaseController
{
    public function index()
    {
        $pegawaiModel = new PegawaiModel();
        
        // Get search and filter parameters
        $search = $this->request->getGet('search');
        $divisiFilter = $this->request->getGet('divisi');
        $jenisKelaminFilter = $this->request->getGet('jenis_kelamin');
        
        // Get all pegawai with search and filter
        if (!empty($search) || !empty($divisiFilter) || !empty($jenisKelaminFilter)) {
            $allPegawai = $pegawaiModel->searchAndFilter($search, $divisiFilter, $jenisKelaminFilter);
            
            // Group by divisi
            $data['pegawaiByDivisi'] = [];
            foreach ($pegawaiModel->getAllDivisi() as $divisi) {
                $data['pegawaiByDivisi'][$divisi] = array_filter($allPegawai, function($p) use ($divisi) {
                    return $p['divisi'] === $divisi;
                });
            }
        } else {
            // Get all pegawai grouped by divisi
            $data['pegawaiByDivisi'] = [];
            foreach ($pegawaiModel->getAllDivisi() as $divisi) {
                $data['pegawaiByDivisi'][$divisi] = $pegawaiModel->getByDivisi($divisi);
            }
        }
        
        $data['divisiList'] = $pegawaiModel->getAllDivisi();
        $data['search'] = $search ?? '';
        $data['divisiFilter'] = $divisiFilter ?? '';
        $data['jenisKelaminFilter'] = $jenisKelaminFilter ?? '';
        
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



