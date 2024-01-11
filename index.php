<?php include 'header.php';?>


<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="height:550px; background-color:black; color:white; font-size:18px;">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/Stone.jpg" class="d-block " alt="" style="height:430px;width:700px;">
      <div class="carousel-caption d-none d-md-block">
        <a href=menu.php class="btn btn-primary" style="margin-bottom: 15px;">View All Products</a>
        <h5 style="font-size:18px; color:white;">Secure your Land</h5>
        <p style="font-size:18px; color:white;">Latest Compound Products buy here.. </p>
      </div>
    </div>

    <div class="carousel-item " >
      <img src="images/Custom.jpg" class="d-block" alt="" style="height:450px;width:800px;">
      <div class="carousel-caption d-none d-md-block">
        <a href=menu.php class="btn btn-primary" style="margin-bottom: 15px;">View All Products</a>
        <h5 style="font-size:18px; color:white;">Wall Compound</h5>
        <p style="font-size:18px; color:white;">Custimiza</p>
      </div>
    </div>
    <div class="carousel-item" >
      <img src="images/Gate.jpg" class="d-block" alt="" style="height:450px;width:600px;">
      <div class="carousel-caption d-none d-md-block">
        <a href=menu.php class="btn btn-primary" style="margin-bottom: 15px;">View All Products</a>
        <h5 style="font-size:18px; color:white;">Red Bricks</h5>
        <p style="font-size:18px; color:white;">Lightweight, Strong</p>
      </div>
    </div>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php include 'footer.php'?>