   <?php
	//check for required info from the query string
   if (!$_GET[topic_id]) {
      header("Location: topiclist.php");
      exit;
   }
   
   
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
?>

<?php
  //verify the topic exists
  $verify_topic = "select topic_title from forum_topics where
      topic_id = $_GET[topic_id]";
  $verify_topic_res = mysql_query($verify_topic, $link)
      or die(mysql_error());
 
  if (mysql_num_rows($verify_topic_res) < 1) {
      //this topic does not exist
     $display_block = "<P><em>You have selected an invalid topic.
      Please <a href=\"topiclist.php\">try again</a>.</em></p>";
  } else {
      //get the topic title
     $topic_title = stripslashes(mysql_result($verify_topic_res,0,
          'topic_title'));
  
     //gather the posts
     $get_posts = "select post_id, post_text, date_format(post_create_time,
          '%b %e %Y at %r') as fmt_post_create_time, post_owner from
          forum_posts where topic_id = $_GET[topic_id]
          order by post_create_time asc";
  
     $get_posts_res = mysql_query($get_posts,$link) or die(mysql_error());
  
     //create the display string
     $display_block = "
     <h2>Showing posts for the <strong>$topic_title</strong> topic:</h2>
  
     <table width=100% cellpadding=3 cellspacing=1 border=1 bgcolor=#999966>
     <tr>
     <th bgcolor=#993300>AUTHOR</th>
     <th bgcolor=#993300>POST</th>
     </tr>";
  
     while ($posts_info = mysql_fetch_array($get_posts_res)) {
         $post_id = $posts_info['post_id'];
         $post_text = nl2br(stripslashes($posts_info['post_text']));
         $post_create_time = $posts_info['fmt_post_create_time'];
         $post_owner = stripslashes($posts_info['post_owner']);
  
         //add to display
         $display_block .= "
         <tr>
         <td width=35% valign=top>$post_owner<br>[$post_create_time]</td>
         <td width=65% valign=top>$post_text<br><br>
          <a href=\"replytopost.php?post_id=$post_id\"><strong>REPLY TO
          POST</strong></a></td>
         </tr>";
     }
  
     //close up the table
     $display_block .= "</table>";
  }
  ?>
  <html>
  <head>
  <title>Posts in Topic</title>
  <link href="../javascript/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  <div class="container">
	<ul id="saturday">
	<li><a href="../member-index.php" class="left">HOME</a></li>
	<li><a href="../member-profile.php?i=1" class="left">PROFILE</a></li>
	<li><a href="topiclist.php">FORUM</a></li>
	<li class="right"><a href="../logout.php">LOGOUT</a></li>
	</ul>
  <h1>Posts in Topic</h1>
  <?php print $display_block; ?>
  </div>
  </body>
  </html>