create table company_type
(
id int primary key auto_increment,
comp_type varchar(24) not null
)ENGINE=InnoDB;

insert into company_type (comp_type) values
("Corporation"),("Sole Proprietorship"),("Partnership"),("LLC");

create table customer
(
customer_id int primary key auto_increment, 
name varchar(64) not null,
phone bigint(11) not null, 
primary_contact varchar(64) not null,
website varchar(256),
fax bigint(11),
email varchar(256) not null,
referred varchar(128),
billing_add varchar(256) not null,
physical_add varchar(256) not null,
city varchar(256) not null,
state varchar(2) not null,
zip int(5) not null,
po_box varchar(128),
tax_exempt int(9),
federal_tax int(9) not null,
duns int(9),
start_date date not null,
comp_type_id int not null,
foreign key (comp_type_id) references company_type(id)
)ENGINE=InnoDB;

create table credit_ref
(
id int primary key auto_increment,
name varchar(64) not null,
address varchar(256) not null,
city varchar(256) not null,
state varchar(2) not null,
zip int(5)  not null,
phone bigint(11) not null,
fax bigint(11)
)ENGINE=InnoDB;

create table cust_credit_ref
(
id int primary key auto_increment,
cust_id int not null,
credit_id int not null,
foreign key (cust_id) references customer(customer_id),
foreign key (credit_id) references credit_ref(id)
)ENGINE=InnoDB;

create table dock_contact
(
id int primary key auto_increment,
name varchar(64) not null,
phone bigint(11) not null,
cust_id int not null,
foreign key (cust_id) references customer(customer_id)
)ENGINE=InnoDB;