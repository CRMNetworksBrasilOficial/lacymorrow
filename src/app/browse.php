<?php 
if(!$auth){ 
	$_SESSION['alert'] = 'Please log in to access the requested page.';
	header('Location: ./?p=home'); 
}
include_once('inc/header.php'); ?>

<div class="page-header">
  <h1>Browse Instruments</h1>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Type</th>
			<th>Location</th>
			<th>Current User ID</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1000</td>
			<td>Myers Park High</td>
			<td>Clarinet</td>
			<td><a href="?p=user&u=1">001</a></td>
		</tr>
		<tr class="info">
			<td>1000</td>
			<td>Myers Park High</td>
			<td>Clarinet</td>
			<td><a href="?p=user&u=1">001</a></td>
		</tr>
	</tbody>
</table>
<h4 class="bg-info lead text-center">A blue background indicates that the instrument is currently checked out.</h4>
<?php include_once('inc/footer.php'); ?>