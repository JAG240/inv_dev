insert into truck(size) values (27),(48);

insert into job(quote_id, truck_id, pickup_date) values (1, 1, "2020-03-02");

update job
set start_mile = 20000, end_mile = 20200,
 arrival = "09:20:00", departure = "10:30:00", cont_num = 12
where id = 1;