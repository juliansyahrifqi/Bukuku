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
        check_admin();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Bukuku | Buku';
        $data['greet'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['buku'] = $this->buku_model->getAll();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/list_buku');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }

    // Tambah Buku
    public function add()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deksripsi', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');

        $data['title'] = 'Bukuku | Tambah Data';
        $data['greet'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['buku'] = $this->buku_model->getAll();


        if ($this->form_validation->run()) {
            $this->buku_model->insert();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                redirect('admin/buku');
            } else {
                $this->session->set_flashdata('failed', 'Data gagal ditambahkan');
                redirect('admin/buku');
            }
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('admin/form_add');
            $this->load->view('template/footer');
            $this->load->view('template/js');
        }
    }

    // Edit Buku
    public function edit($id = null)
    {
        if (!isset($id)) {
            $this->session->set_flashdata('failed', 'Buku tidak ditemukan !');
            redirect('admin/buku');
        }

        // Validation Rules
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deksripsi', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');

        $data['title'] = 'Bukuku | Edit Data';
        $data['greet'] = getTime();
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();
        $data['buku'] = $this->buku_model->getById($id);


        if ($this->form_validation->run()) {
            $this->buku_model->update();
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
            redirect('admin/buku');
        }

        if (!$data['buku']) echo "gaada";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('admin/form_edit');
        $this->load->view('template/footer');
        $this->load->view('template/js');
    }

    // Hapus Buku
    public function delete($id = null)
    {
        if (!isset($id)) {
            $this->session->set_flashdata('failed', 'Buku tidak ditemukan !');
            redirect('admin/buku');
        }

        if ($this->buku_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data buku berhasil dihapus !');
            redirect('admin/buku');
        }
    }
}
