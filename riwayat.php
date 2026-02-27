<?php
session_start();
require 'config.php';
cookieCheck();
if (!isset($_SESSION["loginUser"])) {
  header('Location: index.php');
  exit;
}
$query = "SELECT history.*, products.name FROM history LEFT JOIN products ON history.id_product = products.id";
$histories = query($query);
// var_dump($histories);
// exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="resources/css/riwayat.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
  <title>History</title>
</head>

<body>
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
            <input type="checkbox" class="checkbox" id="modegelap">
            <span class="check"></span>
          </label>
        </li>
      </ul>
    </nav>
  </div>

  <div class="container-fluid">
    <section>
      <h5>History</h5>
        <table id="dtBasicExample" class="table table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($histories as $history) : ?>
              <tr>
                <td>HISTORY_<?= $history['id'] ?></td>
                <td><?= mb_strimwidth($history['name'], 0, 30, "...") ?></td>
                <td><?= $history['date'] ?></td>
                <td>Rp.<?= number_format($history['total_price'], 2, ',', '.') ?></td>
                <td><?= $history['status'] ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    </section>
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

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="resources/js/table.js"></script>

</body>

</html>