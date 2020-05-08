<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_model');
        is_logged_in();
        check_user();
    }

    public function index()
    {
        // Helper getTime() 
        $data['greet'] = getTime();
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/index');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }
}
