<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['jam'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['buku'] = $this->buku_model->getAll();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/list');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }

    public function add()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deksripsi', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');

        $data['jam'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['buku'] = $this->buku_model->getAll();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Bukuku | Tambah';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('user/form_add');
            $this->load->view('template/footer');
            $this->load->view('template/js');
        } else {
            $this->buku_model->insert();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                redirect('buku');
            } else {
                $this->session->set_flashdata('failed', 'Data gagal ditambahkan');
                redirect('buku');
            }
        }
    }

    public function edit()
    {
        // Code
    }

    public function delete($id = null)
    {
        if (!isset($id)) {
            $this->session->set_flashdata('failed', 'Buku tidak ditemukan !');
            redirect('buku');
        }

        if ($this->buku_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data buku berhasil dihapus !');
            redirect('buku');
        }
    }
}
