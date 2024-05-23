<?php
include('databaseconnection.php');


// Check if rating_id is set
if(isset($_REQUEST['rating_id'])) {
    $rating_id = $_REQUEST['rating_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Therapist_ratings WHERE rating_id=?");
    $stmt->bind_param("i", $rating_id);
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
            <input type="hidden" name="rating_id" value="<?php echo $rating_id; ?>">
            <input type="submit" value="Delete">
        </form>
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
       header('Location:Therapist_ratings.php');
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
    echo "rating_id is not set.";
}

$connection->close();
?>
