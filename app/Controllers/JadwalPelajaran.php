<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelMapel;
use App\Models\ModelKelas;
use App\Models\ModelGuru;
use App\Models\ModelJadwalPelajaran;

class JadwalPelajaran extends BaseController
{
    public function __construct(){
        helper('form');
        $this->ModelTa = new ModelTa();
        $this->ModelMapel = new ModelMapel();
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelJadwalPelajaran = new ModelJadwalPelajaran();
    }

    public function index()
    {
        $data=[
            'title' => 'Jadwal Pelajaran',
            'ta_aktif' => $this->ModelTa->taAktif(),
            'japel' => $this->ModelJadwalPelajaran->allData(),
            'mapel'  => $this->ModelMapel->allData(),
            'kelas'  => $this->ModelKelas->allData(),
            'guru'  => $this->ModelGuru->allData(),
            'isi'   => 'admin/jadwalpelajaran/index'
        ];
        return view('layout/wrapper', $data);
    }

    public function add(){
        if ($this->validate([
            'id_mapel'  => [
                'label' => 'Mata Pelajaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'id_kelas'  => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'id_guru'  => [
                'label' => 'Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'hari'  => [
                'label' => 'Hari',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'waktu'  => [
                'label' => 'Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],

        ])){
            // Jika valid
            $data = [
                'id_mapel'  => $this->request->getPost('id_mapel'),
                'id_kelas'  => $this->request->getPost('id_kelas'),
                'id_guru'  => $this->request->getPost('id_guru'),
                'hari'  => $this->request->getPost('hari'),
                'waktu'  => $this->request->getPost('waktu'),
            ];

            $this->ModelJadwalPelajaran->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('jadwalpelajaran'));
        }else{
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('jadwalpelajaran'));
        }
    }

    public function delete($id_jadwal){
        $data = [
            'id_jadwal' => $id_jadwal,
        ];
        $this->ModelJadwalPelajaran->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('jadwalpelajaran'));
    }
}
