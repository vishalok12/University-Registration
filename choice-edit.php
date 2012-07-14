<?php
	require_once('auth.php');
	
    //Include database connection details
	require_once ('config.php');

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

	$uid = $_SESSION['SESS_LOGIN_ID'];
?>

<html>
<head>
<title>
College selection procedure.
</title>
<link href="javascript/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="container">
<ul id="saturday">
	<li><a href="member-index.php">HOME</a></li>
	<li><a href="member-profile.php?i=1" class="left" >PROFILE</a></li>
	<li><a href="forum/topiclist.php" class="left">FORUM</a></li>
	<li class="right"><a href="logout.php">LOGOUT</a></li>
</ul>
<br>
<div id="content">
<p align="left" class="tagcloud"><a href="choice-enter.php">GO BACK</a></p>
</div>
<br>
<?php
/////////////////////////////////////////////////////////////////
if( isset($_POST['submit1']) && isset($_POST['checkit']) ) {
	$myrow = $_POST['checkit'];
	$i = sizeof($myrow);
	while($i > 0) {
		$i = $i-1;
		$id = $myrow[$i];
		
		$query = "select entry_no from stud_entry where id='$id'";
		$result = mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($result) > 0) {
			$myrow1 = mysql_fetch_array($result);
			$myentry = $myrow1['entry_no'];
		}
		$query = "update stud_entry set entry_no=entry_no-1 where entry_no>'$myentry' and user_id='$uid'";
		$result = mysql_query($query) or die(mysql_error());
		
		$query = "delete from stud_entry where id='$id' and user_id='$uid'";
		$result = mysql_query($query) or die("can't delete");
		

	}
}

print "<form method=\"post\" action= \"$_SERVER[PHP_SELF]\">";
echo "<table width=\"700\" border=\"0\" align=\"center\" cellpadding=\"1\" cellspacing=\"0\">";

  $query = "select * from stud_entry where user_id = '$uid' order by entry_no";
  $result = mysql_query($query) or die("can't query to stud_entry");
  if(mysql_num_rows($result) == 0) {
	  echo "NOT YET ENTERED A SINGLE";
  }else{
  $count = 1;
  
  echo "<tr>";
  echo "<td style=\"border-bottom:dashed\">NO.</td>";
  echo "<td style=\"border-bottom:dashed\"> COLLEGE NAME </td>";
  echo "<td style=\"border-bottom:dashed\">BRANCH NAME </td>";
 
  echo "<td></td>";
  echo "<td></td>";
  echo "</tr>";
  while( $myrow = mysql_fetch_array($result) ) {
	  echo "<tr>";
	  
	  echo "<td>";
	  echo $count;
	  echo "</td>";
	 
	  echo "<td>";
		  echo $myrow['collname'];
	  echo "</td>";
	  
	  echo "<td>";
		  echo $myrow['branchname'];
	  echo "</td>";
	  
	  echo "<td>";
	  $id = $myrow['id'];
	  echo "<INPUT TYPE='CHECKBOX' NAME='checkit[]' VALUE=\"".$id."\"></INPUT>";
	  echo "</td>";
	  
	  echo "<td width=\"50\">";
	  echo "<INPUT type=\"button\" value=\"MOVE UP\" name=\"button5\" onClick=\"window.location='choice-edit_exec.php?id=" . $id . "'\">";
	  echo "</td>";
      
	  echo "<td>";
	  echo "<INPUT type=\"button\" value=\"MOVE DOWN\" name=\"button6\" onClick=\"window.location='choice-edit_exec1.php?id=" . $id ."'\">";
	  echo "</td>";
      
	  echo "</tr>";

	  $count ++;
  }
  echo "<tr>";
  echo "<td>&nbsp</td>";
  echo "<td>&nbsp</td>";
  echo "<td>&nbsp</td>";

  echo "<td><input type=\"submit\" name=\"submit1\" value=\"DELETE\"/></td>";
  echo "</tr>";
  }
echo "</table>";
echo "</form>";
?>

<br><br>
<br><br>
</div>
</body>
</html>