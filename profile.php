<?php
session_start();
require 'config.php';

$id = $_COOKIE['id'];

$query = 'SELECT * FROM users WHERE id = ' . $id;
$user = query($query)[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/profile.css">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="navbar">
    <a href="index.php"><img src="./resources/assets/logo.png" class="logo"></a>
    <nav>
      <ul id="menuList">
        <li><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="catalog.php">Catalog</a></li>
        <?php
        if (isset($_SESSION["loginUser"])) {
          echo "<li><a href='payment/'>Cart</a></li>";
          echo "<li><a href='riwayat.php'>History</a></li>";
        } else if (isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='admin/products/'>Dashboard</a></li>";
        } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='auth.php'>Login</a></li>";
        }
        if (isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])){
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
    <div class="container-half">
      <div class="header">
        Profile
      </div>
      <!-- PROFILE INFORMATION-->
      <div class="profile-info">
        <div class="info">Nama Lengkap: </div>
        <div class="info-fields"><?= $user['fullname'] ?></div>

        <div class="info">Photo: </div>
        <img src="resources/img/<?= $user['photo'] ?>" alt="">

        <div class="info">Username: </div>
        <div class="info-fields"><?= $user['username'] ?></div>

        <div class="info">Alamat: </div>
        <div class="info-fields"><?= $user['address'] ?></div>

        <div class="info">Email: </div>
        <div class="info-fields"><?= $user['email'] ?></div>
        <a href="editprofile.php"><button type="submit" class="button-riwayat">Edit Profile</button></a>
        <a href="riwayat.php"><button type="submit" class="button-riwayat">Purchase History</button></a>
      </div>
    </div>
  </div>

  <footer>
    <div class="footer-content">
      <h2>Playstation Game Store</h2>
      <p>This website created by:</p>
      <p>Fazri Gading (2009106031), Alexander Januar (2009106035), dan Risky Kurniawan (2009106050).</p>
      <p>Click Github icon below to check our repository.</p>
      <ul class="socials">
        <li><a href="https://github.com/fazrigading/playstation-game-store/" target="_blank"><i class="fa fa-github"></i></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>Copyright &copy; 2022 Rigalex</p>
    </div>
  </footer>
  <script src="resources/js/index.js"></script>
</body>

</html>