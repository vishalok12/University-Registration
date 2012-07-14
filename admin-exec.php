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
	$age = clean($_POST['age']);
	$rank = clean($_POST['rank']);
	$qual = $_POST['qual'];
	$date1 = clean($_POST['bdate1']);
	$month1 = clean($_POST['bmonth1']);
	$year1 = clean($_POST['byear1']);
	$date2 = clean($_POST['bdate2']);
	$month2 = clean($_POST['bmonth2']);
	$year2 = clean($_POST['byear2']);
	$sdate = $year1."-".$month1."-".$date1;
	$ldate = $year2."-".$month2."-".$date2;
	$number = $_POST['number'];
	
	//Input Validations
	/*
	if($fname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	*/
	if($number != $_SESSION['image_value']) {
		//print $number . " " . $_SESSION['image_value'];
		$errmsg_arr[] = 'Validation string not valid! Please try again!';
		$errflag = true;
	}
	if( (($month1%2) == 0 && ($month1 < 8) && ($date1 == 31)) || (($month1%2 != 0) && ($date1 == 31) && ($month1 > 8)) || (($date1 > 29) && ($month1 == 2)) ) {
		$errmsg_arr[] = 'start date is not valid';
		$errflag = true;
	}
	
	if( (($month2%2) == 0 && ($month2 < 8) && ($date2 == 31)) || (($month2%2 != 0) && ($date2 == 31) && ($month2 > 8)) || (($date2 > 29) && ($month2 == 2)) ) {
		$errmsg_arr[] = 'last date is not valid';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: member-profile.php?i=1");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO criteria(age, rank, qual, sdate, ldate) VALUES('$age','$rank', '$qual', '$sdate', '$ldate')";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: member-index.php");
		exit();
	}else {
		die("Query failed");
	}
?>
