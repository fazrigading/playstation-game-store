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
  <link rel="stylesheet" href="resources/css/catalog.css">
</head>

<body>
    <!-- NAVBAR -->
    <div class="navbar">
      <img src="./resources/assets/logo.png" class="logo">
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
              <input type="checkbox" class="checkbox" id="modegelap">
              <span class="check"></span>
            </label>
          </li>
        </ul>
      </nav>
    </div>

    <div class="container">
    <!-- FEATURED CATEGORIES -->
    <div class="categories">
      <div class="small-container">
        <div class="row">
          <div class="col-3">
            <img src="resources/img/category-1.jpg">
          </div>
          <div class="col-3">
            <img src="resources/img/category-2.jpg">
          </div>
          <div class="col-3">
            <img src="resources/img/category-3.jpg">
          </div>
        </div>
      </div>

      <!-- FEATURED PRODUCTS -->
      <div class="small-container">
        <!-- FEATURED GAMES -->
        <h3 class="title-category">Featured Games</h3>
        <div class="row">
          <div class="col-4">
            <img src="resources/img/category-2.jpg">
            <h4>God of War: Ragnarok (PS5)</h4>
            <p>Rp700.000</p>
          </div>
          <div class="col-4">
            <img src="resources/img/category-2.jpg">
            <h4>God of War: Ragnarok (PS5)</h4>
            <p>Rp700.000</p>
          </div>
          <div class="col-4">
            <img src="resources/img/category-2.jpg">
            <h4>God of War: Ragnarok (PS5)</h4>
            <p>Rp700.000</p>
          </div>
          <div class="col-4">
            <img src="resources/img/category-2.jpg">
            <h4>God of War: Ragnarok (PS5)</h4>
            <p>Rp700.000</p>
          </div>
        </div>

        <!-- FEATURED ACCESSORIES -->
        <h3 class="title-category">Featured Accessories</h3>
        <div class="row">
          <div class="col-4">
            <img src="resources/img/category-3.jpg">
            <h4>God of War: Ragnarok (PS5)</h4>
            <p>Rp700.000</p>
          </div>
          <div class="col-4">
            <img src="resources/img/category-3.jpg">
            <h4>God of War: Ragnarok (PS5)</h4>
            <p>Rp700.000</p>
          </div>
          <div class="col-4">
            <img src="resources/img/category-3.jpg">
            <h4>God of War: Ragnarok (PS5)</h4>
            <p>Rp700.000</p>
          </div>
          <div class="col-4">
            <img src="resources/img/category-3.jpg">
            <h4>God of War: Ragnarok (PS5)</h4>
            <p>Rp700.000</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>