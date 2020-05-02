<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Bukuku | Login";
        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('template/auth_footer');
    }

    public function daftar()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.user_email]', [
            'is_unique' => "This email has already registered"
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => "Password don't match",
            'min_length' => "Password too short"
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Bukuku | Daftar';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
        } else {
            $data = [
                'user_nama' => $this->input->post('name'),
                'user_email' => $this->input->post('email'),
                'user_gambar' => 'default.jpg',
                'user_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'user_role_id' => 2,
                'user_is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil</div>');
            redirect('auth');
        }
    }
}