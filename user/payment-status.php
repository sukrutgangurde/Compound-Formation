<?php 
 
require_once 'head.php'; ?>
 
<style type="text/css">
.status 
{
padding: 15px;
box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
width: 50%;
margin-top: 2rem;
}
</style>

<?php
$payment_ref_id = $statusMsg = ''; 
$status = 'error'; 
 
// Check whether the payment ID is not empty 
if(!empty($_GET['pid'])){ 
    $payment_txn_id  = base64_decode($_GET['pid']); 
     
    // Fetch transaction data from the database 
    $sqlQ = "SELECT * FROM `payment` WHERE txn_id ='".$payment_txn_id."'"; 
    $row=mysqli_query($conn,$sqlQ); 
 
    if(mysqli_num_rows($row) > 0)
    { 
        $fetch=mysqli_fetch_assoc($row);  
        $status = 'success'; 
        $statusMsg = 'Your Payment has been Successful!'; 
    }else{ 
        $statusMsg = "Transaction has been failed!"; 
    } 
}else{ 
    header("Location:makepayment.php"); 
    exit; 
} 
?>

<?php 
if(!empty($fetch['pay_id']))
    { ?>
    <div id='page-wrapper'>
        <h3 class="alert alert-success" style='text-align:center;'>Bill</h3>
        <h5 style="color:green;text-align:center"><?php echo $statusMsg; ?></h3>
        
        <div class='status mx-auto'>
            <h4>Payment Information</h4>
            <p><b>Reference Number:</b> <?php echo $fetch['pay_id']; ?></p>
            <p><b>Transaction ID:</b> <?php echo $fetch['txn_id']; ?></p>
            <p><b>Paid Amount:</b> <?php echo $fetch['pay_amt'] ?></p>
            <p><b>Payment Status:</b> <?php echo $fetch['status']; ?></p>
        </div>
    </div>
    

<?php }
   else{ ?>
        <h3 class="alert alert-danger mt-3" style='text-align:center;'>Your Payment has been failed!</h3>
<?php } ?>