<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PegawaiAdmin extends BaseController
{
    public function index()
    {
        $pegawaiModel = new PegawaiModel();
        
        // Filter by divisi if provided
        $divisi = $this->request->getGet('divisi');
        if ($divisi && in_array($divisi, $pegawaiModel->getAllDivisi())) {
            $data['pegawai'] = $pegawaiModel->getByDivisi($divisi);
        } else {
            $data['pegawai'] = $pegawaiModel->findAll();
        }
        
        $data['divisiList'] = $pegawaiModel->getAllDivisi();
        $data['currentDivisi'] = $divisi ?? '';
        
        echo view('admin_list_pegawai', $data);
    }

    public function create()
    {
        $pegawaiModel = new PegawaiModel();
        $validation = \Config\Services::validation();
        
        // Set validation rules
        $validation->setRules([
            'nama_pegawai' => 'required|min_length[3]|max_length[255]',
            'jenis_kelamin' => 'required|in_list[laki-laki,perempuan]',
            'divisi' => 'required|in_list[IT,Marketing,HR,Operasional]',
            'tanggal_lahir' => 'required|valid_date[Y-m-d]',
            'foto_pegawai' => 'uploaded[foto_pegawai]|max_size[foto_pegawai,2048]|is_image[foto_pegawai]|mime_in[foto_pegawai,image/jpg,image/jpeg,image/png,image/gif]'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        // Jika data valid, simpan ke database
        if ($isDataValid) {
            $file = $this->request->getFile('foto_pegawai');
            $fotoName = null;

            // Upload foto jika ada
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $fotoName = $file->getRandomName();
                $uploadPath = FCPATH . 'uploads/pegawai/';
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                $file->move($uploadPath, $fotoName);
            }

            $pegawaiModel->insert([
                'nama_pegawai' => $this->request->getPost('nama_pegawai'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'divisi' => $this->request->getPost('divisi'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'foto_pegawai' => $fotoName
            ]);

            return redirect()->to('admin/pegawai')->with('success', 'Data pegawai berhasil ditambahkan');
        }

        // Tampilkan form create
        $data['divisiList'] = $pegawaiModel->getAllDivisi();
        $data['validation'] = $validation ?? \Config\Services::validation();
        echo view('admin_create_pegawai', $data);
    }

    public function edit($id)
    {
        $pegawaiModel = new PegawaiModel();
        $data['pegawai'] = $pegawaiModel->find($id);

        if (!$data['pegawai']) {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        
        // Set validation rules (foto optional untuk edit)
        $validation->setRules([
            'id_pegawai' => 'required',
            'nama_pegawai' => 'required|min_length[3]|max_length[255]',
            'jenis_kelamin' => 'required|in_list[laki-laki,perempuan]',
            'divisi' => 'required|in_list[IT,Marketing,HR,Operasional]',
            'tanggal_lahir' => 'required|valid_date[Y-m-d]',
            'foto_pegawai' => 'max_size[foto_pegawai,2048]|is_image[foto_pegawai]|mime_in[foto_pegawai,image/jpg,image/jpeg,image/png,image/gif]'
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        // Jika data valid, simpan ke database
        if ($isDataValid) {
            $updateData = [
                'nama_pegawai' => $this->request->getPost('nama_pegawai'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'divisi' => $this->request->getPost('divisi'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            ];

            // Handle foto upload jika ada file baru
            $file = $this->request->getFile('foto_pegawai');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Hapus foto lama jika ada
                if (!empty($data['pegawai']['foto_pegawai'])) {
                    $oldFotoPath = FCPATH . 'uploads/pegawai/' . $data['pegawai']['foto_pegawai'];
                    if (file_exists($oldFotoPath)) {
                        unlink($oldFotoPath);
                    }
                }

                // Upload foto baru
                $uploadPath = FCPATH . 'uploads/pegawai/';
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                $fotoName = $file->getRandomName();
                $file->move($uploadPath, $fotoName);
                $updateData['foto_pegawai'] = $fotoName;
            }

            $pegawaiModel->update($id, $updateData);
            return redirect()->to('admin/pegawai')->with('success', 'Data pegawai berhasil diupdate');
        }

        // Tampilkan form edit
        $data['divisiList'] = $pegawaiModel->getAllDivisi();
        $data['validation'] = $validation ?? \Config\Services::validation();
        echo view('admin_edit_pegawai', $data);
    }

    public function delete($id)
    {
        $pegawaiModel = new PegawaiModel();
        $pegawai = $pegawaiModel->find($id);

        if (!$pegawai) {
            throw PageNotFoundException::forPageNotFound();
        }

        // Hapus foto jika ada
        if (!empty($pegawai['foto_pegawai'])) {
            $fotoPath = FCPATH . 'uploads/pegawai/' . $pegawai['foto_pegawai'];
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $pegawaiModel->delete($id);
        return redirect()->to('admin/pegawai')->with('success', 'Data pegawai berhasil dihapus');
    }
}

