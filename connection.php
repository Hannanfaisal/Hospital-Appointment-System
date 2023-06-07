<?php 

$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "hasystem_db";

$con = mysqli_connect($server_name,$user_name,$password,$db_name);
if(!$con){
    die("Connection to the database failed: " . mysqli_connect());
}

?>

