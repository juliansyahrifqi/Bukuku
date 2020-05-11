<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function userGetById($id)
    {
        return $this->db->get_where('user', ['user_id' => $id])->row();
    }
    // Login
    public function userCheckLogin($username)
    {
        $this->db->where("user_email =  '$username' or user_username =  '$username'");
        $query = $this->db->get('user');
        return $query->row_array();
    }

    // Insert Data Daftar
    public function insert()
    {
        $data = [
            'user_nama' => htmlspecialchars($this->input->post('name', true)),
            'user_email' => htmlspecialchars($this->input->post('email', true)),
            'user_username' => htmlspecialchars($this->input->post('username', true)),
            'user_gambar' => 'default.jpg',
            'user_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'user_role_id' => 2,
            'user_is_active' => 1,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
    }

    // Hapus akun user
    public function deleteAccount($id)
    {
        $this->user_is_active = 0;
        return $this->db->update('user', $this, ['user_id' => $id]);
    }

    public function editAccount()
    {
        $data = [
            'user_id' => $this->input->post('id'),
            'user_nama' => $this->input->post('nama'),
            'user_email' => $this->input->post('email'),
            'user_username' => $this->input->post('username'),
            'user_gambar' => $this->_uploadEditGambar()
        ];

        $this->_deleteGambar($this->input->post('id'));
        $this->db->update('user', $data, ['user_id' => $this->input->post('id')]);
    }

    private function _deleteGambar($id)
    {
        $user = $this->userGetById($id);

        if ($user->user_gambar != 'default.jpg') {
            $target_file = explode('.', $user->user_gambar)[0];
            return array_map('unlink', glob(FCPATH . "upload/user/$target_file.*"));
        }
    }

    private function _uploadGambar()
    {
        $file_gambar = $_FILES['gambar']['name'];

        if ($file_gambar) {
            $config['upload_path'] = './upload/user/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // Maks 2 mb

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                return $this->upload->data('file_name');
            }
        } else {
            return "default.jpg";
        }
    }

    private function _uploadEditGambar()
    {
        if (!empty($_FILES["gambar"]["name"])) {
            $user_gambar = $this->_uploadGambar();
        } else {
            $user_gambar = $this->input->post('gambar_lama');
        }

        return $user_gambar;
    }

    // Ambil data user yang bukan admin
    public function getAllUser()
    {
        return $this->db->get_where('user', ['user_role_id' => 2])->result();
    }

    // Hitung jumlah semua user 
    public function countAllUser()
    {
        return $this->db->count_all_results('user');
    }

    // Hitung jumlah user yang aktif
    public function countActiveUser()
    {
        $query = $this->db->where('user_is_active', 1)->get('user');
        return $query->num_rows();
    }

    // Hitung jumlah user yang sudah tidak aktif
    public function countUnactiveUser()
    {
        $query = $this->db->where('user_is_active', 0)->get('user');
        return $query->num_rows();
    }
}
