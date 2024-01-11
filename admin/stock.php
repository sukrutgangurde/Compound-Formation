<?php include('header.php');
if(empty($_SESSION['aid']))
{
	?>
        <script>
            location.href='login.php';
        </script> 
    <?php
}
?>

<div id="page-wrapper">
    <div class="alert alert-default" style="color:white;background-color:#008CBA">
        <center>
        <h5>Stock maintenance</h5>
        </center>
    </div>

    <table id="tblrecord" class="table  w-100 table-bordered ">               
                                                                               
        <thead style="text-align:center;">
                <tr>
                    <th style="color:white;">Ref no.</th> 
                    <th style="color:white;">Product Name</th>
                    <th style="color:white;">Qty.</th>
                </tr>
        </thead>
        <tbody>
            <?php
             $sql=mysqli_query($conn,"SELECT * FROM product");
           
            if(mysqli_num_rows($sql)>0)
            {
                while($row=mysqli_fetch_assoc($sql))
                {  
                    $pid=$row['pid'];
                    $sql2=mysqli_query($conn,"SELECT * FROM stock WHERE pid='".$pid."'");
        
                    $row2=mysqli_fetch_assoc($sql2)
                            ?>
                        <tr>
                            <td><?php echo $row2['sid']; ?></td>
                            <td><?php echo $row['pname']; ?></td>
                            <td><?php echo $row2['stock_count']; ?></td>
                        </tr>

                <?php
                }
            }?>
        </tbody>
    </table>
</div> 


<?php include('footer.php');?>