<?php
	require_once('auth.php');
	require_once("config.php");
	
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
	
	function check() {
    	//echo 'The First ran successfully.';
		$query = "select * from members where login='".$_SESSION['SESS_LOGIN_ID']."' and flag=1";
		$result = mysql_query($query) or die("can't execute");
		
		if ( mysql_num_rows($result) > 0 ) {
			return 0;
		}
		
		return 1;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>My Profile</title>
<link href="javascript/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
<ul id="saturday">
	<li><a href="member-index.php" class="left">HOME</a></li>
	<li><a href="member-profile.php?i=1" class="current">PROFILE</a></li>
	<li><a href="forum/topiclist.php" class="left">FORUM</a></li>
	<li class="right"><a href="logout.php">LOGOUT</a></li>
</ul>

<br />
<br />

<?php 
	if($_GET['i'] == 1 ) {
		if ($uid == 'admin') {
		$j=3;
		$value="SET CRITERIA";
		echo "<h2> SET CRITERIA </h2>";
		}else{
	    $j=2;
		$value="SEE STATUS";
		echo "<p><a href=\"member-profile.php?i=2\" class=\"home\">" . $value . "</a></p>";
		}
	}else if($_GET['i'] == 2) {
		$j=1;
		$value="SEE PROFILE";
		echo "<p><a href=\"member-profile.php?i=1\" class=\"home\">" . $value . "</a></p>";
	}
?>

<!-- <p><a href="member-profile.php?i=<?php echo $j; ?>" class="home"><?php echo $value; ?></a></p> 

<table border="1" width="402" align="center" bordercolor="#FF0000">
<tr><td>
-->
<table width="200" border="2" align="center" bgcolor="#999966">
<tr><td>
<?php 
	if($j == 2) {
		user_profile();
	}else if($j == 1) {
		status($uid);
	}else if($j == 3) {
		set_criteria();
	}
?>

</td>
</tr></table>
<?php
if($_GET['i'] == 2) {
echo "<br /><br /><br /><br />";
echo "<br /><br /><br /><br />";
echo "<br /><br /><br /><br />";
echo "<br /><br /><br /><br />";
}else{
echo "<br /><br /><br /><br />";
echo "<br /><br /><br /><br />";
}
?>
</div>
</body>
</html>



<?php
	//Connect to mysql server
	function user_profile() {
	$query = "select * from members where member_id='" . $_SESSION['SESS_MEMBER_ID'] . "'";
	$result = mysql_query($query) or die("Can't query1");
	if(mysql_num_rows($result) > 0) {
		$myrow1 = mysql_fetch_array($result);
		$info1 = true;
		$height = 140;
	}
	
	$query = "select * from form_info where user_id in (select login from members where member_id='" . $_SESSION['SESS_MEMBER_ID'] . "')";
	$result = mysql_query($query) or die("Can't query2");
	if(mysql_num_rows($result) > 0) {
		$myrow2 = mysql_fetch_array($result);
		$info2 = true;
		$height = 467;
	}

echo "<table width=\"400\" height=\"" . $height . "\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"4\" bgcolor=\"#CCCCCC\">";

if( $info1 == true ) {

echo "<tr>";
echo "<th width=\"226\"><div align=left>Your First Name :-</div></th>";
echo "<td width=\"105\"><div align=left>" . $myrow1['firstname'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>Your Last Name :-</div></th>";
echo "<td><div align=left>" . $myrow1['lastname'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>Gender :-</div></th>";
echo "<td><div align=left>" . $myrow1['gender'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>Your Age :</div></th>";
echo "<td><div align=left> 20 </div></td>";
echo "</tr>";
}

if( $info2 == true ) {
echo "<tr>";
echo "<th>&nbsp </th>";
echo "<td>&nbsp </td>";
echo "</tr>";
echo "<th><div align=left>Your Qualification :</div></th>";
echo "<td></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>10th Board :</div></th>";
echo "<td><div align=left>" . $myrow2['tenboard'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>10th Passing Year :</div></th>";
echo "<td><div align=left>" . $myrow2['tenyear'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>10th Marks % :</div></th>";
echo "<td><div align=left>" . $myrow2['tenmarks'] ."</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>12th Board :</div></th>";
echo "<td><div align=left>" . $myrow2['tweboard'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>12th Passing Year :</div></th>";
echo "<td><div align=left>" . $myrow2['tweyear'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>12th Marks % :</div></th>";
echo "<td><div align=left>" . $myrow2['twemarks'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>Exam ID :</div></th>";
echo "<td><div align=left>". $myrow1['login'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>Exam Rank :</div></th>";
echo "<td><div align=left>" . $myrow2['score'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th>&nbsp</th>";
echo "<td>&nbsp</td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>Address :</div></th>";
echo "<td><div align=left>" . $myrow2['addr'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>City :</div></th>";
echo "<td><div align=left>" . $myrow2['city'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>State :</div></th>";
echo "<td><div align=left>".$myrow2['state']."</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>Pin :</div></th>";
echo "<td><div align=left>". $myrow2['pin']."</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>Mob. Number :</div></th>";
echo "<td><div align=left>" . $myrow2['mob'] . "</div></td>";
echo "</tr>";
echo "<tr>";
echo "<th><div align=left>Email :</div></th>";
echo "<td><div align=left>" . $myrow2['email'] . "</div></td>";
echo "</tr>";
}
echo "</table>";
}

//////////////////////////////////////////////// function status

function status($uid) {
	if( 0 == check() ) {
	echo "<table width=\"400\" border=\"1\" align=\"center\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#CCCCCC\">";
	$query = "select * from stud_entry where user_id = '$uid' order by entry_no";
	$result = mysql_query($query) or die("can't query to stud_entry 1");
	
	if(mysql_num_rows($result) > 0) {
	echo "<tr>";
	echo "<td>COLLEGE</td>";
	echo "<td>BRANCH</td>";
	echo "<td>SEATS</td>";
	echo "<td>STATUS</td>";
	echo "</tr>";
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
	}
	}else{
	echo "<br><p>You have to  fill up form first";
	}
}

function set_criteria() {

?>
<FORM ACTION="admin-exec.php" METHOD=POST>
<table width="437" border="0" align="center">
		<tr height="32">
            <th width="230">Minimum age: </th>
            <td width="197"><input type="text" name="age" /></td>
        </tr>
		<tr height="32">
            <th width="230">Maximum Rank: </th>
            <td width="197"><input type="text" name="rank" /></td>
        </tr>
		<tr height="32">
            <th width="230">Minimum qualificaton: </th>
            <td width="197">
				<select name="qual">
                <option>Select One</option>
                <option value="10">10</option>
                <option value="12">10+2</option>
                <option value="graduation">btech</option>
				</select>
			 </td>
        </tr>
		<tr height="32">
            <th width="230">Start Date: </th>
            <td width="197">
	    <select name="bdate1">
		<?php
			for ($i=1; $i<32; $i++){
				echo "<option>$i</option>";
			}
		?>
		</select>		
		<select name="bmonth1">
		<?php
			for ($i=1; $i<13; $i++){
				echo "<option>$i</option>";
			}
		?>
		</SELECT>

		<select name="byear1">
		<?php
			for($i=2009; $i<2011; $i++){
				echo "<option>$i</option>";
			}	 
		?>
		</select>
		</td>
        </tr>	
			
		<tr height="32">
            <th width="230">Last Date: </th>
			<td>
		<select name="bdate2">
		<?php
			for ($i=1; $i<32; $i++){
				echo "<option>$i</option>";
			}
		?>
		</select>
		
		<select name="bmonth2">
		<?php
			for ($i=1; $i<13; $i++){
				echo "<option>$i</option>";
			}
		?>
		</SELECT>

		<select name="byear2">
		<?php
			for($i=2009; $i<2011; $i++){
				echo "<option>$i</option>";
			}	 
		?>
		</select>
		</td>
        </tr>
		
		<tr>
	  	<th>Type characters here :</th>
	  	<td><input name="number" type="text"></td>
		</tr>
		<tr>
	  	<th>&nbsp </th>
	  	<td><img src="image verification/random_image_sample.php"></td>
	  	</tr>		
</table>
<p align="center"><input type="submit" /></p>
</FORM>
<?php } ?>
