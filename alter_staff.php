<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php
include '_inc/dbconn.php';
$name=  mysqli_real_escape_string($_REQUEST['edit_name']);
$gender=  mysqli_real_escape_string($_REQUEST['edit_gender']);
$dob=  mysqli_real_escape_string($_REQUEST['edit_dob']);
$id=  mysqli_real_escape_string($_REQUEST['current_id']);
$status=  mysqli_real_escape_string($_REQUEST['edit_status']);
$dept=  mysqli_real_escape_string($_REQUEST['edit_dept']);
$doj=  mysqli_real_escape_string($_REQUEST['edit_doj']);
$address=  mysqli_real_escape_string($_REQUEST['edit_address']);
$mobile=  mysqli_real_escape_string($_REQUEST['edit_mobile']);

$sql="UPDATE staff SET  name='$name', dob='$dob', relationship='$status', 
    department='$dept', doj='$doj', address='$address', 
        mobile='$mobile', gender='$gender' WHERE id='$id'";
mysqli_query($conn, $sql) or die(mysqli_error());
header('location:admin_hompage.php');
?>