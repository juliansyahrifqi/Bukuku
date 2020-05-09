<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Favorit extends CI_Controller
{
    public function index()
    {
        $this->load->model('favorit_model');

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

    public function deleteFavourite($id = null)
    {
        $this->load->model('favorit_model');

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
