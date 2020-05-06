<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('user_email')) {
        redirect('auth');
    }
}

function check_admin()
{
    $ci = get_instance();
    $user_role = $ci->session->userdata('user_role_id');

    if ($user_role != 1) {
        redirect('user');
    }
}

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
