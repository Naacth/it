<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session('isLoggedIn')) {
            return redirect()->to('/admin/news');
        }

        $data = [
            'title'   => 'Admin Login',
            'errors'  => session('errors'),
            'message' => session('message'),
        ];

        return view('auth/login', $data);
    }

    public function attempt()
    {
        $validationRules = [
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[6]',
        ];

        if (! $this->validate($validationRules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        }

        $adminModel = new AdminModel();
        $admin      = $adminModel->findByUsername($this->request->getPost('username'));

        if (! $admin || ! password_verify($this->request->getPost('password'), $admin['password_hash'])) {
            return redirect()->back()->with('errors', ['credentials' => 'Username atau password tidak sesuai.'])->withInput();
        }

        session()->set([
            'isLoggedIn' => true,
            'adminId'    => $admin['id'],
            'adminName'  => $admin['name'],
        ]);

        return redirect()->to('/admin/news')->with('message', 'Selamat datang kembali, ' . $admin['name'] . '!');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')->with('message', 'Anda telah keluar dari sesi.');
    }
}

