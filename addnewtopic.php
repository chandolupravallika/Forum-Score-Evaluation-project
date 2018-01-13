<?php
	session_start();
	//database connections
	include ('dbconn.php');
	
	$topic = addslashes($_POST['topic']);
	$content = nl2br(addslashes($_POST['content']));
	$cid = $_GET['cid'];
	$scid = $_GET['scid'];
	//to insert the records into the topics table
	$insert = mysqli_query($con, "INSERT INTO topics (`category_id`, `subcategory_id`, `author`, `title`, `content`, `date_posted`,`view`,`replie`) 
								  VALUES ('".$cid."', '".$scid."', '".$_SESSION['username']."', '".$topic."', '".$content."', NOW(),'0','0');");
								  
	if ($insert)
	//if true, navigate to topics.php page
	 {
		header("Location: /forum/topics.php?cid=".$cid."&scid=".$scid."");
	}

?>