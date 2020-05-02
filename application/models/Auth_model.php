<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function insert()
    {
        $data = [
            'user_nama' => htmlspecialchars($this->input->post('name', true)),
            'user_email' => htmlspecialchars($this->input->post('email', true)),
            'user_gambar' => 'default.jpg',
            'user_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'user_role_id' => 2,
            'user_is_active' => 1,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
    }
}
