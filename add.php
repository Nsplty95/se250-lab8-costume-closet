
<?php
$conn = mysqli_connect("localhost", "root", "", "costume_closet");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST["item"];
    $borrower = $_POST["borrower"];
    $due_date = $_POST["due_date"];

    $sql = "INSERT INTO loans (item, borrower, due_date)
            VALUES ('$item', '$borrower', '$due_date')";

    mysqli_query($conn, $sql);

    header("Location: list.php");
    exit;
}
?>

<form method="post">
    Item: <input type="text" name="item" required><br><br>
    Borrower: <input type="text" name="borrower" required><br><br>
    Due Date: <input type="date" name="due_date"><br><br>
    <input type="submit" value="Add Loan">
</form>