
<?php
$conn = mysqli_connect("localhost", "root", "", "costume_closet"); //Connects to DB

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); //
}

$id = $_GET["id"]; //Gather ID

$sql = "DELETE FROM loans WHERE id = $id"; //Delete ID from DB

mysqli_query($conn, $sql); //Query

header("Location: list.php"); //Go back to list
exit;

?>
