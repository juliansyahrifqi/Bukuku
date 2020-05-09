<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Allbuku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_model');
        check_user();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Bukuku | All Book';
        $data['greet'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['buku'] = $this->buku_model->getAll();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/all_buku');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }

    public function addFavourite()
    {
        $this->load->model('favorit_model');

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
