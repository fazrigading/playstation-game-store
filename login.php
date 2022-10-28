<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="login.css">
    <title>Login & Registration Form</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Masuk</span>
                <form action="#">
                    <div class="input-field">
                        <input type="text" placeholder="Masukkan email Anda" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Masukkan kata sandi Anda" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Tetap masuk</label>
                        </div>
                        
                        <a href="#" class="text">Lupa kata sandi?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="submit-login" value="Masuk">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Belum daftar?
                        <a href="#" class="text signup-link">Daftar Sekarang</a>
                    </span>
                </div>
            </div>

            <div class="form signup">
                <span class="title">Daftar</span>
                <form action="#">
                    <div class="input-field">
                        <input type="text" placeholder="Masukkan username Anda" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Masukkan email Anda" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Buat kata sandi" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Konfimasi kata sandi" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">Saya menyetujui Syarat dan Ketentuan</label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="submit-regis" value="Daftar">
                        <!-- <input type="button" value="Daftar"> -->
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Sudah daftar?
                        <a href="#" class="text login-link">Masuk Sekarang</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>

<?php 
    session_start();
    require 'config.php';

    if (isset($_POST["submit-regis"]) ){
        if (register($_POST) > 0){
            echo "<script> alert('Registrasi Berhasil!'); </script>";
        } else {
            echo "<script> alert('Registrasi gagal!'); </script>";
        }
    };

    if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        $result = mysqli_query($db, "SELECT username FROM users WHERE id = $id");
        $rows = mysqli_fetch_assoc($result);
        if ($key === hash('sha256', $rows['username'])){
            $_SESSION["login"] = true;
        }
    };

    if (isset($_SESSION["login"])){
        header('Location: dashboard.php');
        exit;
    };
    
    if (isset($_POST["submit-login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
        if ( mysqli_num_rows($result) === 1 ){
            $rows = mysqli_fetch_assoc($result);
            if (password_verify($password, $rows["password"])){
                $_SESSION["login"] = true;
                if (isset($_POST["logCheck"])){
                    setcookie('id', $rows["id"], time()+ 3600);
                    setcookie('key', hash('sha256', $rows["username"]), time()+ 3600);
                };
                header("Location: dashboard.php");
                exit;
            }                  
        }
    };
?>
