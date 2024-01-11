<?php include('header.php');

if(empty($_SESSION['aid']))
{
    ?>
    <script>location.href="login.php"</script>
    <?php
}
if(isset($_GET['view_id']))
{
    $viewid=$_GET['view_id'];
    $sql=mysqli_query($conn,"SELECT * FROM `users` WHERE uid='".$viewid."' ");
    $row=mysqli_fetch_assoc($sql);
    $custname=$row['uname'];
}


?>

<div id="page-wrapper">
    <div class="alert alert-default" style="color:white;background-color:#008CBA">
        <center>
        <h5>Customer Order Deatils</h5>
        </center>
    </div>

    <table id="tblrecord" class="table table-hover w-100 table-bordered ">               
    <b>Customer Name:&nbsp;&nbsp;<?php echo $custname; ?></b><br><br>                                                                           
        <thead style="text-align:center;">
                
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Order Date</th>
                    </tr>
        </thead>
        <tbody>
            <?php   
                if(isset($_GET['view_id']))
                {
                    $viewid=$_GET['view_id'];
                    $sql="SELECT * FROM `orderitem` WHERE orderid IN(SELECT orderid FROM `orders` WHERE uid='".$viewid."')";
                    $result=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($result)>0)
                    {
                        while($row=mysqli_fetch_assoc($result))
                        {
                            
                            $oid=$row['orderid'];
                            $sql2=mysqli_query($conn,"SELECT date FROM `orders` WHERE orderid='".$oid."' ");
                            $row2=mysqli_fetch_assoc($sql2);
                            $date=$row2['date'];
                          
                            ?>
                            
                            <tr>
                                <td>
                                    <img src="../images/<?php echo $row['prodimg']; ?>"  width="50" height="50" >
                                </td>
                                <td><?php echo $row['prodname']; ?></td>
                                <td><?php echo $row['prodprice']; ?> </td>
                                <td><?php echo $row['prodqty']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($date)); ?></td>

                               
                            </tr>
                           
                        <?php
                        }
                    }
                }
                ?>
        </tbody>

    </table>

</div>

<?php include('footer.php');?>