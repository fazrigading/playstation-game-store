+<?php
  session_start();
  if (!isset($_SESSION["loginAdmin"])) {
    header('Location: auth.php');
    exit;
  }
  require '../../config.php';

  if (isset($_POST["submitCreate"])) {
    if (addProduct($_POST) > 0) echo "<script> alert('Data created succesfully.'); document.location.href = 'index.php'; </script>";
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
  <link rel="stylesheet" href="../../resources/css/auth.css?v=<?php echo time(); ?>">
</head>

<body>
  <div class="container">
    <div class="forms-edit">
      <div class="form">
        <span class="title">Update Product</span>
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="input-field-photo">
            <table>
              <td>
                <input type="file" name="photo" placeholder="Add Picture...">
              </td>
            </table>
          </div>

          <div class="input-field">
            <input type="text" id="name" name="name" placeholder="Name" required>
            <!-- <i class="uil uil-user"></i> -->
          </div>

          <div class="input-field">
            <input type="text" id="price" name="price" placeholder="Price" required>
            <!-- <i class="uil uil-user"></i> -->
          </div>

          <div class="input-field">
            <input type="text" id="stock" name="stock" placeholder="Stock" required>
            <!-- <i class="uil uil-user"></i> -->
          </div>

          <div class="input-field">
            <textarea type="text" id="descriptions" name="descriptions" placeholder="Descriptions" required> </textarea>
            <!-- <i class="uil uil-user"></i> -->
          </div>

          <div class="input-field">
            <input type="text" id="category" name="category" placeholder="Category" required>
            <!-- <i class="uil uil-user"></i> -->
          </div>
          
          <div class="input-field button">
            <input type="submit" name="submitCreate" value="Add Product">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="login.js"></script>
  
</body>
</html>