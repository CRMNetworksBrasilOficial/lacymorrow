<?php include_once('inc/header.php');
if(isset($_SESSION['alert'])){ ?>
	<h4 class="bg-info lead text-center"><?php echo $_SESSION['alert']; ?></h4>
<?php unset($_SESSION['alert']);
} ?>

<div class="page-header">
  <h1>Instrument Manager</h1>
</div>
<p class="lead">Welcome to the instrument mangager. Lorem ipsum.</p>

<?php include_once('inc/footer.php'); ?>