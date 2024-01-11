<?php include 'header.php';
?>
<div class="container">

    <div class="section-title">
        <h2>Our Products</h2>
    </div>
       
    <div class="input-group mb-3"> 
        <input type="text" class="form-control" name="live_search" id="live_search" autocomplete="off"
                placeholder="Search ...">
        <button class="btn btn-outline-danger" type="button" id="button-addon2" onclick= "clearInput()">
            <i class="fa-regular fa-circle-xmark"></i></button>
               
    </div>
    <div id="search_result"></div> 

   <div class="row " id="rresult">

        <?php
		
			$sql = "SELECT * from product";
			$result = mysqli_query($conn,$sql);

			if (mysqli_num_rows($result) > 0) 
			{
			  // output data of each row
			  while($prod =mysqli_fetch_assoc($result)) 
			  {
				  ?>

				<div class="col-md-4 col-sm-5">
                
                    <div class="single-product"> 
                        <div class="product-image">
                            <img src="images/<?php echo $prod['img_path']?>" alt="">
                            <div class="button">
                                <a href="view.php?pid=<?php echo $prod['pid'];?>" class="btn">
                                    <i class="fa-regular fa-eye"></i>View
                                </a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h4 class="title" style="min-height:50px;">
                                <?php echo $prod['pname']?>
                            </h4>
                   
                            <div class="price">
                                <span>Rs.<?php echo $prod['price']?></span>
                            </div>
                        </div>
                    </div>
                </div>
       <?php }
            } ?>
    </div>  
</div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#live_search").keyup(function () {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'live.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function (data) {

                            $('#search_result').html(data);
                            $('#search_result').css('display', 'block');
                            $('#rresult').hide();
                        }
                    });
                } else {

                    $('#search_result').html('');
                    $('#search_result').css('display', 'none');
                    $('#rresult').show();
                }
            });
        }); 
    

    function clearInput(){
      var getValue= document.getElementById("live_search");
        getValue.value = "";
         $('#live_search').keyup();
 }

</script>
<?php include 'footer.php'?>