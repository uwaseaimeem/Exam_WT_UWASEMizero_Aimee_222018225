<?php
include('databaseconnection.php');


// Check if dog_id is set
if(isset($_REQUEST['dog_id'])) {
    $dog_id = $_REQUEST['dog_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Dog WHERE dog_id=?");
    $stmt->bind_param("i", $dog_id);
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
            <input type="hidden" name="dog_id" value="<?php echo $dog_id; ?>">
            <input type="submit" value="Delete">
        </form>
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
       header('Location:Dog.php');
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
    echo "dog_id is not set.";
}

$connection->close();
?>
