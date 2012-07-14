#creating a table to enter criteria for applicant

drop table if exists `criteria`;

create table vishal.criteria (
age int(2),
rank int(6),
qual char(10),
sdate date,
ldate date
);