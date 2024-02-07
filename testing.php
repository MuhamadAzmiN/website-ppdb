<?php 


// $nama = "Azmi goblog";

// // Sensor kata "goblog" dengan "**"
// $nama_sensored = str_replace("goblog", "**", $nama);

// if ($nama_sensored === "**") {
//     echo "nama kasar";
// } else {
    $kalimat = "Ini adalah contoh kalimat yang akan di-goblog.";

// Kata yang akan disensor
$kata_sensored = array("babi", "goblog");

// Inisialisasi variabel untuk menyimpan kalimat hasil sensor
$kalimat_sensored = $kalimat;

// Loop melalui setiap kata yang akan disensor
foreach ($kata_sensored as $kata) {
    // Menghitung panjang kata yang akan disensor
    $panjangKata = strlen($kata);
    
    // Mengganti kata dengan tanda bintang sepanjang panjang kata
    $kalimat_sensored = str_ireplace($kata, str_repeat("*", $panjangKata), $kalimat_sensored);
}

// Menampilkan hasil
echo $kalimat_sensored;

    
?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Jam PHP</title>
</head>
<body>

<form method="post" action="">
    Masukkan jam: <input type="text" name="waktu">
    <input type="submit" value="Submit">
</form>

<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Mengambil nilai dari input waktu
//     $waktu_input = $_POST['waktu'];

//     // Validasi format waktu
//     if (preg_match("/^([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/", $waktu_input)) {
//         echo "Waktu yang dimasukkan: $waktu_input";
//     } else {
//         echo "Format waktu tidak valid. Pastikan memasukkan dalam format HH:MM:SS.";
//     }
// }
?>

</body>
</html>
