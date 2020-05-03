<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username or Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Bukuku | Login";
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Model
        $this->load->model('User_model', 'user');
        $user = $this->user->userCheckLogin($username);

        if ($user != null) {
            if ($user['user_is_active'] == 1) {

                if (password_verify($password, $user['user_password'])) {
                    $data = [
                        'user_email' => $user['user_email'],
                        'user_username' => $user['user_username'],
                        'user_role_id' => $user['user_role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['user_role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('failed', 'Password salah');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('failed', 'Akun belum aktif');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('failed', 'Email is not registered');
            redirect('auth');
        }
    }

    public function daftar()
    {
        // Instance objek user_model
        $hasil = $this->user_model;

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
            $hasil->insert();
            $this->session->set_flashdata('success', 'Pendaftaran Berhasil');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('success', 'Anda telah logout');
        redirect('auth');
    }
}
