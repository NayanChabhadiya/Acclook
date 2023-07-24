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

  // $query = "SELECT * FROM USERS";
  // $data = mysqli_query($conn,$query);
  // $result = mysqli_fetch_assoc($data);
  // $user_id = $result['id'];
  // $user_name = $result['name'];

  $post_list_query = "SELECT * FROM posts, users WHERE posts.user_id = users.id";
  $post_list_data = mysqli_query($conn,$post_list_query);

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
                        Dashboard
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
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!  <?php echo $admin_result['name'];?></h4>
                        </div>
                    </div>

                </div>
                <!-- row -->
                <div class="row">



					<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-primary">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<i class="la la-user-tie"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">Total Users</p>
                    <?php
                      $user_count_query = "SELECT * FROM users";
                      $user_count_data = mysqli_query($conn,$user_count_query);
                      $user_count_total = mysqli_num_rows($user_count_data);
                    ?>
										<h3 class="text-white"><?php echo $user_count_total;?></h3>
									</div>
								</div>
							</div>
              <a href="user_list.php" class="button" align="center"><h4>View All Users</h4></a>
						</div>
                    </div>
					<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-warning">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="la la-image"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">Total Posts</p>
                    <?php
                      $post_count_query = "SELECT * FROM posts";
                      $post_count_data = mysqli_query($conn,$post_count_query);
                      $post_count_total = mysqli_num_rows($post_count_data);
                    ?>
										<h3 class="text-white"><?php echo $post_count_total;?></h3>
									</div>
								</div>
							</div>
              <a href="post_list.php" class="button" align="center"><h4>View All Posts</h4></a>
						</div>

                    </div>

					<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-secondary">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="la la-gamepad"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">Total Games</p>
                    <?php
                      $game_count_query = "SELECT * FROM games";
                      $game_count_data = mysqli_query($conn,$game_count_query);
                      $game_count_total = mysqli_num_rows($game_count_data);
                    ?>
										<h3 class="text-white"><?php echo $game_count_total;?></h3>
									</div>
								</div>
							</div>
              <a href="game_list.php" class="button" align="center"><h4>View All game</h4></a>
						</div>
                    </div>
					<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-danger ">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="la la-money-bill"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">Total Transaction</p>
                    <?php
                      $transaction_count_query = "SELECT * FROM transaction";
                      $transaction_count_data = mysqli_query($conn,$transaction_count_query);
                      $transaction_count_total = mysqli_num_rows($transaction_count_data);
                    ?>
										<h3 class="text-white"><?php echo $transaction_count_total;?></h3>
									</div>
								</div>
							</div>
              <a href="transaction_list.php" class="button" align="center"><h4 text="white">View All Transaction</h4></a>
						</div>
                    </div>
                    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
          						<div class="widget-stat card bg-green">
          							<div class="card-body p-4">
          								<div class="media">
          									<span class="mr-3">
          										<i class="la la-users"></i>
          									</span>
          									<div class="media-body text-white">
          										<p class="mb-1">Total Subscribers</p>
                              <?php
                                $subscribe_count_query = "SELECT * FROM subscribers";
                                $subscribe_count_data = mysqli_query($conn,$subscribe_count_query);
                                $subscribe_count_total = mysqli_num_rows($subscribe_count_data);
                              ?>
          										<h3 class="text-white"><?php echo $subscribe_count_total;?></h3>
          									</div>
          								</div>
          							</div>
                        <a href="subscribers_email.php" class="button" align="center"><h4>View All Subscribers</h4></a>
          						</div>
                              </div>
                              <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
                    						<div class="widget-stat card bg-success">
                    							<div class="card-body p-4">
                    								<div class="media">
                    									<span class="mr-3">
                    										<i class="la la-envelope-open-text"></i>
                    									</span>
                    									<div class="media-body text-white">
                    										<p class="mb-1">Total Contected Users</p>
                                        <?php
                                          $contacts_count_query = "SELECT * FROM contects";
                                          $contacts_count_data = mysqli_query($conn,$contacts_count_query);
                                          $contacts_count_total = mysqli_num_rows($contacts_count_data);
                                        ?>
                    										<h3 class="text-white"><?php echo $contacts_count_total;?></h3>
                    									</div>
                    								</div>
                    							</div>
                                  <a href="message_list.php" class="button" align="center"><h4 text="white">View All Contected Users</h4></a>
                    						</div>
                                        </div>







					          <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0 d-sm-flex d-block">

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
    <?php include 'includes/admin_bottom.php'; ?>
<!-- bottom Section Start -->
