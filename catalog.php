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
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- NAVBAR -->
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
            <input type="checkbox" class="checkbox" id="modegelap3">
            <span class="check"></span>
          </label>
        </li>
      </ul>
    </nav>
  </div>

  <div class="container">
    <div class="categories">
      <!-- FEATURED CONSOLES -->
      <div class="small-container">
        <h3 class="title-category" id="featured-consoles">Featured Consoles</h3>
        <div class="row">
          <?php foreach ($consoles as $console) : ?>
            <div class="col-3" onclick="redirectTo(<?= $console['id'] ?>)">
              <img src="resources/img/<?= $console['photo'] ?>">
              <h4><?= substr($console['name'], 0, 46) ?></h4>
              <p>Rp<?= number_format($console['price'], 2, ',', '.') ?></p>
            </div>
          <?php endforeach ?>
          <a href="console.php"><button id="explore-cons">Explore Consoles</button></a>
        </div>
      </div>

      <!-- FEATURED PRODUCTS -->
      <div class="small-container">
        <!-- FEATURED GAMES -->
        <h3 class="title-category" id="featured-games">Featured Games</h3>
        <div class="row">

          <?php foreach ($games as $game) : ?>
            <div class="col-4" role="button" onclick="redirectTo(<?= $game['id'] ?>)">
              <img src="resources/img/<?= $game['photo'] ?>">
              <h4><?= substr($game['name'], 0, 26) ?></h4>
              <p>Rp<?= number_format($game['price'], 2, ',', '.') ?></p>
            </div>
          <?php endforeach ?>
          <a href="games.php"><button type="button" id="explore-games">Explore Games</button></a>
        </div>

        <!-- FEATURED ACCESSORIES -->
        <h3 class="title-category" id="featured-accesories">Featured Accessories</h3>
        <div class="row">
          <?php foreach ($accessories as $accessory) : ?>
            <div class="col-4" role="button" onclick="redirectTo(<?= $accessory['id'] ?>)">
              <img src="resources/img/<?= $accessory['photo'] ?>">
              <h4><?= substr($accessory['name'], 0, 26) ?></h4>
              <p>Rp<?= number_format($accessory['price'], 2, ',', '.') ?></p>
            </div>
          <?php endforeach ?>
          <a href="accessories.php"><button id="explore-accs">Explore Accessories</button></a>
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

  <script src="resources/js/catalog.js"></script>
  <script>
    const redirectTo = (id) => {
      document.location.href = 'detailpage.php?id=' + id;
    };
  </script>
</body>

</html>