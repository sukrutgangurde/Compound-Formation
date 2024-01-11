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
        $sql = "SELECT * FROM admin WHERE amail='".$email."' AND apass='".$pass."'";
        $result = mysqli_query($conn,$sql);
        
        if (mysqli_num_rows($result) ==1) 
        {
            $fetch = mysqli_fetch_assoc($result);

            $_SESSION['amail']=$fetch['amail'];
            $_SESSION['aid']=$fetch['aid'];

             ?>
                <script>
                    location.href='index.php';
                </script> 
            <?php
        }
        else
        {
            $msg= "Incorect User name or password";
        }
        

    }
}

?>



<body>
        <div class="container mt-5">
            
            

            <div class="col-md-10 offset-md-1">
                <div class="row">

                    <div class="col-md-5 m-2">
                        <div class="card" style="width:400px;height:400px;">
                            <div class="card-body" style="background-color:#dfff94;">

                                    <?php

                                            if($msg){
                                                    ?>
                                                        <div class="alert alert-danger" role="alert" style='text-align:center;color:red'>
                                                          <p><?php echo $msg; ?></p>
                                                        </div>

                                                    <?php
                                            }

                                        ?>

                                    <div class="text-center mt-4" style="color:#2fb718;">
                                        <h3><b>Admin Login</b></h3>
                                    </div>

                                    <form method="POST" autocomplete="off" class="mt-4">
                                        <div class="mb-3">
                                            <label class="form-label"><b>Email</b></label>
                                            <input class="form-control" type="email" name="email" value=""  placeholder="Enter your email" pattern="^[a-z]+[0-9]*@[a-z]+\.[a-z]{2,3}$" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"><b>Password</b></label>
                                            <input class="form-control" type="password" name="pass" value="" placeholder="Enter your password" required/>
                                            
                                        </div>
                                        
                                        <div class="text-center mt-3">
                                            <button type="submit" name="save" class="btn" style="background-color:#aaff01; border:1px solid black;">Login</button>
                                        </div>

                                    </form>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <img src="../images/adminlogin.jpg" style="width:400px;height:400px;">
                    </div>
                </div>
            </div>
        </div>
    
</body>


</html>
