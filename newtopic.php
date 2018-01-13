<?php
	include ('layout_manager.php');
	include ('content_function.php');
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
					if (isset($_GET['status'])) {
						if ($_GET['status'] == 'reg-success') {
								//check whether the registered records are inserted are not
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
			<h2><a href="/forum/gre.php">Click here.. to know eligible universities</a></h2>
		</div>
		<div class="content">
			<?php 
				if (isset($_SESSION['username'])) {
					echo "<form action='/forum/addnewtopic.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'
						  method='POST'>
						  <p>Title: </p>
						  <input type='text' id='topic' name='topic' size='100' />
						  <p>Content: </p>
						  <textarea id='content' name='content'></textarea><br />
						  <input type='submit' value='add new post' />
						  </form>";
					
						  
				} else {
					echo "<p>please login first or <a href='/forum/register.html'>click here</a> to register.</p>";
				}
			?>
		</div>
	</div>
</body>
</html>