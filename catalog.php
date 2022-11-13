<?php
session_start();
require 'config.php';

$consoles = query("SELECT * FROM products WHERE category = 'Console'");
$consoles = array_slice($consoles, 0, 3);
$games = query("SELECT * FROM products WHERE category = 'Games'");
$games = array_slice($games, 0, 4);
$accessories = query("SELECT * FROM products WHERE category = 'Accessories'");
$accessories = array_slice($accessories, 0, 4);
$i = 1;

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
      <h3 class="title-category" id="featured-consoles">Featured Consoles</h3>
      <div class="small-container">
        <div class="row">
          <?php foreach($consoles as $console):?>
            <div class="col-3" onclick="redirectTo(<?= $console['id'] ?>)">
              <img src="resources/img/<?= $console['photo'] ?>">
              <h4><?= substr($console['name'], 0, 46) ?></h4>
              <p>Rp<?= number_format($console['price'],2, ',', '.') ?></p>
            </div>
          <?php endforeach ?>
          <a href="console.php"><button  id="explore-cons">Explore Consoles</button></a>
        </div>
      </div>

      <!-- FEATURED PRODUCTS -->
      <div class="small-container">
        <!-- FEATURED GAMES -->
        <h3 class="title-category" id="featured-games">Featured Games</h3>
        <div class="row">

          <?php foreach($games as $game):?>
            <div class="col-4" role="button" onclick="redirectTo(<?= $game['id'] ?>)">
              <img src="resources/img/<?= $game['photo'] ?>">
              <h4><?= substr($game['name'], 0, 26) ?></h4>
              <p>Rp<?= number_format($game['price'],2, ',', '.') ?></p>
            </div>
          <?php endforeach ?>
          <a href="games.php"><button type="button" id="explore-games">Explore Games</button></a>
        </div>

        <!-- FEATURED ACCESSORIES -->
        <h3 class="title-category" id="featured-accesories">Featured Accessories</h3>
        <div class="row">
          <?php foreach($accessories as $accessory):?>
            <div class="col-4" role="button" onclick="redirectTo(<?= $accessory['id'] ?>)">
              <img src="resources/img/<?= $accessory['photo'] ?>">
              <h4><?= substr($accessory['name'], 0, 26) ?></h4>
              <p>Rp<?= number_format($accessory['price'],2, ',', '.') ?></p>
            </div>
          <?php endforeach ?>
          <a href="accessories.php"><button  id="explore-accs">Explore Accessories</button></a>
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
  <script>
    const redirectTo = (id) => {
      document.location.href = 'detailpage.php?id=' + id;
    };
  </script>
</body>

</html>