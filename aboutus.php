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
  <title>Playstation Game Store</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/aboutus.css?v=<?php echo time(); ?>">
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
      <h1>Our Team</h1>
      <div class="sub-container">
        <div class="teams">
          <img src="resources/assets/gading.jpg" alt="" height="100px">
          <div class="names">Fazri Gading</div>
          <div class="design">Front-End</div>
          <div class="about">Repository Owner. Interested in Computer Vision and C++ Programming. Prefers Bootstrap than full native.</div>

          <div class="social-links">
            <a href="https://www.linkedin.com/in/fazrigading/" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="https://www.instagram.com/fazrigading/" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://twitter.com/fazrigading" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://github.com/fazrigading" target="_blank"><i class="fa fa-github"></i></a>
          </div>
        </div>

        <div class="teams">
          <img src="resources/assets/alex.jpg" alt="">
          <div class="names">Alexander Januar</div>
          <div class="design">Front-End</div>
          <div class="about">lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepteur sint occaecat cupiditat
            non proident,</div>

          <div class="social-links">
            <a href="https://www.linkedin.com/in/alexander-januar-1a29a9219/" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="https://www.instagram.com/allx_jnr/" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://twitter.com/Alex73337519" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://github.com/alexanderjanuar" target="_blank"><i class="fa fa-github"></i></a>
          </div>
        </div>

        <div class="teams">
          <img src="resources/assets/risky.jfif" alt="" height="100px">
          <div class="names">Risky Kurniawan</div>
          <div class="design">Back-End</div>
          <div class="about">lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepteur sint occaecat cupiditat
            non proident,</div>
          <div class="social-links">
            <a href="https://www.linkedin.com/in/riskykrnawan/" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="https://www.instagram.com/_riskykrnawan/" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://twitter.com/riskykrnawan" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://github.com/riskykrnawan" target="_blank"><i class="fa fa-github"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="resources/js/index.js"></script>
</body>

</html>