
<?php
$conn = mysqli_connect("localhost", "root", "", "costume_closet");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, item, borrower, due_date, returned FROM loans";


$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<table border="1">
    <tr>
        <th>Item</th>
        <th>Borrower</th>
        <th>Due Date</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row["item"]; ?></td>
            <td><?php echo $row["borrower"]; ?></td>
            <td><?php echo $row["due_date"]; ?></td>
            <td>
                <a href="delete.php?id=<?php echo $row["id"]; ?>">
                    Delete
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php mysqli_close($conn); ?>

