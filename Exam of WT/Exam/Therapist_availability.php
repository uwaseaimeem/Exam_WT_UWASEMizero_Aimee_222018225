<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Therapist_availability</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: chocolate;
      background-color: white;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: orange;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: sandybrown;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Adjust margin and padding for search input */
    input.form-control {
      margin-left: 15px; /* Adjust this value as needed */
      padding: 8px;
    }
    section {
      padding: 71px;
      border-bottom: 1px solid #ddd;
    }
    footer {
      text-align: center;
      padding: 15px;
      background-color: goldenrod;
    }
  </style>
  <!-- JavaScript validation and content load for insert data-->
  <script>
    function confirmInsert() {
      return confirm('Are you sure you want to insert this record?');
    }
  </script>
</head>
<body bgcolor="sandybrown">
<header>
  <form class="d-flex" role="search" action="search.php">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
      <img src="./Images/arsnl.jpg" width="90" height="60" alt="Logo">
    </li>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html">HOME</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./Dog.php">Dog</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./therapist.php">Therapist</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./handler.php">Handler</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./activities.php">Activities</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./session.php">Session</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./client.php">Client</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./therapist_availability.php">Therapist_availability</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./dog_certification.php">Dog_certification</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./session_feedback.php">Session_feedback</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./therapist_ratings.php">Therapist_ratings</a></li>
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: brown; background-color: sandybrown; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
</header>
<section>
  <h1><u>Therapist_availability</u></h1>
  <form method="post" onsubmit="return confirmInsert();">
    <label for="availability_id">Availability_id:</label>
    <input type="number" id="availability_id" name="availability_id"><br><br>

    <label for="therapist_id">Therapist_id:</label>
    <input type="number" id="therapist_id" name="therapist_id" required><br><br>

    <label for="day_of_week">Day_of_week:</label>
    <input type="text" id="day_of_week" name="day_of_week" required><br><br>

    <label for="start_time">Start_time:</label>
    <input type="text" id="start_time" name="start_time" required><br><br>

    <label for="end_time">End_time:</label>
    <input type="text" id="end_time" name="end_time" required><br><br>

    <input type="submit" name="add" value="Insert">
  </form>

  <?php
  include('databaseconnection.php');

  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Prepare and bind the parameters
      $stmt = $connection->prepare("INSERT INTO Therapist_availability (availability_id, therapist_id, day_of_week, start_time, end_time) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sssss", $availability_id, $therapist_id, $day_of_week, $start_time, $end_time);
      
      // Set parameters and execute
      $availability_id = $_POST['availability_id'];
      $therapist_id = $_POST['therapist_id'];
      $day_of_week = $_POST['day_of_week'];
      $start_time = $_POST['start_time'];
      $end_time = $_POST['end_time'];
      
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
  // SQL query to fetch data from the Therapist_availability
  $sql = "SELECT * FROM Therapist_availability";
  $result = $connection->query($sql);
  ?>

  <h2>Table of Therapist_availability</h2>
  <table border="5">
    <tr>
      <th>availability_id</th>
      <th>therapist_id</th>
      <th>day_of_week</th>
      <th>start_time</th>
      <th>end_time</th>
      <th>Delete</th>
      <th>Update</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            $availability_id = $row['availability_id'];
            echo "<tr>
              <td>" . $row['availability_id'] . "</td>
              <td>" . $row['therapist_id'] . "</td>
              <td>" . $row['day_of_week'] . "</td>
              <td>" . $row['start_time'] . "</td>
              <td>" . $row['end_time'] . "</td>
              <td><a style='padding:4px' href='delete_Therapist_availability.php?availability_id=$availability_id'>Delete</a></td>
              <td><a style='padding:4px' href='update_Therapist_availability.php?availability_id=$availability_id'>Update</a></td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No data found</td></tr>";
    }
    $connection->close();
    ?>
  </table>
</section>

<footer>
  <center>
    <b><h2>UR CBE BIT &copy; 2024 &reg; Designed by: @UWASE Mizero Aimee</h2></b>
  </center>
</
