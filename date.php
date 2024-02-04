<?php


// Mendapatkan waktu saat ini di zona waktu yang telah diatur
date_default_timezone_set('Asia/Jakarta');

// Mendapatkan waktu saat ini di zona waktu yang telah diatur
$waktu = new DateTime();

$jam = $waktu->format('H'); // Mengambil jam dari objek DateTime dan mengonversinya ke integer

if ($jam < 10) {
    echo "Selamat pagi";
} elseif ($jam < 15) {
    echo "Selamat siang";
} elseif ($jam < 18) {
    echo "Selamat sore";
} else {
    echo "Selamat malam";
}

echo $waktu->format('H:i:s');









?>










