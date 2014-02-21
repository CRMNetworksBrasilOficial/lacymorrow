<?php
session_start();
require_once('functions.php');
        if(isset($_POST['email']) && isset($_POST['password']) && strlen($_POST['password']) >= 8 ){
            $level = 'admin';
            $key = str_replace(array('@', '.', ' '), '', $_POST['email']);
            $user_added = db_add_user($key, $_POST['email'], $_POST['password'], $level);
            if($user_added === true){
                $_SESSION['alert'] = "New user ".$_POST['email']." created. You are now logged in.";
                $_SESSION['user'] = $_POST['email'];
                $_SESSION['level'] = $level;
                header('Location: ../../?p=home');
            } else {
                $_SESSION['alert'] = $user_added;
                header('Location: ../../?p=login');
            }
        } else if(isset($_POST['password']) && strlen($_POST['password']) < 8 ) {
            $_SESSION['alert'] = "Password too short. Please enter a password of at least 8 characters.";
            header('Location: ../../?p=register');
        } else {
            $_SESSION['alert'] = "Invalid registration. Please enter a valid email and password.";
            header('Location: ../../?p=register');
        }
?>