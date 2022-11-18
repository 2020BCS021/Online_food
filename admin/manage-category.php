<?php include('partials/menu.php'); ?>


<div class='main-content'>
    <div class='wrapper'>
        <h1>manage category</h1>
        <br /><br /><br />

        <?php
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if(isset($_SESSION['remove']))
{
    echo $_SESSION['remove'];
    unset ($_SESSION['remove']);
}
if(isset($_SESSION['delete']))
{
    echo $_SESSION['delete'];
    unset ($_SESSION['delete']);
}

?>
<br><br>
            <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
            <br /><br /><br />
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

<?php

//Query to get all category from database
   $sql="SELECT * FROM tbl_category";

   //Execute query
   $res=mysqli_query($conn,$sql);

   //count rows
   $count = mysqli_num_rows($res);

   //Create serial number variables and  assing value is 1
   $sn=1;
   //check wether we have data in data base of not
   if($count>0)
   {
    //we have data in database
    // get the data and dispaly
    while($row=mysqli_fetch_assoc($res)){
        $category_id = $row['category_id'];
        $title = $row['title'];
        $image_name = $row["image_name"];
        $featured = $row['featured'];
        $active = $row['active'];
        ?>
         <tr>
                        <td><?php echo $sn++ ; ?></td>
                        <td><?php echo $title; ?></td>

                        <td>
                            <?php 
                            //check whether image name is available or NOT
                            if($image_name!=" "){
                                //Dispaly the Image
                                ?> 
                                
                                <img src="<?php echo SITEURL; ?>Images/category/<?php echo $image_name; ?>" width="100px">


                             <?php

                            }
                            else{
                                //Dispaly the message
                                echo "<div class= 'error'>Image not added. </div>";
                            }
                            
                            ?>
                        </td>

                        <td><?php echo $featured; ?></td>
                        <td><?php echo 
                        
                        $active; ?></td>
                        <td>
                        <a href="<?php echo SITEURL; ?>admin/update-category.php?category_id=<?php echo $category_id; ?>&image_name=<?php echo $image_name; ?>" class="btn-secondary">Update Category</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?category_id=<?php echo $category_id; ?>&image_name=<?php echo $image_name; ?>"class="btn-danger">Delete Category</a>
                        </td>
                    </tr>

        <?php

    }
   }
   else{
    //we do not have data
    //we willdisplay message inside table
    ?>

    <tr>
<td colspan="6"><div class="error>"No category added</div></td>
    </tr>

    <?php
   }



?>
                   
                   
                </table>
    </div>
</div>
<?php include('partials/footer.php'); ?>