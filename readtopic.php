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
<!-- To include stylesheet-->
<link href="/forum/styles/main.css" type="text/css" rel="stylesheet" />
<body>
	<div class="pane">
		<div class="header"><h1><a href="/forum">SIUC Forum</a></h1></div>
		<div class="loginpane">
			<?php
				session_start();
				if (isset($_SESSION['username'])) {
					logout();
				} else {
					if (isset($_GET['status'])) {
							//check whether the registered records are inserted are not
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
			//To add reply to this topic
				replylink($_GET['cid'], $_GET['scid'], $_GET['tid']);
			//Link to view the topics. 	
				echo "<a href='/forum/topics.php?cid=".$_GET[ 'cid']."&scid=".$_GET['scid']."'>View topics</a>";
			//Link to view the categories.	
				echo "<p><a href='/forum/index.php'> View Categories</a></p>";
			?>
		</div>
		<?php

			
//To display detailed content of that topic.
			disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']);
			//To display number of replies for that topic.
			echo "<div class='content'><p>All Replies (".countReplies($_GET['cid'], $_GET['scid'], $_GET['tid']).")
				  </p></div>";
		    //To display replies for that topic.		  
			dispreplies($_GET['cid'], $_GET['scid'], $_GET['tid']);
		?>
	</div>
</body>
</html>