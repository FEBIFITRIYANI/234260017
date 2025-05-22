<?php

// app/Controllers/Tugas.php
namespace App\Controllers;
use App\Models\TugasModel;
use CodeIgniter\Controller;

class Tugas extends Controller {
    // Menampilkan daftar tugas untuk pengguna yang sedang login
    public function index() {
        $model = new TugasModel();
        // Mengambil semua tugas yang terkait dengan user_id dari sesi
        $data['tugas'] = $model->where('user_id', session()->get('user_id'))->findAll();
        // Mengembalikan tampilan dengan data tugas
        return view('tugas/index', $data);
    }

    // Menambahkan tugas baru
    public function tambah() {
        // Memeriksa apakah metode permintaan adalah POST
        if ($this->request->getMethod() === 'post') {
            $model = new TugasModel();
            // Menyimpan data tugas baru ke dalam database
            $model->save([
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
                'user_id' => session()->get('user_id'),
            ]);
            // Mengalihkan pengguna kembali ke daftar tugas setelah berhasil menambahkan
            return redirect()->to('/tugas');
        }
        // Mengembalikan tampilan untuk menambahkan tugas baru
        return view('tugas/tambah');
    }

    // Mengedit tugas yang sudah ada
    public function edit($id) {
        $model = new TugasModel();
        // Memeriksa apakah metode permintaan adalah POST
        if ($this->request->getMethod() === 'post') {
            // Memperbarui data tugas berdasarkan ID
            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
            ]);
            // Mengalihkan pengguna kembali ke daftar tugas setelah berhasil mengedit
            return redirect()->to('/tugas');
        }
        // Mengambil data tugas berdasarkan ID untuk ditampilkan di formulir edit
        $data['tugas'] = $model->find($id);
        // Mengembalikan tampilan untuk mengedit tugas
        return view('tugas/edit', $data);
    }

    // Menghapus tugas berdasarkan ID
    public function hapus($id) {
        $model = new TugasModel();
        // Menghapus tugas dari database berdasarkan ID
        $model->delete($id);
        // Mengalihkan pengguna kembali ke daftar tugas setelah berhasil menghapus
        return redirect()->to('/tugas');
    }
}
