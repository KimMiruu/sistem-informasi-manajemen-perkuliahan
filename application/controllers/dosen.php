<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dosen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model
        $this->load->model('M_dosen');
        $this->load->library('Pdf');  // pastikan ini huruf kecil sesuai nama file library
        $this->load->helper(['form', 'url', 'download']);
    }

    public function dosen() {
        // Konfigurasi pagination
        $config['base_url'] = site_url('dashboard/dosen');  // URL untuk pagination
        $config['total_rows'] = $this->M_dosen->count_all();  // Total data dosen
        $config['per_page'] = 2;  // Jumlah data per halaman
        $config['uri_segment'] = 3;  // Segmen untuk halaman di URL

        // Hitung total halaman
        $total_pages = ceil($config['total_rows'] / $config['per_page']);

        // Ambil halaman saat ini dari URL
        $page = $this->uri->segment(3, 0);
        $page = is_numeric($page) && $page >= 0 ? (int)$page : 0;

        // Hitung offset
        $offset = $page * $config['per_page'];

        // Ambil data dosen
        $data['dosen'] = $this->M_dosen->get_data_pagination($config['per_page'], $offset);

        // Buat pagination manual
        $pagination_links = '<div class="pagination justify-content-center">';
        if ($total_pages > 1) {
            // Tombol Previous
            if ($page > 0) {
                $pagination_links .= '<a href="' . site_url('dashboard/dosen/' . ($page - 1)) . '" class="btn btn-primary mx-1">Previous</a>';
            }

            // Nomor halaman
            for ($i = 0; $i < $total_pages; $i++) {
                $active = ($page == $i) ? 'active' : '';
                $pagination_links .= '<a href="' . site_url('dashboard/dosen/' . $i) . '" class="btn btn-outline-primary mx-1 ' . $active . '">' . ($i + 1) . '</a>';
            }

            // Tombol Next
            if ($page < $total_pages - 1) {
                $pagination_links .= '<a href="' . site_url('dashboard/dosen/' . ($page + 1)) . '" class="btn btn-primary mx-1">Next</a>';
            }
        }
        $pagination_links .= '</div>';

        $data['pagination_links'] = $pagination_links;

        // Load views
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dosenview', $data); // Tampilkan dosen dan pagination
        $this->load->view('template/footer');

    
    }

    public function export_pdf()
    {
        $this->load->library('Pdf');
        error_reporting(0);
    
        // Initialize PDF
        $pdf = new FPDF('P', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
    
        // Title
        $pdf->Cell(0, 7, 'DAFTAR DOSEN', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1); // Spacer
    
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 10, 'No', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Nama Dosen', 1, 0, 'C');
        $pdf->Cell(30, 10, 'NIK/NIDN', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Prodi', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Email', 1, 0, 'C');
        $pdf->Cell(30, 10, 'No Telepon', 1, 1, 'C');
    
        $pdf->SetFont('Arial', '', 10);
        $dosen = $this->db->get('tb_dosen')->result();
        $no = 0;
    
        foreach ($dosen as $data) {
            $no++;
            $pdf->Cell(10, 10, $no, 1, 0, 'C');
            $pdf->Cell(50, 10, $data->nama_dosen, 1, 0);
            $pdf->Cell(30, 10, $data->nik_nidn, 1, 0);
            $pdf->Cell(40, 10, $data->prodi, 1, 0);
            $pdf->Cell(50, 10, $data->email, 1, 0);
            $pdf->Cell(30, 10, $data->no_telp, 1, 1);
        }
    
        // Output PDF
        $pdf->Output('Data_Dosen.pdf', 'I');
    }
    public function print() {
        // Mengambil semua data dosen sebagai objek
        $data['dosen'] = $this->M_dosen->get_all_dosen();  // pastikan result() digunakan untuk mengembalikan objek
        $this->load->view('print_dosen', $data);
    }


    public function get_total() {
        $this->load->model('M_dosen');
        return $this->M_dosen->get_total();
    }
    
}
