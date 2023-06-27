<?php

namespace App\Controllers;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct(){
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        $data=[
            'title' => 'Login',
            'isi'   => 'login'
        ];
        return view('layout/wrapper', $data);
    }

    public function cek_login(){
        if ($this->validate([
            'username'  => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ],
            ],
            'level'  => [
                'label' => 'Level',
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
        ])) {
            // Jika Valid
            $level = $this->request->getPost('level');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($level == 1) {
                $cek_user = $this->ModelAuth->login_user($username, $password);
                if ($cek_user) {
                    // Jika data cocok
                    session()->set('username', $cek_user['username']);
                    session()->set('nama', $cek_user['nama_user']);
                    session()->set('foto', $cek_user['foto']);
                    session()->set('level', $level);
                    // Login
                    return redirect()->to(base_url('admin'));
                }else{
                    // Jika data tidak cocok
                    session()->setFlashdata('pesan', 'Username atau Password Salah');
                    return redirect()->to(base_url('auth/index'));
                }
            }elseif ($level == 2){
                $cek_guru = $this->ModelAuth->login_guru($username, $password);
                if ($cek_guru) {
                    // Jika data cocok
                    session()->set('username', $cek_guru['nip']);
                    session()->set('nama', $cek_guru['nama_guru']);
                    session()->set('foto', $cek_guru['foto_guru']);
                    session()->set('level', $level);
                    // Login
                    return redirect()->to(base_url('pengajar'));
                }else{
                    // Jika data tidak cocok
                    session()->setFlashdata('pesan', 'Username atau Password Salah');
                    return redirect()->to(base_url('auth/index'));
                }
            }elseif ($level == 3){
                $cek_siswa = $this->ModelAuth->login_siswa($username, $password);
                if ($cek_siswa) {
                    // Jika data cocok
                    session()->set('username', $cek_siswa['nisn']);
                    session()->set('nama', $cek_siswa['nama_siswa']);
                    session()->set('foto', $cek_siswa['foto_siswa']);
                    session()->set('level', $level);
                    // Login
                    return redirect()->to(base_url('murid'));
                }else{
                    // Jika data tidak cocok
                    session()->setFlashdata('pesan', 'Username atau Password Salah');
                    return redirect()->to(base_url('auth/index'));
                }
            }
        }else{
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        }
    }

    public function logout(){
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('sukses', 'Berhasil Keluar');
        return redirect()->to(base_url('auth/index'));
    }
}
