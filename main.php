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
<h1> TOP 7</h1>
<h2> Team Leaderboard </h2>
<?php
include('dbaccess.php');
$mysqli = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
$mysqli->set_charset('utf8');
if ($mysqli->connect_error) {print("<p>Fail: ".$mysqli->connect_error."</p>");} 
$result = $mysqli->query("SELECT Teams.name,  Count(Stats.team)*5 AS count
  FROM Teams LEFT JOIN Stats
    ON Teams.name = Stats.team
 GROUP BY Teams.name ORDER by count DESC LIMIT 7;");
if ($mysqli->error) {print("<p>Fail: ".$mysqli->error."</p>");}
if ($result->num_rows == 0) 
    {
    print("<p>Ingen data.</p>");
    }
else
    {
    print("<table border= 1><tr><th>Rank</th><th>Team</th><th>Points based on kills</th><tr>");
    while($row = $result->fetch_array())
      {
      print("<tr>");
$rank++;	   	 
		 print("<td>".$rank."</td>");
      print("<td>".$row['name']."</td>");
	       print("<td>".$row['count']."</td>");
      print("</tr>");
      }
    print("</table>"); 
    }
$mysqli->close();
?>

<h2>Player Most Kills</h2>
<?php
include('dbaccess.php');
$mysqli = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
$mysqli->set_charset('utf8');
if ($mysqli->connect_error) {print("<p>Fail: ".$mysqli->connect_error."</p>");} 
$result = $mysqli->query("SELECT Players.nickname, Players.team, Count(Stats.team) AS count
  FROM Players LEFT JOIN Stats
    ON Players.nickname = Stats.name
 GROUP BY Players.nickname ORDER by count DESC
 LIMIT 7;");
if ($mysqli->error) {print("<p>Fail: ".$mysqli->error."</p>");}
if ($result->num_rows == 0) 
    {
    print("<p>Ingen data.</p>");
    }
else
    {
    print("<table border= 1><tr><th>Rank</th><th>Player</th><th>Kills</th><tr>");
    while($row = $result->fetch_array())
      {
      print("<tr>");
	   $rank2++;	   	 
		 print("<td>".$rank2."</td>");
      print("<td>".$row['nickname']." ".$row['team']."</td>");
	       print("<td>".$row['count']."</td>");
      print("</tr>");
      }
    print("</table>"); 
    }
$mysqli->close();
?>
<section>
</section>
</article>
<aside>
</aside>
</div>


</body>

</html>