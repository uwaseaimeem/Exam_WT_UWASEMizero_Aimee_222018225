<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Therapist_ratings</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color:chocolate;
      background-color: white;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color:orange;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color:white;
    }

    /* Active link */
    a:active {
      background-color:sandybrown;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1200px; /* Adjust this value as needed */

      padding: 8px;
     
    }
    section{
    padding:71px;
    border-bottom: 1px solid #ddd;
    }
    footer{
    text-align: center;
    padding: 15px;
    background-color:goldenrod;
    }

  </style>
    <!-- JavaScript validation and content load for insert data-->
        <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>

  </head>

  <header>

<body bgcolor="sandybrown">
  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./Images/arsnl.jpg" width="90" height="60" alt="Logo">
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html">HOME</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./Dog.php">Dog</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./therapist.php">therapist</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./handler.php">Handler</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./activities.php">Activities</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./session.php">Session</a>
  </li>

    <li style="display: inline; margin-right: 10px;"><a href="./client.php">Client</a>
  </li>
  <li style="display: inline; margin-right: 10px;"><a href="./therapist_availability.php">Therapist_availability</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./dog_certification.php">Dog_certification</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./session_feedback.php">Session_feedback</a>
  </li>

    <li style="display: inline; margin-right: 10px;"><a href="./therapist_ratings.php">Therapist_ratings</a>
  </li>



    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: brown; background-color: sandybrown; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
    
    
  </ul>

</header>
<section>

    <h1><u>Therapist_ratings</u></h1>
    <form method="post" onsubmit="return confirmInsert();">
            
        <label for="rating_id">Rating_id:</label>
        <input type="number" id="rating_id" name="rating_id"><br><br>

        <label for="therapist_id">Therapist_id:</label>
        <input type="number" id="therapist_id" name="therapist_id" required><br><br>

       <label for="rating">Rating :</label>
        <input type="text" id="rating  " name="rating " required><br><br>

        <label for="feedback_text">Feedback_text:</label>
        <input type="text" id="feedback_text" name="feedback_text" required><br><br>
        
      <input type="submit" name="add" value="Insert">
      

    </form>


<?php
include('databaseconnection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Therapist_ratings(rating_id,therapist_id,rating,feedback_text) VALUES (?, ?, ?,?)");
    $stmt->bind_param("ssss",$rating_id, $therapist_id,$rating,$feedback_text);
    // Set parameters and execute
    $rating_id = $_POST['rating_id'];
    $therapist_id = $_POST['therapist_id'];
    $rating= $_POST['rating'];
    $feedback_text = $_POST['feedback_text'];
    
    
    
    

    if ($stmt->execute() == TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$connection->close();
?>

<?php
include('databaseconnection.php');
// SQL query to fetch data from the Therapist_ratings
$sql = "SELECT * FROM Therapist_ratings";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> same Details of Therapist_ratings </title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of Therapist_ratings</h2></center>
    <table border="4">
        <tr>
            <th>rating_id</th>
            <th>therapist_id</th>
            <th>rating</th>
            <th>feedback_text</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php
        // Define connection parameters
        include('databaseconnection.php');

        // Prepare SQL query to retrieve all Therapist_ratings
        $sql = "SELECT * FROM Therapist_ratings";
        $result = $connection->query($sql);

        // Check if there are any Therapist_ratings
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $rating_id = $row['rating_id']; // Fetch the rating_id
                echo "<tr>
                    <td>" .$row['rating_id'] . "</td>
                    <td>" .$row['therapist_id'] . "</td>
                    <td>" .$row['rating'] . "</td>
                    <td>" .$row['feedback_text'] . "</td>
                    
                    
                    
        
                
                    


                    <td><a style='padding:4px' href='delete_Therapist_ratings.php?rating_id=$rating_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_Therapist_ratings.php?rating_id=$rating_id'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
</body>

    </section>


  
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024 &reg, Designed by:@UWASE Mizero Aimee</h2></b>
  </center>
</footer>
</body>
</html>