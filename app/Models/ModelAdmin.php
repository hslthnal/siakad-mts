<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model{
    public function jumlahGedung(){
        return $this->db->table('tbl_gedung')
        ->countAll();
    }

    public function jumlahRuangan(){
        return $this->db->table('tbl_ruangan')
        ->countAll();
    }

    public function jumlahGuru(){
        return $this->db->table('tbl_guru')
        ->countAll();
    }

    public function jumlahSiswa(){
        return $this->db->table('tbl_siswa')
        ->countAll();
    }

}