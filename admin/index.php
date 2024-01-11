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
    <div class="content">
      <div class="container-fluid p-0">
          <div class="row">
              <div class="col-sm-3">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                          <h5 class="card-title text-primary">Total Products</h5>
                        </div>

                        <div class="col-auto">
                          <div class="stat text-primary">
                          <i class="fa-solid fa-mobile-screen-button"></i>
                          </div>
                        </div>
                    </div>
                  <h2 class="mt-1 mb-3" style=" color:red;"> 
                    <?php $sql=mysqli_query($conn,"SELECT count(*) FROM product");
                           while($row=mysqli_fetch_array($sql)){echo($row[0]) ;}
                    ?>
                    </h2>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col mt-0">
                        <h5 class="card-title text-success">Total Users</h5>
                      </div>

                      <div class="col-auto">
                        <div class="stat text-success">
                          <i class="fa-solid fa-user-group"></i>
                        </div>
                      </div>
                    </div>
                    <h2 class="mt-1 mb-3" style=" color:red;">
                      <?php $sql=mysqli_query($conn,"SELECT count(*) FROM users");
                           while($row=mysqli_fetch_array($sql)){echo $row[0];}
                    ?>
                    </h2>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col mt-0">
                        <h5 class="card-title text-warning">Total payment</h5>
                      </div>

                      <div class="col-auto">
                        <div class="stat text-warning">
                          <i class="fa-solid fa-cash-register"></i>
                        </div>
                      </div>
                    </div>
                    <h2 class="mt-1 mb-3" style=" color:red;">
                      <?php $sql=mysqli_query($conn,"SELECT SUM(pay_amt) FROM payment");
                           while($row=mysqli_fetch_array($sql)){echo $row[0];}
                    ?>
                    </h2>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col mt-0">
                        <h5 class="card-title text-info">Total supplier</h5>
                      </div>

                      <div class="col-auto">
                        <div class="stat text-info">
                         <i class="fa-solid fa-boxes-packing"></i>
                        </div>
                      </div>
                    </div>
                    <h2 class="mt-1 mb-3" style=" color:red;">
                      <?php $sql=mysqli_query($conn,"SELECT count(*) FROM supplier");
                        while($row=mysqli_fetch_array($sql)){echo $row[0];}
                    ?>
                    </h2>
                  </div>
                </div>
              </div>

          </div>

          <div class="row mt-5">
              <div class="col-sm-3">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                          <h5 class="card-title text-danger">Total order</h5>
                        </div>

                        <div class="col-auto">
                          <div class="stat text-danger">
                          <i class="fa-solid fa-users"></i>
                          </div>
                        </div>
                    </div>
                  <h2 class="mt-1 mb-3" style=" color:red;"> 
                    <?php $sql=mysqli_query($conn,"SELECT count(*) FROM  orders");
                        while($row=mysqli_fetch_array($sql)){echo $row[0];}?>
                    </h2>
                  </div>
                </div>
              </div>

              

              <div class="col-sm-3">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col mt-0">
                        <h5 class="card-title" style="color:#8512e5;">Today's orders</h5>
                      </div>

                      <div class="col-auto">
                        <div class="stat" style="color:#8512e5;">
                         <i class="fa-solid fa-clipboard-list"></i>
                        </div>
                      </div>
                    </div>
                    <h2 class="mt-1 mb-3"style=" color:red;">
                      <?php $date=date("Y-m-d");
                      $sql=mysqli_query($conn,"SELECT count(*) FROM orders WHERE date(odate)='".$date."'");
                        while($row=mysqli_fetch_array($sql)){echo $row[0];}
                    ?>
                    </h2>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col mt-0">
                        <h5 class="card-title" style="color:#b45204;">Today's Payment</h5>
                      </div>

                      <div class="col-auto">
                        <div class="stat" style="color:#b45204;">
                         <i class="fa-regular fa-credit-card"></i>
                        </div>
                      </div>
                    </div>
                    <h2 class="mt-1 mb-3" style=" color:red;">
                      <?php $date=date("Y-m-d");
                      $sql="SELECT SUM(pay_amt) FROM payment WHERE date(pay_datetime)='".$date."'";
                      $r=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($r)){echo $row[0];}
                    ?>
                    </h2>
                  </div>
                </div>
              </div>


          </div>
        </div>
    </div>
</div> 
<br><br>

<?php include('footer.php');?>