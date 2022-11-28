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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="resources/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="container fixed-top py-3">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a href="index.php"><img src="./resources/assets/logo.png" width="50" class="logo img-fluid me-5"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ms-2" id="navbarNav">
            <ul class="navbar-nav">
              <li class='nav-item'><a href="index.php">Home</a></li>
              <li class='nav-item'><a href="aboutus.php">About Us</a></li>
              <li class='nav-item'><a href="catalog.php">Catalog</a></li>
            </ul>
            <ul class="navbar-nav position-absolute end-0"><?php
              if (isset($_SESSION["loginUser"])) {
                echo "<li class='nav-item'><a href='payment/'>Cart</a></li>";
                echo "<li class='nav-item'><a href='riwayat.php'>History</a></li>";
                echo "<li class='nav-item'><a href='profile.php'>Profile</a></li>";
              } else if (isset($_SESSION["loginAdmin"])) {
                echo "<li class='nav-item'><a href='admin/products/'>Dashboard</a></li>";
              } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])) {
                echo "<li class='nav-item'><a href='auth.php'>Login</a></li>";
              }
              if (isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])){
                echo "<li class='nav-item'><a href='logout.php'>Logout</a></li>";
              }
              ?>
              <li class='nav-item'>
                <label>
                  <input type="checkbox" class="checkbox" id="modegelap" title="Dark Mode">
                  <span class="check"></span>
                </label>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <main class="my-5 py-5 px-lg-5">
      <div class="row align-items-center">
        <div class="col-5 float-start">
          <img src="resources/img/ps5-small.png" alt="Playstation 5 Console" class="img-fluid">
        </div>
        <div class="col-7">
          <h4>Play Has No Limits</h4>
          <h1>PlayStation 5</h1>
          <small>Experience lightning-fast loading with an ultra-high speed SSD, deeper immersion with support for haptic feedback, adaptive triggers and 3D Audio, and an all-new generation of incredible PlayStation games.</small>
          <br><br>
          <a href="catalog.php#featured-consoles"><button id="buynow" class="custom-button">Order Now</button></a>
        </div>
      </div>

      <div class="row align-items-center">
        <div class="col-7">
          <h4>Greatness Awaits</h4>
          <h1>PlayStation 4</h1>
          <small>The PS4 console, delivering awesome gaming power, incredible entertainment and vibrant HDR technology. Store your games, apps, screenshots and videos with up to 1TB storage inside the PS4 console - slimmer and lighter and available in Jet Black and more colours.</small>
          <br><br>
          <a href="catalog.php#featured-consoles"><button id="buynow" class="custom-button">Order Now</button></a>
        </div>
        <div class="col-5 text-end">
          <img src="resources/img/ps4-small.png" alt="Playstation 4 Console" class="img-fluid">
        </div>
      </div>

      <div class="row align-items-center">
        <div class="col-5">
          <img src="resources/img/ps5games.png" alt="Playstation 5 Games" class="offer-img img-fluid">
        </div>
        <div class="col-7">
          <h4>Already have Playstation?</h4>
          <h1>Discover Games</h1>
          <small>Discover the extraordinary console exclusive games, from blockbusters to innovative indies, all brought to life with the power of the PS5™ console.</small>
          <br><br>
          <a href="catalog.php#featured-games"><button id="buynow" class="custom-button">Find Out</button></a>
        </div>
      </div>
      
      <div class="row align-items-center">
        <div class="col-7">
          <h4>Need more tools?</h4>
          <h1>Discover Accessories</h1>
          <small>Build your perfect gaming setup with controllers, headsets and other accessories for your PS5™ or PS4™ console.</small>
          <br><br>
          <a href="catalog.php#featured-accesories"><button id="buynow" class="custom-button">See More</button></a>
        </div>
        <div class="col-5 text-end">
          <img src="resources/img/ps5accessories.png" alt="Playstation 5 Accessories" class="offer-img2 img-fluid">
        </div>
      </div>
    </main>

  </div>
  <footer class="mt-5">
    <div class="text-center">
      <h2 class="fs-3 fw-bold text-white">Playstation Game Store</h2>
      <p class="text-white fw-light">
        This website created by:
        <span class="d-block">Fazri Gading (2009106031), Alexander Januar (2009106035), dan Risky Kurniawan (2009106050).</span>
        <span class="d-block">Click Github icon below to check our repository.</span>
      </p>
      <ul class="list-unstyled my-4 fs-2 m-auto">
        <li><a href="https://github.com/fazrigading/playstation-game-store/" target="_blank"><i class="fa fa-github text-white"></i></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>Copyright &copy; 2022 Galery</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="resources/js/index.js"></script>
</body>

</html>