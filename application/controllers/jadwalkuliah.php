<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwalkuliah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jadwal'); // Memuat model M_jadwal dengan benar
        
    }
    
    public function index($page = 1)
    {
        // Setup pagination
        $per_page = 10; // Jumlah data per halaman
        $offset = ($page - 1) * $per_page;  // Menghitung offset berdasarkan halaman saat ini
        
        // Mendapatkan kata kunci untuk pencarian
        $search = $this->input->post('keyword');
        
        // Mendapatkan data jadwal dengan pagination
        $data['jadwal'] = $this->M_jadwal->getJadwal($search, $per_page, $offset);
        
        // Menghitung jumlah total data untuk pagination
        $data['total_rows'] = $this->M_jadwal->countJadwal($search);
        
        // Konfigurasi pagination
        $this->load->library('pagination');
        $config['base_url'] = site_url('jadwalkuliah/index');  // URL dasar untuk pagination
        $config['total_rows'] = $data['total_rows'];  // Jumlah total data
        $config['per_page'] = $per_page;  // Jumlah data per halaman
        $config['uri_segment'] = 3;  // Segment URL untuk nomor halaman
        $this->pagination->initialize($config);
    
        // Load tampilan
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('jadwal', $data);
        $this->load->view('template/footer');
    }

    public function delete($id) {
        // Ensure the model is loaded
        $this->load->model('M_jadwal');
        
        // Call the delete_jadwal method in the M_jadwal model
        $this->M_jadwal->delete_jadwal($id);
        
        // Redirect after deletion
        redirect('jadwalkuliah');
    }


    public function print() {
        // Ambil data jadwal dari model
        $data['jadwal'] = $this->M_jadwal->get_data();

        // Load view untuk cetak jadwal
        $this->load->view('print_jadwal', $data);
    }

    // Fitur pencarian jadwal
    public function search()
    {
        $keyword = $this->input->post('keyword'); // Ambil keyword dari form pencarian
        $data['jadwal'] = $this->M_jadwal->getJadwal($keyword); // Ambil hasil pencarian dari model

    

        // Muat views
        $this->load->view('template/header'); // Header
        $this->load->view('template/sidebar'); // Sidebar
        $this->load->view('jadwal', $data); // View jadwal
        $this->load->view('template/footer'); // Footer
    }

    public function edit($id)
    {
        $this->load->model('m_jadwal');
        $data['jadwal'] = $this->m_jadwal->getById($id); // Ambil data jadwal berdasarkan ID
        if (!$data['jadwal']) {
            show_404();
        }

        $this->load->view('jadwal_edit', $data); // Tampilkan view edit
    }

    public function update($id) {
        // Get the data from the form
        $data = [
            'kode_makul' => $this->input->post('kode_makul'),
            'hari' => $this->input->post('hari'),
            'jam' => $this->input->post('jam'),
            'mata_kuliah' => $this->input->post('mata_kuliah'),
            'kelas' => $this->input->post('kelas'),
            'dosen' => $this->input->post('dosen')
        ];

        // Call the model method to update the record
        $this->M_jadwal->update_jadwal($id, $data);

        // Redirect or load view with success message
        redirect('jadwalkuliah');  // Or load a specific view to show success
    }

   


    // Tampilkan detail jadwal
    public function detail($id_jadwal = NULL)
    {
        $data['jadwal'] = $this->M_jadwal->getDetailJadwal($id_jadwal); // Ambil detail dari model

        if (empty($data['jadwal'])) {
            show_404(); // Jika tidak ditemukan, tampilkan halaman 404
        }

        // Muat views
        $this->load->view('template/header'); // Header
        $this->load->view('template/sidebar'); // Sidebar
        $this->load->view('detailjadwal', $data); // View detail jadwal
        $this->load->view('template/footer'); // Footer
    }
    public function get_total() {
        $this->load->model('M_jadwal');
        return $this->M_jadwal->get_total();
    }

    public function simpan() {
        $data = [
            'kode_makul' => $this->input->post('kode_makul'),
            'hari' => $this->input->post('hari'),
            'jam' => $this->input->post('jam'),
            'mata_kuliah' => $this->input->post('mata_kuliah'),
            'kelas' => $this->input->post('kelas'),
            'dosen' => $this->input->post('dosen'),
        ];
    
        $this->M_jadwal->insert($data);
        redirect('jadwalkuliah');
    }
    public function some_method() {
        $id = 1;  // Example ID
        $result = $this->M_jadwal->getById($id);  // Calling the method
        // Use $result as needed
    }

    public function tambah()
{
    // Cek apakah metode adalah POST
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $data = [
            'kode_makul' => $this->input->post('kode_makul'),
            'hari' => $this->input->post('hari'),
            'jam' => $this->input->post('jam'),
            'mata_kuliah' => $this->input->post('mata_kuliah'),
            'kelas' => $this->input->post('kelas'),
            'dosen' => $this->input->post('dosen')
        ];

        // Simpan data ke database
        $this->M_jadwal->tambahJadwal($data);
        redirect('jadwalkuliah');
    } else {
        // Tampilkan form tambah jadwal
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tambah_jadwal');
        $this->load->view('template/footer');
    }
}

}
