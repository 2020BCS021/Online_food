<?php include('partials/menu.php'); ?>

<html>
    <head>
        <title> Food Order Website - Home Page</title>
        <link rel= "stylesheet" href="../css_code/admin.css">
</head>
<body>


    <!--main content section starts-->
    <div class="main-content">
        <div class="wrapper">           
            <h1>Dashboard</h1>
            <br><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];//Displaying session message
                    unset ($_SESSION['login']);//Removing session message
                }
                
                ?>
            <br><br>
            <div class="col-4">
                <h1>5</h1>
                <br />
                Categories
            </div>

            <div class="col-4">
                <h1>5</h1>
                <br />
                Categories
            </div>

            <div class="col-4">
                <h1>5</h1>
                <br />
                Categories
            </div>

            <div class="col-4">
                <h1>5</h1>
                <br />
                Categories
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <!--main content section ends here-->


    <!--footer section starts-->
    <div class="footer">
        <div class="wrapper">           
        <p class="text-center"> 2020 All rights reserved by some restaurant. Developed by -<a href ="#"> radhika tamboli</a></p>
        </div>
    </div>
    <!--footer section ends here-->
</body>
    </html>