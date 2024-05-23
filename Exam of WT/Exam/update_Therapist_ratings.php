<?php
include('databaseconnection.php');

// Check if rating_id is set
if(isset($_REQUEST['rating_id'])) {
    $rating_id = $_REQUEST['rating_id'];
    
    $stmt = $connection->prepare("SELECT * FROM Therapist_ratings WHERE rating_id=?");
    $stmt->bind_param("i", $rating_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['rating_id'];
        $y = $row['therapist_id'];
        $z = $row['rating'];
        $w = $row['feedback_text'];
        
        

    } else {
        echo "Therapist_ratings not found.";
    }
}

$stmt->close(); // Close the statement after use

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Therapist_ratings</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Therapist_ratings form -->
    <h2><u>Update Form of Therapist_ratings</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="therapist_id">Therapist_id:</label>
        <input type="number" name="therapist_id" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="rating">Rating:</label>
        <input type="text" name="rating" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="feedback_text">Feedback_text:</label>
        <input type="text" name="feedback_text" value="<?php echo isset($E) ? $E : ''; ?>">
        <br><br>

        

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $y = $row['therapist_id'];
        $z = $row['rating'];
        $w = $row['feedback_text'];
    
    
    // Update the Therapist_ratings in the database
    $stmt = $connection->prepare("UPDATE Therapist_ratings SET therapist_id=?, rating=?, feedback_text=? WHERE rating_id=?");
    $stmt->bind_param("ssss", $therapist_id, $rating, $feedback_text, $rating_id);
    $stmt->execute();
    
    // Redirect to Therapist_ratings.php
    header('Location: Therapist_ratings.php');
    exit(); // Ensure that no other content is sent after the header redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);

?>
