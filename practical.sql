/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.10-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `tbl_events` (
	`fld_events_id` int (11),
	`fld_events_title` varchar (300),
	`fld_start_date` date ,
	`fld_end_date` date ,
	`fld_recurrence` tinyint (1),
	`fld_recurrence_type_name` varchar (300),
	`created_datetime` varchar (90),
	`updated_datetime` varchar (90)
); 
