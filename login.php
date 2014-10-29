<?php

include 'core/init.php';

if (logged_in() == false) {
	session_destroy();
	session_start();
}

if (empty($_POST) === false) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) || empty($password)) {
		$errors[] = "You need enter a username and password";

	 } elseif (user_exists($username) === false) {
	 	$errors[] = "We cannot find that username. Please register.";

	} elseif (password_check($password) === false) {
	 	$errors[] = "Your password does not match the username.";

	} else {
		$result = get_user_info($username);
		
		include 'includes/overall/overall_header.php';
		echo "<br>user_id: " . $_SESSION['user_id'];
		echo "<br>username: " . $_SESSION['username'];
		echo "<br>password: " . $_SESSION['password'];
		echo "<br>first_name: " . $_SESSION['first_name'];
		echo "<br>last_name: " . $_SESSION['last_name'];
		echo "<br>email: " . $_SESSION['email'];
		echo "<br>active: " . $_SESSION['active'];
		include 'includes/overall/overall_footer.php';
	}

}


if (empty($errors) == false) {

	session_destroy();
	unset($_SESSION);

	include 'includes/overall/overall_header.php';

	echo "*****errors*****<br>";

	foreach($errors as $key=>$value) {
	  echo $value;
	  echo "<br>";
	}

	include 'includes/overall/overall_footer.php';

} 

?>

<script>
document.getElementById("username").focus();
</script>