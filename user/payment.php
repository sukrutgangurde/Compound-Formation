<?php include 'head.php';
$payid=$_GET['payid'];
$sql="SELECT orderid,prodprice,prodqty FROM orderitem WHERE orderid='".$payid."'";
$row=mysqli_query($conn,$sql);

?>

<div id="page-wrapper">
    <div class="col-md-10">
        

                <table class="table table-bordered table-responsive">
                    <tr>
                        <td>
                            <label name="price"><b>Total Amount</b></label>
                        </td>
                        <td>&#8377; <?php 
                            $total_price = 0;
                            while($fetch = mysqli_fetch_assoc($row))
                            {
                                $total_price+=$fetch['prodprice']*$fetch['prodqty'];
                            }
                            echo $total_price;?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label><b>Payment Method</b></label>
                        </td>
                        <td>
                            <select class="form-select" name="payment_method"  id="payment_method"
                            required />
                            <option value=''>--Select--</option>
                            <?php
                            foreach($payment_method as $key => $method){
                                //if($key==1) continue;
                                ?>
                                    <option value='<?php echo $key?>'><?php echo $method ?></option>
                                <?php
                            }
                            ?>
                            </select>

                        </td>
                    </tr>
                    <tr>
                        <td colspan=2>
                                <button type="button" class="btn btn-success" name="save" onclick="checkmethod()">Procced</button>
                            </td>
                    </tr>
                  
                </table>
                
        
    </div>
</div>

<?php include 'footer.php';?>
<script type="text/javascript">
    
 function checkmethod()
 {
    var paymethod=$("#payment_method").val();
    if(paymethod==1)
    {
        window.location.href='thankyou.php?payid=<?php echo $payid;?>';
    }
    else if(paymethod==2)
    {
        location.href='makepayment.php?payid=<?php echo $payid;?>';
    }
    else
    {
        alert('please select option');
    }
 }   
</script>