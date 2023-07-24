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


// $bid_list_query = "SELECT * FROM bids where user_id != $user_id";
$bid_list_query = "SELECT * FROM bids";
$bid_list_data = mysqli_query($conn,$bid_list_query);
$cnt=1;

$game_username_list_query = "SELECT * FROM user_game WHERE user_id = '$user_id'";
$game_username_list_data = mysqli_query($conn,$game_username_list_query);
$cnt=1;
$srno =1;

$post_list_query = "SELECT * FROM posts WHERE user_id = '$user_id'";
$post_list_data = mysqli_query($conn,$post_list_query);


  /****************** Post Section Start **********************/

  /****************** Post Section End **********************/


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
  <!-- Table Start -->
      <link rel="stylesheet" type="text/css" href="vendor/datatables/datatables/css/jquery.dataTables.min.css">

  <!-- Table End -->

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
										<img src="<?php echo $result['profile_pic'];?>" class="img-fluid rounded-circle" alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0"><?php echo $result['name'];?></h4>
										</div>
										<div class="profile-email px-2 pt-2">

											<h4 class="text-muted mb-0">Email : <?php echo $result['email'];?></h4>
											<h4 class="text-muted mb-0">Mobile : <?php echo $result['mobile_no'];?></h4>
										</div>
										<div class="dropdown ml-auto">
											<a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li class="dropdown-item"><i class="fa fa-money text-primary mr-2"></i><a href="payment/">Make Payment</a></li>
                        <li class="dropdown-item"><i class="fa fa-cogs text-primary mr-2"></i><a href="update_profile.php">Update Profile</a></li>
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
								      <h4 class="text-primary mb-0">My Games:</h4>
											  <div class="gameclass">
											    <div class="row">
                            <?php
                            if (isset($_POST['add_game'])) {
                              $game_name = $_POST['game_name'];
                              $username_in_game = $_POST['username_in_game'];

                              if ($game_name != "" && $username_in_game != "") {

                                $select_game_username = mysqli_query($conn,"SELECT * FROM user_game WHERE game_name='$game_name' AND username_in_game = '$username_in_game'");
                            		if(mysqli_num_rows($select_game_username)>0)
                            		{
                            		  echo "<script> alert('Game Name And User Name IS Already Exists') </script>";
                            		  echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
                            		  exit;
                            		}
                                else {

                                  $add_game_username = mysqli_query($conn, "INSERT INTO user_game(user_id,game_name,username_in_game) VALUES('$user_id','$game_name','$username_in_game')");
                                  if ($add_game_username) {

                          					echo "<script type='text/javascript'> alert('Game Name And User Name Added Successfully')</script>";
                          					echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
                          					exit();
                          				}
                          				else {
                          					echo "<script type='text/javascript'> alert('Failed To Add Game Name And User Name')</script>";
                          					echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
                          					exit();
                          				}
                                }
                              }
                              else {
                                echo "<script type='text/javascript'> alert('Please Enter Game Name And Username It Can Not Be Blank')</script>";
                                echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
                                exit();
                              }
                            }

                             ?>
                             <form class="input-group" action="" method="post">
                                <div class="row-md-6" style="margin-right: 12px;">
 													          <input type="text" class="form-control"  name="game_name"  placeholder="Enter Game name">
 													      </div>
                                <div class="row-md-6" style="margin-right: 12px;">
                                    <input type="text" class="form-control" name="username_in_game" placeholder="In Game Username">
                                </div>
                                <div class="row-md-6">
  													      <div class="input-group-append">
  													        <button  class="btn btn-primary mb-1" type="submit" name="add_game">Add Game</button>
  													      </div>
  													    </div>
                             </form>
										    </div>
										</div>
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
            <div class="profile-head" >
              <h4 class="text-primary mb-0">My Games</h4>
                <div class="profile-name px-3 pt-2">
                          <table id="example" class="display" style="width:100%;">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Game name</th>
                                <th>Username In Game</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php   // LOOP TILL END OF DATA
                                while( $game_username_list_result = mysqli_fetch_assoc($game_username_list_data))
                                {
                              ?>

                              <tr>
                                <td><?php echo $cnt;?></td>
                                <td><?php echo $game_username_list_result['game_name'];?></td>
                                <td><?php echo $game_username_list_result['username_in_game'];?></td>
                                <td>
                                    <i class="fa fa-trash text-primary mr-2"></i>
                                    <a href="remove_game.php?id=<?php echo $game_username_list_result['id'];?>" onclick="checkdelete()">
                                      Remove Game
                                    </a>
                                </td>
                              </tr>
                              <?php

                                  $cnt=$cnt+1;
                                }

                              ?>

                            </tbody>
                          </table>
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
                                            <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Create Post</a>
                                            </li>
											<!-- <li class="nav-item"><a href="#social-media" data-toggle="tab" class="nav-link">Social media</a>
                                            </li> -->
                                            <li class="nav-item"><a href="#social-media" data-toggle="tab" class="nav-link ">Bids</a>
                                            </li>
                                        </ul>
										<div class="tab-content">
                                            <div id="my-posts" class="tab-pane fade active show">
                                                <div class="my-post-content pt-3">
                                                    <div class="post-input">
														<!-- <a href="javascript:void(0);" class="btn btn-primary light px-3" data-toggle="modal" data-target="#linkModal"><i class="fa fa-link m-0"></i> </a> -->
														<!-- Modal -->

														</div>
                                                        <a href="create_post.php" class="btn btn-primary light mr-1 px-3" ><i class="fa fa-camera m-0"></i>&nbsp;Create a post</a>
														<!-- Modal -->
														<!-- <div class="modal fade" id="cameraModal">
														    <a href="create_post.php"></a>
														</div> -->

                                                    </div>
                                                    <div class="tab-content">
                                                                            <div id="my-posts" class="tab-pane fade active show">
                                                                                <div class="my-post-content pt-3">
                                                                                    <div class="post-input">

                                                                                    </div>
                                                                                </div>
                                                                                <?php   // LOOP TILL END OF DATA
                                                                                  while( $post_list_result = mysqli_fetch_assoc($post_list_data))
                                                                                  {
                                                                                    $post_id = $post_list_result['id'];
                                                                                ?>
                                                                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                                                   <!-- <ol class="carousel-indicators">
                                                                                     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                                                     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                                                   </ol> -->
                                                                                <div class="carousel-inner">
                                                                                    <div class="carousel-item active">
                                                                                        <img class="d-block w-100" src="<?php echo $post_list_result['post_image'];?>" alt="First slide">
                                                                                    </div>
                                                                                    <!-- <div class="carousel-item">
                                                                                        <img class="d-block w-100" src="images/slide4.jpg" alt="Second slide">
                                                                                    </div> -->
                                                                                </div>

                                                                               </div>
                                                                               <?php
                                                                                 // $cnt=$cnt+1;
                                                                                 }

                                                                               ?>
                                                                            </div>
                                                </div>
                                                <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                   <ol class="carousel-indicators">
                                                     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                   </ol>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="images/slide3.jpg" alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="images/slide4.jpg" alt="Second slide">
                                                    </div>
                                                </div>
                                                     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                      <span class="mdi mdi-chevron-left mdi-36px" aria-hidden="true"></span>
                                                      <span class="sr-only">Previous</span>
                                                     </a>
                                                     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                        <span class="mdi mdi-chevron-right mdi-36px" aria-hidden="true"></span>
                                                       <span class="sr-only">Next</span>
                                                     </a>
                                               </div>
                                            </div> -->

											<div id="social-media" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">

                                                        <h4 class="text-primary">Bids</h4>
                                                        <table id="example1" class="display" style="width:100%">
                                                          <thead>
                                                            <tr>
                                                              <th>Sr.No</th>
                                                              <!-- <th>Bid ID</th>
                                                              <th>Post ID</th>
                                                              <th>User ID</th> -->
                                                              <th>Bider Name</th>
                                                              <th>Bided Amount</th>
                                                              <th>Action</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            <?php   // LOOP TILL END OF DATA
                                                              while( $bid_list_result = mysqli_fetch_assoc($bid_list_data))
                                                              {
                                                            ?>
                                                            <tr>
                                                              <td><?php echo $srno;?></td>
                                                              <!-- <td><?php //echo $bid_list_result['id'];?></td>
                                                              <td><?php// echo $bid_list_result['post_id'];?></td>
                                                              <td><?php// echo $bid_list_result['user_id'];?></td> -->
                                                              <td><?php echo $bid_list_result['user_name'];?></td>
                                                              <td><?php echo $bid_list_result['amount'];?></td>
                                                              <th><div class="dropdown ml-auto">
                                          											<a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                                          											<ul class="dropdown-menu dropdown-menu-right">
                                          												<!-- <li class="dropdown-item"><i class="fa fa-comment text-primary mr-2"></i><a href="payment/">Make Payment</a></li> -->
                                                                  <li class="dropdown-item"><i class="fa fa-cogs text-primary mr-2"></i><a href="visit_user.php">Visit Profile</a></li>
                                          											</ul>
                                          										</div></th>

                                                            </tr>
                                                            <?php
                                                              $srno=$srno+1;
                                                              }
                                                            ?>
                                                          </tbody>
                                                        </table>
                                                        <!-- <form>
															                              <div class="form-group">
                                                                <label>Bider Name</label>
                                                                <input type="text" placeholder="Add instagram account" class="form-control">
                                                            </div>
															                              <div class="form-group">
                                                                <label>Bided Amount</label>
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
                                                        </form> -->
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
  <!-- Table Start -->
  <script src="vendor/datatables/datatables/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#example').DataTable();
      } );
      $(document).ready(function() {
          $('#example1').DataTable();
        } );
  </script>
  <script type="text/javascript">
  function checkdelete(){
    confirm("Are You Sure To Delete This User????");
  }
  </script>
<!-- Table End -->
</body>

<!-- Mirrored from kripton.dexignzone.com/xhtml/app-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Apr 2021 11:11:04 GMT -->
</html>
