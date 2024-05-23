<?php
include('databaseconnection.php');

// Check if activity_id is set
if (isset($_REQUEST['activity_id'])) {
  $activity_id = $_REQUEST['activity_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM Activities WHERE activity_id=?");
  $stmt->bind_param("i", $activity_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['activity_id'];
    $y = $row['name'];
    $z = $row['description'];
    
  } else {
    echo "Activities not found.";
  }
}

$stmt->close(); // Close the statement after use

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Activities</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update Activities form -->
    <h2><u>Update Form of Activities</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="description">Description:</label>
    <input type="text" name="description" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $name = $_POST['name'];
  $description= $_POST['description'];
  

  // Update the Activities in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE Activities SET name=?, description=? WHERE activity_id=?");
  $stmt->bind_param("sss", $name, $description,$activity_id);
  $stmt->execute();

  // Redirect to Activities.php
  header('Location:Activities.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>