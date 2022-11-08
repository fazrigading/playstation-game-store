<?php
  session_start();
  if (!isset($_SESSION["loginAdmin"])) {
    header('Location: login.php');
    exit;
  }
  require 'config.php';
  $id = $_GET["id"];
  $user = query("SELECT * FROM users WHERE id = $id")[0];
  if (isset($_POST["submitupdate"])) {
    if (updateProduct($_POST) > 0) echo "<script> alert('Data updated succesfully.'); document.location.href = 'dashboard.php'; </script>";
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
  <title>Update Profile</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="container">
    <div class="forms">
      <div class="form login">
        <span class="title">Update Profile</span>
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="input-field-photo">
            <table>
              <td>
                <img src="img/<?= $user["photo"] ?>" alt="Your photo" width="100">
              </td>
              <td>
                <input type="file" name="photo" placeholder="Add Picture...">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">

                <input type="hidden" name="samePhoto" value="<?= $user["photo"] ?>"><br>
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
              </td>
            </table>
          </div>

          <div class="input-field">
            <input type="text" id="username" name="user" placeholder="Username" value="<?= $user['username'] ?>" required>
            <i class="uil uil-user"></i>
          </div>

          <div class="input-field">
            <input type="password" name="pass" class="password" placeholder="Your Password" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>

          <div class="input-field button">
            <input type="submit" name="submitupdate" value="Update Profile">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="login.js"></script>
  
</body>
</html>