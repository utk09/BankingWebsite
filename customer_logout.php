<?php 
session_start();

include '_inc/dbconn.php';

$date=date('Y-m-d h:i:s');
$id=$_SESSION['login_id'];
$sql="UPDATE customer SET lastlogin='$date' WHERE id='$id'";
mysqli_query($conn, $sql) or die(mysqli_error());

session_destroy();
header('location:index.php');
?>