<?php
include 'connection.php';

$deleteId = $_GET['deleteId'];
$query = "DELETE FROM doctors WHERE id = '$deleteId'";
$res = mysqli_query($con, $query);
if (!$res) {
    die("Error in the query");
} else {
    header('location:admin_mange_doctors.php');
    die();
}
