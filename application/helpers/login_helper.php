<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('user_email')) {
        redirect('auth');
    } else {
    }
}