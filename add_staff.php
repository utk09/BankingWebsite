<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php
include '_inc/dbconn.php';
$name=  mysqli_real_escape_string($_REQUEST['staff_name']);
$gender=  mysqli_real_escape_string($_REQUEST['staff_gender']);
$dob=  mysqli_real_escape_string($_REQUEST['staff_dob']);
$status=  mysqli_real_escape_string($_REQUEST['staff_status']);
$dept=  mysqli_real_escape_string($_REQUEST['staff_dept']);
$doj=  mysqli_real_escape_string($_REQUEST['staff_doj']);
$address=  mysqli_real_escape_string($_REQUEST['staff_address']);
$mobile=  mysqli_real_escape_string($_REQUEST['staff_mobile']);
$email= mysqli_real_escape_string($_REQUEST['staff_email']);
$password=  mysqli_real_escape_string($_REQUEST['staff_pwd']);

$sql="insert into staff values('','$name','$dob','$status','$dept','$doj','$address','$mobile',
    '$email','$password','$gender','')";
mysqli_query($conn, $sql) or die("the email-id is already registered");
header('location:admin_hompage.php');
?>