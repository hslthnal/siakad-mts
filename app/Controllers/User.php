<?php

namespace App\Controllers;

use App\Models\ModelUser;

class User extends BaseController{
    public function __construct(){
        helper('form');
        $this->ModelUser = new ModelUser();
    }


    public function index()
    {
        $data=[
            'title'     => 'Pengguna',
            'user'  => $this->ModelUser->allData(),
            'isi'       => 'admin/v_user'
        ];
        return view('layout/wrapper', $data);
    }

    public function add(){
        if ($this->validate([
            'nama_user'  => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'username'  => [
                'label' => 'Username',
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
            'foto'  => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,2048]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'max_size' => '{field} Maksimal Ukuran 2 MB',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO',
                ],
            ],

        ])){
            // Mengambil file foto dari form input
            $foto = $this->request->getFile('foto');

            // Merename nama file foto
            $nama_file = $foto->getRandomName();

            // Jika valid
            $data = array(
                'nama_user'     => $this->request->getPost('nama_user'),
                'username'     => $this->request->getPost('username'),
                'password'     => $this->request->getPost('password'),
                'foto'      => $nama_file,
            );

            // Memindahkan file foto dari form input ke folder foto directory
            $foto->move('foto', $nama_file);
            $this->ModelUser->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('user'));

        }else{
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }


    public function edit($id_user){
        if ($this->validate([
            'nama_user'  => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'username'  => [
                'label' => 'Username',
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
            'foto'  => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,2048]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif,image/ico]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukuran 2 MB',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO',
                ],
            ],

        ])){
            // Mengambil file foto dari form input
            $foto = $this->request->getFile('foto');

            if ($foto->getError() == 4) {
                $data = array(
                    'id_user'       => $id_user,
                    'nama_user'     => $this->request->getPost('nama_user'),
                    'username'     => $this->request->getPost('username'),
                    'password'     => $this->request->getPost('password'),
                );
                $this->ModelUser->edit($data);
            }else {
                // Menghapus foto lama
                $user = $this->ModelUser->detail_data($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/'.$user['foto']);
                }
                // Merename nama file foto
                $nama_file = $foto->getRandomName();
                // Jika valid
                $data = array(
                    'id_user'       => $id_user,
                    'nama_user'     => $this->request->getPost('nama_user'),
                    'username'     => $this->request->getPost('username'),
                    'password'     => $this->request->getPost('password'),
                    'foto'      => $nama_file,
                );
                // Memindahkan file foto dari form input ke folder foto directory
                $foto->move('foto', $nama_file);
                $this->ModelUser->edit($data);
            }

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('user'));

        }else{
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function delete($id_user){
        // Menghapus foto lama
        $user = $this->ModelUser->detail_data($id_user);
        if ($user['foto'] != "") {
            unlink('foto/'.$user['foto']);
        }
        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUser->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('user'));
    }
}
