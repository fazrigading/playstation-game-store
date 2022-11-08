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
    <link rel="stylesheet" href="resources/css/LoginStyle.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <div class="container-header">
        <ul>
            <li class='sign-in'>
                Sign In
            </li>
            <li>
                Sign Up
            </li>
            <li>
                Home
            </li>
        </ul>
    </div>

    <main>
    <div class ="main-container">

    <div class ="left-container">
        <div class="left-image"></div>
    </div>

    <div class ="right-container">
        <div class="right-content">
            <h2>
                Toko videogame terlengkap <br>dan termurah
            </h2>
            <form method="post">
                <!-- INPUT USERNAME  -->
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username"><br><br>

                <!-- INPUT PASSWORD  -->
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password"><br>

                <button id="Sign-in" type="submit" name="submitLogin">Sign in to my account</button><br>
                <button id="Sign-Up">Sign Up</button>
            </form>


        </div>
    </div>
    </div>
    </main>

   

    <script src="resources/js/LoginStyle.js"></script>
</body>
</html>