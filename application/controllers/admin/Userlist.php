<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userlist extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_admin();
        is_logged_in();
    }

    public function index()
    {
        $this->load->model('user_model');

        $data['title'] = 'Bukuku | List User';
        $data['greet'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['users'] = $this->user_model->getAllUser();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/list_user');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }
}
