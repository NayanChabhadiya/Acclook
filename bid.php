<?php
if (isset($_POST['bid'])) {
  echo "<script> alert('bid Button presed') </script>";

  // $amount = $_POST['amount'];
  //
  // if ($amount != "") {

    // $select_bid_query = mysqli_query($conn,"SELECT * FROM bids where amount='$amount' AND post_id='$post_id' AND user_id='$user_id'");
    // if(mysqli_num_rows($select_bid_query)>0)
    // {
    //   echo "<script> alert('bid amount IS Already Exists') </script>";
    //   echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
    //   exit;
    // }
    // else {

//       $bid_query = mysqli_query($conn, "INSERT INTO bids(post_id,user_id,user_name,amount,created_at) VALUES('$post_id','$user_id','$user_name','$amount',now())");
//       if ($bid_query) {
//
// 				echo "<script type='text/javascript'> alert('bid amount Added Successfully')</script>";
// 				echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
// 				exit();
// 			}
// 			else {
// 				echo "<script type='text/javascript'> alert('Failed To Add bid amount')</script>";
// 				echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
// 				exit();
// 			}
//     // }
//   }
//   else {
//     echo "<script type='text/javascript'> alert('Please Enter bid amount It Can Not Be Blank')</script>";
//     echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
//     exit();
//   }
}
else{
  echo "<script> alert('bid Button  not presed') </script>";
}
?>
