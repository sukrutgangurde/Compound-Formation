<?php include('head.php');

if(empty($_SESSION['uid']))
{
    ?>
     <script>location.href="login.php"</script>
    <?php
}

if(isset($_POST['save']))
{

   extract($_POST);
     $q ="UPDATE users set uname='".$_POST['uname']."' , uaddr='".$_POST['uaddr']."', uphno='".$_POST['uphno']."', umail='".$_POST['uemail']."' where uid ='".$_SESSION['uid']."'";

    if(mysqli_query($conn,$q)!=false)
    {
        $_SESSION['msg']='<div class="alert alert-success " role="alert" id="messge">
              <i class="fa-solid fa-circle-check text-success"></i>&nbsp;&nbsp;Profile updated successfully.
            </div>';
    }
    else
    {
        $_SESSION['msg']='<div class="fa-solid fa-circle-xmark alert alert-danger " role="alert" id="messge">
              <i class="fa-solid fa-circle-xmark text-danger"></i>&nbsp;&nbsp;Something went wrong.
            </div>';

    }


}

$userSql="select * from users where uid='".$_SESSION['uid']."'";
$urow=mysqli_query($conn,$userSql);
$ufetch = mysqli_fetch_assoc($urow);

?>
    <div id="page-wrapper">
        <div class="container-fluid p-0">
            <div class="col-md-12">

                <form method="POST" class="form-horizontal">


                        <div class="alert alert-default" style="background-color:black;">
                            <center>
                            <h5 style="color:white">Update Profile</h5>
                            </center>
                        </div>
                         <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>   
                        <table class="table table-bordered table-responsive">
                                <tr><td width='30%'><label class="f1">Name</label></td>
                                    <td><input class="form-control form1 " type="text" name="uname" pattern="^[a-z A-Z]+$" placeholder="Enter passanger Name" value="<?php echo $ufetch['uname'] ?>" required /></td>
                                <tr>       
                                <tr>
                                        <td><label class="form-label f1">Address</label></td>
                                        <td><input class="form-control form1" type="text" name="uaddr" 
                                            value="<?php echo $ufetch['uaddr'] ?>"
                                            placeholder="Enter Address" required />
                                        </td>
                                </tr>        
                                        <td>
                                            <label class="form-label f1">Phone Number</label></td>
                                            <td><input class="form-control form1" type="tel" name="uphno" pattern="^[0-9]{10}$" 
                                                value="<?php echo $ufetch['uphno'] ?>"
                                                placeholder="Enter phone Number" required /></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-label f1">Email</label></td>
                                            <td><input class="form-control form1" type="email" name="uemail"
                                            value="<?php echo $ufetch['umail'] ?>"
                                             pattern="^[a-z]+[0-9]*@[a-z]+\.[a-z]{2,3}$" placeholder="Enter passanger email" readonly /></td>
                                        </tr>
                                       
                                   </table>
                <button type="submit" class="btn btn-primary" name="save">Update</button>
            </form>
        </div>
    </div>
</div>

<script>

</script>
<?php include('footer.php');?>