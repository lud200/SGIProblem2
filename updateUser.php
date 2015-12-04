<html>
<form action="updateUser.php" method="post">
PlayerID:<input type="text" name="playerid" id = "playerid"><br><br>
betAmount:<input type="text" name="betAmount" id = "betAmount"><br><br>

<input type="radio" name="Credits" id="Credits" value=1>CreditsWon<br>
<input type="radio" name="Credits" id="Credits" value=-1>CreditsLost<br><br>

<input type="radio" name="spin" id="spin" value=1>Spin<br>
<input type="radio" name="spin" id="spin" value=0>noSpin<br>
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
	if(isset($_POST['betAmount'])){
		$betamount = $_POST['betAmount'];
	}
	if(isset($_POST['Credits'])){
		$credits = $_POST['Credits'];
	}
	if(isset($_POST['spin'])){
		$radio = $_POST['spin'];
	}
	$players = "SELECT PlayerID FROM  player where playerID = '$playerID'";
	$findPlayers = mysqli_query($link,$players);	
	if($findPlayers->num_rows>0){
		$sql = "UPDATE player SET Credits = Credits+('$betamount'*'$credits')-'$radio', LifetimeSpins = LifetimeSpins+1 WHERE playerID = '$playerID'";
		mysqli_query($link, $sql);
		echo "Row Updated";
	}
	else{
		echo "Row does not exist in the database";
	}
	$query = "SELECT PlayerID, Name, Credits, LifetimeSpins, (Credits/LifetimeSpins) as life_time_avg_return
  			FROM player where playerID = '$playerID'";
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