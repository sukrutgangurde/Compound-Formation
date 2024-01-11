<?php include 'head.php';

if(empty($_SESSION['uid']))
{?>

	<script>
		location.href='login.php';
	</script> 

<?php
}
else
{
	//to check for stock
	foreach($_SESSION['cart'] as $pid => $qty)
	{
		$sql="SELECT * FROM stock WHERE pid='".$pid."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$stock_count=$row['stock_count'];
		
		if($qty>$stock_count)
		{
			
			echo '<script>alert("Product out of stock")</script>';?>

			<script>
				location.href='index.php';
			</script>
			<?php

		}
		else
		{

			$stock_count=$stock_count-$qty;
			$sql2=mysqli_query($conn,"UPDATE stock SET stock_count='".$stock_count."' WHERE pid='".$pid."'");
		}
		
	}
	


    // add into order and orderitems

	$uid=$_SESSION["uid"];
	$date=date("Y-m-d  H:i:s");
	$sql="INSERT INTO orders (`odate`,`uid`,`status`,`payment_status`) VALUES ('".$date."','".$uid."','Not Delivered','Unpaid')";
	 if(mysqli_query($conn, $sql))
	 {
    	$order_id= mysqli_insert_id($conn);

    		foreach($_SESSION['cart'] as $pid => $qty)
			{
				$sql="SELECT * FROM product WHERE pid='".$pid."'";
				$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
				$row = mysqli_fetch_assoc($result);
				$pname=$row['pname'] ;
				$price=$row['price'] ;
				$img=$row['img_path'];

				$sql2="INSERT INTO orderitem (`orderid`,`prodname`, `prodprice`, `prodqty`,`prodimg`,`status`) 
				VALUES('".$order_id."','".$pname."','".$price."','".$qty."','".$img."',1)";

				$q=mysqli_query($conn,$sql2);	
			
			}

					if($q==TRUE) 
					{ 
						unset($_SESSION['cart'])?>
						<script>location.href="payment.php?payid=<?php echo $order_id ?>"</script>
			<?php	}
					else
					{
						?>
						<div id="page-wrapper">
							<div class="alert alert-danger" role="alert" style='text-align:center;color:red'>
								  <p><?php echo "Something went wrong..! <br> Please try after sometime"; ?></p>

							</div>
						</div>
						<?php die(mysqli_error($conn));
				    }
				


   }    

   
}	



?>
