<?php
session_start();
require 'config.php';

$id = $_COOKIE['id'];

$query = 'SELECT * FROM users WHERE id = ' . $id;
$user = query($query)[0];

if (isset($_POST["submitupdate"])) {
  if (updateUser($_POST) > 0)
    echo "<script> alert('Data updated succesfully.'); document.location.href = 'index.php'; </script>";
  else {
    $feedback = "Data Gagal Diubah";
    echo mysqli_error($db);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Playstation Game Store</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="resources/css/style.css">
  <link rel="stylesheet" href="resources/css/userpanel.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container py-3">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a href="index.php"><img src="./resources/assets/logo.png" width="50" class="logo img-fluid me-5"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-2" id="navbarNav">
          <ul class="navbar-nav">
            <li class='nav-item'><a href="index.php">Home</a></li>
            <li class='nav-item'><a href="aboutus.php">About Us</a></li>
            <li class='nav-item'><a href="catalog.php">Catalog</a></li>
          </ul>
          <ul class="navbar-nav position-absolute end-0">
            <?php
              if (isset($_SESSION["loginUser"])) {
                echo "<li class='nav-item'><a href='payment/'>Cart</a></li>";
                echo "<li class='nav-item'><a href='riwayat.php'>History</a></li>";
                echo "<li class='nav-item'><a href='profile.php'>Profile</a></li>";
              } else if (isset($_SESSION["loginAdmin"])) {
                echo "<li class='nav-item'><a href='admin/products/'>Dashboard</a></li>";
              } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])) {
                echo "<li class='nav-item'><a href='auth.php'>Login</a></li>";
              }
              if (isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])) {
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

  <div class="container">
    <div class="container-half">
      <form method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>Edit Profile</legend>
          <input type="hidden" name="samePhoto" value="<?= $user["photo"] ?>"><br>
          <input type="hidden" name="id" value="<?= $user['id'] ?>">
          <img src="resources/img/<?= $user["photo"] ?>" alt="Your photo" width="100">
          <input type="file" class="form-control mb-3" placeholder="Add Picture...">
        

          <label class="form-label" for="fullname">Fullname</label>
          <input type="text" class="form-control" id="fullname" name="fullname" placeholder="<?= $user["fullname"] ?>" value="">

          <label class="form-label" for="username">Username</label>
          <input type="text" class="form-control" id="username" name="user" placeholder="<?= $user["username"] ?>" value="">

          <label class="form-label" for="username">Password baru: (Abaikan jika tidak mengganti password)</label>
          <input type="password" class="form-control" id="password" name="newPass" placeholder="Password                                       `">

          <label class="form-label" for="cNewPass">Konfirmasi Password baru: (Abaikan jika tidak mengganti password)</label>
          <input type="password" class="form-control" id="cNewPass" name="confirmNewPass" placeholder="Password">
          <input type="hidden" class="form-control" name="oldPass" , value="<?= $user['password'] ?>">

          <label class="form-label" for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="<?= $user["email"] ?>" value="">

          <label class="form-label" for="address">Address</label>
          <textarea rows="4" id="address" name="address" placeholder="Address"><?= $user["address"] ?></textarea>
        </fieldset>
        <button input type="submit" class="btn btn-primary mt-3" name="submitupdate">Submit</button>
      </form>
    </div>
  </div>

  <footer class="mt-5">
    <div class="text-center">
      <h2 class="fs-3 fw-bold text-white">Playstation Game Store</h2>
      <p class="text-white fw-light">
        This website created by:
        <span class="d-block">Fazri Gading (2009106031), Alexander Januar (2009106035), dan Risky Kurniawan
          (2009106050).</span>
        <span class="d-block">Click Github icon below to check our repository.</span>
      </p>
      <ul class="list-unstyled my-4 fs-2 m-auto">
        <li><a href="https://github.com/fazrigading/playstation-game-store/" target="_blank"><i
              class="fa fa-github text-white"></i></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>Copyright &copy; 2022 Galery</p>
    </div>
  </footer>
  <script src="resources/js/index.js"></script>
</body>

</html>