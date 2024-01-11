<?php $page = basename($_SERVER['PHP_SELF']);?>
<?php include('../config.php');
$count=(count($_SESSION['cart']));
if(empty($_SESSION['uid']))
{?>

	<script>
		location.href='login.php';
	</script> 

<?php
}?>

<!DOCTYPE html>
<html lang="en">

<head>
        <title>Online shop</title>
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">

        <!--fontawsome icons-->
        <link href="../fontawesome/css/all.css" rel="stylesheet">

        
        <!--font-->
        <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@500&display=swap" rel="stylesheet"> 
        
        <!--bootstrap-->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../bootstrap/css/dataTables.bootstrap5.min.css" />
        <link rel="stylesheet" href="../css/mystyle.css?v=<?php echo rand()?>" />
        
    </head>

<body>
	<div class="wrapper">
		<nav class="sidebar shadow  " style="background-color:#73648A;">
			<div class="sidebar-content">
				<a class="sidebar-brand" href="index.php"><i class="fa-solid fa-circle-user">
					</i>
                    User
                </a>

				<ul class="sidebar-nav">

					<li class="sidebar-item  <?php if($page == 'index.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="index.php">
							<i class="fa-solid fa-house"></i>Home
                        </a>
					</li>

					<li class="sidebar-item  <?php if($page == 'cart.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="cart.php">
							<i class="fas fa-cart-arrow-down"></i>Cart Items
                        </a>
					</li>


					<li class="sidebar-item <?php if($page =='order.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="order.php">
							<i class="fa-solid fa-list-ul"></i>My Order
                         </a>
					</li>

					<li class="sidebar-item <?php if($page =='cancelorder.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="cancelorder.php">
							<i class="fa-solid fa-circle-xmark"></i></i>Cancel Order
                         </a>
					</li>

					<li class="sidebar-item <?php if($page =='profile.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="profile.php">
							<i class="fa-solid fa-user"></i>Profile
                        </a>
					</li>

					<li class="sidebar-item  <?php if($page == 'logout.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="logout.php">
						<i class="fa-solid fa-power-off"></i>Log out
                         </a>
					</li><hr>

				</ul>
			</div>	
		</nav>

        <div class="main">
			<nav class="navbar navbar-expand  navbar-light navbar-bg shadow" style="background-color:#1f0733; color:white; height:50px;">
                <div class="text-uppercase fw-bold"  style="font-size: 16px;">
                    &nbsp;&nbsp;&nbsp;
                	<img src="../images/12.jpg" width="30" height="30" alt="">
                    Compound Formation
				</div>
				<div class="btn symbol">
					<a href="fav.php">
						<i class="fa-solid fa-heart" style="position: absolute;right: 7%;top: 18%;background-color:red"></i>
						<span class="favcount" >
					<?php 
						$uid=$_SESSION['uid'];
						$sql=mysqli_query($conn,"SELECT count(*) FROM favourite WHERE uid='".$uid."'");
						while($row=mysqli_fetch_array($sql)){echo($row[0]) ;}
					?></span>
					</a>

					<a href="cart.php">
					 	<i class="fa-solid fa-cart-shopping" style="position:absolute;right:12%;top:18%;background-color:#ffb300"></i>
					 	<span class="ccount"><?php echo $count?></span>
					</a>
				</div>
            </nav>

