<?php
session_start();
error_reporting(0);
include "connection.php";
$user_profile = $_SESSION['user_email'];
if($user_profile==true)
{

}
else
{
  header('location:login.php');
}
$query = "SELECT * FROM USERS WHERE email='$user_profile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$user_id = $result['id'];

if (isset($_POST['update_profile'])) {
  $name = $_POST['name'];
  $mobile_no = $_POST['mobile_no'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];
  $filename = $_FILES["profile_pic"]["name"];
  $tempname = $_FILES["profile_pic"]["tmp_name"];
  $folder = "admin/uploads/user_profiles/".$filename;
  move_uploaded_file($tempname,$folder);

  // $sql=mysqli_query($conn,"SELECT * FROM users where email='$email'");
  // if(mysqli_num_rows($sql)>0)
  // {
  //   echo "<script> alert('Email Id Already Exists') </script>";
  //   echo "<script type='text/javascript'> document.location = 'update_profile.php'; </script>";
  //   exit;
  // }
  // else{
    if($password != $c_password){
      echo "<script> alert('Password and Confirm Password dose not metch....') </script>";
    }
    else{
      $e_password = md5($password);// encrypt password
      $result = mysqli_query($conn,"UPDATE `users` SET `name`='$name',`mobile_no`='$mobile_no',`password`='$e_password',`profile_pic`='$folder',`updated_at`= now() WHERE id='$user_id'");
      // $result   = mysqli_query($conn, "INSERT INTO users(name,mobile_no,email,password,profile_pic,created_at,updated_at) VALUES('$name','$mobile_no','$email','$e_password','$folder',now(),now())");

      // check if user data inserted successfully.
      if ($result) {

        echo "<script type='text/javascript'> alert('Profile Updated Successfully')</script>";
        echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
        exit();
      }
      else {
        echo "<script type='text/javascript'> alert('Failed To Update Profile')</script>";
        echo "<script type='text/javascript'> document.location = 'update_profile.php'; </script>";
        exit();
      }
    }
  // }
}
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Update Profile</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
    <link href="css/create_post.css" rel="stylesheet">
	<link href="icons/font-awesome-old/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/upload_profile.css">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-lg-start">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Update Profile
                            </div>
                        </div>
						<div class=""></div>
							<div class="homebtn">
							    <a href="profile.php" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"> </i>&nbsp;Back</a>
						    </div>
					    </div>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">

                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <div class="upload-profile-image d-flex justify-content-center pb-5">
                                        <div class="text-center">
                                          <div class="d-flex justify-content-center">
                                            <img class="camera-icon" src="images/camera-solid.svg" alt="camera">
                                          </div>
                                          <img src="<?php echo $result['profile_pic'];?>" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                                          <small class="form-text text-black-50">Choose Image</small>
                                          <input type="file"  class="form-control-file" name="profile_pic" id="upload-profile">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $result['name'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email"  class="form-control" name="email" value="<?php echo $result['email'];?>" disabled>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Password</label>
                                            <input type="password" placeholder="Change Password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>&nbsp;</label>
                                            <input type="password" placeholder="Confirm Password" name="c_password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input type="text" class="form-control"name="mobile_no" minlength="10" maxlength="10" value="<?php echo $result['mobile_no'];?>">
                                    </div>

                                    <button class="btn btn-primary" type="submit" name="update_profile">Update Profile</button>
                                </form>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/lightgallery/js/lightgallery-all.min.js"></script>
	<script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="js/demo.js"></script>
	<script src="js/game.js"></script>
	<script src="js/all.js"></script>
  <script>
  $(".js-example-tags").select2({
tags: true
});
  </script>
  <script src="js/upload_profile.js"></script>
</body>

<!-- Mirrored from kripton.dexignzone.com/xhtml/app-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Apr 2021 11:11:04 GMT -->
</html>
