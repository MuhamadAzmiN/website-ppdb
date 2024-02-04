<?php 

$conn = mysqli_connect("localhost", "root", "", "siswa");
$conn2 = mysqli_connect("localhost", "root","", "siswa2");


 


function query2($query2){
    global $conn2;
    $result = mysqli_query($conn2, $query2);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]= $row;
    }
    return $rows;
}


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]= $row;

    }
    return $rows;
}
function connectToDatabase1() {
    $conn_db1 = mysqli_connect('localhost', 'root', '', 'siswa');
    if (!$conn_db1) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    return $conn_db1;
}

function connectToDatabase2() {
    $conn_db2 = mysqli_connect('localhost', 'root', '', 'siswa2');
    if (!$conn_db2) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    return $conn_db2;
}

function transferData($id) {
    $conn_db1 = connectToDatabase1();
    $conn_db2 = connectToDatabase2();

    // Use prepared statement to prevent SQL injection
    $sql_select = "SELECT * FROM siswa WHERE id=?";
    $stmt = mysqli_prepare($conn_db1, $sql_select);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $field1 = mysqli_real_escape_string($conn_db1, $row['nama']);
        $field2 = mysqli_real_escape_string($conn_db1, $row['email']);
        $jurusan = mysqli_real_escape_string($conn_db1, $row["jurusan"]);
        $nisn = mysqli_real_escape_string($conn_db1, $row["nisn"]);
        $sekolah = mysqli_real_escape_string($conn_db1, $row["sekolah"]);
        $gender = mysqli_real_escape_string($conn_db1, $row["gender"]);
        $gambar = mysqli_real_escape_string($conn_db1,$row['gambar']);
        // Use prepared statement for the insert query
        $sql_insert = "INSERT INTO siswa2 (nama, jurusan, email,nisn,sekolah,gender,gambar) 
                        VALUES (?, ?, ?,?,?,?,?) 
                        ON DUPLICATE KEY UPDATE 
                        nama = VALUES(nama), jurusan = VALUES(jurusan), email = VALUES(email), nisn = VALUES(nisn), sekolah=VALUES(sekolah), gender = VALUES(gender), gambar=VALUES(gambar)";
        $stmt_insert = mysqli_prepare($conn_db2, $sql_insert);
        mysqli_stmt_bind_param($stmt_insert, "sssssss", $field1, $jurusan, $field2,$nisn,$sekolah,$gender,$gambar);
        mysqli_stmt_execute($stmt_insert);
    }

    if (mysqli_num_rows($result) > 0) {
        echo "Data transferred successfully.";
    } else {
        echo "No data found for the given ID.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn_db1);
    mysqli_close($conn_db2);
}



function cari($keyword){
    global $conn2;
    $query = "SELECT * FROM siswa WHERE
                nama LIKE '%$keyword%' OR 
                jurusan LIKE '%$keyword%';




            ";
            return query($query);
}


function pilih($options){
    global $conn;
    $query = "SELECT * FROM siswa
             WHERE 
             jurusan LIKE '%$options%';
             
    ";

    return query($query);
}


function cari2($keyword){
    global $conn2;
    $query2 = "SELECT * FROM siswa2 WHERE
                
                nama LIKE '%$keyword%' OR 
                jurusan LIKE '%$keyword%';




            ";
            return query2($query2);
}


function pilih2($options){
    global $conn2;
    $query2 = "SELECT * FROM siswa2
             WHERE 
             jurusan LIKE '%$options%';
             
    ";
    return query2($query2);
}
function tambah($data){
    global $conn;
    $nama = $data["nama"];
    $email = $data["email"];
    $jurusan = $data["jurusan"];
    $nisn = $data["nisn"];
    $sekolah = $data["sekolah"];
    $gender = $data["gender"];
    $gambar = upload();
    
    if(!$gambar){
        return false;
    }
    $query = "INSERT INTO siswa (nama, email, jurusan, gambar, nisn,sekolah,gender) 
                                VALUES
                                ('$nama', '$email', '$jurusan', '$gambar', '$nisn', '$sekolah', '$gender')
    ";
    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload(){
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // pengecekan


    if($error === 4){
        echo "<script>alert('upload gambar dulu dong ');</script>";
        return false;
    }

    $ekstensiGambarValid = ["jpg", "png", "jpeg"];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    $_SESSION["ekstensiGambarValid"] = $ekstensiGambarValid;
    $_SESSION["ekstensiGambar"] = $ekstensiGambar;

    if(!in_array($_SESSION["ekstensiGambar"], $_SESSION["ekstensiGambarValid"])){
        echo "<script>alert('yang anda upload bukan gambar');</script>";
        
        return false;

    }
    if($ukuranFile > 100000){
        echo "<script>alert('gambar terlalu besar    ');</script>";
        return false;
    }


    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}


function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM siswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function regis($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $last = strtolower(stripslashes($data["last"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $konfir = mysqli_real_escape_string($conn, $data["password2"]);
    $gambar = upload2();
    if(!$gambar){
        return false;
    }
    

    // Periksa apakah username sudah terdaftar
    $result = mysqli_query($conn, "SELECT * FROM user WHERE nama = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah terdaftar');</script>";
        return false;
    }

    // Periksa apakah password dan konfirmasi password sesuai
    if ($password !== $konfir) {
        echo "<script>alert('konfirmasi password tidak sesuai');</script>";
        return false;
    }

    // Hash password sebelum disimpan
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insert data ke dalam tabel user
    $query = "INSERT INTO user (nama, last, email, password,password2, gambar) VALUES ('$username', '$last', '$email', '$passwordHash', '$konfir', '$gambar')";
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Error in INSERT query: " . mysqli_error($conn));
    }

    return mysqli_affected_rows($conn);
}
function upload2(){
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // pengecekan


    if($error === 4){
        echo "<script>alert('upload gambar dulu dong ');</script>";
        return false;
    }

    $ekstensiGambarValid = ["jpg", "png", "jpeg"];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    $_SESSION['ekstensiGambar'] = $ekstensiGambar;
    $_SESSION["ekstensigambarvalid"] = $ekstensiGambarValid;


    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>alert('yang anda upload bukan gambar ');</script>";
        return false;
    }
    // if($ukuranFile > 100000){
    //     echo "<script>alert('gambar terlalu besar    ');</script>";
    //     return false;
    // }


    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img2/' . $namaFileBaru);
    return $namaFileBaru;
}

function admin($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $last = strtolower(stripslashes($data["last"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $konfir = mysqli_real_escape_string($conn, $data["password2"]);

    // Periksa apakah username sudah terdaftar
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE nama = '$username'");
    if (mysqli_fetch_assoc($result)) {
        $_SESSION['login'] = true;
        $_SESSION['regis'] = true;
        echo "<script>alert('username sudah terdaftar');</script>";
        return false;
    }

    // Periksa apakah password dan konfirmasi password sesuai
    if ($password !== $konfir) {
        echo "<script>alert('konfirmasi password tidak sesuai');</script>";
        return false;
    }

    // Hash password sebelum disimpan
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insert data ke dalam tabel user
    $query = "INSERT INTO admin (nama, last, email, password,password2) VALUES ('$username', '$last', '$email', '$passwordHash', '$konfir')";
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Error in INSERT query: " . mysqli_error($conn));
    }

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $nama = $data["nama"]; 
    $gambarLama = $data["gambarLama"];
    $gambarBaru = "";

    
    if ($_FILES["gambar"]["error"] === 4) {
        $gambarBaru = $gambarLama;
    } else {
        $gambarBaru = upload2();
    }
    
    $_SESSION["login_user"] = $nama; // Update session login_user
    $_SESSION["gambar"] = $gambarBaru; // Update session gambar
    
    $query = "UPDATE user SET nama = '$nama', gambar = '$gambarBaru' WHERE id = '$_SESSION[user]'";
    
    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function ganti($data){
    global $conn;
    $_SESSION["password"] = $data["password"];
    $password = password_hash($data["password"], PASSWORD_DEFAULT);
    $query = "UPDATE user SET 
                password = '$password'
                
                ";

                // if($password !== $konfir){
                //     echo "<script>alert('konfirmasi password tidak sesuai');</script>";
                //     return false;
                // }
                $result = mysqli_query($conn, $query);
                return mysqli_affected_rows($conn);    
}




function catatan($data){
    global $conn;
    $catatan = $data["catatan"];
    $nama = $data["nama"];
    $gambar = $data["gambar"];

    // if(!$gambar){
    //     return false;
    // }
    

    $query = "INSERT INTO catatan(catatan,nama,gambar) VALUES('$catatan', '$nama', '$gambar')";
    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function postingan($data){
    global $conn;
    $catatan = $data["catatan"];
    $nama = $data["nama"];
    $gambar = $data["gambar"];

    // if(!$gambar){
    //     return false;
    // }
    

    $query = "INSERT INTO postingan(catatan,nama,gambar) VALUES('$catatan', '$nama', '$gambar')";
    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
// function upload3(){
//     $namaFile = $_FILES["gambar"]["name"];
//     $ukuranFile = $_FILES["gambar"]["size"];
//     $error = $_FILES["gambar"]["error"];
//     $tmpName = $_FILES["gambar"]["tmp_name"];

//     // pengecekan


//     // if($error === 4){
//     //     echo "<script>alert('upload gambar dulu dong ');</script>";
//     //     return false;
//     // }

//     $ekstensiGambarValid = ["jpg", "png", "jpeg"];
//     $ekstensiGambar = explode(".", $namaFile);
//     $ekstensiGambar = strtolower(end($ekstensiGambar));

//     $_SESSION["ekstensiGambarValid"] = $ekstensiGambarValid;
//     $_SESSION["ekstensiGambar"] = $ekstensiGambar;

//     if(!in_array($_SESSION["ekstensiGambar"], $_SESSION["ekstensiGambarValid"])){
//         echo "<script>alert('yang anda upload bukan gambar');</script>";
        
//         return false;

//     }
//     // if($ukuranFile > 100000){
//     //     echo "<script>alert('gambar terlalu besar    ');</script>";
//     //     return false;
//     // }


//     $namaFileBaru = uniqid();
//     $namaFileBaru .= '.';
//     $namaFileBaru .= $ekstensiGambar;


//     move_uploaded_file($tmpName, 'img2/' . $namaFileBaru);
//     return $namaFileBaru;
// }


?>