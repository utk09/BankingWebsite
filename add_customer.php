<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
    <?php
include '_inc/dbconn.php';
$name=  mysqli_real_escape_string($_REQUEST['customer_name']);
$gender=  mysqli_real_escape_string($_REQUEST['customer_gender']);
$dob=  mysqli_real_escape_string($_REQUEST['customer_dob']);
$nominee=  mysqli_real_escape_string($_REQUEST['customer_nominee']);
$type=  mysqli_real_escape_string($_REQUEST['customer_account']);
$credit=  mysqli_real_escape_string($_REQUEST['initial']);
$address=  mysqli_real_escape_string($_REQUEST['customer_address']);
$mobile=  mysqli_real_escape_string($_REQUEST['customer_mobile']);
$email= mysqli_real_escape_string($_REQUEST['customer_email']);

//salting of password
$salt="@g26jQsG&nh*&#8v";
$password=  sha1($_REQUEST['customer_pwd'].$salt);

$branch=  mysqli_real_escape_string($_REQUEST['branch']);
$date=date("Y-m-d");
switch($branch){
case 'KOLKATA': $ifsc="K421A";
    break;
case 'DELHI': $ifsc="D30AC";
    break;
case 'BANGALORE': $ifsc="B6A9E";
    break;
}

$sql3="SELECT MAX(id) from customer";
$result=mysqli_query($conn, $sql3) or die(mysqli_error());
$rws=  mysqli_fetch_array($result);
$id=$rws[0]+1;
$sql1="CREATE TABLE passbook".$id." 
    (transactionid int(5) AUTO_INCREMENT, transactiondate date, name VARCHAR(255), branch VARCHAR(255), ifsc VARCHAR(255), credit int(10), debit int(10), 
    amount float(10,2), narration VARCHAR(255), PRIMARY KEY (transactionid))";

$sql="insert into customer values('','$name','$gender','$dob','$nominee','$type','$address','$mobile',
    '$email','$password','$branch','$ifsc','','ACTIVE')";
mysqli_query($conn, $sql) or die("Email already exists!");
mysqli_query($conn, $sql1) or die(mysqli_error());
$sql4="insert into passbook".$id." values('','$date','$name','$branch','$ifsc','$credit','0','$credit','Account Open')";
mysqli_query($conn, $sql4) or die(mysqli_error());
header('location:admin_hompage.php');
?>