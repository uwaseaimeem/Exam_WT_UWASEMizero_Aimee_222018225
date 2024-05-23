<?php
// Connection details
include('databaseconnection.php');

// Check if availability_id is set
if(isset($_REQUEST['availability_id'])) {
    $availability_id = $_REQUEST['availability_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Therapist_availability WHERE availability_id=?");
    $stmt->bind_param("i", $availability_id);
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
            <input type="hidden" name="availability_id" value="<?php echo $availability_id; ?>">
            <input type="submit" value="Delete">
        </form>
        <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        // Redirect to Therapist_availability.php after successful deletion
        header('Location: Therapist_availability.php');
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
    echo "availability_id is not set.";
}

$connection->close();
?>
