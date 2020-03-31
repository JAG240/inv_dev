insert into purpose(dev_use) values ("Parent Device"), ("Build up"), ("Harvested");

insert into report(location_id, report_date, comments) values (2, curdate(), "Building up desktop with new hard drive");

insert into dev_report(dev_serial, report_id, purpose_id) values ("CND0239K2", 1, 1),("GSP23", 1, 2);