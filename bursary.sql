-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2014 at 02:06 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bursary`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_students`
--

CREATE TABLE `approved_students` (
  `user_id` int(255) NOT NULL,
  `status` int(255) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `user_id` int(255) NOT NULL,
  `personal_bank_name` varchar(255) NOT NULL,
  `personal_account_name` varchar(255) NOT NULL,
  `personal_bank_address` varchar(255) NOT NULL,
  `personal_account_number` varchar(255) NOT NULL,
  `nubs_bank_name` varchar(255) NOT NULL,
  `nubs_account_name` varchar(255) NOT NULL,
  `nubs_bank_address` varchar(255) NOT NULL,
  `nubs_account_number` varchar(255) NOT NULL,
  `nubs_sort_code` varchar(255) NOT NULL,
  `nubs_account_type` varchar(255) NOT NULL,
  `sug_bank_name` varchar(255) NOT NULL,
  `sug_account_name` varchar(255) NOT NULL,
  `sug_bank_address` varchar(255) NOT NULL,
  `sug_account_number` varchar(255) NOT NULL,
  `sug_sort_code` varchar(255) NOT NULL,
  `sug_account_type` varchar(255) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biography`
--

CREATE TABLE `biography` (
  `user_id` int(255) NOT NULL,
  `salute` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `other_name` varchar(255) NOT NULL,
  `surname_name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `state_of_origin` varchar(255) NOT NULL,
  `lga_of_origin` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `electorial_ward` varchar(255) NOT NULL,
  `village_town` varchar(255) NOT NULL,
  `compound` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `spouse_name` varchar(255) NOT NULL,
  `spouse_home_town` varchar(255) NOT NULL,
  `spouse_lga` varchar(255) NOT NULL,
  `spouse_maiden` varchar(255) NOT NULL,
  `spouse_military_status` varchar(255) NOT NULL,
  `spouse_rank` varchar(255) NOT NULL,
  `spouse_disability` varchar(255) NOT NULL,
  `spouse_current_address` varchar(255) NOT NULL,
  `maternal_firstname` varchar(255) NOT NULL,
  `maternal_surname` varchar(255) NOT NULL,
  `maternal_maiden` varchar(255) NOT NULL,
  `maternal_village_town` varchar(255) NOT NULL,
  `maternal_clan` varchar(255) NOT NULL,
  `maternal_lga` varchar(255) NOT NULL,
  `paternal_firstname` varchar(255) NOT NULL,
  `paternal_surname` varchar(255) NOT NULL,
  `paternal_paternal_name` varchar(255) NOT NULL,
  `paternal_village_town` varchar(255) NOT NULL,
  `paternal_clan` varchar(255) NOT NULL,
  `paternal_lga` varchar(255) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biometric`
--

CREATE TABLE `biometric` (
  `user_id` int(255) NOT NULL,
  `passport_image_url` varchar(255) NOT NULL,
  `signature_url` varchar(255) NOT NULL,
  `fingerprint_url` varchar(255) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `educational`
--

CREATE TABLE `educational` (
  `user_id` int(11) NOT NULL,
  `admission_level` varchar(255) NOT NULL,
  `name_of_institution` varchar(255) NOT NULL,
  `matric_number` varchar(255) NOT NULL,
  `course_of_study` varchar(255) NOT NULL,
  `level_of_study` varchar(255) NOT NULL,
  `department_faculty` varchar(255) NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  `course_startdate` varchar(255) NOT NULL,
  `expected_graduation` varchar(255) NOT NULL,
  `expected_qualification` varchar(255) NOT NULL,
  `institution_contact_add` varchar(255) NOT NULL,
  `institution_contact_person` varchar(255) NOT NULL,
  `admission_letter_url` varchar(255) NOT NULL,
  `course_registration_url` varchar(255) NOT NULL,
  `student_id_card_url` varchar(255) NOT NULL,
  `local_govt_id_url` varchar(255) NOT NULL,
  `int_passport_nationalID_url` varchar(255) NOT NULL,
  `birth_certificate_url` varchar(255) NOT NULL,
  `semester_report_url` varchar(255) NOT NULL,
  `highest_academic_qual` varchar(255) NOT NULL,
  `highest_academic_institution` varchar(255) NOT NULL,
  `highest_academic_course` varchar(255) NOT NULL,
  `highest_academic_duration` varchar(255) NOT NULL,
  `highest_academic_certificatename` varchar(255) NOT NULL,
  `highest_academic_certificate_url` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parental`
--

CREATE TABLE `parental` (
  `user_id` int(255) NOT NULL,
  `mothers_father_firstname` varchar(255) NOT NULL,
  `mothers_father_surname` varchar(255) NOT NULL,
  `mothers_father_stateoforigin` varchar(255) NOT NULL,
  `mothers_father_village` varchar(255) NOT NULL,
  `mothers_father_clan` varchar(255) NOT NULL,
  `mothers_father_lga` varchar(255) NOT NULL,
  `fathers_father_firstname` varchar(255) NOT NULL,
  `fathers_father_surname` varchar(255) NOT NULL,
  `fathers_father_stateoforigin` varchar(255) NOT NULL,
  `fathers_father_village` varchar(255) NOT NULL,
  `fathers_father_clan` varchar(255) NOT NULL,
  `fathers_father_lga` varchar(255) NOT NULL,
  `mothers_mother_firstname` varchar(255) NOT NULL,
  `mothers_mother_surname` varchar(255) NOT NULL,
  `mothers_mother_stateoforigin` varchar(255) NOT NULL,
  `mothers_mother_village` varchar(255) NOT NULL,
  `mothers_mother_clan` varchar(255) NOT NULL,
  `mothers_mother_lga` varchar(255) NOT NULL,
  `fathers_mother_firstname` varchar(255) NOT NULL,
  `fathers_mother_surname` varchar(255) NOT NULL,
  `fathers_mother_stateoforigin` varchar(255) NOT NULL,
  `fathers_mother_village` varchar(255) NOT NULL,
  `fathers_mother_clan` varchar(255) NOT NULL,
  `fathers_mother_lga` varchar(255) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL auto_increment,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_modified` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `clearpass` varchar(255) NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
