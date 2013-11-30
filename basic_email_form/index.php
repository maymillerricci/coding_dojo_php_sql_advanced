<?php
	require("connection.php");
	session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Email Form</title>
		<link rel="stylesheet" href="email_form.css">
	</head>
	<body>
	<?php  
		if(isset($_SESSION['message']) and ($_SESSION['valid'] == 'no'))
		{
			echo "<div class='error'>" . $_SESSION['message'] . "</div>";
			unset($_SESSION['message']);
		}
	?>
		<p>Please enter your email address:</p>
		<form action="process.php" method="post">
			<input type="text" name="email" placeholder="email address">
			<input type="submit" name="email-submit">
		</form>
	</body>
</html>