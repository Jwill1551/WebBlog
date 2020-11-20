<!-- 
  Milestone-1 
  ver. 1 
  Joshua W., Noah R., Brydon J.

  postHandler.php: 
    This php script accepts the user input from post.html and uses the StorePost 
    frunction from postFuncs.php to store a post into our posts sql table 
  
  -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>postHandler php</title>
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
  $userID = getUserID();

  if( $userID != "" ){
    require_once 'postFuncs.php';

    $postTitle = $_POST["postTitle"];
    $postCategory = $_POST['category'];
    $postString = $_POST["blogPost"];

    $filteredString = FilterWords($postString);
    StorePost($userID, $postTitle, $postCategory, $filteredString);
  } else{
    echo 'please log in before posting';
  }




?>