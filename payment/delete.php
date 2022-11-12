<?php
  require '../config.php';
  session_start();
  if ( !isset($_SESSION['loginUser'])){
    header('Location: auth.php');
    exit;
  } 

  $id = $_GET["id"];
  if (deleteFromCart($id) > 0):
    echo "<script>
          document.location.href = 'index.php';
          </script>";
  else:
    echo "<script> alert('Delete data failed.');
          document.location.href = 'index.php';
          </script>";
  endif;
?>