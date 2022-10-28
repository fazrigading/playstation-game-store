<?php
    session_start();
    if ( !isset($_SESSION["login"])){
      header('Location: login.php');
      exit;
    } 
    require 'functions.php';
    
    $users = query("SELECT * FROM users");
    $histories = query("SELECT * FROM histories");
    $i = 1;
    $j = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="svg/icon.svg">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <title>Dashboard</title>
</head>
<body class="pb-25px">
  <div class="pt-25px">
    <a href="logout.php" class="button-mode my-btn-dark fs-2" role="button"> Logout</a>
  </div>
  <h3 class="text-center fs-3 pb-25px" >User</h3>
  <table class="my-table m-auto">
    <tr class="theader text-white">
      <th class="padding-head">No</th>
      <th class="padding-head">ID</th>
      <th class="padding-head">Photo</th>
      <th class="padding-head">Name</th>
      <th class="padding-head">Username</th>
      <th class="padding-head">Password</th>
      <th class="padding-head">Action</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
      <td class="border-1 padding-body"><?= $i ?></td>
      <td class="padding-body"><?= $user['id'] ?></td>
      <td class="padding-body"><img src="img/<?= $user["photo"]?>" alt="" width="50px"></td>
      <td class="padding-body"><?= $user['name'] ?></td>
      <td class="padding-body"><?= $user['username'] ?></td>
      <td class="padding-body"><?= $user['password'] ?></td>
      <td class="padding-body"><a href="update.php?id=<?= $user["id"]?>"><i class='bx bxs-pencil fs-4 text-success'></i></a> |  <a href="delete.php?id=<?= $user["id"]?>" onclick = "return confirm('Apakah anda ingin menghapus File?')"><i class='bx bxs-trash fs-4 text-success'></i></a></td>
    </tr>
    <?php $i++;?>
    <?php endforeach; ?>
  </table>
  
  <h3 class="text-center fs-3 mt-100px pb-25px" >History Pelanggan</h3>
  <table class="my-table m-auto">
    <tr class="theader text-white">
      <th class="padding-head">ID</th>
      <th class="padding-head">ID User</th>
      <th class="padding-head">Date</th>
    </tr>
    <?php foreach ($histories as $history): ?>
    <tr>
      <td class="padding-body"><?= $history['id'] ?></td>
      <td class="padding-body"><?= $history['id_user'] ?></td>
      <td class="padding-body"><?= $history['date'] ?></td>
    </tr>
    <?php $j++;?>
    <?php endforeach; ?>
  </table>
</body>
</html>