<?php
include('databaseconnection.php');

// Check if certification_id is set
if(isset($_REQUEST['certification_id'])) {
    $certification_id = $_REQUEST['certification_id'];
    
    $stmt = $connection->prepare("SELECT * FROM Dog_certification WHERE certification_id=?");
    $stmt->bind_param("i", $certification_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['certification_id'];
        $y = $row['dog_id'];
        $z = $row['certification_name'];
        $w = $row['certification_date'];
    } else {
        echo "Dog_certification not found.";
    }
    $stmt->close(); // Close the statement after use
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Dog_certification</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of Dog_certification</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="dog_id">Dog_id:</label>
        <input type="number" name="dog_id" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="certification_name">Certification_name:</label>
        <input type="text" name="certification_name" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="certification_date">Certification_date:</label>
        <input type="date" name="certification_date" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $dog_id = $_POST['dog_id'];
    $certification_name = $_POST['certification_name'];
    $certification_date = $_POST['certification_date'];
   
    // Update the Dog_certification in the database
    $stmt = $connection->prepare("UPDATE Dog_certification SET dog_id=?, certification_name=?, certification_date=? WHERE certification_id=?");
    $stmt->bind_param("isss", $dog_id, $certification_name, $certification_date, $certification_id);
    $stmt->execute();
    
    // Redirect to Dog_certification.php
    header('Location: Dog_certification.php');
    exit(); // Ensure that no other content is sent after the header redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);

?>
