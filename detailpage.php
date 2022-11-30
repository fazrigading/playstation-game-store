<?php
session_start();
require 'config.php';
$id = $_GET["id"];
$product = query("SELECT * FROM products WHERE id = $id")[0];



if (isset($_POST['btnCart']) || isset($_POST['btnBuy'])) {
  if (!isset($_SESSION['loginUser'])) {
    header('Location: auth.php');
    exit;
  }
}
if (isset($_POST['btnCart'])) {
  $query = "SELECT id FROM cart WHERE id_user = $_COOKIE[id] AND id_product = $id";
  $isExist = query($query);
  if ($isExist) {
    echo "
            <script>
            alert('Berhasil memasukkan ke keranjang!');
            </script>";
  } else {
    if (addToCart($_POST) > 0) {
      echo "
                <script>
                alert('Berhasil memasukkan ke keranjang!');
                </script>";
    } else {
      echo "<script>
                alert('Gagal memasukkan ke keranjang!');
                </script>";
    }
  }
}

// if (isset($_POST['btnBuy'])) {
//   if (buy($_POST) > 0) {
//     header('Location: payment/success.php');
//   } else {
//     echo "<script>
//             alert('Gagal membeli barang!');
//             </script>";
//   }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="resources/css/detailpage.css">
  <link rel="stylesheet" href="resources/css/catalog.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
  <title><?= $product["category"] ?></title>
</head>

<body>
  <div class="container">
    <!-- NAVBAR -->
    <div class="navbar">
      <a href="index.php"><img src="./resources/assets/logo.png" class="logo"></a>
      <nav>
        <ul id="menuList">
          <li><a href="index.php">Home</a></li>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="catalog.php">Catalog</a></li>
          <?php
          if (isset($_SESSION["loginAdmin"])) {
            echo "<li><a href='admin/products/'>Dashboard</a></li>";
          } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])) {
            echo "<li><a href='auth.php'>Login</a></li>";
          }
          if (isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])) {
            echo "<li><a href='payment/'>Cart</a></li>";
            echo "<li><a href='riwayat.php'>History</a></li>";
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
    <main>
      <div class="main-container">
        <div class="image-container">
          <img src="./resources/img/<?= $product["photo"] ?>" height="500px" alt="">
        </div>
        <!-- <div class = "side-image-container">
                <div class = "side-image">
                    <img src="resources/assets/PS5SIDE.jpg" alt="">
                </div>
                <div class = "side-image">
                    <img src="resources/assets/PS5SIDE2.jpg" alt="">
                </div>
                <div class = "side-image">
                    <img src="resources/assets/PS5SIDE3.jpg" alt="">
                </div>
            </div> -->
      </div>
      <br>
      <div class="product">
        <div class="product-detail">
          <h5>
            <?= $product["category"] ?>
          </h5>
          <h2>
            <?= $product["name"] ?>
          </h2>
          <br>
          <span class="product-price">
            Rp.<?= number_format($product['price'], 2, ',', '.') ?>
          </span>
          <br><br>
          <ul>
            <li>Stock: <?= $product["stock"] ?></li>
            <li><?= $product["descriptions"] ?></li>
          </ul>
        </div>

        <div class="product-button">
          <form action="" method="post">
            <input type="hidden" name="productName" value="<?= $product["name"] ?>">
            <input type="hidden" name="idProduct" value="<?= $product["id"] ?>">
            <input type="hidden" name="totalPrice" value="<?= $product["price"] ?>">
            <!-- TOMBOL TAMBAH KE KERANJANG -->
            <button type="submit" name="btnCart" id="add-cart">Tambah Ke Keranjang</button><br>

            <!-- TOMBOL BELI SEKARANG -->
            <!-- <button type="submit" name="btnBuy" id="buy-now">Beli Sekarang</button><br> -->
          </form>
        </div>
      </div>
    </main>
    <script src="resources/js/detailpage.js"></script>

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

</body>

</html>