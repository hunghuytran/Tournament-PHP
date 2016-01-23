<?
    include('dbaccess.php');
    $mysqli = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
    $mysqli->set_charset('utf8');
    if ($mysqli->connect_error) {print("<p>Fail: ".$mysqli->connect_error."</p>");} 
    $name = $_REQUEST['name'];
    $time = $_REQUEST['time'];
	$home = $_GET['home'];     
    $away = $_GET['away'];
	$date = $_GET['date'];
    $id = $_GET['id'];
    	$result2 = $mysqli->query("SELECT * FROM Players WHERE nickname='$name';");
if ($mysqli->error) {print("<p>FAIL: ".$mysqli->error."</p>");}
if ($result2->num_rows == 0) 
    {
    print("<p>FAIL</p>");
    }
else
    {
    while($row = $result2->fetch_array())
      {
		  $team=$row['team'];
    }
    }
	$result = $mysqli->query("INSERT INTO Stats (name, time, team, date, game) 
    VALUES ('$name','$time','$team','$date', '$id');");
    if ($mysqli->error) {print("<p>Fail: ".$mysqli->error."</p>");}
    if ($mysqli->affected_rows == 0) 
        {
        print("<p>Ingen data.</p>");
        }
    else
        {
		print("Fail.");
        }
	header("Location: https://cgi.arcada.fi/~tranhung/newstat.php?home=".$home."&away=".$away."&date=".$date."&id=".$id."&team=".$team."");
    $mysqli->close();
?>