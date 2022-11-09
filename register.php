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
                <input type="text" id="fullanme" name="fullanme" required/><br>

                <!-- INPUT Nomor HP  -->
                <label for="email">Email</label><br>
                <input type="text" id='email' name="email" required/> <br>

                <!-- INPUT USERNAME  -->
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username" required/><br>

                <!-- INPUT PASSWORD  -->
                <label for="pass">Password</label><br>
                <input type="password" id="password" name="password" required/><br>

                <!-- KONFIRMASI PASSWORD  -->
                <label for="pass">Konfirmasi Password</label><br>
                <input type="password" id="confirmpassword" name="confirmpassword" required/><br>

                <!-- IMAGE  -->
                <div class="form-group file-area">
                    <label for="gambar">Upload Gambar</label><br>
                    <input type="file" name="images" id="images" required="required"/>
                    <div class="file-dummy">
                        <div class="success">File Telah Diupload</div>
                        <div class="default">Pilih File Gambar</div>
                    </div>
                </div>
            </form>


            <button id="Sign-up">Daftar Sekarang</button><br>
            <button id="Back-sign">Kembali ke Halaman Login</button>
            

            

            </div>
            
        </div>

    </main>
    <script src="resources/js/RegisJS.js"></script>

</body>
</html>