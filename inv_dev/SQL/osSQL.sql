create table os
(
mar bigint(13) primary key,
dev_serial varchar(128) not null,
name varchar(64) not null,
date_issued date not null,
foreign key (dev_serial) references device(serial)
)ENGINE=InnoDB;