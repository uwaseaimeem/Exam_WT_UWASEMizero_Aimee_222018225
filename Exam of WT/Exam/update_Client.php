<?php
include('databaseconnection.php');

// Check if client_id is set
if (isset($_REQUEST['client_id'])) {
  $client_id = $_REQUEST['client_id'];

  // Prepare statement with parameterized query to prevent SQL injection
  $stmt = $connection->prepare("SELECT * FROM Client WHERE client_id=?");
  $stmt->bind_param("i", $client_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $client_id = $row['client_id'];
    $name = $row['name'];
    $email = $row['email'];
    $age = $row['age'];
    $occupation = $row['occupation'];
  } else {
    echo "Client not found.";
  }
  $stmt->close(); // Close the statement after use
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Client</title>
    <!-- JavaScript validation and content load for update or modify data -->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
<center>
    <!-- Update Client form -->
    <h2><u>Update Form of Client</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>">
        <br><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
        <br><br>

        <label for="age">Age:</label>
        <input type="text" name="age" value="<?php echo isset($age) ? $age : ''; ?>">
        <br><br>

        <label for="occupation">Occupation:</label>
        <input type="text" name="occupation" value="<?php echo isset($occupation) ? $occupation : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>
</center>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $name = $_POST['name'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $occupation = $_POST['occupation'];

  // Update the client in the database using a prepared statement
  $stmt = $connection->prepare("UPDATE Client SET name=?, email=?, age=?, occupation=? WHERE client_id=?");
  $stmt->bind_param("ssssi", $name, $email, $age, $occupation, $client_id);
  $stmt->execute();

  // Redirect to Client.php
  header('Location: Client.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>
