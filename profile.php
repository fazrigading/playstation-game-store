<?php
session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link rel="stylesheet" href="resources/css/profile.css?v=<?php echo time(); ?>">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="navbar">
    <a href="index.php"><img src="./resources/assets/logo.png" class="logo"></a>
    <nav>
      <ul id="menuList">
        <li><a href="index.php">Home</a></li>
        <li><a href="catalog.php">Catalog</a></li>
        <li><a href="catalog.php">About Us</a></li>
        <?php
        if (isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='admin/products/'>Dashboard</a></li>";
        } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='auth.php'>Login</a></li>";
        }
        if (isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='payment/'>Cart</a></li>";
          echo "<li><a href='riwayat.php'>Riwayat</a></li>";
          echo "<li><a href='profile.php'>Profile</a></li>";
          echo "<li><a href='logout.php'>Logout</a></li>";
        }
        ?>
        <li>
          <label>
            <input type="checkbox" class="checkbox" id="modegelap">
            <span class="check"></span>
          </label>
        </li>
      </ul>
    </nav>
  </div>


  <div class="container">
    <div class="header">
      Profile
    </div>
    <!-- PROFILE INFORMATION-->
    <div class="profile-info">
      <div class="info">Nama Lengkap: </div>
      <div class="info-fields">Alexander Januar Dienc Caesarea Andhika</div>

      <div class="info">Photo: </div>
      <img src="resources/img/FotoRiski.jfif" alt="">

      <div class="info">Username: </div>
      <div class="info-fields">Alexander12</div>

      <div class="info">Alamat: </div>
      <div class="info-fields">Jalan. Suryanata</div>

      <div class="info">Email: </div>
      <div class="info-fields">alexander@gmail.com</div>
    </div>

    <div class="profile-info">
      <div class="info-update">Update Profile </div>


      <form>
        <label for="fname">Nama Lengkap:</label><br>
        <input type="text" id="fname" name="fname"><br>

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username">

        <label for="adress">Alamat:</label><br>
        <input type="text" id="adress" name="adress">

        <label for="mail">Email:</label><br>
        <input type="text" id="mail" name="mail">

        <label for="file">Upload Photo:</label><br>
        <input type="file" id="file" name="file">

        <hr>
        <br>
        <div class="info-pass">Ubah Password </div>
        <label for="oldpass">Password Lama:</label><br>
        <input type="password" id="oldpass" name="oldpass"><br>

        <label for="newpass">Password Baru:</label><br>
        <input type="password" id="newpass" name="newpass"><br>

        <label for="confirmnewpass">Konfirmasi Password Baru:</label><br>
        <input type="password" id="confirmnewpass" name="confirmnewpass"><br>

        <button type="submit" class="button-submit">Submit</button>

      </form>
    </div>

    <div class="header riwayat">Riwayat Pembelian</div>
    <button type="submit" class="button-riwayat">Lihat</button>
  </div>


</body>

</html>