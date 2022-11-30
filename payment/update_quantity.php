<?php
  session_start();
  require '../config.php';
  $id = $_POST["id"];
  $quantity = $_POST["quantity"];
  $query = "UPDATE cart SET quantity=$quantity WHERE id = $id";
  mysqli_query($db, $query);
  header('Location: index.php');
?>