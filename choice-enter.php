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

	function selectcheck($err)
	{
		switch($err) {
			case 1:
				echo "Either college or branch is not selected";
				break;
			case 2:
				echo "you have already chosen that !";
				break;
		}
	}

	$err = 0;
	if( isset( $_POST['submit'] ) ) {
		if( (( $college=$_POST['college'] )!="SELECT ONE") && ((	$branch=$_POST['branch'] )!="select one") ) {
		//unset($_POST['submit']);
		//unset($_POST['OK']);
		

		$uid = $_SESSION['SESS_LOGIN_ID'];
		$query = "select * from stud_entry where user_id='$uid'";
		$result = mysql_query($query) or die("can't access stud_entry");
		$num = mysql_num_rows($result) + 1;
		$query = "select * from stud_entry where user_id='$uid' and collname='$college' and branchname='$branch'";
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0) {
			$err = 2;
		}else{
			$query = "insert into stud_entry values ('', '$uid', '$college', '$branch', $num)";
			$result = mysql_query($query) or die("can't enter value to stud_entry");
		
			header("location: choice-enter.php");
		}
		}else{
			$err = 1;
		}
	}

?>

<html>
<head>
<title>
College selection procedure.
</title>
<link href="javascript/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="container">
<ul id="saturday">
	<li><a href="member-index.php">HOME</a></li>
	<li><a href="member-profile.php?i=1" class="left" >PROFILE</a></li>
	<li><a href="forum/topiclist.php" class="left">FORUM</a></li>
	<li class="right"><a href="logout.php">LOGOUT</a></li>
</ul>
<h2 class="midcol"> Select college and branch :</h2>

<table width="100%" align="center" border="0">
<tr>
<td align="right" width="70%">
<form method="post" action='<?php $_SERVER[PHP_SELF]; ?>'>
<table width="400" border="0" align="right" cellpadding="2" cellspacing="0">
  <tr>
    <th>
     <p>COLLEGE -&nbsp </P>
	</th>
	<td>
     <select name="college">
	 
     <?php
	   if( !isset($_POST[OK]) ) {
		   $check_ok = 0;
		   echo "<option selected>SELECT ONE</option>";
	   }else{
		   $check_ok = 1;
		   echo "<option>".$_POST['college']."</option>";
	   }

       $query = "SELECT * FROM college_info";
       $result = mysql_query($query) or die("query failed"); 
       while( $myrow = mysql_fetch_array($result) ) {
		$collname = $myrow['collname'];
		echo "<option>$collname</option>";
       }
     ?>
     </select>
	<input type="submit" name="OK" value="OK" />
	</td>
  </tr>
  <tr>
    <th>
	  <p>BRANCH -&nbsp </p>
	</th>
	<td>
	  <select name="branch">
	  <option selected>select one</option>
	  <?php
	  $collname=$_POST['college'];
	  //$collname = "NITK";
       $query = "SELECT * FROM college_info WHERE collname='$collname'";
       $result = mysql_query($query) or die("query failed");
	   $myrow = mysql_fetch_array($result);
       if($myrow['CSE'] > 0) {
		   echo "<option>CSE</option>";
	   }
	   if($myrow['ECE'] > 0) {
		   echo "<option>ECE</option>";
	   }
	   if($myrow['MEC'] > 0) {
		   echo "<option>MEC</option>";
	   }
	   if($myrow['IT'] > 0) {
		   echo "<option>IT</option>";
	   }
	   if($myrow['CIV'] > 0) {
		   echo "<option>CIV</option>";
	   }
      ?>
	  </select>
	</td>
  </tr>

  <tr>
    <th>&nbsp
	</th>
	<td>
		
		<?php
		if ( $check_ok == 0 ) {
		$disabled = 'disabled = "disabled"';
		}
		else{
		$check_ok = 0;
		$disabled = "";
		}
		?>
	    <input type="submit" name="submit" value="Print" <?php echo $disabled ?> />
	</td>
  </tr>
</table>
</form>
</td>
	<td>
	 <?php
		selectcheck($err);
	 ?>
	 </td>
</tr>
</table>
<br />
<br />
<br />
<br />
<hr />
<h2 class="midcol">You have selected :</h2>
<p align="right"><a href="choice-edit.php" title="click to edit selection">Edit the Selection</a></p>
<?php

echo "<table width=\"400\" border=\"0\" align=\"center\" cellpadding=\"1\" cellspacing=\"0\">";

  $query = "select * from stud_entry where user_id = '$uid' order by entry_no";
  $result = mysql_query($query) or die("can't query to stud_entry");
  if(mysql_num_rows($result) == 0) {
	  echo "NOT YET ENTERED A SINGLE";
  }else{
  $count = 1;
  while( $myrow = mysql_fetch_array($result) ) {
	  echo "<tr>";
	  echo "<td>";
	  echo $count;
	  echo "</td>";
	  $count ++;
	  echo "<td>";
	      //echo $myrow['collname'];
		  echo "<h3><a href=\"college-info.php?college=" .$myrow['collname'] . "\" title=\"details\" target=\"_blank\">" . $myrow['collname'] . "</a></h3>";
	  echo "</td>";
	  echo "<td>";
		  echo $myrow['branchname'];
	  echo "</td>";
  
  	  echo "</tr>";
  }
echo "</table>";
}
?>
<br><br>
<br><br>
</div>
</body>
</html>
