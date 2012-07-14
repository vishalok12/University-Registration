<?php
	//Start session
	session_start();
	
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
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$collname = clean($_POST['collname']);
	$cse = clean($_POST['cse']);
	
	//Input Validations
	/*
	if($fname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	*/
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: college-list-entry.php?e=1");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO college_info(collname, CSE, ECE, MEC, IT, CIV) VALUES('collname', '$cse','$ece', '$mec', '$it', '$civ')";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: college-list-entry.php?e=0");
		exit();
	}else {
		die("Query failed");
	}
?>
