<?php include('../config.php');
if(isset($_POST['save']))
{
   	$name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $addr=$_POST['addr'];
    $phone=$_POST['phone'];

    $sql=mysqli_query($conn,"SELECT * FROM users where umail='".$email."' ");
   
    if(mysqli_num_rows($sql)>0)
    {
        echo "Email Id Already Exists"; 
	    exit;
    }
    
    else
    {
		   $q="INSERT INTO users(uname,umail,upass,uaddr,uphno) VALUES('$name','$email', '$pass','$addr','$phone')";
		     if(mysqli_query($conn,$q)==TRUE)
		  
		    {	?>
		    	<script>location.href="login.php"</script>
		    	<?php

		    }
		    else
		    { ?>
		        <script>
		    	alert("Something went wrong...!Please try again.");
		    	</script>
		    	
		    	<?php
		    }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Registration</title>
    
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet"> 
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/mystyle.css" rel="stylesheet">
</head>

<body>
		<div class="container">
			<div class="text-center mt-4" style="color:#0d6efd;">
						<h2><b>Sign up<b></h2>
			</div>


			<div class="col-md-10 offset-md-1">
				<div class="row">
					
					<div class="col-md-5 m-3">
						<div class="card" style="width:400px;">
							<div class="card-body" style="background-color:#c0daff;">
								<div class="m-sm-4">
									<form method="POST" autocomplete="off">
										<div class="mb-3">
											<label class="form-label">Name</label>
											<input class="form-control" type="text" name="name" pattern="^[a-z A-Z]+$" placeholder="Enter your name" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Address</label>
											<input class="form-control" type="text" name="addr" placeholder="Enter Address" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Phone Number</label>
											<input class="form-control" type="tel" name="phone" pattern="^[0-9]{10}$" placeholder="Enter phone Number" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control" type="email" name="email" pattern="^[a-z]+[0-9]*@[a-z]+\.[a-z]{2,3}$" placeholder="Enter your email" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control" type="password" name="pass" placeholder="Enter your password" required/>
										</div>
										
										<div class="text-center mt-3">
											<button type="submit" name="save" class="btn btn-lg btn-primary">Register</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					

					<div class="col-md-5">
						<img src="../images/signup.jpg" style="width: 500px;height: 600px;">
					</div>
				</div>
			</div>
		</div>
	
</body>
</html>

