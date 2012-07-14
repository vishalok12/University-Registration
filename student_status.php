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
	echo "<h2 align=\"center\"> YOUR STATUS </h2>";
	echo "<br />";
	echo "<table width=\"400\" border=\"1\" align=\"center\" cellpadding=\"1\" cellspacing=\"0\">";
	$query = "select * from stud_entry where user_id = '$uid' order by entry_no";
	$result = mysql_query($query) or die("can't query to stud_entry1");

	while( $myrow = mysql_fetch_array($result) ) {		
		$mystatus = 1;
		$collname = $myrow['collname'];
		$branchname = $myrow['branchname'];
		
		echo "<tr>";
		echo "<td>";
		echo $collname;
		echo "</td>";
		
		echo "<td>";
		echo $branchname;
		echo "</td>";
		
		echo "<td>";
		$query = "select * from college_info where collname='$collname'";
		$result1 = mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($result) > 0) {
		$myrow1 = mysql_fetch_array($result1);
		$seat = $myrow1["$branchname"];
		echo $seat;
		}else{
		echo "seats";
		}
		echo "</td>";
		
		$query = "select score from form_info where user_id='" . $uid . "'";
		$result1 = mysql_query($query) or die("can't query to stud_entry2");
		if (mysql_num_rows($result1) == 1) {
			$myrow1 = mysql_fetch_array($result1);
			$myrank = $myrow1['score'];
		}else{
			print "more than one users exists or no one exists";
		}
		
		$query = "select score from form_info where user_id in (select user_id from stud_entry where collname='$collname' and branchname='$branchname' and user_id !='" . $uid . "')";
		$result2 = mysql_query($query) or die("can't query to stud_entry2");
		while ( ( mysql_num_rows($result2) > 0 ) && ( $myrow1 = mysql_fetch_array($result2) ) ) {

			if ( $myrank > $myrow1['score'] ) {
				$mystatus = $mystatus+1;
			}
		}
		
		echo "<td>";
		print $mystatus;
		echo "</td>";
		
		echo "</tr>";
	}
	
	echo "</table>";

?>
