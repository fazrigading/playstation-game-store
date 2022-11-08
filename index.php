<?php 
    require 'config.php';
    $result = mysqli_query($db, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playstation Game Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <img src="images/logo.png" class="logo">
            <h1>Playstation Game Store</h1>
            <nav>
                <ul id="menuList">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutme.php">About Me</a></li>
                    <li><a href="">Console</a></li>
                    <li><a href="">Accessories</a></li>
                    <li><a href="login.php">Login</a></li>
                    <?php 
                        if (isset($_SESSION["login"])){
                            echo "<li><a href='logout.php'>Logout</a></li>";
                        };
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

        <div class="row">
            <div class="col-1">
                <h2>PS4 V2<br>Dualshock 4</h2>
                <h3>Stick PS Tanpa Kabel untuk Playstation 4</h3>
                <p>(Kompatibel/Original)</p>
                <h4>Rp500.000</h4>
                <button type="button" id="buynow">Beli Sekarang<img src="images/arrow.png"></button>
            </div>
            <div class="col-2">
                <img src="images/controller.png" class="controller">
                <div class="color-box"></div>
                <div class="add-btn" id="addCart">
                    <img src="images/add.png">
                    <p><small>Add to Cart</small></p>
                </div>
            </div>
        </div>
        <div class="social-links">
            <a href="https://www.facebook.com/fazrigading">
                <img src="images/fb.png">
            </a>
            <a href="https://twitter.com/fazrigading">
                <img src="images/tw.png">
            </a>
            <a href="https://instagram.com/fazrigading">
                <img src="images/ig.png">
            </a>
        </div>
    </div>

    <footer>
        <div class="footer-logo">Copyright © Fazri Gading 2022</div>
        <div class="footer-list">
        <ul>
            <li>2009106031</li>
            <li>Informatika A 20</li>
            <li>Machine Learning Developer</li>
        </ul>
        </div>
    </footer>
    <script src="script-index.js"></script>
</body>
</html>