<?php
   //check for required fields from the form
   if ((!$_POST[topic_owner]) || (!$_POST[topic_title])
       || (!$_POST[post_text])) {
       header("Location: addtopic.html");
       exit;
   }
   
   //Include database connection details
	require_once ('../config.php');

	//Connect to mysql server
	$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$conn) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
  
  //create and issue the first query
  $add_topic = "insert into forum_topics values ('', '$_POST[topic_title]',
      now(), '$_POST[topic_owner]')";
  mysql_query($add_topic,$conn) or die(mysql_error());
  
  //get the id of the last query 
  $topic_id = mysql_insert_id();
 
  //create and issue the second query
  $add_post = "insert into forum_posts values ('', '$topic_id',
      '$_POST[post_text]', now(), '$_POST[topic_owner]')";
  mysql_query($add_post,$conn) or die(mysql_error());
  
  //create nice message for user
  $msg = "<P>The <strong>$topic_title</strong> topic has been created.</p>";
  ?>
  <html>
  <head>
  <title>New Topic Added</title>
  </head>
  <body>
  <h1>New Topic Added</h1>
  <?php print $msg; ?>
  </body>
  </html>
