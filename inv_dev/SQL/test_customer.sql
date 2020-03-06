insert into customer (name, phone, primary_contact, email, billing_add, physical_add, city, state, zip, federal_tax, start_date, comp_type_id) values
("eLoop", 4124124124, "John Ripper", "run_ripper@eloopllc.com", "321 Electric Ave", "1 Elm St", "Export", "PA", 12345, 123456789, CURDATE(), 1);

insert into dock_contact (name, phone, cust_id) values 
("Freddy Kruger", 7248675309, 1);

insert into credit_ref (name, address, city, state, zip, phone) values
("Jack Black", "404 Money St", "Mile High", "WA", 98765, 1004005000);

insert into cust_credit_ref (cust_id, credit_id) values
(1, 1);

select * from cust_credit_ref, customer, credit_ref, dock_contact where
customer.customer_id = cust_credit_ref.cust_id and 
cust_credit_ref.credit_id = credit_ref.id and
customer.customer_id = dock_contact.cust_id;

select customer.name, customer.phone, customer.primary_contact, customer.email, customer.billing_add,
customer.physical_add, customer.city, customer.state, customer.zip, customer.federal_tax, customer.start_date, credit_ref.name as "Credit Ref Name",
credit_ref.phone as "Credit Ref Phone", dock_contact.name as "Dock Contact", dock_contact.phone as "Dock Phone"
from cust_credit_ref, customer, credit_ref, dock_contact where
customer.customer_id = cust_credit_ref.cust_id and 
cust_credit_ref.credit_id = credit_ref.id and
customer.customer_id = dock_contact.cust_id;