<?php
session_start();
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
<title>GPL 2015</title>
<link type="text/css" rel="stylesheet" href="stil.css" />
</head>

<body>
<div id="sidan">
<header>
<h1>League system</h1>
</header>
<nav>
<a href="https://cgi.arcada.fi/~tranhung/teams.php">team</a>
<a href="https://cgi.arcada.fi/~tranhung/main.php">main</a>

<a href="https://cgi.arcada.fi/~tranhung/players.php">player</a>

<a href="https://cgi.arcada.fi/~tranhung/games.php">game</a>
<ul>
</ul>
</nav>
<div id="innehall">
<article>
<?php
	$home = $_GET['home'];
    $away = $_GET['away'];
	$date = $_GET['date'];
	$id = $_GET['id'];
print("<h2>Game ".$home." - ".$away."</h2>");
include('dbaccess.php');
$mysqli = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
$mysqli->set_charset('utf8');
if ($mysqli->connect_error) {print("<p>Fail: ".$mysqli->connect_error."</p>");} 
$result = $mysqli->query("SELECT * FROM Stats WHERE date='$date' AND game='$id' ORDER by time ASC;");
if ($mysqli->error) {print("<p>Fail: ".$mysqli->error."</p>");}
if ($result->num_rows == 0) 
    {
    print("<p>Ingen data.</p>");
    }
else
    {
    print("<table border= 1><tr><th>Kill</th><th>Time</th><tr>");
    while($row = $result->fetch_array())
      {
      print("<tr>");
      print("<td>".$row['name']." - ".$row['team']."</td>");
      print("<td>".$row['time']."</td>");
      print("</tr>");
      }
    print("</table>"); 
    }
$mysqli->close();
?>
<form method="post" action="savestat.php?home=
<?print($home);?>&away=<?print($away);?>&date=<?print($date);?>&id=<?print($id);?>">
<select size='1' name='name'><option></option>
<?include('dbaccess.php');
    $mysqli = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
    $mysqli->set_charset('utf8');
    if ($mysqli->connect_error) {print("<p>Fail: ".$mysqli->connect_error."</p>");} 
    $result = $mysqli->query("SELECT *From Players WHERE team='$home' OR team='$away';"); 
if ($mysqli->error) {print("<p>Fail: ".$mysqli->error."</p>");}
if ($result->num_rows == 0) 
    {
    print("<p>Ingen data.</p>");
    }
else
    {
    while($row = $result->fetch_array())
      {
      print("<option value=$row[nickname]>".$row['nickname']." ".$row['team']."</option>");
      }
    }
$mysqli->close();
?>
<input type="text" name="time">
<br/></select>
<input type = "submit" value = "Save score" name="save">
<a href = "games.php">Save match</a> 
</form>
<section>
</section>
</article>
<aside>
</aside>
</div>


</body>

</html>