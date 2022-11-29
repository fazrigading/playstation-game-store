<?php
session_start();
require '../../config.php';
if (!isset($_SESSION["loginAdmin"])) {
  header('Location: ../../auth.php');
  exit;
}
$histories = query("SELECT history.*, users.fullname FROM history LEFT JOIN users ON users.id = history.id_user ");
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../resources/css/userpanel.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <title>User Panel</title>
</head>

<body>
  <div class="sidebar">
    <a class='main'>
      <h2>Panel Admin</h2>
    </a>
    <a href="../../index.php">Home</a>
    <a href="../users/">User Panel</a>
    <a href="../products/">Product Panel</a>
    <a href class="active">History Panel</a>
    <a href="../../logout.php">Logout</a>
  </div>

  <!-- Page content -->
  <div class="content">
    <section>
      <!--for demo wrap-->
      <div class="warp">
        <h1>History Table</h1>
      </div>
      <div class="container-fluid">
      <table id="dtBasicExample" class="table table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Pembeli</th>
              <th>Nama Produk</th>
              <th>Tanggal</th>
              <th>Total Harga</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($histories as $history) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $history['fullname'] ?></td>
                <td><?= substr($history['product_name'], 0, 50) ?></td>
                <td><?= $history['date'] ?></td>
                <td><?= $history['total_price'] ?></td>
                <td><?= $history['status'] ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </section>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
    $('#dtBasicExample').DataTable();
  });
  </script>

</body>



</html>