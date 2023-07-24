<?php

session_start();
error_reporting(0);
include "connection.php";

  if (isset($_POST['send_message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $message = $_POST['message'];

    if ($name != "" && $email != "" && $phone != "" && $company != "" && $message != "") {

    $message_query = mysqli_query($conn,"INSERT INTO `contects`(`name`, `email`, `phone`, `company_name`, `message`, `contected_at`) VALUES ('$name','$email','$phone','$company','$message',now())");

    if ($message_query) {

      echo "<script type='text/javascript'> alert('Message Sent Successfully In ACCLOOK')</script>";
      echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
      exit();
    }
    else {
      echo "<script type='text/javascript'> alert('Failed To Send Message In ACCLOOK')</script>";
      echo "<script type='text/javascript'> document.location = 'contact_us.php'; </script>";
      exit();
    }
    }

  }

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/Contact_us/fonts/icomoon/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/Contact_us/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/Contact_us/css/style.css">

    <title>Contact Us</title>
  </head>
  <body>


  <div class="content">

    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-8">
          <div class="form h-100">
            <h3>Send us a message</h3>
            <form class="mb-5" method="post" id="contactForm" name="contactForm">
              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Name </label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Your name" required>
                </div>
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Email </label>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Your email" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Phone</label>
                  <input type="text" class="form-control" name="phone" id="phone"  placeholder="Phone #" required>
                </div>
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Company</label>
                  <input type="text" class="form-control" name="company" id="company"  placeholder="Company  name" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group mb-5">
                  <label for="message" class="col-form-label">Message </label>
                  <textarea class="form-control" name="message" id="message" cols="30" rows="4"  placeholder="Write your message" required></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4" name="send_message">
                  <span class="submitting"></span>
                </div>
              </div>
            </form>

            <div id="form-message-warning mt-4"></div>
            <div id="form-message-success">
              Your message was sent, thank you!
            </div>

          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-info h-100">
            <h3>Contact Us</h3>
            <p class="mb-5">We are available for 24*7, describe your mind to us.</p>
            <ul class="list-unstyled">
              <li class="d-flex">
                <span class="wrap-icon icon-room mr-3"></span>
                <span class="text">4080 Rejoicehub Solutions, Surat</span>
              </li>
              <li class="d-flex">
                <span class="wrap-icon icon-phone mr-3"></span>
                <span class="text">+91 7567240082</span>
              </li>
              <li class="d-flex">
                <span class="wrap-icon icon-envelope mr-3"></span>
                <span class="text">acclook@gmail.com</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>
