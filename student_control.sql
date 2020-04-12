use student_control;

create table tb_login(
	id int not null primary key auto_increment,
	name varchar(150) not null,
	email varchar(200) not null,
	password varchar(32) not null
);

create table tb_discipline(
	id int not null primary key auto_increment,
	name varchar(150) not null,
	teacher varchar(150) not null,
	hour varchar(6) not null,
	id_login int not null,
	foreign key (id_login) references tb_login (id)
);

create table tb_testjob(
	id int not null primary key auto_increment,
	dateEvent datetime not null,
	id_login int not null,
	foreign key (id_login) references tb_login (id),
	id_discipline int not null,
	foreign key (id_discipline) references tb_discipline (id),
	content text not null,
	note float(8,2) not null
);