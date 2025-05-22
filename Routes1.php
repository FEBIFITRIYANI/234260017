<?php

// app/Config/Routes.php

// Rute untuk halaman login
$routes->get('/login', 'Auth::login'); // Menampilkan formulir login
$routes->post('/login', 'Auth::login'); // Mengirim data login untuk otentikasi

// Rute untuk halaman pendaftaran
$routes->get('/register', 'Auth::register'); // Menampilkan formulir pendaftaran
$routes->post('/register', 'Auth::register'); // Mengirim data pendaftaran untuk membuat akun baru

// Rute untuk logout
$routes->get('/logout', 'Auth::logout'); // Menghapus sesi pengguna dan mengalihkan ke halaman login

// Rute untuk tugas
$routes->get('/tugas', 'Tugas::index'); // Menampilkan daftar tugas untuk pengguna yang sedang login
$routes->get('/tugas/tambah', 'Tugas::tambah'); // Menampilkan formulir untuk menambahkan tugas baru
$routes->post('/tugas/tambah', 'Tugas::tambah'); // Mengirim data tugas baru untuk disimpan ke database
$routes->get('/tugas/edit/(:num)', 'Tugas::edit/$1'); // Menampilkan formulir untuk mengedit tugas berdasarkan ID
$routes->post('/tugas/edit/(:num)', 'Tugas::edit/$1'); // Mengirim data yang diedit untuk diperbarui di database
$routes->get('/tugas/hapus/(:num)', 'Tugas::hapus/$1'); // Menghapus tugas berdasarkan ID dan mengalihkan kembali ke daftar tugas
