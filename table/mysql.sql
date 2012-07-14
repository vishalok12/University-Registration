#
# Table structure for table 'members'
#

drop table if exists `members`;

CREATE TABLE `members` (
  `member_id` int(11) unsigned NOT NULL auto_increment,
  `firstname` varchar(100) default NULL,
  `lastname` varchar(100) default NULL,
  `gender` varchar(6) default NULL, `dob` date default NULL, `login` varchar(100) NOT NULL default '',
  `passwd` varchar(32) NOT NULL default '',
  `lastlog` datetime NOT NULL default '00:00:00',  `flag` int(1) default 0,  PRIMARY KEY  (`member_id`)
) TYPE=MyISAM;



#
# Dumping data for table 'members'
#

INSERT INTO `members` (`member_id`, `firstname`, `lastname`, `gender`, `dob`, `login`, `passwd`, `lastlog`) VALUES("1", "Jatinder", "Thind", "male", "1990-1-1", "phpsense", "ba018360fc26e0cc2e929b8e071f052d", now());
