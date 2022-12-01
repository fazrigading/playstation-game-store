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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="resources/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
  <title>
    <?= $product["category"] ?>
  </title>
</head>

<body class="bg-white">
  <div class="container">
    <!-- NAVBAR -->
    <div class="container py-3">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a href="index.php"><img src="./resources/assets/logo.png" width="50" class="logo img-fluid me-5"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse ms-2" id="navbarNav">
            <ul class="navbar-nav">
              <li class='nav-item'><a href="index.php">Home</a></li>
              <li class='nav-item'><a href="aboutus.php">About Us</a></li>
              <li class='nav-item'><a href="catalog.php">Catalog</a></li>
            </ul>
            <ul class="navbar-nav position-absolute end-0">
              <?php
              if (isset($_SESSION["loginUser"])) {
                echo "<li class='nav-item'><a href='payment/'>Cart</a></li>";
                echo "<li class='nav-item'><a href='riwayat.php'>History</a></li>";
                echo "<li class='nav-item'><a href='profile.php'>Profile</a></li>";
              } else if (isset($_SESSION["loginAdmin"])) {
                echo "<li class='nav-item'><a href='admin/products/'>Dashboard</a></li>";
              } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])) {
                echo "<li class='nav-item'><a href='auth.php'>Login</a></li>";
              }
              if (isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])) {
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
    <main>
      <div class="main-container">
        <div class="image-container">
          <img class='' src="./resources/img/<?= $product["photo"] ?>" height="500px" alt="">
        </div>
        <div class="side-image-container">
          <div class="side-image">
            <img class='' src="./resources/img/<?= $product["photo"] ?>" alt="">
          </div>
          <div class="side-image">
            <img class='' src="./resources/img/<?= $product["photo"] ?>" alt="">
          </div>
          <div class="side-image">
            <img class='' src="./resources/img/<?= $product["photo"] ?>" alt="">

          </div>
        </div>
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
            <li>Stock: <?= $product["stock"] ?>
            </li>
            <li>
              <?= $product["descriptions"] ?>
            </li>
          </ul>
        </div>

        <div class="product-button">
          <form action="" method="post">
            <input type="hidden" name="productName" value="<?= $product["name"] ?>">
            <input type="hidden" name="idProduct" value="<?= $product["id"] ?>">
            <input type="hidden" name="totalPrice" value="<?= $product["price"] ?>">
            <!-- TOMBOL TAMBAH KE KERANJANG -->
            <button type="submit" name="btnCart" id="add-cart" class="btn btn-primary rounded-0">Tambah Ke
              Keranjang</button><br>

            <!-- TOMBOL BELI SEKARANG -->
            <!-- <button type="submit" name="btnBuy" id="buy-now">Beli Sekarang</button><br> -->
          </form>
        </div>
      </div>
    </main>

  </div>
  <footer class="mt-5">
    <div class="text-center">
      <h2 class="fs-3 fw-bold text-white">Playstation Game Store</h2>
      <p class="text-white fw-light">
        This website created by:
        <span class="d-block">Fazri Gading (2009106031), Alexander Januar (2009106035), dan Risky Kurniawan
          (2009106050).</span>
        <span class="d-block">Click Github icon below to check our repository.</span>
      </p>
      <ul class="list-unstyled my-4 fs-2 m-auto">
        <li><a href="https://github.com/fazrigading/playstation-game-store/" target="_blank"><i
              class="fa fa-github text-white"></i></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>Copyright &copy; 2022 Galery</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="resources/js/detailpage.js"></script>

</body>

</html>