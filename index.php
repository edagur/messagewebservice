<?php
	echo "Messages Web Service";
$servername = "http://eu-cdbr-west-02.cleardb.net";
$username = "b7d8ffaef8f044";
$password = "066e8219";
//$dbname = "group2";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "oh no";
} 
?>
