<!--    
  Milestone-1 
  ver. 1 
  Joshua W., Noah R., Brydon J.

  registerHandler.php: 
      This php script accepts the user input from register.html
      this data is then used to store that data to the users table in our sql database.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registerHandler php</title>
    <link rel="stylesheet" href="/src/css/style.css">
</head>
<body>
      <header>
        <div id="header-title">
          <h1>Team Betelgeuse</h1>
        </div>
        <section id="header-subtitles">
          <div class="nav-btn">
            <h3><a href="/register.html" alt="_blank"> Sign-Up </a></h3>
          </div>
          <div class="nav-btn">
            <h3><a href="/login.html"> Login </a></h3>
          </div>
          <div class="nav-btn">
            <h3><a href="/post.html"> Post </a></h3>
          </div>
          <div class="nav-btn">
            <h3><a href="/index.html"> Home </a></h3>
          </div>
        </section>
        <div id="header-buttons"> 
          <button id="night-btn" class="btn"> night mode </button>
          <button id="day-btn" class="btn"> day mode </button>
        </div>        
      </header>
</body>
</html>


<?php
//  create connection
require_once 'myFuncs.php';
$conn = dbConnect();


// check if the user entered a Zipcode
$zip = $_POST['Zipcode'];
if ($zip < 1) {
    $zip = 0;
}

$role = $_POST['Role'];
if ($role == "User") {
  $role = 2;
} else{
  $role = 1;
}


if ($conn) {} else {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}

$sqlInsert = "INSERT INTO usersDB (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD, EMAIL, ADDRESS, CITY, STATE, ZIPCODE, COUNTRY, ROLE_ID)
VALUES('$_POST[FirstName]', '$_POST[LastName]', '$_POST[Username]', '$_POST[Password]', '$_POST[Email]', '$_POST[Address]', '$_POST[City]', '$_POST[State]', $zip, '$_POST[Country]', $role);";

//execute query
$queryResult = sqlsrv_query($conn, $sqlInsert);

//check if we successfully stored data
if ($queryResult === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "New Rocord Created Successfully";
}

// create sql insert. Insert user input into "users" table

// close connection
$conn->close();
