create table users
(
username varchar(64) not null,
password varchar(64) not null,
clear int(2) not null
)ENGINE=InnoDB;

insert into users(username, password, clear) values ("admin", "5d07ac75a0e825a478616406ffde5b7cbd201a2d535023c545498831da63fada", 0);