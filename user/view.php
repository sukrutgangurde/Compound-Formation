
<?php include 'head.php';

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
			  	<div class="item-details" style="min-height: 600px; background-color:black; color:white;">
			  		<div class="container">
			  			<div class= "row align-items-center" style="padding-top: 20px;" >
			  				<div class="col-lg-6 col-md-6 col-12">
				  				<div class="productimage " style="box-shadow:10px 10px 15px #B7ADCF;">
				  					<img style="height:400px; width:100%; border:none;" src="../images/<?php echo $prod['img_path']?>" alt="" >
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
										 
										 <a id='addtowishlist' href='javascript:;' data-data="<?php 
										 echo $prod['pid']?>" />

										<?php
										$uid=$_SESSION['uid'];
										$sqli="SELECT * from favourite WHERE pid='$pid' and uid='$uid'";
										$res= mysqli_query($conn,$sqli);
										if (mysqli_num_rows($res) > 0) 
										{ ?>
										 <i class='fa fa-heart wishlist-icon wishlist-added'></i></a>
						<?php			}
										else
										{
											?>
										 <i class='fa fa-heart wishlist-icon wishlist-remove'></i></a>
						<?php		
										}
										 ?>

										 <br><br>

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


include 'footer.php'; ?>

<script type="text/javascript">
$(document).ready(function(){
    $("body").on('click','#addtowishlist', function(evt) {

       var link_data = $(this).data('data');
       console.log(link_data);
       $.ajax({
		  url: 'addtofav.php',
		  method: 'POST',
		  data: { pid:link_data },
		  success: function(response) {
		  	
		  	var json = $.parseJSON(response);
		  	console.log(json.action);
		      
		      if (json.action == 'add') 
		      {
		      	//console.log('1')
		      	$('.wishlist-icon').removeClass('wishlist-remove');
		         $('.wishlist-icon').addClass('wishlist-added');
		        
		      } 
		      else 
		      {
		      	//console.log('hii');
		        $('.wishlist-icon').removeClass('wishlist-added');
		        $('.wishlist-icon').addClass('wishlist-remove');
		      }
		            window.location.reload();
  		}
		});
   
    }); 
});
</script>
