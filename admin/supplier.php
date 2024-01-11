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
        $sql="DELETE FROM `supplier` WHERE sid='".$delete_id."' ";
        
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
        <h5>Supplier Deatils</h5>
        </center>
    </div>

    <table id="tblrecord" class="table  w-100 table-bordered ">

        <a href='addsupplier.php' class="btn btn-success" style="float: right;">Add</a><br><br>                                                                                          
        <thead style="text-align:center;">
            <tr>
                <th style="color:white;">Name</th>
                <th style="color:white;">Email</th>
                <th style="color:white;">Phone</th>
                <th width="150" style="color:white;">Actions</th>
            </tr>
        </thead>
        
            <tbody>
                <?php
                    $sql=mysqli_query($conn,"SELECT * FROM `supplier`");
                   
                    if(mysqli_num_rows($sql)>0)
                    {
                        while($row=mysqli_fetch_assoc($sql))
                        {  
                            ?>

                        <tr>
              
                            <td><?php echo $row['sname']; ?></td>
                            <td><?php echo $row['smail']; ?> </td>
                            <td><?php echo $row['sphno']; ?></td>
                            
                            <td>
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