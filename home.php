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
$user_name = $result['name'];

$post_list_query = "SELECT * FROM posts, users WHERE posts.user_id = users.id";
$post_list_data = mysqli_query($conn,$post_list_query);

// $post_list_query = "SELECT * FROM posts WHERE user_id = $user_id";
// $post_list_data = mysqli_query($conn,$post_list_query);

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Aclook</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Kanit:300,400,500,500i,600,900%7CRoboto:400,900">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>


  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="preloader-item"></div>
      </div>
    </div>
    <!-- Page-->
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header rd-navbar-dark">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="166px" data-xl-stick-up-offset="166px" data-xxl-stick-up-offset="166px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-main"><span></span></button>
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel-inner container">
                <div class="rd-navbar-collapse rd-navbar-panel-item rd-navbar-panel-item-left">
                  <!-- Owl Carousel-->
                  <div class="owl-carousel-navbar owl-carousel-inline-outer">
                    <div class="owl-inline-nav">

                    </div>
                  </div>
                </div>
                <div class="rd-navbar-panel-item rd-navbar-panel-item-right">
                </div>
                <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
              </div>
            </div>
            <div class="rd-navbar-main">
              <div class="rd-navbar-main-top">
                <div class="rd-navbar-main-container container">
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="./"><img class="brand-logo " src="images/logo-soccer-default-95x126.png" alt="" width="96" height="126"/></a>
                  </div>
                  <!-- RD Navbar List-->
                   <ul class="rd-navbar-list">
                    <li class="rd-navbar-list-item"><a class="rd-navbar-list-link" href="#">&nbsp;</a></li>

                  </ul>
                  <!-- RD Navbar Search-->
                  <div class="rd-navbar-search">
                    <button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                    <form class="rd-search" action="#" data-search-live="rd-search-results-live" method="GET">

                    </form>
                  </div>
                </div>
              </div>
              <div class="rd-navbar-main-bottom rd-navbar-darker">
                <div class="rd-navbar-main-container container">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="home.php">Home</a>
                    </li>
                    <!-- <li class="rd-nav-item"><a class="rd-nav-link" href="about_us.php">Profiles Timeline</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="bot.php">Publish Profile</a>
                    </li> -->
                    <li class="rd-nav-item"><a class="rd-nav-link" href="popular_profile.php">Popular Profiles</a>
                   </li>
                  </ul>
                  <div class="rd-navbar-main-element">
                  <ul class="list-inline list-inline-bordered">
                    <li>
                      <a class="link link-icon link-icon-left link-classic" href="#" role="button" data-toggle="dropdown">
                        <span class="icon fl-bigmug-line-login12"></span>
                        <span class="link-icon-text">Your Account</span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                          <a href="profile.php" class="dropdown-item ai-icon">
                              <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                              <span class="ml-2">Profile </span>
                          </a>
                          <a href="logout.php" class="dropdown-item ai-icon">
                              <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                              <span class="ml-2">Logout </span>
                          </a>
                      </div>
                    </li>
                  </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- Swiper-->
      <!-- Latest News-->
     <section class="section section-md bg-gray-100">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-12">
              <div class="main-component">
                <article class="heading-component">
                  <div class="heading-component-inner">
                    <h5 class="heading-component-title">Timelines</h5>
                  </div>
                </article>
                <?php   // LOOP TILL END OF DATA
                  while( $post_list_result = mysqli_fetch_assoc($post_list_data))
                  {
                    $post_id = $post_list_result['id'];
                ?>
                <div class="row-30">
                  <div class="col-md-12">
                    <div class="card card-default">
                      <div class="card-header card-header-border-bottom">
                        <h2>Post By :<?php echo $post_list_result['name'];?></h2><a class="u_name" id="user_name" href="(user profile address)"></a>
                        <div>
                          <!-- <a class="fa fa-comments" style="font-size:48px;color:blue" href="Chat_room.php"></a> -->
                          <a class="fa fa-eye"href="visit_user.php?id=<?php echo $post_list_result['user_id'];?>">Visit Profile</a>
                        </div>
                      </div>

                      <div class="card-body">
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
                          <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="mdi mdi-chevron-left mdi-36px" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="mdi mdi-chevron-right mdi-36px" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a> -->
                        </div>
                        <div class="card-header card-header-border-bottom">
                          <h2>Details</h2><a class="ac_details" id="account_details" href="(user profile address)"></a>
                        </div>
                        <div class="details col-md 12">
                          <div class="row">
                            <div class="col-md-12">
                              <p class="mb-5">Game Name : <?php echo $post_list_result['game_name'];?></p>
                              <p class="mb-5">Account Type : <?php echo $post_list_result['account_type'];?></p>
                              <p class="mb-5">Game Started At :<?php echo $post_list_result['duration'];?></p>
                              <!-- <p class="mb-5">Post Date : <?php //echo $post_list_result['post_date'];?></p> -->
                              <p class="mb-5">Description : </p>
                              <p><?php echo $post_list_result['post_content'];?></p>
                            </div>
                          </div>
                          <div class="col-md-6">

                            <div class="registration-form">
                              <?php
                                if (isset($_POST['bid'])) {

                                  $amount = $_POST['amount'];

                                  if ($amount != "") {

                                    $select_bid_query = mysqli_query($conn,"SELECT * FROM bids where amount='$amount' AND post_id='$post_id' AND user_id='$user_id'");
                                    if(mysqli_num_rows($select_bid_query)>0)
                                    {
                                      echo "<script> alert('bid amount IS Already Exists') </script>";
                                      echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                                      exit;
                                    }
                                    else {

                                  $bid_query = mysqli_query($conn, "INSERT INTO `bids`(`post_id`, `user_id`, `user_name`, `amount`, `created_at`) VALUES ('$post_id','$user_id','$user_name','$amount',now())");
                                      if ($bid_query) {

                                				echo "<script type='text/javascript'> alert('bid amount Added Successfully')</script>";
                                				echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                                				exit();
                                			}
                                			else {
                                				echo "<script type='text/javascript'> alert('Failed To Add bid amount')</script>";
                                				echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                                				exit();
                                			}
                                    }
                                  }
                                }
                                ?>
                              <form class="" action="" method="post">
                                <div class="form-group">
                                  <input type="number" class="form-control item" name="amount" placeholder="Enter Amount">
                                </div>
                                <div class="shopping-cart  mb-3">
                                  <button class="btn btn-primary fa fa-shopping-basket mr-2" type="submit" name="bid"> Bid </button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                    // $cnt=$cnt+1;
                    }

                  ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

     <footer class="section footer-classic footer-classic-dark context-dark">
        <div class="footer-classic-main">
          <div class="container">
            <p class="heading-7">Subscribe to our Newsletter</p>
            <?php

              if (isset($_POST['subscribe'])) {

                $sub_email = $_POST['sub_email'];

                if ($sub_email != "") {

                  $select_sub_email_query = mysqli_query($conn,"SELECT * FROM subscribers where email='$sub_email'");
                  if(mysqli_num_rows($select_sub_email_query)>0)
                  {
                    echo "<script> alert('Email have Already Subscribed') </script>";
                    echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                    exit;
                  }
                  else {

                    $sub_email_query = mysqli_query($conn, "INSERT INTO `subscribers`(`user_id`, `email`, `subscribed_at`) VALUES ('$user_id','$sub_email',now())");
                    if ($sub_email_query) {

                      echo "<script type='text/javascript'> alert('Email subscribed Successfully')</script>";
                      echo "<script type='text/javascript'> document.location = home.php'; </script>";
                      exit();
                    }
                    else {
                      echo "<script type='text/javascript'> alert('Failed To Subscribe email')</script>";
                      echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                      exit();
                    }
                  }
                }
                else {
                  echo "<script type='text/javascript'> alert('Please Enter Email  It Can Not Be Blank')</script>";
                  echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
                  exit();
                }

              }

            ?>

            <!-- <form class="rd-mailform rd-form rd-inline-form-creative" data-form-output="form-output-global" data-form-type="subscribe" method="post" > -->
            <form class="login100-form form-horizontal" action="" method="post">
              <div class="input-group">
                <div class="row-md-6">
                  <input type="text" class="form-control" name="sub_email" placeholder="Enter Email Aaddress">
                </div>&nbsp;&nbsp;
                <div class="row-md-6">
                  <div class="input-group-append">
                    <button class="btn btn-primary mb-1" type="submit" name="subscribe">Subscribe</button>
                  </div>
                </div>
              </div>
            </form>
              <!-- <form class="rd-mailform rd-form rd-inline-form-creative" method="post" >
              <div class="form-wrap">
                <div class="form-input-wrap">
                  <input class="form-input" id="footer-form-email" type="email" name="sub_email" data-constraints="@Required">
                  <label class="form-label" for="footer-form-email">Enter your E-mail</label>
                </div>
              </div>
              <div class="form-button">
                <button class="button button-primary-outline" type="submit" aria-label="Send" name="subscribe"><span class="icon fl-budicons-launch-right164"></span></button>
              </div>
            </form> -->
            <div class="row row-50">
              <div class="col-lg-5 text-center text-sm-left">
                <article class="unit unit-sm-horizontal unit-middle justify-content-center justify-content-sm-start footer-classic-info">
                  <div class="unit-left"><a class="brand brand-md" href="./"><img class="brand-logo " src="images/logo-soccer-default-95x126.png" alt="" width="95" height="126"/></a>
                  </div>
                  <div class="unit-body">
                    <p>Sportland website offers you the latest news about our team as well as updates on our matches and other events.</p>
                  </div>
                </article>
                <ul class="list-inline list-inline-bordered list-inline-bordered-lg">
                  <li>
                    <div class="unit unit-horizontal unit-middle">
                      <div class="unit-left">
                        <svg class="svg-color-primary svg-sizing-35" x="0px" y="0px" width="27px" height="27px" viewbox="0 0 27 27" preserveAspectRatio="none">
                          <path d="M2,26c0,0.553,0.447,1,1,1h5c0.553,0,1-0.447,1-1v-8.185c-0.373-0.132-0.711-0.335-1-0.595V19 H6v-1v-1v-1H5v1v2H3v-9H2v1H1V9V8c0-0.552,0.449-1,1-1h1h1h3h0.184c0.078-0.218,0.173-0.426,0.297-0.617C8.397,5.751,9,4.696,9,3.5 C9,1.567,7.434,0,5.5,0S2,1.567,2,3.5C2,4.48,2.406,5.364,3.056,6H3H2C0.895,6,0,6.895,0,8v7c0,1.104,0.895,2,2,2V26z M8,26H6v-6h2 V26z M5,26H3v-6h2V26z M3,3.5C3,2.121,4.121,1,5.5,1S8,2.121,8,3.5S6.879,6,5.5,6S3,4.879,3,3.5 M1,15v-3h1v4 C1.449,16,1,15.552,1,15"></path>
                          <path d="M11.056,6H11h-1C8.895,6,8,6.895,8,8v7c0,1.104,0.895,2,2,2v9c0,0.553,0.447,1,1,1h5 c0.553,0,1-0.447,1-1v-9c1.104,0,2-0.896,2-2V8c0-1.105-0.896-2-2-2h-1h-0.056C16.594,5.364,17,4.48,17,3.5 C17,1.567,15.434,0,13.5,0S10,1.567,10,3.5C10,4.48,10.406,5.364,11.056,6 M10,15v1c-0.551,0-1-0.448-1-1v-3h1V15z M11,20h2v6h-2 V20z M16,26h-2v-6h2V26z M17,16v-1v-3h1v3C18,15.552,17.551,16,17,16 M17,7c0.551,0,1,0.448,1,1v1v1v1h-1v-1h-1v5v4h-2v-1v-1v-1h-1 v1v1v1h-2v-4v-5h-1v1H9v-1V9V8c0-0.552,0.449-1,1-1h1h1h3h1H17z M13.5,1C14.879,1,16,2.121,16,3.5C16,4.879,14.879,6,13.5,6 S11,4.879,11,3.5C11,2.121,12.121,1,13.5,1"></path>
                          <polygon points="15,13 14,13 14,9 13,9 12,9 12,10 13,10 13,13 12,13 12,14 13,14 14,14 15,14 	"></polygon>
                          <polygon points="7,14 7,13 5,13 5,12 6,12 7,12 7,10 7,9 6,9 4,9 4,10 6,10 6,11 5,11 4,11 4,12 4,13 4,14 5,14"></polygon>
                          <polygon points="20,10 22,10 22,11 21,11 21,12 22,12 22,13 20,13 20,14 22,14 23,14 23,13 23,12 23,11 23,10 23,9 22,9 20,9 	"></polygon>
                          <path d="M19.519,6.383C19.643,6.574,19.738,6.782,19.816,7H20h3h1h1c0.551,0,1,0.448,1,1v3h-1v-1h-1v9 h-2v-2v-1h-1v1v2h-2v-1.78c-0.289,0.26-0.627,0.463-1,0.595V26c0,0.553,0.447,1,1,1h5c0.553,0,1-0.447,1-1v-9c1.104,0,2-0.896,2-2 V8c0-1.105-0.896-2-2-2h-1h-0.056C24.594,5.364,25,4.48,25,3.5C25,1.567,23.434,0,21.5,0S18,1.567,18,3.5 c0,0.736,0.229,1.418,0.617,1.981C18.861,5.834,19.166,6.14,19.519,6.383 M19,20h2v6h-2V20z M24,26h-2v-6h2V26z M26,15 c0,0.552-0.449,1-1,1v-4h1V15z M21.5,1C22.879,1,24,2.121,24,3.5C24,4.879,22.879,6,21.5,6C20.121,6,19,4.879,19,3.5 C19,2.121,20.121,1,21.5,1"></path>
                        </svg>
                      </div>
                      <div class="unit-body">
                        <h6>Join Our Team</h6><a class="link" href="mailto:#">info@Acclook.org</a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-horizontal unit-middle">
                      <div class="unit-left">
                        <svg class="svg-color-primary svg-sizing-35" x="0px" y="0px" width="72px" height="72px" viewbox="0 0 72 72">
                          <path d="M36.002,0c-0.41,0-0.701,0.184-0.931,0.332c-0.23,0.149-0.4,0.303-0.4,0.303l-9.251,8.18H11.58 c-1.236,0-1.99,0.702-2.318,1.358c-0.329,0.658-0.326,1.3-0.326,1.3v11.928l-8.962,7.936V66c0,0.015-0.038,1.479,0.694,2.972 C1.402,70.471,3.006,72,5.973,72h30.03h30.022c2.967,0,4.571-1.53,5.306-3.028c0.736-1.499,0.702-2.985,0.702-2.985V31.338 l-8.964-7.936V11.475c0,0,0.004-0.643-0.324-1.3c-0.329-0.658-1.092-1.358-2.328-1.358H46.575l-9.251-8.18 c0,0-0.161-0.154-0.391-0.303C36.703,0.184,36.412,0,36.002,0z M36.002,3.325c0.49,0,0.665,0.184,0.665,0.184l6,5.306h-6.665 h-6.665l6-5.306C35.337,3.51,35.512,3.325,36.002,3.325z M12.081,11.977h23.92H59.92v9.754v2.121v14.816L48.511,48.762 l-10.078-8.911c0,0-0.307-0.279-0.747-0.548s-1.022-0.562-1.684-0.562c-0.662,0-1.245,0.292-1.686,0.562 c-0.439,0.268-0.747,0.548-0.747,0.548l-10.078,8.911L12.082,38.668V23.852v-2.121v-9.754H12.081z M8.934,26.867v9.015 l-5.091-4.507L8.934,26.867z M63.068,26.867l5.091,4.509l-5.091,4.507V26.867z M69.031,34.44v31.559 c0,0.328-0.103,0.52-0.162,0.771L50.685,50.684L69.031,34.44z M2.971,34.448l18.348,16.235L3.133,66.77 c-0.059-0.251-0.162-0.439-0.162-0.769C2.971,66.001,2.971,34.448,2.971,34.448z M36.002,41.956c0.264,0,0.437,0.057,0.546,0.104 c0.108,0.047,0.119,0.059,0.119,0.059l30.147,26.675c-0.3,0.054-0.79,0.207-0.79,0.207H36.002H5.98H5.972 c-0.003,0-0.488-0.154-0.784-0.207l30.149-26.675c0,0,0.002-0.011,0.109-0.059C35.555,42.013,35.738,41.956,36.002,41.956z"></path>
                        </svg>
                      </div>
                      <div class="unit-body">
                        <h6>Contact Us</h6><a class="link" href="mailto:#">info@AccLook.org</a>
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="group-md group-middle">
                  <div class="group-item">
                    <ul class="list-inline list-inline-xs">
                      <li><a class="icon icon-corporate fa fa-facebook" href="#"></a></li>
                      <li><a class="icon icon-corporate fa fa-twitter" href="#"></a></li>
                      <li><a class="icon icon-corporate fa fa-google-plus" href="#"></a></li>
                      <li><a class="icon icon-corporate fa fa-instagram" href="#"></a></li>
                    </ul>
                  </div><a class="button button-sm button-gray-outline" href="contact_us.php">Get in Touch</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-classic-aside footer-classic-darken">
          <div class="container">
            <div class="layout-justify">
              <p class="rights">
                <span>Gaming Community <a href="home.php">AccLook</a></span></p>
              <nav class="nav-minimal">
                <ul class="nav-minimal-list">
                  <li class="active"><a href="home.php">Home</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">News</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </footer>
      <!-- Modal Video-->
      <div class="modal modal-video fade" id="modal1" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" width="560" height="315" data-src="https://www.youtube.com/embed/uSzNA2_y46c"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>
