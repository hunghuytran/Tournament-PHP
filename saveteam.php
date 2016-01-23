<?
    $team = $_REQUEST['team'];
    $country = $_REQUEST['country'];
    include('dbaccess.php');
    $mysqli = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
    $mysqli->set_charset('utf8');
    if ($mysqli->connect_error) {print("<p>Fail: ".$mysqli->connect_error."</p>");} 
    $result = $mysqli->query("INSERT INTO Teams (name, country) 
    VALUES ('$team','$country');");
	header("Location: https://cgi.arcada.fi/~tranhung/teams.php");
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