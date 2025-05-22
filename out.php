<?php

// app/Controllers/Auth.php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller {

    public function login() {     // Menangani proses login user.
        helper(['form']); 
        if ($this->request->getMethod() === 'post') {  // Jika request berupa POST, maka akan mengambil data username dan password dari form,
            $model = new UserModel(); // kemudian mencocokkannya dengan data di database menggunakan UserModel.
            $user = $model->where('username', $this->request->getPost('username'))->first();
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                session()->set(['user_id' => $user['id'], 'username' => $user['username']]);
                return redirect()->to('/tugas'); // Jika cocok, maka data user disimpan ke session dan diarahkan ke halaman /tugas.
            } 
            return redirect()->back()->with('error', 'Login gagal'); // Jika tidak cocok, redirect kembali dengan pesan error.
        }
        return view('auth/login'); //Jika bukan POST, maka hanya menampilkan form login.
    }

    public function register() { //Menangani proses registrasi user baru.
        helper(['form']); //Jika request berupa POST, maka akan mengambil username dan password dari form,
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]; // melakukan hashing pada password, dan menyimpan data ke database.
            $model->insert($data);
            return redirect()->to('/login'); //Setelah berhasil, user akan diarahkan ke halaman login.
        }
        return view('auth/register'); //Jika bukan POST, maka hanya menampilkan form registrasi.
    }

    public function logout() { //Menghapus data session (logout).
        session()->destroy();
        return redirect()->to('/login'); //Setelah session dihancurkan, user akan diarahkan ke halaman login.
    }
}
