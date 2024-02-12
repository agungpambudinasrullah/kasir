<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'ProdukID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["ProdukID", "NamaProduk", "Harga", "Stok"];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

  
}
