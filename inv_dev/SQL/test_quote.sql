insert into quote_dev(name, weight) values ("Desktop", 10), ("Laptop", 5), ("Tablet", 3), ("Printer", 15);

insert into service(name) values ("Hard Drive Destruction"), ("Haul Away");

insert into quote(cust_id, quote_date) values (1, curdate());

insert into dev_list(quote_id, dev_id, quantity, price) values (1, 2, 10, 15);

insert into ser_list(quote_id, ser_id, quantity, price) values (1, 1, 50, 5);

select * from quote, ser_list, service, quote_dev, dev_list
where quote.id = 1
and quote.id = ser_list.quote_id
and quote.id = dev_list.quote_id
and ser_list.ser_id = service.id
and dev_list.dev_id = quote_dev.id;
