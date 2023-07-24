<?php
  include "connection.php";
  $id = $_GET['id'];
  $query = "DELETE FROM `user_game` WHERE id='$id'";
  $data = mysqli_query($conn,$query);
  if ($data) {
    echo "<script> alert('Game Is Deleted') </script>";
    echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
    exit;
  }
  else {
    echo "<script> alert('Game Can't Deleted') </script>";
    echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
    exit;
  }
?>
