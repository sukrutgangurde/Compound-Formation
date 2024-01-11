<?php include 'header.php';

if($_GET['pid']>0)
{
	$pid=$_GET['pid'];
	$sql="SELECT * from product WHERE pid='$pid'";
	$result = mysqli_query($conn,$sql);

			if (mysqli_num_rows($result) > 0) 
			{
			  // output data of each row
			  while($prod =mysqli_fetch_assoc($result)) 
			  {

			  	?>
			  	<div class="item-details" style="min-height: 600px;">
			  		<div class="container">
			  			<div class= "row align-items-center" style="padding-top: 20px;" >
			  				<div class="col-lg-6 col-md-6 col-12">
				  				<div class="productimage ">
				  					<img src="images/<?php echo $prod['img_path']?>" alt="" class="border">
				  				</div>
				  			</div>

				  			<div class="col-lg-6 col-md-6 col-12">
				  				<div class="productdetails">
				  					<h4>
		                                <?php echo $prod['pname']?>
		                            </h4><br>
		                   
		                            <h5>
		                                <i class="fa-solid fa-tags" style="color:#0167F3;"></i>
		                                Rs.<?php echo $prod['price']?>
		                            </h5><br>

		                            <h6>Description:</h6>
		                            <div class="description" style="color:#888;">
										<?php echo $prod['descp']?>
		                            </div><br>

		                             
									<form method="post" action="addtocart.php">
										<div class="form-group" style="width:50%;">
										    <label for="quantity">Quantity</label>
											    <select class="form-control" name='quantity'>
												      <option value='1'>1</option>
												      <option value='2'>2</option>
												      <option value='3'>3</option>
												      <option value='4'>4</option>
												      <option value='5'>5</option>
											    </select>
										 </div>
										 <br><br>
										 <input type='hidden' name='pid' value="<?php echo $prod['pid']?>">
										 <button type="submit" name="sbtn" class="btn btn-primary">
										 Add to cart</button>
									</form>

				  				</div>
				  			</div>
			  			</div>

			  		</div>
			  		
			  	</div>
		<?php  }
			}
}


?>
