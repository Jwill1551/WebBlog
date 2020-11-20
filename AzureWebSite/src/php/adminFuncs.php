<?php

//   Milestone-1 
//   ver. 1 
//   Joshua W., Noah R., Brydon J.

//   adminFuncs.php: 
//      this php script defines all the functions that are
//      to be used by the administrator in order to manage
//      the data base of users/posts/roles/etc.

// create database connection
require_once 'myFuncs.php';
$conn = dbConnect();

// delete a post
function deletePost($postID){
  global $conn;

  $deleteQuery = "DELETE FROM postsDB WHERE POST_ID = '$postID';";

  $deleteResult = sqlsrv_query($conn, $deleteQuery, array(), array( "Scrollable" => 'static' ));
  
  $numOfRows = sqlsrv_num_rows($deleteResult);
      
  if($numOfRows == 1){ //successful login
    echo "Post successfully deleted";
  } else {
    echo "No post was found with postID: " . $postID;
  }
}  



// delete a user?
function deleteUser($userID){
  global $conn;

  $deletePostQuery = "DELETE FROM postsDB WHERE POSTED_BY = '$userID';";
  $deleteUserQuery = "DELETE FROM usersDB WHERE USER_ID = '$userID';";

  $deletePosts = sqlsrv_query($conn, $deletePostQuery, array(), array( "Scrollable" => 'static' ));
  $deleteUsers = sqlsrv_query($conn, $deleteUserQuery, array(), array( "Scrollable" => 'static' ));

  $numOfRows = sqlsrv_num_rows($deleteUsers);

  if($numOfRows == 1){
    echo "User was deleted <br>";
  } else if( $numOfRows == 0){
    echo "No user was found with userID: " . $userID;
  }
} 

// update a post
function updatePost($postID){
  global $conn;

} 

// READ user information
function getUserDetails($userID){
  global $conn;


} 

?>