<?php

$conn = mysqli_connect("localhost", "root", "", "costume_closet"); //Connects to database

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); //Checks if connected
}

$id = (int) $_GET["id"]; //Get the loan ID

$sql = "UPDATE loans SET returned = 1 WHERE id = $id"; //Update ID if returned 

mysqli_query($conn, $sql); //Run query

header("Location: list.php"); //Go to list
exit;

?>
