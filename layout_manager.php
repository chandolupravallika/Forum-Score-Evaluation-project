<?php
//to login to the forum
	function loginform() {
		echo "<form action='/forum/validatelogin.php' method='POST'>
			  <p>Username:</p>
			  <input type='text' id='usernameinput' name='usernameinput' />
				<p>Password:</p>
				<input type='password' id='passwordinput' name='passwordinput' />
				<input type='submit' value='Login' />

				<button type='button' onclick='location.href=\"/forum/register.html\";'>Register</button>
			</form>";// register here, if user doesnt exists
	}
	
	function logout() {
		//once logged in, s session is created to keep track of your information 
		echo nl2br("<p>Welcome ".$_SESSION['username']."!\nLooking good today!</p>
				<form action='/forum/logout.php' method='GET'>
				<input type='submit' value='Logout' /></form>");
	}
?>