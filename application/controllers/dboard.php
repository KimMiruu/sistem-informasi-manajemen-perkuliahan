<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Memuat library session, helper, dan model
        $this->load->library('session');
        $this->load->helper('url');

        // Cek apakah user sudah login, jika belum, arahkan ke halaman login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login'); // Redirect ke halaman login
        }

        // Memuat model untuk mendapatkan data
        $this->load->model('M_mhs');
        $this->load->model('M_dosen');
        $this->load->model('M_jadwal');
    }

    public function index() {
        // Mengambil data total dari model
        $data['total_mahasiswa'] = $this->M_mhs->get_total();
        $data['total_dosen'] = $this->M_dosen->get_total();
        $data['total_jadwal'] = $this->M_jadwal->get_total();

        // Memuat tampilan dengan data tambahan
        $this->load->view('template/header'); // Header template
        $this->load->view('template/sidebar'); // Sidebar template
        $this->load->view('dboard', $data); // Konten utama dashboard dengan data
        $this->load->view('template/footer'); // Footer template
    }
    public function chart_data()
    {
        $this->load->model('M_mhs');
        $this->load->model('M_dosen');
        $this->load->model('M_jadwal');
    
        // Ambil total mahasiswa dan dosen
        $total_mahasiswa = $this->M_mhs->get_total(); 
        $total_dosen = $this->M_dosen->get_total();
    
        // Ambil total jadwal kuliah (total saja, tanpa membedakan minggu)
        $total_jadwal = $this->M_jadwal->get_total_jadwal(); // Pastikan model mengembalikan total jadwal
    
        // Format data untuk JSON
        $data = [
            'mahasiswa' => $total_mahasiswa,
            'dosen' => $total_dosen,
            'jadwal' => $total_jadwal, // Total jadwal kuliah
        ];
    
        // Kembalikan data dalam format JSON
        echo json_encode($data);
    }
    
    
}
