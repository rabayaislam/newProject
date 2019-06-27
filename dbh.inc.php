<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword);

if (!$conn) {
    die(mysqli_connect_error());
}
else
{
    
}
//Create database
$sql = "CREATE DATABASE kuetian";
if (mysqli_query($conn, $sql)) {
    
} else {
    mysqli_error($conn);
}

mysqli_close($conn);
?>
