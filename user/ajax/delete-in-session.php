<?php 
// session_start();
include '../connection.php';

// Retrieve the session ID from the GET request
$id = $_GET['id'];

$sql = "DELETE FROM tempproduct WHERE id = '$id'";
$result = mysqli_query($DBCON, $sql) or die("delete-in-session failed");
?>

