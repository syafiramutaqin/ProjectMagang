<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    // Menyesuaikan dengan kolom baru
    protected $allowedFields = [
        'kode_obat', 
        'nama_golongan', 
        'nama_obat', 
        'barang_masuk', 
        'barang_keluar', 
        'stock_akhir', 
        'target', 
        'pic_by', 
        'notes'
    ];

    // Aktifkan timestamps jika diperlukan
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}