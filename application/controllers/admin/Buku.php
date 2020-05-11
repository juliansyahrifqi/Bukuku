<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_model');
        $this->load->library('form_validation');
        $this->load->helper('security');

        // Cek yang masuk halaman admin atau bukan
        check_admin();

        // Cek apakah yang akses halaman ini sudah login
        is_logged_in();
    }

    // Utama
    public function index()
    {
        $data['title'] = 'Bukuku | Buku';
        $data['greet'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['buku'] = $this->buku_model->getAll();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/list_buku');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }
    // Akhir utama

    // Tambah Buku
    public function add()
    {
        // Validation Rules 
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deksripsi', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');

        $data['title'] = 'Bukuku | Tambah Data';
        $data['greet'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['buku'] = $this->buku_model->getAll();

        // Jika validasi sudah berhasil
        // lakukan input data 
        if ($this->form_validation->run()) {
            $this->buku_model->insert();

            /* Jika tambah data buku berhasil, tampilkan pesan success, 
            jika tidak tampilkan pesan failed yang akan dikirim ke halaman 
            utama */
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                redirect('admin/buku');
            } else {
                $this->session->set_flashdata('failed', 'Data gagal ditambahkan');
                redirect('admin/buku');
            }
        } else {
            // Jika validasi masih gagal, tampilkan form kembali dan berikan pesan 
            // Validasi yang harus dipenuhi
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('admin/form_add');
            $this->load->view('template/footer');
            $this->load->view('template/js');
        }
    }
    // Akhir tambah buku

    // Edit Buku
    public function edit($id = null)
    {
        // Jika id buku yang akan diedit tidak ada / kosong
        // Tampilkan pesan failed dan kembalikan halaman web ke halaman utama
        if (!isset($id)) {
            $this->session->set_flashdata('failed', 'Buku tidak ditemukan !');
            redirect('admin/buku');
        }

        // Validation Rules
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deksripsi', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');

        $data['title'] = 'Bukuku | Edit Data';

        // Fungsi getTime() ada di bagian helper
        // Fungsi ini ditujukan untuk menyapa user sesuai dengan jam akses 
        $data['greet'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['buku'] = $this->buku_model->getById($id);

        // Jika validasi berhasil, update data melalui buku model
        // kembali ke halaman utama dan tampilkan pesan sukses
        if ($this->form_validation->run()) {
            $this->buku_model->update();
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
            redirect('admin/buku');
        }

        // Jika data buku berdasarkan id tidak ada, tampilkan pesan error
        if (!$data['buku']) {
            $this->session->set_flashdata('failed', 'Data tidak ditemukan');
            redirect('admin/buku');
        }

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/form_edit');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }
    // Akhir edit buku

    // Hapus Buku
    public function delete($id = null)
    {
        // Jika data buku berdasarkan id tidak ditemukan 
        // kembali ke halaman utama dan tampilkan pesan error
        if (!isset($id)) {
            $this->session->set_flashdata('failed', 'Buku tidak ditemukan !');
            redirect('admin/buku');
        }

        // Jika ditemukan lakukan penghapusan data 
        // berdasarkan id yang didapat dan kembali ke halaman utama
        if ($this->buku_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data buku berhasil dihapus !');
            redirect('admin/buku');
        }
    }
    // Akhir hapus buku
}
