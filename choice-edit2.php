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
	//$disabled = "";
	//$disabled = 'disabled = "disabled"';


echo "<SCRIPT LANGUAGE=\"JavaScript\">";
echo "function Check() {";
//alert("hello");
echo "if(document.myform.checkit.checked==true){";
	echo "alert(\"hello\");";
	echo "document.myform.submit1.disabled==true;";

	//myform.submit1.disabled==true;
	
		//$disabled = "";
		
echo "}";
echo "}";
echo "</script>";

if( isset($_POST['submit1']) && isset($_POST['checkit']) ) {
	$myrow = $_POST['checkit'];
	$i = sizeof($myrow);
	while($i > 0) {
		$id = $myrow[--$i];
		//print $id. " ";
	
		$query = "delete from stud_entry where id='$id'";
		$result = mysql_query($query) or die("can't delete");
	}
}

print "<form name=\"myform\" method=\"post\" action= \"$_SERVER[PHP_SELF]\">";
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
	 
	  echo "<td>";
		  echo $myrow['collname'];
	  echo "</td>";
	  
	  echo "<td>";
		  echo $myrow['branchname'];
	  echo "</td>";
	  
	  echo "<td>";
	  $id = $myrow['id'];
	  //print $id;
	  echo "<INPUT TYPE=CHECKBOX NAME=\"checkit\" VALUE=\"".$id."\" onClick=\"Check()\">delete</INPUT>";
	  echo "</td>";
	  
	  echo "<td>";
	  echo "<INPUT type=\"button\" value=\"MOVE UP\" name=\"button5\" onClick=\"window.location='http://localhost/PHP-Login/choice-edit_exec.php?id=" . $id . "'\">";
	  echo "</td>";
      
	  echo "<td>";
	  echo "<INPUT type=\"button\" value=\"MOVE DOWN\" name=\"button6\" onClick=\"window.location='http://localhost/PHP-Login/choice-edit_exec1.php?id=" . $id ."'\">";
	  echo "</td>";
      
	  echo "</tr>";

	  $count ++;
  }
  echo "<tr>";
  echo "<td>&nbsp</td>";
  echo "<td>&nbsp</td>";
  echo "<td>&nbsp</td>";

  echo "<td><input type=\"submit\" name=\"submit1\" value=\"OKAY\" ".$disabled."/></td>";
  echo "</tr>";
  }
echo "</table>";
echo "</form>";
?>
