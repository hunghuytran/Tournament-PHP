<?
  include('dbaccess.php');
    $mysqli = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
    $mysqli->set_charset('utf8');
    if ($mysqli->connect_error) {print("<p>Fail: ".$mysqli->connect_error."</p>");} 
    $playerid = $_REQUEST['playerid'];
    $name = $_REQUEST['name'];
    $role = $_REQUEST['role'];
    $team = $_REQUEST['team'];
	$new = $mysqli->query("SELECT * FROM Teams WHERE name='$team' ;");
if ($mysqli->error) {print("<p>FAIL: ".$mysqli->error."</p>");}
if ($new->num_rows == 0) 
    {
    print("<p>FAIL</p>");
    }
else
    {
    while($row = $new->fetch_array())
      {
		  $teamid=$row['id'];
    }
    }
	$result = $mysqli->query("INSERT INTO Players (nickname, name, role, team, teamid) 
    VALUES ('$playerid','$name','$role','$team', '$teamid');");
	header("Location: https://cgi.arcada.fi/~tranhung/players.php");
    if ($mysqli->error) {print("<p>Fail: ".$mysqli->error."</p>");}
    if ($mysqli->affected_rows == 0) 
        {
        print("<p>Ingen data.</p>");
        }
    else
        {
		print("Fail.");
        }
		
    $mysqli->close();
?>