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
  <link rel="stylesheet" href="resources/css/style.css?v=<?php echo time(); ?>">
</head>

<body>
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
    <div class="row">
      <div class="col-1">
        <h2>PS4 V2<br>Dualshock 4</h2>
        <h3>Stick PS Tanpa Kabel untuk Playstation 4</h3>
        <p>(Kompatibel/Original)</p>
        <h4>Rp500.000</h4>
        <button type="button" id="buynow">Beli Sekarang<img src="resources/assets/arrow.png"></button>
      </div>
      <div class="col-2">
        <img src="resources/assets/controller.png" class="controller">
        <div class="color-box"></div>
        <div class="add-btn" id="addCart">
          <img src="resources/assets/add.png">
          <p><small>Add to Cart</small></p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-1">
        <h2>PS4 V2<br>Dualshock 4</h2>
        <h3>Stick PS Tanpa Kabel untuk Playstation 4</h3>
        <p>(Kompatibel/Original)</p>
        <h4>Rp500.000</h4>
        <button type="button" id="buynow">Beli Sekarang<img src="resources/assets/arrow.png"></button>
      </div>
      <div class="col-2">
        <img src="resources/assets/controller.png" class="controller">
        <div class="color-box"></div>
        <div class="add-btn" id="addCart">
          <img src="resources/assets/add.png">
          <p><small>Add to Cart</small></p>
        </div>
      </div>
    </div>

    <div class="social-links">
      <a href="https://www.facebook.com/fazrigading">
        <img src="resources/assets/fb.png">
      </a>
      <a href="https://twitter.com/fazrigading">
        <img src="resources/assets/tw.png">
      </a>
      <a href="https://instagram.com/fazrigading">
        <img src="resources/assets/ig.png">
      </a>
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
  <script src="resources/js/script-index.js"></script>
</body>

</html>