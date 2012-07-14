<?php
	require_once('../auth.php');
	
    //Include database connection details
	require_once ('../config.php');

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
?>

<?php
   //gather the topics
   $get_topics = "select topic_id, topic_title,
   date_format(topic_create_time, '%b %e %Y at %r') as fmt_topic_create_time,
  topic_owner from forum_topics order by topic_create_time desc";
  $get_topics_res = mysql_query($get_topics,$link) or die(mysql_error());
  if (mysql_num_rows($get_topics_res) < 1) {
     //there are no topics, so say so
     $display_block = "<P><em>No topics exist.</em></p>";
  } else {
     //create the display string
     $display_block = "
     <table cellpadding=3 cellspacing=1 border=1 align=center bgcolor=#999966>
     <tr>
     <th  bgcolor=#993300>TOPIC TITLE</th>
     <th  bgcolor=#993300># of POSTS</th>
     </tr>";
  
      while ($topic_info = mysql_fetch_array($get_topics_res)) {
         $topic_id = $topic_info['topic_id'];
         $topic_title = stripslashes($topic_info['topic_title']);
         $topic_create_time = $topic_info['fmt_topic_create_time'];
         $topic_owner = stripslashes($topic_info['topic_owner']);
  
         //get number of posts
         $get_num_posts = "select count(post_id) from forum_posts
              where topic_id = $topic_id";
         $get_num_posts_res = mysql_query($get_num_posts,$link)
              or die(mysql_error());
         $num_posts = mysql_result($get_num_posts_res,0,'count(post_id)');
  
         //add to display
         $display_block .= "
         <tr>
         <td><a href=\"showtopic.php?topic_id=$topic_id\">
         <h1>$topic_title</h1></a>
         <p>Created on $topic_create_time by $topic_owner<p></td>
         <td align=center>$num_posts</td>
         </tr>";
     }
  
     //close up the table
     $display_block .= "</table>";
  }
  ?>
  <html>
  <head>
  <title>Topics in My Forum</title>
  <link href="../javascript/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <div class="container">
	<ul id="saturday">
	<li><a href="../member-index.php" class="left">HOME</a></li>
	<li><a href="../member-profile.php?i=1" class="left">PROFILE</a></li>
	<li><a href="topiclist.php" class="current">FORUM</a></li>
	<li class="right"><a href="../logout.php">LOGOUT</a></li>
</ul>
  <h1>Topics in My Forum</h1>
  <?php print $display_block; ?>
  <div class="sep"></div>
  <P class="current">Would you like to <a href="addtopic.html">add a topic</a>?</p>
  </div>
  </body>
  </html>
