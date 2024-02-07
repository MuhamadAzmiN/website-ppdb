<?php 
require '../function.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM siswa WHERE
nama LIKE '%$keyword%' OR 
jurusan LIKE '%$keyword%';




";
$mahasiswa = query($query);




?>
<table class="table table-bordered table-striped" id="data" style="width: 80%;" cellspacing="0">
        <thead class="bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>NISN</th>
                <TH>ASAL SEKOLAH</TH>
                <th>GENDER</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $siswa): ?>
                <tr>
                   
                    <td><?= $i; ?></td>
                    <td><?= $siswa["nama"]; ?></td>
                    <td><?= $siswa["jurusan"] ?></td>
                    <td><?= $siswa["email"] ?></td>
                    <td><?= $siswa["nisn"];?></td>
                    <td><?= $siswa["sekolah"];?></td>
                    <td><?= $siswa["gender"];?></td>
                    <th><img src="img/<?= $siswa["gambar"];?>" alt="" width="200px"></th>
                    <th>
                    <form action="" method="get" enctype="multipart/form-data">
                    
                    </form>
                </th>

                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>