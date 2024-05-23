<?php
require_once "databaseconnection.php";

// Handling POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving form data
    $fullnames  = $_POST['fullnames'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number= $_POST['phone_number'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    
    // Preparing SQL query
    $sql = "INSERT INTO users (fullnames, username, email,phone_number, password,gender) 
    VALUES ('$fullnames','$username','$email','$phone_number','$password','$gender')";

    // Executing SQL query
    if ($connection->query($sql) === TRUE) {
        // Redirecting to login page on successful registration
        header("Location: login.html");
        exit();
    } else {
        // Displaying error message if query execution fails
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Closing database connection
$connection->close();
?>
