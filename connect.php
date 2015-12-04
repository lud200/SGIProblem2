<html>
<form action="connect.php" method="post">
PlayerID:<input type="text" name="playerid" id = "playerid"><br><br>
Name:<input type="text" name="playerName" id = "playerName"><br><br>
Credits:<input type="text" name="Credits" id = "Credits"><br><br>
LifetimeSpins:<input type="text" name="LifetimeSpins" id = "LifetimeSpins"><br><br>
SaltValue:<input type="text" name="SaltValue" id = "SaltValue"><br><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php

$link = mysqli_connect("localhost", "root", "", "mysql");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

if($_POST){
	if(isset($_POST['playerid'])){
		$playerID = $_POST['playerid'];
	}
	if(isset($_POST['playerName'])){
		$name = $_POST['playerName'];
	}
	if(isset($_POST['Credits'])){
		$credits = $_POST['Credits'];
	}
	if(isset($_POST['LifetimeSpins'])){
		$lifetimespins = $_POST['LifetimeSpins'];
	}
	if(isset($_POST['SaltValue'])){
		$saltValue = $_POST['SaltValue'];
	}	
	$players = "SELECT PlayerID FROM  player where playerID = '$playerID'";
	$findPlayers = mysqli_query($link,$players);
	if($findPlayers->num_rows>0){
		echo "Row already exists in the database";
	}
	else{
		$sql = "INSERT INTO player(PlayerID, Name, Credits, LifetimeSpins,SaltValue) 
				VALUES ('$playerID', '$name', $credits, $lifetimespins, $saltValue)";
		if(mysqli_query($link, $sql)){
   	 		echo "Records added successfully.";
		} else{
   	 		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	$query = "SELECT PlayerID, Name, Credits, LifetimeSpins, (Credits/LifetimeSpins) as life_time_avg_return
 				FROM player WHERE PlayerID = '$playerID'";
 	$result = mysqli_query($link, $query);
 	$emptyarray = array();
 	while($row =mysqli_fetch_assoc($result))
    {
        $emptyarray[] = $row;
    }

    $fp = fopen('data.json', 'w');
    fwrite($fp, json_encode($emptyarray, JSON_PRETTY_PRINT));
    fclose($fp);
	// Close connection
	mysqli_close($link);
}
?>
</html>