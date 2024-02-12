<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelanggan extends Model
{
    protected $table            = 'tb_pelanggan';
    protected $primaryKey       = 'id_pelanggan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pelanggan', 'nama_pelanggan', 'alamat', 'nomor_telepon'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


}
