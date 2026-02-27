<?php
session_start();
require '../../config.php';
if (!isset($_SESSION["loginAdmin"])) {
  header('Location: ../../auth.php');
  exit;
}
$products = query("SELECT * FROM products");
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <title>Products</title>
</head>

<body class="overflow-x-hidden">
  <div class="row">
    <div class="col-md-2">
      <div class="sidebar">
        <a class='main'><h5>Panel Admin</h5></a>
        <a href="../../index.php">Home</a>
        <a href="../users/">User Panel</a>
        <a class="active" href="../products/">Product Panel</a>
        <a href="../history/">History Panel</a>
        <a href="../../logout.php">Logout</a>
      </div>
    </div>
      <div class="col-md-10">
        <div class="content">
          <section class="pb-5">
            <div class="warp">
              <h5>Products Table</h5>
              <div>
                <a href="create.php" role="button"><button class="btn btn-success">Tambah</button></a>
              </div>
            </div>
            <div class="container-fluid">
            <table id="dtBasicExample" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($products as $product) : ?>
                    <tr>
                      <td>PRODUCT_<?= $i ?></td>
                      <td><img src="../../resources/img/<?= $product["photo"] ?>" alt="" width="100px"></td>
                      <td ><?= $product['name'] ?></td>
                      <td>Rp.<?= number_format($product['price'], 2, ',', '.') ?></td>
                      <td><?= $product['stock'] ?></td>
                      <td ><?= substr($product['descriptions'], 0, 100) ?> ...</td>
                      <td><?= $product['category'] ?></td>
                      <td >
                        <a href="update.php?id=<?= $product["id"] ?>">
                          <button class="btn btn-warning mb-1 btn-block btn-sm">Ubah</button>
                        </a>
                        <a href="delete.php?id=<?= $product["id"] ?>" onclick="return confirm('Apakah anda ingin menghapus File?')">
                          <button class="btn btn-danger btn-block btn-sm">Hapus</button>
                        </a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </section>
        </div>
      </div>
    </div>

  
  
  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="../../resources/js/jquery.dataTables.min.js"></script>
  <script src="../../resources/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#dtBasicExample').DataTable();
  });
  </script>
</body>
</html>