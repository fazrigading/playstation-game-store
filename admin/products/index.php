<?php
    session_start();
    require '../../config.php';
    if ( !isset($_SESSION["loginAdmin"])){
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Dashboard</title>
  <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
</head>
<body>
  <h1>INI PAGE PRODUCTS</h1>
  <div>
    <a href="../../logout.php" role="button">Logout</a>
  </div>
  <div>
    <a href="../users" role="button">Users</a>
  </div>
  <div>
  <a href="../dashboard.php" role="button">Dashboard</a>
  </div>
  <h1>Products</h1>
  <div>
    <a href="create.php" role="button">Add product</a>
  </div>
  <table border="1">
    <tr>
      <th>No</th>
      <th>Photo</th>
      <th>Name</th>
      <th>Price</th>
      <th>Stock</th>
      <th>Description</th>
      <th>Category</th>
      <th>Action</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
      <td><?= $i ?></td>
      <td><img src="../../resources/img/<?= $product["photo"]?>" alt="" width="100px"></td>
      <td><?= $product['name'] ?></td>
      <td>Rp.<?= number_format($product['price'],2, ',', '.') ?></td>
      <td><?= $product['stock'] ?></td>
      <td><?= substr($product['descriptions'], 0, 100) ?> ...</td>
      <td><?= $product['category'] ?></td>
      <td>
        <a href="update.php?id=<?= $product["id"]?>">
          <i>Update</i>
        </a>|
        <a href="delete.php?id=<?= $product["id"]?>" 
          onclick = "return confirm('Apakah anda ingin menghapus File?')">
          <i>Delete</i>
        </a>
      </td>
    </tr>
    <?php $i++;?>
    <?php endforeach; ?>
  </table>
</body>
</html>