<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengajar extends Model{
    public function JadwalPengajar(){
        return $this->db->table('tbl_jadwal')
        ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
        ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
        ->where('tbl_guru.nip', session()->get('username'))
        ->get()->getResultArray();
    }

    public function dataGuru(){
        return $this->db->table('tbl_guru')
        ->join('tbl_status', 'tbl_status.id_status = tbl_guru.id_status', 'left')
        ->where('nip', session()->get('username'))
        ->get()->getRowArray();
    }
}