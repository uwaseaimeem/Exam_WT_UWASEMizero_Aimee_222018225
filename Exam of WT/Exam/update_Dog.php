<?php
include('databaseconnection.php');

// Check if dog_id is set
if(isset($_REQUEST['dog_id'])) {
    $dog_id = $_REQUEST['dog_id'];
    
    $stmt = $connection->prepare("SELECT * FROM Dog WHERE dog_id=?");
    $stmt->bind_param("i", $dog_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['dog_id'];
        $y = $row['name'];
        $z = $row['breed'];
        $w = $row['age'];
        $E = $row['gender'];
        

    } else {
        echo "Dog not found.";
    }
}

$stmt->close(); // Close the statement after use

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Dog</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of Dog</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="breed">Breed:</label>
        <input type="text" name="breed" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="age">Age:</label>
        <input type="text" name="age" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="gender">gender:</label>
        <input type="text" name="gender" value="<?php echo isset($E) ? $E : ''; ?>">
        <br><br>

        

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age= $_POST['age'];
    $gender = $_POST['gender'];
    
    
    // Update the Dog in the database
    $stmt = $connection->prepare("UPDATE Dog SET name=?, breed=?, age=?, gender=? WHERE dog_id=?");
    $stmt->bind_param("sssssii", $name, $breed, $age, $gender,$dog_id);
    $stmt->execute();
    
    // Redirect to Artifact.php
    header('Location: Dog.php');
    exit(); // Ensure that no other content is sent after the header redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);

?>
