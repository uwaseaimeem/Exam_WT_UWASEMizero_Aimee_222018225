<?php
include('databaseconnection.php');

// Check if activity_id is set
if(isset($_REQUEST['activity_id'])) {
    $activity_id = $_REQUEST['activity_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Activities WHERE activity_id=?");
    $stmt->bind_param("i", $activity_id);

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
            <input type="hidden" name="activity_id" value="<?php echo $activity_id; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
        // Redirect to Site.php after successful deletion
        header('Location: Activities.php');
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
    echo "activity_id is not set.";
}

$connection->close();
?>

