<!--    
  Milestone-1 
  ver. 1 
  Joshua W., Noah R., Brydon J.

  browseBusinessPosts.php: 
      This php script is used to browse all business posts in the posts sql table.
      It creates a connection to the database, uses postFuncs functions to get the posts,
      formats each post into a card and the prints those cards to the page
-->

<?php

require_once 'myFuncs.php';
$conn = dbConnect();

require 'postFuncs.php';


// array to store all the posts in the category
$postArray = array();

// query to get all business posts
$query = "SELECT * FROM postsDB WHERE CATEGORY = 'business';";

// save the results of this query to a variable
$results = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));


if($results){

  // save number of rows so we don't execute if we don't have any posts in this category
  $num_rows = sqlsrv_num_rows($results);
  
  if($num_rows > 0){
      for ($i=0; $i < $num_rows; $i++) { 
        $postArray[$i] = sqlsrv_fetch_array($results);
      }
  }
} else {
  echo "Error: " .$query . "<br>" . $conn->error;
}
// $post = getBlogPost(9);

// $post_card = createPostCard($post);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/src/css/postStyle.css">
  <link rel="stylesheet" href="/src/css/style.css">
  <title>Document</title>
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

  <div class="outer_posts_container">
    <div class="inner_posts_container inner_posts_container--business">
      <?php 
      foreach ($postArray as $p) {
        # code...
        echo createPostCard($p);
      }
      ?>
    </div>
  </div>


</body>
</html>
