<?PHP
// Connection details
$host = "localhost";
$user = "root";
$pass = "";
$database ="virtual_therapy_dog_session_platform";

// Create connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>