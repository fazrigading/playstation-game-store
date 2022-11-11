<?php
    session_start();
    require '../../config.php';
    if ( !isset($_SESSION["loginAdmin"])){
      header('Location: ../../auth.php');
      exit;
    } 
    $users = query("SELECT * FROM users");
    $i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="../../resources/css/style.css?v=<?php echo time(); ?>">
</head>
<body class="panel-container">
  <div>
    <a href="../../logout.php" role="button"> Logout</a>
  </div>
  <div>
    <a href="../products/" role="button"> Produk</a>
  </div>
  <div>
    <a href="../dashboard.php" role="button"> Dashboard</a>
  </div>
  <section>
  <h1>Users</h1>
  <div class="tbl-header">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <!-- <th>ID</th> -->
          <th>Photo</th>
          <th colspan="2">Name</th>
          <th colspan="2">Username</th>
          <th colspan="3">Password</th>
          <th colspan="2">Address</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table>
      <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= $i ?></td>
          <!-- <td> $user['id'] </td> -->
          <td><img src="../../resources/img/<?= $user["photo"]?>" alt="" width="50" class="rounded-circle"></td>
          <td colspan="2"><?= $user['name'] ?></td>
          <td colspan="2"><?= $user['username'] ?></td>
          <td colspan="3"><?= $user['password'] ?></td>
          <td colspan="2"><?= $user['address'] ?></td>
          <td>
            <a href="update.php?id=<?= $user["id"]?>" class="text-black fs-15px">
              <i>Update</i>
            </a>
            |
            <a href="delete.php?id=<?= $user["id"]?>" 
              onclick = "return confirm('Apakah anda ingin menghapus File?')" class="text-black fs-15px">
              <i>Delete</i>
            </a>
          </td>
        </tr>
        <?php $i++;?>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
<script>
  $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
  }).resize();
</script>
</body>
</html>