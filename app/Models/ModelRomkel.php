<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRomkel extends Model{
    public function allData(){
        return $this->db->table('tbl_romkel')
        ->join('tbl_guru', 'tbl_guru.id_guru = tbl_romkel.id_guru', 'left')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_romkel.id_kelas', 'left')
        ->orderBy('tbl_romkel.id_romkel', 'ASC')
        ->get()->getResultArray();
    }

    public function add($data){
        $this->db->table('tbl_romkel')->insert($data);
    }

    public function delete_data($data){
        $this->db->table('tbl_romkel')
        ->where('id_romkel', $data['id_romkel'])
        ->delete($data);
    }

    public function detail_data($id_romkel){
        return $this->db->table('tbl_romkel')
        ->join('tbl_guru', 'tbl_guru.id_guru = tbl_romkel.id_guru', 'left')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_romkel.id_kelas', 'left')
        ->where('id_romkel', $id_romkel)
        ->get()->getRowArray();
    }

    // Menampilkan data siswa berdasarkan kelas
    public function siswa($id_romkel){
        return $this->db->table('tbl_siswa')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
        ->where('id_romkel', $id_romkel)
        ->orderBy('id_siswa', 'DESC')
        ->get()->getResultArray();
    }

    // Menampilkan siswa yang belum memiliki kelas
    public function siswa_tidak_ada_kelas(){
        return $this->db->table('tbl_siswa')
        ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
        ->where('id_romkel', null)
        // ->where('id_romkel=0')
        ->orderBy('id_siswa', 'DESC')
        ->get()->getResultArray();
    }

    public function jml_siswa($id_romkel){
        return $this->db->table('tbl_siswa')
            ->where('id_romkel', $id_romkel)
            ->countAllResults();
    }

    public function update_siswa($data){
        $this->db->table('tbl_siswa')
        ->where('id_siswa', $data['id_siswa'])
        ->update($data);
    }

    

    // public function edit($data){
    //     $this->db->table('tbl_mapel')
    //     ->where('id_mapel', $data['id_mapel'])
    //     ->update($data);
    // }

   
}