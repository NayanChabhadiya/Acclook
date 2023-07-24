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
  header('location:index.php');
}
    $query = "SELECT * FROM USERS WHERE email='$user_profile'";
    $data = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($data);
    $user_id = $result['id'];

    $select_game_name_query = "SELECT * FROM games";
    $select_game_name_result = mysqli_query($conn,$select_game_name_query);

    if (isset($_POST)) {

      $game_name = $_POST['game_name'];
      $account_type = $_POST['account_type'];
      $duration = date('Y-m-d', strtotime($_POST['game_start_at']));
      $description = $_POST['description'];
      $filename = $_FILES["post_image"]["name"];
      $tempname = $_FILES["post_image"]["tmp_name"];
      $folder = "uploads/posts/".$filename;
      move_uploaded_file($tempname,$folder);

      if ($game_name != "" && $account_type != "" && $duration != "" && $filename != "" && $description != "") {

        $upload_post_query = "INSERT INTO posts(user_id,game_name,account_type, duration, post_image, post_date,post_content) VALUES ('$user_id','$game_name','$account_type','$duration','$folder',now(),'$description')";
        $upload_post_data = mysqli_query($conn,$upload_post_query);

        if ($upload_post_data) {
          echo "<script type='text/javascript'> alert('Post Uploaded Successfully')</script>";
					echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
					exit();
        }
        else {
          echo "<script type='text/javascript'> alert('Failed to upload post')</script>";
					echo "<script type='text/javascript'> document.location = 'create_post.php'; </script>";
					exit();
        }
      }


    }

?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>  Acclook</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
    <link href="css/create_post.css" rel="stylesheet">
	<link href="icons/font-awesome-old/css/font-awesome.min.css" rel="stylesheet">


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
                                Create a Post
                            </div>
                        </div>
						<div class=""></div>
							<div class="homebtn">
							    <a href="profile.php" class="btn btn-primary">Back to Profile</a>
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
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Game name</label>
                                        <!-- <input type="text" placeholder="Enter game name" class="form-control"> -->
                                           <select class="form-control" name="game_name">
                                             <option>Choese Game Name.......</option>
                                             <?php
                                              while($select_game_name_total = mysqli_fetch_assoc($select_game_name_result))
                                              {                                              ?>

                                                    <option><?php echo $select_game_name_total['name']; ?></option>
                                                  <?php } ?>
                                            </select>

									</div>
									<div class="form-group">
										<label>Account type</label>
										<input type="text" placeholder="Enter account type" class="form-control" name="account_type">
									</div>
								  <div class="form-group">
										<label>Duration</label>
										<input type="date" class="form-control" name="game_start_at">
									</div>
                  <div class="form-group">
                      <label for="">Upload Image</label>
                      <input type="file" class="form-control form-control-lg" name="post_image" multiple>
                      <!-- <span><a href="javascript:void(0);" class="add" >Add More</a></span> -->
                  </div>
                  <!-- <div class="row">
                  <div class="form-group contents"></div>
                  <div class="row"></div>
                </div> -->
									<div class="form-group">
                    <label>Account decription</label>
                    <textarea class="form-control" rows="4" id="comment" placeholder="mention your inventories, credits and progress here..." name="description"></textarea>
                  </div>
                    <button class="btn btn-primary" type="submit" name="upload_post">Post</button>
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
  <!-- post start -->
  <script src="jquery-1.9.0.min.js"></script>
  <!-- <script>
        $(document).ready(function() {
          $(".add").click(function() {
            $('<div><input type="file" class="form-control form-control-lg" name="post_image" multiple><span class="rem" ><a href="javascript:void(0);" text="red">Remove</span><button class="btn btn-primary" type="submit" name="upload_post">Post</button></div>').appendTo(".contents");

          });
          $('.contents').on('click', '.rem', function() {
            $(this).parent("div").remove();
          });

        });
      </script> -->
  <!-- post end -->

</body>

<!-- Mirrored from kripton.dexignzone.com/xhtml/app-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Apr 2021 11:11:04 GMT -->
</html>
