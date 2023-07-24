<?php
session_start();
error_reporting(0);
include "connection.php";
// This page can be accessed only after login
// Redirect user to login page, if user email is not available in session
if (!isset($_SESSION["email"])) {
    header("location: index.php");
}
else{

  $sqlselect_user = "SELECT * FROM users";
  $records = mysqli_query($conn,$sqlselect_user);
  $user_count = mysqli_num_rows($user_records);
  // echo "$count";
  if($user_count=1){
    $user_field=mysqli_fetch_array($user_records);

    $_SESSION['name'] = $user_field['name'];
    $_SESSION['email'] = $user_field['email'];

  }
  else{
    echo "<script> alert('Record Not Found')</script>";
  }
  /****************** Post Section Start **********************/

  if(isset($_POST['upload_post'])){

    $game_name = $_POST['game_name'];
    $account_type = $_POST['account_type'];

    $game_start_at = date('Y-m-d', strtotime($_POST['game_start_at']));

    $filename = $_FILES["post_image"]["name"];
    $tempname = $_FILES["post_image"]["tmp_name"];
    $folder = "uploads/posts/".$filename;
    move_uploaded_file($tempname,$folder);

    if($game_name!="" && $account_type!="" && $filename!=""){

      $sqlpost_upload = "INSERT INTO posts (user_id,game_name,account_type,duration,post_img,created_at,updatede_at) VALUES ('$user_id','$game_name','$account_type','$game_start_at','$filename',now(),now())";
      $post_data = mysqli_query($conn,$sqlpost_upload);

      if($post_data){
        echo "<script> alert('Data inserted Successfully......')</script>";
      }
      else{
        echo "<script> alert('Data Not Inserted......')</script>";
      }
    }
    else{
      echo "<script> alert('all filed are require......')</script>";
    }
  }

  /****************** Post Section End **********************/

}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from kripton.dexignzone.com/xhtml/app-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Apr 2021 11:10:56 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>  Acclook</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
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
                                Profile
                            </div>
                        </div>
						<div class=""></div>
							<div class="homebtn">
							    <a href="home.php" class="btn btn-primary">Home</a>
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
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="profile-info">
									<div class="profile-photo">
										<img src="images/profile/profile.png" class="img-fluid rounded-circle" alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0"><?php echo $_SESSION['name'] = $user_field['name'];?></h4>
											<p>Founder of AccLook</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0">umangbhalodiya.com</h4>
											<h4 class="text-muted mb-0">Email : <?php echo $_SESSION['email'] = $user_field['email'];?></h4>
											<h4 class="text-muted mb-0">Mobile : +91 7567240082</h4>
										</div>
										<div class="dropdown ml-auto">
											<a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li class="dropdown-item"><i class="fa fa-comment text-primary mr-2"></i>Send Message</li>
												<li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> eport</li>
											</ul>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="profile-info">
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0">Games I play :</h4>
											<div class="gameclass">
												<div class="row">
												    <div class="input-group">
													  <div class="row-md-6">
													        <input type="text" class="form-control" id="candidate" required placeholder="Enter Game name">
													  </div>&nbsp;&nbsp;
													  <div class="row-md-6">
														<input type="text" class="form-control" id="candidate1" required placeholder="In Game Username">
												      </div>&nbsp;&nbsp;

													  <div class="row-md-6">
													    <div class="input-group-append">
													        <button onclick="addItem()" class="btn btn-primary mb-1" type="button">Add Game</button>&nbsp;&nbsp;
													        <button onclick="removeItem()" class="btn btn-primary mb-1" type="button">Remove Game</button>
													    </div>
													  </div>
												    </div>
											    </div>
												<ul id="dynamic-list">
												</ul>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Posts</a>
                                            </li>
                                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Setting</a>
                                            </li>
											<li class="nav-item"><a href="#social-media" data-toggle="tab" class="nav-link">Social media</a>
                                            </li>
                                        </ul>
										<div class="tab-content">
                                            <div id="my-posts" class="tab-pane fade active show">
                                                <div class="my-post-content pt-3">
                                                    <div class="post-input">
														<a href="javascript:void(0);" class="btn btn-primary light px-3" data-toggle="modal" data-target="#linkModal"><i class="fa fa-link m-0"></i> </a>
														<!-- Modal -->
														<div class="modal fade" id="linkModal">
															<div class="modal-dialog modal-dialog-centered" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title">Social Links</h5>
																		<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<a class="btn-social facebook" href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
																		<a class="btn-social instagram" href="javascript:void(0)"><i class="fa fa-instagram"></i></a>
																		<a class="btn-social twitter" href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
																		<a class="btn-social discord" href="javascript:void(0)"><i class="fa fa-discord"></i></a>
																	</div>
																</div>
															</div>
														</div>
                                                        <a href="javascript:void(0);" class="btn btn-primary light mr-1 px-3" data-toggle="modal" data-target="#cameraModal"><i class="fa fa-camera m-0"></i> </a>
														<!-- Modal -->
														<div class="modal fade" id="cameraModal">
															<div class="modal-dialog modal-dialog-centered" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title">Create post</h5>
																		<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
																		</button>
																	</div>
																	<form action="" method="post" enctype="multipart/form-data">
																		<div class="form-group">
																			<label>Game name</label>
																			<!-- <input type="text" placeholder="Enter game name" class="form-control"> -->
                                      <select class="form-control" name="game_name">
                                        <option selected="selected">Choese Game.....</option>
                                        <option>PUBG</option>
                                        <option>CLASH OF CLAN</option>
                                      </select>

																		</div>
																		<div class="form-group">
																			<label>Account type</label>
																			<input type="text" placeholder="Enter account type" class="form-control" name="account_type">
																		</div>
																		<div class="form-group">
																			<label>Duration</label>
																			<input type="date" value= "<?php echo date("Y-m-d") ?>" class="form-control" name="game_start_at">
																		</div>
																		<div class="form-group">
																		    <div class="modal-body">
																				<label>Upload Photos</label>
																				<div class="input-group mb-3">
																					<div class="input-group-prepend">
																						<span class="input-group-text">Upload</span>
																					</div>
																					<div class="custom-file">
																						<input type="file" class="custom-file-input" name="post_image">
																						<label class="custom-file-label">Select Images</label>
																					</div>
																				</div>
																			</div>
																	    </div>
																		<button class="btn btn-primary" type="submit" name="upload_post">Post</button>
																	</form>
																</div>
															</div>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#postModal">Post</a>
														<!-- Modal -->
														<div class="modal fade" id="postModal">
															<div class="modal-dialog modal-dialog-centered" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title">Post</h5>
																		<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		 <textarea name="textarea" id="textarea2" cols="30" rows="5" class="form-control bg-transparent" placeholder="Please type what you want...."></textarea>
																		 <a class="btn btn-primary btn-rounded" href="javascript:void(0)">Post</a>
																	</div>
																</div>
															</div>
														</div>
                                                    </div>
                                                </div>
												<div class="profile-interest">
													<div class="row mt-4 sp4" id="lightgallery">
														<a class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
															<img src="images/profile/2.jpg" alt="" class="img-fluid">
														</a>
														<a class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
															<img src="images/profile/3.jpg" alt="" class="img-fluid">
														</a>
														<a class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
															<img src="images/profile/4.jpg" alt="" class="img-fluid">
														</a>
													</div>
												</div>
                                            </div>
                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Account Setting</h4>
                                                        <form>
															<div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" placeholder="Change Username" class="form-control">
                                                            </div>
															<div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" placeholder="Change Email" class="form-control">
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Password</label>
                                                                    <input type="email" placeholder="Change Password" class="form-control">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>&nbsp;</label>
                                                                    <input type="password" placeholder="Confirm Password" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Mobile No</label>
                                                                <input type="text" placeholder="+91 9876543210" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="gridCheck">
																	<label class="custom-control-label" for="gridCheck"> Check me out</label>
																</div>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Change</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
											<div id="social-media" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary">Social Media</h4>
                                                        <form>
															<div class="form-group">
                                                                <label>Instagram</label>
                                                                <input type="text" placeholder="Add instagram account" class="form-control">
                                                            </div>
															<div class="form-group">
                                                                <label>Facebook</label>
                                                                <input type="text" placeholder="Add Facebook account" class="form-control">
                                                            </div>
															<div class="form-group">
                                                                <label>Twitter</label>
                                                                <input type="text" placeholder="Add Twitter account" class="form-control">
                                                            </div>
															<div class="form-group">
                                                                <label>Discord</label>
                                                                <input type="text" placeholder="Add Discord account" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="gridCheck">
																	<label class="custom-control-label" for="gridCheck">Display</label>
																</div>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!-- Modal -->

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
</body>

<!-- Mirrored from kripton.dexignzone.com/xhtml/app-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Apr 2021 11:11:04 GMT -->
</html>
