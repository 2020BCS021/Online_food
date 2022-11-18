<?php  include('partials/menu.php'); ?>


<div class="main-content">
<div class="wrapper">
    <h1>Add Category</h1>

<br><br>

<?php
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}

?>
<br><br>
<!---add caterory start here --->
<form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
        <tr>
            <td>Title: </td>
            <td>
                <input type="text" name="title" placeholder="category Title">
            </td>       
         </tr>
         <tr>
            <td>Select Image:</td>
            <td>
                <input type="file" name="image">
            </td>
         </tr>

         <tr>
            <td>featured:</td>
            <td>
                <input type="radio" name="featured" value="Yes">Yes
                <input type="radio" name="featured" value="Yes">No
            </td>
         </tr>
         <tr>
            <td>Active:</td>
            <td>
                <input type="radio" name="active" value="YES">Yes
                <input type="radio" name="active" value="YES">No
            </td>
         </tr>
         <tr>
            
            <td colspan='2'>
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
            
         </tr>
    </table>

</form>

</div>
</div>
<!---add caterory end here --->


<?php
//check whether submit button work or not
//check whether the image is selected or not and set the value for image name accordingly
//print_r($_FILES['image']);
//die();//break the code here
if(isset($_POST['submit']))
{
   //echo"cliched";
   //1. Get the value from category form 
   $title =$_POST['title'];
   //for radio input ,we need to check whether the button is selected or not
   if(isset($_POST['featured']))
   {
    //GEt the value from form 
    $featured=$_POST['featured'];
   }
   else{
    //set default value
    $featured="No";
   }
   if(isset($_POST['active']))
   {
    $active = $_POST['active'];
   }
   else{
    $active = "No";
   }
    
   if(isset($_FILES['image']['name']))
   {
    //upload the image we need image name and source path and destination path
    $image_name = $_FILES['image']['name'];

    //auto rename our image
    //get the extention of our image(jpg,png,gif,etc) e.g "special.food1.jpg"
    
    $fileNameParts = explode('.', $image_name);
$ext = end($fileNameParts);
    //rename the image
    $image_name="Food_Category_".rand(000,999).'.'.$ext;//e.g.Food_Category_834.jpg
    

    $source_path= $_FILES['image']['tmp_name'];
    $destination_path = "../Images/category/".$image_name;
    //upload the image
    $upload = move_uploaded_file($source_path,$destination_path);
    //check whether image is uploaded or not
    //and if the imagr is not uploaded we stop the process and redirect with erroe message
    if($upload==false)
    {
        //set message
        $_SESSION['upload']="<div class='error'>failed to upload image. </div>";
        //redirect to add category page
        header('location:'.SITEURL."admin/add-category.php");
        //stop the process
        die();
    }


   }
   else{
    $image_name="";
   }

   //2 create sql query to insert category to database
 $sql = "INSERT INTO tbl_category SET
     title='$title',
     image_name='$image_name',
     featured='$featured',
     active='$active'
     ";

     //3.Execute the query and save in database
     //$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $res = mysqli_query($conn,$sql);
     //$check whether Query executed or not and data added or not
     if($res==true)
     {
        //Query execuuted and category added
        $_SESSION['add']="<div class= 'success'>Category Added successfully.</div>";
        //Redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');

     }
     else
     
     {
        //failed to add category 
        $_SESSION['add']="<div class= 'error'>failed to Add category successfully.</div>";
        //Redirect to manage category page
        header('location:'.SITEURL.'admin/add-category.php');
     }

}

?>

<?php include('partials/footer.php'); ?>