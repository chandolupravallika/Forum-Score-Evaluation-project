<?php
//login and logout sessions
	include ('layout_manager.php');
	//all functions are included
	include ('content_function.php');
?>
<html>
<head><title>SIUC FORUM</title>
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
						//check whether the registered records are inserted are not
					if (isset($_GET['status'])) {
						if ($_GET['status'] == 'reg-success') {
							echo "<h1 style='color: green;'>new user registered successfully!</h1>";
							//fails if the registerd records mismatch with login details
						} else if ($_GET['status'] == 'login-fail') {
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
		</div>
		<?php
			if (isset($_SESSION['username'])) {
				//To add new topics
				echo "<div class='content'><p><a href='/forum/newtopic.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'>
					  add new topic</a> &nbsp;&nbsp; 

					  <a href='/forum/index.php'> View Categories </a></p></div>";
					  //To view categories
			}
		?>
		<div class="content">
		<!--To display Topics of that subcategory -->
			<?php disptopics($_GET['cid'], $_GET['scid']); ?>
		</div>
	</div>
</body>
</html>