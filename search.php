<?php require_once"app/db.php" ?>
<?php require_once"app/functions.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>


	<div class="wrap-table shadow">
		 <a class="btn btn-success btn-sm" href="all-student.php">All Students</a>
		<a class="btn btn-warning btn-sm" href="search.php">Search Students</a>
		<div class="card">
			<div class="card-body">
				 
				<h2>All Data</h2>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
					<input type="text" placeholder="Location/Cell/Email"  name="search">
					<input type="submit" class="btn btn-info btn-sm" name="search_button" value="search">
				</form>
				<hr>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Location</th>
							<th>Photo</th>
							<th>Action</th>
							 
						</tr>
					</thead>
					<tbody>

		<?php 
 
			if (isset($_POST['search_button'])) {
				echo $search =$_POST['search'];
				$sql = "SELECT * FROM students WHERE location='$search' OR email='$search' OR cell='$search' OR name LIKE '%$search%' OR location LIKE '%$search%' OR email LIKE '%$search%'";
				$data = $connection -> query($sql);
				
			}


      		if (isset($search)):	 
			$i=1;
		    while ($fdata = $data->fetch_assoc()):
		    

	 ?>
						<tr>
							<td><?php echo $i; $i++; ?> </td>
							<td><?php echo $fdata['name'] ?></td>
							<td><?php echo $fdata['email'] ?></td>
							<td><?php echo $fdata['cell'] ?></td>
							<td><?php echo $fdata['location'] ?></td>
							<td><img src="photos/<?php echo $fdata['photo']; ?>"></td>
							<td>
								<a class="btn btn-sm btn-info" href="show.php?id=<?php echo $fdata['id']; ?>">View</a>
								<a class="btn btn-sm btn-warning" href="edit.php?id=<?php echo $fdata['id']; ?> ">Edit</a>
								<a id="delete-item" class="btn btn-sm btn-danger" href="delete.php?id=<?php echo $fdata['id']; ?>">Delete</a>
							</td>
						</tr>
					<?php endwhile; endif;?>
						

					</tbody>
				</table>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
<script>
	  
      
</script>

</body>
</html>