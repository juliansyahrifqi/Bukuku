<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Favorit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('favorit_model');

        // Cek yang akses halaman ini user atau bukan
        check_user();

        // Cek yang akses halaman ini sudah login atau belum
        is_logged_in();
    }

    // Halaman buku favorit
    public function index()
    {
        $data['title'] = 'Bukuku | My Favourite';
        $data['greet'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();

        // Variabel id didapat dari sesi yang dikirim pada saat login
        $id = $this->session->userdata('user_id');
        $data['favorit'] = $this->favorit_model->getFavourite($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/my_favorit');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }
    // Akhir halaman buku favorit

    // Halaman tambah favorit
    public function addFavourite()
    {
        // id_buku didapat dari id yang tertera pada list buku
        $id_buku = $this->input->post('id_buku');
        $id_user = $this->input->post('user_id');

        // Cek apakah buku yang dipilih sudah ada di dalam list favorit
        $check = $this->favorit_model->checkFavourite($id_buku, $id_user);

        // Jika data buku yang dipilih sudah ada di favorit
        // kembali ke halaman list semua buku dan tampilkan pesan gagal
        if ($check) {
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('failed', 'Buku yang anda pilih sudah ada di favorit');
                redirect('user/allbuku');
            }
        } else {
            // Jika data buku yang dipilih belum ada
            // tambahkan ke favorit
            $this->favorit_model->addFavourite();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Buku berhasil ditambahkan ke favorit');
                redirect('user/allbuku');
            } else {
                $this->session->set_flashdata('success', 'Buku gagal ditambahkan ke favorit');
                redirect('user/allbuku');
            }
        }
    }
    // Akhir halaman tambah favorit

    // Halaman hapus favorit
    public function deleteFavourite($id = null)
    {
        // Jika id kosong atau tidak ditemukan, 
        // kembali ke halaman favorit dan tampilkan pesan gagal
        if (!isset($id)) {
            $this->session->set_flashdata('failed', 'Buku favorit anda tidak ditemukan !');
            redirect('user/favorit');
        }

        // Jika id ditemukan / ada
        // lakukan proses hapus, kembali ke halaman favorit dan tampilkan pesan
        if ($this->favorit_model->deleteFavourite($id)) {
            $this->session->set_flashdata('success', 'Buku berhasil dihapus dari favorit !');
            redirect('user/favorit');
        }
    }
    // akhir halaman hapus favorit
}
