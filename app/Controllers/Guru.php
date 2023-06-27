<?php

namespace App\Controllers;

use App\Models\ModelGuru;
use App\Models\ModelStatus;

class Guru extends BaseController
{
    public function __construct(){
        helper('form');
        $this->ModelGuru = new ModelGuru();
        $this->ModelStatus = new ModelStatus();
    }


    public function index()
    {
        $data=[
            'title' => 'Guru',
            'guru'    => $this->ModelGuru->allData(),
            'isi'   => 'admin/guru/index'
        ];
        return view('layout/wrapper', $data);
    }

    public function add()
    {
        $data=[
            'title' => 'Tambah Guru',
            'status'    => $this->ModelStatus->allData(),
            'isi'   => 'admin/guru/add'
        ];
        return view('layout/wrapper', $data);
    }

    public function insert(){
        if ($this->validate([
            'nip'  => [
                'label' => 'NIP',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'password'  => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'nama_guru'  => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'jenis_kelamin'  => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'no_telepon'  => [
                'label' => 'Nomor Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'id_status'  => [
                'label' => 'Status Pegawai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'foto_guru'  => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto_guru]|max_size[foto_guru,2048]|mime_in[foto_guru,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'max_size' => '{field} Maksimal Ukuran 2 MB',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO',
                ],
            ],

        ])){
            // Mengambil file foto dari form input
            $foto = $this->request->getFile('foto_guru');

            // Merename nama file foto
            $nama_file = $foto->getRandomName();

            // Jika valid
            $data = array(
                'nip'     => $this->request->getPost('nip'),
                'password'     => $this->request->getPost('password'),
                'nama_guru'     => $this->request->getPost('nama_guru'),
                'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
                'no_telepon'     => $this->request->getPost('no_telepon'),
                'id_status'     => $this->request->getPost('id_status'),
                'foto_guru'      => $nama_file,
            );

            // Memindahkan file foto dari form input ke folder foto directory
            $foto->move('fotoguru', $nama_file);
            $this->ModelGuru->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('guru'));

        }else{
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('guru/add'));
        }
    }


    public function edit($id_guru)
    {
        $data=[
            'title' => 'Ubah Guru',
            'guru' => $this->ModelGuru->allData(),
            'guru'    => $this->ModelGuru->detail_Data($id_guru),
            'status'    => $this->ModelStatus->allData(),
            'isi'   => 'admin/guru/edit'
        ];
        return view('layout/wrapper', $data);
    }


    public function update($id_guru){
        if ($this->validate([
            'nip'  => [
                'label' => 'NIP',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'password'  => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'nama_guru'  => [
                'label' => 'Nama Guru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'jenis_kelamin'  => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'no_telepon'  => [
                'label' => 'Nomor Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'id_status'  => [
                'label' => 'Status Pegawai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'foto_guru'  => [
                'label' => 'Foto',
                'rules' => 'max_size[foto_guru,2048]|mime_in[foto_guru,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukuran 2 MB',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO',
                ],
            ],
        ])){
            // Mengambil file foto dari form input
            $foto = $this->request->getFile('foto_guru');

            if ($foto->getError() == 4) {
                $data = array(
                    'id_guru'   => $id_guru,
                    'nip'     => $this->request->getPost('nip'),
                    'password'     => $this->request->getPost('password'),
                    'nama_guru'     => $this->request->getPost('nama_guru'),
                    'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
                    'no_telepon'     => $this->request->getPost('no_telepon'),
                    'id_status'     => $this->request->getPost('id_status'),
                );
                $this->ModelGuru->edit($data);

            }else{
                // Menghapus foto lama
                $guru = $this->ModelGuru->detail_Data($id_guru);
                if ($guru['foto_guru'] != "") {
                    unlink('fotoguru/'.$guru['foto_guru']);
                }
                // Merename nama file foto
                $nama_file = $foto->getRandomName();

                // Jika valid
                $data = array(
                    'id_guru'   => $id_guru,
                    'nip'     => $this->request->getPost('nip'),
                    'password'     => $this->request->getPost('password'),
                    'nama_guru'     => $this->request->getPost('nama_guru'),
                    'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
                    'no_telepon'     => $this->request->getPost('no_telepon'),
                    'id_status'     => $this->request->getPost('id_status'),
                    'foto_guru'      => $nama_file,
                );
                // Memindahkan file foto dari form input ke folder foto directory
                $foto->move('fotoguru', $nama_file);
                $this->ModelGuru->edit($data);

            }
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('guru'));

        }else{
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('guru/edit/'. $id_guru));
        }
    }

    public function delete($id_guru){
        // Menghapus foto lama
        $guru = $this->ModelGuru->detail_data($id_guru);
        if ($guru['foto_guru'] != "") {
            unlink('fotoguru/'.$guru['foto_guru']);
        }
        $data = [
            'id_guru' => $id_guru,
        ];
        $this->ModelGuru->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('guru'));
    }
}
