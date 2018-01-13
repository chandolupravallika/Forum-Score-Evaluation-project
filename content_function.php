<?php
//<!--To display categories -->
	function dispcategories() {
		//To include database connection details
		include ('dbconn.php');
		//To fetch data from categories table
		$select = mysqli_query($con, "SELECT * FROM categories");
		//To fetch rows of categories into $row
		while ($row = mysqli_fetch_assoc($select)) {
			//To display content of categories table 
			echo "<table class='category-table'>";
			echo "<tr><td class='main-category' colspan='2'>".$row['category_title']."</td></tr>";
			//To display subcategories of that particular category.
			dispsubcategories($row['cat_id']);
			echo "</table>";
		}
	}
	
	function dispsubcategories($parent_id) {
		//To include database connection details
		include ('dbconn.php');
		//To fetch data from subcategories table for that category id,here parent_id is the foreign key to category table.
		$select = mysqli_query($con, "SELECT cat_id, subcat_id, subcategory_title, subcategory_desc FROM categories, subcategories 
									  WHERE ($parent_id = categories.cat_id) AND ($parent_id = subcategories.parent_id)");
		echo "<tr><th width='90%'>Categories</th><th width='10%'>Topics</th></tr>";
		//To fetch rows of subcategories into $row
		while ($row = mysqli_fetch_assoc($select)) {
			//To view the topics with in  the subcategory
			echo "<tr><td class='category_title'><a href='/forum/topics.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."'>
				  ".$row['subcategory_title']."<br />";
				  //(".$row['subcategory_desc'].")
			echo "</a></td>";
			//to display count of topics in that subcategory
			echo "<td class='num-topics'>".getnumtopics($parent_id, $row['subcat_id'])."</td></tr>";
		}
	}
	//To get the number of topics in each subcategory
	function getnumtopics($cat_id, $subcat_id) {
		//To include database connection details
		include ('dbconn.php');
		// To fetch data from the topics table for a particular subcategory in a category
		$select = mysqli_query($con, "SELECT category_id, subcategory_id FROM topics WHERE ".$cat_id." = category_id 
									  AND ".$subcat_id." = subcategory_id");
		// Returns the total number of topics to the dispsubcategories function.
		return mysqli_num_rows($select);
	}
      //To display topics of that subcategory
	function disptopics($cid,$scid) {
		//To include database connection details
		include ('dbconn.php');
		//To fetch data from topics table for that subcategory in a category
		$select = mysqli_query($con, "SELECT topic_id, author, title, date_posted, view, replies FROM categories, subcategories, topics 
									  WHERE ($cid = topics.category_id) AND ($scid = topics.subcategory_id) AND ($cid = categories.cat_id)
									  AND ($scid = subcategories.subcat_id) ORDER BY topic_id DESC");
		
		//If records exist in topics within that subcategory enter into IF loop
		if (mysqli_num_rows($select)) {
			//display the topics
			echo "<table class='topic-table'>";
			echo "<tr><th>Title</th><th>Posted By</th><th>Date Posted</th><th>Views</th><th>Replies</th><th>Action</th></tr>";
			
			//to fetch the data into $row variable 
			while ($row = mysqli_fetch_assoc($select)) {
				//to view the content of the topic
				echo "<tr><td><a href='/forum/readtopic.php?cid=".$cid."&scid=".$scid."&tid=".$row['topic_id']."'>
					 ".$row['title']."</a></td><td>".$row['author']."</td><td>".$row['date_posted']."</td>";
					 //To display the view counts and number of replies for that topic 
			    echo "<td>".$row['view']."</td><td>".countReplies($cid, $scid, $row['topic_id'])."</td>
			    <td><a href='/forum/delete.php?tid=".$row['topic_id']."&cid=".$cid."&scid=".$scid."&author=".$row['author']."'>delete</a></td> </tr>";//to delete a particular topic
	
			}
			echo "</table>";
		//	echo "<p>  <a href='/forum/newtopic.php?cid=".$cid."&scid=".$scid."'>
		//		 add the topics</a></p>";

		} 
		else 
		{
			//If no topics exists, it creates a new topic 
			echo "<p> There are no topics yet! <a href='/forum/newtopic.php?cid=".$cid."&scid=".$scid."'>
				 add the topics</a></p>";
		}
	}
	//to display the content of the topic
	function disptopic($cid, $scid, $tid) {
		include ('dbconn.php');
		//to fetch the records from the topics for that subcategory of a category
		$select = mysqli_query($con, "SELECT cat_id, subcat_id, topic_id, author, title, content, date_posted FROM 
									  categories, subcategories, topics WHERE ($cid = categories.cat_id) AND
									  ($scid = subcategories.subcat_id) AND ($tid = topics.topic_id)");
		//if records exist
		if($select)
		{
			//fetch the records into row variable
		while($row = mysqli_fetch_assoc($select))
		{
			//display the contents of the record
		echo nl2br("<div class='content'><h2 class='title'>".$row['title']."</h2><p>".$row['author']."\n".$row['date_posted']."</p></div>");
		echo "<div class='content'><p>".$row['content']."</p></div>"; 
	}
}
	}
	//to increment the views count everytime when ever user clicks on the topics link
	function addview($cid, $scid, $tid) {
		include ('dbconn.php');
		$update = mysqli_query($con, "UPDATE topics SET view = view + 1 WHERE category_id = ".$cid." AND
									  subcategory_id = ".$scid." AND topic_id = ".$tid."");
	}
	//To reply to that topic
	function replylink($cid, $scid, $tid) {
		echo "<p><a href='/forum/replyto.php?cid=".$cid."&scid=".$scid."&tid=".$tid."'>Reply to this post</a></p>";
	}
	//to add reply to that topic
	function replytopost($cid, $scid, $tid) {
		//on submitting the "Add comment" the topic will insert through addreply.php
		echo "<div class='content'><form action='/forum/addreply.php?cid=".$cid."&scid=".$scid."&tid=".$tid."' method='POST'>
			  <p>Comment: </p>
			  <textarea cols='80' rows='5' id='comment' name='comment'></textarea><br />
			  <input type='submit' value='add comment' />
			  </form></div>";
	}
	
	//to display all the replies of the topic 
	function dispreplies($cid, $scid, $tid) {
		include ('dbconn.php');
		//to fetch data from replies which is from the topics for that subcategory of a category 
		$select = mysqli_query($con, "SELECT replies.author, comment, replies.date_posted,replies.reply_id FROM categories, subcategories, 
									  topics, replies WHERE ($cid = replies.category_id) AND ($scid = replies.subcategory_id)
									  AND ($tid = replies.topic_id) AND ($cid = categories.cat_id) AND 
									  ($scid = subcategories.subcat_id) AND ($tid = topics.topic_id) ORDER BY reply_id DESC");
	
		//if a record exists
		if (mysqli_num_rows($select)) 
		{
			echo "<div class='content'><table class='reply-table'>";
			//to fetch the records into a row variable
				while ($row = mysqli_fetch_assoc($select)) {
				echo nl2br("<tr><th width='15%'>".$row['author']."</th><td>".$row['date_posted']."\n".$row['comment']."\n\n</td>
					<td><a href='/forum/deletereply.php?reply_id=".$row['reply_id']."&tid=".$tid."&cid=".$cid."&scid=".$scid."&author=".$row['author']."'>delete</a></td></tr>");
			}
			echo "</table></div>";
		}
	}
	//to count the no of replies for a topic
	function countReplies($cid, $scid, $tid) {
		include ('dbconn.php');
		//to fetch the records from the replies table
		$select = mysqli_query($con, "SELECT category_id, subcategory_id, topic_id FROM replies WHERE ".$cid." = category_id AND 
									  ".$scid." = subcategory_id AND ".$tid." = topic_id");

		//return the no of records
		return mysqli_num_rows($select);
	}
?>





















