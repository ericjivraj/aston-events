<?php // Declaring Variables
include("dbconnect.php");

$username = $_POST['username'];
$password = SHA1 ($_POST['password']);  // SHA1 Encrypting Password
$password1 = SHA1 ($_POST['password1']);
$email = $_POST['email'];
$phone = $_POST['phone'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

	// Start validating
		if($username<>"" AND $password<>"" AND $password1<>"" AND $email<>"" AND $phone<>"" AND $fname<>"" AND $lname<>"") { //Check for any empty inputs
			if($password==$password1) { // Check if passwords match
				if(strlen($_POST['password'])>=6) { // Password has to be bigger than 6 characters
					 if(!$connect) { // If you can't connect display the error
						die("Cannot connect to the database:".mysqli_error()); // Error Message
					}
					if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM organiser WHERE username = '$username'"))) { // Check if there isn't an username with the same username already
						header("Location: error_username.php"); // Error message which says the given username is already in use
					} elseif(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM organiser WHERE email = '$email'"))) {
						header("Location: error_email.php");
					} else { // If the data is valid
					mysqli_query($connect, "INSERT INTO organiser (org_id, username, password, email, phone, fname, lname) VALUES (default, '$username', '$password','$email', '$phone', '$fname', '$lname')");

				  header("Location: success.php"); // Success message
					echo "You have successfully registered with us!";
					}
				} else {

					header("Location: error_passchar.php"); // Error Message because Passwords must be 6 characters minimum
				}
			} else {
				echo "Passwords don't match!";
				header("Location: error_passno.php"); // Error Message because Passwords don't match
			}
		} else {
			echo "Campos vazios ou preenchidos incorrectamente";
			header("Location: error_emptyorerror.php"); // Error Message because fields are either empty or wrongly filled in
		}
	// End of Validation
?>
