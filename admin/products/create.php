<?php
  session_start();
  require '../../config.php';
  if (!isset($_SESSION["loginAdmin"])) {
    header('Location: auth.php');
    exit;
  }
  if (isset($_POST["submitCreate"])) {
    if (addProduct($_POST) > 0) echo "<script> alert('Data uploaded succesfully.'); document.location.href = 'index.php'; </script>";
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
  <title>Tambah Produk</title>
  <link rel="stylesheet" href="../../resources/css/userpanel.css">
</head>

<body>
  <div class="container-half">
    <div class="edit">
      <form method="POST" enctype="multipart/form-data">
          <fieldset>
            <legend>Tambah Produk</legend>

            <label class="form-label" for="photo">Foto</label>
            <input type="file" class="form-control" id="photo" name="photo" placeholder="Add Picture..."><br>

            <label class="form-label" for="fullname">Fullname</label>
            <input type="text"  class="form-control" id="fullname" name="name" placeholder="Name" required>

            <label class="form-label" for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Price" required>

            <label class="form-label" for="stock">Stock</label>
            <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" required>

            <label class="form-label" for="descriptions">Descriptions</label>
            <textarea type="text" class="form-control" id="descriptions" name="descriptions" placeholder="Descriptions" required></textarea>

            <!-- <label class="form-label mt-3" for="category">Category</label>
            <input type="text" class="form-control" id="category" name="category" placeholder="Category" required> -->
          
            <label class="form-label" for="category">Category</label>
              <select class="form-select" required>
                    <option value="">Games</option>
                    <option value="">Console</option>
                    <option value="">Accessories</option>
              </select>
          </fieldset>
          <button type="submit" name="submitCreate" class="btn btn-primary">Submit</button>
      </form>
    </div>
  <script src="../../resources//js/login.js"></script>
</body>
</html>