# creates table for forum which stores list of topics in forum

drop table if exists `forum_topics`;

CREATE TABLE `forum_topics` (
  `topic_id` int(11) unsigned NOT NULL auto_increment,
  `topic_title` varchar(100) default 'No Title',
  `topic_create_time` date default NULL,
  `topic_owner` varchar(100) default NULL,
  PRIMARY KEY  (`topic_id`)
) TYPE=MyISAM;
