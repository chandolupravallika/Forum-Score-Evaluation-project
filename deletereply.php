<?php
//login and logout sessions
	include ('layout_manager.php');
		//all functions are included	
	include ('content_function.php');
		//To increment the views count for that topic.
	addview($_GET['cid'], $_GET['scid'], $_GET['tid']);
?>
<html>
<head><title>SIUC Forum</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<link href="/forum/styles/main.css" type="text/css" rel="stylesheet" />
<body>
	<div class="pane">
		<div class="header"><h1><a href="/forum">SIUC Forum</a></h1></div>
		<div class="loginpane">
			<?php
				session_start();
				//to ensure login successfull and to pass session variable.
				if (isset($_SESSION['username'])) {
					logout();
				} else {
						//check whether the registered records are inserted are not
					if (isset($_GET['status'])) {
						if ($_GET['status'] == 'reg_success') {
							echo "<h1 style='color: green;'>new user registered successfully!</h1>";
							//fails if the registerd records mismatch with login details
						} else if ($_GET['status'] == 'login_fail') {
							echo "<h1 style='color: red;'>invalid username and/or password!</h1>";
						}
					}
					loginform();
				}
			?>
		</div>
		<div class="forumdesc">
			<p>Welcome to the SIUC forum</p>
			<!-- link for find eligible universities-->
			<h2><a href="/forum/gre.php">Click here.. to know eligible universities</a></h2>
			<?php
			include ('dbconn.php');
			//Ensuring the login functionality 
			if (isset($_SESSION['username'])) 
			{
                $reply_id=$_GET['reply_id'];
                $author=$_GET['author'];
                //check whether the current user and author of the title created are same or not
                if($_SESSION['username']==$author)
                {         
                //if true,delete the topic       
			    $select ="delete from replies where reply_id='$reply_id'";
                  if(mysqli_query($con, $select))
                  {
                  	//To reply to that topic
				replylink($_GET['cid'], $_GET['scid'], $_GET['tid']);
				//navigate to topics page
				echo "<a href='/forum/topics.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'>View topics</a>";
				echo "<p><a href='/forum/index.php'> View Categories</a></p>";
			      }
			  }
			  else
			  {
			  	//if false, alert you are not authorised user to delete
		             echo '<script language="javascript">';
		             echo 'alert("You are not author of this title&reply")';
		             echo '</script>';			
		            //To reply to that topic   	
        		replylink($_GET['cid'], $_GET['scid'], $_GET['tid']);
        		//navigate to topics page
				echo "<a href='/forum/topics.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'>View topics</a>";
				echo "<p><a href='/forum/index.php'> View Categories</a></p>";


			  }
		    }
			?>
		</div>
		<?php
			//to display the detailed contents of that topic by a user
			disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']);
			//to display the count of the replies
			echo "<div class='content'><p>All Replies (".countReplies($_GET['cid'], $_GET['scid'], $_GET['tid']).")
				  </p></div>";
				  //to display all replies of the topic
			dispreplies($_GET['cid'], $_GET['scid'], $_GET['tid']);
		?>
	</div>
</body>
</html>