create table report
(
id int primary key auto_increment, 
location_id int not null,
listing_id bigint,
report_date date not null,
comments varchar(512),
foreign key (location_id) references location(id)
)ENGINE=InnoDB;

create table purpose
(
id int primary key auto_increment,
dev_use varchar(64) not null
)ENGINE=InnoDB;

create table dev_report
(
id int primary key auto_increment,
dev_serial varchar(128) not null,
report_id int not null,
purpose_id int not null,
foreign key (dev_serial) references device(serial),
foreign key (report_id) references report(id),
foreign key (purpose_id) references purpose(id)
)ENGINE=InnoDB;