#creating a table to enter college name 
#and corresponding branch seats

drop table if exists `college_info`;

create table vishal.college_info (
collname varchar(50) NOT NULL,
CSE int(3) default 0,
ECE int(3) default 0,
MEC int(3) default 0,
IT  int(3) default 0,
CIV int(3) default 0,
PRIMARY KEY (collname),
UNIQUE ID (collname)
);

insert into college_info values ('NITK', 60, 60, 120, 50, 90);

insert into college_info values ('IIITA', 0, 90, 0, 0, 120);
insert into college_info values ('NIT PATNA', 60, 90, 120, 30, 80);
insert into college_info values ('NITA', 0, 70, 150, 60, 100);
insert into college_info values ('NITC', 60, 70, 120, 0, 100);