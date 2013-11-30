<?php 
	require("connection.php");
	session_start();

	//buildings
	if(isset($_POST['building']))
	{
		$building = $_POST['building'];
		$gold = $_SESSION['gold'];
		if($building == 'farm')
		{
			$int = rand(10, 20);
			$gold += $int;
		}
		if($building == 'cave')
		{
			$int = rand(5, 10);
			$gold += $int;
		}
		if($building == 'house')
		{
			$int = rand(2, 5);
			$gold += $int;
		}
		if($building == 'casino')
		{
			//random
			// $int = rand(-50, 50);
			//weighted
			$int = rand(-100, 50);
			if($int>=-100 and $int<-50)
			{
				$int=round($int/2);
			}
			$gold += $int;
		}

		$query = "INSERT INTO activities (building, gold, created_at) VALUES ('{$building}', '{$int}', NOW())";
		mysql_query($query);

		$_SESSION['gold'] = $gold;
		header("location: ninja.php");
	}

	//start over
	if(isset($_POST['start-over-submit']))
	{
		start_over();
		header("location: ninja.php");
	}	
?>