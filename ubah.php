
<?php


require 'funcation.php';

$id = $_GET['id'];

// Menggunakan fungsi query untuk mendapatkan data berdasarkan id
$mhs = query("SELECT * FROM `siswa wikrama` WHERE id = $id;")[0];
if(isset($_POST["submit"])){
    if(ubah($_POST) > 0) {
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
    <title>Mnegubah Data perpustakaan</title>
</head>
<style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
</style>
<body>
    <form action="" method="post">
        <h1>mengubah data </h1>
        <input type="hidden" name="id" value="<?= $mhs["id"];?>>
        <ul>
            <li>
                <label for="nama">nama</label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"];?>">
            </li>
            <li>
                <label for="nis">nis</label>
                <input type="text" name="nis" id="nis" required  value="<?= $mhs["nis"];?>">
            </li>
            <li>
                <label for="jurusan">jurusan</label>
                <input type="text" name="jurusan" required id="jurusan"  value="<?= $mhs["jurusan"];?>">

            </li>
            <li>
                <label for="rayon">rayon</label>
                <input type="text" name="rayon" id="rayon" required  value="<?= $mhs["rayon"];?>">
            </li>
            <li>

                <button type="submit" name="submit" id="submit">Ubah data</button>
            </li> 
        </ul>






    </form>
    
</body>
</html>