<?php
	require_once('auth.php');
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
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
	
	function check(){
    	//echo 'The First ran successfully.';
		$query = "select * from members where login='".$_SESSION['SESS_LOGIN_ID']."' and flag=1";
		$result = mysql_query($query) or die("can't execute");
		
		if ( mysql_num_rows($result) > 0 ) {
			echo "<p><a href=\"choice-enter.php\">Go Here to enter your choice.</a><p>";
		}else{
		    echo "<p><a href=\"insert_form.php\">Click here</a> to enter further information. </p>";
		}
	}
	
	function student_list(){
		echo "<br /><h2> List of Applicants </h2>";
		//prints all the students id registered yet
		$query = "select * from form_info where user_id!='".$_SESSION['SESS_LOGIN_ID']."'";
		$result = mysql_query($query) or die("can't execute1");
		
		if(mysql_num_rows($result) > 0) {
			print "<table width=\"350\" border=\"1\" align=\"center\" bgcolor=\"#999966\" cellspacing=\"10\" cellpadding=\"10\">";
      		$count = 1;
			
			while( $myrow = mysql_fetch_array($result) ) {
				echo "<tr height=30>";
				echo "<td>";
				print $count;
				echo "</td>";
				
				echo "<td>";
				echo "<a href=\"member-index.php?id=" . $myrow['user_id'] . "\">";
				print $myrow['user_id'];
				echo "</a>";
				echo "</td>";
				
				echo "<td>";
				print $myrow['score']."\n";
				echo "</td>";
				
				echo "<td>";
				print $myrow['email']."\n";
				echo "</td>";
				
				echo "</tr>";
				
				$count = $count + 1;
			}
			print "</table>";
		}
	}
	
	function college_list($id) {
		print "<br/><h2>" . $id . "'s Selection :</h2>";
		
		
		////////////////////////////////////////////////////////////////////
		
	print "<table width=\"385\" border=\"1\" align=\"center\" bgcolor=\"#999966\" cellspacing=\"5\" cellpadding=\"2\">";
	$query = "select * from stud_entry where user_id = '$id' order by entry_no";
	$result = mysql_query($query) or die("can't query to stud_entry 1");
	
	if(mysql_num_rows($result) > 0) {
	echo "<tr height=30>";
	echo "<th bgcolor=#990000>NO.</th>";
	echo "<th bgcolor=#990000>COLLEGE</th>";
	echo "<th bgcolor=#990000>BRANCH</th>";
	echo "</tr>";
	$count = 1;
	while( $myrow = mysql_fetch_array($result) ) {		
		$mystatus = 1;
		$collname = $myrow['collname'];
		$branchname = $myrow['branchname'];
		
		echo "<tr>";
		echo "<td>";
		echo $count;
		echo "</td>";
		
		echo "<td>";
		echo $collname;
		echo "</td>";
		
		echo "<td>";
		echo $branchname;
		echo "</td>";		
		echo "</tr>";
		
		$count ++;
	}
	echo "</table>";
	}else{
		echo "<p>Not Yet Selected<p>";
	}
	
	/////////////////////////////////////////////////////////////////////////
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Member Index</title>
<!--<link href="loginmodule.css" rel="stylesheet" type="text/css" />-->
<link href="javascript/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function unreg()
{
r = confirm("Are you Sure");

if (r == true) {
top.window.location.href = "unregister.php";
}
}
</script>
</head>
<body>
<div class="container">

<ul id="saturday">
	<li><a href="member-index.php" class="current">HOME</a></li>
	<li><a href="member-profile.php?i=1" class="left" >PROFILE</a></li>
	<li><a href="forum/topiclist.php" class="left">FORUM</a></li>
	<li class="right"><a href="logout.php">LOGOUT</a></li>
	<li class="right"><a href="javascript:void(0)" onclick="unreg()">DELETE ACCOUNT</a></li>
</ul>
<div class="loginbar1">
<!-- <a href="member-index.php">Home</a> | <a href="member-profile.php?i=1">Profile</a> | <a href="logout.php">Log Out</a> -->
</div>

<br />
<p align="right"> last login : <?php echo $_SESSION['SESS_LAST_LOGIN']; ?></p>
<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
<?php
if ($_SESSION['SESS_LOGIN_ID'] == 'admin') {
student_list();
echo "<hr />";

if (isset($_GET['id'])) {
college_list($_GET['id']);
}
}else{
check();
}

?>
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />

</div>
</body>
</html>
