<?php

namespace App\Controllers;

use App\Models\ModelRomkel;
use App\Models\ModelGuru;
use App\Models\ModelKelas;

class Romkel extends BaseController
{

    public function __construct(){
        helper('form');
        $this->ModelRomkel = new ModelRomkel();
        $this->ModelGuru = new ModelGuru();
        $this->ModelKelas = new ModelKelas();
    }

    public function index()
    {
        $data=[
            'title' => 'Rombongan Kelas',
            'romkel' => $this->ModelRomkel->allData(),    
            'guru' => $this->ModelGuru->allData(),    
            'kelas' => $this->ModelKelas->allData(),    
            'isi'   => 'admin/romkel/v_romkel'
        ];
        return view('layout/wrapper', $data);
    }

    public function add(){
        if ($this->validate([
            'id_kelas'  => [
                'label' => 'Nama Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'id_guru'  => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'tahun_angkatan'  => [
                'label' => 'Tahun Angkatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
        ])){
            //
            $data = [
                'id_kelas'  => $this->request->getPost('id_kelas'),
                'id_guru'  => $this->request->getPost('id_guru'),
                'tahun_angkatan'  => $this->request->getPost('tahun_angkatan'),
            ];

            $this->ModelRomkel->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('romkel'));
        }else{
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('romkel'));
        }
    }

    public function delete($id_romkel){
        $data = [
            'id_romkel' => $id_romkel,
        ];
        $this->ModelRomkel->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('romkel'));
    }

    public function rincian_kelas($id_romkel){
        $data=[
            'title' => 'Rombongan Kelas',
            'romkel' => $this->ModelRomkel->detail_data($id_romkel),
            'siswa' => $this->ModelRomkel->siswa($id_romkel),
            'jml' => $this->ModelRomkel->jml_siswa($id_romkel),
            'siswa_tpk' => $this->ModelRomkel->siswa_tidak_ada_kelas(),
            'isi'   => 'admin/romkel/v_rincian_kelas',
        ];
        return view('layout/wrapper', $data);
    }

    public function add_anggota_kelas($id_siswa, $id_romkel){
        $data = [
            'id_siswa' => $id_siswa,
            'id_romkel' => $id_romkel,
        ];
        $this->ModelRomkel->update_siswa($data);
        session()->setFlashdata('pesan', 'Siswa Berhasil Ditambahkan Ke Kelas');
        return redirect()->to(base_url('romkel/rincian_kelas/'. $id_romkel));
    }

    public function remove_anggota_kelas($id_siswa, $id_romkel){
        $data = [
            'id_siswa' => $id_siswa,
            'id_romkel' => null,
        ];
        $this->ModelRomkel->update_siswa($data);
        session()->setFlashdata('pesan', 'Siswa Berhasil Dihapus Dari Kelas');
        return redirect()->to(base_url('romkel/rincian_kelas/'. $id_romkel));
    }
}
