<?php
session_start();
error_reporting(0);
include "../connection.php";
$admin_profile = $_SESSION['admin_email'];
if($admin_profile==true)
{

}
else
{
  header('location:../index.php');
}
  $admin_query = "SELECT * FROM admin WHERE email='$admin_profile'";
  $admin_data = mysqli_query($conn,$admin_query);
  $admin_result = mysqli_fetch_assoc($admin_data);
  $admin_id = $admin_result['id'];

  if (isset($_POST['update_profile'])) {
    $name = $_POST['name'];
    $mobile_no = $_POST['mobile_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $filename = $_FILES["profile_pic"]["name"];
    $tempname = $_FILES["profile_pic"]["tmp_name"];
    $folder = "uploads/user_profiles/".$filename;
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
        $result = mysqli_query($conn,"UPDATE `admin` SET `name`='$name',`mobile_no`='$mobile_no',`password`='$e_password',`profile_pic`='$folder',`updated_at`= now() WHERE id='$user_id'");
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
<!-- Top Section Start -->
    <?php include 'includes/admin_top.php'; ?>
<!-- Top Section end -->

<!-- Chat box start -->

<!-- Chat box End -->

<!-- Header start -->
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        Profile
                    </div>
                </div>

                <ul class="navbar-nav header-right">

                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <img src="<?php echo $admin_result['profile_pic']; ?>" width="20" alt=""/>
                            <div class="header-info">
                                 <span><?php echo $admin_result['name']; ?></span>
                                 <small>Super Admin</small>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="admin-profile.php" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ml-2">Profile </span>
                            </a>
                            <a href="../logout.php" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ml-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- Header end ti-comment-alt -->

<!-- Sidebar start -->
    <?php include 'includes/admin_sidebar.php'; ?>
<!-- Sidebar end -->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="profile-info">
									<div class="profile-photo">
										<img src="<?php echo $admin_result['profile_pic'];?>" class="img-fluid rounded-circle" alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0"><?php echo $admin_result['name'];?></h4>
											<p>Founder of AccLook</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0">Email :<?php echo $admin_result['email'];?></h4>
											<h4 class="text-muted mb-0">Mobile :<?php echo $admin_result['mobile_no'];?></h4>
										</div>
                    <div class="dropdown ml-auto">
                      <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                      <ul class="dropdown-menu dropdown-menu-right">

                        <li class="dropdown-item"><i class="fa fa-cogs text-primary mr-2"></i><a href="update_admin_profile.php">Update Profile</a></li>
                      </ul>
                    </div>
									</div>
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


        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

	<!--removeIf(production)-->

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
    <script src="js/styleSwitcher.js"></script>	<script>
		$('#lightgallery').lightGallery({
			thumbnail:true,
		});
	</script>

</body>

<!-- Mirrored from kripton.dexignzone.com/xhtml/app-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Apr 2021 11:11:04 GMT -->
</html>
