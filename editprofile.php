<?php
session_start();
require 'config.php';

$id = $_COOKIE['id'];

$query = 'SELECT * FROM users WHERE id = ' . $id;
$user = query($query)[0];

if (isset($_POST["submitupdate"])) {
  if (updateUser($_POST) > 0) echo "<script> alert('Data updated succesfully.'); document.location.href = 'index.php'; </script>";
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
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="resources/css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="resources/css/userpanel.css?v=<?php echo time(); ?>">
  <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="navbar">
    <a href="index.php"><img src="./resources/assets/logo.png" class="logo"></a>
    <nav>
      <ul id="menuList">
        <li><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="catalog.php">Catalog</a></li>
        <?php
        if (isset($_SESSION["loginUser"])) {
          echo "<li><a href='payment/'>Cart</a></li>";
          echo "<li><a href='riwayat.php'>History</a></li>";
        } else if (isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='admin/products/'>Dashboard</a></li>";
        } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])) {
          echo "<li><a href='auth.php'>Login</a></li>";
        }
        if (isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])){
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

  <div class="container">
    <div class="container-half">
      <form method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>Edit Profile</legend>
          <input type="hidden" name="samePhoto" value="<?= $user["photo"] ?>"><br>
          <input type="hidden" name="id" value="<?= $user['id'] ?>">
          <img src="resources/img/<?= $user["photo"] ?>" alt="Your photo" width="100">
          <input type="file" name="photo" placeholder="Add Picture...">
          <label for="fullname">Fullname</label>
          <input type="text" id="fullname" name="fullname" placeholder="Fullname" value="<?= $user["fullname"] ?>">

          <label for="username">Username</label>
          <input type="text" id="username" name="user" placeholder="Username" value="<?= $user["username"] ?>">

          <label for="password">Password baru: (Abaikan jika tidak mengganti password)</label>
          <input type="password" id="password" name="newPass" placeholder="Password                                       `">

          <label for="cNewPass">Konfirmasi Password baru: (Abaikan jika tidak mengganti password)</label>
          <input type="password" id="cNewPass" name="confirmNewPass" placeholder="Password">
          <input type="hidden" name="oldPass" , value="<?= $user['password'] ?>">

          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Email" value="<?= $user["email"] ?>">

          <label for="address">Address</label>
          <textarea rows="4" id="address" name="address" placeholder="Address"><?= $user["address"] ?></textarea>
        </fieldset>
        <button type="submit" name="submitupdate" class="button-submit">Submit</button>
      </form>
    </div>
  </div>

  <footer>
    <div class="footer-content">
      <h2>Playstation Game Store</h2>
      <p>This website created by:</p>
      <p>Fazri Gading (2009106031), Alexander Januar (2009106035), dan Risky Kurniawan (2009106050).</p>
      <p>Click Github icon below to check our repository.</p>
      <ul class="socials">
        <li><a href="https://github.com/fazrigading/playstation-game-store/" target="_blank"><i class="fa fa-github"></i></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>Copyright &copy; 2022 Rigalex</p>
    </div>
  </footer>
  <script src="resources/js/index.js"></script>
</body>

</html>