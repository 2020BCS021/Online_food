<?php
    //include constants.php for siteurl
    include('../config/constants.php'); 

    //destroy the session
    session_destroy();//unsets $_SESSION['user']

    //redirect to login page
    header('location:'.SITEURL.'admin/login.php');
?>