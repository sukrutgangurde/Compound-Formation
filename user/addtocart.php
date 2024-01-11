<?php include 'head.php';



	if(isset($_POST['sbtn']))
	{	


		$_SESSION['cart'][$_POST['pid']]= $_POST['quantity'];

		
		$sqty=0;
		
		if(isset($_SESSION['cart']))
		{
			$sqty=$_SESSION['cart'][$pid];
		}
	 
		if($pid>0)
		 $_SESSION['cart']= $sqty+1;

		$uid=$_SESSION['uid'];
		$sql=mysqli_query($conn,"DELETE FROM favourite WHERE pid='".$_POST['pid']."' AND uid='".$uid."'");

		
		?>
		
		<script>
		location.href='cart.php';
		</script> 

		<?php
		

	}


	if($_GET['pid']>0)
	{
		$action=$_GET['action'];
		$pid=$_GET['pid'];
		//delete //add
		if($action=='delete')
		{	
			unset($_SESSION['cart'][$pid]);
			?>	
			<script>
			location.href='cart.php';
			</script>

			<?php

		}
	}
	


?>