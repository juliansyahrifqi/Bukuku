<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
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
