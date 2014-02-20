<?php
  session_start();
  if(isset($_SESSION['user'])){
      $auth = true;
      $user = $_SESSION['user'];
  } else { $auth = false; }

  $theme = 'app';
  require_once($theme.'/functions.php');
  // Allow the public to view instrument database
  $public_browse = true;
  $page = (isset($_GET['p'])) ? $_GET['p'] : 'home';
  $included = include_once($theme.'/'.$page.'.php');

  // 404 ERROR
  if(!$included){ 
    include_once($theme.'/inc/header.php'); ?>

    <div class="page-header">
      <h1>Whoops!</h1>
    </div>
    <p class="lead">You are quite the explorer to get here, unfortunately you found a page that doesn't exist!
    <a href="./">Click here to teleport home.</a></p>

<?php  include_once($theme.'/inc/footer.php');
} ?>