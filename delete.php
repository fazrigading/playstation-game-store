<?php
  require 'config.php';
  session_start();
  if ( !isset($_SESSION['login'])){
    header('Location: login.php');
    exit;
  } 

  $id = $_GET["id"];
  if (delete($id) > 0):
    echo "<script> alert('Deleted data succesfully.');
          document.location.href = 'dashboard.php';
          </script>";
  else:
    echo "<script> alert('Delete data failed.');
          document.location.href = 'dashboard.php';
          </script>";
  endif;
?>