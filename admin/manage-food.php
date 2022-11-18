<?php include('partials/menu.php'); ?>


<div class='main-content'>
    <div class='wrapper'>
        <h1>Manage food</h1>
        <br /><br /><br />

            <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary"> Add Food</a>
            
            <br /><br /><br />
            <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);

            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['unauthorize']))
             {
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
             }
             if(isset($_SESSION['update']))
             {
                 echo $_SESSION['update'];
                 unset($_SESSION['update']);
             }


            ?>
            
                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    //Create a sql query to get all the food 
                    $sql="SELECT *FROM tbl_food";
                    //Execute the query
                    $res=mysqli_query($conn,$sql);

                    //count rows to check whether we have foods or FT_NOT
                    $count=mysqli_num_rows($res);

                   $sn=1;
                    if($count>0)
                    {
                        //we have food and database
                        //get the food from database and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id=$row['id'];
                            $title=$row['title'];
                            $price=$row['price'];
                            $image_name=$row['image_name'];
                            $feactured=$row["feactured"];
                            $active=$row['active'];
                            ?>
                               <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td>$<?php echo $price; ?></td>
                                <td>
                                <?php 
                                if($image_name==" ")
                                {
                                    //we do not have image display message
                                    echo "<div class='erroe'>image not Added.</div>";

                                }
                                else
                                {
                                    //we have image dispaly image
                                    ?>
                                    <img src="<?php echo SITEURL; ?>Images/food/<?php echo $image_name; ?>" width="100px">
                                    <?php

                                }
                 ?>
                                </td>
                                <td><?php echo $feactured; ?></td></td>
                                <td><?php echo $active; ?></td></td>
                                <td>
                                
                                
                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger"> Delete Food</a>
                                </td>
                               </tr>

                            <?php
                        }

                    }
                    else
                    {
                        //food not added in database
                        echo"<tr> <td colspan='7' class='error'>Food not added Yet.</td></tr>";
                    }


                    ?>
                
                   
                </table>
    </div>
</div>
<?php include('partials/footer.php'); ?>