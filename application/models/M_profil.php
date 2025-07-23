<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

    public function get_profil($id) {
        // Ambil data profil berdasarkan ID
        $this->db->where('id', $id);
        $query = $this->db->get('tb_profil');
        return $query->row_array();
    }

    public function update_profil($user_id, $data) {
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }

    public function update_foto($id, $foto) {
        // Update kolom foto
        $this->db->where('id', $id);
        return $this->db->update('tb_profil', ['foto' => $foto]);
    }
    
}
?>
