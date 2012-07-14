<?php
	require_once('auth.php');
?>
<html>
<head>
<title>COLLEGE INFO</title>
<link href="javascript/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
<ul id="saturday">
	<li><a href="member-index.php" class="home">HOME</a></li>
	<li><a href="member-profile.php?i=1" class="about">PROFILE</a></li>
	<li><a href="forum/topiclist.php" class="about">FORUM</a></li>
	<li><a href="logout.php" class="rss">LOGOUT</a></li>
</ul>
<?php
switch($_GET['college']) {
case "IIITA":
	echo "<p> hello IIITA. </p>";
	break;
case "NIT PATNA":
	echo "<p> hello NIT PATNA. </p>";
	break;
case "NITA":
	echo "<p> hello NITA. </p>";
	break;
case "NITC":
	echo "<p> hello NITC. </p>";
	break;
case "NITK":
	echo "<p> hello NITK. </p>";
	break;

}
?>
</div>
</body>
</html>
