<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelRuangan;
use App\Models\ModelGuru;


class Kelas extends BaseController{
    public function __construct(){
        helper('form');
        $this->ModelKelas = new ModelKelas();
        $this->ModelRuangan = new ModelRuangan();
        $this->ModelGuru = new ModelGuru();
    }


    public function index()
    {
        $data=[
            'title'     => 'Kelas',
            'kelas'  => $this->ModelKelas->allData(),
            'isi'       => 'admin/kelas/index'
        ];
        return view('layout/wrapper', $data);
    }

    public function add(){
        $data=[
            'title'     => 'Tambah Kelas',
            'kelas'  => $this->ModelKelas->allData(),
            'ruangan' => $this->ModelRuangan->allData(),
            'guru' => $this->ModelGuru->allData(),
            'isi'       => 'admin/kelas/add'
        ];
        return view('layout/wrapper', $data);
    }

    public function insert(){
        if ($this->validate([
            'id_ruangan'  => [
                'label' => 'Ruangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'kelas'  => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'id_guru'  => [
                'label' => 'Wali Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
        ])){
            // Jika valid
            $data = [
                'id_ruangan'  => $this->request->getPost('id_ruangan'),
                'kelas'  => $this->request->getPost('kelas'),
                'id_guru'  => $this->request->getPost('id_guru'),
            ];
            $this->ModelKelas->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('kelas'));
        }else {
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelas/add'));
        }
    }

    public function edit($id_kelas){
        $data=[
            'title'     => 'Ubah Kelas',
            'kelas'  => $this->ModelKelas->allData(),
            'kelas' => $this->ModelKelas->detail_Data($id_kelas), 
            'ruangan' => $this->ModelRuangan->allData(),
            'guru' => $this->ModelGuru->allData(),
            'isi'       => 'admin/kelas/edit'
        ];
        return view('layout/wrapper', $data);
    }

    public function update($id_kelas){
        if ($this->validate([
            'id_ruangan'  => [
                'label' => 'Ruangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'kelas'  => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'id_guru'  => [
                'label' => 'Wali Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
        ])){
            // Jika valid
            $data = [
                'id_kelas'  => $id_kelas,
                'id_ruangan'  => $this->request->getPost('id_ruangan'),
                'kelas'  => $this->request->getPost('kelas'),
                'id_guru'  => $this->request->getPost('id_guru'),
            ];
            $this->ModelKelas->edit($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('kelas'));
        }else {
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelas/add'));
        }
    }

    public function delete($id_kelas){
        $data = [
            'id_kelas'  => $id_kelas,
        ];
        $this->ModelKelas->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('kelas'));
    }
}
