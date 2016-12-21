drop table if exists LeaseHolder;
drop table if exists Student;
drop table if exists Users;
drop table if exists RoommateInfo;
drop table if exists Picture;
drop table if exists Address;
drop table if exists Listing;

CREATE TABLE `student_wishoff`.`Users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(25) NOT NULL,
  `lastname` VARCHAR(25) NOT NULL,
  `email` VARCHAR(25) NOT NULL,
  `password` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`user_id`));

CREATE TABLE `student_wishoff`.`RoommateInfo` (
  `roommate_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `grad_year` VARCHAR(30) NOT NULL,
  `major` VARCHAR(30) NOT NULL,
  `minor` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`roommate_info_id`));

CREATE TABLE `student_wishoff`.`Student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `roommate_info_id` int NOT NULL,
  PRIMARY KEY (`student_id`),
  FOREIGN KEY (`user_id`) REFERENCES Users(`user_id`), /* FK */
  FOREIGN KEY (`roommate_info_id`) REFERENCES RoommateInfo(`roommate_info_id`)); /* FK */

CREATE TABLE `student_wishoff`.`LeaseHolder` (
  `leaseholder_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  PRIMARY KEY (`leaseholder_id`),
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`)); /* FK */

CREATE TABLE `student_wishoff`.`Picture` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_file` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`picture_id`));

CREATE TABLE `student_wishoff`.`Address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `address1` VARCHAR(30) NOT NULL,
  `address2` VARCHAR(30),
  `district` VARCHAR(30),
  `city` VARCHAR(30) NOT NULL,
  `state` VARCHAR(30) NOT NULL,
  `country` VARCHAR(30) NOT NULL,
  `zip_code` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`address_id`));

CREATE TABLE `student_wishoff`.`Listings` (
  `listings_id` int(11) NOT NULL AUTO_INCREMENT,
  `num_bed` int NOT NULL,
  `num_bath` int NOT NULL,
  `floor_size` real NOT NULL,
  `rent` real NOT NULL,
  `lease_time` VARCHAR(20) NOT NULL,
  `date` date NOT NULL,
  `num_of_tenants` int NOT NULL,
  `post_date` timestamp(6) NOT NULL,
  `rel_distance` real NOT NULL,
  `leaseholder_id` int NOT NULL,
  `picture_id` int NOT NULL,
  `address_id` int NOT NULL,
  PRIMARY KEY (`listings_id`),
  FOREIGN KEY (`leaseholder_id`) REFERENCES LeaseHolder(`leaseholder_id`), /* FK */
  FOREIGN KEY (`picture_id`) REFERENCES Picture(`picture_id`), /* FK */
  FOREIGN KEY (`address_id`) REFERENCES Address(`address_id`)); /* FK */