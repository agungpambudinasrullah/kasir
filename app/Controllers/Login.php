<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function login()
    {
        // Tampilkan halaman login
        return view('v_login'); // Ganti 'login' dengan nama file view login Anda
    }

    public function processLogin()
    {
        // Ambil data form login dari POST request
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Contoh sederhana: Periksa apakah username dan password sesuai
        if ($username === 'user' && $password === 'password') {
            // Login berhasil, Anda dapat menyimpan informasi login ke sesi atau melakukan tindakan lainnya
            return redirect()->to('/produk'); // Ganti '/dashboard' dengan rute yang sesuai
        } else {
            // Login gagal, tampilkan halaman login kembali dengan pesan error
            return redirect()->to('/login')->with('error', 'Login gagal. Periksa kembali username dan password.');
        }
    }

    public function logout()
    {
        // Tambahkan logika logout jika diperlukan
        // Contoh sederhana: Hapus sesi atau lakukan tindakan logout lainnya
        return redirect()->to('/login'); // Redirect ke halaman login setelah logout
    }
}
