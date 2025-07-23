<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'form']);
        $this->load->library(['upload', 'session']);
        $this->load->model('M_profil');
    }

    public function index() {
        $id = 1; // ID pengguna, ganti sesuai kebutuhan
        $data['profil'] = $this->M_profil->get_profil($id);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('profil_view', $data);
        $this->load->view('template/footer');
    }

    public function update_profil() {
        $id = 1; // ID pengguna
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'telepon' => $this->input->post('telepon')
        ];

        if ($this->M_profil->update_profil($id, $data)) {
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui profil.');
        }

        redirect('profil');
    }

    public function upload_foto() {
        $id = 1; // ID pengguna

        // Konfigurasi upload
        $config['upload_path']   = './assets/Gambar/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048; // 2MB
        $config['file_name']     = 'foto_profil_' . time();

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
        } else {
            // Hapus foto lama
            $profil = $this->M_profil->get_profil($id);
            if (!empty($profil['foto']) && file_exists('./assets/Gambar/' . $profil['foto'])) {
                unlink('./assets/Gambar/' . $profil['foto']);
            }

            // Simpan foto baru
            $upload_data = $this->upload->data();
            $this->M_profil->update_foto($id, $upload_data['file_name']);
            $this->session->set_flashdata('success', 'Foto berhasil diunggah.');
        }

        redirect('profil');
    }

    public function edit()
    {
        // Periksa apakah form disubmit
        if ($this->input->post()) {
            // Ambil data dari form
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
            ];
    
            // Update ke database
            $this->db->where('id', $this->session->userdata('user_id')); // Ganti dengan ID pengguna
            if ($this->db->update('tb_profil', $data)) {
                $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat memperbarui profil.');
            }
    
            // Redirect ke halaman profil
            redirect('profil');
        }
    
        // Ambil data pengguna
        $data['profil'] = $this->db->get_where('tb_profil', ['id' => $this->session->userdata('user_id')])->row_array();
    
        // Tampilkan form edit
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('edit_profil', $data);
        $this->load->view('template/footer');
    }
    
    


    // Method untuk memperbarui data profil
    public function update() {
        $user_id = $this->session->userdata('user_id'); // Ambil user_id dari session
        if (!$user_id) {
            show_error('User ID tidak ditemukan di session.', 403);
        }

        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'telepon' => $this->input->post('telepon'),
        ];

        // Update data ke database
        if ($this->M_profil->update_profil($user_id, $data)) {
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat memperbarui profil.');
        }

        redirect('profil/edit');
    } 

}
?>
