<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menu</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    /* Additional CSS specific to this page */
    /* Additional CSS specific to this page */
body {
  background-image: url('./Image/virtual.jpeg');
  background-size: cover;
  margin: 0;
  padding: 0;
}
header {
  background-color: dimgray;
  padding: 50px;
  display: flex; /* Use flexbox to align items */
  justify-content: space-between; /* Align items to the left and right */
  align-items: center; /* Center items vertically */
}
.navbar {
  list-style-type: none;
  padding: 0;
  margin: 0px;
  display: flex; /* Use flexbox to align items */
  align-items: center; /* Center items vertically */
}
.navbar li {
  display: inline;
  margin-right: 130px;
}
.navbar li a {
  color: white;
  padding: 10px;
  text-decoration: none;
  background-color: chocolate;
}
.navbar li a:hover {
  background-color: chocolate;
}
.search-form {
  display: flex; /* Use flexbox to align items */
  align-items: center; /* Center items vertically */
}
.search-input {
  padding: 8px;
  margin-right: 10px;
  border-radius: 5px;
  border: none;
}
.search-button {
  padding: 8px 16px;
  background-color: chocolate;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.search-button:hover {
  background-color: chocolate;
}
.section-heading {
  color: chocolate;
  text-align: center;
}
.sub-heading {
  color: black;
  text-align: center;
}
.objectives-list {
  color: black;
  margin-left: 50px;
}
footer {
  background-color: white;
  padding: 50px;
  text-align: center;
  color:black;
}

  </style>
</head>
<body style="background-image: url('./Image/virtuall.jpeg'); background-repeat: no-repeat; background-size:cover;">
  <header>
    <ul class="navbar">
      <li><img src="./Image/careerc.jpeg" width="90" height="60" alt="Logo"></li>
      <li><a href="./home.html">HOME</a></li>
      <li><a href="./about.html">ABOUT</a></li>
      <li><a href="./contact.html">CONTACT</a></li>
      <li class="dropdown">
        <a href="#" style="background-color: chocolate;">MENU</a>
      <div class="dropdown-contents">
      <a href="./Dog.php">Dog</a>
      <a href="./therapist.php">Therapist</a>
      <a href="./handler.php">Handler</a>
      <a href="./activities.php">Activities</a>
      <a href="./session.php">Session</a>
      <a href="./client.php">Client</a>
      <a href="./therapist_availability.php">Therapist_availability</a>
      <a href="./dog_certification.php">Dog_certification</a>
      <a href="./session_feedback.php">Session_feedback</a>
      <a href="./therapist_ratings.php">Therapist_ratings</a>
    </div>
  </li>
      
          <li><a href="logout.php">Logout</a></li>
        </div>
      </li>
    </ul>
    <form class="search-form" action="search.php" method="GET">
      <input class="search-input" type="text" name="query" placeholder="Search">
      <button class="search-button" type="submit">Search</button>
    </form>
  </header>





  