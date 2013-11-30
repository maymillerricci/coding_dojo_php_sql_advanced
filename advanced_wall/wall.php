<?php
	require("connection.php");
	session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Coding Dojo Wall</title>
		<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="register.css">
	</head>
	<body>
		<div id="wrapper">	
			<div class="row" id="header">
				<?php  
				//if logged in
				if(isset($_SESSION['user_info']))
				{
					echo "<div class='col-md-7'><h2>Coding Dojo Wall</h2></div>";
					echo "<div class='col-md-3'><h4>Welcome, " . $_SESSION['user_info']['username'] . "!</h4></div>"; 
					echo "<div class='col-md-2'>
							<form action='process.php' method='post'>
								<input type='hidden' name='action' value='logout'>
								<input type='submit' value='Log Out' class='btn btn-primary'>
							</form>
						</div>";
				}
				//if not logged in
				else
				{
					echo "<div class='col-md-6'><h2>Coding Dojo Wall</h2></div>";
					echo "<div class='col-md-4'><h4>Welcome!  You must be logged in to post messages or comments.</h4></div>";
					echo "<div class='col-md-2'>
							<form action='process.php' method='post'>
								<input type='hidden' name='action' value='log_back_in'>
								<input type='submit' value='Log Back In' class='btn btn-primary'>
							</form>
						</div>";
				}
				?>
			</div> <!-- close header div -->

			<h3>Post a Message:</h3>
			<?php
				if(isset($_SESSION['error_message']))
				{
					echo "<div class='alert alert-danger' id='error_message'>" . $_SESSION['error_message'] . "</div>";
					unset($_SESSION['error_message']);
				}
				?>
			<form action="process.php" method="post">
				<textarea name="message"></textarea>
				<input type="hidden" name="action" value="post_message">
				<input type="submit" class="btn btn-primary post" id="post_message" value="Post Message">
			</form>
			<?php
			$query_messages = "SELECT users.id as user_id, users.first_name, users.last_name, messages.id as message_id, messages.message, messages.created_at 
								FROM messages 
								LEFT JOIN users 
								ON users.id = messages.user_id 
								ORDER BY messages.created_at DESC";
			$messages = fetch_all($query_messages);
			foreach($messages as $message)
			{
				$time_diff_message = (((time() - strtotime($message['created_at'])))/60);  //minutes since message post
				echo "<div class='messages'><h4>" . $message['first_name'] . " " . $message['last_name'] . " - " . 
				date('F jS Y', strtotime($message['created_at']));
				if(isset($_SESSION['user_info']) && ($message['user_id'] == $_SESSION['user_info']['id']) && ($time_diff_message<=30))
				{
					$delete_confirm = '"Are you sure you want to delete this message?"';
					echo	"<form action='process.php' method='post'>
								<input type='hidden' name='message_id' value = " . $message['message_id'] . ">
								<input type='hidden' name='action' value='delete_message'>
								<input type='submit' class='btn btn-default delete' id='delete_message' value='Delete Message' onclick='return confirm(" . $delete_confirm . ")'>
							</form>";
				}
				echo "</h4><p>" . $message['message'] . "</p></div>";
				$query_comments = "SELECT users.id as user_id, users.first_name, users.last_name, messages.id as message_id, comments.id as comment_id, comments.comment, comments.created_at 
									FROM comments 
									LEFT JOIN users 
									ON users.id = comments.user_id 
									LEFT JOIN messages 
									ON messages.id = comments.message_id 
									WHERE message_id = '{$message['message_id']}'
									ORDER BY comments.created_at ASC";
				$comments = fetch_all($query_comments);
				foreach($comments as $comment)
				{
					$time_diff_comment = (((time() - strtotime($comment['created_at'])))/60);  //minutes since comment post
					echo "<div class='comments'><h4>" . $comment['first_name'] . " " . $comment['last_name'] . " - " . 
					date('F jS Y', strtotime($comment['created_at']));
					if(isset($_SESSION['user_info']) && ($comment['user_id'] == $_SESSION['user_info']['id']) && ($time_diff_comment<=30))
					{
					$delete_confirm_comment = '"Are you sure you want to delete this comment?"';
					echo	"<form action='process.php' method='post'>
								<input type='hidden' name='comment_id' value = " . $comment['comment_id'] . ">
								<input type='hidden' name='action' value='delete_comment'>
								<input type='submit' class='btn btn-default delete' id='delete_comment' value='Delete Comment' onclick='return confirm(" . $delete_confirm_comment . ")'>
							</form>";
					}
					echo "</h4><p>" . $comment['comment'] . "</p></div>";
				}
				echo "<div class='comments'><h4>Post a Comment:</h4>";
				if((isset($_SESSION['error_comment']) && (isset($_SESSION['message_id'])) && ($message['message_id'] == $_SESSION['message_id'])))
				{
					echo "<div class='alert alert-danger' id='error_comment'>" . $_SESSION['error_comment'] . "</div>";
					unset($_SESSION['error_comment']);
				}
				echo "<form action='process.php' method='post'>
				<textarea name='comment'></textarea>
				<input type='hidden' name='message_id' value = " . $message['message_id'] . ">
				<input type='hidden' name='action' value='post_comment'>
				<input type='submit' class='btn btn-primary post' id='post_comment' value='Post Comment'>
				</form></div>";
			}
			?>
			<p id='footnote'>*NOTE: The option to delete a message/comment only comes up if you are the user who posted the message/comment and it was created within the past 30 minutes.</p>
		</div> <!-- close wrapper div -->
	</body>
</html>