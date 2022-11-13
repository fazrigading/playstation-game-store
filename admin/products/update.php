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
  <link rel="stylesheet" href="../../resources/css/userpanel.css?v=<?php echo time(); ?>">
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
              <img src="../../resources/img/<?= $product["photo"] ?>" alt="Your photo" width="100">
              <input type="file" name="photo" placeholder="Add Picture...">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" placeholder="Name" value="<?= $product['name'] ?>">

              <label for="price">Price</label>
              <input type="text" id="price" name="user" placeholder="Price" value="<?= $product['price'] ?>">

              <label for="category">Category</label>
              <input type="text" id="category" name="category" placeholder="Category" value="<?= $product['category'] ?>">
              
              <label for="stock">Stock</label>
              <input type="number" id="stock" name="stock" placeholder="Stock" value="<?= $product["stock"] ?>">
              
              <label for="descriptions">Descriptions</label>
              <textarea rows="4"  id="descriptions" name="descriptions" placeholder="Descriptions"><?= $product['descriptions'] ?></textarea>
          </fieldset>
          <button type="submit" name="submitupdate" class="button-submit">Submit</button>
      </form>
    </div>
  <script src="../../resources//js/login.js"></script>
</body>
</html>