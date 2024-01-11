<?php include 'header.php';?>
<?php 
if(isset($_POST['submit']))
{
        $email=$_POST['email'];
        $name=$_POST['name'];
        $message=$_POST['message'];

        $sql="INSERT INTO support (`email`,`name`,`message`) values('".$email."','".$name."','".$message."')";
        mysqli_query($conn,$sql)or die(mysqli_error());
        ?>
        <script type="text/javascript">location.href="contact.php"</script>
        <?php
}

?>
<style type="text/css">
       
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}

.ccontainer{
  width: 85%;
  margin-top: 20px;
  margin-left: 30px;
  border-radius: 6px;
  padding: 20px 60px 30px 40px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
.ccontainer .content{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.ccontainer .content .left-side{
  width: 25%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 15px;
  position: relative;
}

.content .left-side .details{
  margin: 14px;
  text-align: center;
}
.content .left-side .details i{
  font-size: 30px;
  color: #3e2093;
  margin-bottom: 10px;
}

.content .left-side .details .text-one,
{
  font-size: 14px;
}
.ccontainer .content .right-side{
  width: 75%;
  margin-left: 75px;
}
.content .right-side .topic-text{
  font-size: 23px;
  font-weight: 600;
  color: #3e2093;
}
.right-side .input-box{
  height: 50px;
  width: 100%;
  margin: 12px 0;
}
.right-side .input-box input,
.right-side .input-box textarea{
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  font-size: 16px;
  background: #F0F1F8;
  border-radius: 6px;
  padding: 0 15px;
  resize: none;
}
.right-side .message-box{
  min-height: 110px;
}
.right-side .input-box textarea{
  padding-top: 6px;
}
.right-side .button{
  display: inline-block;
  margin-top: 12px;
}
button{
  color: #fff;
  font-size: 18px;
  outline: none;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  background: #3e2093;
  cursor: pointer;
}

@media (max-width: 950px) {
  .ccontainer{
    width: 90%;
    padding: 30px 40px 40px 35px ;
  }
  .ccontainer .content .right-side{
   width: 75%;
   margin-left: 55px;
}
}

  .ccontainer .content{
    flex-direction: column-reverse;
  }
 .ccontainer .content .left-side{
   width: 100%;
   flex-direction: row;
   margin-top: 40px;
   justify-content: center;
   flex-wrap: wrap;
 }
 
 .ccontainer .content .right-side{
   width: 100%;
   margin-left: 0;
 }

   </style>
<body>
  <div class="ccontainer">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="text-one">Nashik</div>
          
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="text-one">+91 1111111111</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="text-one">Compound@gmail.com</div>
          
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>

      <form  method="POST">
        <div class="input-box">
          <input class="form-control" type="text" name="name" placeholder="Enter your name">
        </div>
        <div class="input-box">
          <input class="form-control" type="email" name="email" placeholder="Enter your email">
        </div>
        <div class="input-box message-box">
          <input class="form-control" type="text" name="message" placeholder="Enter your message">
        </div>
        
          <button type="submit" name="submit" >Send</button>
        
      </form>
    </div>
    </div>
  </div>
</body>



<?php include 'footer.php';?>

