<?php

namespace App\Controllers;

use App\Models\ModelTa;
use App\Models\ModelKrs;



class Krs extends BaseController
{
    public function __construct(){
        $this->ModelTa = new ModelTa();
        $this->ModelKrs = new ModelKrs();
        
    }

    public function index()
    {
        $data=[
            'title' => 'Jadwal Pelajaran',
            'ta_aktif' => $this->ModelTa->taAktif(),
            'japel' => $this->ModelKrs->jadwalPelajaran('5'),
            'murid' => $this->ModelKrs->dataSiswa(),
            'isi'   => 'siswa/krs/v_krs'
        ];
        return view('layout/wrapper', $data);
    }
}

