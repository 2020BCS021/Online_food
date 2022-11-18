<?php
//include constant file
   include('../config/constants.php');
//check whether the  id and image_name value is set or not
if(isset($_GET['category_id']) AND isset($_GET['image_name']))
{
    //Get the value and Delete
    //echo "Get Value and Delete";
    $category_id= $_GET['category_id'];
    $image_name = $_GET['image_name'];
    //Remove the physical image file is available

    //Delete Date from Date Datebase 
    //Redirect to manage Category page with Message
    if($image_name !=" ")
    {
        //image is available.so remove it
        $path="../Images/category/".$image_name;
        //remove the image
        $remove= unlink($path);

        //IF failed to remove image then add an error message and stop the process
        if($remove==false){
         //set the session message 
         $_SESSION['remove']="<div class='error'>Failed to remove Category Image .</div>";
         //Redirect to manage Category page 
         header('location:'.SITEURL.'admin/manage-category.php');
         //stop the process
         die();
        }
    }
    //delete data from database
    //sql query 
    $sql="DELETE FROM tbl_category WHERE category_id=$category_id";
    $res = mysqli_query($conn,$sql);
 //check where data delete from database or not
 if($res==true)
 {
    //set success message and redirect
    $_SESSION['delete']="<div class='success'>Catogory deleted successfully</div>";
    //redirect to manage category
    header('location:'.SITEURL.'admin/manage-category.php');
 }
 else{
    //set fail message and redirect 
    //set success message and redirect
    $_SESSION['delete']="<div class='error'>failed to  deleted category</div>";
    //redirect to manage category
    header('location:'.SITEURL.'admin/manage-category.php');
 }


}
else{
    //redirect to manage category page
    header('location:'.SITEURL.'admin/manage-category.php');
    
}

?>