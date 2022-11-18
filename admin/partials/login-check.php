<?php 

//Authorization access control

if(!isset($_SESSION['user']))// if user session is not set
{
    //user is not logged in
    $_SESSION['no-login-message'] = "<div class='error text-center'>please login to access admin panel.</div>";
    //redirect to login page
    header('location:'.SITEURL.'admin/login.php');
}

?>