<?php


$conn = mysqli_connect("localhost", "root", "", "jurusan");
 function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[]= $row;
    }
    return $rows;

 }
function tambah($data){
    global $conn;
    
    $nama = $data["nama"];
    $nis = $data["nis"];
    $jurusan = $data["jurusan"];
    $rayon = $data["rayon"];
    $query = "INSERT INTO `siswa wikrama` (nama, nis,jurusan,rayon) VALUES ('$nama','$nis', '$jurusan', '$rayon')";
    $result = mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM `siswa wikrama` WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function ubah($data){
    global $conn;
    $id = $data["id"];
    $nama = $data["nama"];
    $nis = $data["nis"];
    $jurusan = $data["jurusan"];
    $rayon = $data["rayon"];
    $query = "UPDATE `siswa wikrama` SET 
                    nama = '$nama',
                    nis = '$nis',
                    jurusan = '$jurusan',
                    rayon = '$rayon'
                    WHERE id = '$id'

                    ";
                    
    $result = mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}







?>