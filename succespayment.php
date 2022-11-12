<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/succespayment.css?v=<?php echo time(); ?>">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <img src="resources/assets/logo.png" class="logo">
            <h1>Playstation Game Store</h1>
            <nav>
                <ul id="menuList">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="catalog.php">Catalog</a></li>
                    <li><a href="catalog.php">Profile</a></li>
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
            <div class="modal-box">
                <i class="fa-regular fa-circle-check"></i>
                <h2>Pembayaran Berhasil!</h2>
                <h3>
                    Silahkan tunggu konfirmasi email dari kami dan
                    kami akan menginformasikan resi secepat mungkin!
                </h3>

                <div class="buttons">
                    <a href="index.php"><button class="close-btn">Beranda</button></a>
                    <button>Beli Lagi</button>
                </div>
            </div>
        </section>

        <script src="resources/js/payment.js"></script>

</body>



</html>