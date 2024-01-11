<?php include 'head.php';
if(isset($_GET['oid']))
	{
		
		$oid=$_GET['oid'];
		$sql1="UPDATE `orders` SET `status`='Cancel',`payment_status`='Refunded' WHERE orderid='".$oid."' AND `status`='Not Delivered'";
		 
		 $r1=mysqli_query($conn,$sql1);
		 

		 $sql2="UPDATE orderitem SET `status`=0 WHERE orderid='".$oid."'";
		 $r2=mysqli_query($conn,$sql2);
		 

		if($r1==TRUE)
		{
			if($r2==TRUE)
			{
				$s=mysqli_query($conn,"UPDATE payment SET pay_amt=0 WHERE orderid='".$oid."'");
			?>
		
			<script>
			location.href='cancelorder.php';
			</script> 

		<?php
			}
		}
		else
		{
			echo "<script>alert(something went wrong..!)</script>";
		}
	}

?>