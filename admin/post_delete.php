<?php
  include "../connection.php";
  $id = $_GET['id'];
  $query = "DELETE FROM `posts` WHERE post_date='$id'";
  $data = mysqli_query($conn,$query);
  if ($data) {
    echo "<script> alert('Post Is Remove Successfully..') </script>";
    echo "<script type='text/javascript'> document.location = 'post_list.php'; </script>";
    exit;
  }
  else {
    echo "<script> alert('Post Can't Deleted') </script>";
    echo "<script type='text/javascript'> document.location = 'post_list.php'; </script>";
    exit;
  }
?>
