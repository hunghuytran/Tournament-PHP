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
<h2> Teams </h2>
<?php
include('dbaccess.php');
$mysqli = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);
$mysqli->set_charset('utf8');
if ($mysqli->connect_error) {print("<p>Fail: ".$mysqli->connect_error."</p>");} 
$result = $mysqli->query("SELECT * FROM Teams;");
if ($mysqli->error) {print("<p>Fail: ".$mysqli->error."</p>");}
if ($result->num_rows == 0) 
    {
    print("<p>Ingen data.</p>");
    }
else
    {
    print("<table border= 1><tr><th>Team name</th><th>Country</th><tr>");
    while($row = $result->fetch_array())
      {
      print("<tr>");
      print("<td>".$row['name']."</td>");
      print("<td>".$row['country']."</td>");
      print("</tr>");
      }
    print("</table>"); 
    }
$mysqli->close();
?>
<a href = "newteam.php">New team</a> 
<section>
</section>
</article>
<aside>
</aside>
</div>


</body>

</html>