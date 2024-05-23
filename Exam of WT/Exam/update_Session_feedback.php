<?php
include('databaseconnection.php');

// Check if feedback_id is set
if(isset($_REQUEST['feedback_id'])) {
    $feedback_id = $_REQUEST['feedback_id'];
    
    $stmt = $connection->prepare("SELECT * FROM Session_feedback WHERE feedback_id=?");
    $stmt->bind_param("i", $feedback_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['feedback_id'];
        $y = $row['session_id'];
        $z = $row['client_id'];
        $w = $row['rating'];
        $E = $row['feedback_text'];
        

    } else {
        echo "Session_feedback not found.";
    }
}

$stmt->close(); // Close the statement after use

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Session_feedback</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Session_feedback form -->
    <h2><u>Update Form of Session_feedback</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="session_id">Session_id:</label>
        <input type="number" name="session_id" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="client_id">Client_id:</label>
        <input type="number" name="client_id" value="<?php echo isset($z) ? $z : ''; ?>">
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
    $session_id = $_POST['session_id'];
    $client_id = $_POST['client_id'];
    $rating= $_POST['rating'];
    $feedback_text = $_POST['feedback_text'];
    
    
    // Update the Session_feedback in the database
    $stmt = $connection->prepare("UPDATE Session_feedback SET session_id=?, client_id=?, rating=?, feedback_text=? WHERE feedback_id=?");
    $stmt->bind_param("sssss", $session_id, $client_id, $rating, $feedback_text,$feedback_id);
    $stmt->execute();
    
    // Redirect to Session_feedback.php
    header('Location: Session_feedback.php');
    exit(); // Ensure that no other content is sent after the header redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);

?>
