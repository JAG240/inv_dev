create table quote
(
id int primary key auto_increment,
cust_id int not null,
quote_date date not null,
foreign key (cust_id) references customer(customer_id)
)ENGINE=InnoDB;

create table quote_dev
(
id int primary key auto_increment,
name varchar(256) not null,
weight double(8,2) not null
)ENGINE=InnoDB;

create table service
(
id int primary key auto_increment,
name varchar(128) not null
)ENGINE=InnoDB;

create table dev_list
(
id int primary key auto_increment,
quote_id int not null, 
dev_id int not null,
quantity int(8)not null,
price double(8,2) not null,
foreign key (quote_id) references quote(id),
foreign key (dev_id) references quote_dev(id)
)ENGINE=InnoDB;

create table ser_list
(
id int primary key auto_increment,
quote_id int not null,
ser_id int not null,
quantity int(8) not null,
price double(8,2) not null
)ENGINE=InnoDB;