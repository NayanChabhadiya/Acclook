<?php
  include "../connection.php";
  $id = $_GET['id'];
  $query = "DELETE FROM `games` WHERE id='$id'";
  $data = mysqli_query($conn,$query);
  if ($data) {
    echo "<script> alert('Game Is Deleted') </script>";
    echo "<script type='text/javascript'> document.location = 'game_list.php'; </script>";
    exit;
  }
  else {
    echo "<script> alert('Game Can't Deleted') </script>";
    echo "<script type='text/javascript'> document.location = 'game_list.php'; </script>";
    exit;
  }
?>
