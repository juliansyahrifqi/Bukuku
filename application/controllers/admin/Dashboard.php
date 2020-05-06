<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_model');
        $this->load->model('user_model');
        check_admin();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'greet' => getTime(),
            'title' => 'Bukuku | Dashboard',
            'user' => $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array(),
            'jumlah_buku' => $this->buku_model->countAllBuku(),
            'jumlah_user' => $this->user_model->countAllUser(),
            'active_user' => $this->user_model->countActiveUser(),
            'nonactive_user' => $this->user_model->countUnactiveUser()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/index');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }
}
