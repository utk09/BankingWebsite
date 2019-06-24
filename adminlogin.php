<?php 
session_start();
        
if(isset($_SESSION['admin_login'])) 
    header('location:admin_homepage.php');   
?>

<!DOCTYPE html>
<html>
    <head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>  
        <meta charset="UTF-8">
        <title>Admin Login - Online Banking</title>
        
        <link rel="stylesheet" href="newcss.css">
    </head>
<?php
include 'header.php'; ?>

<div class='content'>
<div class="user_login">
    <form action='' method='POST'>
        <table align="center">
            <tr><td><span class="caption">Admin Login</span></td></tr>
            <tr><td colspan="2"><hr></td></tr>
            <tr><td>Username:</td></tr>
            <tr><td><input type="text" name="uname" required></td></tr>
            <tr><td>Password:</td></tr>
            <tr><td><input type="password" name="pwd" required></td></tr>
            <tr><td class="button1"><input type="submit" name="submitBtn" value="Log In" class="button"></td></tr>
        </table>
    </form>
            </div>
        </div>
          
<?php include 'footer.php';
?>
<?php 
include '_inc/dbconn.php';
if(!isset($_SESSION['admin_login'])){
if(isset($_REQUEST['submitBtn'])){
    #$sql="SELECT * FROM admin WHERE id='1'";
    $sql="SELECT login_id, pwd FROM admin WHERE login_id='$username' AND pwd='$password'";
    $result=mysqli_query($conn, $sql);
    $rws=  mysqli_fetch_array($result);
    $username=  mysqli_real_escape_string($_REQUEST['uname']);
    $password=  mysqli_real_escape_string($_REQUEST['pwd']);
    if($rws[0]==$username && $rws[1]==$password) {
        session_start();
        
        $_SESSION['admin_login']=1;

    header('location:admin_hompage.php'); 
}
    else
        header('location:adminlogin.php');      
}
}
else {
    header('location:admin_hompage.php');
}
?>