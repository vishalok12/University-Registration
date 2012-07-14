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

	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
	unset($_SESSION['SESS_LOGIN_ID']);
	unset($_SESSION['SESS_LAST_LOGIN']);
	
	$query = "delete from stud_entry where user_id='$uid'";
	$result = mysql_query($query) or die("can't delete stud_entry entry");
	
	$query = "delete from members where login='$uid'";
	$result = mysql_query($query) or die("can't delete members entry");
	
	$query = "delete from form_info where user_id='$uid'";
	$result = mysql_query($query) or die("can't delete form_info entry");
	
	header("location: unregister-success.php");
?>
