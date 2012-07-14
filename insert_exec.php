<?php
 //Start session
 session_start();
 
 require_once('config.php');

 //Array to store validation errors
 $errmsg_arr = array();

 //Validation error flag
 $errflag = false;

 // open the connection
 $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
 if(!$link) {
	die('Failed to connect to server: ' . mysql_error());
 }
 
 // pick the database to use
 $db = mysql_select_db(DB_DATABASE);
 if(!$db) {
	die("Unable to select database");
 }
 
 $userid = $_SESSION['SESS_LOGIN_ID'];
 $address = $_POST["address"];
 $city = $_POST["city"];
 $state = $_POST["state"];
 $pin = $_POST["pin"];
 $mobile = $_POST["mobile"];
 $email = $_POST["email"];
 $board10 = $_POST["Board"];
 $Q_year10 = $_POST["Q_year10"];
 $percent10 = $_POST["percent10"];
 $board12 = $_POST["Board12"];
 $Q_year12 = $_POST["Q_year12"];
 $percent12 = $_POST["percent12"];
 $score = $_POST["Score"];

 //Input Validations
 if($address == '') {
		$errmsg_arr[] = 'address missing';
		$errflag = true;
 }

 if($city == 'Select One') {
		$errmsg_arr[] = 'city name missing';
		$errflag = true;
 }

 if($state == 'select one') {
		$errmsg_arr[] = 'state name missing';
		$errflag = true;
 }

 if($pin == '') {
		$errmsg_arr[] = 'pin/zip code missing';
		$errflag = true;
 }

 if($mobile == '') {
		$errmsg_arr[] = 'mob. no. missing';
		$errflag = true;
 }

 if($email == '') {
		$errmsg_arr[] = 'email id missing';
		$errflag = true;
 }

 if($board10 == 'Select One') {
		$errmsg_arr[] = 'tenth board is missing';
		$errflag = true;
 }

 if($percent10 == '') {
		$errmsg_arr[] = 'tenth marks percentage missing';
		$errflag = true;
 }

 if($board12 == 'Select One') {
		$errmsg_arr[] = 'twelve board is missing';
		$errflag = true;
 }

 if($percent12 == '') {
		$errmsg_arr[] = 'twelve marks percentage missing';
		$errflag = true;
 }

  if($score == '') {
		$errmsg_arr[] = 'Exam score is missing';
		$errflag = true;
 }

 //if( (($month%2) == 0 && ($month < 8) && ($date == 31)) || (($month%2 != 0) && ($date == 31) && ($month > 8)) || (($date > 29) && ($month == 2)) )

/* if($_SESSION['SESS_MEMBER_ID'] == '') {
		$errmsg_arr[] = 'You already submitted';
		$errflag = true;
 }
*/

 if($score != ''){
	$sql = "select * from form_info where score=" . $score;
	//print $sql;
 
	$result = mysql_query($sql, $link) or die("can't compare score");
	if (mysql_num_rows($result) > 0) {
		$errmsg_arr[] = 'score already exists';
		$errflag = true;
	}
 }
 //If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: insert_form.php");
		exit();
	}

 //Create INSERT query
 $sql = "INSERT INTO form_info values ('$userid', '$address', '$city', '$state', '$pin', '$mobile', '$email', '$board10', '$Q_year10', '$percent10', '$board12', 'Q_year12', '$percent12', '$score')";
 // execute the SQL statement
 $result = mysql_query($sql, $link) or die(mysql_error());
 $sql = "update members set flag=1 where login='". $userid . "'";
 $result = mysql_query($sql, $link) or die("can't enter flag");
/* $sql = "SELECT * FROM form_info";
 $result = mysql_query($sql, $conn) or die("can't display");
 $result_info = mysql_fetch_array($result);
 $f_name = stripslashes($result_info['gender']);
 $l_name = $result_info['city'];
 */

header("location: insert_form_success.php");
exit();
?>
