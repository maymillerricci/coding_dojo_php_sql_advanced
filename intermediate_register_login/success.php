<?php
	require("connection.php");
	session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Welcome</title>
		<link rel="stylesheet" href="register.css">
	</head>
	<body>
		<div id="wrapper">	
			<?php 
			//so that using back button doesn't throw error on session[firstname]
			if(isset($_SESSION['first_name']))
			{
				echo "<h3>Welcome, " . $_SESSION['first_name'] . "!</h3>"; 
			}
			else
			{
				echo "<h3>Welcome!</h3>";
			}
			?>
			<form action="process.php" method="post">
				<input type="hidden" name="action" value="logout">
				<input type="submit" value="Logout" class="submit">
			</form>
		</div> <!-- close wrapper div -->
	</body>
</html>


