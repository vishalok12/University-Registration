drop table if exists `form_info`;

CREATE TABLE vishal.form_info (
user_id varchar(20) NOT NULL,
addr varchar(100),
city varchar(20),
state varchar(20),
pin varchar(8),
mob varchar(10),
email varchar(30),
tenboard varchar(10),
tenyear int(4),
tenmarks int(2),
tweboard varchar(10),
tweyear int(4),
twemarks int(2),
score int(8),
PRIMARY KEY (user_id)
);

#entering an entry to check

insert into form_info values('111', 'ajad park', 'delhi', 'delhi', '823001', '9793016113',
'vishal@iiita.ac.in', 'cbse', 2004, 60, 'cbse', 2006, 70, 2890)