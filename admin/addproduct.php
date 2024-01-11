<?php include('header.php');

if(empty($_SESSION['aid']))
{
    ?>
    <script>location.href="login.php"</script>
    <?php
}
else{
if(isset($_POST['save']))
{
    
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_qty=$_POST['product_qty'];
    $product_category=$_POST['product_category'];
      
    $imgFile = $_FILES['product_img']['name'];
    $tmp_dir = $_FILES['product_img']['tmp_name'];
    $imgSize = $_FILES['product_img']['size'];

    $upload_dir = '../images/';
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 

    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
    $itempic = rand(1000,1000000).".".$imgExt;

    if(in_array($imgExt, $valid_extensions))
    {			
		if($imgSize < 5000000)				
        {
            move_uploaded_file($tmp_dir,$upload_dir.$itempic);
             $sql="INSERT INTO product(`pname`,`descp`,`price`,`category`,`img_path`) 
            VALUES ('".$product_name."','".$product_desc."','". $product_price."','".$product_category."','".$itempic."')";

            if(mysqli_query($conn,$sql)==TRUE)
            {
                $prod_id=$conn->insert_id;
                
                $sql2="INSERT INTO stock(`stock_count`,`pid`) VALUES ('".$product_qty."','".$prod_id."')";
                if(mysqli_query($conn,$sql2)==FALSE)
                {
                    echo "<script>alert('Error to add Quantity of product')</script>";
                }
                echo "<script>alert('Data successfully saved!')</script>";
                echo "<script>window.open('addproduct.php','_self')</script>";
            }
            else
	        {
	            echo "<script>alert('Something went wrong..!')</script>";
	            echo "<script>window.open('addproduct.php','_self')</script>";
	        }
        }
                
        else
        {
            echo "<script>alert('Sorry, your file is too large.')</script>";
            echo "<script>window.open('addproduct.php','_self')</script>";
        }
                	
        
    }
    else
    {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        echo "<script>window.open('add.php','_self')</script>";	
    }
}
}
?>

<div id="page-wrapper">
	<div class="alert alert-default" style="color:white;background-color:#008CBA">
		<center>
		<h5>Add Products</h5>
		</center>
	</div>

	<div class="col-md-10">
			<form action="" method="post" enctype="multipart/form-data">
                    <label>Name of Product:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="Name" name="product_name" type="text" required><br>
                    </div>

                    <label>Price of Product:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="Price" name="product_price" type="text" required><br>
                    </div>
                    
                    <label>Desciption of Product:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="Description" name="product_desc" type="text" required><br>
                    </div>

                    <label>Select Category:</label>
                    <div class="form-group">
                        <select class="form-select" placeholder="Category" name="product_category"  required>
                        <option value=''>--Select--</option>
                            <?php
                            foreach($product_category as $key => $category)
                            {
                                ?>
                                    <option value='<?php echo $key?>'><?php echo $category ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <br>
                    </div>

                    <label>Quantity of Product:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="Quantity" name="product_qty" type="text" required>
                        <br>
                    </div>

                    <label>Image of Product:</label>
                    <div class="form-group">
                        <input class="form-control" placeholder="Image" name="product_img" type="file" accept="image/*" required><br>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success btn-md" name="save">Save</button>&nbsp;
                        <a class="btn btn-danger btn-md" href="index.php">Cancel</a>
                    </div>  
                    
            </form>
        </div>
</div>


<?php include('footer.php');?>