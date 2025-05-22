<?php

// app/Models/UserModel.php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    // Nama tabel yang digunakan di database
    protected $table = 'users';

    // Field yang diizinkan untuk diisi secara massal (mass assignment)
    protected $allowedFields = ['username', 'password'];

    // Menonaktifkan automatic timestamps (created_at dan updated_at)
    protected $useTimestamps = false;
}
