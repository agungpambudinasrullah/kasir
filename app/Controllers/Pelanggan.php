<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPelanggan; 

class Pelanggan extends BaseController
{
    protected $pelanggan;

    function __construct()
    {
       $this->pelanggan = new ModelPelanggan();
    
    }
    public function index()
    {
        return view('pelanggan');
    }

    public function ambilSemua()
    {
        $data = $this->pelanggan->findAll();

        return json_encode($data);
    }

     public function simpan(){
         $this->pelanggan->insert([
             'nama_pelanggan'=> $this->request->getVar('namaPelanggan'),
             'alamat'=> $this->request->getVar('alamat'),
             'nomor_telepon'=> $this->request->getVar('nomorTelepon'),
         ]);

         return 'sukses';
     }

    public function edit() 
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');
        $data = $this->pelanggan->find($id_pelanggan);
       
        return json_encode($data);
    }

    public function update()
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');

        $this->pelanggan->update($id_pelanggan,[
            'nama_pelanggan' => $this->request->getVar('namaPelanggan'),
            'alamat' => $this->request->getVar('alamat'),
            'nomor_telepon' => $this->request->getVar('nomorTelepon'),
        ]);
    }

    public function delete()
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');
        $this->pelanggan->delete($id_pelanggan);

    }

}
