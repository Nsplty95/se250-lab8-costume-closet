
<?php
//Connect to the databse
$host = "localhost";
$username = "root";
$password = "";
$database = "costume_closet";

//Create the database connection.
$conn = new mysqli($host, $username, $password, $database);

//Check if connection works
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
