<?php 

//Include constants.php file here
include('../config/constants.php');

//1. Get the id of admin to be deleted
$id = $_GET['id'];

//2. Create the sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Execute the query
$res = mysqli_query($conn , $sql);

//check whether the query is executed successfully or not
if($res==true)
{
    //Query executed successfully and admin deleted
    //echo "Admin deleted";
    //Create session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully.</div>";
    //Redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    //Failed to delete the admin
    //echo "Failed to delete admin";
    $_SESSION['delete'] = "<div class='error'>Failed to delete admin.Try again later</div>";
    //Redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
//3. Redirect to manage admin page with message (success/error)
?>