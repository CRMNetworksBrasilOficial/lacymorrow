<?php
	session_start();
	if(isset($_POST['email']) && isset($_POST['password'])){
		$user = $_POST['email'];
		$pass = password_hash($_POST['password'],PASSWORD_BCRYPT);
		$_SESSION['user'] = $user;
		header('Location: ../../?p=home');
	} else {
		$_SESSION['alert'] = "Invalid login. Please enter your email and password.";
		header('Location: ../../?p=login');
	}

?>