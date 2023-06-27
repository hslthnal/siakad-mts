<?php

namespace App\Controllers;

use App\Models\ModelStatus;

class Status extends BaseController
{
    public function __construct(){
        helper('form');
        $this->ModelStatus = new ModelStatus();
    }


    public function index()
    {
        $data=[
            'title' => 'Status Pegawai',
            'status'    => $this->ModelStatus->allData(),
            'isi'   => 'admin/v_status'
        ];
        return view('layout/wrapper', $data);
    }

    public function add(){
        $data = [
            'status'  => $this->request->getPost('status'),
            'keterangan'  => $this->request->getPost('keterangan'),
        ];
        $this->ModelStatus->add($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('status'));
    }

    public function edit($id_status){
        $data = [
            'id_status' => $id_status,
            'status'  => $this->request->getPost('status'),
            'keterangan'  => $this->request->getPost('keterangan'),
        ];
        $this->ModelStatus->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('status'));
    }

    public function delete($id_status){
        $data = [
            'id_status' => $id_status,
        ];
        $this->ModelStatus->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('status'));
    }
}
