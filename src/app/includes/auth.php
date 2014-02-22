<?php
session_start();
require_once('flintstone.class.php');
try {
    // Set options
    $options = array('dir' => '../db');
    // Load the databases
    $users = Flintstone::load('users', $options);

    if(isset($_POST['email']) && isset($_POST['password'])){
    	$key = str_replace(array('@', '.', ' '), '', $_POST['email']);
		$user = $users->get($key);
		if(password_verify($_POST['password'], $user['password'])){
			$_SESSION['id'] = $user['id'];
			$_SESSION['user'] = $user['email'];
            $_SESSION['level'] = $user['level'];
			header('Location: ../../?p=home');
		} else {
			$_SESSION['alert'] = "Invalid email/password combination. Please try again.";
			header('Location: ../../?p=login');
		}
	} else {
		$_SESSION['alert'] = "Invalid login. Please enter your email and password.";
		header('Location: ../../?p=login');
	} 
}
catch (FlintstoneException $e) {
    $_SESSION['alert'] = "Database Error: ".$e->getMessage();
	header('Location: ../../?p=home');
}
?>