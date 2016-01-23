<?
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
	$home = $_REQUEST['home'];
    $away = $_REQUEST['away'];
	include('dbaccess.php');
    $mysqli = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
    $mysqli->set_charset('utf8');
	if ($mysqli->connect_error) {print("<p>Fail: ".$mysqli->connect_error."</p>");} 
    $result = $mysqli->query("INSERT INTO Games (date, time, home, away) 
    VALUES ('$date','$time','$home','$away');");
    if ($mysqli->error) {print("<p>Fail: ".$mysqli->error."</p>");}
    if ($mysqli->affected_rows == 0) 
        {
        print("<p>Ingen data.</p>");
        }
    else
        {
		print("Fail.");
        }
$gameid = $mysqli->query("SELECT * FROM Games WHERE date='$date' AND home='$home' AND away='$away';");
if ($mysqli->error) {print("<p>FAIL: ".$mysqli->error."</p>");}
if ($gameid->num_rows == 0) 
    {
    print("<p>FAIL</p>");
    }
else
    {
    while($row = $gameid->fetch_array())
      {
		  $id=$row['id'];
    }
    }
		header("Location: https://cgi.arcada.fi/~tranhung/newstat.php?home=".$home."&away=".$away."&date=".$date."&id=".$id."");
    $mysqli->close();
?>