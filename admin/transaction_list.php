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


  $transaction_list_query = "SELECT * FROM transaction ORDER BY id DESC";
  $transaction_list_data = mysqli_query($conn,$transaction_list_query);
  $cnt=1;
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
                        Transaction
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
        <div class="card">
            <div class="card-header d-block d-sm-flex border-0">
              <div class="card-body pr-2 pl-2">
                <table id="example" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Transaction ID</th>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile No</th>
                      <th>Amount</th>
                      <th>Pay To</th>
                      <th>Payment Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php   // LOOP TILL END OF DATA
                      while( $transaction_list_result = mysqli_fetch_assoc($transaction_list_data))
                      {
                    ?>
                    <tr>
                      <td><?php echo $cnt;?></td>
                      <td><?php echo $transaction_list_result['id'];?></td>
                      <td><?php echo $transaction_list_result['user_id'];?></td>
                      <td><?php echo $transaction_list_result['user_name'];?></td>
                      <td><?php echo $transaction_list_result['user_email'];?></td>
                      <td><?php echo $transaction_list_result['user_phone'];?></td>
                      <td><?php echo $transaction_list_result['amount'];?></td>
                      <td><?php echo $transaction_list_result['pay_to'];?></td>
                      <td><?php echo $transaction_list_result['created_at'];?></td>
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
</div>
<!-- Content body end -->

<!-- Footer start -->

<!-- Footer end -->

<!-- Support ticket button start -->

<!-- Support ticket button end -->

<!-- bottom Section Start -->
    <?php include "includes/admin_bottom.php"; ?>
<!-- bottom Section Start -->
