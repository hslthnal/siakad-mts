<?php

namespace App\Controllers;
use App\Models\ModelPengajar;
use App\Models\ModelTa;
use App\Models\ModelStatus;


class Pengajar extends BaseController
{
    public function __construct(){
        $this->ModelPengajar = new ModelPengajar();
        $this->ModelTa = new ModelTa();
        $this->ModelStatus = new ModelStatus();
    }

    public function index()
    {
        $data=[
            'title' => 'Guru',
            'guru' => $this->ModelPengajar->dataGuru(),
            'ta'    => $this->ModelTa->taAktif(),
            'isi'   => 'v_dashboard_guru'
        ];
        return view('layout/wrapper', $data);
    }

    public function jadwal()
    {
        $data=[
            'title' => 'Jadwal Mengajar',
            'jadwal' => $this->ModelPengajar->JadwalPengajar(),
            'isi'   => 'pengajar/v_jadwal'
        ];
        return view('layout/wrapper', $data);
    }
}

