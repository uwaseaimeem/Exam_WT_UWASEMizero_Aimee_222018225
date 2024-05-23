  <?php
include('databaseconnection.php');


// Check if certification_id is set
if(isset($_REQUEST['certification_id'])) {
    $certification_id = $_REQUEST['certification_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM Dog_certification WHERE certification_id=?");
    $stmt->bind_param("i", $certification_id);
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
            <input type="hidden" name="certification_id" value="<?php echo $certification_id; ?>">
            <input type="submit" value="Delete">
        </form>
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt->execute()) {
       header('Location:Dog_certification.php');
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
    echo "certification_id is not set.";
}

$connection->close();
?>
 