<?php
session_start();
require '../../config.php';
if (!isset($_SESSION["loginAdmin"])) {
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
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../resources/css/userpanel.css?v=<?php echo time(); ?>">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <title>User Panel</title>
</head>

<body>
  <div class="sidebar">
    <a class='main'>
      <h2>Panel Admin</h2>
    </a>
    <a href="../../index.php">Home</a>
    <a class="active" href="#">User Panel</a>
    <a href="../products/">Product Panel</a>
    <a href="../history/">History Panel</a>
    <a href="../../logout.php">Logout</a>
  </div>

  <!-- Page content -->
  <div class="content">
    <section>
      <!--for demo wrap-->
      <div class="warp">
        <h1>Users Table</h1>
      </div>
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Photo</th>
              <th colspan="3">Nama Lengkap</th>
              <th colspan="2">Username</th>
              <th colspan="2">Email</th>
              <th colspan="3">Alamat</th>
              <th colspan="2">Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
          <tbody>
            <?php foreach ($users as $user) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><img src="../../resources/img/<?= $user['photo'] ?>" alt="Avatar" class="avatar"></td>
                <td colspan="3"><?= $user['fullname'] ?></td>
                <td colspan="2"><?= $user['username'] ?></td>
                <td colspan="2"><?= $user['email'] ?></td>
                <td colspan="3"><?= $user['address'] ?></td>
                <td colspan="2">
                  <a href="update.php?id=<?= $user["id"] ?>" class="text-black fs-15px">
                    <button class="button-update">Ubah</button>
                  </a>
                  <a href="delete.php?id=<?= $user["id"] ?>" onclick="return confirm('Apakah anda ingin menghapus File?')" class="text-black fs-15px">
                    <button class="button-delete">Hapus</button>
                  </a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </section>
  </div>
  <script src="../../resources/js/adminpanel.js"></script>

</body>



</html>