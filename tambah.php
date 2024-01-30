<?php 
require 'function.php';


if(isset($_POST["submit"])){
    if(tambah($_POST)> 0){
        echo "<script>alert('data berhasil di tambahkan');
    document.location.href = 'tables.php'</script>";
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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="d-flex justify-content-center mt-5">
<form action="" method="post" enctype="multipart/form-data" class="col-md-6">


  <div class="mb-3 my-7">
    <label for="exampleInputEmail1" class="form-label">NAMA</label>
    <input type="text" id="nama" name="nama" class="form-control aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">EMAIL</label>
    <input type="text" name="email"  class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">NISN</label>
    <input type="text" name="nisn"  class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">ASAL SEKOLAH</label>
    <input type="text" name="sekolah"  class="form-control" required>
  </div>
  <div class="mb-3">
  <label for="jurusan" class="form-label"> GENDER</label>
  <select id="jurusan" name="gender" class="form-control" required>
    <option value="" disabled selected>Pilih Gender</option>
    <option value="PEREMPUAN">PEREMPUAN</option>
    <option value="LAKI LAKI">LAKI LAKI</option>
    <!-- Tambahkan pilihan jurusan lainnya sesuai kebutuhan -->
  </select>
</div>

  <div class="mb-3">
  <label for="jurusan" class="form-label"> PiLIHAN JURUSAN</label>
  <select id="jurusan" name="jurusan" class="form-control" required>
    <option value="" disabled selected>Pilih Jurusan</option>
    <option value="PPLG">PPLG</option>
    <option value="DKV">DKV</option>
    <option value="MPLB">MPLB</option>
    <option value="HTL">HTL</option>
    <option value="KLN">KLN</option>
    <option value="TJKT">TJKT</option>
    <!-- Tambahkan pilihan jurusan lainnya sesuai kebutuhan -->
  </select>
</div>
  <div class="mb-3">
  <input type="file" id="gambar" name="gambar" class="form-control" onchange="previewImage()">

    

   
<div id="preview-container">
        
       

 
<img id="preview-image" src="#" alt="Pratinjau Gambar" style="display:none; max-width: 100%; max-height: 200px;">
    
   
</div>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<script>

  function previewImage() {
            var input = document.getElementById('gambar');
            var previewContainer = document.getElementById('preview-container');
            var previewImage = document.getElementById('preview-image');

            // Pastikan ada file yang dipilih
            if (input.files && input.files[0]) {
                // Membaca file yang dipilih menggunakan objek FileReader
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Menetapkan sumber gambar pada elemen img
                    previewImage.src = e.target.result;

                    // Menampilkan elemen img dan menghilangkan display:none
                    previewImage.style.display = 'block';
                };

                // Membaca isi file sebagai URL data
                reader.readAsDataURL(input.files[0]);
            } else {
                // Reset pratinjau jika tidak ada file yang dipilih
                previewImage.src = '#';
                previewImage.style.display = 'none';
            }
        }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>

