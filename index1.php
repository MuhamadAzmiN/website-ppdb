
<?php


require 'funcation.php';
if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
    echo "<script>alert('data berhasil di tambahkan');
    document.location.href = 'index.php'</script>";
    }else {
    echo "<script>alert('data gagal di tambahkan');
    document.location.href = 'index.php'</script>";
    }
}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>
    <style>
       <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    form {
        max-width: 400px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    li {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #2980b9;
    }
</style>

    </style>
</head>
<body>

    <form action="" method="post" onsubmit="return validateForm()">
        <ul>
            <li>
                <label for="nama">NAMA</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="nis">NIS</label>
                <input type="text" name="nis" id="nis" required>
            </li>
            <li>
                <label for="jurusan">JURUSAN</label>
                <input type="text" name="jurusan" required id="jurusan">
            </li>
            <li>
                <label for="rayon">RAYON</label>
                <input type="text" name="rayon" id="rayon" required>
            </li>
            <li>
                <button type="submit" name="submit" id="submit">KIRIM</button>
            </li>
        </ul>
    </form>

    <script>
        function validateForm() {
            // Mengambil nilai input
            var nama = document.getElementById('nama').value;
            var nis = document.getElementById('nis').value;
            var jurusan = document.getElementById('jurusan').value;
            var rayon = document.getElementById('rayon').value;

            // Validasi input
            if (nama === '' || nis === '' || jurusan === '' || rayon === '') {
                alert('Semua field harus diisi');
                return false;
            }

            return true;
        }
    </script>

</body>
</html>
