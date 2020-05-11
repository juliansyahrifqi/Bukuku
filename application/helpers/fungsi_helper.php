<?php

// Fungsi cek apakah yang akses sudah login
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('user_email')) {
        redirect('auth');
    }
}

// fungsi cek apakah yang akses admin atau bukan
function check_admin()
{
    $ci = get_instance();
    $user_role = $ci->session->userdata('user_role_id');

    if ($user_role != 1) {
        redirect('user/profile');
    }
}

// fungsi cek apakah yang akses user atau bukan
function check_user()
{
    $ci = get_instance();
    $user_role = $ci->session->userdata('user_role_id');

    if ($user_role != 2) {
        redirect('admin/dashboard');
    }
}

// fungsi greeting berdasarkan waktu akses
function getTime()
{
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

    return $greet;
}
