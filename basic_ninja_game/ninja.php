<?php 
	require("connection.php");
	session_start();
	if(isset($_SESSION['gold']))
	{
		$gold = $_SESSION['gold'];
	}
	else
	{
		$gold = 0;
		start_over();
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ninja Game!</title>
		<link rel="stylesheet" href="ninja.css">
	</head>
	<body>
		<div id="wrapper">
			<h2>Ninja Game!</h2>
			<p id='gold'>Your Gold: <?php echo $gold ?></p>
			<form action="process.php" method="post" id="start-over">
				<input type="submit" onclick="return confirm('Are you sure you want to start over?')" 
					value="Start Over" name="start-over-submit">
			</form>
			<div class="building" id="farm">
				<p>Farm</p>
				<p>(earns 10-20 golds)</p>
				<form action="process.php" method="post">
					<input type="hidden" name="building" value="farm">
					<input type="submit" value="Find Gold!">
				</form>
			</div>
			<div class="building" id="cave">
				<p>Cave</p>
				<p>(earns 5-10 golds)</p>
				<form action="process.php" method="post">
					<input type="hidden" name="building" value="cave">
					<input type="submit" value="Find Gold!">
				</form>
			</div>
			<div class="building" id="house">
				<p>House</p>
				<p>(earns 2-5 golds)</p>
				<form action="process.php" method="post">
					<input type="hidden" name="building" value="house">
					<input type="submit" value="Find Gold!">
				</form>
			</div>
			<div class="building" id="casino">
				<p>Casino!</p>
				<p>(earns/takes 0-50 golds)</p>
				<form action="process.php" method="post">
					<input type="hidden" name="building" value="casino">
					<input type="submit" value="Find Gold!">
				</form>
			</div>
			<h3>Activities</h3>
			<ul>
<?php 
			$query = "SELECT * FROM activities";
			$activities = fetch_all($query);
			foreach($activities as $activity)
			{
				if($activity['gold'] >= 0)
				{
					echo "<li class='good'> You entered a " . $activity['building'] . " and earned " . $activity['gold'] . 
					" golds.  (" . date('F jS Y h:i a', strtotime($activity['created_at'])) . ")</li><br>";
				}
				elseif($activity['gold'] < 0)
				{
					echo "<li class='bad'> You entered a " . $activity['building'] . " and lost " . abs($activity['gold']) . 
					" golds...  Ouch...  (" . date('F jS Y h:i a', strtotime($activity['created_at'])) . ")</li><br>";
				}
			}
?>
			</ul>
		</div> <!-- close wrapper div-->
	</body>
</html>