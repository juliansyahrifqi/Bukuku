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

        if ($this->form_validation->run()) {
            $this->_doLogin();
        } else {
            $data['title'] = "Bukuku | Login";
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        }
    }

    private function _doLogin()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // User Model
        $this->load->model('User_model', 'user');
        $user = $this->user->userCheckLogin($username);

        if ($user != null) {
            /* Jika user masih aktif*/

            if ($user['user_is_active'] == 1) {
                if (password_verify($password, $user['user_password'])) {
                    $data = [
                        'user_email' => $user['user_email'],
                        'user_username' => $user['user_username'],
                        'user_role_id' => $user['user_role_id']
                    ];

                    $this->session->set_userdata($data);

                    /* User role_id 1 = Admin 
                       User role_id 2 = User
                    */
                    if ($user['user_role_id'] == 1) {
                        redirect('admin/dashboard/');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('failed', 'Password salah');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('failed', 'Akun anda tidak aktif');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('failed', 'Email atau username belum terdaftar');
            redirect('auth');
        }
    }

    public function daftar()
    {
        // Validation Rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.user_email]', [
            'is_unique' => "Email ini sudah digunakan!"
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.user_username]', [
            'is_unique' => "Username ini sudah digunakan!"
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => "Password tidak sama",
            'min_length' => "Password terlalu pendek"
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run()) {
            $this->user_model->insert();
            $this->session->set_flashdata('success', 'Pendaftaran Berhasil');
            redirect('auth');
        } else {
            $data['title'] = 'Bukuku | Daftar';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
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
