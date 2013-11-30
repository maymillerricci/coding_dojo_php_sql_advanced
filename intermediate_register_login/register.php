<?php
	require("connection.php");
	session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login or Register</title>
		<link rel="stylesheet" href="register.css">
	</head>
	<body>
		<div id="wrapper">
			<div class="border" id="login">
				<h3>Login</h3>
				<p class="error" id="error_login">
				<?php
				if(isset($_SESSION['error_login']))
				{
					echo $_SESSION['error_login'];
					unset($_SESSION['error_login']);
				}
				?>
				</p>
					<form action="process.php" method="post">
						<table>
							<tbody>
								<tr>
									<td><label for="login_username">Username:</label></td>
									<td><input type="text" name="login_username" id="login_username"></td>
								</tr>
								<tr>
									<td><label for="login_password">Password:</label></td>
									<td><input type="password" name="login_password" id="login_password"></td>
								</tr>
								<tr>
									<td>
										<input type="hidden" name="action" value="login">
									</td>
								</tr>	
							</tbody>
						</table>
						<input type="submit" value="Login" class="submit">
					</form>
			</div> <!-- close login div-->
			<div class="border" id="register">
				<h3>Register</h3>
				<p class="error" id="error_main">
				<?php 
				if(isset($_SESSION['error_main']) && $_SESSION['valid_main'] == false)
				{
					echo $_SESSION['error_main'];
					unset($_SESSION['error_main']);
				}
				?>
				</p>
				<form action="process.php" method="post">
					<table>
						<tbody>
							<tr>
								<td><label for="first_name">*First Name:</label></td>
								<td><input type="text" name="first_name" id="first_name"></td>
								<td class="error" id="error_first_name">
								<?php 
								if(isset($_SESSION['error_first_name']) && $_SESSION['valid_first_name'] == false)
								{
									echo $_SESSION['error_first_name'];
									unset($_SESSION['error_first_name']);
								}
								?>
								</td>
							</tr>
							<tr>
								<td><label for="last_name">*Last Name:</label></td>
								<td><input type="text" name="last_name" id="last_name"></td>
								<td class="error" id="error_last_name">
								<?php 
								if(isset($_SESSION['error_last_name']) && $_SESSION['valid_last_name'] == false)
								{
									echo $_SESSION['error_last_name'];
									unset($_SESSION['error_last_name']);
								}
								?>
							</tr>
							<tr>
								<td><label for="username">*Username:</label></td>
								<td><input type="text" name="username" id="username"></td>
								<td class="error" id="error_username">
								<?php 
								if(isset($_SESSION['error_username']) && $_SESSION['valid_username'] == false)
								{
									echo $_SESSION['error_username'];
									unset($_SESSION['error_username']);
								}
								?>
							</tr>
							<tr>
								<td><label for="password">*Password:</label></td>
								<td><input type="password" name="password" id="password"></td>
								<td class="error" id="error_password">
								<?php 
								if(isset($_SESSION['error_password']) && $_SESSION['valid_password'] == false)
								{
									echo $_SESSION['error_password'];
									unset($_SESSION['error_password']);
								}
								?>
							</tr>
							<tr>
								<td><label for="password_confirm">*Confirm Password:</label></td>
								<td><input type="password" name="password_confirm" id="password_confirm"></td>
								<td class="error" id="error_password_confirm">
								<?php 
								if(isset($_SESSION['error_password_confirm']) && $_SESSION['valid_password_confirm'] == false)
								{
									echo $_SESSION['error_password_confirm'];
									unset($_SESSION['error_password_confirm']);
								}
								?>
							</tr>
							<tr>
								<td><label for="email">*Email:</label></td>
								<td><input type="text" name="email" id="email"></td>
								<td class="error" id="error_email">
								<?php 
								if(isset($_SESSION['error_email']) && $_SESSION['valid_email'] == false)
								{
									echo $_SESSION['error_email'];
									unset($_SESSION['error_email']);
								}
								?>
							</tr>
							<tr>
								<td><label for="birthdate">Birthdate:</label></td>
								<td><input type="text" name="birthdate" id="birthdate"></td>
								<td class="error" id="error_birthdate">
								<?php 
								if(isset($_SESSION['error_birthdate']) && $_SESSION['valid_birthdate'] == false)
								{
									echo $_SESSION['error_birthdate'];
									unset($_SESSION['error_birthdate']);
								}
								?>
							</tr>
							<tr>
								<td>
									<input type="hidden" name="action" value="register">
								</td>
							</tr>			
						</tbody>
					</table>
					<input type="submit" value="Register" class="submit">
				</form>
			</div> <!-- close register div-->
		</div> <!-- close wrapper div-->
	</body>
</html>