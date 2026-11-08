<?php

$conn = mysqli_connect("localhost", "root", "", "costume_closet");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = (int) $_GET["id"];

$sql = "UPDATE loans SET returned = 1 WHERE id = $id";

mysqli_query($conn, $sql);

header("Location: list.php");
exit;

?>
