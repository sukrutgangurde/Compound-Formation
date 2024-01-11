<?php $page = basename($_SERVER['PHP_SELF']);?>
<?php include('../config.php')?>

<!DOCTYPE html>
<html lang="en">

<head>
        <title>Online shop</title>
				

        <!--fontawsome icons-->
        <link href="../fontawesome/css/all.css" rel="stylesheet">

        
        <!--font-->
        <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@500&display=swap" rel="stylesheet"> 
        
        <!--bootstrap-->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../bootstrap/css/dataTables.bootstrap5.min.css" />
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-datepicker.min.css" />
        <link rel="stylesheet" href="../css/mystyle.css?v=<?php echo rand()?>" />
        
    </head>

<body>
	<div class="wrapper">
		<nav class="sidebar shadow">
			<div class="sidebar-content">
				<a class="sidebar-brand" href="index.php"><i class="fa-solid fa-circle-user">
					</i>
                    Admin
                </a>

				<ul class="sidebar-nav">

					<li class="sidebar-item  <?php if($page == 'index.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="index.php">
							<i class="fa-solid fa-house"></i>Home
                        </a>
					</li>

					<li class="sidebar-item  <?php if($page == 'addproduct.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="addproduct.php">
							<i class="fa-solid fa-plus"></i>Add products
                        </a>
					</li>


					<li class="sidebar-item <?php if($page =='editproduct.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="editproduct.php">
							<i class="far fa-edit"></i></i>Edit products
                         </a>
					</li>

					<li class="sidebar-item <?php if($page =='customerdetails.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="customerdetails.php" style="padding: 20px 8px;">
							<i class="fas fa-users"></i>Customer Details
                         </a>
					</li>

					<li class="sidebar-item <?php if($page =='orderdetails.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="orderdetails.php">
							<i class="fa-solid fa-file-lines"></i>Order Details
                        </a>
					</li>

					<li class="sidebar-item <?php if($page =='stock.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="stock.php">
							<i class="fa-solid fa-cubes"></i>Stock
                        </a>
					</li>

					<li class="sidebar-item <?php if($page =='supplier.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="supplier.php">
							<i class="fa-solid fa-truck-field-un"></i>Suppliers
                        </a>
					</li>


					<li class="sidebar-item <?php if($page =='support.php'){ echo 'active';}?>">
						<a class="sidebar-link" href="support.php">
							<i class="fa-solid fa-circle-info"></i>Support
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
			<nav class="navbar navbar-expand navbar-light navbar-bg shadow" style="background-color:#1a1b21; color:white;">
                <div style="font-size: 20px;">
                    &nbsp;&nbsp;&nbsp;
                    <img src="../images/12.jpg" width="30" height="30" alt="">
                    Compound Formation
				</div>
            </nav>

