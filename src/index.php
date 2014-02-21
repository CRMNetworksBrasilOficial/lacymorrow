<?php
  session_start();
  if(isset($_SESSION['user'])){
      $auth = true;
      $user = $_SESSION['user'];
  } else { $auth = false; }

  $theme = 'app';
  require_once($theme.'/includes/functions.php');
  // Allow the public to view instrument database
  $public_browse = true;
  $page = (isset($_GET['p'])) ? $_GET['p'] : 'home';
  $valid_page = include_once($theme.'/views/'.$page.'.php');

  // 404 ERROR
  if(!$valid_page){ require_once($theme.'/views/404.php'); } 
?>