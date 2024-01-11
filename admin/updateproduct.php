<?php include('header.php');

if(empty($_SESSION['aid']))
{
    ?>
    <script>location.href="login.php"</script>
    <?php
}


if(isset($_GET['edit_id']))
{
    $edit_id=$_GET['edit_id'];
    $sql=mysqli_query($conn,"SELECT * FROM product WHERE pid ='".$edit_id."'");
    $row=mysqli_fetch_assoc($sql);
    $sql1=mysqli_query($conn,"SELECT * FROM stock WHERE pid ='".$edit_id."'");
    $row1=mysqli_fetch_assoc($sql1);
    
}

if(isset($_POST['save_updates']))
{
    
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_qty=$_POST['product_qty'];
    $product_category=$_POST['product_category'];
      
    $imgFile = $_FILES['product_img']['name'];
    $tmp_dir = $_FILES['product_img']['tmp_name'];
    $imgSize = $_FILES['product_img']['size'];

    if($imgFile)
    {
        $upload_dir = '../images/';
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 

        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
        $itempic = rand(1000,1000000).".".$imgExt;

        if(in_array($imgExt, $valid_extensions))
        {           
            if($imgSize < 5000000)              
            {
                unlink($upload_dir.$row['product_img']);
                move_uploaded_file($tmp_dir,$upload_dir.$itempic);
            }
            else
            {
                echo "<script>alert('Sorry, your file is too large it should be less then 5MB')</script>";  
            }
        }
        else
        {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        }

    }
    else
    {
        $itempic = $row['img_path']; 
    }

     $sql="UPDATE product SET `pname`= '".$product_name."', `descp` = '".$product_desc."',
    `price`='".$product_price."',`category`='".$product_category."',`img_path`='".$itempic."' WHERE pid='".$edit_id."' ";
    $row2=mysqli_query($conn,$sql);
    if($row2==TRUE)
    {  
        // $result=mysqli_fetch_assoc($row);
        $sql2=mysqli_query($conn,"SELECT * From product WHERE pname='".$row['pname']."' AND price='".$row['price']."'");
        $result=mysqli_fetch_assoc($sql2);
        $prod_id=$result['pid'];
        $sql3="UPDATE stock SET `stock_count`='".$product_qty."' WHERE pid='".$prod_id."'";
        $row3=mysqli_query($conn,$sql3);
        if($row3==TRUE)
        {
        ?>
            <script>
                alert('Successfully Updated ...');
                window.location.href='editproduct.php';
            </script>
        <?php
        }
        else
        {
            echo "<script>alert('Sorry Data Could Not Updated for Stock !')</script>";    
        }
    }
    else
    {
        echo "<script>alert('Sorry Data Could Not Updated !')</script>";    
    }
}

?>


<div id="page-wrapper">
    <div class="alert alert-default" style="color:white;background-color:#008CBA">
        <center>
        <h5>Edit Products</h5>
        </center>
    </div>

    <div class="col-md-10">
            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                <table class="table table-bordered table-responsive">
        
                    <tr>
                        <td><label>Name of Item.</label></td>
                        <td><input class="form-control" type="text" name="product_name" value="<?php echo $row['pname']; ?>" required /></td>
                    </tr>
                    
                    <tr>
                        <td><label>Price.</label></td>
                        <td><input class="form-control" type="text" name="product_price" value="<?php echo $row['price']; ?>" required /></td>
                    </tr>
                    
                    
                    <tr>
                        <td><label>Description</label></td>
                        <td><input class="form-control" type="text" name="product_desc" value="<?php echo $row['descp']; ?>" required /></td>
                    </tr>

                    <tr>
                        <td><label>Image</label></td>
                        <td>
                            <p><img class="img img-thumbnail" src="../images/<?php echo  $row['img_path']; ?>" height="150" width="150" /></p>
                            <input class="input-group" type="file" name="product_img" accept="image/*" />
                        </td>
                    </tr>

                    <tr>
                        <td><label>Quantity:</label></td>
                        <td><input class="form-control" type="text" name="product_qty" value="<?php echo $row1['stock_count']; ?>" required /></td>
                    </tr>
                    
                    <tr>
                        <td><label>category:</label></td>
                     <td><div class="form-group">
                        <select class="form-select" placeholder="Category" name="product_category"  required>
                        <option value=''>--Select--</option>
                            <?php
                            foreach($product_category as $key => $category)
                            {
                                if($key==$row['category'])
                                {  $selected='selected'; 
                                }
                                else
                                {
                                    $selected='';
                                }                            ?>
                                    <option value='<?php echo $key?>'<?php echo $selected;?>><?php echo $category ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <br>
                    </div>
                </td>
            </tr>
                    <tr>
                        <td colspan="2"><button type="submit" name="save_updates" class="btn btn-primary">
                        Update</button>
                        
                        <a class="btn btn-danger" href="editproduct.php">Cancel </a>
                        
                        </td>
                    </tr>
                    
                </table>
            </form>
    </div>
</div>

<?php include('footer.php');?>