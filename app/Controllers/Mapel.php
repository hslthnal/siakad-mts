<?php

namespace App\Controllers;

use App\Models\ModelMapel;
use App\Models\ModelGuru;

class Mapel extends BaseController
{
    public function __construct(){
       helper('form');
       $this->ModelMapel = new ModelMapel(); 
       $this->ModelGuru = new ModelGuru(); 
    }

    public function index()
    {
        $data=[
            'title' => 'Mata Pelajaran',
            'mapel' => $this->ModelMapel->allData(),
            'isi'   => 'admin/mapel/index'
        ];
        return view('layout/wrapper', $data);
    }

    public function add()
    {
        $data=[
            'title' => 'Tambah Mata Pelajaran',
            'guru'    => $this->ModelGuru->allData(),
            'isi'   => 'admin/mapel/add'
        ];
        return view('layout/wrapper', $data);
    }

    public function insert(){
        if ($this->validate([
            'kode_mapel'  => [
                'label' => 'Kode Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'mapel'  => [
                'label' => 'Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'id_guru'  => [
                'label' => 'Guru Pengajar',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],

        ])){
            
            // Jika valid
            $data = [
                'kode_mapel'  => $this->request->getPost('kode_mapel'),
                'mapel'  => $this->request->getPost('mapel'),
                'id_guru'  => $this->request->getPost('id_guru'),
            ];

            // memindahkan file foto dari form input ke folder foto di directory
            // $foto->move('fotoguru', $nama_file);

            $this->ModelMapel->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('mapel'));
        }else {
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mapel/add'));
        }
    }

    public function edit($id_mapel)
    {
        $data=[
            'title' => 'Ubah Mata Pelajaran',
            'mapel'    => $this->ModelMapel->detail_Data($id_mapel),
            'guru'    => $this->ModelGuru->allData(),
            'isi'   => 'admin/mapel/edit'
        ];
        return view('layout/wrapper', $data);
    }

    public function update($id_mapel){
        if ($this->validate([
            'kode_mapel'  => [
                'label' => 'Kode Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'mapel'  => [
                'label' => 'Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'id_guru'  => [
                'label' => 'Guru Pengajar',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
        ])){
            // Jika valid
            $data = [
                'id_mapel'    => $id_mapel,
                'kode_mapel'  => $this->request->getPost('kode_mapel'),
                'mapel'  => $this->request->getPost('mapel'),
                'id_guru'  => $this->request->getPost('id_guru'),
            ];
            $this->ModelMapel->edit($data);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('mapel'));
        }else {
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mapel/edit/'. $id_mapel));
        }
    }

    public function delete($id_mapel){
        $data = [
            'id_mapel' => $id_mapel,
        ];
        $this->ModelMapel->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('mapel'));
    }
}
