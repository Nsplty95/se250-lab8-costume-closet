
<?php
$conn = mysqli_connect("localhost", "root", "", "costume_closet"); //Connects to the database

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // Checks if connected
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { //Checks the form
//Gather variables
    $item = $_POST["item"];
    $borrower = $_POST["borrower"];
    $due_date = $_POST["due_date"];

//Use the loan and puts it into the database while avoiding sql injections
    $sql = "INSERT INTO loans (item, borrower, due_date)
            VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sss", $item, $borrower, $due_date);

    mysqli_stmt_execute($stmt);

    header("Location: list.php");
    exit;
}
?>


//Form used to display
<form method="post">
    Item: <input type="text" name="item" required><br><br>
    Borrower: <input type="text" name="borrower" required><br><br>
    Due Date: <input type="date" name="due_date"><br><br>
    <input type="submit" value="Add Loan">
</form>