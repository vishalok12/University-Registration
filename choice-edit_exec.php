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
	
	$query = "select * from stud_entry where id=".$_GET['id'];
	//print $query;echo "<br />";
	$result = mysql_query($query) or die("can't query1");
	$myrow = mysql_fetch_array($result);
	$entry_no = $myrow['entry_no'];
	
	if($entry_no > 1) {
	$i = $entry_no - 1;

	$query = "UPDATE stud_entry set entry_no=".$entry_no." where user_id='".$uid."'and entry_no=".$i;
	//print $query;echo "<br />";
	$result = mysql_query($query) or die(mysql_error());

	$query = "UPDATE stud_entry set entry_no=".$i." where id='".$_GET['id']."'";
	$result = mysql_query($query) or die("can't query2");
	}

	header("location: choice-edit.php");
	//print $entry_no;
?>
