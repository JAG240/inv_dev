create table truck
(
id int primary key auto_increment,
size int(4) not null
)ENGINE=InnoDB;

create table job
(
id int primary key auto_increment,
quote_id int not null, 
truck_id int not null,
pickup_date date not null, 
start_mile int(8), 
end_mile int(8),
arrival time(0),
departure time(0),
cont_num int(8),
foreign key (quote_id) references quote(id),
foreign key (truck_id) references truck(id)
)ENGINE=InnoDB;