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
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Update Profile</title>
  <link rel="stylesheet" href="../../resources/css/userpanel.css">
</head>

<body>
  <div class="container-half">
    <div class="edit">
      <form method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>Edit Profile</legend>
          <input type="hidden" name="samePhoto" value="<?= $user["photo"] ?>"><br>
          <input type="hidden" name="id" value="<?= $user['id'] ?>">
          <img src="resources/img/<?= $user["photo"] ?>" alt="Your photo" width="100">
          <input type="file" class="form-control mb-3" placeholder="Add Picture...">


          <label class="form-label" for="fullname">Fullname</label>
          <input type="text" class="form-control" id="fullname" name="fullname" placeholder="<?= $user["fullname"] ?>"
            value="">

          <label class="form-label" for="username">Username</label>
          <input type="text" class="form-control" id="username" name="user" placeholder="<?= $user["username"] ?>"
            value="">

          <label class="form-label" for="username">Password baru: (Abaikan jika tidak mengganti password)</label>
          <input type="password" class="form-control" id="password" name="newPass"
            placeholder="Password                                       `">

          <label class="form-label" for="cNewPass">Konfirmasi Password baru: (Abaikan jika tidak mengganti
            password)</label>
          <input type="password" class="form-control" id="cNewPass" name="confirmNewPass" placeholder="Password">
          <input type="hidden" class="form-control" name="oldPass" , value="<?= $user['password'] ?>">

          <label class="form-label" for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="<?= $user["email"] ?>" value="">

          <label class="form-label" for="address">Address</label><br>
          <textarea class="form-control" rows="4" id="address" name="address" placeholder="Address"><?= $user["address"] ?></textarea>
        </fieldset>
        <button input type="submit" class="btn btn-primary mt-3" name="submitupdate">Submit</button>
      </form>
    </div>
    <script src="../../resources//js/login.js"></script>
</body>

</html>