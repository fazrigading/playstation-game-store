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
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- NAVBAR -->
  <div class="navbar">
    <img src="./resources/assets/logo.png" class="logo" title="Playstation Game Store">
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
            <input type="checkbox" class="checkbox" id="modegelap" title="Dark Mode">
            <span class="check"></span>
          </label>
        </li>
      </ul>
    </nav>
  </div>

  <div class="container">
    <!-- PLAYSTATION 5 -->
    <div class="offer">
      <div class="small-container">
        <div class="row">
          <div class="col-offer">
            <img src="resources/img/ps5-small.png" alt="Playstation 5 Console" class="offer-img">
          </div>
          <div class="col-offer">
            <h4>Play Has No Limits</h4>
            <h1>PlayStation 5</h1>
            <small>Experience lightning-fast loading with an ultra-high speed SSD, deeper immersion with support for haptic feedback, adaptive triggers and 3D Audio, and an all-new generation of incredible PlayStation games.</small>
            <br><br>

            <a href="catalog.php#featured-consoles"><button id="buynow">Order Now</button></a>
          </div>
        </div>
      </div>
    </div>

    <!-- PLAYSTATION 4 -->
    <div class="offer">
      <div class="small-container">
        <div class="row2">
          <div class="col-offer">
            <img src="resources/img/ps4-small.png" alt="Playstation 4 Console" class="offer-img2">
          </div>
          <div class="col-offer">
            <h4>Greatness Awaits</h4>
            <h1>PlayStation 4</h1>
            <small>The PS4 console, delivering awesome gaming power, incredible entertainment and vibrant HDR technology. Store your games, apps, screenshots and videos with up to 1TB storage inside the PS4 console - slimmer and lighter and available in Jet Black and more colours.</small>
            <br><br>
            <a href="catalog.php#featured-consoles"><button id="buynow">Order Now</button></a>
          </div>
        </div>
      </div>
    </div>

    <!-- GAMES -->
    <div class="offer">
      <div class="small-container">
        <div class="row">
          <div class="col-offer">
            <img src="resources/img/ps5games.png" alt="Playstation 5 Games" class="offer-img">
          </div>
          <div class="col-offer">
            <h4>Already have Playstation?</h4>
            <h1>Discover Games</h1>
            <small>Discover the extraordinary console exclusive games, from blockbusters to innovative indies, all brought to life with the power of the PS5™ console.</small>
            <br><br>
            <a href="catalog.php#featured-games"><button id="buynow">Find Out</button></a>
          </div>
        </div>
      </div>
    </div>

    <!-- ACCESSORIES -->
    <div class="offer">
      <div class="small-container">
        <div class="row2">
          <div class="col-offer">
            <img src="resources/img/ps5accessories.png" alt="Playstation 5 Accessories" class="offer-img2">
          </div>
          <div class="col-offer">
            <h4>Need more tools?</h4>
            <h1>Discover Accessories</h1>
            <small>Build your perfect gaming setup with controllers, headsets and other accessories for your PS5™ or PS4™ console.</small>
            <br><br>
            <a href="catalog.php#featured-accesories"><button id="buynow">See More</button></a>
          </div>
        </div>
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