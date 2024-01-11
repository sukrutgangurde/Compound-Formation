<?php include('header.php');

if(empty($_SESSION['aid']))
{
    ?>
    <script>location.href="login.php"</script>
    <?php
}
?>

<div id="page-wrapper">
    <div class="alert alert-default" style="color:white;background-color:#008CBA">
        <center>
        <h5>Customer Order Deatils</h5>
        </center>
    </div>

    <table id="tblrecord" class="table  w-100 table-bordered ">               
                                                                               
        <thead style="text-align:center;">
                <tr>
                    <th style="color:white;">Customer Name</th>
                    <th style="color:white;">Email</th>
                    <th style="color:white;">Product Name</th>
                    <th style="color:white;">Price</th>
                    <th style="color:white;">Qty.</th>
                </tr>
        </thead>
        <tbody>
        <?php
            $sql=mysqli_query($conn,"SELECT * FROM `orderitem`");
           
            if(mysqli_num_rows($sql)>0)
            {
                while($row=mysqli_fetch_assoc($sql))
                {  
                    $orderid=$row['orderid'];
                    $sql2=mysqli_query($conn,"SELECT * FROM `users` WHERE uid IN (SELECT uid FROM `orders` WHERE orderid='".$orderid."')");
                    $row2=mysqli_fetch_assoc($sql2)
                    ?>

                    <tr>
        
                        <td><?php echo $row2['uname']; ?></td>
                        <td><?php echo $row2['umail']; ?> </td>
                        <td><?php echo $row['prodname']; ?></td>
                        <td><?php echo $row['prodprice']; ?></td>
                        <td><?php echo $row['prodqty']; ?></td>
                    </tr>
                  
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php include('footer.php');?>