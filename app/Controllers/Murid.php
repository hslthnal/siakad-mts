<?php

namespace App\Controllers;

use App\Models\ModelKrs;
use App\Models\ModelTa;


class Murid extends BaseController
{
    public function __construct(){
        $this->ModelKrs = new ModelKrs();
        $this->ModelTa = new ModelTa();
    }

    public function index()
    {
        $data=[
            'title' => 'Siswa',
            'sw'  => $this->ModelKrs->dataSiswa(),
            'ta'    => $this->ModelTa->taAktif(),
            'isi'   => 'v_dashboard_siswa'
        ];
        return view('layout/wrapper', $data);
    }
}

