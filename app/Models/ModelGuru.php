<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGuru extends Model{
    public function allData(){
        return $this->db->table('tbl_guru')
        ->join('tbl_status', 'tbl_status.id_status = tbl_guru.id_status', 'left')
        ->orderBy('id_guru', 'DESC')
        ->get()->getResultArray();
    }

    public function detail_Data($id_guru){
        return $this->db->table('tbl_guru')
        ->join('tbl_status', 'tbl_status.id_status = tbl_guru.id_status', 'left')
        ->where('id_guru', $id_guru)
        ->get()->getRowArray();
    }

    public function add($data){
        $this->db->table('tbl_guru')->insert($data);
    }

    public function edit($data){
        $this->db->table('tbl_guru')
        ->where('id_guru', $data['id_guru'])
        ->update($data);
    }

    public function delete_data($data){
        $this->db->table('tbl_guru')
        ->where('id_guru', $data['id_guru'])
        ->delete($data);
    }
}