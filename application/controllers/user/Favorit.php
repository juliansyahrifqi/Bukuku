<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Favorit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('favorit_model');
        check_user();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Bukuku | My Favourite';
        $data['greet'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();

        $id = $this->session->userdata('user_id');
        $data['favorit'] = $this->favorit_model->getFavourite($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/my_favorit');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }


    public function addFavourite()
    {
        $id_buku = $this->input->post('id_buku');
        $id_user = $this->input->post('user_id');
        $check = $this->favorit_model->checkFavourite($id_buku, $id_user);

        if ($check) {
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('failed', 'Buku yang anda pilih sudah ada di favorit');
                redirect('user/allbuku');
            }
        } else {
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

    public function deleteFavourite($id = null)
    {
        if (!isset($id)) {
            $this->session->set_flashdata('failed', 'Buku favorit anda tidak ditemukan !');
            redirect('user/favorit');
        }

        if ($this->favorit_model->deleteFavourite($id)) {
            $this->session->set_flashdata('success', 'Buku berhasil dihapus dari favorit !');
            redirect('user/favorit');
        }
    }
}
