<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	$errval_arr = array();
	
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
	$errval_arr[] = $fname = clean($_POST['fname']);
	$errval_arr[] = $lname = clean($_POST['lname']);
	$errval_arr[] = $gender = $_POST['gender'];
	$errval_arr[] = $date = clean($_POST['bdate']);
	$errval_arr[] = $month = clean($_POST['bmonth']);
	$errval_arr[] = $year = clean($_POST['byear']);
	$dob = $year."-".$month."-".$date;
	$errval_arr[] = $login = clean($_POST['login']);
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
	$number = $_POST['number'];

	//Input Validations
	if($number != $_SESSION['image_value']) {
		//print $number . " " . $_SESSION['image_value'];
		$errmsg_arr[] = 'Validation string not valid! Please try again!';
		$errflag = true;
	}
	if($fname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	if($lname == '') {
		$errmsg_arr[] = 'Last name missing';
		$errflag = true;
	}
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	if( (($month%2) == 0 && ($month < 8) && ($date == 31)) || (($month%2 != 0) && ($date == 31) && ($month > 8)) || (($date > 29) && ($month == 2)) ) {
		$errmsg_arr[] = 'date is not valid';
		$errflag = true;
	}
	
	//Check for duplicate login ID
	if($login != '') {
		$qry = "SELECT * FROM members WHERE login='$login'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Login ID already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		$_SESSION['ERRVAL_ARR'] = $errval_arr;
		session_write_close();
		header("location: register-form.php");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO members(firstname, lastname, gender, dob, login, passwd, lastlog) VALUES('$fname','$lname', '$gender', '$dob', '$login', '".md5($_POST['password'])."', NOW())";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: register-success.php");
		exit();
	}else {
		die("Query failed");
	}
?>