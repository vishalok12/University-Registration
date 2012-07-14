drop table if exists `stud_entry`;
create table stud_entry (
id int(3) NOT NULL AUTO_INCREMENT,
user_id varchar(20) NOT NULL,
collname varchar(50) NOT NULL,
branchname varchar(5),
entry_no int(3),
PRIMARY KEY (id)
);