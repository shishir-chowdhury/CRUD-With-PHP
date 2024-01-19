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
		 <a class="btn btn-success btn-sm" href="index.php">Add New Student</a>
		 <a class="btn btn-success btn-sm" href="search.php">Search</a>
		<div class="card">
			<div class="card-body">
				<h2>All Data</h2>
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


				/**
				 * way to catch the data
		 		* fetch_array();
		 		* fetch_assoc();  
		 		* fetch_object();
		 		* fetch_all();
		 		*/

      			$sql = "SELECT * FROM students";
				$data = $connection -> query($sql);
        
       		// showing data
			// while($fdata = $data->fetch_assoc()){
			// 	;
			// 	echo $fdata['roll'];
			// 	echo $fdata['age'];
			// 	echo $fdata['cell'];
			// 	echo "<hr>";

			// }
			 
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
					<?php endwhile; ?>
						

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
	  
      	$('a#delete-item').click(function(){
      		let val = confirm('Are you sure?');
      		if(val==true){

      			return true;
      		}else{

      			return false;
      		}
      	});
      
</script>

</body>
</html>