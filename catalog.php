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
  <title>Catalog Page</title>
  <link rel="stylesheet" href="resources/css/catalog.css?v=<?php echo time(); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>
  <!-- NAVBAR -->
  <div class="navbar">
    <a href="index.php"><img src="./resources/assets/logo.png" class="logo"></a>
    <nav>
      <ul id="menuList">
        <li><a href="index.php">Home</a></li>
        <li><a href="catalog.php">Catalog</a></li>
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
            <input type="checkbox" class="checkbox" id="modegelap3">
            <span class="check"></span>
          </label>
        </li>
      </ul>
    </nav>
  </div>

  <div class="container">
    <!-- FEATURED CONSOLES -->
    <div class="categories">
      <h3 class="title-category">Featured Consoles</h3>
      <div class="small-container">
        <div class="row">
          <div class="col-3">
            <img src="resources/img/ps5-small.png">
            <h2>Buy PlayStation 5</h2>
          </div>
          <div class="col-3">
            <img src="resources/img/ps4-small.png">
            <h2>Buy PlayStation 4</h2>
          </div>
        </div>
      </div>

      <!-- FEATURED PRODUCTS -->
      <div class="small-container">
        <!-- FEATURED GAMES -->
        <h3 class="title-category">Featured Games</h3>
        <div class="row">
          <div class="col-4">
            <img src="resources/img/gowr-ps5.jpg">
            <h4>(PS5) God of War: Ragnarok</h4>
            <p>Rp1.029.000</p>
          </div>
          <div class="col-4">
            <img src="resources/img/sackboy-ps5.jpg">
            <h4>(PS5) Sackboy: A Big Adventure</h4>
            <p>Rp879.000</p>
          </div>
          <div class="col-4">
            <img src="resources/img/miles-ps5.jpg">
            <h4>(PS5) Marvel's Spider-Man: Miles Morales</h4>
            <p>Rp729.000</p>
          </div>
          <div class="col-4">
            <img src="resources/img/demon-ps5.jpg">
            <h4>(PS5) Demon's Souls</h4>
            <p>Rp1.029.000</p>
          </div>
          <button type="button" id="explore-games">Explore Games</button>
        </div>

        <!-- FEATURED ACCESSORIES -->
        <h3 class="title-category">Featured Accessories</h3>
        <div class="row">
          <div class="col-4">
            <img src="resources/img/ps5controller.jpg">
            <h4>DualSense Wireless Controller</h4>
            <p>Rp1.269.000</p>
          </div>
          <div class="col-4">
            <img src="resources/img/pulse-white.jpg">
            <h4>PlayStation PULSE 3D Wireless Headset - White</h4>
            <p>Rp1.729.000</p>
          </div>
          <div class="col-4">
            <img src="resources/img/pulse-black.jpg">
            <h4>PlayStation PULSE 3D Wireless Headset - Black</h4>
            <p>Rp1.729.000</p>
          </div>
          <div class="col-4">
            <img src="resources/img/chargingdock.jpg">
            <h4>Playstation DualSense Charging Station</h4>
            <p>Rp449.000</p>
          </div>
          <button type="button" id="explore-accs">Explore Accessories</button>
        </div>
        

      </div>
    </div>
  </div>

  <footer>
    <div class="footer-logo">Copyright © Fazri Gading 2022</div>
    <div class="footer-list">
      <ul>
        <li>2009106031</li>
        <li>Informatika A 20</li>
        <li>Machine Learning Developer</li>
      </ul>
    </div>
  </footer>
  
  <script src="resources/js/catalog.js"></script>
</body>

</html>