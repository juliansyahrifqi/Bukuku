<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $waktu = date('H');

        if (($waktu >= 6) && ($waktu <= 11)) {
            $greet = "Selamat Pagi, ";
        } else if (($waktu > 11) && ($waktu <= 15)) {
            $greet = "Selamat Siang, ";
        } else if (($waktu > 15) && ($waktu <= 18)) {
            $greet = "Selamat Sore, ";
        } else {
            $greet = "Selamat Malam, ";
        }

        $data['title'] = 'Dashboard';
        $data['jam'] = $greet;
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['buku'] = $this->buku_model->getAll();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('user/list', $data);
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }
}
