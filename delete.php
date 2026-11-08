
<?php
$conn = mysqli_connect("localhost", "root", "", "costume_closet");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];

$sql = "DELETE FROM loans WHERE id = $id";

mysqli_query($conn, $sql);

header("Location: list.php");
exit;

?>
