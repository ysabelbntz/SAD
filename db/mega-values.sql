INSERT INTO accounts VALUES
/*password: hehehe; password:whyucry*/
/*encrypt password pls*/
/*paano pala if they want to change their password?*/
(1,'Anna', 'Melgar', "admelgar","$2a$10$J7ELAufFTDwm9REekaJSLObhlLnf7MCYvYBnt39ackgkuL.jUUkbi",'admin','anna.melgar@yahoo.com','09151230244','12111 Katipunan Avenue, Manila 1008','Go Anna!'),
(2,'Mandy','Moore',"mmoore","$2a$04$VUO5cBCOCWCy2o6bc6yCseAz7n9FIo.hnVpqOV5IuiMlk6uDr4n8W",'officer','cry@gmail.com','09121144211','12311 J Santos street, QC 1211','Go Mandy!'),

(3,'April May','Agustin',"amagustin","huhubels",'officer','aprilagustin@gmail.com','09182004567','20 Ferndale Street, Hotel Transylvania Subdivision, Antipolo City','Go April!'),
(4,'Katrina','Bautista',"kbautista","huhubelers",'officer','kmbautista79@gmail.com','09182374883','7 Eighth Street, Brgy. Siyamnapu, QC','Go Katrina!'),
(5,'Sam','Smith',"ssmith","lollers",'officer','sam_smith0820@gmail.com','09159317248','23 Pineapple Street, Brgy. Bikini Bottom, Marikina City','Go Sam!');


INSERT INTO clients VALUES
/*admin is manager who does not handle/input any client*/
(1,'3','Micro','Mar','Roxas','Leni','Robredo','Daang Matuwid Inc.','TABI','ACTIVE','tsinelas@yellow.com','0927123143','Go RoRo!'),
(2,'4','SME','Miriam','Santiago','Bong Bong','Marcos','Red Company Inc.','DOON','RISK', 'mdsbbm@red.com','09121212453',''),
(3,'2','SME','Grace','Poe','Chiz','Escudero','Coffee Bean and Tea Leaf','CBTL','IDLE','coffeeservice@cbtl.com','09817241832',''),
(4,'2','Micro','Rody','Duterte','Alan','Cayetano','Starbucks Partners','ORACLE','IDLE','customerservice@starbs.com','09123111112','');

INSERT INTO cases VALUES
/*wait pareho yung status dito and sa client?*/
/*didnt change actual balances yet*/
(1,'1','78000.00','78000.00','2016-04-23','2016-07-02','10','5','Contact Leni if Mar is busy','ACTIVE','100.00','200.50'),
(2,'2','95000.00','80000.00','2015-05-10','2015-12-25','24','12','','RISK','300.00','200.00'),
(3,'3','24000.00','18000.00','2016-02-29','2016-05-23','12','7','','IDLE','4000.00','1000.00'),
(4,'4','32000.00','80000.00','2016-03-12','2016-06-04','12','5','','IDLE','300.00','200.00');


INSERT INTO expected VALUES
/*expected values for client_id 1 only*/
/*principal_due, interest_due and total_due not changed*/
(1,'1','1','2016-04-30','7800.00','3900.00','11700.00','300.00','200.00','500.00','PAID'),
(2,'1','1','2016-05-07','7800.00','3900.00','11700.00','300.00','200.00','500.00','PAID'),
(3,'1','1','2016-05-14','7800.00','3900.00','11700.00','300.00','200.00','500.00','UNPAID'),
(4,'1','1','2016-05-21','7800.00','3900.00','11700.00','300.00','200.00','500.00','UNPAID'),
(5,'1','1','2016-05-28','7800.00','3900.00','11700.00','300.00','200.00','500.00','UNPAID'),
(6,'1','1','2016-06-04','7800.00','3900.00','11700.00','300.00','200.00','500.00','UNPAID'),
(7,'1','1','2016-06-11','7800.00','3900.00','11700.00','300.00','200.00','500.00','UNPAID'),
(8,'1','1','2016-06-18','7800.00','3900.00','11700.00','300.00','200.00','500.00','UNPAID'),
(9,'1','1','2016-06-25','7800.00','3900.00','11700.00','300.00','200.00','500.00','UNPAID'),
(10,'1','1','2016-07-02','7800.00','3900.00','11700.00','300.00','200.00','500.00','UNPAID');


INSERT INTO payment VALUES
/*actual for client_id 1 only*/
(1,'1','1','3','1','2016-04-30','Cash','0','11700.00','7800.00','3900.00','0.00','VALID',''),
(2,'1','1','3','2','2016-05-07','Check','0', '1211121','11700.00','7800.00','3900.00','BOUNCE','Bounced check. Process of replacement');

INSERT INTO logs VALUES
(1,'Melgar Anna','2016-04-23 21:35:02','Add Payment','Daang Matuwid Inc.','','78000 paid last 04/23/16'),
(2,'Melgar Anna','2016-04-24 21:22:02','Edit Client Status','RCI','ACTIVE','RISK');