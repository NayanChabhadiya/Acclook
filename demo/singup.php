
<?php
//including the database connection file
include_once("connection.php");

// Check If form submitted, insert user data into database.
if (isset($_POST['signup'])) {
		$name     = $_POST['name'];
		$email    = $_POST['email'];
		$password = $_POST['password'];

		// If email already exists, throw error
		$email_result = mysqli_query($conn, "select * from users where email='$email' and password='$password'");

		// Count the number of row matched
		$user_matched = mysqli_num_rows($email_result);

		// If number of user rows returned more than 0, it means email already exists
		if ($user_matched > 0) {
				echo "<br/><br/><strong>Error: </strong> User already exists with the email id '$email'.";
		} else {
				// Insert user data into database
				$e_password = md5($password);// encrypt password
				$result   = mysqli_query($conn, "INSERT INTO users(name,email,password,created_at) VALUES('$name','$email','$e_password',now())");

				// check if user data inserted successfully.
				if ($result) {
					echo "<script type='text/javascript'> alert('Successfully Registered In ACCLOOK')</script>";
					echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
					exit();
				} else {
						echo "Registration error. Please try again." . mysqli_error($conn);
						exit();
				}
		}
}

?>
