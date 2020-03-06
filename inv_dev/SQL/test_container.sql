insert into disposition(name) values ("open"),("close");

insert into container(mat_id, created, disp_id) values (1, curdate(), 1),(2, curdate(), 1);

insert into job_transfer(job_id, cont_id, weight, trans_date) values (1, 1, 25, curdate());

insert into cont_transfer(source_cont, dest_cont, quantity, weight, trans_date) values (5, 7, 2, 45, curdate());