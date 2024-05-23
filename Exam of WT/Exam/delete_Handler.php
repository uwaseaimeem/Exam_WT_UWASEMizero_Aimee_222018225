<?php
// Connection details
include('databaseconnection.php');

// Check if handler_id is set
if(isset($_REQUEST['handler_id'])) {
    $handler_id = $_REQUEST['handler_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Handler WHERE handler_id=?");
    $stmt->bind_param("i", $handler_id);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="handler_id" value="<?php echo $handler_id; ?>">
            <input type="submit" value="Delete">
        </form>
        <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        // Redirect to Handler.php after successful deletion
        header('Location: Handler.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
}
    ?>

</body>
</html>
<?php

 $stmt->close();
} else {
    echo "handler_id is not set.";
}

$connection->close();
?>
