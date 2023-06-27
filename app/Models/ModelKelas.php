<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model{
    public function allData(){
        return $this->db->table('tbl_kelas')
        ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_kelas.id_ruangan', 'left')
        ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
        ->get()->getResultArray();
    }

    public function detail_Data($id_kelas){
        return $this->db->table('tbl_kelas')
        ->join('tbl_ruangan', 'tbl_ruangan.id_ruangan = tbl_kelas.id_ruangan', 'left')
        ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
        ->where('id_kelas', $id_kelas)
        ->get()->getRowArray();
    }

    public function add($data){
        $this->db->table('tbl_kelas')->insert($data);
    }

    public function edit($data){
        $this->db->table('tbl_kelas')
        ->where('id_kelas', $data['id_kelas'])
        ->update($data);
    }

    public function delete_data($data){
        $this->db->table('tbl_kelas')
        ->where('id_kelas', $data['id_kelas'])
        ->delete($data);
    }
}