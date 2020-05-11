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

    // Halaman login
    public function index()
    {
        // validation rules
        $this->form_validation->set_rules('username', 'Username or Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        // Jika validasi berhasil maka lakukan proses login
        // jika tidak kembalikan ke halaman login kembali
        if ($this->form_validation->run()) {
            $this->_doLogin();
        } else {
            $data['title'] = "Bukuku | Login";
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        }
    }
    // Akhir halaman login
    private function _doLogin()
    {
        // username dan password didapat dari input user
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // cek apakah username atau email sudah terdaftar di database
        $user = $this->user_model->userCheckLogin($username);

        // Jika user tidak ada / tidak terdaftar di database
        if ($user != null) {
            /* Jika user masih aktif, lakukan verifikasi password */
            if ($user['user_is_active'] == 1) {
                if (password_verify($password, $user['user_password'])) {
                    $data = [
                        'user_email' => $user['user_email'],
                        'user_username' => $user['user_username'],
                        'user_role_id' => $user['user_role_id'],
                        'user_id' => $user['user_id']
                    ];

                    $this->session->set_userdata($data);

                    // Jika role-nya 1 (admin), arahkan ke halaman admin
                    // Jika role-nya 2 (user), arahkan ke halaman user
                    if ($user['user_role_id'] == 1) {
                        redirect('admin/dashboard');
                    } else {
                        redirect('user/profile');
                    }
                } else {
                    // Jika Password salah
                    $this->session->set_flashdata('failed', 'Password salah');
                    redirect('auth');
                }
            } else {
                // Jika akun dihapus / tidak aktif
                $this->session->set_flashdata('failed', 'Akun anda sudah tidak aktif');
                redirect('auth');
            }
        } else {
            // Jika email atau username belum terdaftar
            $this->session->set_flashdata('failed', 'Email atau username belum terdaftar');
            redirect('auth');
        }
    }

    // Proses daftar 
    public function daftar()
    {
        // Validation Rules
        // email dan username harus unik ( belum terdaftar di database )
        // passwor minimal 6 karakter
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

        // Jika validasi berhasil, tambahkan data user
        if ($this->form_validation->run()) {
            $this->user_model->insert();
            $this->session->set_flashdata('success', 'Pendaftaran Berhasil');
            redirect('auth');
        } else {
            // Jika gagal tampilkan halaman registrasi kembali
            $data['title'] = 'Bukuku | Daftar';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
        }
    }
    // Akhir proses daftar

    // Proses logout
    public function logout()
    {
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('success', 'Anda telah logout');
        redirect('auth');
    }
    // Akhir proses logout
}
