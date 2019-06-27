<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kuetian";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die(mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE users (
roll_no VARCHAR(50) PRIMARY KEY, 
first_name VARCHAR(50) NOT NULL,
last_name VARCHAR(50) NOT NULL,
department VARCHAR(50),
batch VARCHAR(50),
phone VARCHAR(50),
email VARCHAR(50) NOT NULLs,
user_pwd VARCHAR(50) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    
} else {
    mysqli_error($conn);
}

mysqli_close($conn);
?>

