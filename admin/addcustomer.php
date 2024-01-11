<?php include('header.php');

if(empty($_SESSION['aid']))
{
    ?>
    <script>location.href="login.php"</script>
    <?php
}
else
{
    if(isset($_POST['save']))
    {
        echo $sql=mysqli_query($conn,"INSERT INTO users(`uname`,`umail`,`upass`,`uaddr`,`uphno`)VALUES('".$_POST['uname']."','".$_POST['umail']."','".$_POST['upass']."','".$_POST['uaddr']."','".$_POST['uphno']."')");
        if($sql==TRUE)
        {
            echo "<script>alert('Data successfully saved!')</script>";
            ?>
            <script>location.href='customerdetails.php'</script>
            <?php
        }
        else
        {
            echo "<script>alert('Something went wrong!')</script>";
        }
    }
}

?>
<div id="page-wrapper">
    <div class="alert alert-default" style="color:white;background-color:#008CBA">
        <center>
        <h5>Add Customer</h5>
        </center>
    </div>

    <div class="col-md-10">
            <form action="" method="post" enctype="multipart/form-data">
                    <label>Name:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="Name" name="uname" type="text" required><br>
                    </div>

                    <label>Email:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="mail" name="umail" type="text" required><br>
                    </div>
                    
                    <label>Mobile no:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="phone" name="uphno" type="text" required><br>
                    </div>

                    <label>Address:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="address" name="uaddr" type="text" required><br>
                    </div>

                    <label>Password:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="password" name="upass" type="password" required><br>
                    </div>

                    
                    <div class="form-group">
                        <button class="btn btn-success btn-md" name="save">Save</button>&nbsp;
                        <a class="btn btn-danger btn-md" href="index.php">Cancel</a>
                    </div>  
                    
            </form>
        </div>
</div>