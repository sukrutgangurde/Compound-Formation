<?php
include '../config.php';

if(isset($_POST['pid'])) 
{  
    $uid = $_SESSION['uid'];
    $addproductid = $_POST['pid'];

    $result = mysqli_query($conn,"SELECT count(pid) FROM favourite WHERE uid = '".$uid."' AND pid = '".$addproductid."'") or die(mysqli_error());
    $countid = mysqli_fetch_array($result);
    if($countid[0] == 1)
    {
        mysqli_query($conn,"DELETE FROM favourite WHERE pid = '".$addproductid."' AND uid = '".$uid."'") or die(mysqli_error()); // If product has already added to favourite then remove from Database
        $action = 'remove';
    } 
    else 
    {
        mysqli_query($conn,"INSERT INTO favourite SET pid = '".$addproductid."', uid = '".$uid."'") or die(mysqli_error()); // If product has not in wishlist then add to Database
         $action = 'add';

    }

    $response = array('success' => true, 'action' => $action);
    echo json_encode($response);
}


