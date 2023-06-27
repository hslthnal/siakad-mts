<?php

namespace App\Controllers;

use App\Models\ModelSiswa;
use App\Models\ModelKelas;

class Siswa extends BaseController
{
    public function __construct(){
        helper('form');
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelKelas = new ModelKelas();
    }



    public function index()
    {
        $data=[
            'title'     => 'Siswa',
            'siswa'  => $this->ModelSiswa->allData(),
            'isi'       => 'admin/siswa/index'
        ];
        return view('layout/wrapper', $data);
    }

    public function add()
    {
        $data=[
            'title' => 'Tambah Siswa',
            'siswa'    => $this->ModelSiswa->allData(),
            'kelas' => $this->ModelKelas->allData(),
            'isi'   => 'admin/siswa/add'
        ];
        return view('layout/wrapper', $data);
    }

    public function insert(){
        if ($this->validate([
            'nisn'  => [
                'label' => 'NISN',
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
            'nama_siswa'  => [
                'label' => 'Nama Siswa',
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
            'angkatan'  => [
                'label' => 'Angkatan',
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
            'foto_siswa'  => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto_siswa]|max_size[foto_siswa,2048]|mime_in[foto_siswa,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'max_size' => '{field} Maksimal Ukuran 2 MB',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO',
                ],
            ],

        ])){
            // Mengambil file foto dari form input
            $foto = $this->request->getFile('foto_siswa');

            // Merename nama file foto
            $nama_file = $foto->getRandomName();

            // Jika valid
            $data = array(
                'nisn'     => $this->request->getPost('nisn'),
                'password'     => $this->request->getPost('password'),
                'nama_siswa'     => $this->request->getPost('nama_siswa'),
                'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
                'angkatan'     => $this->request->getPost('angkatan'),
                'id_kelas'     => $this->request->getPost('id_kelas'),
                'foto_siswa'      => $nama_file,
            );

            // Memindahkan file foto dari form input ke folder foto directory
            $foto->move('fotosiswa', $nama_file);
            $this->ModelSiswa->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('siswa'));

        }else{
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('siswa/add'));
        }
    }

    public function edit($id_siswa)
    {
        $data=[
            'title' => 'Ubah Siswa',
            'siswa'    => $this->ModelSiswa->allData(),
            'siswa' => $this->ModelSiswa->detail_data($id_siswa),
            'kelas' => $this->ModelKelas->allData(),
            'isi'   => 'admin/siswa/edit'
        ];
        return view('layout/wrapper', $data);
    }

    public function update($id_siswa){
        if ($this->validate([
            'nisn'  => [
                'label' => 'NISN',
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
            'nama_siswa'  => [
                'label' => 'Nama Siswa',
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
            'angkatan'  => [
                'label' => 'Angkatan',
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
            'foto_siswa'  => [
                'label' => 'Foto',
                'rules' => 'max_size[foto_siswa,2048]|mime_in[foto_siswa,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukuran 2 MB',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO',
                ],
            ],

        ])){
            // Mengambil file foto dari form input
            $foto = $this->request->getFile('foto_siswa');

            if ($foto->getError() == 4) {
                $data = array(
                    'id_siswa'  => $id_siswa,
                    'nisn'     => $this->request->getPost('nisn'),
                    'password'     => $this->request->getPost('password'),
                    'nama_siswa'     => $this->request->getPost('nama_siswa'),
                    'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
                    'angkatan'     => $this->request->getPost('angkatan'),
                    'id_kelas'     => $this->request->getPost('id_kelas'),
                );
                $this->ModelSiswa->edit($data);

            }else{
                // Menghapus foto lama
                $siswa = $this->ModelSiswa->detail_data($id_siswa);
                if ($siswa['foto_siswa'] != "") {
                    unlink('fotosiswa/'.$siswa['foto_siswa']);
                }
                // Merename nama file foto
                $nama_file = $foto->getRandomName();

                // Jika valid
                $data = array(
                    'id_siswa'  => $id_siswa,
                    'nisn'     => $this->request->getPost('nisn'),
                    'password'     => $this->request->getPost('password'),
                    'nama_siswa'     => $this->request->getPost('nama_siswa'),
                    'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
                    'angkatan'     => $this->request->getPost('angkatan'),
                    'id_kelas'     => $this->request->getPost('kelas'),
                    'foto_siswa'      => $nama_file,
                );
                // Memindahkan file foto dari form input ke folder foto directory
                $foto->move('fotosiswa', $nama_file);
                $this->ModelSiswa->edit($data);

            }
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('siswa'));

        }else{
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('siswa/edit/'. $id_siswa));
        }
    }

    public function delete($id_siswa){
        // Menghapus foto lama
        $siswa = $this->ModelSiswa->detail_data($id_siswa);
        if ($siswa['foto_siswa'] != "") {
            unlink('fotosiswa/'.$siswa['foto_siswa']);
        }
        $data = [
            'id_siswa' => $id_siswa,
        ];
        $this->ModelSiswa->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('siswa'));
    }
}

