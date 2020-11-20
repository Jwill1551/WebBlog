<?php

//   Milestone-1 
//   ver. 1 
//   Joshua W., Noah R., Brydon J.

//   postFuncs.php: 
//      this php script provides some funtions to be used to interact with the posts that users make

//      StorePost($userID, $postTitle, $postCategory, $postString): stores the post to the sql database
//			filterwords($text): filters the words in the parameter string. returns the same string with bad words converted to ***

require_once 'myFuncs.php';
$conn = dbConnect();

// created database connection, then stores the post to our SQL database table 'posts'
function StorePost($userID, $postTitle, $postCategory, $postString)
{
	global $conn;

	$sqlInsert = "INSERT INTO postsDB (POSTED_BY, POST_TITLE, CATEGORY, POST_CONTENT)
				VALUES('$userID', '$postTitle', '$postCategory', '$postString');";

	$queryResult = sqlsrv_query($conn, $sqlInsert);
	
	if ($queryResult === false) {
    die(print_r(sqlsrv_errors(), true));
	} else {
		echo "New post stored Successfully";
	}

}

// takes in a string parameter and filters out a selection from that string.
// returns the string with those words replaced with "***"
function filterwords($text){
	$filterWords = array('gosh', 'darn', 'poo', 'shmear', 'shucks');
	$filterCount = sizeof($filterWords);
	for ($i = 0; $i < $filterCount; $i++) {
		$text = preg_replace_callback('/\b' . $filterWords[$i] . '\b/i', function($matches){return str_repeat('*', strlen($matches[0]));}, $text);
	}
	return $text;
}

function getBlogPost($postID){
	global $conn;
	
	$query = "SELECT * FROM postsDB WHERE POST_ID = '$postID';";
	
	$queryResult = sqlsrv_query($conn, $query);

	$row = sqlsrv_fetch_array($queryResult);
	return $row;
}

// this function is used to wite the html format to display the post in the UI
function createPostCard($post){
	$html = '
	<div class="post_wrapper">
		<div class="post_card">
			<div class="post_card_image">
				<img src="/res/codingImages1.png" alt="coding image">
			</div>
			<div class="post_title_and_content">
				<div class="post_card_postID">POST_ID: ' . $post["POST_ID"] . '</div>' .
				'<div class="post_card_postedBY">POST_BY (id): ' . $post["POSTED_BY"] . '</div>' .
				'<div class="post_card_title">' . $post["POST_TITLE"] . '</div>
				<div class="post_card_content">' . $post["POST_CONTENT"] . '</div>
			</div>
		
			<div class="post_card_category_section">
				<div class="post_card_category">' . $post["CATEGORY"] . '</div>
			</div>
		</div> <!-- end post card -->
	</div> ';
	
	return $html;
}

?>

