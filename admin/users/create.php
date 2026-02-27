<?php
  session_start();
  require '../../config.php';
  if (!isset($_SESSION["loginAdmin"])) {
    header('Location: auth.php');
    exit;
  }
  if (isset($_POST["submitCreate"])) {
    if (register($_POST) > 0) echo "<script> alert('Data updated succesfully.'); document.location.href = 'index.php'; </script>";
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
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <title>Tambah User</title>
  <link rel="stylesheet" href="../../resources/css/userpanel.css">
</head>

<body>
  <div class="container-half">
    <div class="edit">
      <form method="POST">
          <fieldset>
            <legend>Tambah User</legend>
              <input type="file" name="photo" placeholder="Add Picture...">
              <label for="fullname">Fullname</label>
              <input type="text" id="fullname" name="fullname" placeholder="Fullname">

              <label for="username">Username</label>
              <input type="text" id="username" name="username" placeholder="Username">
              
              <label for="password">Password  </label>
              <input type="password" id="password" name="pass" placeholder="Password">
              
              <label for="cpass">Konfirmasi Password  </label>
              <input type="password" id="password" name="cpass" placeholder="Password">
              
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Email">
              
              <label for="address">Address</label>
              <textarea rows="4"  id="address" name="address" placeholder="Address"></textarea>
          </fieldset>
          <button type="submit" name="submitCreate" class="button-submit">Submit</button>
      </form>
    </div>
  <script src="../../resources//js/login.js"></script>
</body>
</html>