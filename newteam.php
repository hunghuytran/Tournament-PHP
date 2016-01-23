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
<h2> New Team </h2>
<form method="post" action="saveteam.php">
<p>Team name</p><input type="text" name="team">
<p>Country</p><input type="text" name="country">
<input type = "submit" value = "Save" name="save">
</form>
<section>
</section>
</article>
<aside>
</aside>
</div>


</body>

</html>