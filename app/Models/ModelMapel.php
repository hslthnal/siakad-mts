<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMapel extends Model{
    public function allData(){
        return $this->db->table('tbl_mapel')
        ->join('tbl_guru', 'tbl_guru.id_guru = tbl_mapel.id_guru', 'left')
        ->orderBy('tbl_mapel.id_mapel', 'ASC')
        ->get()->getResultArray();
    }

    public function detail_Data($id_mapel){
        return $this->db->table('tbl_mapel')
        ->join('tbl_guru', 'tbl_guru.id_guru = tbl_mapel.id_guru', 'left')
        ->where('id_mapel', $id_mapel)
        ->get()->getRowArray();
    }

    public function add($data){
        $this->db->table('tbl_mapel')->insert($data);
    }

    public function edit($data){
        $this->db->table('tbl_mapel')
        ->where('id_mapel', $data['id_mapel'])
        ->update($data);
    }

    public function delete_data($data){
        $this->db->table('tbl_mapel')
        ->where('id_mapel', $data['id_mapel'])
        ->delete($data);
    }
}