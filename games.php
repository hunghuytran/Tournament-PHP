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
<h2> Games </h2>
<?php
include('dbaccess.php');
$mysqli = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
$mysqli->set_charset('utf8');
if ($mysqli->connect_error) {print("<p>Fail: ".$mysqli->connect_error."</p>");} 
$result = $mysqli->query("SELECT * FROM Games;");
if ($mysqli->error) {print("<p>Fail: ".$mysqli->error."</p>");}
if ($result->num_rows == 0) 
    {
    print("<p>Ingen data.</p>");
    }
else
    {
    print("<table border= 1><tr><th>Date</th><th>Time</th><th>Result</th><th>Stats</th><tr>");
    while($row = $result->fetch_array())
      {
	$away = $row['away'];
	$home = $row['home'];
	$date = $row['date'];
	$id = $row['id'];
      print("<tr>");
      print("<td>".$row['date']."</td>");
      print("<td>".$row['time']."</td>");
	  print("<td>".$row['home']." - ".$row['away']."");
	 
	 $result2 = $mysqli->query("SELECT COUNT(*) AS score FROM Stats WHERE game='$id' AND team='$home';");
	  if ($result2->num_rows == 0) 
    {
    print("<p>Ingen data.</p>");
    }
else
    {
    while($row2 = $result2->fetch_array())
      {
      print(" :".$row2['score']." - ");
	 } 
    }
	 $result3 = $mysqli->query("SELECT COUNT(*) AS score FROM Stats WHERE game='$id' AND team='$away';");
	  if ($result3->num_rows == 0) 
    {
    print("<p>Ingen data.</p>");
    }
else
    {
    while($row3 = $result3->fetch_array())
      {
      print($row3['score']);
	 } 
    }
	  print("<td><a href='stats.php?home=".$row['home']."&away=".$row['away']."&date=".$row['date']."&id=".$row['id']."'>Stats</a>");
      print("</tr>");
      }
    print("</table>"); 
    }

$mysqli->close();
?>
<a href = "newgame.php?">New game</a> 
<section>
</section>
</article>
<aside>
</aside>
</div>


</body>

</html>