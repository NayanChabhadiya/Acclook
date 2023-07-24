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


  if (isset($_POST['add_admin'])) {
    $name = $_POST['name'];
    $mobile_no = $_POST['mobile_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $filename = $_FILES["profile_pic"]["name"];
    $tempname = $_FILES["profile_pic"]["tmp_name"];
    $folder = "uploads/admin_profiles/".$filename;
    move_uploaded_file($tempname,$folder);

    $sql=mysqli_query($conn,"SELECT * FROM admin where email='$email'");
    if(mysqli_num_rows($sql)>0)
    {
      echo "<script> alert('admin Is Already Exists') </script>";
      echo "<script type='text/javascript'> document.location = 'add_admin.php'; </script>";
      exit;
    }
    else{
      if($password != $c_password){
        echo "<script> alert('Password and Confirm Password dose not metch....') </script>";
      }
      else{
        $e_password = md5($password);// encrypt password
        // $result = mysqli_query($conn,"UPDATE `admin` SET `name`='$name',`mobile_no`='$mobile_no',`email`='$email',`password`='$e_password',`profile_pic`='$folder',`updated_at`= now() WHERE id='$admin_id'");
        $result   = mysqli_query($conn, "INSERT INTO admin(name,mobile_no,email,password,profile_pic,created_at,updated_at) VALUES('$name','$mobile_no','$email','$e_password','$folder',now(),now())");

        // check if admin data inserted successfully.
        if ($result) {

          echo "<script type='text/javascript'> alert('admin added Successfully')</script>";
          echo "<script type='text/javascript'> document.location = 'admin_list.php'; </script>";
          exit();
        }
        else {
          echo "<script type='text/javascript'> alert('Failed To Add admin')</script>";
          echo "<script type='text/javascript'> document.location = 'add_admin.php'; </script>";
          exit();
        }
      }
    }
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
                        Add Admin
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
    <div class="container-fluid">
      <div class="col-xxl-12">  <!-- ( use )      <div class="col-xl-6 col-xxl-12"></div>   ( for multiple graph)-->
        <div class="row">
          <div class="col-lg-6">
            <div class="profile card card-body px-3 pt-3 pb-0">
              <div class="profile-head">
                <h4 class="text-primary mb-0 "  align="center">Add Admin</h4>
                  <div class="card-body pr-2 pl-2">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="upload-profile-image d-flex justify-content-center pb-5">
                            <div class="text-center">
                              <div class="d-flex justify-content-center">
                                <img class="camera-icon" src="images/camera-solid.svg" alt="camera">
                              </div>
                              <img src="images/profile/beard.png" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                              <small class="form-text text-black-50">Choose Image</small>
                              <input type="file"  class="form-control-file" name="profile_pic" id="upload-profile">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email"  class="form-control" name="email" required>
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
                            <input type="text" class="form-control" minlength="10" maxlength="10" name="mobile_no" required>
                        </div>

                        <button class="btn btn-primary" type="submit" name="add_admin">Add Admin</button>
                    </form>
                  </div>
              </div>
              <div>
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
</div>
<!-- Main wrapper end -->

<!-- Scripts -->

<!-- Required vendors -->
   <script src="vendor/global/global.min.js"></script>
   <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
   <script src="vendor/chart.js/Chart.bundle.min.js"></script>

<!-- Chart piety plugin files -->
  <script src="vendor/peity/jquery.peity.min.js"></script>

<!-- Apex Chart -->
  <script src="vendor/apexchart/apexchart.js"></script>

<!-- Dashboard 1 -->
  <script src="js/dashboard/dashboard-1.js"></script>

  <script src="vendor/owl-carousel/owl.carousel.js"></script>
  <script src="js/custom.min.js"></script>
  <script src="js/deznav-init.js"></script>
  <script src="js/demo.js"></script>
  <script src="js/styleSwitcher.js"></script>
  <!-- Table Start -->
  <script src="vendor/datatables/datatables/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#example').DataTable();
      } );
  </script>
<!-- Table End -->
  <script>
    function carouselReview(){
       jQuery('.testimonial-one').owlCarousel({
         loop:true,
         autoplay:true,
         margin:20,
         nav:false,
         rtl:true,
         dots: false,
         navText: ['', ''],
         responsive:{
                      0:{
                              items:3
                         },
                      450:{
                              items:4
                         },
                      600:{
                              items:5
                          },
                      991:{
                              items:5
                          },
                      1200:{
                              items:7
                           },
                      1601:{
                              items:5
                           }
                     }
                   })
                 }
  jQuery(window).on('load',function(){
    setTimeout(function(){
      carouselReview();
    }, 1000);
  });


</script>
<script src="js/upload_profile.js"></script>

</body>

<!-- Mirrored from kripton.dexignzone.com/xhtml/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Apr 2021 11:10:56 GMT -->
</html>
<!-- bottom Section Start -->
