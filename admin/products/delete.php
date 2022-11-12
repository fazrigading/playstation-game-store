<?php
  require '../../config.php';
  session_start();
  if ( !isset($_SESSION['loginAdmin'])){
    header('Location: auth.php');
    exit;
  } 

  $id = $_GET["id"];
  if (deleteProduct($id) > 0):
    echo "<script> alert('Deleted data succesfully.');
          document.location.href = 'index.php';
          </script>";
  else:
    echo "<script> alert('Delete data failed.');
          document.location.href = 'index.php';
          </script>";
  endif;
?>