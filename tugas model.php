<?php

// app/Models/TugasModel.php
namespace App\Models;
use CodeIgniter\Model;

class TugasModel extends Model {
    // Nama tabel yang digunakan di database
    protected $table = 'tugas';

    // Field yang diizinkan untuk diisi secara massal (mass assignment)
    protected $allowedFields = ['judul', 'deskripsi', 'deadline', 'status', 'user_id'];

    // Menonaktifkan automatic timestamps (created_at dan updated_at)
    protected $useTimestamps = false;
}

