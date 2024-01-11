<?php include('header.php');

if(empty($_SESSION['aid']))
{
    ?>
    <script>location.href="login.php"</script>
    <?php
}
else
{
if(isset($_GET['delete_id']))
    {
        //delete image from folder
        $delete_id=$_GET['delete_id'];
        $sql= mysqli_query($conn,"SELECT img_path FROM product WHERE pid ='".$delete_id."' ");
        $imgRow=mysqli_fetch_assoc($sql);
        unlink("../images/".$imgRow['img_path']);
        
        //delete item from database
        mysqli_query($conn,"DELETE FROM product WHERE pid ='".$delete_id."'");
        mysqli_query($conn,"DELETE FROM stock WHERE pid ='".$delete_id."'");
        
    }
}
?>

<div id="page-wrapper">
    <div class="alert alert-default" style="color:white;background-color:#008CBA">
        <center>
        <h5>Edit Products</h5>
        </center>
    </div>

    <table id="tblrecord" class="table  w-100 table-bordered ">                                                                                          
        <thead style="text-align:center; ">
            <tr>
            <th style="color:white;" >Image</th>
                <th style="color:white;">Name</th>
                <th style="color:white;">Price</th>
                <th style="color:white;">Description</th>
                <th style="color:white;">Category</th>
                <th style="color:white;">Quantity</th>
                <th width="70" style="color:white;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql="SELECT * FROM product";
                $result =mysqli_query($conn,$sql);
               
                if(mysqli_num_rows($result)>0)
                {
                    while($row=mysqli_fetch_assoc($result))
                    { 
                        $pid=$row['pid'];
                        $sql2=mysqli_query($conn,"SELECT * FROM stock WHERE pid='".$pid."'");
                        $row2=mysqli_fetch_assoc($sql2);
                    ?>
                    <tr>
                        <td>
                        <center> <img src="../images/<?php echo $row['img_path']; ?>"  width="50" height="50" ></center>
                        </td>
                        <td><?php echo $row['pname']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['descp']; ?></td>
                        <td><?php foreach($product_category as $key => $category)
                                  {    
                                    if($key==$row['category'])
                                    {  
                                        echo $category;
                                    } 
                                  }   
                            ?></td>
                        <td><?php echo $row2['stock_count']; ?></td>
                        <td>
                        <a class="btn btn-info" href="updateproduct.php?edit_id=<?php echo $row['pid']; ?>" onclick="return confirm('Are you sure edit this item?')"><i class="fa-solid fa-pen"></i></a> 
                        <a class="btn btn-danger" href="?delete_id=<?php echo $row['pid']; ?>" onclick="return confirm('Are you sure to remove this item?')"><i class="fas fa-trash-alt"></i></a>
            
                        </td>
                    </tr>
        
                <?php
                    }
                }
                ?>
        </tbody>
    </table>
</div>
<?php include('footer.php');?>