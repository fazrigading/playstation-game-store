<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/productpanel.css?v=<?php echo time(); ?>">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title>Document</title>
</head>

<body>
    <div class="sidebar">
        <a class='main'>
            <h2>Panel Admin</h2>
        </a>
        <a >User Panel</a>
        <a class="active" href="#news">Product Panel</a>
    </div>

    <!-- Page content -->
    <div class="content">
        <section>
            <!--for demo wrap-->
            <div class="warp">
                <h1>tabel product</h1>
                <button class="button-add">Tambah</button>

            </div>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="resources/assets/PS5SIDE3.jpg" alt="Avatar" class="avatar"></td>
                            <td>PS 5</td>
                            <td>Rp. 5.000.000</td>
                            <td>3</td>
                            <td>Anjas Gurinjay Terkinjai kinjai</td>
                            <td>Console</td>
                            <td>
                              <button class="button-update">Ubah</button>
                              <button class="button-delete">Hapus</button>
                            </td>
                        </tr>
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