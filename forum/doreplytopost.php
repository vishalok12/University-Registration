<?php
   //connect to server and select database; we'll need it soon
   $conn = mysql_connect("localhost", "root", "") or die(mysql_error());
   mysql_select_db("vishal",$conn) or die(mysql_error());
   
     //check for required items from form
     if ((!$_POST[topic_id]) || (!$_POST[post_text]) ||
      (!$_POST[post_owner])) {
         header("Location: topiclist.php");
         exit;
     }
  
     //add the post
     $add_post = "insert into forum_posts values ('', '$_POST[topic_id]',
      '$_POST[post_text]', now(), '$_POST[post_owner]')";
     mysql_query($add_post,$conn) or die(mysql_error());
  
     //redirect user to topic
     header("Location: showtopic.php?topic_id=$_POST[topic_id]");
     exit;
?>