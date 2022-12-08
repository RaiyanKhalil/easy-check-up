-- 6 user,3 PAtient 3 users
INSERT INTO `easycheckup`.`users`(`id`,`fname`,`lname`,`email`,`email_verified_at`,`contact`,`address`,`password`,`role_id`,`remember_token`)
VALUES(1,'Elizabeth','Blackwell','Elizabeth.Blackwell@gmail.com',null,9292393939,'1629 Robson St, Vancouver, British Columbia, Canada V6B 3K9','$2y$10$wgq4rMoLZ5U9dL66Ejlrzusoc.N6YCYpVn1vUu2OKRTsvl3r428qy',2,null);
INSERT INTO `easycheckup`.`users`(`id`,`fname`,`lname`,`email`,`email_verified_at`,`contact`,`address`,`password`,`role_id`,`remember_token`)
VALUES(2,'Rebecca','Crumpler','Rebecca.crumpler@gmail.com',null,1282912812,'1629 Robson St, Vancouver, British Columbia, Canada V6B 3K9','$2y$10$wgq4rMoLZ5U9dL66Ejlrzusoc.N6YCYpVn1vUu2OKRTsvl3r428qy',2,null);
INSERT INTO `easycheckup`.`users`(`id`,`fname`,`lname`,`email`,`email_verified_at`,`contact`,`address`,`password`,`role_id`,`remember_token`)
VALUES(3,'Ogino','Ginko','Ogino.ginko@gmail.com',null,7827822131,'9377, 162a street, Surrey, British Columbia, Canada V4N2B7','$2y$10$wgq4rMoLZ5U9dL66Ejlrzusoc.N6YCYpVn1vUu2OKRTsvl3r428qy',2,null);

INSERT INTO `easycheckup`.`users`(`id`,`fname`,`lname`,`email`,`email_verified_at`,`contact`,`address`,`password`,`role_id`,`remember_token`)
VALUES(4,'Ross','William','Ross.william@gmail.com',null,7827822131,'150,8th avenure, New WestMinster, British Columbia, Canada V3M 3P6','$2y$10$wgq4rMoLZ5U9dL66Ejlrzusoc.N6YCYpVn1vUu2OKRTsvl3r428qy',1,null);
INSERT INTO `easycheckup`.`users`(`id`,`fname`,`lname`,`email`,`email_verified_at`,`contact`,`address`,`password`,`role_id`,`remember_token`)
VALUES(5,'Ryan','Gosling','Ryan.Gosling@gmail.com',null,9928319123,'9455,162a street, Surrey, British Columbia, Canada V4N2B7','$2y$10$wgq4rMoLZ5U9dL66Ejlrzusoc.N6YCYpVn1vUu2OKRTsvl3r428qy',1,null);
INSERT INTO `easycheckup`.`users`(`id`,`fname`,`lname`,`email`,`email_verified_at`,`contact`,`address`,`password`,`role_id`,`remember_token`)
VALUES(6,'Chandler','Bing','Changlder.bing@gmail.com',null,1231237142,'Pacific center,Downtown, Vancouver, British Columbia, Canada V7Y 1G5','$2y$10$wgq4rMoLZ5U9dL66Ejlrzusoc.N6YCYpVn1vUu2OKRTsvl3r428qy',1,null);


-- 3 Doctors added with their address and location
INSERT INTO `easycheckup`.`doctors`(`id`,`f_name`,`l_name`,`email`,`doc_type`,`phn_num`,`doc_office_location`,`doc_lat`,`doc_long`)
VALUES(1,'Elizabeth','Blackwell','Elizabeth.Blackwell@gmail.com','Surgery','9292393939','1629 Robson St, Vancouver, British Columbia, Canada V6B 3K9','49.2819','-123.11874');

INSERT INTO `easycheckup`.`doctors`(`id`,`f_name`,`l_name`,`email`,`doc_type`,`phn_num`,`doc_office_location`,`doc_lat`,`doc_long`)
VALUES(2,'Rebecca','Crumpler','Rebecca.crumpler@gmail.com','Internal medicine','1282912812','12879 60Avenue, Surrey, British Columbia, Canada V3X2L4','49.124008','-122.795345');

INSERT INTO `easycheckup`.`doctors`(`id`,`f_name`,`l_name`,`email`,`doc_type`,`phn_num`,`doc_office_location`,`doc_lat`,`doc_long`)
VALUES(3,'Ogino','Ginko','Ogino.ginko@gmail.com','Cardiology','7827822131','9377, 162a street, Surrey, British Columbia, Canada V4N2B7','49.124008','-122.795374');


-- 10 Appointments

INSERT INTO `easycheckup`.`appointments`(`id`,`user_id`,`doctor_id`,`datetime_start`,`datetime_end`,`status_id`)VALUES(1,4,1,'2022-12-08 10:00:00','2022-12-08 11:00:00',1);
INSERT INTO `easycheckup`.`appointments`(`id`,`user_id`,`doctor_id`,`datetime_start`,`datetime_end`,`status_id`)VALUES(2,5,1,'2022-12-08 11:00:00','2022-12-08 12:00:00',1);
INSERT INTO `easycheckup`.`appointments`(`id`,`user_id`,`doctor_id`,`datetime_start`,`datetime_end`,`status_id`)VALUES(3,6,1,'2022-12-08 08:00:00','2022-12-08 09:00:00',1);
INSERT INTO `easycheckup`.`appointments`(`id`,`user_id`,`doctor_id`,`datetime_start`,`datetime_end`,`status_id`)VALUES(4,4,2,'2022-12-08 09:00:00','2022-12-08 10:00:00',1);
INSERT INTO `easycheckup`.`appointments`(`id`,`user_id`,`doctor_id`,`datetime_start`,`datetime_end`,`status_id`)VALUES(5,5,2,'2022-12-08 10:00:00','2022-12-08 11:00:00',1);
INSERT INTO `easycheckup`.`appointments`(`id`,`user_id`,`doctor_id`,`datetime_start`,`datetime_end`,`status_id`)VALUES(6,6,2,'2022-12-08 13:00:00','2022-12-08 14:00:00',1);
INSERT INTO `easycheckup`.`appointments`(`id`,`user_id`,`doctor_id`,`datetime_start`,`datetime_end`,`status_id`)VALUES(7,4,3,'2022-12-08 14:00:00','2022-12-08 15:00:00',1);
INSERT INTO `easycheckup`.`appointments`(`id`,`user_id`,`doctor_id`,`datetime_start`,`datetime_end`,`status_id`)VALUES(8,5,3,'2022-12-08 15:00:00','2022-12-08 16:00:00',1);
INSERT INTO `easycheckup`.`appointments`(`id`,`user_id`,`doctor_id`,`datetime_start`,`datetime_end`,`status_id`)VALUES(9,6,3,'2022-12-08 16:00:00','2022-12-08 17:00:00',1);
INSERT INTO `easycheckup`.`appointments`(`id`,`user_id`,`doctor_id`,`datetime_start`,`datetime_end`,`status_id`)VALUES(10,4,3,'2022-12-08 17:00:00','2022-12-08 18:00:00',1);
