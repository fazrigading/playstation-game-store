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
  <link rel="stylesheet" href="../../resources/css/userpanel.css">
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <title>User Panel</title>
</head>

<body>
  <div class="row">
    <div class="col-md-2">
      <div class="sidebar">
        <a class='main'><h5>Panel Admin</h5></a>
        <a href="../../index.php">Home</a>
        <a class="active" href="#">User Panel</a>
        <a href="../products/">Product Panel</a>
        <a href="../history/">History Panel</a>
        <a href="../../logout.php">Logout</a>
      </div>
    </div>
    <div class="col-md-10">
      <!-- Page content -->
      <div class="content pb-5">
          <section>
            <!--for demo wrap-->
            <div class="warp">
              <h5>Users Table</h5>
            </div>
            <div class="container-fluid">
              <table id="dtBasicExample" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $user) : ?>
                    <tr>
                      <td>USER_<?= $i++ ?></td>
                      <td>
                        <?php 
                          $photo = $user["photo"];
                          echo $photo ? 
                            "<img src='../../resources/img/$photo' width='50' alt='Avatar' class='avatar'>" :
                            '<img src="../../resources/assets/person-dummy.jpg" width="50" alt="Avatar" class="avatar">';
                        ?>
                      </td>
                      <td><?= $user['fullname'] ?></td>
                      <td><?= $user['username'] ?></td>
                      <td><?= $user['email'] ?></td>
                      <td><?= $user['address'] ?></td>
                      <td>
                        <a href="update.php?id=<?= $user["id"] ?>" class="text-black fs-15px">
                          <button class="btn btn-warning mb-1 btn-block btn-sm">Ubah</button>
                        </a>
                        <a href="delete.php?id=<?= $user["id"] ?>" onclick="return confirm('Apakah anda ingin menghapus File?')" class="text-black fs-15px">
                          <button class="btn btn-danger mb-1 btn-block btn-sm">Hapus</button>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
          </section>
        </div>
    </div>
  </div>
  
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="../../resources/js/jquery.dataTables.min.js"></script>
  <script src="../../resources/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#dtBasicExample').DataTable();
    });
  </script>


</body>



</html>