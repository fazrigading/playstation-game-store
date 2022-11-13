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
  <title>Tambah Produk</title>
  <link rel="stylesheet" href="../../resources/css/userpanel.css?v=<?php echo time(); ?>">
</head>

<body>
  <div class="container-half">
    <div class="edit">
      <form method="POST" enctype="multipart/form-data">
          <fieldset>
            <legend>Tambah Produk</legend>

            <label for="photo">Foto</label>
            <input type="file" id="photo" name="photo" placeholder="Add Picture...">

            <label for="fullname">Fullname</label>
            <input type="text" id="fullname" name="name" placeholder="Name" required>

            <label for="price">Price</label>
            <input type="number" id="price" name="price" placeholder="Price" required>

            <label for="stock">Stock</label>
            <input type="text" id="stock" name="stock" placeholder="Stock" required>

            <label for="descriptions">Descriptions</label>
            <textarea type="text" id="descriptions" name="descriptions" placeholder="Descriptions" required></textarea>

            <label for="category">Category</label>
            <input type="text" id="category" name="category" placeholder="Category" required>
          </fieldset>
          <button type="submit" name="submitCreate" class="button-submit">Submit</button>
      </form>
    </div>
  <script src="../../resources//js/login.js"></script>
</body>
</html>