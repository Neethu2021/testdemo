<?php 
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	

	<?php 
	$error_message = "";$success_message = "";

	// Register user
	if(isset($_POST['btnsignup'])){
		$fname = trim($_POST['fname']);
		$dept = trim($_POST['dept']);
		$sem = trim($_POST['sem']);
		$dob = trim($_POST['dob']);
		$uninumber = trim($_POST['uninumber']);
		$phnum = trim($_POST['phnum']);
		$address = trim($_POST['address']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$confirmpassword = trim($_POST['confirmpassword']);

		$isValid = true;

		// Check fields are empty or not
		if($fname == '' || $dept == '' || $sem == '' || $dob == '' || $uninumber == '' || $phnum == '' || $address == '' || $email == '' || $password == '' || $confirmpassword == ''){
			$isValid = false;
			$error_message = "Please fill all fields.";
		}

		// Check if confirm password matching or not
		if($isValid && ($password != $confirmpassword) ){
			$isValid = false;
			$error_message = "Confirm password not matching.";
		}

		// Check if Email-ID is valid or not
		if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  	$isValid = false;
		  	$error_message = "Invalid Email-ID.";
		}

		if($isValid){

			// Check if Email-ID already exists
			$stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			if($result->num_rows > 0){
				$isValid = false;
				$error_message = "Email-ID is already existed.";
			}
			
		}

		// Insert records
		if($isValid){
			$insertSQL = "INSERT INTO users(fname,dept,sem,dob,uninumber,phnum,address,email,password ) values(?,?,?,?,?,?,?,?,?)";
			$stmt = $con->prepare($insertSQL);
			$stmt->bind_param("sssssssss",$fname,$dept,$sem,$dob,$uninumber,$phnum,$address,$email,$password);
			$stmt->execute();
			$stmt->close();

			$success_message = "Account created successfully.";
		}
	}
	?>
</head>
<body bgcolor="#c5d052f0" style="background-color:#c5d052f0">
	<div class='container'>
		<div class='row'>
			<div class='col-md-12'>
				<h2></h2>
			</div>

			<div class='col-md-6' >
					
				<form method='post' style="margin:0  auto"   action=''>

					<h2 align="justify" style="color:#000099;">Registration</h2>
					<?php 
					// Display Error message
					if(!empty($error_message)){
					?>
						<div class="alert alert-danger">
						  	<strong>Error!</strong> <?= $error_message ?>
						</div>

					<?php
					}
					?>

					<?php 
					// Display Success message
					if(!empty($success_message)){
					?>
						<div class="alert alert-success">
						  	<strong>Success!</strong> <?= $success_message ?>
						</div>

					<?php
					}
					?>
				
					<div class="form-group">
					    <label for="fname">First Name:</label>
					    <input type="text" class="form-control" style="width:70%;"  name="fname" id="fname" required="required" maxlength="80">
					</div>
						<div class="form-group">
					    <label for="fname"> Department:</label>
					    <input type="text" class="form-control" style="width:70%;"  name="dept" id="dept" required="required" maxlength="80">
					</div>
						<div class="form-group">
					    <label for="fname">Semester</label>
					    <input type="text" class="form-control"  style="width:70%;"  name="sem" id="sem" required="required" maxlength="80">
					</div>
						<div class="form-group">
					    <label for="fname">Date of Birth</label>
					    <input type="text" class="form-control"  style="width:70%;"  name="dob" id="dob" required="required" maxlength="80">
					</div>
						<div class="form-group">
					    <label for="fname">University Number:</label>
					    <input type="text" class="form-control" style="width:70%;"  name="uninumber" id="uninumber" required="required" maxlength="80">
					</div>
						<div class="form-group">
					    <label for="fname">Phone number:</label>
					    <input type="text" class="form-control" style="width:70%;"  name="phnum" id="phnum" required="required" maxlength="80">
					</div>
						<div class="form-group">
					    <label for="fname">Address:</label>
					    <input type="textarea" class="form-control" style="width:70%;"  name="address" id="address" required="required" maxlength="80">
					</div>
				
					<div class="form-group">
					    <label for="email">Email address:</label>
					    <input type="email" class="form-control" style="width:70%;"  name="email" id="email" required="required" maxlength="80">
					</div>
					<div class="form-group">
					    <label for="password">Password:</label>
					    <input type="password" class="form-control" style="width:70%;"   name="password" id="password" required="required" maxlength="80">
					</div>
					<div class="form-group">
					    <label for="pwd">Confirm Password:</label>
					    <input type="password" class="form-control" style="width:70%;"  name="confirmpassword" id="confirmpassword" required="required" maxlength="80">
					</div>
					
					<button type="submit" name="btnsignup" class="btn btn-default">Submit</button>
				</form>
				
			</div>
			
 
	
 
	 
 


 

			
		</div>
	</div>
 
 
<html>  
 <head>  
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    
   
    <br />
     
   </div>  
  </div>  
 </body>  
</html>
 
</body>
</html>