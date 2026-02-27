<?php
session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Playstation Game Store</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="resources/css/style.css">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container fixed-top py-3">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a href="index.php"><img src="./resources/assets/logo.png" width="50" class="logo img-fluid me-5"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-2" id="navbarNav">
          <ul class="navbar-nav">
            <li class='nav-item'><a href="index.php">Home</a></li>
            <li class='nav-item'><a href="aboutus.php">About Us</a></li>
            <li class='nav-item'><a href="catalog.php">Catalog</a></li>
          </ul>
          <ul class="navbar-nav position-absolute end-0"><?php
            if (isset($_SESSION["loginUser"])) {
              echo "<li class='nav-item'><a href='payment/'>Cart</a></li>";
              echo "<li class='nav-item'><a href='riwayat.php'>History</a></li>";
              echo "<li class='nav-item'><a href='profile.php'>Profile</a></li>";
            } else if (isset($_SESSION["loginAdmin"])) {
              echo "<li class='nav-item'><a href='admin/products/'>Dashboard</a></li>";
            } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])) {
              echo "<li class='nav-item'><a href='auth.php'>Login</a></li>";
            }
            if (isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])){
              echo "<li class='nav-item'><a href='logout.php'>Logout</a></li>";
            }
            ?>
            <li class='nav-item'>
              <label>
                <input type="checkbox" class="checkbox" id="modegelap" title="Dark Mode">
                <span class="check"></span>
              </label>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <div class="small-container my-5 pt-5">
    <h5 class="fw-bold fs-5 text-center title-category mt-3">Our Team</h5>
    <div class="sub-container">
      <div class="row text-center">
        <div class="col-sm-12 col-md-4">
          <div class="teams">
            <img class="img-thumbnail" src="resources/assets/gading.jpg" alt="" height="100px">
            <div class="names mt-3"><h5 class="fs-4 fw-bold">Fazri Gading</h5></div>
            <div class="design"><small class="fw-bold fst-italic">Front-End</small></div>
            <div class="about py-3 p-3"><p class="lh-lg">Web System & Design Initiator. Interested in Computer Vision and C++. Apa bahasa Inggrisnya Ikan Sapu Sapu? Cleaning Share Fish.</p></div>

            <div class="social-links">
              <a class="me-1" href="https://www.linkedin.com/in/fazrigading/" target="_blank"><i class="fs-4 text-dark fa fa-linkedin"></i></a>
              <a class="me-1" href="https://www.instagram.com/fazrigading/" target="_blank"><i class="fs-4 text-dark fa fa-instagram"></i></a>
              <a class="me-1" href="https://twitter.com/fazrigading" target="_blank"><i class="fs-4 text-dark fa fa-twitter"></i></a>
              <a class="me-1" href="https://github.com/fazrigading" target="_blank"><i class="fs-4 text-dark fa fa-github"></i></a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4">
          <div class="teams">
            <img class="img-thumbnail" src="resources/assets/alex.jpg" alt="">
            <div class="names mt-3"><h5 class="fs-4 fw-bold">Alexander Januar</h5></div>
            <div class="design"><small class="fw-bold fst-italic">Front-End</small></div>
            <div class="about py-3 p-3"><p class="lh-lg">Web Design Contributor. Interested in Machine Learning and Python. Bubur, bubur apa yang paling gede? Bubur zoom zoom.</p></div>

            <div class="social-links">
              <a class="me-1" href="https://www.linkedin.com/in/alexander-januar-1a29a9219/" target="_blank"><i class="fs-4 text-dark fa fa-linkedin"></i></a>
              <a class="me-1" href="https://www.instagram.com/allx_jnr/" target="_blank"><i class="fs-4 text-dark fa fa-instagram"></i></a>
              <a class="me-1" href="https://twitter.com/Alex73337519" target="_blank"><i class="fs-4 text-dark fa fa-twitter"></i></a>
              <a class="me-1" href="https://github.com/alexanderjanuar" target="_blank"><i class="fs-4 text-dark fa fa-github"></i></a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4">
          <div class="teams">
            <img class="img-thumbnail"src="resources/assets/risky.jfif" alt="" height="100px">
            <div class="names mt-3"><h5 class="fs-4 fw-bold">Risky Kurniawan</h5></div>
            <div class="design"><small class="fw-bold fst-italic">Back-End</small></div>
            <div class="about py-3 p-3"><p class="lh-lg">Web System Contributor. Interested in Full-Stack Web, Cloud Computing, & Android. mgodonf itu asik dan menyenangkan</p></div>
            <div class="social-links">
              <a class="me-1" href="https://www.linkedin.com/in/riskykrnawan/" target="_blank"><i class="fs-4 text-dark fa fa-linkedin"></i></a>
              <a class="me-1" href="https://www.instagram.com/_riskykrnawan/" target="_blank"><i class="fs-4 text-dark fa fa-instagram"></i></a>
              <a class="me-1" href="https://twitter.com/riskykrnawan" target="_blank"><i class="fs-4 text-dark fa fa-twitter"></i></a>
              <a class="me-1" href="https://github.com/riskykrnawan" target="_blank"><i class="fs-4 text-dark fa fa-github"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="mt-5">
    <div class="text-center">
      <h2 class="fs-3 fw-bold text-white">Playstation Game Store</h2>
      <p class="text-white fw-light">
        This website created by:
        <span class="d-block">Fazri Gading (2009106031), Alexander Januar (2009106035), dan Risky Kurniawan (2009106050).</span>
        <span class="d-block">Click Github icon below to check our repository.</span>
      </p>
      <ul class="list-unstyled my-4 fs-2 m-auto">
        <li><a href="https://github.com/fazrigading/playstation-game-store/" target="_blank"><i class="fa fa-github text-white"></i></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>Copyright &copy; 2022 Galery</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="resources/js/index.js"></script>
</body>

</html>