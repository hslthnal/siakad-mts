<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Admin extends BaseController
{
    public function __construct(){
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data=[
            'title' => 'Dashboard Admin',
            'jml_gedung' => $this->ModelAdmin->jumlahGedung(),
            'jml_ruangan' => $this->ModelAdmin->jumlahRuangan(),
            'jml_guru' => $this->ModelAdmin->jumlahGuru(),
            'jml_siswa' => $this->ModelAdmin->jumlahSiswa(),
            'isi'   => 'v_admin'
        ];
        return view('layout/wrapper', $data);
    }
}

