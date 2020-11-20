<!--   Milestone-1 
ver. 1 
  Joshua W., Noah R., Brydon J.

  loginHandler.php: 
  this script creates a connection with our SQL database and accepts the user input from login.html
      this input is then checked against the user database to see if the login credentials are acceptable
      the results of the login attempt are printed to the webpage. -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loginHandler.php</title>
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




require_once 'myFuncs.php';
$conn = dbConnect();

$username = $_POST["Username"];
$password = $_POST["Password"];

// define query that will be run in SQL database
$query = "SELECT * 
        FROM usersDB
        WHERE USERNAME = '$username'
        AND PASSWORD = '$password';";

$loginResult = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));

$numOfRows = sqlsrv_num_rows($loginResult);

if($numOfRows == 1){ //successful login
    echo "Login was successful <br>";
    $row = sqlsrv_fetch_array($loginResult);
    saveUserID($row["USER_ID"]);
} else if($numOfRows == 0){ // no user has those credentials
    echo "Login failed";
} else if($numOfRows > 1){ // more than one user has those credentials
    echo "Multiple users have registered with that username and password";
} else {
    echo "SQL connection error: " . $query . "<br>" . $conn -> error;
}

$conn->close();
?>