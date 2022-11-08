<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/RegisStyle.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
<div class="container-header">
        <ul>
            <li class='sign-in'>
                Masuk
            </li>
            <li>
                Daftar
            </li>
            <li>
                Beranda
            </li>
        </ul>
    </div>

    <main>
        <div class="main-container">
            <div class='main-content'>
            <h1>
                Registrasi Akun Baru
            </h1>

            <form>
                <!-- INPUT NAMA LENGKAP  -->
                <label for="fname">Nama Lengkap</label><br>
                <input type="text" id="fullanme" name="fullanme"><br>

                <!-- INPUT Nomor HP  -->
                <label for="fname">Nomor Handphone</label><br>
                <input type="tel" id='telp' name="telphone" placeholder="0812 5372 1678" pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}" maxlength="12" required/> <br>

                <!-- INPUT USERNAME  -->
                <label for="fname">Username</label><br>
                <input type="text" id="username" name="username"><br>

                <!-- INPUT PASSWORD  -->
                <label for="fname">Password</label><br>
                <input type="password" id="password" name="password"><br>

                <!-- KONFIRMASI PASSWORD  -->
                <label for="fname">Konfirmasi Password</label><br>
                <input type="password" id="confirmpassword" name="confirmpassword"><br>
            </form>


            <button id="Sign-up">Daftar Sekarang</button><br>
            <button id="Back-sign">Kembali ke Halaman Login</button>

            </div>
            
        </div>

    </main>
    <script src="resources/js/RegisJS.js"></script>

</body>
</html>