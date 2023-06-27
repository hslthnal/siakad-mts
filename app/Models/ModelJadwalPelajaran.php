<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwalPelajaran extends Model{
    public function allData(){
        return $this->db->table('tbl_jadwal')
        ->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left')
        ->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left')
        ->get()->getResultArray();
    }

    public function add($data){
        $this->db->table('tbl_jadwal')->insert($data);
    }

    public function delete_data($data){
        $this->db->table('tbl_jadwal')
        ->where('id_jadwal', $data['id_jadwal'])
        ->delete($data);
    }
}