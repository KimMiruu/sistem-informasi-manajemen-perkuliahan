<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_mhs'); // Load M_mhs model
        $this->load->library(['session', 'upload', 'form_validation', 'Pdf']); // Load necessary libraries
        $this->load->helper(['form', 'url' , 'download']); // Load form and URL helper
        $this->load->library('pagination');
    }

    // Method untuk cek login
    public function cek_login($username, $password) {
        // Menggunakan md5 untuk hash password
        return $this->db->get_where('tb_users', [
            'username' => $username,
            'password' => md5($password) // Pastikan password di-hash dengan md5
        ])->row_array(); // Mengembalikan hasil sebagai array
    }

    // Method login, jika belum login redirect ke halaman login
    public function login() {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // Method untuk menampilkan dashboard dengan pagination
   
    public function index() { 
        // Konfigurasi Pagination
        $config['base_url'] = site_url('dashboard/index');
        $config['total_rows'] = $this->M_mhs->count_all();  // Total data dari tabel mahasiswa
        $config['per_page'] = 3;  // Jumlah data per halaman
        $config['uri_segment'] = 3;  // Segmen URL yang digunakan untuk halaman
        
        // Styling Pagination untuk Bootstrap 5
        $config['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        
        // Load Pagination Library
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        // Ambil halaman saat ini dari URL segmen ke-3
        $offset = $this->uri->segment(3, 0);  // Fallback ke 0 jika segmen tidak ada
        $offset = is_numeric($offset) && $offset >= 0 ? (int)$offset : 0;  // Validasi offset
    
        // Ambil data mahasiswa sesuai offset dan limit (per_page)
        $data['mahasiswa'] = $this->M_mhs->get_data_pagination($config['per_page'], $offset);
        
        // Buat link pagination
        $data['pagination_links'] = $this->pagination->create_links();
        
        // Load views
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('mahasiswa', $data);
        $this->load->view('template/footer');


    }
    
    
    public function get_total() {
        $this->load->model('M_mhs');
        return $this->M_mhs->get_total();
    }
    
    public function dosen()
    {
        // Memuat data dosen dari model m_mahasiswa
        $data['dosen'] = $this->m_mhs->tampil_dosen()->result();
    
        // Memuat tampilan dengan data yang diperlukan
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dosenview', $data);
        $this->load->view('template/footer');
    }
   
    public function dboard()
{
    $this->load->view('template/header'); // Header template
    $this->load->view('template/sidebar'); // Sidebar template
    $this->load->view('dboard'); // Konten utama dashboard
    $this->load->view('template/footer'); // Footer template
}



    // Method untuk menambahkan mahasiswa
    public function add() {
        // Konfigurasi upload file
        $config['upload_path'] = './assets/Gambar/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
    
        $this->upload->initialize($config);
    
        if ($this->upload->do_upload('foto')) {
            $upload_data = $this->upload->data();
            $foto = $upload_data['file_name'];
    
            // Menyiapkan data mahasiswa
            $data = [
                'nama_mhs' => $this->input->post('nama_mhs'),
                'nim' => $this->input->post('nim'),
                'alamat' => $this->input->post('alamat'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jurusan' => $this->input->post('jurusan'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no_telp'),
                'foto' => $foto
            ];
    
            // Menambahkan data ke database
            $this->M_mhs->add_data($data);
    
            // Tambahkan flashdata sukses
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
            redirect('dashboard');
        } else {
            // Tambahkan flashdata untuk error
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('dashboard');
        }
    }
    

    // Method untuk edit data mahasiswa
    public function edit($id) {
        $data['mahasiswa'] = $this->M_mhs->edit_data($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('edit_mahasiswa', $data);
        $this->load->view('template/footer');
    }

    // Method untuk update data mahasiswa
    public function update($id) {
        // Data untuk diperbarui
        $data = [
            'nama_mhs' => $this->input->post('nama_mhs'),
            'nim' => $this->input->post('nim'),
            'alamat' => $this->input->post('alamat'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jurusan' => $this->input->post('jurusan'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp')
        ];
    
        // Jika ada file baru yang diupload, tambahkan ke data
        $config['upload_path'] = './assets/Gambar/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
    
        $this->upload->initialize($config);
    
        if ($this->upload->do_upload('foto')) {
            $upload_data = $this->upload->data();
            $data['foto'] = $upload_data['file_name'];
        }
    
        // Perbarui data di database
        $this->M_mhs->update_data($id, $data);
    
        // Tambahkan flashdata sukses
        $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
        redirect('dashboard');
    }
    
    public function search()
    {
        $keyword = $this->input->post('keyword'); // Ambil keyword dari form pencarian
        $data['mahasiswa'] = $this->M_mhs->get_keyword($keyword); // Panggil model untuk mendapatkan hasil pencarian

        // Muat view setelah pencarian
        $this->load->view('template/header'); // Muat header
        $this->load->view('template/sidebar'); // Muat sidebar
        $this->load->view('mahasiswa', $data); // Muat view mahasiswa dengan hasil pencarian
        $this->load->view('template/footer'); // Muat footer
    }


    // Method untuk menghapus data mahasiswa
    public function hapus($id) {
        $this->M_mhs->hapus_data($id);
        redirect('dashboard');
    }

    // Method untuk menampilkan detail mahasiswa
    public function detail($id_mhs = NULL) {
        $data['mahasiswa'] = $this->M_mhs->detail_data($id_mhs);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('detail', $data);
        $this->load->view('template/footer');
    }

    // Method untuk mencetak data mahasiswa
    public function print() {
        $data['mahasiswa'] = $this->M_mhs->get_data();
        $this->load->view('print_mahasiswa', $data);
    }

    // Method untuk menampilkan grafik
    public function tampil_grafik() {
        // Ambil data jumlah mahasiswa per jurusan
        $data['hasil'] = $this->M_mhs->jumlah_mahasiswa_perjurusan();
    
        // Menyusun data untuk grafik
        $labels = [];
        $counts = [];
        foreach ($data['hasil'] as $item) {
            $labels[] = $item->jurusan;
            $counts[] = $item->total;
        }
    
        // Kirimkan data ke view
        $data['labels'] = json_encode($labels);  // Mengubah label menjadi format JSON
        $data['counts'] = json_encode($counts);  // Mengubah counts menjadi format JSON
    
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('v_grafik', $data);
        $this->load->view('template/footer');
    }

    public function generate_pdf()
    {
        $this->load->library('Pdf');
        error_reporting(0);

        // Initialize PDF
        $pdf = new FPDF('P', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Title
        $pdf->Cell(0, 7, 'DAFTAR MAHASISWA', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1); // Spacer

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 10, 'No', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Nama Mahasiswa', 1, 0, 'C');
        $pdf->Cell(30, 10, 'NIM', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Tanggal Lahir', 1, 0, 'C');
        $pdf->Cell(50, 10, 'Jurusan', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);
        $mahasiswa = $this->db->get('tb_mhs')->result();
        $no = 0;

        foreach ($mahasiswa as $data) {
            $no++;
            $pdf->Cell(10, 10, $no, 1, 0, 'C');
            $pdf->Cell(60, 10, $data->nama_mhs, 1, 0);
            $pdf->Cell(30, 10, $data->nim, 1, 0);
            $pdf->Cell(50, 10, $data->tgl_lahir, 1, 0);
            $pdf->Cell(50, 10, $data->jurusan, 1, 1);
        }

        // Output PDF
        $pdf->Output();
    }


    // Method untuk mengekspor data mahasiswa ke Excel
    public function exportExcel()
    {
        // Load data dari model
        $data = $this->m_mhs->get_data();

        // Cek apakah data tersedia
        if (empty($data)) {
            echo "Data tidak tersedia.";
            return;
        }

        // Convert data ke format array untuk XLSXWriter
        $exportData = [];
        $exportData[] = ['No', 'Nama Mahasiswa', 'NIM', 'Tanggal Lahir', 'Jurusan']; // Header row
        $no = 1;
        foreach ($data as $row) {
            $exportData[] = [
                $no++,
                $row['nama_mhs'], // Gunakan array style karena $row adalah array asosiatif
                $row['nim'],
                $row['tgl_lahir'],
                $row['jurusan']
            ];
        }

        // Sertakan library XLSXWriter
        include_once APPPATH . '/third_party/PHP_XLSXWriter/xlsxwriter.class.php';

        // Set filename dengan timestamp
        $filename = "Laporan-" . date('d-m-Y') . ".xlsx";

        // Set headers untuk memaksa download file Excel
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');

        // Buat objek XLSXWriter
        $writer = new XLSXWriter();

        // Set header untuk sheet
        $sheetHeaders = [
            'No' => 'integer',
            'Nama Mahasiswa' => 'string',
            'NIM' => 'string',
            'Tanggal Lahir' => 'string',
            'Jurusan' => 'string'
        ];

        // Tulis header sheet
        $writer->writeSheetHeader('Sheet1', $sheetHeaders);

        // Tulis baris data
        foreach ($exportData as $row) {
            $writer->writeSheetRow('Sheet1', $row);
        }

        // Set metadata tambahan
        $writer->setAuthor('Irfing Adrian');

        // Output file Excel
        $writer->writeToStdOut();

        // Menghentikan eksekusi setelah output
        exit;
    }

    // Method untuk menampilkan data mahasiswa
    public function mahasiswa() {
        // Mengambil data mahasiswa
        $data['mahasiswa'] = $this->m_mhs->get_all_mahasiswa(); // Ambil semua data mahasiswa
        $this->load->view('mahasiswa', $data); // Menampilkan data di view mahasiswa
    }
    
}
