<?php   
require_once 'head.php'; 

?>
<script>
	
	var payid="<?php echo $_GET['payid'] ?>";

</script>

<!-- Stripe JS library -->
<script src="https://js.stripe.com/v3/"></script>
<script src="stripe-php/js/checkout.js?rd=<?php echo time()?>" STRIPE_PUBLISHABLE_KEY="<?php echo STRIPE_PUBLISHABLE_KEY; ?>" defer></script>
<div id="page-wrapper">
<div class="panel">
   
    <div class="panel-body">
        <!-- Display status message -->
        <div id="paymentResponse" class="hidden"></div>
        
        <!-- Display a payment form -->
        <form id="paymentFrm" class="hidden">
            <div class="form-group">
                <!-- <label>NAME</label> -->
                <input type="hidden" id="name" class="field" placeholder="Enter name" required="" autofocus="" value="<?php echo $_SESSION['uname'];?>">
            </div>
            <div class="form-group">
                <!-- <label>EMAIL</label> -->
                <input type="hidden" id="email" class="field" placeholder="Enter email" required="" value="<?php echo $_SESSION['umail'];?>">
            </div>
            
            <div id="paymentElement" style='width:50%' class="mx-auto">
                <!--Stripe.js injects the Payment Element-->
            </div>
           
            <!-- Form submit button -->
            <div  style='width:50%' class="mx-auto mt-4">
            <button id="submitBtn" class="btn btn-success">
                <div class="spinner hidden" id="spinner"></div>
                <span id="buttonText">Pay Now</span>
            </button>
        </div>
            
        </form>
        
        <!-- Display processing notification -->
         <div id="frmProcess" class="hidden">
            <span class="ring"></span>
        </div>
        
        
    </div>
</div>
</div>