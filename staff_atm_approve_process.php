<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<?php
if(isset($_REQUEST['submit_id']))
{
    include '_inc/dbconn.php';
    $id=$_REQUEST['customer_id'];
    
    $sql="SELECT * FROM atm WHERE id='$id'";
    $result=  mysqli_query($conn, $sql) or die(mysqli_error());
    $rws=  mysqli_fetch_array($result);
                
    if($rws[3]=="PENDING")
    $sql="UPDATE atm SET atm_status='ISSUED' WHERE id='$id'";
    
    mysqli_query($conn, $sql) or die(mysqli_error());
    
   echo '<script>alert("ATM Card Issued");';
   echo 'window.location= "staff_atm_approve.php";</script>';
}