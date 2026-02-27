<?php
  session_start();
  if (!isset($_SESSION["loginAdmin"])) {
    header('Location: auth.php');
    exit;
  }
  require '../../config.php';
  $id = $_GET["id"];
  $product = query("SELECT * FROM products WHERE id = $id")[0];
  if (isset($_POST["submitupdate"])) {
    if (updateProduct($_POST) > 0) echo "<script> alert('Data updated succesfully.'); document.location.href = 'index.php'; </script>";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="../../resources/css/userpanel.css">
</head>

<body>
  <div class="container-half">
    <div class="edit">
      <form method="POST" enctype="multipart/form-data">
          <fieldset>
            <legend>Masukkan Data</legend>
              <input type="hidden" name="id" value="<?= $product['id'] ?>">
              <input type="hidden" name="samePhoto" value="<?= $product["photo"] ?>"><br>
              <input type="hidden" name="id" value="<?= $product['id'] ?>">
              <img src="../../resources/img/<?= $product["photo"] ?>" alt="Your photo" width="100"><br>
              <input type="file" class="form-control mt-2" name="photo" placeholder="Add Picture..."><br>
              
              <label class="form-label" for="name">Nama</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="<?= $product['name'] ?>" value="">

              <label class="form-label" for="price">Price</label>
              <input type="number" class="form-control" id="price" name="price" placeholder="<?= $product['price'] ?>" value="">

              <label class="form-label" for="category">Category</label>
              <select class="form-select" required>
                    <option value="">Games</option>
                    <option value="">Console</option>
                    <option value="">Accessories</option>
              </select>

              <!-- <label class="form-label" for="category">Category</label>
              <input type="text" class="form-control" id="category" name="category" placeholder="<?= $product['category'] ?>" value=""> -->
              
              <label class="form-label" for="stock">Stock</label>
              <input type="number" class="form-control" id="stock" name="stock" placeholder="<?= $product["stock"] ?>" value="">
              
              <label class="form-label" for="descriptions">Descriptions</label>
              <textarea rows="4"  class="form-control" id="descriptions" name="descriptions" placeholder="<?= $product['descriptions'] ?>"></textarea>
          </fieldset>
          <button type="submit" name="submitupdate" class="button-submit">Submit</button>
      </form>
    </div>
  <script src="../../resources//js/login.js"></script>
</body>
</html>