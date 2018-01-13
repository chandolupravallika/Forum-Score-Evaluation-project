<?php
	include ('dbconn.php');
	
	$newuser = $_POST['usernameinput'];
	$newpwd = $_POST['passwordinput'];
	$select=mysqli_query($con,"select * from users where username='$newuser'");
	if(mysqli_num_rows($select)>0)
	{
		             echo "<script>
		             alert('user already exist');
		             window.location.href='/forum/reg-success';
		             </script>";	

		
	}
	else
	{
	$insert = mysqli_query($con, "INSERT INTO users (`username`, `password`) VALUES ('".$newuser."', '".$newpwd."');");
	
	if ($insert) {
				             echo "<script>
	             alert('registered successfully');
	      window.location.href='/forum/reg-success';
		             </script>";
		header("Location: /forum/reg-success");
	}

}
?>