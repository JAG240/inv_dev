alter table customer modify name varchar(64) null;
alter table customer modify phone bigint(11) null;
alter table customer modify primary_contact varchar(64) null;
alter table customer modify email varchar(256) null;
alter table customer modify billing_add varchar(256) null;
alter table customer modify physical_add varchar(256) null;
alter table customer modify city varchar(256) null;
alter table customer modify state varchar(2) null;
alter table customer modify zip int(5) null;
alter table customer modify federal_tax int(9) null;
alter table customer modify start_date date null;
alter table customer modify comp_type_id int(11) null;