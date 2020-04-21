insert into dev_type(name) values ("Desktop"),("Laptop"),("Printer"),("Scanner");

insert into model(name, dev_type_id) values ("600 G1", 1),("6000", 1),("E6440", 2),("4710MQ", 2),("Deskjet 360", 3),("Inkjet Pro 340",3),("CR2600",4),("CR2700",4);

insert into dev_condition(grade) values ("A"),("B"),("C"),("D"),("F");

insert into cpu(model, clock_speed) values ("i5-2400", 2.5),("i3-3600", 2.0),("i7-8900", 3.5),("i5-4500", 2.7);

insert into location(station) values ("name testing"),("ebay"),("wholesale"),("recycle");

insert into disposition(name) values ("inbound"),("testing"),("waiting for parts"),("deploying OS"),("harvesting"),("outbound");

insert into device(serial, type_id, model_id, condition_id, cpu_id, ram, rec_date, location_id, disp_id) values
("CND4512G1", 1, 1, 1, 1, 4, curdate(), 1, 3),("CND3124A2", 2, 3, 2, 2, 8, curdate(), 2, 3);

insert into dev_cont(dev_serial, cont_id, trans_date) values ("CND4512G1", 11, curdate());

select * from device, dev_type, model, dev_condition, cpu, location, disposition
where device.type_id = dev_type.id
and device.model_id = model.id
and device.condition_id = dev_condition.id
and device.location_id = location.id
and device.disp_id = disposition.id
and device.cpu_id = cpu.id;