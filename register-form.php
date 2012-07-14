<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body background="images/body-background.gif">
<?php
	if( isset($_SESSION['ERRVAL_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		$val = $_SESSION['ERRVAL_ARR'];
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>';
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
			
?>
<table width="329" height="379" border="2" align="center" bgcolor="#CCCCCC">
<tr>
<td width="303" bgcolor="#CC6600"><h1>Form Registeration</h1></td>
</tr>
<tr>
<td>
<form id="loginForm" name="loginForm" method="post" action="register-exec.php">
  <table width="325" height="375" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#999966">
    <tr>
      <th>First Name </th>
      <td><input name="fname" type="text" class="textfield" id="fname" <?php if( isset($_SESSION['ERRVAL_ARR']) ) {echo 'value='.$val[0];} ?> /></td>
    </tr>
    <tr>
      <th>Last Name </th>
      <td><input name="lname" type="text" class="textfield" id="lname" <?php if( isset($_SESSION['ERRVAL_ARR']) )        { echo          'value='.$val[1];} ?> /></td>
    </tr>
    <tr>
	<tr>
      <th>Gender </th>
      <td>
	  <?php
	  if( isset($_SESSION['ERRVAL_ARR']) && $val[2] == 'Male') {
	  $m = "selected=\"selected\"";
	  $f = "";
	  }else if( isset($_SESSION['ERRVAL_ARR']) ){
	  $m = "";
	  $f = "selected=\"selected\"";
	  }else{
	  $m = "";
	  $f = "";
	  } ?>
	  <select name=gender>
      <option <?php echo $m; ?> >Male</option>
      <option <?php echo $f; ?> >Female</option>
      </select>
	  </td>
    </tr>
	
	<tr>
      <th>Date of Birth </th>
      <td>
	    <select name=bdate>
		<?php
			for ($i=1; $i<32; $i++){
				if($val[3] == $i) {
				echo "<option selected=\"selected\">$i</option>";
				}else{
				echo "<option>$i</option>";
				}
			}
		?>
		</select>

		<select name=bmonth>
		<?php
			for ($i=1; $i<13; $i++){
				if($val[4] == $i) {
				echo "<option selected=\"selected\">$i</option>";
				}else{
				echo "<option>$i</option>";
				}
			}
		?>
		</SELECT>

		<select name=byear>
		<?php
			for($i=1980; $i<1993; $i++){
				if($val[5] == $i) {
				echo "<option selected=\"selected\">$i</option>";
				}else{
				echo "<option>$i</option>";
				}
			}	 
		?>
		</select>

	  </td>
    </tr>
    
	<tr>
      <th width="124">Login ID</th>
      <td width="168"><input name="login" type="text" class="textfield" id="login" <?php if( isset($_SESSION['ERRVAL_ARR']) ) { echo 'value='.$val[6];} ?> /></td>
    </tr>
    <tr>
      <th>Password</th>
      <td><input name="password" type="password" class="textfield" id="password" /></td>
    </tr>
    <tr>
      <th>Confirm Password </th>
      <td><input name="cpassword" type="password" class="textfield" id="cpassword" /></td>
    </tr>
	<tr>
	  <th>Type characters here :</th>
	  <td><input name="number" type="text" class="textfield" id="number"></td>
	</tr>
	<tr>
	  <th>&nbsp </th>
	  <td><img src="image verification/random_image_sample.php"></td>
	  <!--<td><img src="../insert1/images/noise1.png"></td>-->
	</tr>

    <tr>
      <td height="57">&nbsp;</td>
      <td><input type="submit" name="Submit" value="Register" /></td>
    </tr>
  </table>
</form>
</td>
</tr>
</table>
<?php
unset($_SESSION['ERRVAL_ARR']);
?>
</body>
</html>
