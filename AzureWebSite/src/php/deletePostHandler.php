<?php

//   Milestone-1 
//   ver. 1 
//   Joshua W., Noah R., Brydon J.

//   deletePostHandler.php: 
//      used to process the request to delete a post form the database
//      checks first if the user calling the function is an admin

// create database connection

require 'myFuncs.php';
$conn = dbConnect();
$currentUser = getUserID();

$query = "SELECT ROLE_ID FROM usersDB WHERE USER_ID = '$currentUser';";
$result = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));

$row = sqlsrv_fetch_array($result); 

$role = $row["ROLE_ID"];

if($role == 1){
  require_once 'adminFuncs.php';
  $postID = $_POST["deleteBlog"];
  deletePost($postID);
} else {
  echo 'only an admin can delete a user. Try user1, password1 to login as an admin.';
}

?>