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
	$uid=$_SESSION['uid'];
	$sql=mysqli_query($conn,"SELECT * FROM favourite WHERE uid='".$uid."'");
	?>
	<div id="page-wrapper">
		<div class="alert alert-default" style="color:white;background-color:#008CBA">
	        <center>
	        <h5>Favourites</h5>
	        </center>
	    </div>
		<table class="table table-hover w-100 table-bordered ">
						  <thead class="table-active">
						    <tr>
						      <th >Product image</th>
						      <th >Product Name</th>
						      <th >Product Price</th>
						      <th>Quantity</th>
						      <th >Action</th>
						   </tr>
						  </thead>
						  <tbody>
					<?php
							while($row=mysqli_fetch_assoc($sql))
							{ 
								$sql2=mysqli_query($conn,"SELECT * FROM product WHERE pid='".$row['pid']."'");
								$prod=mysqli_fetch_assoc($sql2);
								$qty=1;
								?>
							<form method="post" action="addtocart.php">
								 <tr>
							      <td>
							      	<img src="../images/<?php echo $prod['img_path']?>" alt="" class="border" style="height: 100px; width: 100px;"></td>
							      <td><?php echo $prod['pname']?></td>
							      <td><?php echo $prod['price']?></td>
							      <td><input type="number" name ='quantity' value="<?php echo $qty;?>" min="1"> </td>
							      <td>
										<input type='hidden' name='pid' value="<?php echo $row['pid']?>">
										 <button type="button" name="rmRemove" class="btn btn-danger"  onclick="removeFav('<?php echo $row['pid']?>')">
										 Remove</button>

										 <button type="submit" name="sbtn" class="btn btn-primary">
										 Add to cart</button>
								</td>

							    </tr>
							</form>
						  

					<?php  } ?>
						</tbody>
					</table>
				</div>
	<?php	} ?>

<?php include('footer.php');?>

<script>
	function removeFav(pid){
		if(confirm('Are you sure to remove this item?'))
		{
			$.ajax({
					  url: 'removefav.php',
					  method: 'GET',
					  data: { pid:pid },
					  success: function(response) {
					  	
					  	var json = $.parseJSON(response);
					  	console.log(json.action);
					      window.location.reload();
			  		}
				});
		}
	}

</script>	
