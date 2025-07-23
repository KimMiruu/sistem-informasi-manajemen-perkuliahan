<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_mhs');
    }

    public function login() {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Cek apakah user valid
            $user = $this->M_mhs->cek_login($username, $password);

            if ($user) {
                // Set session setelah login berhasil
                $this->session->set_userdata([
                    'id_user'   => $user['id_user'],
                    'username'  => $user['username'],
                    'role'      => $user['role'], // Optional, jika ada
                    'logged_in' => true
                ]);
                redirect('dboard'); // Arahkan ke halaman mahasiswa.php setelah login berhasil
            } else {
                // Jika login gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Username atau Password salah!');
                redirect('auth/login'); // Kembali ke halaman login
            }
        } else {
            $this->load->view('auth/login');
        }
    }


    public function forgot_password()
{
    $this->load->view('forgot_password');
}

public function change_password()
{
    // Pastikan hanya pengguna yang login yang dapat mengakses halaman ini
    if (!$this->session->userdata('user')) {
        $this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
        redirect('auth/login'); // Ubah ke auth/login
    }

    // Ambil input dari form
    $old_password = $this->input->post('old_password');
    $new_password = $this->input->post('new_password');

    // Ambil data pengguna dari session
    $user = $this->session->userdata('user');

    // Validasi input
    if (!$old_password || !$new_password) {
        $this->session->set_flashdata('error', 'Semua kolom harus diisi.');
        redirect('auth/change_password'); // Ubah ke auth/change_password
    }

    // Validasi password lama
    if (!password_verify($old_password, $user['password'])) {
        $this->session->set_flashdata('error', 'Password lama tidak sesuai.');
        redirect('auth/change_password'); // Ubah ke auth/change_password
    }

    // Update password baru di database
    $update_data = [
        'password' => password_hash($new_password, PASSWORD_BCRYPT)
    ];
    $this->db->where('id', $user['id']);
    $update_success = $this->db->update('users', $update_data);

    if ($update_success) {
        // Set pesan sukses
        $this->session->set_flashdata('success', 'Password berhasil diganti. Silakan login kembali.');
        // Hapus session dan arahkan ke halaman login
        $this->session->unset_userdata('user');
        redirect('auth/login'); // Ubah ke auth/login
    } else {
        // Jika terjadi kesalahan saat update
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengganti password. Coba lagi.');
        redirect('auth/change_password'); // Ubah ke auth/change_password
    }
}



    public function login_process() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        // Mengecek data pengguna di database
        $user = $this->db->get_where('tb_users', ['username' => $username])->row_array(); 
        
        if ($user && password_verify($password, $user['password'])) {
            // Menggunakan kolom 'id' yang sesuai dengan database
            $this->session->set_userdata([
                'user_id'   => $user['id'],  // Sesuaikan dengan nama kolom yang benar
                'username'  => $user['username'],
                'logged_in' => true
            ]);
            redirect('dboard');  
        } else {
            // Jika gagal, kembali ke halaman login dengan pesan error
            $this->session->set_flashdata('error', 'Username atau Kata Kunci salah');
            redirect('auth/login');
        }
    }
    

    public function logout() {
        // Hapus session ketika logout
        $this->session->sess_destroy();
        redirect('auth/login'); // Kembali ke halaman login setelah logout
    }

    public function register() {
        $this->load->view('auth/register');
    }

    // Proses registrasi
    public function register_process() {
        // Ambil data dari form
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT); // Menggunakan password_hash untuk enkripsi
    
        // Menyimpan data ke database
        $data = [
            'username' => $username,
            'password' => $password,
        ];
    
        if ($this->db->insert('tb_users', $data)) { // Ganti 'users' dengan 'tb_users'
            // Set flashdata sukses dan alihkan ke login
            $this->session->set_flashdata('success', 'Pendaftaran berhasil. Silakan login!');
            redirect('auth/login');
        } else {
            // Jika gagal, beri pesan error
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat mendaftar.');
            redirect('auth/register');
        }
    }
}
