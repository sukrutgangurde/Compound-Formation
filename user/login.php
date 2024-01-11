<?php include('../config.php')?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Online Shop</title>

	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet"> 
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/mystyle.css" rel="stylesheet">
</head>

<?php
$msg='';
if(isset($_POST['save']))
{
    
    if (isset($_POST['email']) && isset($_POST['pass'])) 
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $q = "SELECT * FROM users WHERE umail='".$email."' AND upass='".$pass."'";

        $result = mysqli_query($conn,$q);
       
     
	    if(mysqli_num_rows($result) > 0)
	    {

	    	$row =mysqli_fetch_assoc($result);
	        $_SESSION['uid'] = $row['uid'];
	        $_SESSION['umail']=$row['umail'];
	        $_SESSION['uname']=$row['uname'];

	        // print_r($_SESSION['uid']);exit();

	        if(isset($_SESSION['cart']))
		    {
		        ?>
		        <script>
					location.href='checkout.php';
				</script> 
			<?php
		    }
		    else
		    {
		        ?>
		        <script>
					location.href='index.php';
				</script> 
			<?php 
		    }
	    
	    }
	    else
	    {
	        $msg="Invalid Email ID/Password";
	    }

	    

	}
}

?>

<body style="">

	<div style="background:url('../images/980.jpg'); background-position:center; background-repeat:no-repeat;background-size:cover;  height:100vh;  ">
	
	
			<!-- <div class="text-center mt-7" style="color:black; font-size:24px; font-weight:900; " >
				<h1 class="mt-7"><b style="color:black;">Welcome</b></h1> 
				<p>
					<b>Log in to your account to continue</b>
				</p>
			</div> -->

			<div class="col-md-10 offset-md-1">
				<div class="row">

					<div class="col-md-5 m-2">
						<div class="card position-absolute start-50 translate-middle-x" style="width:400px;height:450px; border-radius:10px;  box-shadow:-3px -3px 9px black, 3px 3px 7px black; background-color:rgba(255, 255, 255, 0.412);">
							<div class="card-body  text" style="background-color:rgba(255, 255, 255, 0.412); color:black; backdrop-filter:blur(10px); ">
								

									<?php

							                if($msg){
							                        ?>
							                            <div class="alert alert-danger" role="alert" style='text-align:center;color:red'>
							                              <p><?php echo $msg; ?></p>
							                            </div>

							                        <?php
							                }

							            ?>

                                    <form method="POST">
    									<div class="text-center">
    										<img src="../images/logo.png" class="img-fluid rounded-circle" width="100" height="100" />
    									</div>

										<div class="mb-3">
											<label class="form-label"><b>Email</b></label>
											<input class="form-control" type="email" name="email" value=""  placeholder="Enter your email" pattern="^[a-z]+[0-9]*@[a-z]+\.[a-z]{2,3}$" required />
										</div>
										<div class="mb-3">
											<label class="form-label"><b>Password</b></label>
											<input class="form-control" type="password" name="pass" value="" placeholder="Enter your password" required/>
                                            
										</div>
										
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-primary btn-block" name="save">Login</button>
										</div>

                                        <div class="text-center mt-3">Don't Have an Account?
                                            <a href="register.php" class="text-danger"><b>Register Here</b></a>
										</div>
									</form>
								
							</div>
						</div>
					</div>
					
					

					<!-- <div class="col-md-5">
						<img src="../images/login.jpg" style="width: 500px;height: 500px;">
					</div> -->
				</div>
			</div>
		</div>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js" integrity="sha512-7Au1ULjlT8PP1Ygs6mDZh9NuQD0A5prSrAUiPHMXpU6g3UMd8qesVnhug5X4RoDr35x5upNpx0A6Sisz1LSTXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="script1.js"></script>
</body>
</html>

