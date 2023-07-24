<?php
  include "../connection.php";
  $id = $_GET['id'];
  $query = "DELETE FROM `users` WHERE id='$id'";
  $data = mysqli_query($conn,$query);
  if ($data) {
    echo "<script> alert('User Is Remove Successfully..') </script>";
    echo "<script type='text/javascript'> document.location = 'user_list.php'; </script>";
    exit;
  }
  else {
    echo "<script> alert('User Can't Deleted') </script>";
    echo "<script type='text/javascript'> document.location = 'user_list.php'; </script>";
    exit;
  }
?>
