<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Handler</title>
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
    <li style="display: inline; margin-right: 10px;"><a href="./therapist.php">Therapist</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./handler.php">Handler</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./activities.php">Activities</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./session.php">Session</a>
  </li>

    <li style="display: inline; margin-right: 10px;"><a href="./client.php">Client</a>
  </li>
   <li style="display: inline; margin-right: 10px;"><a href="./therapist_availabilityr.php">therapist_availability</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./dog_certification.php">dog_certification</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./session_feedback.php">session_feedback</a>
  </li>

    <li style="display: inline; margin-right: 10px;"><a href="./therapist_ratings.php">therapist_ratings</a>
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

    <h1><u> Handler </u></h1>
    <form method="post" onsubmit="return confirmInsert();">
            
        <label for="handler_id">Handler_id:</label>
        <input type="number" id="handler_id" name="handler_id"><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

       <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br> 

        <label for="phone_number">Phone_number:</label>
        <input type="text" id="phone_number" name="phone_number" required><br><br>
          
      
      <input type="submit" name="add" value="Insert">
      

    </form>


<?php
// Connection details
include('databaseconnection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Handler(handler_id,name,email,phone_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $handler_id, $name, $email, $phone_number);
    // Set parameters and execute
    $handler_id = $_POST['handler_id'];
    $name = $_POST['name'];
    $email= $_POST['email'];
    $phone_number = $_POST['phone_number'];
   
    

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
// Connection details
include('databaseconnection.php');

// SQL query to fetch data from the Handler table
$sql = "SELECT * FROM Handler";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> same Details of Handler </title>
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
    <center><h2>Table of Handler </h2></center>
    <table border="4">
        <tr>
            <th>handler_id</th>
            <th>name</th>
            <th>email</th>
            <th>phone_number</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php
        include('databaseconnection.php');
        
        // Prepare SQL query to retrieve all Handler
        $sql = "SELECT * FROM Handler";
        $result = $connection->query($sql);

        // Check if there are any Handler
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $handler_id = $row['handler_id']; // Fetch the handler_id
                echo "<tr>
                    <td>" .$row['handler_id'] . "</td>
                    <td>" .$row['name'] . "</td>
                    <td>" .$row['email'] . "</td>
                    <td>" .$row['phone_number'] . "</td>
                    
                    


                    <td><a style='padding:4px' href='delete_Handler.php?handler_id=$handler_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_Handler.php?handler_id=$handler_id'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
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