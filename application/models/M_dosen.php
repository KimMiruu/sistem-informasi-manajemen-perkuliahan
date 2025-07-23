<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dosen extends CI_Model {
    
    public function get_data_pagination($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('tb_dosen');  // Ganti 'tb_dosen' dengan nama tabel dosen Anda
        return $query->result_array();
    }
    public function get_total_dosen() {
        return $this->db->count_all('tb_dosen');
    }
    public function count_all() {
        return $this->db->count_all('tb_dosen');  // Ganti 'tb_dosen' dengan nama tabel dosen Anda
    }

    public function get_all_dosen()
    {
        return $this->db->get('tb_dosen')->result();
    }
    public function tampil_dosen()
    {
        return $this->db->get('tb_dosen'); // Pastikan nama tabel benar
    }

    public function get_data() {
        // Ambil data dari tabel jadwal kuliah
        $query = $this->db->get('tb_dosen'); // 
        return $query->result_array();
    }

    public function get_total() {
        return $this->db->count_all('tb_dosen'); // Ganti 'dosen' dengan nama tabel Anda
    }
}    