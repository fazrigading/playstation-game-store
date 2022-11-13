<?php
    session_start();
    require 'config.php';
    cookieCheck();
    if (!isset($_SESSION["loginUser"])){
        header('Location: index.php');
        exit;
    } 
    $query = "SELECT * FROM history  WHERE id_user = $_COOKIE[id]";
    $histories = query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/riwayat.css?v=<?php echo time(); ?>">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <img src="./resources/assets/logo.png" class="logo">
            <nav>
                <ul id="menuList">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="catalog.php">Catalog</a></li>
                    <?php 
                    if(isset($_SESSION["loginAdmin"])){
                        echo "<li><a href='admin/products/'>Dashboard</a></li>";
                    } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])){
                        echo "<li><a href='auth.php'>Login</a></li>";
                    }
                    if(isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])){
                        echo "<li><a href='payment/'>Cart</a></li>";
                        echo "<li><a href='riwayat.php'>Riwayat</a></li>";
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

        <section>
            <!--for demo wrap-->
            <h1>RIWAYAT PEMESANAN</h1>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Tanggal</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <?php foreach($histories as $history):?>
                            <tr>
                                <td><?= $history['id'] ?></td>
                                <td><?= $history['product_name'] ?></td>
                                <td><?= $history['date'] ?></td>
                                <td><?= $history['total_price'] ?></td>
                                <td><?= $history['status'] ?></td>
                                <td>Playstation 5 </td>
                                <td>1</td>
                                <td>Rp. 5.000.000</td>
                                <td>12-01-2022</td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </section>

        <script src="resources/js/payment.js"></script>

</body>



</html>