<?php

// Start PHP session at the beginning
session_start();

// Create database connection using config file
include_once("../connection.php");

// If form submitted, collect email and password from form
if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Check if a Admin exists with given Adminname & password
    $e_password = md5($password);
    $result = mysqli_query($conn, "select * from admin
        where email='$email' and password='$e_password'");

    // Count the number of Admin/rows returned by query
    $admin_total = mysqli_num_rows($result);

    // Check If Admin matched/exist, store Admin email in session and redirect to sample page-1
    if ($admin_total==1) {

        $_SESSION["admin_email"] = $email;
        header("location:index.php");
    } else {
        echo "Admin email or password is not matched <br/><br/>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util1.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="bg-contact3" style="background-image: url('../images/hero-bg.jpg');">
		<header id="header" class="fixed-top ">
	    	<div class="container-fluid d-flex align-items-center d-flex justify-content-between">
				<div class="logoset">
					<div class="logo">

					</div>
				</div>

                <nav class="navbar navbar-expand-md">
			        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			             <span class="navbar-toggler-icon"></span>
			        </button>

			        <div class="collapse navbar-collapse" id="collapsibleNavbar">
			            <ul class="navbar-nav">
				            <li class="nav-item">
				          	    <a href="index.php" class="get-started-btn scrollto ">Home</a>
				            </li>
							<!-- <li class="nav-item">
								<a href="#" class="get-started-btn scrollto ">Skip</a>
							</li> -->
			            </ul>
			        </div>
		        </nav>
		    </div>
	    </header>
	</div>

	<div class="limiter"  style="background-image: url('../images/hero-bg.jpg');">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="login.php" method="post">
					<span class="login100-form-title">
					Admin	Login
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>

					<!-- <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Adminname / Password?
						</a>
					</div> -->

					<!-- <div class="text-center p-t-136">
						<a class="txt2" href="signup.php">
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							Create your Account
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>
