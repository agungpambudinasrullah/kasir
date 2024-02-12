<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk; 

class Produk extends BaseController
{
    protected $Produkmodel;

    function __construct()
    {
        $this->Produkmodel = new ModelProduk();
    
    }
    public function index()
    {
        return view('layout/v_produk');
    }

    public function ambilSemua()
    {
        $data = $this->Produkmodel->findAll();

        return json_encode($data);
    }

    public function simpan(){
        $this->Produkmodel->insert([
            'NamaProduk'=> $this->request->getVar('namaProduk'),
            'Harga'=> $this->request->getVar('harga'),
            'Stok'=> $this->request->getVar('stok'),
        ]);

        return 'sukses';
    }

    public function edit() 
    {
        $id_produk = $this->request->getVar('ProdukID');
        $data = $this->Produkmodel->find($id_produk);
       
        return json_encode($data);
    }

    public function update()
    {
        $id_produk = $this->request->getVar('ProdukID');

        $this->Produkmodel->update($id_produk,[
            'NamaProduk' => $this->request->getVar('NamaProduk'),
            'Harga' => $this->request->getVar('Harga'),
            'Stok' => $this->request->getVar('Stok'),
        ]);
    }

    public function delete()
    {
        $id_produk = $this->request->getVar('ProdukID');
        $this->Produkmodel->delete($id_produk);

    }

}
