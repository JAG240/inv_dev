create table ship_ser
(
id int primary key auto_increment,
name varchar(64) not null
)ENGINE=InnoDB;

create table buyer
(
id int primary key auto_increment,
username varchar(128) not null, 
address varchar(256) not null,
city varchar(128),
state varchar(2),
zip varchar(12)
)ENGINE=InnoDB;

-- Total price is quantity * sold_price + ebay_tax -- No need to store in DB -- 

create table ebay_orders
(
id int primary key auto_increment,
order_id varchar(16) not null,
item_num bigint(12) not null,
item_title varchar(128),
sold_price double(8,2) not null, 
ebay_tax double(8,2) not null,
quanitity int(6) not null,
ship_cost double(8,2),
ship_ser_id int not null,
buyer_id int not null,
pp_trans_id varchar(17) not null,
name varchar(64),
address varchar(256),
city varchar(128),
state varchar(2),
zip varchar(12),
tracking varchar(64),
import_date date,
foreign key (ship_ser_id) references ship_ser(id),
foreign key (buyer_id) references buyer(id)
)ENGINE=InnoDB;