<?php
session_start();
require 'config.php';
$accessories = query("SELECT * FROM products WHERE category = 'Accessories'");
$i = 1;

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accessories Catalog</title>
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
        <li><a href="catalog.php">Catalog</a></li>
        <li><a href="aboutus.php">About Us</a></li>
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
    <div class="categories">
      <div class="small-container">
        <div class="row row-2">
          <h2>Accessories</h2>
          <select name="Sort" id="">
            <option value="default">Default</option>
            <option value="name-asc">Name Ascending</option>
            <option value="name-dsc">Name Descending</option>
            <option value="price-asc">Price Ascending</option>
            <option value="price-dsc">Price Descending</option>
          </select>
        </div>

        <div class="row">
          <?php foreach($accessories as $accessory):?>
            <div class="col-4" role="button" onclick="redirectTo(<?= $accessory['id'] ?>)">
              <img src="resources/img/<?= $accessory['photo'] ?>">
              <h4><?= substr($accessory['name'], 0, 26) ?></h4>
              <p>Rp<?= number_format($accessory['price'],2, ',', '.') ?></p>
            </div>
          <?php endforeach ?>
        </div>

        <div class="pagination">
          <a href="#">&laquo;</a>
          <a class="active" href="#">1</a>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <a href="#">5</a>
          <a href="#">6</a>
          <a href="#">&raquo;</a>
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