<?php include 'header.php';
if(empty($_SESSION['cart']))
{
	
	?>
	<div class="text-center bg-warning-subtle">
		<img src="images/cart-empty.png">
		<h4>Your cart is <span style="color:#ec7205;">Empty</span>..!</h4><br>
		<a href="menu.php" class="btn btn-success">Add Products</a>
	</div>

<?php
}
else
{

?>
	<div id="page-wrapper">
		<div class="alert alert-default" style="color:white;background-color:#008CBA">
	        <center>
	        <h5>Cart Items</h5>
	        </center>
	    </div>
	    <?php

	$carttotal=0;
	$pricetotal=0;

	if(isset($_SESSION['cart']))
	{
		foreach($_SESSION['cart'] as $key => $value)
		{
			$cartid[]=$key;
		}

		$cartid=implode(",",$cartid);

		$sql="SELECT * from product WHERE pid IN (". $cartid .")";

		$result = mysqli_query($conn,$sql);

			if (mysqli_num_rows($result) > 0) 
			{ ?>
			  
			  
					<table class="table center" style="margin: 50px;width: 90%;">
						  <thead class="table-active">
						    <tr>
						      <th scope="col">Product image</th>
						      <th scope="col">Product Name</th>
						      <th scope="col">Quantity</th>
						      <th scope="col">Product Price</th>
						      <th scope="col">Subtotal</th>
						      <th scope="col">Action</th>
						   </tr>
						  </thead>
						  <tbody>
					<?php	while($prod =mysqli_fetch_assoc($result)) 
			  				{ ?>


						    <tr>
						      <th scope="row">
						      	<img src="images/<?php echo $prod['img_path']?>" alt="" class="border" style="height: 100px; width: 100px;"></th>
						      <td><?php echo $prod['pname']?></td>
						      <td><?php echo $_SESSION['cart'][$prod['pid']] ?></td>
						      <td><?php echo $prod['price']?></td>
						      <td><?php $pricetotal=$prod['price']*$_SESSION['cart'][$prod['pid']];
						      		echo $pricetotal;
						      		$carttotal=$pricetotal+$carttotal;
						      	?>
						      	
						      </td>
						      <td>
								<a class="btn btn-danger" href='addtocart.php?action=delete&pid=<?php echo $prod['pid']?>'>Delete</a>
							</td>

						    </tr>
						  

					<?php  } ?>
						</tbody>
					</table>
	<?php	} ?>

			<h5 style="text-align:right; color:green; margin-right:10px;font-weight:600;">
					Total : <?php echo $carttotal; ?>
				
			</h5>

			<div class="text-center">
				<a href="menu.php" class='btn btn-primary shadow'>Add Product</a>
				<a href="user/checkout.php"class='btn btn-warning shadow' name='sbtn'>Proceed to buy</a>
				<a href="index.php" class='btn btn-success shadow'>Back</a>
			</div>
<?php	}
	
}
?>