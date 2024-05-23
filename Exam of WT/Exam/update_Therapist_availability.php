<?php
include('databaseconnection.php');

// Check if availability_id is set
if (isset($_REQUEST['availability_id'])) {
    $availability_id = $_REQUEST['availability_id'];

    $stmt = $connection->prepare("SELECT * FROM Therapist_availability WHERE availability_id=?");
    $stmt->bind_param("i", $availability_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['availability_id'];
        $y = $row['therapist_id'];
        $z = $row['day_of_week'];
        $w = $row['start_time'];
        $E = $row['end_time'];
    } else {
        echo "Therapist_availability not found.";
    }

    $stmt->close(); // Close the statement after use
}

// Check if the form is submitted for update
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $therapist_id = $_POST['therapist_id'];
    $day_of_week = $_POST['day_of_week'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    // Update the Therapist_availability in the database
    $stmt = $connection->prepare("UPDATE Therapist_availability SET therapist_id=?, day_of_week=?, start_time=?, end_time=? WHERE availability_id=?");
    $stmt->bind_param("issssi", $therapist_id, $day_of_week, $start_time, $end_time, $availability_id);
    
    if ($stmt->execute()) {
        // Redirect to Therapist_availability page after successful update
        header('Location: Therapist_availability.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the connection (important to close after use)
$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Therapist_availability</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
<center>
    <!-- Update Therapist_availability form -->
    <h2><u>Update Form of Therapist_availability</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="therapist_id">Therapist_id:</label>
        <input type="number" name="therapist_id" value="<?php echo isset($y) ? $y : ''; ?>" required>
        <br><br>

        <label for="day_of_week">Day_of_week:</label>
        <input type="text" name="day_of_week" value="<?php echo isset($z) ? $z : ''; ?>" required>
        <br><br>

        <label for="start_time">Start_time:</label>
        <input type="text" name="start_time" value="<?php echo isset($w) ? $w : ''; ?>" required>
        <br><br>

        <label for="end_time">End_time:</label>
        <input type="text" name="end_time" value="<?php echo isset($E) ? $E : ''; ?>" required>
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>
</center>
</body>
</html>
