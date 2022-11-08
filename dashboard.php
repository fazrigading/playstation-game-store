<?php
    session_start();
    require 'config.php';
    if ( !isset($_SESSION["login"])){
      header('Location: login.php');
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
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
  <div>
    <a href="logout.php" role="button"> Logout</a>
  </div>
  <h1>User</h1>
  <table border="1">
    <tr>
      <th>No</th>
      <th>ID</th>
      <th>Photo</th>
      <th>Username</th>
      <th>Password</th>
      <th>Action</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
      <td><?= $i ?></td>
      <td><?= $user['id'] ?></td>
      <td><img src="img/<?= $user["photo"]?>" alt="" width="256px"></td>
      <td><?= $user['username'] ?></td>
      <td><?= $user['password'] ?></td>
      <td>
        <a href="update.php?id=<?= $user["id"]?>">
          <i>Update</i>
        </a>|
        <a href="delete.php?id=<?= $user["id"]?>" 
          onclick = "return confirm('Apakah anda ingin menghapus File?')">
          <i>Delete</i>
        </a>
      </td>
    </tr>
    <?php $i++;?>
    <?php endforeach; ?>
  </table>
</body>
</html>