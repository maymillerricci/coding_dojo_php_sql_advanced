<?php
	require("connection.php");
	session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Success!</title>
		<link rel="stylesheet" href="email_form.css">
	</head>
	<body>
<?php  
		if(isset($_SESSION['message']) and ($_SESSION['valid'] == 'yes'))
		{
			echo "<div class='success'>" . $_SESSION['message'] . "</div>";
			unset($_SESSION['message']);

		}
		echo "<h2>Email addresses entered:</h2>";
		$query = "SELECT * FROM users";
		$users = fetch_all($query);
		foreach ($users as $user) 
		{
?>
		<form action='process.php' method='post'>
<?php 
			echo "<form action='process.php' method='post'>" . $user['email'] . " - " . 
					date('m/d/y h:i a', strtotime($user['created_at']));
?>
			<input type='hidden' name='id' value= '<?php echo $user['id']?>' >
			<input type='submit' 
				onclick="return confirm('Are you sure you want to delete this email address (<?php echo $user['email']?>)?')"
				name='delete-submit' class='delete' value='Delete'>
			<br>
			</form>
<?php
		}
?>
	</body>
</html>