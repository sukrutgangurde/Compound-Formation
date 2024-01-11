<?php
require_once 'head.php';
?>
<style type="text/css">
.status 
{
padding: 15px;
box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
width: 50%;
margin-top: 2rem;
}
</style>

<?php
if(isset($_GET['payid']))
{ 
	$payid=$_GET['payid'];
	$sql="SELECT orderid,prodprice,prodqty FROM orderitem WHERE orderid='".$payid."'";
	$row=mysqli_query($conn,$sql);
	while($fetch = mysqli_fetch_assoc($row))
    {
        $paid_amount+=$fetch['prodprice']*$fetch['prodqty'];
    }

    $transaction_id=rand(1000000000,9999999999);
	$date=date("Y-m-d H:i:s");
    $sqlQ = "INSERT INTO payment (`orderid`,`pay_amt`,`pay_datetime`,`method`,`status`,`currency`,`txn_id`) 
            VALUES ($payid, $paid_amount,'".$date."',1,'succeeded','inr',$transaction_id)"; 
     
            $row1=mysqli_query($conn,$sqlQ);

            if($row1==TRUE)
            {
            	$statusMsg = 'Your Order has been Successfully Placed!';
            	$sqll= "SELECT * FROM `payment` WHERE orderid ='".$payid."'"; 
    			$roww=mysqli_query($conn,$sqll); 
 
			    if(mysqli_num_rows($roww) > 0)
			    { 
       				 $fetch=mysqli_fetch_assoc($roww);
       			}
    	?>
			    <div id='page-wrapper'>
			        <h3 class="alert alert-success" style='text-align:center;'>Bill</h3>
			        <h5 style="color:green;text-align:center"><?php echo $statusMsg; ?></h3>
			        
			        <div class='status mx-auto'>
			            <h4>Payment Information</h4>
			            <p><b>Reference Number:</b> <?php echo $fetch['pay_id']; ?></p>
			            <p><b>Transaction ID:</b> <?php echo $fetch['txn_id']; ?></p>
			            <p><b>Paid Amount:</b> <?php echo $fetch['pay_amt'] ?></p>
			            <p><b>Payment Status:</b> Cash on Delivery</p>
									<!-- <?php echo $fetch['status']; ?> -->
			        </div>
			    </div>
    

		 <?php 
		}
		   else
		   	{ ?>
		        <h3 class="alert alert-danger mt-3" style='text-align:center;'>Your Payment has been failed!</h3>
		<?php } 

}