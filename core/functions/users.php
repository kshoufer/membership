<?php

function user_exists ($username) {
	$username = sanitize($username);
	$query_string = "SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'";
	$query = mysql_query($query_string);

	return (mysql_result($query, 0) == 1) ? true : false;
}

function password_check ($password) {
	$password = sanitize($password);
	$md5 = md5($password); 
	$query_string = "SELECT COUNT(user_id) FROM users WHERE password = " . "'" . $md5 . "'";
	$query = mysql_query($query_string);

	return (mysql_result($query, 0) == 1) ? true : false;
}

function user_active ($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 0");

	return (mysql_result($query, 0) == 1) ? true : false;
}

function logged_in () {
	return isset($_SESSION['username']) ? true : false;
}

function get_user_id ($username) {
	$query_string = "SELECT `user_id` FROM `users` WHERE `username` = '$username'";
	$result = mysql_query($query_string);
	
	while ($row = mysql_fetch_array($result)) {
		$user_id_result = $row['user_id'];		
	}

	return $user_id_result;
}

function get_user_info ($username) {
	$query_string = "SELECT * FROM `users` WHERE `username` = '$username'";
	$result = mysql_query($query_string);
	
	$row = mysql_fetch_array($result);

	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['password'] = $row['password'];
	$_SESSION['first_name'] = $row['first_name'];
	$_SESSION['last_name'] = $row['last_name'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['active'] = $row['active'];

	return true;
}

?>