<?php
class M_mhs extends CI_Model
{
    // Mendapatkan semua data mahasiswa
    public function get_data()
    {
        return $this->db->get('tb_mhs')->result_array();
    }

    // Menambahkan data mahasiswa
    public function add_data($data)
    {
        return $this->db->insert('tb_mhs', $data);
    }

    public function insert($data) {
        return $this->db->insert('tb_mhs', $data); // Pastikan tabel 'mahasiswa' benar
    }
    

    public function tampil_dosen()
    {
        return $this->db->get('tb_dosen'); // Pastikan nama tabel benar
    }
    
    public function count_dosen() {
        return $this->db->count_all('tb_dosen'); // Replace 'dosen' with your actual table name
    }

    // Method to get data for pagination (dosen)
    public function get_data_dosen_pagination($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('tb_dosen'); // Replace 'dosen' with your actual table name
        return $query->result();
    }

    
    public function cek_login($username, $password) {
        // Cari user berdasarkan username dan password
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); // Gunakan MD5 untuk hash password
        $query = $this->db->get('tb_users'); // Ambil data dari tabel tb_users

        if ($query->num_rows() > 0) {
            return $query->row_array(); // Jika data ditemukan, kembalikan sebagai array
        } else {
            return false; // Jika tidak ditemukan, kembalikan false
        }
    }

    // Memperbarui data mahasiswa berdasarkan ID
    public function update_data($id, $data)
    {
        $this->db->where('id_mhs', $id);
        return $this->db->update('tb_mhs', $data);
    }

    // Menghapus data mahasiswa berdasarkan ID
    public function hapus_data($id)
    {
        $this->db->where('id_mhs', $id);
        return $this->db->delete('tb_mhs');
    }

    // Mengambil data mahasiswa berdasarkan ID untuk diedit
    public function edit_data($id)
    {
        return $this->db->get_where('tb_mhs', ['id_mhs' => $id])->row_array();
    }

    // Mengambil detail data mahasiswa berdasarkan ID
    public function detail_data($id = NULL)
    {
        return $this->db->get_where('tb_mhs', array('id_mhs' => $id))->row();
    }

    // Mencari mahasiswa berdasarkan kata kunci
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_mhs');

        // Mengelompokkan kondisi pencarian
        $this->db->group_start();
        $this->db->like('nama_mhs', $keyword);
        $this->db->or_like('nim', $keyword);
        $this->db->or_like('tgl_lahir', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('no_telp', $keyword);
        $this->db->group_end();

        // Eksekusi kueri dan kembalikan hasilnya
        return $this->db->get()->result_array();
    }

    // Mendapatkan semua mahasiswa
    public function get_all_mahasiswa()
    {
        return $this->db->get('tb_mhs')->result();
    }

   // In M_jadwal model
    public function get_all_jadwal() {
    $query = $this->db->get('tb_jadwal'); // assuming tb_jadwal is the correct table
    return $query->result(); // Fetch all records from the jadwal table
}


    // Mendapatkan data dengan pagination
    public function get_data_pagination($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('tb_mhs');
        return $query->result_array();
    }

    // Menampilkan data dari tabel yang ditentukan
    public function tampil_data($table)
    {
        return $this->db->get($table)->result();
    }

    // Menghitung total mahasiswa
    public function count_all()
    {
        return $this->db->count_all('tb_mhs');
    }

    // Mendapatkan jumlah mahasiswa per jurusan
    public function jumlah_mahasiswa_perjurusan()
    {
        $this->db->group_by('jurusan');
        $this->db->select('jurusan');
        $this->db->select('COUNT(*) as total');
        return $this->db->from('tb_mhs')->get()->result();
    }
   
    // Mendapatkan data dengan limit dan offset
    public function get_data_paged($limit, $start)
    {
        return $this->db->get('tb_mhs', $limit, $start)->result_array();
    }

    public function get_total() {
        return $this->db->count_all('tb_mhs'); // Ganti 'mahasiswa' dengan nama tabel Anda
    }
}
?>
