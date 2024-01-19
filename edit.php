 <?php require_once"app/db.php" ?>
  <?php require_once"app/functions.php" ?>

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
		


		if ( isset($_POST['update-student']) ) {
			// Recieve data
	  		$name =$_POST['name'];
	  		$email =$_POST['email'];
	  		$cell  =$_POST['cell'];
	  		$location =$_POST['location']; 

	  		// photo manage 

	  		$new_photo = $_FILES['new_photo']['name'];
	  		$old_photo = $_POST['old_photo'];

	  		if (empty($new_photo)) {
	  			$photo_name = $old_photo; 
	  		}else{
	  			$data = fileupload($_FILES['new_photo'], 'photos/');
	  			$photo_name = $data['file_name'];
	  		}

	  		      /**location
	  			  * Form validation
	  			  */
	  			if (empty($name)|| empty($email) || empty($cell)|| empty($location)) {
	  				$mess= "<p class='alert alert-danger'>All firlds are required <button class='close' data-dismiss='alert'>&times;</button></p>";
	  			}elseif( filter_var($email, FILTER_VALIDATE_EMAIL) == false){

	  				$mess =  "<p class='alert alert-info'> Invalid Email format! <button class='close' data-dismiss='alert'>&times;</button></p>";


	  			}else{
                       
                       $sql = "UPDATE students SET name='$name', email='$email', cell='$cell', location='$location', photo='$photo_name' WHERE id='$id'";
		               $data = $connection -> query($sql);
		               $mess =  "<p class='alert alert-success'> Data Update Successfully! <button class='close' data-dismiss='alert'>&times;</button></p>";
	  				
	  			}  
	  		}


	  		// old data 
	  		$sql = "SELECT * FROM students WHERE id='$id'";
		    $data = $connection -> query($sql);

		    $single_student_data = $data -> fetch_assoc();


	 ?>
	  

	<div class="wrap shadow">
		<a class="btn btn-success btn-sm" href="all-student.php">All Students</a>
		<div class="card">
			<div class="card-body">

				<?php 
					if (isset($mess)) {
					 	echo $mess;
					 } 
				 ?>
				
				<h2>Edit Single Student</h2>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $id; ?> " method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input  name="name" class="form-control" value="<?php echo $single_student_data['name'] ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="<?php echo $single_student_data['email'] ?>" type="text">
					</div>
					<div class="form-group">
			 			<label for="">Cell</label>
						<input name="cell" class="form-control" value="<?php echo $single_student_data['cell'] ?>" type="text">
					</div>
					<div class="form-group">
						<label for="">Location</label>
						<input name="location" class="form-control" value="<?php echo $single_student_data['location'] ?>" type="text">
					<div  class="form-group"> 
						<input type="hidden" name="old_photo" value="<?php echo $single_student_data['photo'] ?>">
						<img style="width: 150px" src="photos/<?php echo $single_student_data['photo'] ?>">
					</div>

					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="new_photo" class="form-control" type="file">
					</div>
					<div class="form-group">
						<input name="update-student"  class="btn btn-primary" type="submit" value="Update Student Info">
					</div>
				</form>
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