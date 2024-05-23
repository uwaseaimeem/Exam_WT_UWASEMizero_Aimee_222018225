<?php
include('databaseconnection.php');

// Check if therapist_id is set
if (isset($_REQUEST['therapist_id'])) {
  $therapist_id= $_REQUEST['therapist_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM Therapist WHERE therapist_id=?");
  $stmt->bind_param("i", $therapist_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['therapist_id'];
    $y = $row['name'];
    $z = $row['email'];
    $w = $row['specialization'];
    
  } else {
    echo "Therapist not found.";
  }
}

$stmt->close(); // Close the statement after use

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Therapist</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update products form -->
    <h2><u>Update Form of Therapist</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="email">email:</label>
    <input type="text" name="email" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="specialization">specialization:</label>
    <input type="text" name="specialization" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>


    <input type="submit" name="up" value="Update">

  </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form

  $name = $_POST['name'];
  $email = $_POST['email'];
  $specialization = $_POST['specialization'];
  





  // Update the product in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE Therapist SET name=?, email=?, specialization=? WHERE therapist_id=?");
  $stmt->bind_param("ssss", $name, $email, $specialization,$therapist_id);
  $stmt->execute();

  // Redirect to product.php
  header('Location:Therapist.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
mysqli_close($connection);
?>