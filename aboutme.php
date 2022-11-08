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
            <img src="assets/logo.png" class="logo">
            <h1>Playstation Game Store</h1>
            <nav>
                <ul id="menuList">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutme.php">About Me</a></li>
                    <li><a href="">Console</a></li>
                    <li><a href="">Accessories</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li>
                        <label>
                            <input type="checkbox" class="checkbox" id="modegelap2">
                            <span class="check"></span>
                        </label>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-1">
                <h2>Fazri Gading</h2>
                <h3>A Machine Learning Developer</h3>
                <p>Informatics 2020 - Universitas Mulawarman</p>
                <h4>"Jika orang lain bisa, mengapa saya tidak?"</h4>
                <a href="https://linktr.ee/fazrigading/">
                    <button type="button">Follow Me<img src="assets/arrow.png"></button>
                </a>
            </div>
            <div class="col-3">
                <img src="assets/gading.jpg" class="gambar">
            </div>
        </div>
        <div class="social-links">
            <a href="https://www.facebook.com/fazrigading">
                <img src="assets/fb.png">
            </a>
            <a href="https://twitter.com/fazrigading">
                <img src="assets/tw.png">
            </a>
            <a href="https://instagram.com/fazrigading">
                <img src="assets/ig.png">
            </a>
        </div>
    </div>

    <footer>
        <div class="footer-logo">Copyright © Fazri Gading 2022</div>
        <div class="footer-list">
        <ul>
            <li>2009106031</li>
            <li>Informatika A 20</li>
            <li>A Machine Learning Developer</li>
        </ul>
        </div>
    </footer>
    <script src="script-aboutme.js"></script>
</body>
</html>