<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKrs extends Model{
    public function dataSiswa(){
        return $this->db->table('tbl_siswa')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
        ->join('tbl_romkel', 'tbl_romkel.id_romkel = tbl_siswa.id_romkel', 'left')
        ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
        ->where('nisn', session()->get('username'))
        ->get()->getRowArray();
    }

    public function jadwalPelajaran(){
        return $this->db->table('tbl_jadwal')
        ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
        ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
        // ->where('tbl_jadwal.id_kelas', '5')
        ->orderBy('tbl_jadwal.id_kelas', 'ASC')
        ->get()->getResultArray();
    }
}