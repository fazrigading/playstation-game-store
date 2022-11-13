<?php
  session_start();
  require '../../config.php';
  if (!isset($_SESSION["loginAdmin"])) {
    header('Location: auth.php');
    exit;
  }
  $id = $_GET["id"];
  $user = query("SELECT * FROM users WHERE id = $id")[0];
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
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <title>Update Profile</title>
  <link rel="stylesheet" href="../../resources/css/userpanel.css?v=<?php echo time(); ?>">
</head>

<body>
  <div class="container-half">
    <div class="edit">
      <form method="POST" enctype="multipart/form-data">
          <fieldset>
            <legend>Masukkan Data</legend>
              <input type="hidden" name="samePhoto" value="<?= $user["photo"] ?>"><br>
              <input type="hidden" name="id" value="<?= $user['id'] ?>">
              <img src="../../resources/img/<?= $user["photo"] ?>" alt="Your photo" width="100">
              <input type="file" name="photo" placeholder="Add Picture...">
              <label for="fullname">Fullname</label>
              <input type="text" id="fullname" name="fullname" placeholder="Fullname" value="<?= $user["fullname"] ?>">

              <label for="username">Username</label>
              <input type="text" id="username" name="user" placeholder="Username" value="<?= $user["username"] ?>">
              
              <label for="password">Password baru: (Abaikan jika tidak mengganti password)</label>
              <input type="password" id="password" name="newPass" placeholder="Password">

              <label for="cNewPass">Konfirmasi Password baru: (Abaikan jika tidak mengganti password)</label>
              <input type="password" id="cNewPass" name="confirmNewPass" placeholder="Password">
              <input type="hidden" name="oldPass", value="<?= $user['password'] ?>">
              
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Email" value="<?= $user["email"] ?>">
              
              <label for="address">Address</label>
              <textarea rows="4"  id="address" name="address" placeholder="Address"><?= $user["address"] ?></textarea>
          </fieldset>
          <button type="submit" name="submitupdate" class="button-submit">Submit</button>
      </form>
    </div>
  <script src="../../resources//js/login.js"></script>
</body>
</html>