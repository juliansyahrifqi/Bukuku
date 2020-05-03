<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('H');

        if (($waktu >= 6) && ($waktu <= 11)) {
            $greet = "Selamat Pagi, ";
        } else if (($waktu > 11) && ($waktu <= 15)) {
            $greet = "Selamat Siang, ";
        } else if (($waktu > 15) && ($waktu <= 18)) {
            $greet = "Selamat Sore, ";
        } else {
            $greet = "Selamat Malam, ";
        }

        $data['jam'] = $greet;
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('user_email')])->row_array();

        $this->load->view('user/index', $data);
    }
}
