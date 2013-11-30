<?php
	require("connection.php");
	session_start();

	//LOGIN
	if($_POST['action'] == "login")
	{
		//set variables from post
		$login_username = $_POST['login_username'];
		$login_password = md5($_POST['login_password']);

		//query database for that username
		$query = "SELECT * FROM users WHERE username='{$login_username}'";
		$user = fetch_record($query);

		//error if username is blank
		if(empty($login_username))
		{
			$_SESSION['error_login'] = "Please enter a username.";
			header("location: register.php");
		}
		//error if username is not in database
		elseif(!$user)
		{
			$_SESSION['error_login'] = "No such user exists.";
			header("location: register.php");
		}
		//error if username and password don't match
		elseif($user['password'] != $login_password)
		{
			$_SESSION['error_login'] = "Username and password do not match.";
			header("location: register.php");
		}
		//sucess if username and password match
		elseif($user['password'] == $login_password)
		{
			$_SESSION['first_name'] = $user['first_name'];
			header("location: success.php");
		}
	}

	//REGISTER
	if($_POST['action'] == "register")
	{
		//set variables from post
		$error_main = "";
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_confirm = $_POST['password_confirm'];
		$email = $_POST['email'];
		$birthdate = $_POST['birthdate'];
		//validate first name
		if(!empty($first_name) && ctype_alpha($first_name))
		{
			$_SESSION['valid_first_name'] = true;
		}
		else
		{
			$_SESSION['valid_first_name'] = false;
			$_SESSION['error_first_name'] = "Please enter a valid first name (letters only).";
		}
		//validate last name
		if(!empty($last_name) && ctype_alpha($last_name))
		{
			$_SESSION['valid_last_name'] = true;
		}
		else
		{
			$_SESSION['valid_last_name'] = false;
			$_SESSION['error_last_name'] = "Please enter a valid last name (letters only).";
		}
		//validate username
		//first check if username is already in database
		$query = "SELECT * FROM users WHERE username='{$username}'";
		$user = fetch_record($query);
		if($user)
		{
			$_SESSION['valid_username'] = false;
			$_SESSION['error_username'] = "Your username aready exists.  Please create a different username.";
		}
		//then do regular username validation
		elseif(!empty($username) && strlen($username) >= 6)
		{
			$_SESSION['valid_username'] = true;
		}
		else
		{
			$_SESSION['valid_username'] = false;
			$_SESSION['error_username'] = "Please enter a valid username of at least 6 characters.";
		}
		//validate password
		if(!empty($password) && strlen($password) >= 8)
		{
			$_SESSION['valid_password'] = true;
		}
		else
		{
			$_SESSION['valid_password'] = false;
			$_SESSION['error_password'] = "Please enter a valid password of at least 8 characters.";
		}
		//validate confirm password
		if(!empty($password_confirm) && ($password == $password_confirm))
		{
			$_SESSION['valid_password_confirm'] = true;
		}
		else
		{
			$_SESSION['valid_password_confirm'] = false;
			$_SESSION['error_password_confirm'] = "Your passwords did not match.";
		}
		//validate email
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$_SESSION['valid_email'] = true;
		}
		else
		{
			$_SESSION['valid_email'] = false;
			$_SESSION['error_email'] = "Please enter a valid email address.";
		}
		//validate birthdate
		if(empty($birthdate) || preg_match("'\b(0?[1-9]|1[012])[- /.](0?[1-9]|[12][0-9]|3[01])[- /.](19|20)?[0-9]{2}\b'", $birthdate))
		{
			$_SESSION['valid_birthdate'] = true;
		}
		else
		{
			$_SESSION['valid_birthdate'] = false;
			$_SESSION['error_birthdate'] = "Please enter a valid date.";
		}

		//success if all fields are valid
		if($_SESSION['valid_first_name'] && $_SESSION['valid_last_name'] && $_SESSION['valid_username'] && $_SESSION['valid_password'] && $_SESSION['valid_password_confirm'] && $_SESSION['valid_email'])
		{
			$query = "INSERT INTO users (first_name, last_name, username, password, email, birthdate, created_at) 
				VALUES ('{$first_name}', '{$last_name}', '{$username}', md5('{$password}'), '{$email}', '{$birthdate}', NOW())";
			mysql_query($query);
			$_SESSION['valid_main'] = true;
			$_SESSION['first_name'] = $first_name;
			header("location: success.php");
			exit();
		}
		//redirect back to register page if any errors with appropriate error messages
		else
		{
			$_SESSION['valid_main'] = false;
			$_SESSION['error_main'] = "Please correct the below information.";	
			header("location: register.php");
			exit();
		}
	}

	//LOGOUT
	if($_POST['action'] == "logout")
	{
		session_destroy();
		header("location: register.php");
	}
?>