<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Memuat database
        $this->load->database();
    }

    // Method untuk mengambil semua jadwal, dengan filter pencarian
    public function getJadwal($search = NULL, $limit = 10, $offset = 0)
{
    if ($search) {
        $this->db->like('kode_makul', $search);        // Pencarian di kolom 'kode_makul'
        $this->db->or_like('mata_kuliah', $search);    // Pencarian di kolom 'mata_kuliah'
        $this->db->or_like('dosen', $search);          // Pencarian di kolom 'dosen'
        $this->db->or_like('kelas', $search);          // Pencarian di kolom 'kelas'
        $this->db->or_like('ruang', $search);          // Pencarian di kolom 'ruang'
        $this->db->or_like('semester', $search);       // Pencarian di kolom 'semester'
        $this->db->or_like('prodi', $search);          // Pencarian di kolom 'prodi'
    }

    // Menambahkan limit dan offset untuk pagination
    $this->db->limit($limit, $offset);

    // Mengambil data jadwal dari tabel tb_jadwal
    $query = $this->db->get('tb_jadwal');
    return $query->result(); // Mengembalikan hasil dalam bentuk array objek
}

    public function get_total_jadwal()
    {
        // Query untuk menghitung total jadwal kuliah
        $query = $this->db->query("SELECT COUNT(*) AS total_jadwal FROM jadwal");
        $result = $query->row(); // Ambil hasil pertama
        return $result->total_jadwal; // Kembalikan total jadwal
    }
    

    public function get_data() {
        // Ambil data dari tabel jadwal kuliah
        $query = $this->db->get('tb_jadwal'); // Ganti 'jadwal_kuliah' dengan nama tabel Anda
        return $query->result_array();
    }

    // Method untuk mengambil detail jadwal berdasarkan ID
    public function getDetailJadwal($id_jadwal)
    {
        $query = $this->db->get_where('tb_jadwal', ['id' => $id_jadwal]);
        return $query->row(); // Mengembalikan satu baris data
    }

    public function get_total() {
        return $this->db->count_all('tb_jadwal'); // Ganti 'tb_jadwal' dengan nama tabel Anda
    }
    public function tambahJadwal($data)
{
    return $this->db->insert('tb_jadwal', $data);
}

public function insert($data) {
    // Insert data into the tb_jadwal table
    return $this->db->insert('tb_jadwal', $data);
}

public function getById($id) {
    // Assuming 'tb_jadwal' is the table you are querying
    $this->db->where('id', $id);  // Replace 'id' with the correct column name if necessary
    $query = $this->db->get('tb_jadwal'); // Replace 'tb_jadwal' with your actual table name
    return $query->row();  // Return a single row, or use result() for multiple rows
}

public function update_jadwal($id, $data) {
    // Update the record in the database
    $this->db->where('id', $id);
    return $this->db->update('tb_jadwal', $data);  // Update table 'tb_jadwal'
}

public function delete_jadwal($id) {
    $this->db->delete('tb_jadwal', ['id' => $id]);
}

// Metode untuk menghitung jumlah total data
public function countJadwal($search = NULL)
{
    if ($search) {
        $this->db->like('kode_makul', $search);
        $this->db->or_like('mata_kuliah', $search);
        $this->db->or_like('dosen', $search);
        $this->db->or_like('kelas', $search);
        $this->db->or_like('ruang', $search);
        $this->db->or_like('semester', $search);
        $this->db->or_like('prodi', $search);
    }

    // Menghitung jumlah total data yang sesuai dengan pencarian
    return $this->db->count_all_results('tb_jadwal');
}
public function get_data_pagination($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('tb_jadwal');
        return $query->result_array();
    }

}
