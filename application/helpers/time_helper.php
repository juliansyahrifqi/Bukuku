<?php

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
