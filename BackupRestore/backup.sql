DROP TABLE amenities;

CREATE TABLE `amenities` (
  `amenity_id` int(11) NOT NULL AUTO_INCREMENT,
  `amenity_name` varchar(255) NOT NULL,
  `subdivision_id` int(11) NOT NULL,
  `subdivision_name` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL,
  PRIMARY KEY (`amenity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO amenities VALUES("1","Court","1","Sunnyvale 1","Available");
INSERT INTO amenities VALUES("4","Multi-purpose Hall","1","Sunnyvale 1","Available");
INSERT INTO amenities VALUES("5","Swimming Pool","1","Sunnyvale 1","Available");
INSERT INTO amenities VALUES("6","Clubhouse","1","Sunnyvale 1","Unavailable");
INSERT INTO amenities VALUES("10","Clubhouse","3","Sunnyvale 3","Available");
INSERT INTO amenities VALUES("16","Bathhouse","1","Sunnyvale 1","Available");
INSERT INTO amenities VALUES("25","123","1","Sunnyvale 1","Available");
INSERT INTO amenities VALUES("24","asd","1","Sunnyvale 1","Available");
INSERT INTO amenities VALUES("23","test","1","Sunnyvale 1","Available");



DROP TABLE amenity_purpose;

CREATE TABLE `amenity_purpose` (
  `amenity_purpose_id` int(10) NOT NULL AUTO_INCREMENT,
  `amenity_id` int(10) NOT NULL,
  `amenity_purpose` varchar(100) NOT NULL,
  `day_rate` int(10) NOT NULL,
  `night_rate` int(10) NOT NULL,
  PRIMARY KEY (`amenity_purpose_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO amenity_purpose VALUES("1","1","Basketball","50","150");
INSERT INTO amenity_purpose VALUES("3","1","Volleyball","50","150");
INSERT INTO amenity_purpose VALUES("5","5","Swimming","50","100");
INSERT INTO amenity_purpose VALUES("8","10","Party","150","300");
INSERT INTO amenity_purpose VALUES("9","1","Badminton","50","150");
INSERT INTO amenity_purpose VALUES("10","1","Chess","80","360");



DROP TABLE amenity_renting;

CREATE TABLE `amenity_renting` (
  `amenity_renting_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(10) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `renter_name` varchar(255) NOT NULL,
  `subdivision_name` varchar(255) NOT NULL,
  `amenity_name` varchar(255) NOT NULL,
  `amenity_purpose` varchar(255) NOT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  `cart` varchar(10) NOT NULL,
  PRIMARY KEY (`amenity_renting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO amenity_renting VALUES("9","","1","Mon Carlo Delima","Sunnyvale 1","Court","1","2023-02-13 01:00:00","2023-02-13 02:00:00","50","","Removed");
INSERT INTO amenity_renting VALUES("8","","1","Mon Carlo Delima","Sunnyvale 1","Court","1","2023-02-12 18:00:00","2023-02-12 21:00:00","450","","Removed");
INSERT INTO amenity_renting VALUES("7","","1","Mon Carlo Delima","Sunnyvale 1","Court","1","2023-02-15 13:00:00","2023-02-15 17:00:00","","","Removed");
INSERT INTO amenity_renting VALUES("13","1","1","Mon Carlo Delima","Sunnyvale 1","Court","1","2023-02-14 09:00:00","2023-02-14 21:00:00","900","328148270_726681382138928_1391919010667224674_n.png","Pending");
INSERT INTO amenity_renting VALUES("12","","1","Mon Carlo Delima","Sunnyvale 1","Court","1","","","","","Removed");
INSERT INTO amenity_renting VALUES("14","1","1","Mon Carlo Delima","Sunnyvale 1","Court","3","2023-02-15 09:00:00","2023-02-15 12:00:00","150","328148270_726681382138928_1391919010667224674_n.png","Pending");
INSERT INTO amenity_renting VALUES("15","1","1","Mon Carlo Delima","Sunnyvale 1","Court","1","2023-02-16 18:00:00","2023-02-16 21:00:00","450","328148270_726681382138928_1391919010667224674_n.png","Pending");
INSERT INTO amenity_renting VALUES("16","","1","Mon Carlo Delima","Sunnyvale 1","Court","1","","","","","Removed");
INSERT INTO amenity_renting VALUES("17","2","1","Mon Carlo Delima","Sunnyvale 1","Court","3","2023-02-22 18:00:00","2023-02-22 19:00:00","150","Delima, Mon Carlo Z..png","Pending");
INSERT INTO amenity_renting VALUES("18","3","1","Mon Carlo Delima","Sunnyvale 1","Court","1","2023-02-25 13:00:00","2023-02-25 14:00:00","50","315887907_1137649846869408_655406644278059076_n.png","Pending");
INSERT INTO amenity_renting VALUES("19","","48","SV1_Treasurer","Sunnyvale 1","Court","3","2023-03-12 02:00:00","2023-03-12 15:00:00","0","","Approved");
INSERT INTO amenity_renting VALUES("20","","48","SV1_Treasurer","Sunnyvale 1","Court","3","","","","","Yes");



DROP TABLE annual_dues;

CREATE TABLE `annual_dues` (
  `annual_dues_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`annual_dues_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO annual_dues VALUES("1","Sunnyvale 1","200","2022-11-27");
INSERT INTO annual_dues VALUES("2","Sunnyvale 2","250","2022-11-27");
INSERT INTO annual_dues VALUES("3","Sunnyvale 3","500","2022-11-29");
INSERT INTO annual_dues VALUES("4","Sunnyvale 4","350","2022-11-27");
INSERT INTO annual_dues VALUES("5","Sunnyvale 7","500","2022-11-27");
INSERT INTO annual_dues VALUES("6","Sunnyvale 5","500","2022-11-29");
INSERT INTO annual_dues VALUES("7","Sunnyvale 5","300","2022-11-29");
INSERT INTO annual_dues VALUES("11","Sunnyvale 10","720","2022-11-29");



DROP TABLE audit_trail;

CREATE TABLE `audit_trail` (
  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `action` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`audit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=552 DEFAULT CHARSET=utf8;

INSERT INTO audit_trail VALUES("3","SV1_Admin","logged in","2022-11-29 12:32:22");
INSERT INTO audit_trail VALUES("5","SV1_Admin","logged in","2022-11-29 12:36:16");
INSERT INTO audit_trail VALUES("6","SV1_Admin","logged out","2022-11-29 12:36:18");
INSERT INTO audit_trail VALUES("7","SV1_Admin","logged in","2022-11-29 12:36:33");
INSERT INTO audit_trail VALUES("14","SV1_Admin","updated homeowner Mon Carlo Delima","2022-11-29 12:58:49");
INSERT INTO audit_trail VALUES("13","SV1_Admin","updated homeowner Mon Carlo Delim","2022-11-29 12:58:29");
INSERT INTO audit_trail VALUES("12","SV1_Admin","added homeowner Tristram Hudson","2022-11-29 12:56:04");
INSERT INTO audit_trail VALUES("17","SV1_Admin","deactivated user Kyle Andrei Casingal","2022-11-29 13:08:19");
INSERT INTO audit_trail VALUES("16","SV1_Admin","activated user Kyle Andrei Casingal","2022-11-29 13:06:29");
INSERT INTO audit_trail VALUES("18","SV1_Admin","logged in","2022-11-29 13:57:18");
INSERT INTO audit_trail VALUES("20","SV1_Admin","added a new amenity Sunnyvale 1-Bathhouse","2022-11-29 14:04:34");
INSERT INTO audit_trail VALUES("21","SV1_Admin","added a new amenity Sunnyvale 1-Bath","2022-11-29 14:05:41");
INSERT INTO audit_trail VALUES("24","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Bathhouse","2022-11-29 14:07:00");
INSERT INTO audit_trail VALUES("25","SV1_Admin","added a new subdivision Sunnyvale 10 Calumpang","2022-11-29 14:08:20");
INSERT INTO audit_trail VALUES("26","SV1_Admin","updated an existing subdivision Sunnyvale 10 Calum","2022-11-29 14:09:12");
INSERT INTO audit_trail VALUES("27","SV1_Admin","updated an existing subdivision Sunnyvale 10 Calumpang","2022-11-29 14:09:22");
INSERT INTO audit_trail VALUES("31","SV1_Admin","added a new monthly due Sunnyvale 10-50.00","2022-11-29 14:12:13");
INSERT INTO audit_trail VALUES("32","SV1_Admin","updated an existing monthly due Sunnyvale 10-720.00","2022-11-29 14:13:01");
INSERT INTO audit_trail VALUES("33","SV1_Admin","added a new system account SV1_TreasurerTreasurer","2022-11-29 14:16:20");
INSERT INTO audit_trail VALUES("34","SV1_Admin","added a new system account SV2_Admin-Admin","2022-11-29 14:17:28");
INSERT INTO audit_trail VALUES("35","SV1_Admin","updated an existing system account SV1_Treasurer-Treasurer","2022-11-29 14:18:50");
INSERT INTO audit_trail VALUES("36","SV1_Admin","updated an existing system account SV1_Treasurer-Treasurer","2022-11-29 14:19:03");
INSERT INTO audit_trail VALUES("37","SV1_Admin","added a new subdivision officer Chopper-Secretary","2022-11-29 14:23:46");
INSERT INTO audit_trail VALUES("38","SV1_Admin","updated an existing subdivision officer Chopper-Treasurer","2022-11-29 14:24:39");
INSERT INTO audit_trail VALUES("39","SV1_Admin","logged in","2022-11-29 14:30:54");
INSERT INTO audit_trail VALUES("40","SV1_Admin","logged out","2022-11-29 14:31:38");
INSERT INTO audit_trail VALUES("41","Mon Carlo Delima","logged in","2022-11-29 14:31:45");
INSERT INTO audit_trail VALUES("42","Mon Carlo Delima","logged out","2022-11-29 14:32:50");
INSERT INTO audit_trail VALUES("43","SV1_Admin","logged in","2022-11-29 14:32:54");
INSERT INTO audit_trail VALUES("44","SV1_Admin","logged out","2022-11-29 17:47:17");
INSERT INTO audit_trail VALUES("45","SV1_Admin","logged in","2022-11-29 17:47:29");
INSERT INTO audit_trail VALUES("46","SV1_Admin","added homeowner Ralph Monsour Delima","2022-11-29 17:49:12");
INSERT INTO audit_trail VALUES("47","SV1_Admin","updated homeowner Ralph Monsour Delima","2022-11-29 17:49:28");
INSERT INTO audit_trail VALUES("48","SV1_Admin","logged out","2022-11-29 17:50:11");
INSERT INTO audit_trail VALUES("49","SV1_Admin","logged in","2022-11-29 18:15:44");
INSERT INTO audit_trail VALUES("50","SV1_Admin","logged out","2022-11-29 18:16:29");
INSERT INTO audit_trail VALUES("51","SV1_Admin","logged in","2022-11-29 21:00:17");
INSERT INTO audit_trail VALUES("52","SV1_Admin","logged out","2022-11-29 21:03:43");
INSERT INTO audit_trail VALUES("53","SV1_Admin","logged in","2022-11-29 21:03:45");
INSERT INTO audit_trail VALUES("54","SV1_Admin","logged out","2022-11-29 21:05:05");
INSERT INTO audit_trail VALUES("55","SV1_Admin","logged in","2022-11-29 21:05:07");
INSERT INTO audit_trail VALUES("56","SV1_Admin","logged out","2022-11-29 21:06:39");
INSERT INTO audit_trail VALUES("57","Mon Carlo Delima","logged in","2022-11-29 21:06:53");
INSERT INTO audit_trail VALUES("58","Mon Carlo Delima","logged out","2022-11-29 21:24:55");
INSERT INTO audit_trail VALUES("59","Mon Carlo Delima","logged in","2022-11-29 21:24:57");
INSERT INTO audit_trail VALUES("60","Mon Carlo Delima","logged out","2022-11-29 21:25:29");
INSERT INTO audit_trail VALUES("61","Mon Carlo Delima","logged in","2022-11-29 21:25:31");
INSERT INTO audit_trail VALUES("62","Mon Carlo Delima","logged out","2022-11-29 22:11:34");
INSERT INTO audit_trail VALUES("63","SV1_Admin","logged in","2022-11-29 22:11:37");
INSERT INTO audit_trail VALUES("64","SV1_Admin","logged in","2022-11-29 23:10:34");
INSERT INTO audit_trail VALUES("65","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Basketball Court","2022-11-30 00:53:48");
INSERT INTO audit_trail VALUES("66","SV1_Admin","added a new subdivision Sunnyvale 11 Bilibiran","2022-11-30 00:55:31");
INSERT INTO audit_trail VALUES("67","SV1_Admin","logged in","2022-11-30 13:13:52");
INSERT INTO audit_trail VALUES("68","SV1_Admin","logged out","2022-11-30 13:15:09");
INSERT INTO audit_trail VALUES("69","SV1_Admin","logged in","2022-11-30 13:15:27");
INSERT INTO audit_trail VALUES("70","SV1_Admin","logged out","2022-11-30 13:35:15");
INSERT INTO audit_trail VALUES("71","SV1_Admin","logged in","2022-11-30 13:42:14");
INSERT INTO audit_trail VALUES("72","SV1_Admin","logged out","2022-11-30 13:50:47");
INSERT INTO audit_trail VALUES("73","SV1_Admin","logged in","2022-11-30 13:50:54");
INSERT INTO audit_trail VALUES("74","SV1_Admin","logged in","2022-11-30 13:51:50");
INSERT INTO audit_trail VALUES("75","SV1_Admin","logged out","2022-11-30 15:59:27");
INSERT INTO audit_trail VALUES("76","SV1_Admin","logged in","2022-11-30 15:59:51");
INSERT INTO audit_trail VALUES("77","SV1_Admin","logged out","2022-11-30 16:00:00");
INSERT INTO audit_trail VALUES("78","SV1_Admin","logged in","2022-11-30 16:06:03");
INSERT INTO audit_trail VALUES("79","SV1_Admin","logged out","2022-11-30 16:07:52");
INSERT INTO audit_trail VALUES("80","SV1_Treasurer","logged in","2022-11-30 16:08:27");
INSERT INTO audit_trail VALUES("81","SV1_Treasurer","logged out","2022-11-30 16:17:11");
INSERT INTO audit_trail VALUES("82","SV1_Admin","logged in","2022-11-30 16:17:20");
INSERT INTO audit_trail VALUES("83","SV1_Admin","logged out","2022-11-30 16:34:42");
INSERT INTO audit_trail VALUES("84","SV1_Secretary","logged in","2022-11-30 16:35:05");
INSERT INTO audit_trail VALUES("85","SV1_Secretary","logged out","2022-11-30 16:35:42");
INSERT INTO audit_trail VALUES("86","SV1_Admin","logged in","2022-11-30 16:35:49");
INSERT INTO audit_trail VALUES("87","SV1_Admin","logged out","2022-11-30 16:37:59");
INSERT INTO audit_trail VALUES("88","SV1_Admin","logged in","2022-11-30 16:38:08");
INSERT INTO audit_trail VALUES("89","SV1_Admin","logged out","2022-11-30 16:48:57");
INSERT INTO audit_trail VALUES("90","SV1_Admin","logged in","2022-11-30 16:49:17");
INSERT INTO audit_trail VALUES("91","SV1_Admin","logged out","2022-11-30 16:52:09");
INSERT INTO audit_trail VALUES("92","SV1_Secretary","logged in","2022-11-30 16:52:22");
INSERT INTO audit_trail VALUES("93","SV1_Secretary","logged out","2022-11-30 16:52:35");
INSERT INTO audit_trail VALUES("94","SV1_Admin","logged in","2022-11-30 21:55:37");
INSERT INTO audit_trail VALUES("95","SV1_Admin","logged out","2022-11-30 23:32:58");
INSERT INTO audit_trail VALUES("96","SV1_Admin","logged in","2022-11-30 23:33:06");
INSERT INTO audit_trail VALUES("97","SV1_Admin","logged out","2022-11-30 23:40:02");
INSERT INTO audit_trail VALUES("98","SV1_Admin","logged in","2022-11-30 23:40:12");
INSERT INTO audit_trail VALUES("99","SV1_Admin","reserved an amenity","2022-11-30 23:45:17");
INSERT INTO audit_trail VALUES("100","SV1_Admin","logged out","2022-11-30 23:53:02");
INSERT INTO audit_trail VALUES("101","SV1_Admin","logged in","2022-11-30 23:59:07");
INSERT INTO audit_trail VALUES("102","SV1_Admin","logged out","2022-12-01 00:00:03");
INSERT INTO audit_trail VALUES("103","SV1_Admin","logged in","2022-12-01 00:04:39");
INSERT INTO audit_trail VALUES("104","SV1_Admin","logged out","2022-12-01 00:05:18");
INSERT INTO audit_trail VALUES("105","Mon Carlo Delima","logged in","2022-12-01 00:08:11");
INSERT INTO audit_trail VALUES("106","Mon Carlo Delima","logged out","2022-12-01 01:41:29");
INSERT INTO audit_trail VALUES("107","SV1_Admin","logged in","2022-12-01 01:41:58");
INSERT INTO audit_trail VALUES("108","SV1_Admin","logged out","2022-12-01 01:43:16");
INSERT INTO audit_trail VALUES("109","Mon Carlo Delima","logged in","2022-12-01 01:43:26");
INSERT INTO audit_trail VALUES("110","Mon Carlo Delima","logged out","2022-12-01 03:14:51");
INSERT INTO audit_trail VALUES("111","John Doe","logged in","2022-12-01 03:16:07");
INSERT INTO audit_trail VALUES("112","John Doe","logged out","2022-12-01 03:56:21");
INSERT INTO audit_trail VALUES("113","Mon Carlo Delima","logged in","2022-12-01 03:56:28");
INSERT INTO audit_trail VALUES("114","SV1_Admin","logged out","2022-12-01 06:23:21");
INSERT INTO audit_trail VALUES("115","Mon Carlo Delima","logged in","2022-12-01 06:23:30");
INSERT INTO audit_trail VALUES("116","Mon Carlo Delima","logged out","2022-12-01 06:23:36");
INSERT INTO audit_trail VALUES("117","SV1_Treasurer","logged in","2022-12-01 06:23:55");
INSERT INTO audit_trail VALUES("118","SV1_Treasurer","logged out","2022-12-01 06:25:54");
INSERT INTO audit_trail VALUES("119","Mon Carlo Delima","logged in","2022-12-01 06:25:57");
INSERT INTO audit_trail VALUES("120","Mon Carlo Delima","reserved an amenity","2022-12-01 06:26:26");
INSERT INTO audit_trail VALUES("121","Mon Carlo Delima","logged out","2022-12-01 06:26:31");
INSERT INTO audit_trail VALUES("122","SV1_Treasurer","logged in","2022-12-01 06:26:35");
INSERT INTO audit_trail VALUES("123","SV1_Treasurer","logged out","2022-12-01 06:27:34");
INSERT INTO audit_trail VALUES("124","Mon Carlo Delima","logged in","2022-12-01 06:27:37");
INSERT INTO audit_trail VALUES("125","Mon Carlo Delima","logged out","2022-12-01 06:28:12");
INSERT INTO audit_trail VALUES("126","SV1_Admin","logged in","2022-12-01 06:28:15");
INSERT INTO audit_trail VALUES("127","SV1_Admin","added homeowner Marco Ivan Sta. Maria","2022-12-01 06:29:40");
INSERT INTO audit_trail VALUES("128","SV1_Admin","logged out","2022-12-01 06:34:43");
INSERT INTO audit_trail VALUES("129","Marco Ivan Sta. Maria","logged in","2022-12-01 06:34:50");
INSERT INTO audit_trail VALUES("130","Marco Ivan Sta. Maria","uploaded a new post","2022-12-01 06:37:21");
INSERT INTO audit_trail VALUES("131","Marco Ivan Sta. Maria","logged out","2022-12-01 06:40:06");
INSERT INTO audit_trail VALUES("132","Krishatelene Bendaña","logged in","2022-12-01 06:40:14");
INSERT INTO audit_trail VALUES("133","Krishatelene Bendaña","logged out","2022-12-01 06:42:48");
INSERT INTO audit_trail VALUES("134","Mon Carlo Delima","logged in","2022-12-01 06:42:53");
INSERT INTO audit_trail VALUES("135","Mon Carlo Delima","logged out","2022-12-01 06:42:54");
INSERT INTO audit_trail VALUES("136","SV1_Admin","logged in","2022-12-01 06:42:58");
INSERT INTO audit_trail VALUES("137","SV1_Admin","logged out","2022-12-01 06:42:59");
INSERT INTO audit_trail VALUES("138","Krishatelene Bendaña","logged in","2022-12-01 06:43:06");
INSERT INTO audit_trail VALUES("139","Krishtalene Bendaña","uploaded a new post","2022-12-01 06:48:14");
INSERT INTO audit_trail VALUES("140","Krishtalene Bendaña","uploaded a new post","2022-12-01 06:48:54");
INSERT INTO audit_trail VALUES("141","Krishtalene Bendaña","logged out","2022-12-01 06:49:01");
INSERT INTO audit_trail VALUES("142","Marco Ivan Sta. Maria","logged in","2022-12-01 06:49:06");
INSERT INTO audit_trail VALUES("143","Marco Ivan Sta. Maria","uploaded a new post","2022-12-01 06:49:23");
INSERT INTO audit_trail VALUES("144","Marco Ivan Sta. Maria","logged out","2022-12-01 06:50:03");
INSERT INTO audit_trail VALUES("145","Krishtalene Bendaña","logged in","2022-12-01 06:50:06");
INSERT INTO audit_trail VALUES("146","Krishtalene Bendaña","uploaded a new post","2022-12-01 06:50:15");
INSERT INTO audit_trail VALUES("147","Krishtalene Bendaña","logged out","2022-12-01 06:50:41");
INSERT INTO audit_trail VALUES("148","Marco Ivan Sta. Maria","logged in","2022-12-01 06:50:44");
INSERT INTO audit_trail VALUES("149","Marco Ivan Sta. Maria","uploaded a new post","2022-12-01 06:51:00");
INSERT INTO audit_trail VALUES("150","Marco Ivan Sta. Maria","logged out","2022-12-01 06:51:10");
INSERT INTO audit_trail VALUES("151","Marco Ivan Sta. Maria","logged in","2022-12-01 06:53:46");
INSERT INTO audit_trail VALUES("152","Marco Ivan Sta. Maria","uploaded a new post","2022-12-01 06:53:50");
INSERT INTO audit_trail VALUES("153","Marco Ivan Sta. Maria","uploaded a new post","2022-12-01 06:54:48");
INSERT INTO audit_trail VALUES("154","Marco Ivan Sta. Maria","uploaded a new post","2022-12-01 06:55:39");
INSERT INTO audit_trail VALUES("155","Marco Ivan Sta. Maria","logged out","2022-12-01 06:59:45");
INSERT INTO audit_trail VALUES("156","SV1_Treasurer","logged in","2022-12-01 06:59:50");
INSERT INTO audit_trail VALUES("157","SV1_Treasurer","logged out","2022-12-01 07:00:11");
INSERT INTO audit_trail VALUES("158","Mon Carlo Delima","logged in","2022-12-01 07:00:14");
INSERT INTO audit_trail VALUES("159","Mon Carlo Delima","logged out","2022-12-01 07:00:21");
INSERT INTO audit_trail VALUES("160","SV1_Admin","logged in","2022-12-01 08:45:05");
INSERT INTO audit_trail VALUES("161","SV1_Admin","logged out","2022-12-01 09:02:26");
INSERT INTO audit_trail VALUES("162","John Doe","logged in","2022-12-01 09:02:51");
INSERT INTO audit_trail VALUES("163","John Doe","logged out","2022-12-01 09:08:37");
INSERT INTO audit_trail VALUES("164","Kyle Andrei Casingal","created an account","2022-12-01 09:10:14");
INSERT INTO audit_trail VALUES("165","kylecasingal36@gmail.com","verified their email","2022-12-01 09:10:39");
INSERT INTO audit_trail VALUES("166","SV1_Admin","logged in","2022-12-01 09:10:50");
INSERT INTO audit_trail VALUES("167","SV1_Admin","activated user Kyle Andrei Casingal","2022-12-01 09:11:02");
INSERT INTO audit_trail VALUES("168","SV1_Admin","logged out","2022-12-01 09:11:05");
INSERT INTO audit_trail VALUES("169","SV1_Admin","logged in","2022-12-01 09:12:31");
INSERT INTO audit_trail VALUES("170","SV1_Admin","deactivated user John Doe","2022-12-01 09:12:59");
INSERT INTO audit_trail VALUES("171","SV1_Admin","activated user John Doe","2022-12-01 09:13:09");
INSERT INTO audit_trail VALUES("172","SV1_Admin","deactivated user John Doe","2022-12-01 09:13:46");
INSERT INTO audit_trail VALUES("173","SV1_Admin","deactivated user Roiemar Escueta","2022-12-01 09:13:46");
INSERT INTO audit_trail VALUES("174","SV1_Admin","activated user John Doe","2022-12-01 09:15:52");
INSERT INTO audit_trail VALUES("175","SV1_Admin","activated user janwel castillo","2022-12-01 09:15:52");
INSERT INTO audit_trail VALUES("176","SV1_Admin","deactivated user John Doe","2022-12-01 09:16:01");
INSERT INTO audit_trail VALUES("177","SV1_Admin","deactivated user janwel castillo","2022-12-01 09:16:01");
INSERT INTO audit_trail VALUES("178","SV1_Admin","logged out","2022-12-01 09:17:25");
INSERT INTO audit_trail VALUES("179","SV1_Admin","logged in","2022-12-01 09:17:43");
INSERT INTO audit_trail VALUES("180","SV1_Admin","logged out","2022-12-01 09:18:46");
INSERT INTO audit_trail VALUES("181","SV1_Admin","logged in","2022-12-01 09:26:41");
INSERT INTO audit_trail VALUES("182","SV1_Admin","logged out","2022-12-01 10:05:25");
INSERT INTO audit_trail VALUES("183","Kyle Andrei Casingal","created an account","2022-12-01 10:10:32");
INSERT INTO audit_trail VALUES("184","kylecasingal36@gmail.com","verified their email","2022-12-01 10:11:20");
INSERT INTO audit_trail VALUES("185","SV1_Admin","logged in","2022-12-01 10:12:15");
INSERT INTO audit_trail VALUES("186","SV1_Admin","activated user Kyle Andrei Casingal","2022-12-01 10:12:24");
INSERT INTO audit_trail VALUES("187","SV1_Admin","logged out","2022-12-01 10:12:27");
INSERT INTO audit_trail VALUES("188","Kyle Andrei Casingal","logged in","2022-12-01 10:12:37");
INSERT INTO audit_trail VALUES("189","Kyle Andrei Casingal","uploaded a new post","2022-12-01 10:13:20");
INSERT INTO audit_trail VALUES("190","Kyle Andrei Casingal","reserved an amenity","2022-12-01 10:14:41");
INSERT INTO audit_trail VALUES("191","Kyle Andrei Casingal","logged out","2022-12-01 10:14:55");
INSERT INTO audit_trail VALUES("192","Kyle Andrei Casingal","logged in","2022-12-01 10:15:08");
INSERT INTO audit_trail VALUES("193","Kyle Andrei Casingal","logged out","2022-12-01 10:15:51");
INSERT INTO audit_trail VALUES("194","Kyle Andrei Casingal","logged in","2022-12-01 10:15:59");
INSERT INTO audit_trail VALUES("195","Kyle Andrei Casingal","submitted a concern","2022-12-01 10:16:33");
INSERT INTO audit_trail VALUES("196","Kyle Andrei Casingal","logged out","2022-12-01 10:16:42");
INSERT INTO audit_trail VALUES("197","SV1_Admin","logged in","2022-12-01 10:16:49");
INSERT INTO audit_trail VALUES("198","SV1_Admin","logged out","2022-12-01 10:17:27");
INSERT INTO audit_trail VALUES("199","SV1_Treasurer","logged in","2022-12-01 10:17:44");
INSERT INTO audit_trail VALUES("200","SV1_Treasurer","logged out","2022-12-01 10:17:56");
INSERT INTO audit_trail VALUES("201","SV1_Secretary","logged in","2022-12-01 10:18:06");
INSERT INTO audit_trail VALUES("202","SV1_Secretary","logged out","2022-12-01 10:18:23");
INSERT INTO audit_trail VALUES("203","SV1_Admin","logged in","2022-12-01 10:18:41");
INSERT INTO audit_trail VALUES("204","SV1_Admin","added homeowner Cardo Dalisay","2022-12-01 10:20:28");
INSERT INTO audit_trail VALUES("205","SV1_Admin","updated homeowner Cardo Dalisay","2022-12-01 10:21:00");
INSERT INTO audit_trail VALUES("206","SV1_Admin","deactivated user Krishtalene Bendaña","2022-12-01 10:21:54");
INSERT INTO audit_trail VALUES("207","SV1_Admin","deactivated user Kyle Andrei Casingal","2022-12-01 10:21:54");
INSERT INTO audit_trail VALUES("208","SV1_Admin","activated user Krishtalene Bendaña","2022-12-01 10:22:16");
INSERT INTO audit_trail VALUES("209","SV1_Admin","activated user Kyle Andrei Casingal","2022-12-01 10:22:16");
INSERT INTO audit_trail VALUES("210","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Basketball Court","2022-12-01 10:22:49");
INSERT INTO audit_trail VALUES("211","SV1_Admin","logged in","2023-01-13 13:30:20");
INSERT INTO audit_trail VALUES("212","SV1_Admin","logged out","2023-01-13 13:35:53");
INSERT INTO audit_trail VALUES("213","SV1_Admin","logged in","2023-01-13 13:36:09");
INSERT INTO audit_trail VALUES("214","SV1_Admin","logged out","2023-01-13 13:38:21");
INSERT INTO audit_trail VALUES("215","SV1_Admin","logged in","2023-01-13 13:38:30");
INSERT INTO audit_trail VALUES("216","SV1_Admin","logged out","2023-01-13 13:38:41");
INSERT INTO audit_trail VALUES("217","SV1_Admin","logged in","2023-01-13 13:38:48");
INSERT INTO audit_trail VALUES("218","SV1_Admin","logged out","2023-01-13 13:38:51");
INSERT INTO audit_trail VALUES("219","SV1_Admin","logged in","2023-01-13 13:39:01");
INSERT INTO audit_trail VALUES("220","Mon Carlo Delima","logged out","2023-01-13 14:33:50");
INSERT INTO audit_trail VALUES("221","SV1_Admin","logged in","2023-01-13 14:33:53");
INSERT INTO audit_trail VALUES("222","SV1_Admin","logged out","2023-01-13 14:39:57");
INSERT INTO audit_trail VALUES("223","SV1_Admin","logged in","2023-01-13 14:40:00");
INSERT INTO audit_trail VALUES("224","SV1_Admin","logged out","2023-01-13 17:54:10");
INSERT INTO audit_trail VALUES("225","SV1_Admin","logged in","2023-01-13 17:54:12");
INSERT INTO audit_trail VALUES("226","SV1_Admin","logged out","2023-01-13 17:54:35");
INSERT INTO audit_trail VALUES("227","Mon Carlo Delima","logged in","2023-01-13 17:54:39");
INSERT INTO audit_trail VALUES("228","Mon Carlo Delima","logged out","2023-01-13 17:54:56");
INSERT INTO audit_trail VALUES("229","SV1_Admin","logged in","2023-01-13 17:54:59");
INSERT INTO audit_trail VALUES("230","SV1_Admin","logged out","2023-01-13 18:10:15");
INSERT INTO audit_trail VALUES("231","SV1_Admin","logged in","2023-01-13 18:10:17");
INSERT INTO audit_trail VALUES("232","SV1_Admin","logged out","2023-01-14 16:43:31");
INSERT INTO audit_trail VALUES("233","Mon Carlo Delima","logged in","2023-01-14 16:43:35");
INSERT INTO audit_trail VALUES("234","Mon Carlo Delima","logged out","2023-01-14 17:15:18");
INSERT INTO audit_trail VALUES("235","Mon Carlo Delima","logged in","2023-01-14 17:15:21");
INSERT INTO audit_trail VALUES("236","Mon Carlo Delima","logged out","2023-01-14 17:20:46");
INSERT INTO audit_trail VALUES("237","Mon Carlo Delima","logged in","2023-01-14 17:20:49");
INSERT INTO audit_trail VALUES("238","Mon Carlo Delima","logged out","2023-01-14 17:21:20");
INSERT INTO audit_trail VALUES("239","SV1_Treasurer","logged in","2023-01-14 17:21:25");
INSERT INTO audit_trail VALUES("240","SV1_Treasurer","logged out","2023-01-14 17:21:29");
INSERT INTO audit_trail VALUES("241","SV1_Admin","logged in","2023-01-14 17:21:35");
INSERT INTO audit_trail VALUES("242","SV1_Admin","logged out","2023-01-14 17:24:30");
INSERT INTO audit_trail VALUES("243","Mon Carlo Delima","logged in","2023-01-14 17:24:32");
INSERT INTO audit_trail VALUES("244","Mon Carlo Delima","logged out","2023-01-14 17:26:29");
INSERT INTO audit_trail VALUES("245","SV1_Admin","logged in","2023-01-14 17:26:36");
INSERT INTO audit_trail VALUES("246","SV1_Admin","logged out","2023-01-14 17:27:16");
INSERT INTO audit_trail VALUES("247","Mon Carlo Delima","logged in","2023-01-14 17:27:19");
INSERT INTO audit_trail VALUES("248","Mon Carlo Delima","logged out","2023-01-14 17:40:47");
INSERT INTO audit_trail VALUES("249","SV1_Admin","logged in","2023-01-14 17:40:50");
INSERT INTO audit_trail VALUES("250","SV1_Admin","logged out","2023-01-14 17:41:29");
INSERT INTO audit_trail VALUES("251","Mon Carlo Delima","logged in","2023-01-14 17:41:33");
INSERT INTO audit_trail VALUES("252","Mon Carlo Delima","logged out","2023-01-14 17:42:18");
INSERT INTO audit_trail VALUES("253","SV1_Admin","logged in","2023-01-14 17:42:20");
INSERT INTO audit_trail VALUES("254","SV1_Admin","logged out","2023-01-14 17:43:05");
INSERT INTO audit_trail VALUES("255","Mon Carlo Delima","logged in","2023-01-14 17:43:09");
INSERT INTO audit_trail VALUES("256","Mon Carlo Delima","logged out","2023-01-14 17:47:08");
INSERT INTO audit_trail VALUES("257","Mon Carlo Delima","logged in","2023-01-14 21:27:15");
INSERT INTO audit_trail VALUES("258","Mon Carlo Delima","logged out","2023-01-15 11:16:23");
INSERT INTO audit_trail VALUES("259","SV1_Admin","logged in","2023-01-15 11:16:25");
INSERT INTO audit_trail VALUES("260","SV1_Admin","logged out","2023-01-15 11:17:45");
INSERT INTO audit_trail VALUES("261","Mon Carlo Delima","logged in","2023-01-15 11:17:49");
INSERT INTO audit_trail VALUES("262","Mon Carlo Delima","logged out","2023-01-15 11:26:25");
INSERT INTO audit_trail VALUES("263","Mon Carlo Delima","logged in","2023-01-15 11:26:33");
INSERT INTO audit_trail VALUES("264","Mon Carlo Delima","logged out","2023-01-15 11:50:11");
INSERT INTO audit_trail VALUES("265","SV1_Admin","logged in","2023-01-15 11:50:13");
INSERT INTO audit_trail VALUES("266","SV1_Admin","logged out","2023-01-15 11:50:54");
INSERT INTO audit_trail VALUES("267","Mon Carlo Delima","logged in","2023-01-15 11:50:57");
INSERT INTO audit_trail VALUES("268","Mon Carlo Delima","logged out","2023-01-15 12:06:34");
INSERT INTO audit_trail VALUES("269","SV1_Admin","logged in","2023-01-15 12:06:36");
INSERT INTO audit_trail VALUES("270","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Basketball","2023-01-15 12:06:57");
INSERT INTO audit_trail VALUES("271","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Basketball Court","2023-01-15 12:07:03");
INSERT INTO audit_trail VALUES("272","SV1_Admin","logged out","2023-01-15 12:08:04");
INSERT INTO audit_trail VALUES("273","SV1_Admin","logged in","2023-01-15 12:08:07");
INSERT INTO audit_trail VALUES("274","SV1_Admin","updated homeowner Mon Carl Delima","2023-01-15 12:08:32");
INSERT INTO audit_trail VALUES("275","SV1_Admin","updated homeowner Mon Carlo Delima","2023-01-15 12:08:48");
INSERT INTO audit_trail VALUES("276","SV1_Admin","updated homeowner Mon Carl Delima","2023-01-15 12:08:53");
INSERT INTO audit_trail VALUES("277","SV1_Admin","updated homeowner Mon Carlo Delima","2023-01-15 12:08:57");
INSERT INTO audit_trail VALUES("278","SV1_Admin","logged out","2023-01-15 12:09:14");
INSERT INTO audit_trail VALUES("279","Mon Carlo Delima","logged in","2023-01-15 12:09:18");
INSERT INTO audit_trail VALUES("280","Mon Carlo Delima","logged out","2023-01-15 15:49:45");
INSERT INTO audit_trail VALUES("281","SV1_Admin","logged in","2023-01-15 15:49:52");
INSERT INTO audit_trail VALUES("282","SV1_Admin","logged out","2023-01-15 15:50:11");
INSERT INTO audit_trail VALUES("283","SV1_Admin","logged in","2023-01-15 15:51:36");
INSERT INTO audit_trail VALUES("284","SV1_Admin","logged out","2023-01-15 15:55:36");
INSERT INTO audit_trail VALUES("285","Mon Carlo Delima","logged in","2023-01-15 15:55:39");
INSERT INTO audit_trail VALUES("286","Mon Carlo Delima","logged out","2023-01-15 16:17:42");
INSERT INTO audit_trail VALUES("287","SV1_Admin","logged in","2023-01-15 16:30:41");
INSERT INTO audit_trail VALUES("288","SV1_Admin","logged out","2023-01-18 21:19:10");
INSERT INTO audit_trail VALUES("289","Mon Carlo Delima","logged in","2023-01-18 21:19:13");
INSERT INTO audit_trail VALUES("290","Mon Carlo Delima","logged in","2023-01-18 22:03:53");
INSERT INTO audit_trail VALUES("291","Mon Carlo Delima","uploaded a new post","2023-01-18 22:10:04");
INSERT INTO audit_trail VALUES("292","Mon Carlo Delima","uploaded a new post","2023-01-20 09:07:53");
INSERT INTO audit_trail VALUES("293","Mon Carlo Delima","uploaded a new post","2023-01-20 09:08:12");
INSERT INTO audit_trail VALUES("294","SV1_Admin","logged out","2023-01-24 19:58:31");
INSERT INTO audit_trail VALUES("295","SV1_Admin","logged in","2023-01-24 19:58:36");
INSERT INTO audit_trail VALUES("296","SV1_Admin","uploaded a new post","2023-01-24 20:00:38");
INSERT INTO audit_trail VALUES("297","SV1_Admin","logged out","2023-01-24 20:00:42");
INSERT INTO audit_trail VALUES("298","SV1_Admin","logged in","2023-01-24 20:01:33");
INSERT INTO audit_trail VALUES("299","SV1_Admin","uploaded a new post","2023-01-24 20:06:20");
INSERT INTO audit_trail VALUES("300","SV1_Admin","logged out","2023-01-24 20:10:40");
INSERT INTO audit_trail VALUES("301","Mon Carlo Delima","logged in","2023-01-24 20:10:45");
INSERT INTO audit_trail VALUES("302","Mon Carlo Delima","logged out","2023-01-24 20:12:57");
INSERT INTO audit_trail VALUES("303","Mon Carlo Delima","logged in","2023-01-24 20:14:08");
INSERT INTO audit_trail VALUES("304","Mon Carlo Delima","logged out","2023-01-24 20:14:36");
INSERT INTO audit_trail VALUES("305","Mon Carlo Delima","logged in","2023-01-24 20:14:40");
INSERT INTO audit_trail VALUES("306","SV1_Admin","logged in","2023-01-24 20:16:04");
INSERT INTO audit_trail VALUES("307","Mon Carlo Delima","logged out","2023-01-27 19:00:55");
INSERT INTO audit_trail VALUES("308","SV1_Admin","logged in","2023-01-27 19:00:58");
INSERT INTO audit_trail VALUES("309","SV1_Admin","logged out","2023-01-30 20:30:02");
INSERT INTO audit_trail VALUES("310","Mon Carlo Delima","logged in","2023-01-30 20:30:04");
INSERT INTO audit_trail VALUES("311","Mon Carlo Delima","logged out","2023-01-30 20:35:01");
INSERT INTO audit_trail VALUES("312","Mon Carlo Delima","logged in","2023-01-30 20:35:03");
INSERT INTO audit_trail VALUES("313","Mon Carlo Delima","logged in","2023-01-30 20:48:05");
INSERT INTO audit_trail VALUES("314","Mon Carlo Delima","logged out","2023-01-30 20:48:08");
INSERT INTO audit_trail VALUES("315","SV1_Admin","logged in","2023-01-30 20:48:13");
INSERT INTO audit_trail VALUES("316","SV1_Admin","logged out","2023-01-30 20:49:42");
INSERT INTO audit_trail VALUES("317","Mon Carlo Delima","logged in","2023-01-30 20:49:45");
INSERT INTO audit_trail VALUES("318","Mon Carlo Delima","logged out","2023-01-30 21:09:28");
INSERT INTO audit_trail VALUES("319","SV1_Admin","logged in","2023-01-30 21:09:31");
INSERT INTO audit_trail VALUES("320","SV1_Admin","logged out","2023-01-30 21:09:58");
INSERT INTO audit_trail VALUES("321","Mon Carlo Delima","logged in","2023-01-30 21:10:01");
INSERT INTO audit_trail VALUES("322","Mon Carlo Delima","logged out","2023-01-30 21:17:47");
INSERT INTO audit_trail VALUES("323","Mon Carlo Delima","logged in","2023-01-30 21:17:53");
INSERT INTO audit_trail VALUES("324","Mon Carlo Delima","logged out","2023-01-30 21:21:23");
INSERT INTO audit_trail VALUES("325","Mon Carlo Delima","logged in","2023-01-30 21:21:26");
INSERT INTO audit_trail VALUES("326","Mon Carlo Delima","logged out","2023-01-30 21:29:44");
INSERT INTO audit_trail VALUES("327","Mon Carlo Delima","logged in","2023-01-30 21:29:46");
INSERT INTO audit_trail VALUES("328","Mon Carlo Delima","logged out","2023-01-30 21:36:26");
INSERT INTO audit_trail VALUES("329","Mon Carlo Delima","logged in","2023-01-30 21:36:28");
INSERT INTO audit_trail VALUES("330","Mon Carlo Delima","logged out","2023-01-30 21:36:40");
INSERT INTO audit_trail VALUES("331","Mon Carlo Delima","logged in","2023-01-30 21:36:41");
INSERT INTO audit_trail VALUES("332","Mon Carlo Delima","logged out","2023-01-30 21:36:50");
INSERT INTO audit_trail VALUES("333","Mon Carlo Delima","logged in","2023-01-30 21:36:51");
INSERT INTO audit_trail VALUES("334","Mon Carlo Delima","logged out","2023-02-01 18:43:53");
INSERT INTO audit_trail VALUES("335","Mon Carlo Delima","logged in","2023-02-01 18:43:57");
INSERT INTO audit_trail VALUES("336","Mon Carlo Delima","logged out","2023-02-01 19:12:20");
INSERT INTO audit_trail VALUES("337","SV1_Admin","logged in","2023-02-01 19:12:23");
INSERT INTO audit_trail VALUES("338","SV1_Admin","logged out","2023-02-01 19:13:39");
INSERT INTO audit_trail VALUES("339","Mon Carlo Delima","logged in","2023-02-01 19:14:00");
INSERT INTO audit_trail VALUES("340","Mon Carlo Delima","logged out","2023-02-01 20:14:33");
INSERT INTO audit_trail VALUES("341","Mon Carlo Delima","logged in","2023-02-01 20:14:37");
INSERT INTO audit_trail VALUES("342","Mon Carlo Delima","logged out","2023-02-03 22:48:43");
INSERT INTO audit_trail VALUES("343","SV1_Admin","logged in","2023-02-03 22:48:46");
INSERT INTO audit_trail VALUES("344","SV1_Admin","logged out","2023-02-04 14:02:17");
INSERT INTO audit_trail VALUES("345","SV1_Admin","logged in","2023-02-04 14:02:24");
INSERT INTO audit_trail VALUES("346","SV1_Admin","logged out","2023-02-04 15:23:51");
INSERT INTO audit_trail VALUES("347","SV1_Admin","logged in","2023-02-04 15:23:54");
INSERT INTO audit_trail VALUES("348","SV1_Admin","logged in","2023-02-04 15:24:55");
INSERT INTO audit_trail VALUES("349","SV1_Admin","logged out","2023-02-04 15:25:09");
INSERT INTO audit_trail VALUES("350","SV1_Admin","logged in","2023-02-04 15:25:11");
INSERT INTO audit_trail VALUES("351","SV1_Admin","logged out","2023-02-04 15:25:15");
INSERT INTO audit_trail VALUES("352","Mon Carlo Delima","logged in","2023-02-04 15:25:17");
INSERT INTO audit_trail VALUES("353","SV1_Admin","logged out","2023-02-06 16:36:40");
INSERT INTO audit_trail VALUES("354","SV1_Admin","logged in","2023-02-06 16:36:43");
INSERT INTO audit_trail VALUES("355","SV1_Admin","logged out","2023-02-06 16:39:33");
INSERT INTO audit_trail VALUES("356","SV1_Admin","logged in","2023-02-06 16:39:36");
INSERT INTO audit_trail VALUES("357","SV1_Admin","logged out","2023-02-06 16:42:41");
INSERT INTO audit_trail VALUES("358","SV1_Admin","logged in","2023-02-06 16:42:45");
INSERT INTO audit_trail VALUES("359","Mon Carlo Delima","logged in","2023-02-06 17:41:45");
INSERT INTO audit_trail VALUES("360","SV1_Admin","logged out","2023-02-07 17:01:41");
INSERT INTO audit_trail VALUES("361","Mon Carlo Delima","logged in","2023-02-07 17:01:48");
INSERT INTO audit_trail VALUES("362","Mon Carlo Delima","logged out","2023-02-07 17:19:20");
INSERT INTO audit_trail VALUES("363","Mon Carlo Delima","logged in","2023-02-10 10:25:18");
INSERT INTO audit_trail VALUES("364","Mon Carlo Delima","logged out","2023-02-10 14:25:46");
INSERT INTO audit_trail VALUES("365","SV1_Admin","logged in","2023-02-10 14:25:50");
INSERT INTO audit_trail VALUES("366","Mon Carlo Delima","logged in","2023-02-10 14:26:11");
INSERT INTO audit_trail VALUES("367","Mon Carlo Delima","logged out","2023-02-10 14:26:37");
INSERT INTO audit_trail VALUES("368","Mon Carlo Delima","logged in","2023-02-10 14:26:39");
INSERT INTO audit_trail VALUES("369","SV1_Admin","logged out","2023-02-11 13:10:56");
INSERT INTO audit_trail VALUES("370","Mon Carlo Delima","logged in","2023-02-11 13:11:18");
INSERT INTO audit_trail VALUES("371","Mon Carlo Delima","logged out","2023-02-11 14:38:43");
INSERT INTO audit_trail VALUES("372","SV1_Admin","logged in","2023-02-11 14:38:46");
INSERT INTO audit_trail VALUES("373","SV1_Admin","logged out","2023-02-11 15:53:23");
INSERT INTO audit_trail VALUES("374","Mon Carlo Delima","logged in","2023-02-11 15:53:25");
INSERT INTO audit_trail VALUES("375","Mon Carlo Delima","logged out","2023-02-11 15:56:19");
INSERT INTO audit_trail VALUES("376","SV1_Admin","logged in","2023-02-11 15:58:47");
INSERT INTO audit_trail VALUES("377","SV1_Admin","logged out","2023-02-11 15:58:51");
INSERT INTO audit_trail VALUES("378","Mon Carlo Delima","logged in","2023-02-11 15:58:56");
INSERT INTO audit_trail VALUES("379","Mon Carlo Delima","logged out","2023-02-12 16:35:26");
INSERT INTO audit_trail VALUES("380","Mon Carlo Delima","logged in","2023-02-12 16:35:36");
INSERT INTO audit_trail VALUES("381","Mon Carlo Delima","logged out","2023-02-14 18:24:06");
INSERT INTO audit_trail VALUES("382","SV1_Admin","logged in","2023-02-14 18:24:11");
INSERT INTO audit_trail VALUES("383","SV1_Admin","logged out","2023-02-14 21:32:16");
INSERT INTO audit_trail VALUES("384","SV1_Admin","logged in","2023-02-14 21:32:22");
INSERT INTO audit_trail VALUES("385","SV1_Admin","logged out","2023-02-14 21:32:26");
INSERT INTO audit_trail VALUES("386","Mon Carlo Delima","logged in","2023-02-14 21:32:29");
INSERT INTO audit_trail VALUES("387","Mon Carlo Delima","logged out","2023-02-14 22:22:38");
INSERT INTO audit_trail VALUES("388","Mon Carlo Delima","logged in","2023-02-14 22:23:01");
INSERT INTO audit_trail VALUES("389","SV1_Treasurer","logged in","2023-02-16 00:58:57");
INSERT INTO audit_trail VALUES("390","SV1_Treasurer","logged out","2023-02-16 01:30:01");
INSERT INTO audit_trail VALUES("391","SV1_Treasurer","logged in","2023-02-16 01:39:20");
INSERT INTO audit_trail VALUES("392","SV1_Admin","logged in","2023-02-18 13:07:41");
INSERT INTO audit_trail VALUES("393","SV1_Treasurer","logged in","2023-02-20 08:30:38");
INSERT INTO audit_trail VALUES("394","SV1_Treasurer","logged out","2023-02-20 08:50:17");
INSERT INTO audit_trail VALUES("395","SV1_Treasurer","logged in","2023-02-20 11:00:09");
INSERT INTO audit_trail VALUES("396","SV1_Treasurer","logged in","2023-02-20 11:41:51");
INSERT INTO audit_trail VALUES("397","SV1_Treasurer","logged in","2023-03-18 18:44:00");
INSERT INTO audit_trail VALUES("398","SV1_Treasurer","logged out","2023-03-18 22:04:11");
INSERT INTO audit_trail VALUES("399","SV1_Admin","logged in","2023-03-18 22:04:14");
INSERT INTO audit_trail VALUES("400","SV1_Admin","logged out","2023-03-18 22:04:33");
INSERT INTO audit_trail VALUES("401","SV1_Treasurer","logged in","2023-03-18 22:05:22");
INSERT INTO audit_trail VALUES("402","SV1_Treasurer","logged in","2023-03-20 14:56:10");
INSERT INTO audit_trail VALUES("403","SV1_Treasurer","logged in","2023-03-22 07:54:03");
INSERT INTO audit_trail VALUES("404","SV1_Treasurer","logged in","2023-03-22 11:10:42");
INSERT INTO audit_trail VALUES("405","SV1_Treasurer","logged in","2023-03-22 13:24:08");
INSERT INTO audit_trail VALUES("406","SV1_Admin","logged in","2023-04-01 13:04:18");
INSERT INTO audit_trail VALUES("407","SV1_Admin","logged out","2023-04-01 13:43:26");
INSERT INTO audit_trail VALUES("408","SV1_Admin","logged in","2023-04-01 13:43:28");
INSERT INTO audit_trail VALUES("409","SV1_Admin","logged out","2023-04-01 13:43:47");
INSERT INTO audit_trail VALUES("410","SV1_Admin","logged in","2023-04-01 13:43:49");
INSERT INTO audit_trail VALUES("411","SV1_Admin","logged out","2023-04-01 13:44:06");
INSERT INTO audit_trail VALUES("412","SV1_Admin","logged in","2023-04-01 13:44:09");
INSERT INTO audit_trail VALUES("413","SV1_Admin","logged out","2023-04-01 13:46:43");
INSERT INTO audit_trail VALUES("414","SV1_Admin","logged in","2023-04-01 13:46:46");
INSERT INTO audit_trail VALUES("415","SV1_Admin","logged out","2023-04-01 14:00:24");
INSERT INTO audit_trail VALUES("416","SV1_Admin","logged in","2023-04-01 14:00:27");
INSERT INTO audit_trail VALUES("417","SV1_Admin","logged out","2023-04-01 14:13:13");
INSERT INTO audit_trail VALUES("418","SV1_Admin","logged in","2023-04-01 14:13:16");
INSERT INTO audit_trail VALUES("419","SV1_Admin","logged out","2023-04-01 14:13:17");
INSERT INTO audit_trail VALUES("420","Mon Carlo Delima","logged in","2023-04-01 14:13:21");
INSERT INTO audit_trail VALUES("421","Mon Carlo Delima","logged out","2023-04-01 14:13:41");
INSERT INTO audit_trail VALUES("422","SV1_Treasurer","logged in","2023-04-01 14:13:44");
INSERT INTO audit_trail VALUES("423","SV1_Treasurer","logged out","2023-04-01 21:41:30");
INSERT INTO audit_trail VALUES("424","SV1_Admin","logged in","2023-04-01 21:41:33");
INSERT INTO audit_trail VALUES("425","SV1_Admin","logged out","2023-04-01 22:18:05");
INSERT INTO audit_trail VALUES("426","Mon Carlo Delima","logged in","2023-04-01 22:18:08");
INSERT INTO audit_trail VALUES("427","Mon Carlo Delima","uploaded a new post","2023-04-01 22:19:20");
INSERT INTO audit_trail VALUES("428","Mon Carlo Delima","uploaded a new post","2023-04-01 22:20:08");
INSERT INTO audit_trail VALUES("429","Mon Carlo Delima","uploaded a new post","2023-04-01 22:20:36");
INSERT INTO audit_trail VALUES("430","Mon Carlo Delima","uploaded a new post","2023-04-01 22:21:36");
INSERT INTO audit_trail VALUES("431","Mon Carlo Delima","logged out","2023-04-01 22:21:55");
INSERT INTO audit_trail VALUES("432","SV1_Admin","logged in","2023-04-01 22:21:58");
INSERT INTO audit_trail VALUES("433","SV1_Admin","uploaded a new post","2023-04-01 22:22:03");
INSERT INTO audit_trail VALUES("434","SV1_Admin","logged out","2023-04-01 22:22:13");
INSERT INTO audit_trail VALUES("435","Mon Carlo Delima","logged in","2023-04-01 22:22:16");
INSERT INTO audit_trail VALUES("436","Mon Carlo Delima","uploaded a new post","2023-04-01 22:24:20");
INSERT INTO audit_trail VALUES("437","Mon Carlo Delima","logged out","2023-04-02 12:33:54");
INSERT INTO audit_trail VALUES("438","SV1_Admin","logged in","2023-04-02 12:33:57");
INSERT INTO audit_trail VALUES("439","SV1_Admin","logged out","2023-04-02 12:37:58");
INSERT INTO audit_trail VALUES("440","SV1_Admin","logged in","2023-04-02 12:38:01");
INSERT INTO audit_trail VALUES("441","SV1_Admin","logged out","2023-04-02 12:38:05");
INSERT INTO audit_trail VALUES("442","SV1_Treasurer","logged in","2023-04-02 12:38:09");
INSERT INTO audit_trail VALUES("443","SV1_Treasurer","logged out","2023-04-02 12:38:13");
INSERT INTO audit_trail VALUES("444","SV1_Admin","logged in","2023-04-02 12:38:15");
INSERT INTO audit_trail VALUES("445","SV1_Admin","logged out","2023-04-02 12:39:45");
INSERT INTO audit_trail VALUES("446","Mon Carlo Delima","logged in","2023-04-02 12:39:55");
INSERT INTO audit_trail VALUES("447","Mon Carlo Delima","logged out","2023-04-02 12:42:58");
INSERT INTO audit_trail VALUES("448","SV1_Admin","logged in","2023-04-02 12:43:00");
INSERT INTO audit_trail VALUES("449","SV1_Admin","logged out","2023-04-02 12:44:11");
INSERT INTO audit_trail VALUES("450","SV1_Treasurer","logged in","2023-04-02 12:44:15");
INSERT INTO audit_trail VALUES("451","SV1_Treasurer","logged out","2023-04-02 12:44:41");
INSERT INTO audit_trail VALUES("452","Mon Carlo Delima","logged in","2023-04-02 12:44:45");
INSERT INTO audit_trail VALUES("453","Mon Carlo Delima","logged out","2023-04-02 12:45:10");
INSERT INTO audit_trail VALUES("454","SV1_Admin","logged in","2023-04-02 12:45:13");
INSERT INTO audit_trail VALUES("455","SV1_Admin","logged out","2023-04-02 12:51:02");
INSERT INTO audit_trail VALUES("456","SV1_Admin","logged in","2023-04-02 12:51:06");
INSERT INTO audit_trail VALUES("457","SV1_Admin","logged out","2023-04-02 12:58:30");
INSERT INTO audit_trail VALUES("458","Mon Carlo Delima","logged in","2023-04-02 12:58:32");
INSERT INTO audit_trail VALUES("459","Mon Carlo Delima","uploaded a new post","2023-04-02 12:59:46");
INSERT INTO audit_trail VALUES("460","Mon Carlo Delima","uploaded a new post","2023-04-02 13:00:31");
INSERT INTO audit_trail VALUES("461","Mon Carlo Delima","logged out","2023-04-02 13:00:40");
INSERT INTO audit_trail VALUES("462","SV1_Admin","logged in","2023-04-02 13:00:45");
INSERT INTO audit_trail VALUES("463","SV1_Admin","uploaded a new post","2023-04-02 13:01:32");
INSERT INTO audit_trail VALUES("464","SV1_Admin","uploaded a new post","2023-04-02 13:03:49");
INSERT INTO audit_trail VALUES("465","SV1_Admin","uploaded a new post","2023-04-02 13:04:24");
INSERT INTO audit_trail VALUES("466","SV1_Admin","uploaded a new post","2023-04-02 13:04:37");
INSERT INTO audit_trail VALUES("467","SV1_Admin","uploaded a new post","2023-04-02 13:05:10");
INSERT INTO audit_trail VALUES("468","SV1_Admin","uploaded a new post","2023-04-02 13:05:16");
INSERT INTO audit_trail VALUES("469","SV1_Admin","uploaded a new post","2023-04-02 13:06:44");
INSERT INTO audit_trail VALUES("470","SV1_Admin","logged out","2023-04-02 13:36:57");
INSERT INTO audit_trail VALUES("471","SV1_Admin","logged in","2023-04-04 11:57:08");
INSERT INTO audit_trail VALUES("472","SV1_Admin","logged out","2023-04-04 12:21:10");
INSERT INTO audit_trail VALUES("473","SV1_Treasurer","logged in","2023-04-04 12:21:13");
INSERT INTO audit_trail VALUES("474","SV1_Treasurer","logged out","2023-04-04 12:22:43");
INSERT INTO audit_trail VALUES("475","SV1_Admin","logged in","2023-04-04 12:22:52");
INSERT INTO audit_trail VALUES("476","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Court","2023-04-04 18:26:35");
INSERT INTO audit_trail VALUES("477","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-04 18:28:20");
INSERT INTO audit_trail VALUES("478","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Court","2023-04-04 18:31:00");
INSERT INTO audit_trail VALUES("479","SV1_Admin","added a new amenity Sunnyvale 1-Test","2023-04-05 10:17:59");
INSERT INTO audit_trail VALUES("480","SV1_Admin","added a new amenity Sunnyvale 1-Test","2023-04-05 10:18:56");
INSERT INTO audit_trail VALUES("481","SV1_Admin","added a new amenity Sunnyvale 1-Test","2023-04-05 10:19:24");
INSERT INTO audit_trail VALUES("482","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-05 10:20:37");
INSERT INTO audit_trail VALUES("483","SV1_Admin","added a new amenity Sunnyvale 1-123","2023-04-05 10:21:06");
INSERT INTO audit_trail VALUES("484","SV1_Admin","added a new amenity Sunnyvale 2-test","2023-04-05 10:21:44");
INSERT INTO audit_trail VALUES("485","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-05 10:22:09");
INSERT INTO audit_trail VALUES("486","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-05 10:22:21");
INSERT INTO audit_trail VALUES("487","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-05 10:25:51");
INSERT INTO audit_trail VALUES("488","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-05 10:27:06");
INSERT INTO audit_trail VALUES("489","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-05 10:27:47");
INSERT INTO audit_trail VALUES("490","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-05 10:27:56");
INSERT INTO audit_trail VALUES("491","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-05 10:28:59");
INSERT INTO audit_trail VALUES("492","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-05 10:29:05");
INSERT INTO audit_trail VALUES("493","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-05 10:32:14");
INSERT INTO audit_trail VALUES("494","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Swimming Pool","2023-04-05 10:33:35");
INSERT INTO audit_trail VALUES("495","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Swimming Pool","2023-04-05 10:33:41");
INSERT INTO audit_trail VALUES("496","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Clubhouse","2023-04-05 10:34:31");
INSERT INTO audit_trail VALUES("497","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Clubhouse","2023-04-05 10:34:40");
INSERT INTO audit_trail VALUES("498","SV1_Admin","added a new amenity Sunnyvale 1-test1","2023-04-05 10:34:55");
INSERT INTO audit_trail VALUES("499","SV1_Admin","added a new amenity Sunnyvale 1-test2","2023-04-05 10:35:48");
INSERT INTO audit_trail VALUES("500","SV1_Admin","added a new amenity Sunnyvale 2-test","2023-04-05 10:41:26");
INSERT INTO audit_trail VALUES("501","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-05 10:44:28");
INSERT INTO audit_trail VALUES("502","SV1_Admin","added a new amenity Sunnyvale 1-asd","2023-04-05 10:44:37");
INSERT INTO audit_trail VALUES("503","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Courts","2023-04-05 10:45:51");
INSERT INTO audit_trail VALUES("504","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Court","2023-04-05 10:45:57");
INSERT INTO audit_trail VALUES("505","SV1_Admin","added a new amenity Sunnyvale 1-test","2023-04-05 11:16:56");
INSERT INTO audit_trail VALUES("506","SV1_Admin","added a new amenity Sunnyvale 1-asd","2023-04-05 11:26:30");
INSERT INTO audit_trail VALUES("507","SV1_Admin","added a new amenity Sunnyvale 1-123","2023-04-05 11:27:51");
INSERT INTO audit_trail VALUES("508","SV1_Admin","logged out","2023-04-06 09:58:53");
INSERT INTO audit_trail VALUES("509","Mon Carlo Delima","logged in","2023-04-06 09:58:56");
INSERT INTO audit_trail VALUES("510","Mon Carlo Delima","logged out","2023-04-06 10:00:36");
INSERT INTO audit_trail VALUES("511","Jeune Paolus Flores","logged in","2023-04-06 10:00:44");
INSERT INTO audit_trail VALUES("512","Jeune Paolus Flores","logged out","2023-04-06 10:01:02");
INSERT INTO audit_trail VALUES("513","SV1_Admin","logged in","2023-04-06 10:01:20");
INSERT INTO audit_trail VALUES("514","SV1_Admin","logged out","2023-04-06 10:01:27");
INSERT INTO audit_trail VALUES("515","SV1_Admin","logged in","2023-04-06 10:01:30");
INSERT INTO audit_trail VALUES("516","SV1_Admin","logged out","2023-04-06 10:03:33");
INSERT INTO audit_trail VALUES("517","SV1_Secretary","logged in","2023-04-06 10:03:38");
INSERT INTO audit_trail VALUES("518","SV1_Secretary","logged out","2023-04-06 10:04:45");
INSERT INTO audit_trail VALUES("519","SV1_Secretary","logged in","2023-04-06 10:04:53");
INSERT INTO audit_trail VALUES("520","SV1_Secretary","logged out","2023-04-06 10:06:55");
INSERT INTO audit_trail VALUES("521","SV1_Admin","logged in","2023-04-06 10:06:59");
INSERT INTO audit_trail VALUES("522","SV1_Admin","logged out","2023-04-06 10:08:27");
INSERT INTO audit_trail VALUES("523","SV1_Secretary","logged in","2023-04-06 10:08:31");
INSERT INTO audit_trail VALUES("524","SV1_Secretary","logged out","2023-04-06 10:09:34");
INSERT INTO audit_trail VALUES("525","SV1_Treasurer","logged in","2023-04-06 10:09:36");
INSERT INTO audit_trail VALUES("526","SV1_Treasurer","logged out","2023-04-06 10:10:32");
INSERT INTO audit_trail VALUES("527","SV1_Secretary","logged in","2023-04-06 10:10:35");
INSERT INTO audit_trail VALUES("528","SV1_Secretary","logged out","2023-04-06 10:10:41");
INSERT INTO audit_trail VALUES("529","SV1_Admin","logged in","2023-04-06 10:10:45");
INSERT INTO audit_trail VALUES("530","SV1_Admin","logged out","2023-04-06 10:11:18");
INSERT INTO audit_trail VALUES("531","SV1_Secretary","logged in","2023-04-06 10:11:20");
INSERT INTO audit_trail VALUES("532","SV1_Secretary","logged out","2023-04-06 10:12:09");
INSERT INTO audit_trail VALUES("533","SV1_Secretary","logged in","2023-04-06 10:12:12");
INSERT INTO audit_trail VALUES("534","SV1_Secretary","logged out","2023-04-06 10:22:12");
INSERT INTO audit_trail VALUES("535","SV1_Admin","logged in","2023-04-06 10:22:15");
INSERT INTO audit_trail VALUES("536","SV1_Admin","logged out","2023-04-06 10:22:34");
INSERT INTO audit_trail VALUES("537","SV1_Secretary","logged in","2023-04-06 10:22:38");
INSERT INTO audit_trail VALUES("538","SV1_Secretary","logged out","2023-04-06 10:24:07");
INSERT INTO audit_trail VALUES("539","SV1_Admin","logged in","2023-04-06 10:24:11");
INSERT INTO audit_trail VALUES("540","SV1_Admin","logged out","2023-04-06 10:27:39");
INSERT INTO audit_trail VALUES("541","SV1_Admin","logged in","2023-04-06 10:27:41");
INSERT INTO audit_trail VALUES("542","SV1_Admin","logged out","2023-04-06 10:31:33");
INSERT INTO audit_trail VALUES("543","SV1_Admin","logged in","2023-04-06 10:31:39");
INSERT INTO audit_trail VALUES("544","SV1_Admin","logged out","2023-04-06 10:31:54");
INSERT INTO audit_trail VALUES("545","SV1_Secretary","logged in","2023-04-06 10:31:59");
INSERT INTO audit_trail VALUES("546","SV1_Secretary","logged out","2023-04-06 10:32:01");
INSERT INTO audit_trail VALUES("547","Kyle Andrei Casingal","logged in","2023-04-06 10:32:42");
INSERT INTO audit_trail VALUES("548","Kyle Andrei Casingal","logged out","2023-04-06 10:33:06");
INSERT INTO audit_trail VALUES("549","SV1_Admin","logged in","2023-04-06 10:33:20");
INSERT INTO audit_trail VALUES("550","SV1_Admin","logged out","2023-04-06 10:33:52");
INSERT INTO audit_trail VALUES("551","SV1_Admin","logged in","2023-04-06 10:33:56");



DROP TABLE bill_consumer;

CREATE TABLE `bill_consumer` (
  `billConsumer_id` int(11) NOT NULL AUTO_INCREMENT,
  `billingPeriod_id` int(11) NOT NULL,
  `homeowner_id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `amount` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`billConsumer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO bill_consumer VALUES("1","1","1","Mon Carlo Delima","200","PAID");
INSERT INTO bill_consumer VALUES("2","2","1","Mon Carlo Delima","200","PAID");
INSERT INTO bill_consumer VALUES("3","3","1","Mon Carlo Delima","200","PAID");
INSERT INTO bill_consumer VALUES("4","1","2","Kyle Andrei Casingal","500","PAID");
INSERT INTO bill_consumer VALUES("5","2","2","Kyle Andrei Casingal","500","PAID");
INSERT INTO bill_consumer VALUES("6","3","2","Kyle Andrei Casingal","500","UNPAID");
INSERT INTO bill_consumer VALUES("7","4","2","Kyle Andrei Casingal","500","UNPAID");
INSERT INTO bill_consumer VALUES("8","5","2","Kyle Andrei Casingal","500","UNPAID");
INSERT INTO bill_consumer VALUES("9","6","2","Kyle Andrei Casingal","500","UNPAID");
INSERT INTO bill_consumer VALUES("10","7","2","Kyle Andrei Casingal","500","UNPAID");
INSERT INTO bill_consumer VALUES("11","8","2","Kyle Andrei Casingal","500","UNPAID");
INSERT INTO bill_consumer VALUES("12","9","2","Kyle Andrei Casingal","500","UNPAID");



DROP TABLE billing_period;

CREATE TABLE `billing_period` (
  `billingPeriod_id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(45) NOT NULL,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`billingPeriod_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

INSERT INTO billing_period VALUES("1","January","2023");
INSERT INTO billing_period VALUES("2","February","2023");
INSERT INTO billing_period VALUES("3","March","2023");
INSERT INTO billing_period VALUES("4","April","2023");
INSERT INTO billing_period VALUES("5","May","2023");
INSERT INTO billing_period VALUES("6","June","2023");
INSERT INTO billing_period VALUES("7","July","2023");
INSERT INTO billing_period VALUES("8","August","2023");
INSERT INTO billing_period VALUES("9","September","2023");
INSERT INTO billing_period VALUES("10","October","2023");
INSERT INTO billing_period VALUES("11","November","2023");
INSERT INTO billing_period VALUES("12","December","2023");
INSERT INTO billing_period VALUES("13","January","2024");
INSERT INTO billing_period VALUES("14","February","2024");
INSERT INTO billing_period VALUES("15","March","2024");
INSERT INTO billing_period VALUES("16","April","2024");
INSERT INTO billing_period VALUES("17","May","2024");
INSERT INTO billing_period VALUES("18","June","2024");
INSERT INTO billing_period VALUES("19","July","2024");
INSERT INTO billing_period VALUES("20","August","2024");
INSERT INTO billing_period VALUES("21","September","2024");
INSERT INTO billing_period VALUES("22","October","2024");
INSERT INTO billing_period VALUES("23","November","2024");
INSERT INTO billing_period VALUES("24","December","2024");



DROP TABLE concern;

CREATE TABLE `concern` (
  `concern_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `concern_subject` varchar(100) NOT NULL,
  `concern_description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`concern_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

INSERT INTO concern VALUES("1","Kyle Casingal","Noise Complaint","Nagvivideoke pa rin yung kapitbahay namin kahit lagpas 10 na","Pending","2022-11-10 22:13:45");
INSERT INTO concern VALUES("2","Kyle Casingal","Basura","Kung saan-saan nagtatapon ng basura yung kapitbahay ko.","Pending","2022-11-02 22:13:59");
INSERT INTO concern VALUES("3","Mon Carlo Delima","Vandalism","Dinrawingan ng kapitbahay namin yung kalsada sa tapat ng bahay namin.","Pending","2022-11-04 22:14:02");
INSERT INTO concern VALUES("6","Mon Carlo Delima","Aso","Nagtatae sa harap ng bahay","Pending","2022-11-22 22:14:03");
INSERT INTO concern VALUES("7","Mon Carlo Delima","Kapitbahay","Malapit na magsaksakan","Pending","2022-11-18 22:14:06");
INSERT INTO concern VALUES("41","Mon Carlo Delima","Lasing","Nagwawala sa daan","Pending","2022-11-20 22:14:08");
INSERT INTO concern VALUES("45","Mon Carlo Delima","Batang maingay","Iyak nang iyak","Pending","2022-11-27 22:14:09");
INSERT INTO concern VALUES("44","Mon Carlo Delima","Pusa sa bubong","Nagnanakaw ng ulam","Pending","2022-11-28 22:14:11");
INSERT INTO concern VALUES("43","Mon Carlo Delima","Singer","Sintunado, maingay","Pending","2022-11-12 22:14:13");
INSERT INTO concern VALUES("42","Mon Carlo Delima","Noise complaint","nagddrums, hindi naman magaling","Pending","2022-11-18 22:14:15");
INSERT INTO concern VALUES("46","Kyle Andrei Casingal","Noise Complain","being too loud at 10 pm ","Pending","");



DROP TABLE homeowner_profile;

CREATE TABLE `homeowner_profile` (
  `homeowner_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `suffix` varchar(100) DEFAULT NULL,
  `sex` varchar(100) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `employer` varchar(100) DEFAULT NULL,
  `display_picture` varchar(255) NOT NULL,
  PRIMARY KEY (`homeowner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

INSERT INTO homeowner_profile VALUES("1","Delima","Mon Carlo","Zonio","N/A","Male","Lot 1 Block 2","Sunnyvale 1","Pantok","N/A","N/A","dmoncarlo6@gmail.com","2002-10-06","09157189636","N/A","hdversion.png");
INSERT INTO homeowner_profile VALUES("2","Casingal","Kyle Andrei","Morillo","N/A","Male","Lot 1 Block 1","Sunnyvale 3","Palangoy","N/A","N/A","kylecasingal36@gmail.com","2001-09-02","09123456789","N/A","316495100_870517180796101_3304939871151226288_n.jpg");
INSERT INTO homeowner_profile VALUES("3","Flores","Jeune Paolus","Damaso","N/A","Male","Lot 1 Block 3","Sunnyvale 2","Pantok","N/A","N/A","floresjeunepaolus@gmail.com","2002-06-16","09123123123","Inya","316156823_3360766927514073_2770550987709432568_n.jpg");
INSERT INTO homeowner_profile VALUES("4","Doe","John","N/A","Jr.","Male","Lot 2 Block 4","Sunnyvale 3","Palangoy","N/A","Programmer","dmoncarlo@gmail.com","2002-10-06","09157189636","Mark Zuckerberg","default.png");
INSERT INTO homeowner_profile VALUES("18","","SV1_Admin","","","","","","","","","","","","N/A","default.png");
INSERT INTO homeowner_profile VALUES("8","Bendaña","Krishtalene","Edejer","N/A","Female","Lot 1 Block 5","Sunnyvale 2","Pantok","N/A","N/A","tissabendana@gmail.com","2002-10-19","09123456789","N/A","86705321_2748280675293170_833038108541845504_n.jpg");
INSERT INTO homeowner_profile VALUES("17","Escueta","Roiemar","Conchada","N/A","Male","Lot 4 Block 3","Sunnyvale 1","Palangoy","N/A","N/A","escuetaroiemar@gmail.com","2022-11-28","09123456789","N/A","default.png");
INSERT INTO homeowner_profile VALUES("16","castillo","janwel","","N/A","Male","Lot 2 Block 3 ","Sunnyvale 1","Palangoy","N/A","N/A","janweljigycastillo20@gmail.com","2022-11-25","09123456789","N/A","315887907_1137649846869408_655406644278059076_n.png");
INSERT INTO homeowner_profile VALUES("30","Doe","John","Smith","N/A","Male","Lot 1 Block 8","Sunnyvale 1","Palangoy","N/A","N/A","johndoe@gmail.com","2010-01-01","09123456789","N/A","default.png");
INSERT INTO homeowner_profile VALUES("28","","SV1_Secretary","","","","","","","","","","2022-11-29","","","default.png");
INSERT INTO homeowner_profile VALUES("31","Lowery","Amirah","Meyers","N/A","Female","Lot 1 Block 7","Sunnyvale 1","Palangoy","N/A","N/A","amirahlowery@gmail.com","2009-01-15","09123456789","N/A","default.png");
INSERT INTO homeowner_profile VALUES("32","Miller","Kian","Smith","N/A","Female","Lot 2 Block 10","Sunnyvale 1","Palangoy","N/A","N/A","Kian Miller","1997-07-16","09123456789","N/A","default.png");
INSERT INTO homeowner_profile VALUES("33","Shepherd","Leona","Villegas","N/A","Female","Lot 2 Block 4","Sunnyvale 1","Palangoy","N/A","N/A","leonashepherd@gmail.com","2000-02-29","09123456789","N/A","default.png");
INSERT INTO homeowner_profile VALUES("34","Warner","Sophie","Manning","N/A","Female","Lot 3 Block 7","Sunnyvale 1","Palangoy","N/A","N/A","sophiewarner@gmail.com","1998-06-03","09123456789","N/A","default.png");
INSERT INTO homeowner_profile VALUES("35","Hudson","Tristram","Ray","N/A","Male","Lot 4 Block 1","Sunnyvale 1","Palangoy","N/A","N/A","tristramhudson","1982-07-29","09123456789","N/A","default.png");
INSERT INTO homeowner_profile VALUES("36","","SV1_Treasurer","","","","","","","","","","2022-11-29","","","default.png");
INSERT INTO homeowner_profile VALUES("37","","SV2_Admin","","","","","","","","","","2022-11-29","","","default.png");
INSERT INTO homeowner_profile VALUES("39","Sta. Maria","Marco Ivan","Quierrez","N/A","Male","Lot 4 Block 3","Sunnyvale 1","Palangoy","N/A","N/A","marcoivanstamaria@gmail.com","2001-06-13","09123456789","N/A","290509682_1413885909103188_6599438684369654480_n.jpg");
INSERT INTO homeowner_profile VALUES("40","Dalisay","Cardo","Dela Cruz","N/A","Male","Block 3 Lot 5","Sunnyvale 2","Palangoy","Palangoy","N/A","cardoDalisay@gmail.com","1977-11-07","09123456789","N/A","default.png");



DROP TABLE monthly_dues;

CREATE TABLE `monthly_dues` (
  `monthly_dues_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_id` int(10) NOT NULL,
  `subdivision_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`monthly_dues_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO monthly_dues VALUES("1","1","Sunnyvale 1","200","2022-11-27");
INSERT INTO monthly_dues VALUES("2","2","Sunnyvale 2","250","2022-11-27");
INSERT INTO monthly_dues VALUES("3","3","Sunnyvale 3","500","2022-11-29");
INSERT INTO monthly_dues VALUES("4","4","Sunnyvale 4","350","2022-11-27");



DROP TABLE monthly_dues_bill;

CREATE TABLE `monthly_dues_bill` (
  `monthlyDues_ID` int(11) NOT NULL AUTO_INCREMENT,
  `homeowner_name` varchar(255) NOT NULL,
  `subdivision` varchar(45) NOT NULL,
  `month` varchar(45) NOT NULL,
  `year` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `paid_at` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`monthlyDues_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO monthly_dues_bill VALUES("1","Mon Carlo Delima","Sunnyvale 1","December","2022","Block 1 Lot 2","2022-12-01 02:36:53","Paid");



DROP TABLE officers;

CREATE TABLE `officers` (
  `officer_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(50) NOT NULL,
  `officer_name` varchar(255) NOT NULL,
  `position_name` varchar(50) NOT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO officers VALUES("1","Sunnyvale 1","Saddie Wheeler","President");
INSERT INTO officers VALUES("2","Sunnyvale 1","Bennett Cooke","Vice President");
INSERT INTO officers VALUES("3","Sunnyvale 1","Martin Craig","Secretary");
INSERT INTO officers VALUES("4","Sunnyvale 1","Audrey Benson","Treasurer");
INSERT INTO officers VALUES("5","Sunnyvale 1","Ruth Walsh","Auditor");
INSERT INTO officers VALUES("6","Sunnyvale 1","Hadley Steele","PIO");
INSERT INTO officers VALUES("7","Sunnyvale 1","Tadano Hitohito","Sgt.at Arms");
INSERT INTO officers VALUES("10","Sunnyvale 2","Bogart D. Explorer","President");
INSERT INTO officers VALUES("13","Sunnyvale 10","Monkey D. Luffy","President");
INSERT INTO officers VALUES("14","Sunnyvale 10","Portgas D. Ace","Vice President");
INSERT INTO officers VALUES("15","Sunnyvale 10","Chopper","Treasurer");



DROP TABLE positions;

CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_id` int(11) NOT NULL,
  `subdivision_name` varchar(50) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO positions VALUES("1","1","Sunnyvale 1","President");
INSERT INTO positions VALUES("2","1","Sunnyvale 1","Vice President");
INSERT INTO positions VALUES("3","1","Sunnyvale 1","Secretary");
INSERT INTO positions VALUES("4","1","Sunnyvale 1","Treasurer");
INSERT INTO positions VALUES("5","1","Sunnyvale 1","Auditor");
INSERT INTO positions VALUES("6","1","Sunnyvale 1","PIO");
INSERT INTO positions VALUES("7","1","Sunnyvale 1","Sgt.at Arms");



DROP TABLE post;

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `published_at` datetime NOT NULL,
  `days_archive` int(11) DEFAULT NULL,
  `content_image` varchar(255) DEFAULT NULL,
  `officer_post` varchar(10) NOT NULL,
  `post_status` varchar(45) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

INSERT INTO post VALUES("1","28","Mon Carlo Delima","The moon is beautiful, isn\'t it?","","2022-11-24 01:09:01","","315906640_1753081135077201_6331420859846659098_n.png","No","Archived");
INSERT INTO post VALUES("2","24","Jeune Paolus Flores","Fascinating art created by nature.","","2022-11-24 09:59:54","","316218368_829271824950879_360246867658747215_n.png","No","Archived");
INSERT INTO post VALUES("3","23","Kyle Andrei Casingal","Reflection","Imagine seeing these astonishing cars, lively blue skies, and few waves of clouds in an upside-down world. Inconceivable, isn\'t it?","2022-11-24 10:03:11","","316189223_691988422233113_5145406262467036356_n.png","No","Archived");
INSERT INTO post VALUES("4","23","Kyle Andrei Casingal","Windows of truth shows the real beauty of nature.","","2022-11-24 10:04:40","","313194508_684251046380877_4560164667618025920_n.png","No","Archived");
INSERT INTO post VALUES("5","28","Mon Carlo Delima","Vintage mansion represents calm, warm, and peace.","","2022-11-24 10:05:22","","312140489_698881924813395_203606755662892340_n.png","No","Archived");
INSERT INTO post VALUES("15","52","Marco Ivan Sta. Maria","","Oh well, the sun strengthens the health of the plant, does this photo represents a good day because of that?","2022-12-01 06:37:21","","Picture2.jpg","No","Archived");
INSERT INTO post VALUES("17","53","Krishtalene Bendaña","","Just had a ride inside the Sunnyvale subdivision, I feel like this will be part of my everyday routine.","2022-12-01 06:48:54","","Picture4.png","No","Archived");
INSERT INTO post VALUES("18","52","Marco Ivan Sta. Maria","","The kids enjoyed the party in Sunnyvale Subdivision, it\'s great seeing them happy while watching the program.","2022-12-01 06:49:23","","Picture5.jpg","No","Archived");
INSERT INTO post VALUES("19","53","Krishtalene Bendaña","","Hi everyone! Just want to share this beautiful view I took near Sunnyvale Subdivision. It\'s in ArtSector Gallery and Chimney Cafe 360°. Let\'s visit this place together.","2022-12-01 06:50:15","","Picture6.jpg","No","Archived");
INSERT INTO post VALUES("20","52","Marco Ivan Sta. Maria","","Sometimes it\'s good to be blue. How sweet to be a cloud and floating in blue. I never get tired of the blue sky.","2022-12-01 06:51:00","","Picture3.png","No","Archived");
INSERT INTO post VALUES("24","55","Kyle Andrei Casingal","Light Bulb","insert description here","2022-12-01 10:13:20","","188-1889845_a-very-simple-concept-infinitustoken-medium-light-bulb.png","No","Archived");
INSERT INTO post VALUES("28","18","SV1_Admin","Water interruption","test","2023-01-24 20:00:38","","","Yes","Active");
INSERT INTO post VALUES("29","18","SV1_Admin","Chinese New Year event","test","2023-01-24 20:06:20","","","Yes","Active");
INSERT INTO post VALUES("30","1","Mon Carlo Delima","URS","University of Rizal System - Binangonan","2023-03-16 22:24:20","","URS.png","No","Archived");
INSERT INTO post VALUES("31","1","Mon Carlo Delima","Nihonjin Desu","Japan numba 1","2023-04-02 12:59:46","","lockscreen.png","No","Active");
INSERT INTO post VALUES("32","1","Mon Carlo Delima","Magical World","I love Biringan","2023-04-02 13:00:31","","sEt5ph.jpg","No","Active");
INSERT INTO post VALUES("33","18","SV1_Admin","test","test","2023-04-02 13:06:44","1","","Yes","Archived");



DROP TABLE subdivision;

CREATE TABLE `subdivision` (
  `subdivision_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  PRIMARY KEY (`subdivision_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO subdivision VALUES("1","Sunnyvale 1","Pantok");
INSERT INTO subdivision VALUES("2","Sunnyvale 2","Palangoy");
INSERT INTO subdivision VALUES("3","Sunnyvale 3","Palangoy");
INSERT INTO subdivision VALUES("4","Sunnyvale 4","Pantok");



DROP TABLE user;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_homeowner_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email_address` varchar(40) DEFAULT NULL,
  `account_status` varchar(15) NOT NULL,
  `verification_code` varchar(6) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

INSERT INTO user VALUES("55","2","Kyle Andrei Casingal","Homeowner","password","kylecasingal36@gmail.com","Activated","248425","2022-12-01 10:11:20");
INSERT INTO user VALUES("3","3","Jeune Paolus Flores","Homeowner","thisfeelsgud","floresjeunepaolus@gmail.com","Activated","943962","2022-11-10 22:51:58");
INSERT INTO user VALUES("1","1","Mon Carlo Delima","Homeowner","12345","dmoncarlo6@gmail.com","Activated","286140","2022-11-24 13:48:07");
INSERT INTO user VALUES("27","16","janwel castillo","Homeowner","dadada","janweljigycastillo20@gmail.com","Deactivated","943962","2022-11-15 20:43:59");
INSERT INTO user VALUES("4","4","John Doe","Treasurer","123","dmoncarlo@gmail.com","Deactivated","105861","2022-11-24 15:17:36");
INSERT INTO user VALUES("18","18","SV1_Admin","Admin","password","SV1_Admin","Activated","","");
INSERT INTO user VALUES("42","17","Roiemar Escueta","Homeowner","123","escuetaroiemar@gmail.com","Deactivated","135447","2022-11-28 23:28:23");
INSERT INTO user VALUES("46","28","SV1_Secretary","Secretary","123","SV1_Secretary","Activated","","");
INSERT INTO user VALUES("48","36","SV1_Treasurer","Treasurer","123","SV1_Treasurer","Activated","","");
INSERT INTO user VALUES("49","37","SV2_Admin","Admin","password","SV2_Admin","Activated","","");
INSERT INTO user VALUES("52","39","Marco Ivan Sta. Maria","Homeowner","123","marcoivanstamaria@gmail.com","Activated","257545","2022-12-01 06:31:28");
INSERT INTO user VALUES("53","8","Krishtalene Bendaña","Homeowner","123","tissabendana@gmail.com","Activated","573856","2022-12-01 06:37:48");



DROP TABLE years;

CREATE TABLE `years` (
  `yearID` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`yearID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO years VALUES("1","2023");
INSERT INTO years VALUES("2","2024");



