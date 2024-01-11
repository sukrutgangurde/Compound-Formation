<?php include('header.php');

if(empty($_SESSION['aid']))
{
    ?>
    <script>location.href="login.php"</script>
    <?php
}
else
{
    if(isset($_GET['delete_id']))
    {
        $delete_id=$_GET['delete_id'];
        $sql="DELETE FROM `users` WHERE uid='".$delete_id."' ";
        
        if(mysqli_query($conn,$sql))
        {
             echo"<script>alert('Removed Successfully ...')</script>";
        }
        else
        {
             echo" <script>alert('Sorry Data Could Not Deleted ! ...')</script>";
        }
    }
}
?>

<div id="page-wrapper">
    <div class="alert alert-default" style="color:white;background-color:#008CBA">
        <center>
        <h5>Customer Deatils</h5>
        </center>
    </div>

    <table id="tblrecord" class="table  w-100 table-bordered ">

        <a href='addcustomer.php' class="btn btn-primary" style="float: right;">Add</a><br><br>                                                                                          
        <thead style="text-align:center; color: white;">
            <tr>
                <th style="color:white;">Name</th>
                <th style="color:white;">Email</th>
                <th style="color:white;">Address</th>
                <th style="color:white;">Phone</th>
                <th width="150" style="color:white;">Actions</th>
            </tr>
        </thead>
        
            <tbody>
                <?php
                    $sql=mysqli_query($conn,"SELECT * FROM `users`");
                   
                    if(mysqli_num_rows($sql)>0)
                    {
                        while($row=mysqli_fetch_assoc($sql))
                        {  
                            ?>

                        <tr>
              
                            <td><?php echo $row['uname']; ?></td>
                            <td><?php echo $row['umail']; ?> </td>
                            <td><?php echo $row['uaddr']; ?></td>
                            <td><?php echo $row['uphno']; ?></td>
                            
                            <td>
                            <a class="btn btn-success" href="vieworders.php?view_id=<?php echo $row['uid']; ?>">
                            <i class="fas fa-eye"></i></a> 

                            <a class="btn btn-danger" href="?delete_id=<?php echo $row['uid']; ?>" onclick="return confirm('Are you sure to remove this customer?')">
                            <i class="fas fa-trash"></i></a>

                            </td>
                        </tr>

                    <?php   
                         }
                    }   
                    ?>
            </tbody>
        </table>
</div>
<br><br>
<?php include('footer.php');?>