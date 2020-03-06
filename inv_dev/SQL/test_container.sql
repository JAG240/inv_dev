insert into disposition(name) values ("open"),("close");

insert into container(mat_id, created, disp_id) values (1, curdate(), 1),(2, curdate(), 1);

insert into transfer(job_id, cont_id, weight, trans_date) values (1, 1, 25, curdate());