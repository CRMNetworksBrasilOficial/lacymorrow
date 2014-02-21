<?php 
if(!$auth && !$public_browse){ 
	$_SESSION['alert'] = 'Please log in to access the requested page.';
	header('Location: ./?p=home'); 
}
include_once('header.php'); 
if(isset($_SESSION['alert'])){ ?>
	<h4 class="bg-info lead text-center"><?php echo $_SESSION['alert']; ?></h4>
<?php unset($_SESSION['alert']);
} ?>

<h1>Browse Instruments</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Type</th>
			<th>Location</th>
			<th>Checked out to</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1000</td>
			<td>Myers Park High</td>
			<td>Clarinet</td>
			<td>
				<?php if($checkedout){ ?>
					<a href="?p=user&u=lacymorrow">lacymorrow@me.com</a></td>
				<?php } ?>
			<td>
				<?php if($_SESSION['level'] == 'admin'){ ?>
					<a href="?p=delete&i=1&u=1"><button type="button" class="btn btn-danger ">Delete</button></a>
				<?php } ?>
			</td>
			<td>
				<?php if($checkedout){ ?>
					<a href="?p=instrument&i=1&u=1"><button type="button" class="btn btn-info">View</button></a>
				<?php } else { ?>
					<a href="?p=checkout&i=1&u=1"><button type="button" class="btn btn-info">Checkout</button></a>
				<?php } ?>
			</td>

		</tr>
	</tbody>
</table>
<h4 class="bg-info lead text-center">A blue background indicates that the instrument is currently checked out.</h4>
<?php include_once('footer.php'); ?>