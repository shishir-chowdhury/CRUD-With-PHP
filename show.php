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

		<?php 


         $id = $_GET['id'];

         $sql = "SELECT * FROM students WHERE id='$id'";
         $data = $connection ->query($sql);
         $student_data = $data -> fetch_assoc();



		 ?>


    			<div style="width: 450px;" class="wrap-table shadow">
    				<a class="btn btn-success btn-sm" href="all-student.php">Back</a>

    			<div class="card">
    				<div class="card-body">
    					
 
    					<img style="width: 150px;" class="img-thumbnail d-block mx-auto" src="photos/<?php echo $student_data['photo'] ?>">

    					<table class="table">
    						<tr>
    							<td>Name</td>
    							<td><?php echo $student_data['name'] ?></td>
    						</tr>
    						<tr>
    							<td>Email</td>
    							<td><?php echo $student_data['email'] ?></td>
    						</tr>
    						<tr>
    							<td>Cell</td>
    							<td><?php echo $student_data['cell'] ?></td>
    						</tr>
    						<tr>
    							<td>Location</td>
    							<td><?php echo $student_data['location'] ?></td>
    						</tr>
    					</table>

    				</div>
    			</div>
    		</div>
    			


					
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>