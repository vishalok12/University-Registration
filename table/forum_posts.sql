# creates table for forum

drop table if exists `forum_posts`;

CREATE TABLE `forum_posts` (
  `post_id` int(11) unsigned NOT NULL auto_increment,
  `topic_id` varchar(20),
  `post_text` varchar(255) default 'No Title',
  `post_create_time` date default NULL,
  `post_owner` varchar(100) default NULL,
  PRIMARY KEY  (`post_id`)
) TYPE=MyISAM;
