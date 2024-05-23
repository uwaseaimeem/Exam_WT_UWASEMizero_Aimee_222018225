<?php
include('databaseconnection.php');
// Check if the 'query' GET parameter is set
if (isset($_GET['query'])) {
     
    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Perform the search query for Site
    $sql = "SELECT * FROM Dog WHERE name LIKE '%$searchTerm%'";
    $result_Dog = $connection->query($sql);

    // Perform the search query for Therapist
    $sql = "SELECT * FROM Therapist WHERE name LIKE '%$searchTerm%'";
    $result_Therapist = $connection->query($sql);

    // Perform the search query for Handler
    $sql = "SELECT * FROM Handler WHERE name LIKE '%$searchTerm%'";
    $result_Handler = $connection->query($sql);

    // Perform the search query for Activities
    $sql = "SELECT * FROM Activities WHERE name LIKE '%$searchTerm%'";
    $result_Activities = $connection->query($sql);

    // Perform the search query for session
    $sql = "SELECT * FROM session WHERE session_link LIKE '%$searchTerm%'";
    $result_session = $connection->query($sql);

    // Perform the search query for Client
    $sql = "SELECT * FROM Client WHERE name LIKE '%$searchTerm%'";
    $result_Client = $connection->query($sql);

    // Perform the search query for Therapist_availability
    $sql = "SELECT * FROM Therapist_availability WHERE day_of_week LIKE '%$searchTerm%'";
    $result_Therapist_availability = $connection->query($sql);

    // Perform the search query for Dog_Certification
    $sql = "SELECT * FROM Dog_Certification WHERE certification_name LIKE '%$searchTerm%'";
    $result_Dog_Certification = $connection->query($sql);

    // Perform the search query for Session_feedback
    $sql = "SELECT * FROM Session_feedback WHERE rating LIKE '%$searchTerm%'";
    $result_Session_feedback = $connection->query($sql);

    // Perform the search query for Therapist_ratings
    $sql = "SELECT * FROM Therapist_ratings WHERE feedback_text LIKE '%$searchTerm%'";
    $result_Therapist_ratings = $connection->query($sql);


    // Output search results
    echo "<h2><u>Search Results:</u></h2>";
    echo "<h3>Dog:</h3>";
    if ($result_Dog->num_rows > 0) {
        while ($row = $result_Dog->fetch_assoc()) {
            echo "<p>" . $row['name'] . "</p>";
        }
    } else {
        echo "<p>No Dog found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>Therapist:</h3>";
    if ($result_Therapist->num_rows > 0) {
        while ($row = $result_Therapist->fetch_assoc()) {
            echo "<p>" . $row['name'] . "</p>";
        }
    } else {
        echo "<p>No Therapist found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>Handler:</h3>";
    if ($result_Handler->num_rows > 0) {
        while ($row = $result_Handler->fetch_assoc()) {
            echo "<p>" . $row['name'] . "</p>";
        }
    } else {
        echo "<p>No Handler found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>Activities:</h3>";
    if ($result_Activities->num_rows > 0) {
        while ($row = $result_Activities->fetch_assoc()) {
            echo "<p>" . $row['name'] . "</p>";
        }
    } else {
        echo "<p>No Activities found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>session:</h3>";
    if ($result_session->num_rows > 0) {
        while ($row = $result_session->fetch_assoc()) {
            echo "<p>" . $row['session_link'] . "</p>";
        }
    } else {
        echo "<p>No session found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>Client:</h3>";
    if ($result_Client->num_rows > 0) {
        while ($row = $result_Client->fetch_assoc()) {
            echo "<p>" . $row['name'] . "</p>";
        }
    } else {
        echo "<p>No Client found matching the search term: " . $searchTerm . "</p>";
    }


    echo "<h3>Therapist_availability:</h3>";
    if ($result_Therapist_availability->num_rows > 0) {
        while ($row = $result_Therapist_availabilityt->fetch_assoc()) {
            echo "<p>" . $row['day_of_week'] . "</p>";
        }
    } else {
        echo "<p>No Therapist_availability found matching the search term: " . $searchTerm . "</p>";
    }

     echo "<h3>Dog_Certification:</h3>";
    if ($result_Dog_Certification->num_rows > 0) {
        while ($row = $result_Dog_Certification->fetch_assoc()) {
            echo "<p>" . $row['certification_name'] . "</p>";
        }
    } else {
        echo "<p>No Dog_Certification found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>Session_feedback:</h3>";
    if ($result_Session_feedback->num_rows > 0) {
        while ($row = $result_Session_feedback->fetch_assoc()) {
            echo "<p>" . $row['rating'] . "</p>";
        }
    } else {
        echo "<p>No Session_feedback found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>Therapist_ratings:</h3>";
    if ($result_Therapist_ratings->num_rows > 0) {
        while ($row = $result_Therapist_ratings->fetch_assoc()) {
            echo "<p>" . $row['feedback_text'] . "</p>";
        }
    } else {
        echo "<p>No Therapist_ratings found matching the search term: " . $searchTerm . "</p>";
    }

    $connection->close();
} else {
    echo "No search term was provided.";
}
?>