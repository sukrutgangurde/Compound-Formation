<?php include 'head.php';
if(empty($_SESSION['uid']))
{
    ?>
     <script>location.href="login.php"</script>
    <?php
}
else
{
	
	$uid=$_SESSION['uid'];
	$sql="SELECT * from orders WHERE uid='".$uid."' AND status='Not Delivered' ORDER BY orderid DESC ";
	$result=mysqli_query($conn,$sql);
	
	if (mysqli_num_rows($result) > 0) 
	{ ?>

		<div id="page-wrapper">
			<div class="alert alert-default" style="color:white;background-color:#453750;">
		        <center>
		        <h5>Order's</h5>
		        </center>
		    </div>
             <table  class="table  w-100 table-bordered ">
						<thead class="table-secondary">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Unit price</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                            
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
                  
                  </tr>

     <?php      } ?>
               <tr>
                 	<td>		
									<a class="btn btn-danger" href='deleteorder.php?oid=<?php echo $row['orderid'];?>'>Cancel</a>
								</td>	
							</tr>
          <?php       	}?>
                 			 
          					

                        </tbody>
                       
                    </table>
                
		</div>

<?php
	}
	else
	{
		?>
		<div id="page-wrapper">
            <div class="alert alert-danger" role="alert" style='text-align:center;color:red'>
              <h5><i class="fa-solid fa-circle-xmark"></i>&nbsp;<?php echo "No Record Found.." ?></h5>
              <p>All Order's are Delivered..!</p>
            </div>
        </div>

        <?php
	}
}

include 'footer.php';
?>