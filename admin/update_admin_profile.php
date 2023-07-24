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

  if (isset($_POST['update_admin_profile'])) {
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
        $result = mysqli_query($conn,"UPDATE `admin` SET `name`='$name',`mobile_no`='$mobile_no',`password`='$e_password',`profile_pic`='$folder',`updated_at`= now() WHERE id='$admin_id'");
        // $result   = mysqli_query($conn, "INSERT INTO users(name,mobile_no,email,password,profile_pic,created_at,updated_at) VALUES('$name','$mobile_no','$email','$e_password','$folder',now(),now())");

        // check if user data inserted successfully.
        if ($result) {

          echo "<script type='text/javascript'> alert('Profile Updated Successfully')</script>";
          echo "<script type='text/javascript'> document.location = 'admin-profile.php'; </script>";
          exit();
        }
        else {
          echo "<script type='text/javascript'> alert('Failed To Update Profile')</script>";
          echo "<script type='text/javascript'> document.location = 'update_admin_profile.php'; </script>";
          exit();
        }
      }
    // }
  }


?>
<!-- Top Section Start -->
<?php include "includes/admin_top.php"; ?>

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
                        Update Profile
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

<!-- Content body start -->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid" align="center">
      <div class="col-md-8">  <!-- ( use )      <div class="col-xl-6 col-xxl-12"></div>   ( for multiple graph)-->
        <div class="card" align="left">
            <div class="card-header d-block d-sm-flex border-0">
              <div class="card-body pr-2 pl-2">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="upload-profile-image d-flex justify-content-center pb-5">
                        <div class="text-center">
                          <div class="d-flex justify-content-center">
                            <img class="camera-icon" src="images/camera-solid.svg" alt="camera">
                          </div>
                          <img src="<?php echo $admin_result['profile_pic'];?>" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                          <small class="form-text text-black-50">Choose Image</small>
                          <input type="file"  class="form-control-file" name="profile_pic" id="upload-profile">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $admin_result['name'];?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"  class="form-control" name="email" value="<?php echo $admin_result['email'];?>" disabled>
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
                        <input type="text" class="form-control"name="mobile_no" minlength="10" maxlength="10" value="<?php echo $admin_result['mobile_no'];?>">
                    </div>

                    <button class="btn btn-primary" type="submit" name="update_admin_profile">Update Profile</button>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
<!-- Content body end -->

<!-- Footer start -->

<!-- Footer end -->

<!-- Support ticket button start -->

<!-- Support ticket button end -->

<!-- bottom Section Start -->
    <?php include "includes/admin_bottom.php"; ?>
<!-- bottom Section Start -->
