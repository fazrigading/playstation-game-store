<?php
session_start();
require '../config.php';
cookieCheck();
if (!isset($_SESSION["loginUser"])) {
  header('Location: index.php');
  exit;
}
$query = "SELECT cart.*, products.name, products.photo, products.price FROM cart LEFT JOIN products ON cart.id_product = products.id WHERE id_user = $_COOKIE[id];";
$carts = query($query);
// var_dump($carts);
// exit;
$sum = 0;
$total_price_cart = 0;
$total_item_cart = 0;
foreach ($carts as $cart) {
  $total_price_cart += $cart['price'] * $cart['quantity'];
  $total_item_cart++;
}

if (isset($_POST['btnCheckout'])) {
    buy($carts);
    header('Location: success.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="../resources/css/payment.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <title>Cart</title>
</head>

<body>
  <div class="navbar">
    <img src="../resources/assets/logo.png" class="logo">
    <nav>
      <ul id="menuList">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../aboutus.php">About Us</a></li>
        <li><a href="../catalog.php">Catalog</a></li>
        <?php
        if (isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='admin/products/'>Dashboard</a></li>";
        } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='auth.php'>Login</a></li>";
        }
        if (isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='../payment/'>Cart</a></li>";
          echo "<li><a href='../riwayat.php'>History</a></li>";
          echo "<li><a href='../profile.php'>Profile</a></li>";
          echo "<li><a href='../logout.php'>Logout</a></li>";
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
    <main>
      <h1>Cart</h1>
      <div class="basket">
        <div class="basket-labels">
          <ul>
            <li class="item item-heading">Barang</li>
            <li class="price">Harga</li>
            <li class="quantity">Kuantitas</li>
            <li class="subtotal">Subtotal</li>
          </ul>
        </div>
        <?php foreach ($carts as $cart) : ?>
          <div class="basket-product">
            <div class="item">
              <div class="product-image">
                <img src="../resources/img/<?= $cart['photo'] ?>" alt="Placholder Image 2" class="product-frame">
              </div>
              <div class="product-details">
                <h2>
                  <span class="item-quantity">
                    <?= $cart['quantity'] ?>
                  </span> <?= $cart['name'] ?>
                </h2>
              </div>
            </div>
            <div class="price"><?= $cart['price'] ?></div>
            <div class="quantity">
              <form action="update_quantity.php" method="post" class="quantity-form">
                <input type="hidden" name="id" value="<?=$cart['id'] ?>">
                <input type="number" name="quantity" value="<?= abs($cart['quantity']) ?>" min="1" class="quantity-field">
              </form>
            </div>
            <div class="subtotal"><?= $cart['price'] * $cart['quantity'] ?></div>
            <input type="hidden" name="id" value="<?= $cart['id'] ?>">
            <div class="remove">
              <a href="delete.php?id=<?= $cart["id"] ?>" onclick="return confirm('Apakah anda ingin menghapus barang ini dari keranjang?')">
                <button>Remove</button>
              </a>
            </div>
          </div>
        <?php endforeach ?>
      </div>

      <form action="" method="post">
        <aside>
          <div class="summary">
            <div class="summary-total-items"> <?= $total_item_cart ?> Item(s) in Cart</div>
            <div class="summary-subtotal">
              <div class="subtotal-title">Subtotal</div>
              <div class="subtotal-value final-value" id="basket-subtotal"><?= $total_price_cart ?></div>
            </div>
            <div class="summary-total">
              <div class="total-title">Total</div>
              <div class="total-value final-value" id="basket-total"><?= $total_price_cart ?></div>
              <input class="total-value final-value" id="basket-total-hidden" type="hidden" name="totalPrice">
            </div>
            <div class="summary-checkout">
              <button type="submit" class="checkout-cta" name="btnCheckout">Checkout</button>
            </div>
          </div>
        </aside>
      </form>
    </main>
  </div>
  <script src="../resources/js/payment.js"></script>
</body>

</html>