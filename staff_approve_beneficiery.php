<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<?php
if(isset($_REQUEST['submit_id']))
{
    $id=$_REQUEST['customer_id'];
    
    include '_inc/dbconn.php';
    $sql="UPDATE beneficiary1 SET status='ACTIVE' WHERE id='$id'";
    mysqli_query($conn, $sql) or die(mysqli_error());
    
   echo '<script>alert("Beneficiary status ACTIVE ");';
   echo 'window.location= "staff_beneficiary.php";</script>';
}