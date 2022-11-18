<?php 

session_start();
define('SITEURL','http://127.0.0.1/food-order/');
define('LOCALHOST','127.0.0.1');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn));//Database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));

?>