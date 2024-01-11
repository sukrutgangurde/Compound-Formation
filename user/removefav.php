<?php
include '../config.php';

if(isset($_GET['pid'])) 
{  
    $uid = $_SESSION['uid'];
    $deleteid= $_GET['pid'];
    $sql=mysqli_query($conn,"DELETE FROM favourite WHERE pid = '".$deleteid."' AND uid = '".$uid."'") ;
    if($sql==TRUE)
    {
        $response = array('success' => true);
    } 
    else
    {
        $response = array('success' => false);
    }
    echo json_encode($response);
}