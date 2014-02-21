<?php 
if(!$auth){ 
	$_SESSION['alert'] = 'Please log in to access the requested page.';
	header('Location: ./?p=home'); 
}
$schoolsArr = db_get_schools();
include_once('header.php');
if(isset($_SESSION['alert'])){ ?>
	<h4 class="bg-info lead text-center"><?php echo $_SESSION['alert']; ?></h4>
<?php unset($_SESSION['alert']);
} ?>

<h1>Manage Schools</h1>

<div class="row">

<?php if(isset($_GET['s'])){ $sch = db_get_school($_GET['s']);?>
	<div class="col-sm-6">
		<h3>Edit #<?php echo $sch['id'].':  '.$sch['name']; ?></h3>
		<form class="form-inline" role="form" method="post" action="app/includes/update_school.php">
		  <div class="form-group">
		    <label class="sr-only" for="school-name">School Name</label>
		    <input type="text" class="form-control" name="school-name" id="school-name" placeholder="School Name">
		  </div>
		  <input type="hidden" name="id" value="<?php echo $sch['id']; ?>">
		  <button type="submit" class="btn btn-info">Edit Name</button>
		</form>
	</div>
<?php } ?>

<?php if($_SESSION['level'] == 'admin'){ ?>
	<div class="col-sm-6">
		<h3>Add a School</h3>
		<form class="form-inline" role="form" method="post" action="app/includes/add_school.php">
		  <div class="form-group">
		    <label class="sr-only" for="school-name">School Name</label>
		    <input type="text" class="form-control" name="school-name" id="school-name" placeholder="School Name">
		  </div>
		  <button type="submit" class="btn btn-default">Add School</button>
		</form>
	</div>
<?php } ?>
</div>

<h3>Browse Schools</h3>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Location</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($schoolsArr as $school) { ?>
			<tr>
				<td><?php $id = $school['id']; echo $id; ?></td>
				<td><?php echo $school['name']; ?></td>
				<td>
					<?php if($_SESSION['level'] == 'admin'){ ?>
						<a href="?p=schools&s=<?php echo $id; ?>"><button type="button" class="btn btn-info ">View</button></a>
					<?php } ?>
				</td>
				<td>
					<?php if($_SESSION['level'] == 'admin'){ ?>
						<a href="?p=delete&s=<?php echo $id; ?>"><button type="button" class="btn btn-danger ">Delete</button></a>
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php include_once('footer.php'); ?>