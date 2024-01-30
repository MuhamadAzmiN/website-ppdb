<?php
session_start();
require 'function.php';
if(isset($_POST["submit"])){
    if(ubah($_POST)>0){
        echo "<script>alert('data berhasil di tambahkan');
        document.location.href = 'index.php'</script>";
        }else {
        echo "<script>alert('data berhasil');
        document.location.href = 'index.php'</script>";
        }
}





?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Upload File</title>
</head>
<body>

    <h2>Form Upload File</h2>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="gambarLama" value="<?=$_SESSION["gambar"];?>">
        <label for="file">Pilih file:</label>
        <label for="file">Pilih File:</label>
        <input type="file" name="gambar" id="file" required>
        <?php if(isset($_SESSION["gambar"])): ?>
            <span><?= $_SESSION["gambar"]; ?></span>
        <?php endif; ?>

        <br>
        <input type="text" name="nama" value="<?=$_SESSION["login_user"];?>">
        <input type="submit" value="Upload" name="submit">
    </form>

</body>
</html>

</body>
</html>