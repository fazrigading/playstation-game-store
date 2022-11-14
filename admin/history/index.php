<?php
    session_start();
    require '../../config.php';
    if ( !isset($_SESSION["loginAdmin"])){
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
    <link rel="stylesheet" href="../../resources/css/userpanel.css?v=<?php echo time(); ?>">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
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
                <h1>tabel user</h1>
            </div>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th colspan="2">Nama Pembeli</th>
                            <th colspan="3">Nama Produk</th>
                            <th colspan="2">Tanggal</th>
                            <th colspan="2">Total Harga</th>
                            <th colspan="1">Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <?php foreach ($histories as $history): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td colspan="2"><?= $history['fullname'] ?></td>     
                                <td colspan="3"><?= substr($history['product_name'], 0, 50) ?></td>
                                <td colspan="3"><?= $history['date'] ?></td>
                                <td colspan="2"><?= $history['total_price'] ?></td>
                                <td colspan="1"><?= $history['status'] ?></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <script src="../../resources/js/adminpanel.js"></script>

</body>



</html>