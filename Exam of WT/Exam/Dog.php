<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dog entity</title>
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

<body bgcolor="white">
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
        <a href="login.html">Login</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
    
    
  </ul>

</header>
<section>

    <h1><u> Dog </u></h1>
    <form method="post" onsubmit="return confirmInsert();">
            
        <label for="dog_id">Dog_id:</label>
        <input type="number" id="dog_id" name="dog_id"><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

       <label for="breed">Breed:</label>
        <input type="text" id="breed" name="breed" required><br><br> 

        <label for="age"> age:</label>
        <input type="number" id="age" name="age" required><br><br>
          
        <label for="gender">gender:</label>
        <input type="text" name="gender" required><br><br>

        <input type="submit" name="add" value="Insert">
      

    </form>


<?php
include('databaseconnection.php');


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO Dog(dog_id,name,breed,age,gender) VALUES (?,?,?,?,?)");
   $stmt->bind_param("sssss",$dog_id,$name,$breed,$age,$gender);
   // Set parameters and execute
    
    $dog_id = $_POST['dog_id'];
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $gender=$_POST['gender'];
    
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

// SQL query to fetch data from the Artifact  table
$sql = "SELECT * FROM Dog";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>information About Dog </title>
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
    <center><h2>Table of Dog </h2></center>
    <table border="5">
        <tr>
            <th>dog_id</th>
            <th>name</th>
            <th>breed</th>
            <th>age</th>
            <th>gender</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        include('databaseconnection.php');

        // Prepare SQL query to retrieve all Dog
        $sql = "SELECT * FROM Dog";
        $result = $connection->query($sql);

        // Check if there are any Dog
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $dog_id = $row['dog_id']; // Fetch the dog_id
                echo "<tr>
                    <td>" .$row['dog_id'] . "</td>
                    <td>" .$row['name'] . "</td>
                    <td>" .$row['breed'] . "</td>
                    <td>" .$row['age'] . "</td>
                    <td>" .$row['gender'] ."</td>
                   


                    <td><a style='padding:4px' href='delete_Dog.php?dog_id=$dog_id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_Dog.php?dog_id=$dog_id'>Update</a></td> 
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