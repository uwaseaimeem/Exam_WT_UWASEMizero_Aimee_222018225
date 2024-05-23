<?php
include('databaseconnection.php');

// Check if handler_id is set
if (isset($_REQUEST['handler_id'])) {
    $handler_id = $_REQUEST['handler_id'];
    $stmt = $connection->prepare("SELECT * FROM Handler WHERE handler_id=?");
    $stmt->bind_param("i", $handler_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['handler_id'];
        $y = $row['name'];
        $z = $row['email'];
        $w = $row['phone_number'];
    } else {
        echo "Handler not found.";
    }
    $stmt->close(); // Close the statement after use
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Handler</title>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update handler form -->
        <h2><u>Update Form of Handler</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo isset($y) ? $y : ''; ?>">
            <br><br>

            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo isset($z) ? $z : ''; ?>">
            <br><br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" value="<?php echo isset($w) ? $w : ''; ?>">
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
    $phone_number = $_POST['phone_number'];

    // Update the Handler in the database
    $stmt = $connection->prepare("UPDATE Handler SET name=?, email=?, phone_number=? WHERE handler_id=?");
    $stmt->bind_param("sssi", $name, $email, $phone_number, $handler_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to Handler.php
    header('Location: Handler.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
// Close the connection (important to close after use)
mysqli_close($connection);
?>
