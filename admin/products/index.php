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
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resources/css/productpanel.css?v=<?php echo time(); ?>">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
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

    <!-- Page content -->
    <div class="content">
        <section>
            <!--for demo wrap-->
            <div class="warp">
                <h1>tabel product</h1>
                <div>
                  <a href="create.php" role="button"><button class="button-add">Tambah</button></a>
                </div>
            </div>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th colspan="2">Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th colspan="2">Deskripsi</th>
                            <th>Kategori</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><img src="../../resources/img/<?= $product["photo"]?>" alt="" width="100px"></td>
                            <td colspan="2"><?= $product['name'] ?></td>
                            <td>Rp.<?= number_format($product['price'],2, ',', '.') ?></td>
                            <td><?= $product['stock'] ?></td>
                            <td colspan="2"><?= substr($product['descriptions'], 0, 100) ?> ...</td>
                            <td><?= $product['category'] ?></td>
                            <td colspan="2">
                                <a href="update.php?id=<?= $product["id"]?>">
                                <button class="button-update">Ubah</button>
                                </a>
                                <a href="delete.php?id=<?= $product["id"]?>" 
                                onclick = "return confirm('Apakah anda ingin menghapus File?')">
                                <button class="button-delete">Hapus</button>
                                </a>
                            </td>
                        </tr>
                        <?php $i++;?>
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
    <script src="resources/js/adminpanel.js"></script>

</body>



</html>