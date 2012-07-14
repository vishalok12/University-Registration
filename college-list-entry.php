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
<?php
college_entry();
?>
<br />
</div>
</body>
</html>

<?php
function college_entry()
{
?>
	<FORM ACTION="college-list-entry-exec.php" METHOD=POST>
     <font color=#867F7F size=4pt>COLLEGE ADMISSION SELECTION
     </font><br>
    <br>
    <br>
	
    <table width="200" border="2" align="center" bgcolor="#999966">
      <tr>
        <td><table width="437" border="0" align="center">
          <tr>
            <th width="230">Enter College Name : </th>
            <td width="197"><input type="text" name="collname" size="30" /></td>
          </tr>
          <tr>
            <th>&nbsp;</th>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <th width="230">Branches : </th>
            <td width="197">
			<table>
			<tr><td><input type="checkbox" name="branch" size="30" /></td>
			<td>CSE</td>
			<tr><td><input type="checkbox" name="branch" size="30" /></td>
			<td>ECE</td>
			<tr><td><input type="checkbox" name="branch" size="30" /></td>
			<td>MEC</td>
			<tr><td><input type="checkbox" name="branch" size="30" /></td>
			<td>IT</td>
			<tr><td><input type="checkbox" name="branch" size="30" /></td>
			<td>CIV</td>
			
			</tr></table>
			</td>
          </tr>
		  <tr>
            <th>Catagory :</th>
            <td>
			<select name="gender">
			<option>Male</option>
			<option>Female</option>
			<option selected="selected">All</option>
			</select>
			</td>
          </tr>
		  </table>
		  <input name="submit" type="submit" align="middle" />
		  </td></tr>
		  </table>
		  </FORM>
		  
<?php } ?>
