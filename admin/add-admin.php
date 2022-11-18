<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br /><br />
        <?php 
                
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//Displaying session message
                    unset ($_SESSION['add']);//Removing session message
                }
                ?>

        <form action="" method="POST">


            <table class="tbl-30">
                <tr>
                    <td>Full name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="your username">
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="your password">
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
                

            </table>
        </form>
    </div>
</div>





<?php include('partials/footer.php'); ?>

<?php
  

  if(isset($_POST['submit']))
  {
    //Button clicked
    //1.Get the data from form
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    //2.SQL query to save the data into database
    $sql = "INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'   
    ";
  }
    
    
    //Executing query and saving data in database
    $res = mysqli_query( $conn , $sql ) or die(mysqli_error($conn));

    //checking whether the (query is executed) the data is inserted or not and display  appropriate message
    if($res==TRUE)
    {
        //echo "data inserted";
        //create the session variable to display the message
        $_SESSION['add']="Admin added successfully";
        //redirect page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        //echo "data not inserted";
        $_SESSION['add']="Failed to add admin";
        //redirect page to manage admin
        header("location:".SITEURL.'admin/add-admin.php');
    }
  
?>