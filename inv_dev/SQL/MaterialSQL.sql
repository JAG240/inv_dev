create table mat_class 
(
id int primary key auto_increment,
name varchar(128) not null
)ENGINE=InnoDB;

create table material
(
id int primary key auto_increment,
name varchar(128) not null,
class int not null,
foreign key (class) references mat_class(id)
)ENGINE=InnoDB;