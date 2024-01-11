<?php include 'head.php';
if(empty($_SESSION['uid']))
{
    ?>
     <script>location.href="login.php"</script>
    <?php
}
else
{

	//set order status
   $sql1=mysqli_query($conn,"SELECT * FROM orders");
   while($row=mysqli_fetch_assoc($sql1))
   {
	   $orderdate=$row['odate'];
	  
	   $diff = (int) date_diff(date_create($orderdate), date_create(date("Y-m-d H:i:s")))->format("%R%a");
	   if($diff>3)
	   {
	   		$sql2=mysqli_query($conn,"UPDATE orders SET status='Delivered' WHERE status='Not Delivered' AND odate='".$orderdate."'")or die(mysql_error());
	   }
	}
	
	//set payment status in orders
	$sqlp=mysqli_query($conn,"SELECT * FROM payment WHERE status='succeeded' AND orderid IN(SELECT orderid FROM orders WHERE status<>'Cancel')");
	while($rowp=mysqli_fetch_assoc($sqlp))
   {
   	       $n=$rowp['method'];
   			if($n==1)
   			{
   				
   				$sql2=mysqli_query($conn,"UPDATE `orders` SET payment_status='Paid' WHERE status='Delivered'");

   			}
   			else if($n==2)
   			{
   				$sql2=mysqli_query($conn,"UPDATE `orders` SET payment_status='Paid' WHERE orderid IN(SELECT orderid FROM `payment` WHERE method=2)");
   			}
   			else
   			{
   				;
   			}
   }	

	$uid=$_SESSION['uid'];
	$sql="SELECT * from orders WHERE uid='".$uid."'ORDER BY orderid DESC ";
	$result=mysqli_query($conn,$sql);
	
	if (mysqli_num_rows($result) > 0) 
	{ ?>

		<div id="page-wrapper">
			<div class="alert alert-default" style="color:white;background-color:#453750;">
		        <center>
		        <h5>Order's</h5>
		        </center>
		    </div>
                    <table id="tblrecord" class="table w-100 table-bordered " style="color:white; ">
						<thead class="table-secondary" >
                            <tr>
                                <th class="thead1">Image</th>
                                <th class="thead1">Name</th>
                                <th class="thead1">Quantity</th>
                                <th class="thead1">Unit price</th>
                                <th class="thead1">Order Date</th>
                                <th class="thead1">Order Status</th>
                                <th class="thead1">payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                 <?php	
                 		while($row=mysqli_fetch_assoc($result)) 
						{   
							$orderid=$row['orderid'];
							$date=$row['odate'];
							

							$sql2="SELECT * from orderitem WHERE orderid='".$orderid."'";
							$result2=mysqli_query($conn,$sql2);
					
							while($row2=mysqli_fetch_assoc($result2))
							{ 
								?>	
									<tr>

  							    <td><img src="../images/<?php echo $row2['prodimg']?>" alt="" class="border" style="height:50px; width:50px;"></td>
  								<td><?php echo $row2['prodname'];?></td>
  								<td><?php echo $row2['prodqty'];?></td>
								<td><?php echo $row2['prodprice'];?></td>
                                <td><?php echo date('d-m-Y', strtotime($date));?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['payment_status'];?></td>
                                </tr>

                 <?php      } 
                 		}?>
                 			 
          

                        </tbody>
                       
                    </table>
                
		</div>

<?php }


}

include 'footer.php';
?>