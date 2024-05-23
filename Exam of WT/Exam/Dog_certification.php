<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>
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
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1200px; /* Adjust this value as needed */

      padding: 8px;
     
    }
     section{
    padding:28px;
    }
    section{
      padding:180px;
    }
    header{
  background-color: #F4A460;
  padding: 20px;
}
footer{
  background-color: #F4A460;
  padding: 20px;
}

    /* Dropdown container */
    .dropdown {
      float: right; /* Align to the right */
      margin-right: 100px; /* Adjust margin as needed */
      position: relative;
    }

    /* Dropdown content */
    .dropdown-contents {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    /* Show dropdown content on hover */
    .dropdown:hover .dropdown-contents {
      display: block;
    }
  </style>
  </head>

  <header>

<body style="background-image: url('./M.jpg');">
  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./B.jpg" width="90" height="60" alt="Logo">
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./home.html">HOME</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./Dog.php">Dog</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./therapist.php">Therapist</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./handler.php">Handler</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./activities.php">Activitiesr</a>
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
      <a href="#" style="padding: 10px; color: brown; background-color:sandybrown; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Login</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
    
    
  </ul>
  </header>
  <section>
    <h1>Dog_Certification</h1>
    <form method="post" onsubmit="return confirmInsert();">
      <label for="certification_id">Certification_Id:</label>
      <input type="number" id="certification_id" name="certification ID"><br><br>

      <label for="dog_id">Dog ID:</label>
      <input type="text" id="dog_id" name="dog_id" required><br><br>

      <label for="certification_name">Certification Name:</label>
      <input type="text" id="certification_name" name="certification_name" required><br><br>

      <label for="certification_date">Certification Date:</label>
      <input type="date" id="certification_date" name="certification_date" required><br><br>

      <input type="submit" name="add" value="Insert">
    </form>

    <?php
    include('databaseconnection.php');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind the parameters
        $stmt = $connection->prepare("INSERT INTO Dog_certification (certification_id, dog_id, certification_name, certification_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $certification_id, $dog_id, $certification_name, $certification_date);
        
        // Set parameters and execute
        $certification_id = isset($_POST['certification_id']) ? $_POST['certification_id'] : '';
        $dog_id = isset($_POST['dog_id']) ? $_POST['dog_id'] : '';
        $certification_name = isset($_POST['certification_name']) ? $_POST['certification_name'] : '';
        $certification_date = isset($_POST['certification_date']) ? $_POST['certification_date'] : '';

        if ($stmt->execute()) {
            echo "New record has been added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $connection->close();
    ?>
    
    <h2>Table of Dog_certification</h2>
    <table border="1">
        <tr>
            <th>certification_id</th>
            <th>dog_id</th>
            <th>certification_name</th>
            <th>certification_date</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php
        include('databaseconnection.php');

        // Fetch data from the Dog_certification table
        $sql = "SELECT * FROM Dog_certification";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $certification_id = $row['certification_id'];
                echo "<tr>
                    <td>{$row['certification_id']}</td>
                    <td>{$row['dog_id']}</td>
                    <td>{$row['certification_name']}</td>
                    <td>{$row['certification_date']}</td>
                    <td><a href='delete_Dog_certification.php?certification_id=$certification_id'>Delete</a></td> 
                    <td><a href='update_Dog_certification.php?certification_id=$certification_id'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        $connection->close();
        ?>
    </table>
  </section>
  <footer>
    <b>UR CBE BIT &copy; 2024 &reg; Designed by: UWASE Mizero Aimee</b>
  </footer>
</body>
</html>
