<?php
session_start();
//including the database connection file
include_once("connection.php");

// Check If form submitted, insert user data into database.
if(isset($_POST['signup']))
	{
		$name = $_POST['name'];
		$mobile_no = $_POST['mobile_no'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$c_password = $_POST['c_password'];
		$filename = $_FILES["profile_pic"]["name"];
	  $tempname = $_FILES["profile_pic"]["tmp_name"];
	  $folder = "admin/uploads/user_profiles/".$filename;
	  move_uploaded_file($tempname,$folder);

		$sql=mysqli_query($conn,"SELECT * FROM users where email='$email'");
		if(mysqli_num_rows($sql)>0)
		{
		  echo "<script> alert('Email Id Already Exists') </script>";
		  echo "<script type='text/javascript'> document.location = 'signup.php'; </script>";
		  exit;
		}
		else{
			if($password != $c_password){
				echo "<script> alert('Password and Confirm Password dose not metch....') </script>";
			}
			else{
				$e_password = md5($password);// encrypt password
				$result   = mysqli_query($conn, "INSERT INTO users(name,mobile_no,email,password,profile_pic,created_at,updated_at) VALUES('$name','$mobile_no','$email','$e_password','$folder',now(),now())");

				// check if user data inserted successfully.
				if ($result) {

					echo "<script type='text/javascript'> alert('Successfully Registered In ACCLOOK')</script>";
					echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
					exit();
				}
				else {
					echo "<script type='text/javascript'> alert('Registeration Failed')</script>";
					echo "<script type='text/javascript'> document.location = 'signup.php'; </script>";
					exit();
				}
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->

    <link rel="stylesheet" type="text/css" href="css/util1.css">
	<link rel="stylesheet" type="text/css" href="css/main1.css">
	<link rel="stylesheet" type="text/css" href="css/upload_profile.css">
<!--===============================================================================================-->
</head>
<body>
    <div class="bg-contact3" style="background-image: url('images/hero-bg.jpg');">
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
							<li class="nav-item">
								<a href="home.php" class="get-started-btn scrollto ">Skip</a>
							</li>
			            </ul>
			        </div>
		        </nav>
		    </div>
	    </header>
	</div>

	<div class="limiter" style="background-image: url('images/hero-bg.jpg');">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>
				<div class="well row pt-2x pb-3x bk-light text-center">
				<form class="login100-form validate-form form-horizontal" method="post" action="signup.php" enctype="multipart/form-data">
					<span class="login100-form-title">
						Sign up
					</span>

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

					<div class="wrap-input100 validate-input" data-validate = "Enter valid name">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter valid Mobile Number">
						<input class="input100" type="text" minlength="10" maxlength="10" name="mobile_no" placeholder="Enter Mobile no.">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-mobile" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
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

					<div class="wrap-input100 validate-input" data-validate = "Confirm Password is required">
						<input class="input100" type="password" name="c_password" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="signup">
							REGISTER
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="login.php">
						    Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="js/upload_profile.js"></script>

</body>
</html>
