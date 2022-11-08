<?php 
    session_start();
    require 'config.php';
    cookieCheck();
    sessionCheck();

    if (isset($_POST["submitLogin"]) ){
        if (login($_POST) > 0){
            echo "
            <script>
            alert('Login Berhasil!');
            </script>";
        } else {
            echo "<script>
            alert('Login gagal!');
            </script>";
        }
    };
    
    if (isset($_POST["submitRegis"]) ){
        if (register($_POST) > 0){
            echo "
            <script>
            alert('Registrasi Berhasil!');
            </script>";
        } else {
            echo "<script>
            alert('Registrasi gagal!');
            </script>";
        }
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Login & Registration Form</title>
    <link rel="stylesheet" href="resources/css/login.css">
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Masuk</span>
                <form action="#" method="post">
                    
                    <div class="input-field">
                        <input type="text" name="username" placeholder="Username" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>

                    <div class="input-field">
                        <input type="password" name="password" class="password" placeholder= "Password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck" name="remember">
                            <label for="logCheck" class="text">Tetap masuk</label>
                        </div>
                        
                        <a href="#" class="text">Lupa kata sandi?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="submitLogin" value="Masuk">
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
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="input-field">
                        <input type="text" name="user" placeholder="Masukkan username Anda" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Masukkan email Anda" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="pass" placeholder="Buat kata sandi" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="cpass" placeholder="Konfimasi kata sandi" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>


                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon" required>
                            <label for="termCon" class="text">Saya menyetujui Syarat dan Ketentuan*</label>
                        </div>
                    </div>
                    <div class="input-field">
                        <p>Profile Picture*:</p> 
                        <input type="file" name="photo" placeholder="Add profile picture" required>
                    </div>
                    <div class="input-field button">
                        <input type="submit" name="submitRegis" value="Daftar">
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

    <script src="resources/js/login.js"></script>
</body>
</html>