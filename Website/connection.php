<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Cerberus";

// Create connection
//$conn = mysqli_connect($servername, $username, $password, $database);
$dbh = new PDO('mysql:host=localhost;dbname=Cerberus', $username, $password);

?>