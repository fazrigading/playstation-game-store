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
  <link rel="stylesheet" href="../../resources/css/productpanel.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <title>Products</title>
</head>

<body>
  <div class="sidebar">
    <a class='main'>
      <h2>Panel Admin</h2>
    </a>
    <a href="../../index.php">Home</a>
    <a href="../users/">User Panel</a>
    <a class="active" href="#">Product Panel</a>
    <a href="../history/">History Panel</a>
    <a href="../../logout.php">Logout</a>
  </div>

  <div class="content">
    <section>
      <div class="warp">
        <h1>Products Table</h1>
        <div>
          <a href="create.php" role="button"><button class="button-add">Tambah</button></a>
        </div>
      </div>
      <div class="container-fluid">
      <table id="dtBasicExample" class="table table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th scope="col">Id</th>
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
                <td><?= $i ?></td>
                <td><img src="../../resources/img/<?= $product["photo"] ?>" alt="" width="100px"></td>
                <td ><?= $product['name'] ?></td>
                <td>Rp.<?= number_format($product['price'], 2, ',', '.') ?></td>
                <td><?= $product['stock'] ?></td>
                <td ><?= substr($product['descriptions'], 0, 100) ?> ...</td>
                <td><?= $product['category'] ?></td>
                <td >
                  <a href="update.php?id=<?= $product["id"] ?>">
                    <button class="button-update">Ubah</button>
                  </a>
                  <a href="delete.php?id=<?= $product["id"] ?>" onclick="return confirm('Apakah anda ingin menghapus File?')">
                    <button class="button-delete">Hapus</button>
                  </a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    
      <div class="edit">
        <form>
          <fieldset>
            <legend>Masukkan Data</legend>
            <label for="name">Nama Produk: </label>
            <input type="text" id="productName" name="product_name">

            <label for="harga">Harga: </label>
            <input type="text" id="harga" name="product_price">

            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="product_stok">

            <label for="Deskripsi">Deskripsi:</label>
            <input type="text" id="deskripsi" name="product_deskripsi">

            <label for="Kategori">Kategori:</label>
            <input type="text" id="kategori" name="product_kategori">

            <label for="filename">Photo:</label>
            <input type="file" id="myFile" name="filename">
          </fieldset>
          <button type="submit" class="button-submit">Submit</button>
        </form>
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