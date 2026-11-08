
<?php
$conn = mysqli_connect("localhost", "root", "", "costume_closet"); //Connects to database

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); //Checks if database if connected.
}

$sql = "SELECT id, item, borrower, due_date, returned FROM loans"; //Gather info. from database.


$result = mysqli_query($conn, $sql); //run query

if (!$result) {
    die("Query failed: " . mysqli_error($conn)); //checks id query works
}
?>

<?php
if (mysqli_num_rows($result) > 0){ //table has to have 1 or more loans to display
?>
<table border="1"> <!--HTML Setup of the table!-->
    <tr>
        <th>Item</th>
        <th>Borrower</th>
        <th>Due Date</th>
        <th>Returned</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?> <!--Goes through the table!-->
        <tr>
            <td><?php echo $row["item"]; ?></td>
            <td><?php echo $row["borrower"]; ?></td>
            <td><?php echo $row["due_date"]; ?></td>
            <td>
                <?php
                if ($row["returned"]) {
                    echo "Yes";
                } else {
                    echo "No";
                }
                ?>
            </td>
            <td>
                <a href="mark_returned.php?id=<?php echo $row["id"]; ?>">
                    Mark Returned
                </a>
                |
                <a href="delete.php?id=<?php echo $row["id"]; ?>"onclick="return confirm('Are you sure you want to delete this loan?')"> <!--Confirmation screen !-->
                    Delete
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

<form action="add.php"> <!--Made this so you can click to access the add.php without having to write it on the search!-->
<button type="submit">Add New Loan</button>
</form>


<?php //Displays this message if no loans are present
} else {
    echo "No loans yet. The closet is empty!";
}
?>
<?php mysqli_close($conn); ?>

