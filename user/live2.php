<?php include '../config.php';

if (isset($_POST['query'])) 
{
      $query = "SELECT * FROM product WHERE pname LIKE '{$_POST['query']}%'";
      $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) 
        {?>
            <div class="row">
                <?php

            while ($prod = mysqli_fetch_array($result)) 
            { ?>
                <div class="col-lg-3 col-md-6 col-12">
                    
                        <div class="single-product">
                            <div class="product-image">
                                <img src="../images/<?php echo $prod['img_path']?>" alt="">
                                <div class="button">
                                    <a href="view.php?pid=<?php echo $prod['pid'];?>" class="btn">
                                        <i class="fa-regular fa-eye"></i>View
                                    </a>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="title" style="min-height:50px;">
                                    <?php echo $prod['pname']?>
                                </h4>
                       
                                <div class="price">
                                    <span>Rs.<?php echo $prod['price']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php   } ?>
            </div>
     <?php   } 
        else 
        {
          echo "
          <div class='alert alert-danger mt-3 text-center' role='alert'>
               Not Found
          </div>
          ";
        }
  }
?>