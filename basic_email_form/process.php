<?php  
	require("connection.php");
	session_start();

	//validate email address (from index.php)
	if(isset($_POST['email-submit']))
	{
		$email = $_POST['email'];
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$query = "INSERT INTO users (email, created_at) VALUES ('{$email}', NOW())";
			mysql_query($query);
			$valid = "yes";
			$message = "The email address you entered (" . $email . ") is a VALID email address!  Thank you!";
			header("location: success.php");
		}
		else
		{
			$valid = "no";
			$message = "The email address you entered (" . $email . ") is NOT a valid email address!";
			header("location: index.php");
		}
		$_SESSION['valid'] = $valid;
		$_SESSION['message'] = $message;
	}

	//delete record (from success.php)
	if(isset($_POST['delete-submit']))
	{
		$id = $_POST['id'];
		$query = "DELETE FROM users WHERE id='{$id}'";
		mysql_query($query);
		header("location: success.php");
	}
?>