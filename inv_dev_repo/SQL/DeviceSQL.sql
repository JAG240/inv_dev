create table dev_type
(
id int primary key auto_increment,
name varchar(128) not null
)ENGINE=InnoDB;

create table model
(
id int primary key auto_increment,
name varchar(128) not null,
dev_type_id int  not null,
foreign key (dev_type_id) references dev_type(id)
)ENGINE=InnoDB;

create table dev_condition
(
id int primary key auto_increment,
grade varchar(1) not null
)ENGINE=InnoDB;

create table cpu
(
id int primary key auto_increment,
model varchar(12) not null,
clock_speed double(4,2) not null
)ENGINE=InnoDB;

create table location
(
id int primary key auto_increment,
station varchar(64) not null
)ENGINE=InnoDB;

create table device
(
serial varchar(128) primary key,
type_id int not null, 
model_id int not null,
condition_id int,
cpu_id int,
ram int(3),
parent_serial varchar(128),
rec_date date not null,
location_id int not null,
disp_id int not null,
foreign key (type_id) references dev_type(id),
foreign key (model_id) references model(id),
foreign key (condition_id) references dev_condition(id),
foreign key (cpu_id) references cpu(id),
foreign key (location_id) references location(id),
foreign key (disp_id) references disposition(id),
foreign key (parent_serial) references device(serial)
)ENGINE=InnoDB;

create table dev_cont
(
id int primary key auto_increment,
dev_serial varchar(128) not null,
cont_id int not null,
trans_date date not null,
foreign key (dev_serial) references device(serial),
foreign key (cont_id) references container(id)
)ENGINE=InnoDB;