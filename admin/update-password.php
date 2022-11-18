<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>change password</h1>

        <br><br>

        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
        }
        
        ?>
        <form action=""method="POST">
        <table class="tbl-30">
                <tr>
                    <td>Current password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="current password">
                    </td>
                </tr>
                <tr>
                    <td>New password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm password: </td>
                    <td>
                        
                        <input type="password" name="confirm_password" placeholder="Confirm password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value ="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="change password" class="btn-secondary">
                    </td>
                </tr>
        </table>       
        </form>
    </div>
</div>
<?php
    //check whether the submit button is clicked or not
    if(isset($_POST))
    {
        //echo "Button clicked";
        //get all the values from form to update
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //create the sql query to update admin
        $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password='$current_password' ";
        //execute the query
        $res = mysqli_query($conn,$sql);

        if($res==true)
        {
            //check whether data is available or not 
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                //user exists and password can be changed
                //echo "User found";

                //check whether the new password and confirm match or not
                if($new_password==$confirm_password)
                {
                    //update the password
                    //create the sql query to update password
                        $sql2 = "UPDATE tbl_admin SET
                        password='$new_password'
                        WHERE id = '$id'
                        ";
                        //execute the query
                        $res2 = mysqli_query($conn,$sql);
                        //check whether query is executed or not
                        if($res2==true)
                        {
                            $_SESSION['change-pwd'] = "<div class = 'success'>Password changed successfully.</div>";
                            //redirect the user
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                        else
                        {
                            $_SESSION['change-pwd'] = "<div class = 'error'>Failed to change password.</div>";
                            //redirect the user
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                }
                else
                {
                $_SESSION['pwd-not-found'] = "<div class = 'error'password not found.</div>";
                //redirect the user
                header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                //user does not exists set message and redirect 
                $_SESSION['User-not-found'] = "<div class = 'error'user not found.</div>";
                //redirect the user
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
    }
    
?>
<?php include('partials/footer.php'); ?>