<?php  include('../config/constants.php'); ?>

<html>
    <head>

        <title>Login - Food order system</title>
        <link rel="stylesheet" href="../css_code/admin.css">

        </head>
        <body>
            <div class="login">
                <h1 class ="text-center">Login</h1><br><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];//Displaying session message
                    unset ($_SESSION['login']);//Removing session message
                }
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];//Displaying session message
                    unset ($_SESSION['no-login-message']);//Removing session message
                }
                ?>
                <!--login form starts here-->
                <form action="" method="POST" class = "text-center">
                    Username:<br>
                    <input type = "text" name = "username" placeholder="Enter the username"><br><br>
                    Password:<br>
                    <input type = "password" name = "password" placeholder="Enter the password"><br><br>

                    <input type = "submit" name = "submit" value="Login" class = "btn-primary">
                    <br><br>
                </form>
                <!--login form ends here-->
                <p class ="text-center" > created by - <a href="www.vijaythapa.com">vijay thapa</a></p>
               
            </div>
        </body>  
    
</html> 
<?php

        //check whether the submit button is clicked or not
        if(isset($_POST['submit']))
        {
            //process fro login
            //1. get the data from login form
            $username= $_POST['username'];
            $password= md5($_POST['password']);


            //2. sql query to check whether the user exists or not
            $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

            //3.execute query
            $res = mysqli_query($conn,$sql);

            //4. count rows  to check whether user exist or not
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //user avilable and login success
                $_SESSION['login']="<div class='success'>login successfully.</div>";
                $_SESSION['user']=$username;//to check whether the user is logged in or not nd logout will unset
                //redirect to manage admin page
                header('location:'.SITEURL.'admin/');
            }
            else
            {
                $_SESSION['login']="<div class='error text-center'>username or password did not match.</div>";
                //redirect to manage admin page
                header('location:'.SITEURL.'admin/login.php');
            }
        }


?>