<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "credituser";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn==false) {
    die("Connection failed: " . $conn->connect_error);   
}
?>