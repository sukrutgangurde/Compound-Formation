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
        $sql=mysqli_query($conn,"INSERT INTO supplier(`sname`,`smail`,`sphno`)VALUES('".$_POST['sname']."','".$_POST['smail']."','".$_POST['sphno']."')");
        if($sql==TRUE)
        {
            echo "<script>alert('Data successfully saved!')</script>";
            ?>
            <script>location.href='supplier.php'</script>
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
        <h5>Add supplier</h5>
        </center>
    </div>

    <div class="col-md-10">
            <form action="" method="post" enctype="multipart/form-data">
                    <label>Name:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="Name" name="sname" type="text" required><br>
                    </div>

                    <label>Email:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="mail" name="smail" type="text" required><br>
                    </div>
                    
                    <label>Mobile no:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="phone" name="sphno" type="text" required><br>
                    </div>

                    
                    <div class="form-group">
                        <button class="btn btn-success btn-md" name="save">Save</button>&nbsp;
                        <a class="btn btn-danger btn-md" href="index.php">Cancel</a>
                    </div>  
                    
            </form>
        </div>
</div>