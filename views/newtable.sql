use velo;
drop table gpm_sp;
create table gpm_sp
(
	id int primary key not null auto_increment,
	id_course int references course(id_course),
	type varchar(255),
	top_3 varchar(255)
)