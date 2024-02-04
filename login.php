<?php

session_start();

if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}
require 'function.php';
// cara yang aman 

if(isset($_COOKIE["id"])&& isset($_COOKIE["username"])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    if($key === hash('sha256', $row["username"])){
        $_SESSION["login"]= true;
    }
}


// cara yang gampang di hack hacker



if(isset($_POST["login"])){
    $username = $_POST["nama"];
    $password = $_POST["pw"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE nama='$username'");
    
    if(mysqli_num_rows($result) === 1){
        
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            $_SESSION["login"]= true;
            $_SESSION['login_user'] = $row["nama"];
            $_SESSION["gambar"] = $row["gambar"];
            $_SESSION["user"] = $row["id"];
            $_SESSION["id"] = $row["id"];

            
                                                                                                                                                                               
            if(isset($_POST["remember"])){
                setcookie('id', $row["id"], time()+60);
                setcookie('key', hash('sha256',$row["username"]), time()+60);
            }
            
            if($row["nama"] === "admin"){
                // Jika admin, arahkan ke "tables.php"
                header("Location: admin.php");
                exit;
            } else {
                // Jika pengguna biasa, arahkan ke "index.php"
                header("Location: index.php");
                exit;
            }
            // Periksa apakah pengguna adalah admin
            
        }
    }

    // Jika tidak ada kecocokan, maka login gagal
    $error = true;
}
?>















<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10"></link>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
        .bg-login-image {
            /* Ganti URL gambar atau path file gambar yang baru */
            background-image: url('img2/azmi.jpg');
            /* Gaya tata letak dan ukuran gambar */
            background-size: cover;
            background-position: center;
            /* Dimensi elemen */
            width: 100%;
            height: 100vh; /* Sesuaikan tinggi sesuai kebutuhan Anda */
        }
    </style>

<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                                    </div>
                                    <?php if(isset($error)) : ?>

<p>username / password salah</p>

  <?php endif;
  ?>
                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            
                                        <input type="text" name="nama" class="form-control form-control-user"
        id="exampleInputEmail" aria-describedby="emailHelp"
        placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pw" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pw" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="remember" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                 
                                        <button class="btn btn-facebook btn-user btn-block" type="submit" name="login">Login</button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>