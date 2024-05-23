<?php
include('databaseconnection.php');

// Check if session_id is set
if (isset($_REQUEST['session_id'])) {
  $session_id= $_REQUEST['session_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM session WHERE session_id=?");
  $stmt->bind_param("i", $session_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $therapist_id = $row['therapist_id'];
    $handler_id = $row['handler_id'];
    $dog_id = $row['dog_id'];
    $client_id = $row['client_id'];
    $start_time = $row['start_time'];
    $end_time = $row['end_time'];
    $platform = $row['platform'];
    $session_link = $row['session_link'];
  } else {
    echo "Session not found.";
  }
  $stmt->close(); // Close the statement after use
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Session</title>
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
<center>
    <h2><u>Update Form of Session</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="therapist_id">Therapist ID:</label>
        <input type="number" name="therapist_id" value="<?php echo isset($therapist_id) ? $therapist_id : ''; ?>">
        <br><br>

        <label for="handler_id">Handler ID:</label>
        <input type="number" name="handler_id" value="<?php echo isset($handler_id) ? $handler_id : ''; ?>">
        <br><br>

        <label for="dog_id">Dog ID:</label>
        <input type="number" name="dog_id" value="<?php echo isset($dog_id) ? $dog_id : ''; ?>">
        <br><br>

        <label for="client_id">Client ID:</label>
        <input type="number" name="client_id" value="<?php echo isset($client_id) ? $client_id : ''; ?>">
        <br><br>

        <label for="start_time">Start Time:</label>
        <input type="text" name="start_time" value="<?php echo isset($start_time) ? $start_time : ''; ?>">
        <br><br>

        <label for="end_time">End Time:</label>
        <input type="text" name="end_time" value="<?php echo isset($end_time) ? $end_time : ''; ?>">
        <br><br>

        <label for="platform">Platform:</label>
        <input type="text" name="platform" value="<?php echo isset($platform) ? $platform : ''; ?>">
        <br><br>

        <label for="session_link">Session Link:</label>
        <input type="text" name="session_link" value="<?php echo isset($session_link) ? $session_link : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>
</center>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $therapist_id = $_POST['therapist_id'];
  $handler_id = $_POST['handler_id'];
  $dog_id = $_POST['dog_id'];
  $client_id = $_POST['client_id'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];
  $platform = $_POST['platform'];
  $session_link = $_POST['session_link'];

  // Update the session in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE session SET therapist_id=?, handler_id=?, dog_id=?, client_id=?, start_time=?, end_time=?, platform=?, session_link=? WHERE session_id=?");
  $stmt->bind_param("iiiiisssi", $therapist_id, $handler_id, $dog_id, $client_id, $start_time, $end_time, $platform, $session_link, $session_id);
  $stmt->execute();

  // Redirect to session.php
  header('Location: session.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
