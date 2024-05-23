<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Activities</title>
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
      color: brown;
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
      margin-left: 15px;
      margin-top: 4px;
    }
    
    input.form-control {
      margin-left: 1200px;
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
    <h1><u> Activities </u></h1>
    <form method="post" onsubmit="return confirmInsert();">
      <label for="activity_id">Activity_id:</label>
      <input type="number" id="activity_id" name="activity_id"><br><br>

      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required><br><br>

      <label for="description">Description :</label>
      <input type="text" id="description" name="description" required><br><br>

      <input type="submit" name="add" value="Insert">
    </form>

    <?php
    include('databaseconnection.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind the parameters
        $stmt = $connection->prepare("INSERT INTO Activities (activity_id, name, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $activity_id, $name, $description);
        
        // Set parameters and execute
        $activity_id = $_POST['activity_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        
        if ($stmt->execute() === TRUE) {
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
    // SQL query to fetch data from the Activities table
    $sql = "SELECT * FROM Activities";
    $result = $connection->query($sql);
    ?>

    <center><h2>Table of Activities</h2></center>
    <table border="3">
      <tr>
        <th>activity_id</th>
        <th>name</th>
        <th>description</th>
        <th>Delete</th>
        <th>Update</th>
      </tr>

      <?php
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $activity_id = $row['activity_id'];
              echo "<tr>
                      <td>" . $row['activity_id'] . "</td>
                      <td>" . $row['name'] . "</td>
                      <td>" . $row['description'] . "</td>
                      <td><a style='padding:4px' href='delete_Activities.php?activity_id=$activity_id'>Delete</a></td>
                      <td><a style='padding:4px' href='update_Activities.php?activity_id=$activity_id'>Update</a></td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='5'>No data found</td></tr>";
      }
      $connection->close();
      ?>
    </table>
  </section>

  <footer>
    <center>
      <b><h2>UR CBE BIT &copy; 2024 &reg; Designed by: @UWASE Mizero Aimee</h2></b>
    </center>
  </footer>
</body>
</html>
