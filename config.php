<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

define('STRIPE_API_KEY', 'sk_test_51OM4k6SCfiGXZ72hadXNvFORRNh3xVIHxuVfL4cxolik4CTvzMKp89gzCOrSbTAAmYcJJ63z6dnmHNiDFroNmrAu007MEJ81CO'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51OM4k6SCfiGXZ72htT8ytb1K6oCqPG6YXFfA1rc9PudZ56Bda8Pw0qHtyQViIVroW9TXzM2TdY9CJJ7gpA9z3a9G007ofDnGP1'); 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

date_default_timezone_set('Asia/Kolkata');

//payment
$payment_method[1]='Cash on Delivery';
$payment_method[2]='Online Payment';

//category of products

$product_category[1]='Wire Compound';
$product_category[2]='Gate';
$product_category[3]='Walls';
$product_category[4]='Bricks';


if((isset($_GET['payid'])) && (($_GET['payid'])>0))
{
  $payid=$_GET['payid'];

  $sql="SELECT SUM(ot.prodprice*ot.prodqty)  FROM orderitem ot JOIN orders o on o.orderid=ot.orderid
  WHERE o.orderid='".$payid."' limit 1";
  $row=mysqli_query($conn,$sql) or mysqli_die(mysqli_error());
  $fetch=mysqli_fetch_row($row);
      
  $itemName = "cart total"; 
  $itemPrice = $fetch[0];  //order total
  $currency = "INR";
}
else
{
  $itemName = "cart total"; 
  $itemPrice = 1;  //order total
  $currency = "INR";
}





// function writefile($txt){
// $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
// $txt .= "\n";
// fwrite($myfile, $txt);

// fclose($myfile);
//}






?> 