<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_model');
        $this->load->model('user_model');
        $this->load->library('form_validation');
        is_logged_in();
        check_user();
    }

    public function index()
    {
        // Helper getTime() 
        $data['greet'] = getTime();
        $data['title'] = 'Bukuku | My Profile';
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/index');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }

    public function deleteAccount($id = null)
    {
        if (!isset($id)) {
            $this->session->set_flashdata('failed', 'Buku tidak ditemukan !');
            redirect('user/profile');
        }

        if ($this->user_model->deleteAccount($id)) {
            $this->session->set_flashdata('success', 'Akun anda berhasil dihapus !');
            redirect('auth');
        }
    }

    public function editAccount($id = null)
    {
        if (!isset($id)) {
            $this->session->set_flashdata('failed', 'User tidak ditemukan !');
            redirect('auth');
        }

        // Validation Rules
        if ($this->input->post('username') != $this->input->post('username_lama')) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.user_username]', [
                'is_unique' => "Username sudah digunakan"
            ]);
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $data['title'] = 'Bukuku | Edit Profile ';
        $data['greet'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['users'] = $this->user_model->userGetById($id);

        if ($this->form_validation->run()) {
            $this->user_model->editAccount();
            $this->session->set_flashdata('success', 'Data profile berhasil diupdate');
            redirect('user/profile');
        }

        if (!$data['users']) {
            $this->session->set_flashdata('failed', 'User tidak ditemukan !');
            redirect('auth');
        }

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/form_edit_user');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }
}
