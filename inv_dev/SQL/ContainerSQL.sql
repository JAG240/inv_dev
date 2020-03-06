create table disposition
(
id int primary key auto_increment,
name varchar(128) not null
)ENGINE=InnoDB;

create table container
(
id int primary key auto_increment,
mat_id int not null,
created date not null,
disp_id int not null,
foreign key (disp_id) references disposition(id),
foreign key (mat_id) references material(id)
)ENGINE=InnoDB;

create table job_transfer 
(
id int primary key auto_increment,
job_id int not null,
cont_id int not null, 
quantity int(6),
weight double(8,2),
trans_date date not null,
foreign key (job_id) references job(id),
foreign key (cont_id) references container(id)
)ENGINE=InnoDB;

create table cont_transfer
(
id int primary key auto_increment,
source_cont int not null,
dest_cont int not null,
quantity int(6),
weight double(8,2),
trans_date date not null,
foreign key (source_cont) references container(id),
foreign key (dest_cont) references container(id)
)ENGINE=InnoDB;