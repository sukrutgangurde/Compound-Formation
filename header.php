<?php include 'config.php';?>
<?php $page = basename($_SERVER['PHP_SELF']);
$count=(count($_SESSION['cart']));
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Online shop</title>

        <!--fontawsome icons-->
        <link href="fontawesome/css/all.css" rel="stylesheet">


        <!--font-->
        <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@500&display=swap" rel="stylesheet"> 
        
        <!--bootstrap-->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/mystyle.css?v=<?php echo rand()?>" />
        
    </head>

    <body>
        <div id="loader" class="1">
                <h1>0%</h1>
        </div>
    
     <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar shadow ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-start">
                            <div class="shopname">
                                <img src="images/12.jpg" width="50px" height="50px" style="border-radius:50%" alt="">
                               Compound Formation
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="index.php" class="<?php if($page =='index.php'){ echo 'active';}?>">
                                Home</a></li>
                                <li><a href="about.php" class="<?php if($page =='about.php'){ echo 'active';}?>">About Us</a></li>
                                <li><a href="contact.php" class="<?php if($page =='contact.php'){ echo 'active';}?>">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="top-end">
                            <ul class="user-login">
                                <li>
                                    <a href="user/login.php">Sign In</a>
                                </li>
                                <!-- <li>
                                    <a href="cart.php" class="main-btn">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <span class="cartcount"><?php echo $count?></span>
                                    </a>

                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        
    </header>
    <!-- End Header Area -->


    

