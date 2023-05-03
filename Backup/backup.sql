DROP TABLE amenities;

CREATE TABLE `amenities` (
  `amenity_id` int(11) NOT NULL AUTO_INCREMENT,
  `amenity_name` varchar(255) NOT NULL,
  `subdivision_id` int(11) NOT NULL,
  `subdivision_name` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL,
  PRIMARY KEY (`amenity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

INSERT INTO amenities VALUES("1","Court","1","Sunnyvale 1","Available");
INSERT INTO amenities VALUES("4","Multi-purpose Hall","2","Sunnyvale 2","Available");
INSERT INTO amenities VALUES("5","Swimming Pool","1","Sunnyvale 1","Available");
INSERT INTO amenities VALUES("6","Clubhouse","1","Sunnyvale 1","Unavailable");
INSERT INTO amenities VALUES("10","Clubhouse","3","Sunnyvale 3","Unavailable");
INSERT INTO amenities VALUES("16","Bathhouse","1","Sunnyvale 1","Available");
INSERT INTO amenities VALUES("31","Court","4","Sunnyvale 4","Available");
INSERT INTO amenities VALUES("30","Court","2","Sunnyvale 2","Available");



DROP TABLE amenity_purpose;

CREATE TABLE `amenity_purpose` (
  `amenity_purpose_id` int(11) NOT NULL AUTO_INCREMENT,
  `amenity_id` int(11) NOT NULL,
  `amenity_purpose` varchar(100) NOT NULL,
  `day_rate` int(11) NOT NULL,
  `night_rate` int(11) NOT NULL,
  PRIMARY KEY (`amenity_purpose_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO amenity_purpose VALUES("1","1","Basketball","50","150");
INSERT INTO amenity_purpose VALUES("3","1","Volleyball","50","150");
INSERT INTO amenity_purpose VALUES("5","5","Swimming","50","100");
INSERT INTO amenity_purpose VALUES("8","10","Party","150","300");
INSERT INTO amenity_purpose VALUES("9","1","Badminton","50","150");
INSERT INTO amenity_purpose VALUES("10","1","Chess","80","360");
INSERT INTO amenity_purpose VALUES("11","30","Chessboxing","20","30");
INSERT INTO amenity_purpose VALUES("12","30","Volleyball","70","480");
INSERT INTO amenity_purpose VALUES("13","5","test","20","30");



DROP TABLE amenity_renting;

CREATE TABLE `amenity_renting` (
  `amenity_renting_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `renter_name` varchar(255) NOT NULL,
  `subdivision_name` varchar(255) NOT NULL,
  `amenity_name` varchar(255) NOT NULL,
  `amenity_purpose` varchar(255) NOT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `cart` varchar(10) NOT NULL,
  PRIMARY KEY (`amenity_renting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

INSERT INTO amenity_renting VALUES("9","","1","Mon Carlo Delima","Sunnyvale 1","Court","1","2023-02-13 01:00:00","2023-02-13 02:00:00","50","Removed");
INSERT INTO amenity_renting VALUES("8","","1","Mon Carlo Delima","Sunnyvale 1","Court","1","2023-02-12 18:00:00","2023-02-12 21:00:00","450","Removed");
INSERT INTO amenity_renting VALUES("7","","1","Mon Carlo Delima","Sunnyvale 1","Court","1","2023-02-15 13:00:00","2023-02-15 17:00:00","","Removed");
INSERT INTO amenity_renting VALUES("13","1","1","Mon Carlo Delima","Sunnyvale 1","Court","1","2023-02-14 09:00:00","2023-02-14 21:00:00","900","Approved");
INSERT INTO amenity_renting VALUES("12","","1","Mon Carlo Delima","Sunnyvale 1","Court","1","","","","Removed");
INSERT INTO amenity_renting VALUES("14","1","1","Mon Carlo Delima","Sunnyvale 1","Court","3","2023-02-15 09:00:00","2023-02-15 12:00:00","150","Approved");
INSERT INTO amenity_renting VALUES("15","1","1","Mon Carlo Delima","Sunnyvale 1","Court","1","2023-02-16 18:00:00","2023-02-16 21:00:00","450","Approved");
INSERT INTO amenity_renting VALUES("16","","1","Mon Carlo Delima","Sunnyvale 1","Court","1","","","","Removed");
INSERT INTO amenity_renting VALUES("26","11","1","Mon Carlo Delima","Sunnyvale 1","Swimming Pool","5","2023-04-10 08:00:00","2023-04-10 09:00:00","50","Approved");
INSERT INTO amenity_renting VALUES("20","","48","SV1_Treasurer","Sunnyvale 1","Court","3","","","","Removed");
INSERT INTO amenity_renting VALUES("25","3","1","Mon Carlo Delima","Sunnyvale 3","Clubhouse","8","2023-04-15 01:00:00","2023-04-15 02:00:00","150","Approved");
INSERT INTO amenity_renting VALUES("23","2","48","SV1_Treasurer","Sunnyvale 2","Court","11","2023-04-08 08:00:00","2023-04-08 10:00:00","40","Approved");
INSERT INTO amenity_renting VALUES("24","2","48","SV1_Treasurer","Sunnyvale 2","Court","12","2023-04-08 10:00:00","2023-04-08 12:00:00","140","Approved");
INSERT INTO amenity_renting VALUES("27","","1","Mon Carlo Delima","Sunnyvale 1","Court","10","2023-05-02 12:00:00","2023-05-02 18:00:00","480","Yes");



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



DROP TABLE audit_trail;

CREATE TABLE `audit_trail` (
  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `action` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`audit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1399 DEFAULT CHARSET=utf8;

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
INSERT INTO audit_trail VALUES("552","SV1_Admin","logged out","2023-04-06 10:45:07");
INSERT INTO audit_trail VALUES("553","SV1_Admin","logged in","2023-04-06 10:46:25");
INSERT INTO audit_trail VALUES("554","SV1_Admin","logged out","2023-04-06 10:51:03");
INSERT INTO audit_trail VALUES("555","SV1_Admin","logged in","2023-04-06 10:51:08");
INSERT INTO audit_trail VALUES("556","SV1_Admin","logged out","2023-04-06 10:51:10");
INSERT INTO audit_trail VALUES("557","Mon Carlo Delima","logged in","2023-04-06 10:51:12");
INSERT INTO audit_trail VALUES("558","Mon Carlo Delima","logged out","2023-04-06 10:52:45");
INSERT INTO audit_trail VALUES("559","Mon Carlo Delima","logged in","2023-04-06 10:52:48");
INSERT INTO audit_trail VALUES("560","Mon Carlo Delima","submitted a concern","2023-04-06 10:52:51");
INSERT INTO audit_trail VALUES("561","Mon Carlo Delima","logged out","2023-04-06 10:53:03");
INSERT INTO audit_trail VALUES("562","SV1_Admin","logged in","2023-04-06 10:53:06");
INSERT INTO audit_trail VALUES("563","SV1_Admin","logged out","2023-04-06 10:53:18");
INSERT INTO audit_trail VALUES("564","SV1_Admin","logged in","2023-04-06 10:53:21");
INSERT INTO audit_trail VALUES("565","SV1_Admin","logged out","2023-04-06 10:53:22");
INSERT INTO audit_trail VALUES("566","Mon Carlo Delima","logged in","2023-04-06 10:53:27");
INSERT INTO audit_trail VALUES("567","Mon Carlo Delima","submitted a concern","2023-04-06 10:54:16");
INSERT INTO audit_trail VALUES("568","Mon Carlo Delima","logged out","2023-04-06 11:00:35");
INSERT INTO audit_trail VALUES("569","Mon Carlo Delima","logged in","2023-04-06 11:04:00");
INSERT INTO audit_trail VALUES("570","Mon Carlo Delima","logged in","2023-04-06 14:00:15");
INSERT INTO audit_trail VALUES("571","Mon Carlo Delima","logged out","2023-04-06 14:06:53");
INSERT INTO audit_trail VALUES("572","SV1_Treasurer","logged in","2023-04-06 14:06:57");
INSERT INTO audit_trail VALUES("573","SV1_Treasurer","logged out","2023-04-06 14:07:51");
INSERT INTO audit_trail VALUES("574","SV1_Treasurer","logged in","2023-04-06 14:09:56");
INSERT INTO audit_trail VALUES("575","SV1_Treasurer","logged out","2023-04-06 14:11:24");
INSERT INTO audit_trail VALUES("576","Mon Carlo Delima","logged in","2023-04-06 14:11:28");
INSERT INTO audit_trail VALUES("577","Mon Carlo Delima","logged out","2023-04-06 14:21:49");
INSERT INTO audit_trail VALUES("578","SV1_Admin","logged in","2023-04-06 14:21:57");
INSERT INTO audit_trail VALUES("579","SV1_Admin","logged out","2023-04-06 14:26:51");
INSERT INTO audit_trail VALUES("580","SV1_Admin","logged in","2023-04-06 14:26:54");
INSERT INTO audit_trail VALUES("581","SV1_Admin","logged out","2023-04-06 14:30:27");
INSERT INTO audit_trail VALUES("582","Mon Carlo Delima","logged in","2023-04-06 14:30:30");
INSERT INTO audit_trail VALUES("583","Mon Carlo Delima","logged in","2023-04-06 15:19:28");
INSERT INTO audit_trail VALUES("584","Mon Carlo Delima","submitted a concern","2023-04-06 15:34:28");
INSERT INTO audit_trail VALUES("585","Mon Carlo Delima","logged out","2023-04-06 16:03:03");
INSERT INTO audit_trail VALUES("586","Kyle Andrei Casingal","logged in","2023-04-06 16:03:06");
INSERT INTO audit_trail VALUES("587","Kyle Andrei Casingal","logged out","2023-04-06 16:03:14");
INSERT INTO audit_trail VALUES("588","SV1_Admin","logged in","2023-04-06 16:03:17");
INSERT INTO audit_trail VALUES("589","SV1_Admin","logged out","2023-04-06 16:03:26");
INSERT INTO audit_trail VALUES("590","Mon Carlo Delima","logged in","2023-04-06 16:03:29");
INSERT INTO audit_trail VALUES("591","Mon Carlo Delima","submitted a concern","2023-04-06 16:03:47");
INSERT INTO audit_trail VALUES("592","Mon Carlo Delima","submitted a concern","2023-04-06 16:04:20");
INSERT INTO audit_trail VALUES("593","Mon Carlo Delima","submitted a concern","2023-04-06 16:04:50");
INSERT INTO audit_trail VALUES("594","Mon Carlo Delima","submitted a concern","2023-04-06 16:05:27");
INSERT INTO audit_trail VALUES("595","Mon Carlo Delima","logged out","2023-04-06 16:06:44");
INSERT INTO audit_trail VALUES("596","SV1_Admin","logged in","2023-04-06 17:31:45");
INSERT INTO audit_trail VALUES("597","SV1_Admin","logged out","2023-04-06 17:35:09");
INSERT INTO audit_trail VALUES("598","SV1_Treasurer","logged in","2023-04-06 17:35:12");
INSERT INTO audit_trail VALUES("599","SV1_Treasurer","logged out","2023-04-06 17:35:31");
INSERT INTO audit_trail VALUES("600","SV1_Secretary","logged in","2023-04-06 17:35:35");
INSERT INTO audit_trail VALUES("601","SV1_Secretary","logged out","2023-04-06 17:35:42");
INSERT INTO audit_trail VALUES("602","SV1_Admin","logged in","2023-04-06 17:35:46");
INSERT INTO audit_trail VALUES("603","SV1_Admin","logged out","2023-04-06 17:38:07");
INSERT INTO audit_trail VALUES("604","SV1_Secretary","logged in","2023-04-06 17:38:12");
INSERT INTO audit_trail VALUES("605","SV1_Secretary","logged out","2023-04-06 17:40:00");
INSERT INTO audit_trail VALUES("606","SV1_Admin","logged in","2023-04-06 17:40:03");
INSERT INTO audit_trail VALUES("607","SV1_Admin","logged out","2023-04-06 17:42:56");
INSERT INTO audit_trail VALUES("608","SV1_Secretary","logged in","2023-04-06 17:42:59");
INSERT INTO audit_trail VALUES("609","SV1_Secretary","logged out","2023-04-06 17:43:10");
INSERT INTO audit_trail VALUES("610","SV1_Admin","logged in","2023-04-06 17:43:13");
INSERT INTO audit_trail VALUES("611","SV1_Admin","logged out","2023-04-06 17:44:36");
INSERT INTO audit_trail VALUES("612","SV1_Secretary","logged in","2023-04-06 17:44:39");
INSERT INTO audit_trail VALUES("613","SV1_Secretary","logged out","2023-04-06 17:44:51");
INSERT INTO audit_trail VALUES("614","SV1_Treasurer","logged in","2023-04-06 17:44:53");
INSERT INTO audit_trail VALUES("615","SV1_Treasurer","logged out","2023-04-06 17:45:26");
INSERT INTO audit_trail VALUES("616","SV1_Secretary","logged in","2023-04-06 17:45:30");
INSERT INTO audit_trail VALUES("617","SV1_Secretary","logged out","2023-04-06 17:45:57");
INSERT INTO audit_trail VALUES("618","SV1_Secretary","logged in","2023-04-06 17:46:01");
INSERT INTO audit_trail VALUES("619","SV1_Secretary","logged out","2023-04-06 17:46:02");
INSERT INTO audit_trail VALUES("620","SV1_Admin","logged in","2023-04-06 17:46:05");
INSERT INTO audit_trail VALUES("621","SV1_Admin","logged out","2023-04-06 17:47:43");
INSERT INTO audit_trail VALUES("622","SV1_Admin","logged in","2023-04-06 17:48:47");
INSERT INTO audit_trail VALUES("623","SV1_Admin","logged out","2023-04-06 18:38:13");
INSERT INTO audit_trail VALUES("624","SV1_Admin","logged in","2023-04-06 18:48:42");
INSERT INTO audit_trail VALUES("625","SV1_Admin","logged out","2023-04-06 18:52:05");
INSERT INTO audit_trail VALUES("626","SV1_Admin","logged in","2023-04-06 18:52:54");
INSERT INTO audit_trail VALUES("627","SV1_Admin","logged out","2023-04-06 18:59:11");
INSERT INTO audit_trail VALUES("628","SV1_Secretary","logged in","2023-04-06 18:59:56");
INSERT INTO audit_trail VALUES("629","SV1_Secretary","logged out","2023-04-06 19:01:01");
INSERT INTO audit_trail VALUES("630","SV1_Admin","logged in","2023-04-06 19:01:04");
INSERT INTO audit_trail VALUES("631","SV1_Admin","logged in","2023-04-06 22:02:03");
INSERT INTO audit_trail VALUES("632","SV1_Admin","logged out","2023-04-06 22:05:25");
INSERT INTO audit_trail VALUES("633","SV1_Admin","logged in","2023-04-06 22:05:28");
INSERT INTO audit_trail VALUES("634","SV1_Admin","logged out","2023-04-06 22:11:16");
INSERT INTO audit_trail VALUES("635","SV1_Admin","logged in","2023-04-06 22:11:20");
INSERT INTO audit_trail VALUES("636","SV1_Admin","logged out","2023-04-06 22:47:30");
INSERT INTO audit_trail VALUES("637","Mon Carlo Delima","logged in","2023-04-06 22:47:33");
INSERT INTO audit_trail VALUES("638","Mon Carlo Delima","logged out","2023-04-06 22:47:49");
INSERT INTO audit_trail VALUES("639","SV1_Admin","logged in","2023-04-06 22:47:51");
INSERT INTO audit_trail VALUES("640","SV1_Admin","logged out","2023-04-06 23:10:35");
INSERT INTO audit_trail VALUES("641","Mon Carlo Delima","logged in","2023-04-06 23:10:38");
INSERT INTO audit_trail VALUES("642","Mon Carlo Delima","logged out","2023-04-06 23:11:41");
INSERT INTO audit_trail VALUES("643","SV1_Admin","logged in","2023-04-06 23:11:44");
INSERT INTO audit_trail VALUES("644","SV1_Admin","logged out","2023-04-06 23:16:33");
INSERT INTO audit_trail VALUES("645","Mon Carlo Delima","logged in","2023-04-06 23:16:37");
INSERT INTO audit_trail VALUES("646","Mon Carlo Delima","logged out","2023-04-06 23:27:22");
INSERT INTO audit_trail VALUES("647","SV1_Admin","logged in","2023-04-06 23:27:25");
INSERT INTO audit_trail VALUES("648","SV1_Admin","logged out","2023-04-06 23:30:08");
INSERT INTO audit_trail VALUES("649","Mon Carlo Delima","logged in","2023-04-06 23:30:11");
INSERT INTO audit_trail VALUES("650","Mon Carlo Delima","submitted a concern","2023-04-06 23:30:23");
INSERT INTO audit_trail VALUES("651","Mon Carlo Delima","logged out","2023-04-06 23:30:41");
INSERT INTO audit_trail VALUES("652","SV1_Admin","logged in","2023-04-06 23:30:46");
INSERT INTO audit_trail VALUES("653","Mon Carlo Delima","logged in","2023-04-06 23:33:18");
INSERT INTO audit_trail VALUES("654","Mon Carlo Delima","submitted a concern","2023-04-06 23:33:30");
INSERT INTO audit_trail VALUES("655","SV1_Admin","logged out","2023-04-06 23:37:32");
INSERT INTO audit_trail VALUES("656","Mon Carlo Delima","logged in","2023-04-06 23:37:36");
INSERT INTO audit_trail VALUES("657","Mon Carlo Delima","logged out","2023-04-06 23:40:49");
INSERT INTO audit_trail VALUES("658","SV1_Admin","logged in","2023-04-06 23:40:51");
INSERT INTO audit_trail VALUES("659","SV1_Admin","logged out","2023-04-06 23:40:56");
INSERT INTO audit_trail VALUES("660","Mon Carlo Delima","logged in","2023-04-06 23:40:59");
INSERT INTO audit_trail VALUES("661","Mon Carlo Delima","logged out","2023-04-06 23:42:33");
INSERT INTO audit_trail VALUES("662","Janwel Castillo","logged in","2023-04-06 23:43:43");
INSERT INTO audit_trail VALUES("663","Janwel Castillo","submitted a concern","2023-04-06 23:44:02");
INSERT INTO audit_trail VALUES("664","Janwel Castillo","logged out","2023-04-06 23:44:11");
INSERT INTO audit_trail VALUES("665","Mon Carlo Delima","logged in","2023-04-06 23:44:15");
INSERT INTO audit_trail VALUES("666","Mon Carlo Delima","logged out","2023-04-06 23:46:46");
INSERT INTO audit_trail VALUES("667","SV1_Admin","logged in","2023-04-06 23:46:49");
INSERT INTO audit_trail VALUES("668","SV1_Admin","logged out","2023-04-06 23:46:56");
INSERT INTO audit_trail VALUES("669","Mon Carlo Delima","logged in","2023-04-06 23:47:00");
INSERT INTO audit_trail VALUES("670","Mon Carlo Delima","logged out","2023-04-06 23:58:48");
INSERT INTO audit_trail VALUES("671","Mon Carlo Delima","logged in","2023-04-06 23:58:52");
INSERT INTO audit_trail VALUES("672","Mon Carlo Delima","submitted a concern","2023-04-06 23:59:18");
INSERT INTO audit_trail VALUES("673","Mon Carlo Delima","logged out","2023-04-07 00:00:16");
INSERT INTO audit_trail VALUES("674","SV1_Admin","logged in","2023-04-07 00:04:34");
INSERT INTO audit_trail VALUES("675","SV1_Admin","logged in","2023-04-07 09:43:45");
INSERT INTO audit_trail VALUES("676","SV1_Admin","logged out","2023-04-07 09:44:32");
INSERT INTO audit_trail VALUES("677","Mon Carlo Delima","logged in","2023-04-07 09:44:34");
INSERT INTO audit_trail VALUES("678","Mon Carlo Delima","logged out","2023-04-07 09:46:39");
INSERT INTO audit_trail VALUES("679","SV1_Admin","logged in","2023-04-07 09:46:42");
INSERT INTO audit_trail VALUES("680","SV1_Admin","added a new system account Test-Admin","2023-04-07 09:49:47");
INSERT INTO audit_trail VALUES("681","SV1_Admin","logged out","2023-04-07 09:59:20");
INSERT INTO audit_trail VALUES("682","Mon Carlo Delima","logged in","2023-04-07 09:59:23");
INSERT INTO audit_trail VALUES("683","Mon Carlo Delima","logged out","2023-04-07 09:59:28");
INSERT INTO audit_trail VALUES("684","SV1_Admin","logged in","2023-04-07 09:59:33");
INSERT INTO audit_trail VALUES("685","SV1_Admin","logged in","2023-04-07 10:20:46");
INSERT INTO audit_trail VALUES("686","SV1_Admin","logged out","2023-04-07 10:25:40");
INSERT INTO audit_trail VALUES("687","SV1_Admin","logged in","2023-04-07 10:25:43");
INSERT INTO audit_trail VALUES("688","SV1_Admin","logged out","2023-04-07 10:32:49");
INSERT INTO audit_trail VALUES("689","Mon Carlo Delima","logged in","2023-04-07 10:32:52");
INSERT INTO audit_trail VALUES("690","Mon Carlo Delima","logged out","2023-04-07 10:36:50");
INSERT INTO audit_trail VALUES("691","SV1_Admin","logged in","2023-04-07 10:36:53");
INSERT INTO audit_trail VALUES("692","SV1_Admin","logged out","2023-04-07 10:36:59");
INSERT INTO audit_trail VALUES("693","Mon Carlo Delima","logged in","2023-04-07 10:37:02");
INSERT INTO audit_trail VALUES("694","Mon Carlo Delima","logged out","2023-04-07 10:38:51");
INSERT INTO audit_trail VALUES("695","SV1_Admin","logged in","2023-04-07 10:38:53");
INSERT INTO audit_trail VALUES("696","SV1_Admin","logged out","2023-04-07 10:39:05");
INSERT INTO audit_trail VALUES("697","Mon Carlo Delima","logged in","2023-04-07 10:39:08");
INSERT INTO audit_trail VALUES("698","Mon Carlo Delima","logged out","2023-04-07 10:39:49");
INSERT INTO audit_trail VALUES("699","SV1_Admin","logged in","2023-04-07 10:39:54");
INSERT INTO audit_trail VALUES("700","SV1_Admin","logged out","2023-04-07 10:39:57");
INSERT INTO audit_trail VALUES("701","Mon Carlo Delima","logged in","2023-04-07 10:40:01");
INSERT INTO audit_trail VALUES("702"," Mon Carlo Delima","logged out","2023-04-07 10:59:35");
INSERT INTO audit_trail VALUES("703","SV1_Admin","logged in","2023-04-07 10:59:38");
INSERT INTO audit_trail VALUES("704","SV1_Admin","logged out","2023-04-07 10:59:40");
INSERT INTO audit_trail VALUES("705"," Mon Carlo Delima","logged in","2023-04-07 10:59:43");
INSERT INTO audit_trail VALUES("706"," Mon Carlo Delima","logged out","2023-04-07 11:01:41");
INSERT INTO audit_trail VALUES("707","Jeune Paolus Flores","logged in","2023-04-07 11:01:44");
INSERT INTO audit_trail VALUES("708","Jeune Paolus Flores","logged out","2023-04-07 11:01:49");
INSERT INTO audit_trail VALUES("709"," Mon Carlo Delima","logged in","2023-04-07 11:01:52");
INSERT INTO audit_trail VALUES("710"," Mon Carlo Delima","logged out","2023-04-07 11:03:08");
INSERT INTO audit_trail VALUES("711","Jeune Paolus Flores","logged in","2023-04-07 11:03:12");
INSERT INTO audit_trail VALUES("712","Jeune Paolus Flores","logged out","2023-04-07 11:03:39");
INSERT INTO audit_trail VALUES("713"," Mon Carlo Delima","logged in","2023-04-07 11:03:42");
INSERT INTO audit_trail VALUES("714","Mon Carlo Delima","logged out","2023-04-07 11:10:16");
INSERT INTO audit_trail VALUES("715","SV1_Admin","logged in","2023-04-07 11:10:18");
INSERT INTO audit_trail VALUES("716","SV1_Admin","logged out","2023-04-07 11:10:44");
INSERT INTO audit_trail VALUES("717","Mon Carlo Delima","logged in","2023-04-07 11:10:47");
INSERT INTO audit_trail VALUES("718","Mon Carlo Delima","logged out","2023-04-07 11:11:36");
INSERT INTO audit_trail VALUES("719","SV1_Admin","logged in","2023-04-07 11:11:39");
INSERT INTO audit_trail VALUES("720","SV1_Admin","logged in","2023-04-07 13:54:39");
INSERT INTO audit_trail VALUES("721","SV1_Admin","logged out","2023-04-07 13:58:16");
INSERT INTO audit_trail VALUES("722","SV1_Treasurer","logged in","2023-04-07 13:58:18");
INSERT INTO audit_trail VALUES("723","SV1_Treasurer","logged out","2023-04-07 13:58:45");
INSERT INTO audit_trail VALUES("724","SV1_Admin","logged in","2023-04-07 13:58:54");
INSERT INTO audit_trail VALUES("725","SV1_Admin","added a new amenity Sunnyvale 2-test2","2023-04-07 14:05:46");
INSERT INTO audit_trail VALUES("726","SV1_Admin","updated an exisiting amenity 2-Court","2023-04-07 14:19:24");
INSERT INTO audit_trail VALUES("727","SV1_Admin","updated an exisiting amenity 2-Court","2023-04-07 14:19:31");
INSERT INTO audit_trail VALUES("728","SV1_Admin","updated an exisiting amenity 2-Court","2023-04-07 14:19:39");
INSERT INTO audit_trail VALUES("729","SV1_Admin","updated an exisiting amenity 2-Court","2023-04-07 14:20:00");
INSERT INTO audit_trail VALUES("730","SV1_Admin","updated an exisiting amenity 2-Court","2023-04-07 14:20:06");
INSERT INTO audit_trail VALUES("731","SV1_Admin","updated an exisiting amenity 1-Court","2023-04-07 14:20:29");
INSERT INTO audit_trail VALUES("732","SV1_Admin","updated an exisiting amenity Sunnyvale 2-Court","2023-04-07 14:27:12");
INSERT INTO audit_trail VALUES("733","SV1_Admin","updated an exisiting amenity -Court","2023-04-07 14:33:06");
INSERT INTO audit_trail VALUES("734","SV1_Admin","updated an exisiting amenity -Court","2023-04-07 14:33:28");
INSERT INTO audit_trail VALUES("735","SV1_Admin","updated an exisiting amenity -Multi-purpose Hall","2023-04-07 14:34:02");
INSERT INTO audit_trail VALUES("736","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Court","2023-04-07 14:35:05");
INSERT INTO audit_trail VALUES("737","SV1_Admin","updated an exisiting amenity Sunnyvale 2-Multi-purpose Hall","2023-04-07 14:35:08");
INSERT INTO audit_trail VALUES("738","SV1_Admin","updated an exisiting amenity Sunnyvale 2-Court","2023-04-07 14:35:17");
INSERT INTO audit_trail VALUES("739","SV1_Admin","updated an exisiting amenity Sunnyvale 1-Court","2023-04-07 14:35:58");
INSERT INTO audit_trail VALUES("740","SV1_Admin","added a new amenity -test4","2023-04-07 14:36:19");
INSERT INTO audit_trail VALUES("741","SV1_Admin","added a new amenity -test4","2023-04-07 14:36:56");
INSERT INTO audit_trail VALUES("742","SV1_Admin","added a new amenity -test4","2023-04-07 14:37:16");
INSERT INTO audit_trail VALUES("743","SV1_Admin","added a new amenity Sunnyvale 4-test4","2023-04-07 14:37:44");
INSERT INTO audit_trail VALUES("744","SV1_Admin","added a new amenity Sunnyvale 4-test123","2023-04-07 14:38:18");
INSERT INTO audit_trail VALUES("745","SV1_Admin","updated an exisiting amenity Sunnyvale 4-test12345","2023-04-07 14:38:42");
INSERT INTO audit_trail VALUES("746","SV1_Admin","added a new amenity Sunnyvale 3-test again","2023-04-07 14:39:03");
INSERT INTO audit_trail VALUES("747","SV1_Admin","updated an exisiting amenity Sunnyvale 3-Clubhouse","2023-04-07 14:39:36");
INSERT INTO audit_trail VALUES("748","SV1_Admin","added a new amenity Sunnyvale 2-Court","2023-04-07 14:40:15");
INSERT INTO audit_trail VALUES("749","SV1_Admin","updated an exisiting amenity -","2023-04-07 14:54:02");
INSERT INTO audit_trail VALUES("750","SV1_Admin","updated an exisiting amenity -","2023-04-07 14:54:12");
INSERT INTO audit_trail VALUES("751","SV1_Admin","updated an existing monthly due Sunnyvale 2-280.00","2023-04-07 15:00:31");
INSERT INTO audit_trail VALUES("752","SV1_Admin","logged out","2023-04-07 15:05:14");
INSERT INTO audit_trail VALUES("753","Mon Carlo Delima","logged in","2023-04-07 15:05:17");
INSERT INTO audit_trail VALUES("754","Mon Carlo Delima","logged out","2023-04-07 15:05:36");
INSERT INTO audit_trail VALUES("755","SV1_Admin","logged in","2023-04-07 15:05:38");
INSERT INTO audit_trail VALUES("756","SV1_Admin","logged out","2023-04-07 15:07:08");
INSERT INTO audit_trail VALUES("757","Mon Carlo Delima","logged in","2023-04-07 15:07:11");
INSERT INTO audit_trail VALUES("758","Mon Carlo Delima","logged out","2023-04-07 15:07:35");
INSERT INTO audit_trail VALUES("759","SV1_Admin","logged in","2023-04-07 15:07:38");
INSERT INTO audit_trail VALUES("760","SV1_Admin","added a new amenity Sunnyvale 4-Court","2023-04-07 15:08:22");
INSERT INTO audit_trail VALUES("761","SV1_Admin","logged out","2023-04-07 15:13:49");
INSERT INTO audit_trail VALUES("762","Mon Carlo Delima","logged in","2023-04-07 15:13:54");
INSERT INTO audit_trail VALUES("763","Mon Carlo Delima","logged out","2023-04-07 15:14:46");
INSERT INTO audit_trail VALUES("764","SV1_Admin","logged in","2023-04-07 15:14:48");
INSERT INTO audit_trail VALUES("765","SV1_Treasurer","logged in","2023-04-07 19:43:08");
INSERT INTO audit_trail VALUES("766","SV1_Treasurer","logged out","2023-04-07 19:43:35");
INSERT INTO audit_trail VALUES("767","SV1_Secretary","logged in","2023-04-07 19:43:38");
INSERT INTO audit_trail VALUES("768","SV1_Secretary","logged out","2023-04-07 19:43:44");
INSERT INTO audit_trail VALUES("769","SV1_Treasurer","logged in","2023-04-07 19:43:46");
INSERT INTO audit_trail VALUES("770","SV1_Treasurer","logged out","2023-04-07 19:49:20");
INSERT INTO audit_trail VALUES("771","SV1_Admin","logged in","2023-04-07 19:49:24");
INSERT INTO audit_trail VALUES("772","SV1_Admin","logged out","2023-04-07 19:49:27");
INSERT INTO audit_trail VALUES("773","SV1_Treasurer","logged in","2023-04-07 19:49:32");
INSERT INTO audit_trail VALUES("774","SV1_Admin","logged in","2023-04-07 20:10:49");
INSERT INTO audit_trail VALUES("775","SV1_Treasurer","logged out","2023-04-07 21:16:13");
INSERT INTO audit_trail VALUES("776","SV1_Treasurer","logged in","2023-04-07 21:16:18");
INSERT INTO audit_trail VALUES("777","SV1_Treasurer","logged out","2023-04-07 21:40:59");
INSERT INTO audit_trail VALUES("778","SV1_Treasurer","logged in","2023-04-07 21:41:02");
INSERT INTO audit_trail VALUES("779","SV1_Treasurer","logged out","2023-04-07 22:20:03");
INSERT INTO audit_trail VALUES("780","SV1_Admin","logged in","2023-04-07 22:20:07");
INSERT INTO audit_trail VALUES("781","SV1_Admin","logged out","2023-04-07 22:20:24");
INSERT INTO audit_trail VALUES("782","SV1_Treasurer","logged in","2023-04-07 22:20:30");
INSERT INTO audit_trail VALUES("783","SV1_Treasurer","logged out","2023-04-07 22:54:40");
INSERT INTO audit_trail VALUES("784","Mon Carlo Delima","logged in","2023-04-07 22:54:42");
INSERT INTO audit_trail VALUES("785","Mon Carlo Delima","logged out","2023-04-07 22:55:26");
INSERT INTO audit_trail VALUES("786","SV1_Treasurer","logged in","2023-04-07 22:55:30");
INSERT INTO audit_trail VALUES("787","SV1_Treasurer","logged out","2023-04-07 23:21:59");
INSERT INTO audit_trail VALUES("788","SV1_Treasurer","logged in","2023-04-08 10:19:51");
INSERT INTO audit_trail VALUES("789","SV1_Treasurer","logged out","2023-04-08 10:33:07");
INSERT INTO audit_trail VALUES("790","SV1_Admin","logged in","2023-04-08 10:33:12");
INSERT INTO audit_trail VALUES("791","SV1_Admin","logged out","2023-04-08 10:33:52");
INSERT INTO audit_trail VALUES("792","SV1_Treasurer","logged in","2023-04-08 10:33:55");
INSERT INTO audit_trail VALUES("793","SV1_Treasurer","logged out","2023-04-08 10:34:44");
INSERT INTO audit_trail VALUES("794","SV1_Admin","logged in","2023-04-08 10:34:48");
INSERT INTO audit_trail VALUES("795","SV1_Admin","logged out","2023-04-08 10:48:31");
INSERT INTO audit_trail VALUES("796","SV1_Treasurer","logged in","2023-04-08 10:48:34");
INSERT INTO audit_trail VALUES("797","SV1_Treasurer","logged out","2023-04-08 10:50:37");
INSERT INTO audit_trail VALUES("798","SV1_Admin","logged in","2023-04-08 10:50:46");
INSERT INTO audit_trail VALUES("799","SV1_Admin","logged out","2023-04-08 12:09:33");
INSERT INTO audit_trail VALUES("800","SV1_Admin","logged in","2023-04-08 12:09:35");
INSERT INTO audit_trail VALUES("801","SV1_Admin","logged out","2023-04-08 12:09:48");
INSERT INTO audit_trail VALUES("802","SV1_Treasurer","logged in","2023-04-08 12:09:55");
INSERT INTO audit_trail VALUES("803","SV1_Treasurer","logged out","2023-04-08 12:10:03");
INSERT INTO audit_trail VALUES("804","SV1_Admin","logged in","2023-04-08 12:10:08");
INSERT INTO audit_trail VALUES("805","SV1_Admin","logged out","2023-04-08 12:10:55");
INSERT INTO audit_trail VALUES("806","SV1_Admin","logged in","2023-04-08 12:11:04");
INSERT INTO audit_trail VALUES("807","SV1_Admin","logged out","2023-04-08 12:11:46");
INSERT INTO audit_trail VALUES("808","SV1_Admin","logged in","2023-04-08 12:11:53");
INSERT INTO audit_trail VALUES("809","SV1_Admin","logged out","2023-04-08 12:12:12");
INSERT INTO audit_trail VALUES("810","Kyle Andrei Casingal","logged in","2023-04-08 12:12:16");
INSERT INTO audit_trail VALUES("811","Mon Carlo Delima","logged in","2023-04-08 12:17:07");
INSERT INTO audit_trail VALUES("812","Kyle Andrei Casingal","submitted a concern","2023-04-08 12:30:20");
INSERT INTO audit_trail VALUES("813","Kyle Andrei Casingal","logged out","2023-04-08 12:32:50");
INSERT INTO audit_trail VALUES("814","Mon Carlo Delima","logged in","2023-04-08 12:32:53");
INSERT INTO audit_trail VALUES("815","Mon Carlo Delima","logged out","2023-04-08 12:48:32");
INSERT INTO audit_trail VALUES("816","SV1_Admin","logged in","2023-04-08 12:48:35");
INSERT INTO audit_trail VALUES("817","SV1_Admin","logged out","2023-04-08 12:48:43");
INSERT INTO audit_trail VALUES("818","SV1_Treasurer","logged in","2023-04-08 12:48:46");
INSERT INTO audit_trail VALUES("819","SV1_Treasurer","logged in","2023-04-08 18:00:37");
INSERT INTO audit_trail VALUES("820","SV1_Treasurer","logged out","2023-04-08 18:01:29");
INSERT INTO audit_trail VALUES("821","Mon Carlo Delima","logged in","2023-04-08 18:01:32");
INSERT INTO audit_trail VALUES("822","Mon Carlo Delima","logged out","2023-04-08 18:02:31");
INSERT INTO audit_trail VALUES("823","SV1_Admin","logged in","2023-04-08 18:02:42");
INSERT INTO audit_trail VALUES("824","SV1_Admin","updated an existing system account John Does-Treasurer","2023-04-08 18:03:13");
INSERT INTO audit_trail VALUES("825","SV1_Admin","updated an existing system account John Does-Treasurer","2023-04-08 18:03:24");
INSERT INTO audit_trail VALUES("826","SV1_Admin","updated an existing system account John Doe-Treasurer","2023-04-08 18:04:03");
INSERT INTO audit_trail VALUES("827","SV1_Admin","updated an existing system account John Doe-Treasurer","2023-04-08 18:04:08");
INSERT INTO audit_trail VALUES("828","SV1_Admin","updated an existing system account John Doe-Treasurer","2023-04-08 18:04:46");
INSERT INTO audit_trail VALUES("829","SV1_Admin","updated an existing system account John Doe-Treasurer","2023-04-08 18:04:50");
INSERT INTO audit_trail VALUES("830","SV1_Admin","updated an existing system account SV1_Admins-Admin","2023-04-08 18:05:55");
INSERT INTO audit_trail VALUES("831","SV1_Admin","updated an existing system account SV1_Admin-Admin","2023-04-08 18:06:01");
INSERT INTO audit_trail VALUES("832","SV1_Admin","updated an existing system account SV1_Admin-Admin","2023-04-08 18:06:04");
INSERT INTO audit_trail VALUES("833","SV1_Admin","updated an existing system account John Does-Treasurer","2023-04-08 18:07:51");
INSERT INTO audit_trail VALUES("834","SV1_Admin","updated an existing system account John Does-Treasurer","2023-04-08 18:07:56");
INSERT INTO audit_trail VALUES("835","SV1_Admin","updated an existing system account -Treasurer","2023-04-08 18:19:10");
INSERT INTO audit_trail VALUES("836","SV1_Admin","logged out","2023-04-08 18:19:17");
INSERT INTO audit_trail VALUES("837","John Does","logged in","2023-04-08 18:21:06");
INSERT INTO audit_trail VALUES("838","John Does","logged out","2023-04-08 18:22:32");
INSERT INTO audit_trail VALUES("839","SV1_Admin","logged in","2023-04-08 18:22:39");
INSERT INTO audit_trail VALUES("840","SV1_Admin","updated an existing system account -Treasurer","2023-04-08 18:22:48");
INSERT INTO audit_trail VALUES("841","SV1_Admin","logged out","2023-04-08 18:22:54");
INSERT INTO audit_trail VALUES("842","John Doe","logged in","2023-04-08 18:23:01");
INSERT INTO audit_trail VALUES("843","John Doe","logged out","2023-04-08 18:23:36");
INSERT INTO audit_trail VALUES("844","SV1_Admin","logged in","2023-04-08 18:23:40");
INSERT INTO audit_trail VALUES("845","SV1_Admin","updated an existing system account -Treasurer","2023-04-08 18:23:45");
INSERT INTO audit_trail VALUES("846","SV1_Admin","logged out","2023-04-08 18:23:46");
INSERT INTO audit_trail VALUES("847","John Does","logged in","2023-04-08 18:23:53");
INSERT INTO audit_trail VALUES("848","John Does","logged out","2023-04-08 18:23:57");
INSERT INTO audit_trail VALUES("849","SV1_Admin","logged in","2023-04-08 18:24:25");
INSERT INTO audit_trail VALUES("850","SV1_Admin","added a new system account SV2_Admin-Admin","2023-04-08 18:24:38");
INSERT INTO audit_trail VALUES("851","SV1_Admin","updated an existing system account -Admin","2023-04-08 18:25:03");
INSERT INTO audit_trail VALUES("852","SV1_Admin","updated an existing system account -Admin","2023-04-08 18:30:37");
INSERT INTO audit_trail VALUES("853","SV1_Admin","updated an existing system account -Admin","2023-04-08 18:30:40");
INSERT INTO audit_trail VALUES("854","SV1_Admin","updated an existing system account -Admin","2023-04-08 18:31:17");
INSERT INTO audit_trail VALUES("855","SV1_Admin","logged out","2023-04-08 18:31:43");
INSERT INTO audit_trail VALUES("856","SV2_Admins123","logged in","2023-04-08 18:31:50");
INSERT INTO audit_trail VALUES("857","SV2_Admins123","logged out","2023-04-08 18:31:53");
INSERT INTO audit_trail VALUES("858","SV1_Admin","logged in","2023-04-08 18:31:58");
INSERT INTO audit_trail VALUES("859","SV1_Admin","updated an existing system account -Admin","2023-04-08 18:32:04");
INSERT INTO audit_trail VALUES("860","SV1_Admin","logged out","2023-04-08 18:32:08");
INSERT INTO audit_trail VALUES("861","SV1_Admin","logged in","2023-04-08 18:36:45");
INSERT INTO audit_trail VALUES("862","SV1_Admin","updated an existing system account -Admin","2023-04-08 18:37:01");
INSERT INTO audit_trail VALUES("863","SV1_Admin","updated an existing system account -Admin","2023-04-08 18:37:23");
INSERT INTO audit_trail VALUES("864","SV1_Admin","logged out","2023-04-08 18:37:25");
INSERT INTO audit_trail VALUES("865","SV1_Admin","logged in","2023-04-09 07:24:32");
INSERT INTO audit_trail VALUES("866","SV1_Admin","logged out","2023-04-09 07:28:27");
INSERT INTO audit_trail VALUES("867","Mon Carlo Delima","logged in","2023-04-09 07:28:35");
INSERT INTO audit_trail VALUES("868","Mon Carlo Delima","logged out","2023-04-09 07:34:22");
INSERT INTO audit_trail VALUES("869","SV1_Admin","logged in","2023-04-09 07:34:25");
INSERT INTO audit_trail VALUES("870","SV1_Admin","added homeowner test test","2023-04-09 07:43:18");
INSERT INTO audit_trail VALUES("871","SV1_Admin","added homeowner test test","2023-04-09 07:54:42");
INSERT INTO audit_trail VALUES("872","SV1_Admin","added homeowner a a","2023-04-09 07:56:21");
INSERT INTO audit_trail VALUES("873","SV1_Admin","added homeowner b b","2023-04-09 07:56:49");
INSERT INTO audit_trail VALUES("874","SV1_Admin","added homeowner b b","2023-04-09 07:58:13");
INSERT INTO audit_trail VALUES("875","SV1_Admin","added homeowner b b","2023-04-09 08:02:09");
INSERT INTO audit_trail VALUES("876","SV1_Admin","added homeowner c c","2023-04-09 08:02:34");
INSERT INTO audit_trail VALUES("877","Mon Carlo Delima","updated homeowner Mon Carlo Delima","2023-04-09 08:07:53");
INSERT INTO audit_trail VALUES("878","Mon Carlo Delima","updated homeowner Mon Carlo Delima","2023-04-09 08:08:13");
INSERT INTO audit_trail VALUES("879","Mon Carlo Delima","updated homeowner Mon Carlo Delima","2023-04-09 08:08:56");
INSERT INTO audit_trail VALUES("880","Mon Carl Delima","updated homeowner Mon Carl Delima","2023-04-09 08:09:25");
INSERT INTO audit_trail VALUES("881","Mon Carlo Delima","updated homeowner Mon Carlo Delima","2023-04-09 08:10:29");
INSERT INTO audit_trail VALUES("882","Mon Carlo Delima","updated homeowner Mon Carlo Delima","2023-04-09 08:11:43");
INSERT INTO audit_trail VALUES("883","Mon Carlo Delima","updated homeowner Mon Carlo Delima","2023-04-09 08:13:00");
INSERT INTO audit_trail VALUES("884","Mon Carlo Delima","updated homeowner Mon Carlo Delima","2023-04-09 08:13:41");
INSERT INTO audit_trail VALUES("885","Mon Carlo Delima","updated homeowner Mon Carlo Delima","2023-04-09 08:15:18");
INSERT INTO audit_trail VALUES("886","Mon Carlo Delima","updated homeowner Mon Carlo Delima","2023-04-09 08:16:00");
INSERT INTO audit_trail VALUES("887","Mon Carlo Delima","logged out","2023-04-09 08:17:08");
INSERT INTO audit_trail VALUES("888","Mon Carlo Delima","logged in","2023-04-09 08:17:13");
INSERT INTO audit_trail VALUES("889","Mon Carlo Delima","logged out","2023-04-09 08:17:27");
INSERT INTO audit_trail VALUES("890","SV1_Admin","logged in","2023-04-09 08:19:03");
INSERT INTO audit_trail VALUES("891","SV1_Admin","logged out","2023-04-09 08:19:05");
INSERT INTO audit_trail VALUES("892","Mon Carlo Delima","logged in","2023-04-09 08:19:07");
INSERT INTO audit_trail VALUES("893","Mon Carlo Delima","logged out","2023-04-09 08:19:12");
INSERT INTO audit_trail VALUES("894","SV1_Admin","logged in","2023-04-09 08:19:13");
INSERT INTO audit_trail VALUES("895","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-09 08:22:52");
INSERT INTO audit_trail VALUES("896","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-09 08:23:15");
INSERT INTO audit_trail VALUES("897","SV1_Admin","logged out","2023-04-09 08:23:57");
INSERT INTO audit_trail VALUES("898","SV1_Admin","logged in","2023-04-09 08:23:59");
INSERT INTO audit_trail VALUES("899","SV1_Admin","added a new system account SV3_Admin-Admin","2023-04-09 08:24:14");
INSERT INTO audit_trail VALUES("900","SV1_Admin","logged out","2023-04-09 08:24:29");
INSERT INTO audit_trail VALUES("901","SV3_Admin","logged in","2023-04-09 08:24:36");
INSERT INTO audit_trail VALUES("902","SV3_Admin","logged out","2023-04-09 08:24:39");
INSERT INTO audit_trail VALUES("903","SV1_Admin","logged in","2023-04-09 08:24:45");
INSERT INTO audit_trail VALUES("904","SV1_Admin","updated an existing system account -Admin","2023-04-09 08:24:53");
INSERT INTO audit_trail VALUES("905","SV1_Admin","updated an existing system account -Admin","2023-04-09 08:25:02");
INSERT INTO audit_trail VALUES("906","SV1_Admin","logged out","2023-04-09 08:25:04");
INSERT INTO audit_trail VALUES("907","SV1_Admin","logged in","2023-04-09 08:28:39");
INSERT INTO audit_trail VALUES("908","SV1_Admin","logged out","2023-04-09 08:28:44");
INSERT INTO audit_trail VALUES("909","Mon Carlo Delima","logged in","2023-04-09 08:28:47");
INSERT INTO audit_trail VALUES("910","Mon Carlo Delima","logged out","2023-04-09 08:28:57");
INSERT INTO audit_trail VALUES("911","SV1_Admin","logged in","2023-04-09 08:29:00");
INSERT INTO audit_trail VALUES("912","SV1_Admin","logged out","2023-04-09 08:31:00");
INSERT INTO audit_trail VALUES("913","SV1_Admin","logged in","2023-04-09 08:31:02");
INSERT INTO audit_trail VALUES("914","SV1_Admin","logged out","2023-04-09 08:31:06");
INSERT INTO audit_trail VALUES("915","Mon Carlo Delima","logged in","2023-04-09 08:31:08");
INSERT INTO audit_trail VALUES("916","Mon Carlo Delima","logged out","2023-04-09 08:31:31");
INSERT INTO audit_trail VALUES("917","Mon Carlo Delima","logged in","2023-04-09 10:17:11");
INSERT INTO audit_trail VALUES("918","Mon Carlo Delima","logged out","2023-04-09 10:17:16");
INSERT INTO audit_trail VALUES("919","SV1_Admin","logged in","2023-04-09 10:17:24");
INSERT INTO audit_trail VALUES("920","SV1_Admin","added a new system account SV1_Guard-Guard","2023-04-09 10:19:10");
INSERT INTO audit_trail VALUES("921","SV1_Admin","logged out","2023-04-09 10:20:57");
INSERT INTO audit_trail VALUES("922","SV1_Guard","logged in","2023-04-09 10:21:03");
INSERT INTO audit_trail VALUES("923","SV1_Guard","logged out","2023-04-09 10:29:17");
INSERT INTO audit_trail VALUES("924","SV1_Guard","logged in","2023-04-09 10:29:28");
INSERT INTO audit_trail VALUES("925","SV1_Guard","logged out","2023-04-09 10:32:21");
INSERT INTO audit_trail VALUES("926","SV1_Guard","logged in","2023-04-09 10:32:35");
INSERT INTO audit_trail VALUES("927","SV1_Guard","logged out","2023-04-09 10:32:49");
INSERT INTO audit_trail VALUES("928","SV1_Guard","logged in","2023-04-09 10:32:51");
INSERT INTO audit_trail VALUES("929","SV1_Guard","logged out","2023-04-09 10:33:21");
INSERT INTO audit_trail VALUES("930","SV1_Guard","logged in","2023-04-09 10:33:23");
INSERT INTO audit_trail VALUES("931","SV1_Guard","logged out","2023-04-09 10:33:38");
INSERT INTO audit_trail VALUES("932","SV1_Guard","logged in","2023-04-09 10:33:40");
INSERT INTO audit_trail VALUES("933","SV1_Guard","logged out","2023-04-09 10:36:39");
INSERT INTO audit_trail VALUES("934","Mon Carlo Delima","logged in","2023-04-09 10:36:42");
INSERT INTO audit_trail VALUES("935","Mon Carlo Delima","logged out","2023-04-09 10:36:44");
INSERT INTO audit_trail VALUES("936","SV1_Guard","logged in","2023-04-09 10:36:47");
INSERT INTO audit_trail VALUES("937","SV1_Guard","logged out","2023-04-09 10:39:38");
INSERT INTO audit_trail VALUES("938","SV1_Guard","logged in","2023-04-09 10:39:40");
INSERT INTO audit_trail VALUES("939","SV1_Guard","logged out","2023-04-09 10:40:54");
INSERT INTO audit_trail VALUES("940","SV1_Guard","logged in","2023-04-09 10:40:59");
INSERT INTO audit_trail VALUES("941","SV1_Guard","logged out","2023-04-09 10:52:31");
INSERT INTO audit_trail VALUES("942","SV1_Guard","logged in","2023-04-09 10:52:33");
INSERT INTO audit_trail VALUES("943","SV1_Guard","logged out","2023-04-09 10:52:45");
INSERT INTO audit_trail VALUES("944","SV1_Guard","logged in","2023-04-09 10:53:07");
INSERT INTO audit_trail VALUES("945","SV1_Guard","logged out","2023-04-09 10:57:43");
INSERT INTO audit_trail VALUES("946","SV1_Guard","logged in","2023-04-09 10:57:57");
INSERT INTO audit_trail VALUES("947","SV1_Guard","logged out","2023-04-09 11:01:50");
INSERT INTO audit_trail VALUES("948","Mon Carlo Delima","logged in","2023-04-09 11:01:53");
INSERT INTO audit_trail VALUES("949","Mon Carlo Delima","logged out","2023-04-09 11:03:09");
INSERT INTO audit_trail VALUES("950","Mon Carlo Delima","logged in","2023-04-09 11:03:12");
INSERT INTO audit_trail VALUES("951","Mon Carlo Delima","logged out","2023-04-09 11:03:30");
INSERT INTO audit_trail VALUES("952","Mon Carlo Delima","logged in","2023-04-09 11:03:33");
INSERT INTO audit_trail VALUES("953","Mon Carlo Delima","logged out","2023-04-09 11:03:50");
INSERT INTO audit_trail VALUES("954","SV1_Guard","logged in","2023-04-09 11:03:52");
INSERT INTO audit_trail VALUES("955","SV1_Guard","logged out","2023-04-09 11:05:07");
INSERT INTO audit_trail VALUES("956","SV1_Admin","logged in","2023-04-09 11:05:10");
INSERT INTO audit_trail VALUES("957","SV1_Admin","logged out","2023-04-09 11:06:08");
INSERT INTO audit_trail VALUES("958","SV1_Guard","logged in","2023-04-09 11:06:11");
INSERT INTO audit_trail VALUES("959","SV1_Guard","logged in","2023-04-09 11:08:52");
INSERT INTO audit_trail VALUES("960","SV1_Guard","logged in","2023-04-09 11:08:56");
INSERT INTO audit_trail VALUES("961","SV1_Guard","logged in","2023-04-09 11:09:06");
INSERT INTO audit_trail VALUES("962","SV1_Guard","logged in","2023-04-09 11:09:16");
INSERT INTO audit_trail VALUES("963","SV1_Guard","logged in","2023-04-09 11:09:23");
INSERT INTO audit_trail VALUES("964","SV1_Guard","logged out","2023-04-09 11:10:06");
INSERT INTO audit_trail VALUES("965","SV1_Guard","logged in","2023-04-09 11:10:09");
INSERT INTO audit_trail VALUES("966","SV1_Guard","logged out","2023-04-09 11:11:56");
INSERT INTO audit_trail VALUES("967","SV1_Admin","logged in","2023-04-09 11:12:00");
INSERT INTO audit_trail VALUES("968","SV1_Admin","logged out","2023-04-09 11:12:20");
INSERT INTO audit_trail VALUES("969","SV1_Guard","logged in","2023-04-09 11:12:24");
INSERT INTO audit_trail VALUES("970","SV1_Guard","logged out","2023-04-09 11:14:42");
INSERT INTO audit_trail VALUES("971","SV1_Admin","logged in","2023-04-09 11:14:46");
INSERT INTO audit_trail VALUES("972","SV1_Admin","logged out","2023-04-09 11:15:06");
INSERT INTO audit_trail VALUES("973","Mon Carlo Delima","logged in","2023-04-09 11:15:09");
INSERT INTO audit_trail VALUES("974","Mon Carlo Delima","logged out","2023-04-09 11:15:20");
INSERT INTO audit_trail VALUES("975","SV1_Admin","logged in","2023-04-09 11:15:23");
INSERT INTO audit_trail VALUES("976","SV1_Admin","logged out","2023-04-09 11:22:14");
INSERT INTO audit_trail VALUES("977","Mon Carlo Delima","logged in","2023-04-09 11:22:18");
INSERT INTO audit_trail VALUES("978","Mon Carlo Delima","logged out","2023-04-09 11:25:21");
INSERT INTO audit_trail VALUES("979","SV1_Guard","logged in","2023-04-09 11:25:24");
INSERT INTO audit_trail VALUES("980","SV1_Guard","logged out","2023-04-09 11:29:52");
INSERT INTO audit_trail VALUES("981","SV1_Guard","logged in","2023-04-09 11:30:00");
INSERT INTO audit_trail VALUES("982","SV1_Guard","logged out","2023-04-09 11:30:11");
INSERT INTO audit_trail VALUES("983","SV1_Guard","logged in","2023-04-09 11:30:19");
INSERT INTO audit_trail VALUES("984","SV1_Guard","logged out","2023-04-09 11:33:18");
INSERT INTO audit_trail VALUES("985","SV1_Admin","logged in","2023-04-09 11:33:20");
INSERT INTO audit_trail VALUES("986","SV1_Admin","logged out","2023-04-09 11:33:46");
INSERT INTO audit_trail VALUES("987","SV1_Admin","logged in","2023-04-09 11:33:48");
INSERT INTO audit_trail VALUES("988","SV1_Admin","logged out","2023-04-09 11:36:04");
INSERT INTO audit_trail VALUES("989","SV1_Admin","logged in","2023-04-09 11:36:07");
INSERT INTO audit_trail VALUES("990","SV1_Admin","logged out","2023-04-09 11:37:00");
INSERT INTO audit_trail VALUES("991","SV1_Admin","logged in","2023-04-09 11:37:02");
INSERT INTO audit_trail VALUES("992","SV1_Admin","logged out","2023-04-09 11:40:22");
INSERT INTO audit_trail VALUES("993","SV1_Secretary","logged in","2023-04-09 11:40:25");
INSERT INTO audit_trail VALUES("994","SV1_Secretary","logged out","2023-04-09 11:41:00");
INSERT INTO audit_trail VALUES("995","SV1_Guard","logged in","2023-04-09 11:41:06");
INSERT INTO audit_trail VALUES("996","SV1_Guard","logged out","2023-04-09 11:41:12");
INSERT INTO audit_trail VALUES("997","SV1_Admin","logged in","2023-04-09 11:41:15");
INSERT INTO audit_trail VALUES("998","SV1_Admin","logged out","2023-04-09 11:42:01");
INSERT INTO audit_trail VALUES("999","SV1_Admin","logged in","2023-04-09 11:42:03");
INSERT INTO audit_trail VALUES("1000","SV1_Admin","logged out","2023-04-09 11:44:53");
INSERT INTO audit_trail VALUES("1001","SV1_Secretary","logged in","2023-04-09 11:44:57");
INSERT INTO audit_trail VALUES("1002","SV1_Secretary","logged out","2023-04-09 11:45:44");
INSERT INTO audit_trail VALUES("1003","SV1_Guard","logged in","2023-04-09 11:45:46");
INSERT INTO audit_trail VALUES("1004","SV1_Guard","logged out","2023-04-09 11:49:56");
INSERT INTO audit_trail VALUES("1005","SV1_Treasurer","logged in","2023-04-09 11:50:24");
INSERT INTO audit_trail VALUES("1006","SV1_Treasurer","logged out","2023-04-09 11:51:46");
INSERT INTO audit_trail VALUES("1007","SV1_Admin","logged in","2023-04-09 11:51:49");
INSERT INTO audit_trail VALUES("1008","SV1_Admin","logged out","2023-04-09 11:52:05");
INSERT INTO audit_trail VALUES("1009","Mon Carlo Delima","logged in","2023-04-09 11:52:08");
INSERT INTO audit_trail VALUES("1010","Mon Carlo Delima","logged out","2023-04-09 12:09:57");
INSERT INTO audit_trail VALUES("1011","SV1_Admin","logged in","2023-04-09 12:10:00");
INSERT INTO audit_trail VALUES("1012","SV1_Admin","logged out","2023-04-09 12:11:04");
INSERT INTO audit_trail VALUES("1013","SV1_Admin","logged in","2023-04-09 12:11:07");
INSERT INTO audit_trail VALUES("1014","SV1_Admin","logged out","2023-04-09 12:11:20");
INSERT INTO audit_trail VALUES("1015","SV1_Admin","logged in","2023-04-09 12:23:15");
INSERT INTO audit_trail VALUES("1016","SV1_Admin","logged out","2023-04-09 12:23:21");
INSERT INTO audit_trail VALUES("1017","SV1_Guard","logged in","2023-04-09 12:23:23");
INSERT INTO audit_trail VALUES("1018","SV1_Guard","logged out","2023-04-09 12:24:21");
INSERT INTO audit_trail VALUES("1019","SV1_Guard","logged in","2023-04-09 12:24:25");
INSERT INTO audit_trail VALUES("1020","SV1_Guard","logged out","2023-04-09 13:14:16");
INSERT INTO audit_trail VALUES("1021","Mon Carlo Delima","logged in","2023-04-09 13:23:57");
INSERT INTO audit_trail VALUES("1022","Mon Carlo Delima","logged out","2023-04-09 13:25:32");
INSERT INTO audit_trail VALUES("1023","SV1_Treasurer","logged in","2023-04-09 13:25:38");
INSERT INTO audit_trail VALUES("1024","SV1_Treasurer","logged out","2023-04-09 13:52:50");
INSERT INTO audit_trail VALUES("1025","SV1_Guard","logged in","2023-04-09 13:52:53");
INSERT INTO audit_trail VALUES("1026","SV1_Guard","logged out","2023-04-09 14:25:16");
INSERT INTO audit_trail VALUES("1027","SV1_Admin","logged in","2023-04-09 14:25:20");
INSERT INTO audit_trail VALUES("1028","SV1_Admin","logged out","2023-04-09 14:28:35");
INSERT INTO audit_trail VALUES("1029","SV1_Admin","logged in","2023-04-09 14:28:44");
INSERT INTO audit_trail VALUES("1030","SV1_Admin","logged out","2023-04-09 14:29:28");
INSERT INTO audit_trail VALUES("1031","SV1_Treasurer","logged in","2023-04-09 14:29:33");
INSERT INTO audit_trail VALUES("1032","SV1_Treasurer","logged out","2023-04-09 14:30:45");
INSERT INTO audit_trail VALUES("1033","SV1_Admin","logged in","2023-04-09 14:30:48");
INSERT INTO audit_trail VALUES("1034","SV1_Admin","logged out","2023-04-09 14:33:37");
INSERT INTO audit_trail VALUES("1035","SV1_Admin","logged in","2023-04-09 14:33:39");
INSERT INTO audit_trail VALUES("1036","SV1_Admin","logged out","2023-04-09 14:53:39");
INSERT INTO audit_trail VALUES("1037","SV1_Admin","logged in","2023-04-09 14:53:42");
INSERT INTO audit_trail VALUES("1038","SV1_Admin","logged out","2023-04-09 14:59:34");
INSERT INTO audit_trail VALUES("1039","SV1_Admin","logged in","2023-04-09 14:59:37");
INSERT INTO audit_trail VALUES("1040","SV1_Admin","logged out","2023-04-09 15:00:01");
INSERT INTO audit_trail VALUES("1041","SV1_Admin","logged in","2023-04-09 15:00:03");
INSERT INTO audit_trail VALUES("1042","SV1_Admin","logged out","2023-04-09 15:07:21");
INSERT INTO audit_trail VALUES("1043","SV1_Treasurer","logged in","2023-04-09 15:07:24");
INSERT INTO audit_trail VALUES("1044","SV1_Treasurer","logged out","2023-04-09 15:14:00");
INSERT INTO audit_trail VALUES("1045","SV1_Secretary","logged in","2023-04-09 15:14:02");
INSERT INTO audit_trail VALUES("1046","SV1_Secretary","logged out","2023-04-09 15:19:15");
INSERT INTO audit_trail VALUES("1047","SV1_Admin","logged in","2023-04-09 15:19:18");
INSERT INTO audit_trail VALUES("1048","SV1_Admin","logged out","2023-04-09 15:20:13");
INSERT INTO audit_trail VALUES("1049","SV1_Admin","logged in","2023-04-09 15:20:15");
INSERT INTO audit_trail VALUES("1050","SV1_Admin","logged out","2023-04-09 15:20:29");
INSERT INTO audit_trail VALUES("1051","SV1_Treasurer","logged in","2023-04-09 15:20:32");
INSERT INTO audit_trail VALUES("1052","SV1_Treasurer","logged out","2023-04-09 15:28:08");
INSERT INTO audit_trail VALUES("1053","SV1_Admin","logged in","2023-04-09 15:28:11");
INSERT INTO audit_trail VALUES("1054","SV1_Admin","logged out","2023-04-09 15:29:54");
INSERT INTO audit_trail VALUES("1055","SV1_Secretary","logged in","2023-04-09 15:30:03");
INSERT INTO audit_trail VALUES("1056","SV1_Secretary","logged out","2023-04-09 15:30:11");
INSERT INTO audit_trail VALUES("1057","SV1_Admin","logged in","2023-04-09 15:31:02");
INSERT INTO audit_trail VALUES("1058","SV1_Admin","logged out","2023-04-09 15:42:56");
INSERT INTO audit_trail VALUES("1059","Mon Carlo Delima","logged in","2023-04-09 15:43:00");
INSERT INTO audit_trail VALUES("1060","Mon Carlo Delima","logged out","2023-04-09 15:46:19");
INSERT INTO audit_trail VALUES("1061","SV1_Treasurer","logged in","2023-04-09 15:46:22");
INSERT INTO audit_trail VALUES("1062","SV1_Treasurer","logged out","2023-04-09 15:46:54");
INSERT INTO audit_trail VALUES("1063","Mon Carlo Delima","logged in","2023-04-09 15:46:56");
INSERT INTO audit_trail VALUES("1064","Mon Carlo Delima","logged out","2023-04-09 15:50:32");
INSERT INTO audit_trail VALUES("1065","SV1_Treasurer","logged in","2023-04-09 15:50:35");
INSERT INTO audit_trail VALUES("1066","SV1_Treasurer","logged out","2023-04-09 15:52:30");
INSERT INTO audit_trail VALUES("1067","Mon Carlo Delima","logged in","2023-04-09 15:52:33");
INSERT INTO audit_trail VALUES("1068","Mon Carlo Delima","logged out","2023-04-09 15:52:47");
INSERT INTO audit_trail VALUES("1069","SV1_Admin","logged in","2023-04-09 15:52:49");
INSERT INTO audit_trail VALUES("1070","SV1_Admin","logged out","2023-04-09 15:54:10");
INSERT INTO audit_trail VALUES("1071","SV1_Secretary","logged in","2023-04-09 15:54:13");
INSERT INTO audit_trail VALUES("1072","SV1_Secretary","logged out","2023-04-09 15:54:30");
INSERT INTO audit_trail VALUES("1073","SV1_Secretary","logged in","2023-04-09 15:54:36");
INSERT INTO audit_trail VALUES("1074","SV1_Secretary","logged out","2023-04-09 15:55:39");
INSERT INTO audit_trail VALUES("1075","Mon Carlo Delima","logged in","2023-04-09 15:56:01");
INSERT INTO audit_trail VALUES("1076","Mon Carlo Delima","logged out","2023-04-09 16:02:20");
INSERT INTO audit_trail VALUES("1077","SV1_Admin","logged in","2023-04-09 16:02:23");
INSERT INTO audit_trail VALUES("1078","SV1_Admin","logged out","2023-04-09 16:02:40");
INSERT INTO audit_trail VALUES("1079","SV1_Treasurer","logged in","2023-04-09 16:02:45");
INSERT INTO audit_trail VALUES("1080","SV1_Treasurer","logged out","2023-04-09 16:04:04");
INSERT INTO audit_trail VALUES("1081","SV1_Admin","logged in","2023-04-09 16:04:07");
INSERT INTO audit_trail VALUES("1082","SV1_Admin","logged out","2023-04-09 16:11:14");
INSERT INTO audit_trail VALUES("1083","Mon Carlo Delima","logged in","2023-04-09 16:11:17");
INSERT INTO audit_trail VALUES("1084","Mon Carlo Delima","logged out","2023-04-09 16:12:33");
INSERT INTO audit_trail VALUES("1085","SV1_Admin","logged in","2023-04-09 16:12:35");
INSERT INTO audit_trail VALUES("1086","SV1_Admin","logged out","2023-04-09 16:13:59");
INSERT INTO audit_trail VALUES("1087","SV1_Treasurer","logged in","2023-04-09 16:14:02");
INSERT INTO audit_trail VALUES("1088","SV1_Treasurer","logged out","2023-04-09 16:15:02");
INSERT INTO audit_trail VALUES("1089","SV1_Admin","logged in","2023-04-09 16:15:22");
INSERT INTO audit_trail VALUES("1090","SV1_Admin","logged out","2023-04-09 16:15:43");
INSERT INTO audit_trail VALUES("1091","SV1_Admin","logged in","2023-04-09 16:15:54");
INSERT INTO audit_trail VALUES("1092","SV1_Admin","logged out","2023-04-09 16:24:04");
INSERT INTO audit_trail VALUES("1093","SV1_Treasurer","logged in","2023-04-09 16:24:08");
INSERT INTO audit_trail VALUES("1094","SV1_Treasurer","logged out","2023-04-09 16:24:57");
INSERT INTO audit_trail VALUES("1095","SV1_Admin","logged in","2023-04-09 16:25:00");
INSERT INTO audit_trail VALUES("1096","SV1_Admin","logged out","2023-04-09 16:27:38");
INSERT INTO audit_trail VALUES("1097","SV1_Admin","logged in","2023-04-09 16:27:42");
INSERT INTO audit_trail VALUES("1098","SV1_Admin","logged out","2023-04-09 16:29:13");
INSERT INTO audit_trail VALUES("1099","SV1_Admin","logged in","2023-04-09 16:29:38");
INSERT INTO audit_trail VALUES("1100","SV1_Admin","logged out","2023-04-09 16:31:44");
INSERT INTO audit_trail VALUES("1101","SV1_Treasurer","logged in","2023-04-09 16:31:47");
INSERT INTO audit_trail VALUES("1102","SV1_Treasurer","logged out","2023-04-09 16:32:01");
INSERT INTO audit_trail VALUES("1103","SV1_Admin","logged in","2023-04-09 16:32:05");
INSERT INTO audit_trail VALUES("1104","SV1_Admin","logged out","2023-04-09 16:32:53");
INSERT INTO audit_trail VALUES("1105","SV1_Treasurer","logged in","2023-04-09 16:32:56");
INSERT INTO audit_trail VALUES("1106","SV1_Treasurer","logged out","2023-04-09 16:33:02");
INSERT INTO audit_trail VALUES("1107","SV1_Admin","logged in","2023-04-09 16:33:05");
INSERT INTO audit_trail VALUES("1108","SV1_Admin","logged out","2023-04-09 16:33:31");
INSERT INTO audit_trail VALUES("1109","SV1_Treasurer","logged in","2023-04-09 16:33:35");
INSERT INTO audit_trail VALUES("1110","SV1_Treasurer","logged out","2023-04-09 16:34:04");
INSERT INTO audit_trail VALUES("1111","SV1_Treasurer","logged in","2023-04-09 16:34:09");
INSERT INTO audit_trail VALUES("1112","SV1_Treasurer","logged out","2023-04-09 16:34:30");
INSERT INTO audit_trail VALUES("1113","Mon Carlo Delima","logged in","2023-04-09 16:34:34");
INSERT INTO audit_trail VALUES("1114","Mon Carlo Delima","logged out","2023-04-09 16:35:37");
INSERT INTO audit_trail VALUES("1115","Mon Carlo Delima","logged in","2023-04-09 19:47:04");
INSERT INTO audit_trail VALUES("1116","Mon Carlo Delima","logged out","2023-04-09 19:56:58");
INSERT INTO audit_trail VALUES("1117","Mon Carlo Delima","logged in","2023-04-09 19:57:50");
INSERT INTO audit_trail VALUES("1118","Mon Carlo Delima","logged out","2023-04-09 19:58:05");
INSERT INTO audit_trail VALUES("1119","SV1_Admin","logged in","2023-04-09 19:58:09");
INSERT INTO audit_trail VALUES("1120","SV1_Admin","logged out","2023-04-09 19:59:28");
INSERT INTO audit_trail VALUES("1121","SV1_Guard","logged in","2023-04-09 19:59:30");
INSERT INTO audit_trail VALUES("1122","SV1_Guard","logged out","2023-04-09 20:00:02");
INSERT INTO audit_trail VALUES("1123","SV1_Guard","logged in","2023-04-09 20:00:04");
INSERT INTO audit_trail VALUES("1124","SV1_Guard","logged out","2023-04-09 20:00:07");
INSERT INTO audit_trail VALUES("1125","SV1_Admin","logged in","2023-04-09 20:00:09");
INSERT INTO audit_trail VALUES("1126","SV1_Admin","logged out","2023-04-09 20:00:13");
INSERT INTO audit_trail VALUES("1127","SV1_Secretary","logged in","2023-04-09 20:00:15");
INSERT INTO audit_trail VALUES("1128","SV1_Secretary","logged out","2023-04-09 20:01:44");
INSERT INTO audit_trail VALUES("1129","Mon Carlo Delima","logged in","2023-04-09 20:01:49");
INSERT INTO audit_trail VALUES("1130","Mon Carlo Delima","logged out","2023-04-09 20:01:52");
INSERT INTO audit_trail VALUES("1131","SV1_Treasurer","logged in","2023-04-09 20:01:55");
INSERT INTO audit_trail VALUES("1132","SV1_Treasurer","logged out","2023-04-09 20:20:34");
INSERT INTO audit_trail VALUES("1133","Mon Carlo Delima","logged in","2023-04-09 20:20:38");
INSERT INTO audit_trail VALUES("1134","Mon Carlo Delima","logged out","2023-04-09 20:21:42");
INSERT INTO audit_trail VALUES("1135","Mon Carlo Delima","logged in","2023-04-09 20:21:45");
INSERT INTO audit_trail VALUES("1136","Mon Carlo Delima","logged out","2023-04-09 20:23:07");
INSERT INTO audit_trail VALUES("1137","SV1_Admin","logged in","2023-04-09 20:23:09");
INSERT INTO audit_trail VALUES("1138","SV1_Admin","logged out","2023-04-09 20:24:23");
INSERT INTO audit_trail VALUES("1139","Mon Carlo Delima","logged in","2023-04-09 20:24:27");
INSERT INTO audit_trail VALUES("1140","Mon Carlo Delima","logged out","2023-04-09 20:26:02");
INSERT INTO audit_trail VALUES("1141","Mon Carlo Delima","logged in","2023-04-09 20:26:15");
INSERT INTO audit_trail VALUES("1142","Mon Carlo Delima","logged out","2023-04-09 20:26:47");
INSERT INTO audit_trail VALUES("1143","SV1_Treasurer","logged in","2023-04-09 20:26:50");
INSERT INTO audit_trail VALUES("1144","SV1_Treasurer","logged out","2023-04-09 20:27:48");
INSERT INTO audit_trail VALUES("1145","SV1_Admin","logged in","2023-04-09 20:27:57");
INSERT INTO audit_trail VALUES("1146","SV1_Admin","logged out","2023-04-09 20:28:01");
INSERT INTO audit_trail VALUES("1147","Mon Carlo Delima","logged in","2023-04-09 20:28:05");
INSERT INTO audit_trail VALUES("1148","Mon Carlo Delima","logged out","2023-04-09 20:29:13");
INSERT INTO audit_trail VALUES("1149","SV1_Admin","logged in","2023-04-09 20:29:15");
INSERT INTO audit_trail VALUES("1150","SV1_Admin","logged out","2023-04-09 20:29:56");
INSERT INTO audit_trail VALUES("1151","SV1_Guard","logged in","2023-04-09 20:29:59");
INSERT INTO audit_trail VALUES("1152","SV1_Guard","logged out","2023-04-09 20:30:09");
INSERT INTO audit_trail VALUES("1153","SV1_Admin","logged in","2023-04-09 20:30:12");
INSERT INTO audit_trail VALUES("1154","SV1_Admin","logged out","2023-04-09 20:50:25");
INSERT INTO audit_trail VALUES("1155","SV1_Secretary","logged in","2023-04-09 20:50:28");
INSERT INTO audit_trail VALUES("1156","SV1_Secretary","logged out","2023-04-09 20:50:32");
INSERT INTO audit_trail VALUES("1157","SV1_Admin","logged in","2023-04-09 20:50:40");
INSERT INTO audit_trail VALUES("1158","SV1_Admin","logged out","2023-04-09 20:51:46");
INSERT INTO audit_trail VALUES("1159","SV1_Treasurer","logged in","2023-04-09 20:51:49");
INSERT INTO audit_trail VALUES("1160","SV1_Treasurer","logged out","2023-04-09 20:54:10");
INSERT INTO audit_trail VALUES("1161","SV1_Admin","logged in","2023-04-09 20:54:19");
INSERT INTO audit_trail VALUES("1162","SV1_Admin","logged out","2023-04-09 20:56:00");
INSERT INTO audit_trail VALUES("1163","SV1_Admin","logged in","2023-04-09 20:56:04");
INSERT INTO audit_trail VALUES("1164","SV1_Admin","logged out","2023-04-09 20:59:08");
INSERT INTO audit_trail VALUES("1165","SV1_Admin","logged in","2023-04-09 21:07:55");
INSERT INTO audit_trail VALUES("1166","SV1_Admin","logged out","2023-04-09 21:33:51");
INSERT INTO audit_trail VALUES("1167","SV1_Treasurer","logged in","2023-04-09 21:33:57");
INSERT INTO audit_trail VALUES("1168","SV1_Treasurer","logged out","2023-04-09 21:35:54");
INSERT INTO audit_trail VALUES("1169","SV1_Admin","logged in","2023-04-09 21:35:56");
INSERT INTO audit_trail VALUES("1170","SV1_Admin","added a new subdivision  ","2023-04-09 22:15:46");
INSERT INTO audit_trail VALUES("1171","SV1_Admin","added a new subdivision Sunnyvale 5 Pantok","2023-04-09 22:24:15");
INSERT INTO audit_trail VALUES("1172","SV1_Admin","updated an existing subdivision Sunnyvale 1 Pantoks","2023-04-09 22:40:36");
INSERT INTO audit_trail VALUES("1173","SV1_Admin","updated an existing subdivision Sunnyvale 1 Pantok","2023-04-09 22:40:39");
INSERT INTO audit_trail VALUES("1174","SV1_Admin","logged out","2023-04-09 23:32:26");
INSERT INTO audit_trail VALUES("1175","Mon Carlo Delima","logged in","2023-04-09 23:32:29");
INSERT INTO audit_trail VALUES("1176","Mon Carlo Delima","logged out","2023-04-09 23:37:04");
INSERT INTO audit_trail VALUES("1177","SV1_Admin","logged in","2023-04-09 23:37:07");
INSERT INTO audit_trail VALUES("1178","SV1_Admin","logged out","2023-04-10 00:32:11");
INSERT INTO audit_trail VALUES("1179","SV1_Admin","logged in","2023-04-10 00:32:15");
INSERT INTO audit_trail VALUES("1180","SV1_Admin","added homeowner a a","2023-04-10 01:30:26");
INSERT INTO audit_trail VALUES("1181","SV1_Admin","added homeowner a a","2023-04-10 01:31:58");
INSERT INTO audit_trail VALUES("1182","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-10 01:35:30");
INSERT INTO audit_trail VALUES("1183","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-10 01:37:16");
INSERT INTO audit_trail VALUES("1184","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-10 01:37:55");
INSERT INTO audit_trail VALUES("1185","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-10 01:38:21");
INSERT INTO audit_trail VALUES("1186","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-10 01:38:51");
INSERT INTO audit_trail VALUES("1187","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-10 01:39:39");
INSERT INTO audit_trail VALUES("1188","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-10 01:40:20");
INSERT INTO audit_trail VALUES("1189","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-10 01:40:45");
INSERT INTO audit_trail VALUES("1190","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-10 01:41:53");
INSERT INTO audit_trail VALUES("1191","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-10 01:43:22");
INSERT INTO audit_trail VALUES("1192","SV1_Admin","updated homeowner Mon Carlo Delima","2023-04-10 01:51:18");
INSERT INTO audit_trail VALUES("1193","SV1_Admin","logged in","2023-04-10 07:37:42");
INSERT INTO audit_trail VALUES("1194","SV1_Admin","updated homeowner Kyle Andrei Casingal","2023-04-10 09:45:13");
INSERT INTO audit_trail VALUES("1195","SV1_Admin","updated homeowner Kyle Andrei Casingal","2023-04-10 09:45:32");
INSERT INTO audit_trail VALUES("1196","SV1_Admin","logged out","2023-04-10 09:47:34");
INSERT INTO audit_trail VALUES("1197","Mon Carlo Delima","logged in","2023-04-10 09:47:38");
INSERT INTO audit_trail VALUES("1198","Mon Carlo Delima","logged out","2023-04-10 09:47:44");
INSERT INTO audit_trail VALUES("1199","Mon Carlo Delima","logged in","2023-04-10 09:47:48");
INSERT INTO audit_trail VALUES("1200","Mon Carlo Delima","logged out","2023-04-10 09:51:37");
INSERT INTO audit_trail VALUES("1201","Mon Carlo Delima","logged in","2023-04-10 09:52:28");
INSERT INTO audit_trail VALUES("1202","Mon Carlo Delima","logged out","2023-04-10 10:01:57");
INSERT INTO audit_trail VALUES("1203","Mon Carlo Delima","logged in","2023-04-10 10:02:00");
INSERT INTO audit_trail VALUES("1204","Mon Carlo Delima","logged out","2023-04-10 10:02:02");
INSERT INTO audit_trail VALUES("1205","SV1_Treasurer","logged in","2023-04-10 10:02:04");
INSERT INTO audit_trail VALUES("1206","SV1_Treasurer","logged out","2023-04-10 10:03:24");
INSERT INTO audit_trail VALUES("1207","SV1_Guard","logged in","2023-04-10 10:03:27");
INSERT INTO audit_trail VALUES("1208","SV1_Guard","logged out","2023-04-10 10:03:30");
INSERT INTO audit_trail VALUES("1209","Mon Carlo Delima","logged in","2023-04-10 10:03:34");
INSERT INTO audit_trail VALUES("1210","Mon Carlo Delima","logged out","2023-04-10 10:23:46");
INSERT INTO audit_trail VALUES("1211","SV1_Admin","logged in","2023-04-10 10:23:49");
INSERT INTO audit_trail VALUES("1212","SV1_Admin","logged out","2023-04-10 10:27:35");
INSERT INTO audit_trail VALUES("1213","SV1_Admin","logged in","2023-04-10 10:27:38");
INSERT INTO audit_trail VALUES("1214","SV1_Admin","logged out","2023-04-10 10:29:21");
INSERT INTO audit_trail VALUES("1215","SV1_Secretary","logged in","2023-04-10 10:29:23");
INSERT INTO audit_trail VALUES("1216","SV1_Secretary","logged out","2023-04-10 10:29:58");
INSERT INTO audit_trail VALUES("1217","SV1_Treasurer","logged in","2023-04-10 10:30:02");
INSERT INTO audit_trail VALUES("1218","SV1_Treasurer","logged out","2023-04-10 10:44:21");
INSERT INTO audit_trail VALUES("1219","Mon Carlo Delima","logged in","2023-04-10 10:44:25");
INSERT INTO audit_trail VALUES("1220","Mon Carlo Delima","logged out","2023-04-10 11:01:51");
INSERT INTO audit_trail VALUES("1221","Mon Carlo Delima","logged in","2023-04-10 11:01:55");
INSERT INTO audit_trail VALUES("1222","Mon Carlo Delima","logged out","2023-04-10 11:10:52");
INSERT INTO audit_trail VALUES("1223","SV1_Treasurer","logged in","2023-04-10 11:10:55");
INSERT INTO audit_trail VALUES("1224","Mon Carlo Delima","logged in","2023-04-10 11:19:13");
INSERT INTO audit_trail VALUES("1225","SV1_Treasurer","logged out","2023-04-10 11:38:59");
INSERT INTO audit_trail VALUES("1226","Mon Carlo Delima","logged in","2023-04-10 11:39:02");
INSERT INTO audit_trail VALUES("1227","Mon Carlo Delima","logged out","2023-04-10 11:41:10");
INSERT INTO audit_trail VALUES("1228","Mon Carlo Delima","logged in","2023-04-10 11:41:13");
INSERT INTO audit_trail VALUES("1229","Mon Carlo Delima","logged out","2023-04-10 11:41:20");
INSERT INTO audit_trail VALUES("1230","SV1_Treasurer","logged in","2023-04-10 11:41:25");
INSERT INTO audit_trail VALUES("1231","SV1_Treasurer","logged out","2023-04-10 11:49:50");
INSERT INTO audit_trail VALUES("1232","Kyle Andrei Casingal","logged in","2023-04-10 11:49:54");
INSERT INTO audit_trail VALUES("1233","Kyle Andrei Casingal","logged out","2023-04-10 12:09:50");
INSERT INTO audit_trail VALUES("1234","SV1_Treasurer","logged in","2023-04-10 12:09:53");
INSERT INTO audit_trail VALUES("1235","SV1_Treasurer","logged out","2023-04-10 12:24:20");
INSERT INTO audit_trail VALUES("1236","Mon Carlo Delima","logged in","2023-04-10 12:25:25");
INSERT INTO audit_trail VALUES("1237","Mon Carlo Delima","logged out","2023-04-10 12:25:26");
INSERT INTO audit_trail VALUES("1238","Mon Carlo Delima","logged in","2023-04-10 12:25:35");
INSERT INTO audit_trail VALUES("1239","Mon Carlo Delima","logged in","2023-04-10 14:20:32");
INSERT INTO audit_trail VALUES("1240","Mon Carlo Delima","logged out","2023-04-10 14:21:33");
INSERT INTO audit_trail VALUES("1241","SV1_Treasurer","logged in","2023-04-10 14:21:38");
INSERT INTO audit_trail VALUES("1242","SV1_Treasurer","logged out","2023-04-10 14:26:28");
INSERT INTO audit_trail VALUES("1243","Mon Carlo Delima","logged in","2023-04-10 14:26:34");
INSERT INTO audit_trail VALUES("1244","Mon Carlo Delima","logged out","2023-04-10 14:27:41");
INSERT INTO audit_trail VALUES("1245","SV1_Admin","logged in","2023-04-10 14:27:44");
INSERT INTO audit_trail VALUES("1246","SV1_Admin","logged out","2023-04-10 14:32:16");
INSERT INTO audit_trail VALUES("1247","Mon Carlo Delima","logged in","2023-04-10 14:32:19");
INSERT INTO audit_trail VALUES("1248","Mon Carlo Delima","logged out","2023-04-10 15:18:00");
INSERT INTO audit_trail VALUES("1249","Mon Carlo Delima","logged in","2023-04-10 15:18:04");
INSERT INTO audit_trail VALUES("1250","Mon Carlo Delima","logged out","2023-04-10 15:39:22");
INSERT INTO audit_trail VALUES("1251","Mon Carlo Delima","logged in","2023-04-10 15:56:53");
INSERT INTO audit_trail VALUES("1252","Mon Carlo Delima","logged in","2023-04-11 21:39:46");
INSERT INTO audit_trail VALUES("1253","Mon Carlo Delima","logged out","2023-04-11 21:42:55");
INSERT INTO audit_trail VALUES("1254","SV1_Admin","logged in","2023-04-11 21:43:00");
INSERT INTO audit_trail VALUES("1255","SV1_Admin","uploaded a new post","2023-04-11 21:43:21");
INSERT INTO audit_trail VALUES("1256","SV1_Admin","uploaded a new post","2023-04-11 21:43:35");
INSERT INTO audit_trail VALUES("1257","SV1_Admin","uploaded a new post","2023-04-11 21:43:46");
INSERT INTO audit_trail VALUES("1258","SV1_Admin","uploaded a new post","2023-04-11 21:44:01");
INSERT INTO audit_trail VALUES("1259","SV1_Admin","logged out","2023-04-11 21:46:11");
INSERT INTO audit_trail VALUES("1260","Mon Carlo Delima","logged in","2023-04-11 21:46:14");
INSERT INTO audit_trail VALUES("1261","Mon Carlo Delima","logged out","2023-04-11 22:02:57");
INSERT INTO audit_trail VALUES("1262","SV1_Admin","logged in","2023-04-11 22:03:08");
INSERT INTO audit_trail VALUES("1263","SV1_Admin","logged out","2023-04-11 22:04:28");
INSERT INTO audit_trail VALUES("1264","Mon Carlo Delima","logged in","2023-04-11 22:04:32");
INSERT INTO audit_trail VALUES("1265","Mon Carlo Delima","logged out","2023-04-11 22:05:43");
INSERT INTO audit_trail VALUES("1266","SV1_Admin","logged in","2023-04-11 22:05:46");
INSERT INTO audit_trail VALUES("1267","SV1_Admin","logged out","2023-04-11 22:06:04");
INSERT INTO audit_trail VALUES("1268","Mon Carlo Delima","logged in","2023-04-11 22:06:07");
INSERT INTO audit_trail VALUES("1269","Mon Carlo Delima","logged out","2023-04-11 22:06:50");
INSERT INTO audit_trail VALUES("1270","SV1_Admin","logged in","2023-04-11 22:06:54");
INSERT INTO audit_trail VALUES("1271","SV1_Admin","logged out","2023-04-11 22:08:35");
INSERT INTO audit_trail VALUES("1272","Mon Carlo Delima","logged in","2023-04-11 22:08:38");
INSERT INTO audit_trail VALUES("1273","Mon Carlo Delima","logged out","2023-04-11 22:12:03");
INSERT INTO audit_trail VALUES("1274","SV1_Admin","logged in","2023-04-11 22:12:06");
INSERT INTO audit_trail VALUES("1275","SV1_Admin","logged out","2023-04-11 22:12:29");
INSERT INTO audit_trail VALUES("1276","Mon Carlo Delima","logged in","2023-04-11 22:12:32");
INSERT INTO audit_trail VALUES("1277","Mon Carlo Delima","logged out","2023-04-11 22:13:05");
INSERT INTO audit_trail VALUES("1278","SV1_Admin","logged in","2023-04-11 22:13:09");
INSERT INTO audit_trail VALUES("1279","SV1_Admin","logged out","2023-04-12 23:58:45");
INSERT INTO audit_trail VALUES("1280","Mon Carlo Delima","logged in","2023-04-12 23:58:59");
INSERT INTO audit_trail VALUES("1281","Mon Carlo Delima","logged out","2023-04-13 00:42:21");
INSERT INTO audit_trail VALUES("1282","SV1_Admin","logged in","2023-04-13 00:42:25");
INSERT INTO audit_trail VALUES("1283","SV1_Admin","logged out","2023-04-13 00:45:00");
INSERT INTO audit_trail VALUES("1284","Mon Carlo Delima","logged in","2023-04-13 00:45:05");
INSERT INTO audit_trail VALUES("1285","Mon Carlo Delima","logged out","2023-04-13 11:25:07");
INSERT INTO audit_trail VALUES("1286","John Doe","created an account","2023-04-14 13:43:48");
INSERT INTO audit_trail VALUES("1287","John Doe","logged in","2023-04-14 13:44:59");
INSERT INTO audit_trail VALUES("1288","John Doe","logged out","2023-04-14 13:45:45");
INSERT INTO audit_trail VALUES("1289","John Doe","logged in","2023-04-14 13:45:52");
INSERT INTO audit_trail VALUES("1290","","logged out","2023-04-14 13:46:22");
INSERT INTO audit_trail VALUES("1291","Monkey D. Luffy","created an account","2023-04-14 13:46:33");
INSERT INTO audit_trail VALUES("1292","Monkey D. Luffy","logged in","2023-04-14 13:50:22");
INSERT INTO audit_trail VALUES("1293","Monkey D. Luffy","logged in","2023-04-14 13:56:16");
INSERT INTO audit_trail VALUES("1294","Mon Carlo Delima","logged in","2023-04-14 14:00:02");
INSERT INTO audit_trail VALUES("1295","Mon Carlo Delima","logged out","2023-04-14 14:00:20");
INSERT INTO audit_trail VALUES("1296","Monkey D. Luffy","logged in","2023-04-14 14:00:44");
INSERT INTO audit_trail VALUES("1297","SV1_Admin","logged in","2023-04-14 14:09:26");
INSERT INTO audit_trail VALUES("1298","SV1_Admin","logged out","2023-04-14 14:09:34");
INSERT INTO audit_trail VALUES("1299","SV1_Admin","logged in","2023-04-14 14:09:37");
INSERT INTO audit_trail VALUES("1300","SV1_Admin","logged out","2023-04-14 14:09:39");
INSERT INTO audit_trail VALUES("1301","SV1_Admin","logged in","2023-04-14 14:09:41");
INSERT INTO audit_trail VALUES("1302","SV1_Admin","logged out","2023-04-14 14:09:57");
INSERT INTO audit_trail VALUES("1303","Monkey D. Luffy","logged in","2023-04-14 14:10:01");
INSERT INTO audit_trail VALUES("1304","Monkey D. Luffy","logged out","2023-04-14 14:15:54");
INSERT INTO audit_trail VALUES("1305","SV1_Admin","logged in","2023-04-14 14:15:57");
INSERT INTO audit_trail VALUES("1306","SV1_Admin","logged out","2023-04-14 14:16:01");
INSERT INTO audit_trail VALUES("1307","Monkey D. Luffy","logged in","2023-04-14 14:16:05");
INSERT INTO audit_trail VALUES("1308","Monkey D. Luffy","uploaded a new post","2023-04-14 14:18:10");
INSERT INTO audit_trail VALUES("1309","Monkey D. Luffy","uploaded a new post","2023-04-14 14:19:13");
INSERT INTO audit_trail VALUES("1310","Monkey D. Luffy","logged out","2023-04-14 14:19:16");
INSERT INTO audit_trail VALUES("1311","SV1_Admin","logged in","2023-04-14 14:19:21");
INSERT INTO audit_trail VALUES("1312","SV1_Admin","logged out","2023-04-14 14:19:23");
INSERT INTO audit_trail VALUES("1313","Mon Carlo Delima","logged in","2023-04-14 14:19:26");
INSERT INTO audit_trail VALUES("1314","Mon Carlo Delima","uploaded a new post","2023-04-14 14:19:37");
INSERT INTO audit_trail VALUES("1315","Mon Carlo Delima","logged out","2023-04-14 14:19:42");
INSERT INTO audit_trail VALUES("1316","Monkey D. Luffy","logged in","2023-04-14 14:19:45");
INSERT INTO audit_trail VALUES("1317","Monkey D. Luffy","uploaded a new post","2023-04-14 14:23:15");
INSERT INTO audit_trail VALUES("1318","Monkey D. Luffy","logged out","2023-04-14 15:25:01");
INSERT INTO audit_trail VALUES("1319","Monkey D. Luffy","logged in","2023-04-14 15:25:09");
INSERT INTO audit_trail VALUES("1320","Monkey D. Luffy","logged out","2023-04-14 15:26:16");
INSERT INTO audit_trail VALUES("1321","SV1_Admin","logged in","2023-04-14 15:26:18");
INSERT INTO audit_trail VALUES("1322","Mon Carlo Delima","logged in","2023-04-14 22:27:37");
INSERT INTO audit_trail VALUES("1323","Mon Carlo Delima","logged out","2023-04-14 22:29:32");
INSERT INTO audit_trail VALUES("1324","Monkey D. Luffy","created an account","2023-04-14 22:46:46");
INSERT INTO audit_trail VALUES("1325","Monkey D. Luffy","logged in","2023-04-14 22:47:03");
INSERT INTO audit_trail VALUES("1326","SV1_Admin","logged out","2023-05-01 13:45:25");
INSERT INTO audit_trail VALUES("1327","Mon Carlo Delima","logged in","2023-05-01 13:45:50");
INSERT INTO audit_trail VALUES("1328","Mon Carlo Delima","logged out","2023-05-01 13:46:33");
INSERT INTO audit_trail VALUES("1329","Mon Carlo Delima","logged in","2023-05-01 13:46:36");
INSERT INTO audit_trail VALUES("1330","Mon Carlo Delima","logged out","2023-05-01 13:46:38");
INSERT INTO audit_trail VALUES("1331","SV1_Admin","logged in","2023-05-01 13:46:56");
INSERT INTO audit_trail VALUES("1332","SV1_Admin","logged out","2023-05-01 13:51:13");
INSERT INTO audit_trail VALUES("1333","SV1_Admin","logged in","2023-05-01 13:52:56");
INSERT INTO audit_trail VALUES("1334","SV1_Admin","logged out","2023-05-01 13:56:55");
INSERT INTO audit_trail VALUES("1335","SV1_Admin","logged in","2023-05-01 13:57:20");
INSERT INTO audit_trail VALUES("1336","SV1_Admin","added a new subdivision officer Juan Tamad-President","2023-05-01 14:04:11");
INSERT INTO audit_trail VALUES("1337","SV1_Admin","added a new subdivision officer Rie Takahashi-Vice President","2023-05-01 14:05:42");
INSERT INTO audit_trail VALUES("1338","SV1_Admin","updated an existing subdivision officer Saddie Wheele-President","2023-05-01 14:24:34");
INSERT INTO audit_trail VALUES("1339","SV1_Admin","updated an existing subdivision officer Saddie Wheeler-President","2023-05-01 14:24:39");
INSERT INTO audit_trail VALUES("1340","SV1_Admin","updated an existing subdivision officer Juan Tama-President","2023-05-02 00:10:26");
INSERT INTO audit_trail VALUES("1341","SV1_Admin","updated an existing subdivision officer Juan Tamad-President","2023-05-02 00:11:01");
INSERT INTO audit_trail VALUES("1342","SV1_Admin","updated an existing subdivision officer Saddie Wheeler-President","2023-05-02 00:11:11");
INSERT INTO audit_trail VALUES("1343","SV1_Admin","updated an existing subdivision officer Saddie Wheeler-President","2023-05-02 00:11:27");
INSERT INTO audit_trail VALUES("1344","SV1_Admin","updated an existing subdivision officer Saddie Wheeler-President","2023-05-02 00:12:36");
INSERT INTO audit_trail VALUES("1345","SV1_Admin","updated an existing subdivision officer Rie Takahash-Vice President","2023-05-02 00:12:47");
INSERT INTO audit_trail VALUES("1346","SV1_Admin","updated an existing subdivision officer Rie Takahashi-Vice President","2023-05-02 00:12:56");
INSERT INTO audit_trail VALUES("1347","SV1_Admin","logged out","2023-05-02 00:14:49");
INSERT INTO audit_trail VALUES("1348","SV1_Admin","logged in","2023-05-02 03:08:34");
INSERT INTO audit_trail VALUES("1349","SV1_Admin","logged out","2023-05-02 03:08:56");
INSERT INTO audit_trail VALUES("1350","SV1_Admin","logged in","2023-05-02 03:16:23");
INSERT INTO audit_trail VALUES("1351","SV1_Admin","added a new subdivision officer Aya Price-Vice President","2023-05-02 03:16:39");
INSERT INTO audit_trail VALUES("1352","SV1_Admin","added a new subdivision officer Maxim Diaz-Secretary","2023-05-02 03:16:59");
INSERT INTO audit_trail VALUES("1353","SV1_Admin","added a new subdivision officer Zakir Hodges-Treasurer","2023-05-02 03:17:14");
INSERT INTO audit_trail VALUES("1354","SV1_Admin","added a new subdivision officer Gloria Sharp-Auditor","2023-05-02 03:17:22");
INSERT INTO audit_trail VALUES("1355","SV1_Admin","added a new subdivision officer Dulcie Matthams-PIO","2023-05-02 03:17:42");
INSERT INTO audit_trail VALUES("1356","SV1_Admin","logged out","2023-05-02 03:18:46");
INSERT INTO audit_trail VALUES("1357","SV1_Admin","logged in","2023-05-02 22:58:27");
INSERT INTO audit_trail VALUES("1358","SV1_Admin","logged out","2023-05-02 22:59:43");
INSERT INTO audit_trail VALUES("1359","SV1_Admin","logged in","2023-05-02 23:00:00");
INSERT INTO audit_trail VALUES("1360","SV1_Admin","logged out","2023-05-02 23:01:08");
INSERT INTO audit_trail VALUES("1361","SV1_Admin","logged in","2023-05-02 23:01:15");
INSERT INTO audit_trail VALUES("1362","SV1_Admin","logged out","2023-05-02 23:01:17");
INSERT INTO audit_trail VALUES("1363","SV1_Admin","logged in","2023-05-02 23:06:45");
INSERT INTO audit_trail VALUES("1364","SV1_Admin","logged out","2023-05-02 23:06:56");
INSERT INTO audit_trail VALUES("1365","SV1_Admin","logged in","2023-05-02 23:08:50");
INSERT INTO audit_trail VALUES("1366","SV1_Admin","logged out","2023-05-02 23:09:01");
INSERT INTO audit_trail VALUES("1367","SV1_Admin","logged in","2023-05-02 23:14:26");
INSERT INTO audit_trail VALUES("1368","SV1_Admin","logged out","2023-05-02 23:14:42");
INSERT INTO audit_trail VALUES("1369","Mon Carlo Delima","logged in","2023-05-02 23:32:09");
INSERT INTO audit_trail VALUES("1370","Mon Carlo Delima","logged out","2023-05-02 23:36:03");
INSERT INTO audit_trail VALUES("1371","Mon Carlo Delima","logged in","2023-05-03 00:03:13");
INSERT INTO audit_trail VALUES("1372","Mon Carlo Delima","logged out","2023-05-03 00:03:35");
INSERT INTO audit_trail VALUES("1373","SV1_Admin","logged in","2023-05-03 00:03:38");
INSERT INTO audit_trail VALUES("1374","SV1_Admin","logged in","2023-05-03 20:47:17");
INSERT INTO audit_trail VALUES("1375","SV1_Admin","logged out","2023-05-03 20:47:51");
INSERT INTO audit_trail VALUES("1376","Mon Carlo Delima","logged in","2023-05-03 20:47:54");
INSERT INTO audit_trail VALUES("1377","Mon Carlo Delima","logged out","2023-05-03 20:48:59");
INSERT INTO audit_trail VALUES("1378","SV1_Admin","logged in","2023-05-03 20:49:02");
INSERT INTO audit_trail VALUES("1379","SV1_Admin","logged out","2023-05-03 21:11:13");
INSERT INTO audit_trail VALUES("1380","Mon Carlo Delima","logged in","2023-05-03 21:11:16");
INSERT INTO audit_trail VALUES("1381","Mon Carlo Delima","logged out","2023-05-03 21:11:40");
INSERT INTO audit_trail VALUES("1382","Mon Carlo Delima","logged in","2023-05-03 21:11:43");
INSERT INTO audit_trail VALUES("1383","Mon Carlo Delima","logged out","2023-05-03 21:11:51");
INSERT INTO audit_trail VALUES("1384","SV1_Admin","logged in","2023-05-03 21:11:54");
INSERT INTO audit_trail VALUES("1385","SV1_Admin","logged out","2023-05-03 22:18:31");
INSERT INTO audit_trail VALUES("1386","SV1_Admin","logged in","2023-05-03 22:22:44");
INSERT INTO audit_trail VALUES("1387","SV1_Admin","logged out","2023-05-03 22:27:31");
INSERT INTO audit_trail VALUES("1388","SV1_Admin","logged in","2023-05-03 22:27:33");
INSERT INTO audit_trail VALUES("1389","SV1_Admin","logged out","2023-05-03 22:27:35");
INSERT INTO audit_trail VALUES("1390","SV1_Treasurer","logged in","2023-05-03 22:27:37");
INSERT INTO audit_trail VALUES("1391","SV1_Treasurer","logged out","2023-05-03 22:27:43");
INSERT INTO audit_trail VALUES("1392","SV1_Admin","logged in","2023-05-03 22:39:02");
INSERT INTO audit_trail VALUES("1393","SV1_Admin","logged out","2023-05-03 22:48:13");
INSERT INTO audit_trail VALUES("1394","SV1_Admin","logged in","2023-05-03 22:48:44");
INSERT INTO audit_trail VALUES("1395","SV1_Admin","logged out","2023-05-03 22:50:04");
INSERT INTO audit_trail VALUES("1396","SV1_Admin","logged in","2023-05-03 23:20:06");
INSERT INTO audit_trail VALUES("1397","SV1_Admin","logged out","2023-05-03 23:20:28");
INSERT INTO audit_trail VALUES("1398","SV1_Secretary","logged in","2023-05-03 23:20:31");



DROP TABLE bill_consumer;

CREATE TABLE `bill_consumer` (
  `billConsumer_id` int(11) NOT NULL AUTO_INCREMENT,
  `billingPeriod_id` int(11) NOT NULL,
  `homeowner_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `fullname` varchar(250) NOT NULL,
  `amount` varchar(45) NOT NULL,
  `datetime_paid` datetime DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`billConsumer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

INSERT INTO bill_consumer VALUES("1","1","1","4","Mon Carlo Delima","200","","PAID");
INSERT INTO bill_consumer VALUES("2","2","1","4","Mon Carlo Delima","200","","PAID");
INSERT INTO bill_consumer VALUES("3","3","1","4","Mon Carlo Delima","200","","PAID");
INSERT INTO bill_consumer VALUES("4","1","2","","Kyle Andrei Casingal","500","2023-04-10 11:45:59","PAID");
INSERT INTO bill_consumer VALUES("5","2","2","","Kyle Andrei Casingal","500","2023-04-10 11:45:59","PAID");
INSERT INTO bill_consumer VALUES("6","3","2","","Kyle Andrei Casingal","500","2023-04-10 11:45:59","PAID");
INSERT INTO bill_consumer VALUES("7","4","2","5","Kyle Andrei Casingal","500","2023-04-10 12:08:59","PAID");
INSERT INTO bill_consumer VALUES("8","5","2","5","Kyle Andrei Casingal","500","2023-04-10 12:08:59","PAID");
INSERT INTO bill_consumer VALUES("9","6","2","5","Kyle Andrei Casingal","500","2023-04-10 12:08:59","PAID");
INSERT INTO bill_consumer VALUES("10","7","2","6","Kyle Andrei Casingal","500","2023-04-10 12:09:13","PAID");
INSERT INTO bill_consumer VALUES("11","8","2","6","Kyle Andrei Casingal","500","2023-04-10 12:09:13","PAID");
INSERT INTO bill_consumer VALUES("12","9","2","6","Kyle Andrei Casingal","500","2023-04-10 12:09:13","PAID");
INSERT INTO bill_consumer VALUES("13","1","16","9","Janwel Castillo","200","2023-04-10 12:10:51","PAID");
INSERT INTO bill_consumer VALUES("14","2","16","9","Janwel Castillo","200","2023-04-10 12:10:51","PAID");
INSERT INTO bill_consumer VALUES("15","3","16","9","Janwel Castillo","200","2023-04-10 12:10:51","PAID");
INSERT INTO bill_consumer VALUES("16","4","16","9","Janwel Castillo","200","2023-04-10 12:10:51","PAID");
INSERT INTO bill_consumer VALUES("17","5","16","10","Janwel Castillo","200","2023-04-10 12:12:03","PAID");
INSERT INTO bill_consumer VALUES("18","6","16","10","Janwel Castillo","200","2023-04-10 12:12:03","PAID");
INSERT INTO bill_consumer VALUES("19","7","16","10","Janwel Castillo","200","2023-04-10 12:12:03","PAID");
INSERT INTO bill_consumer VALUES("20","8","16","10","Janwel Castillo","200","2023-04-10 12:12:03","PAID");
INSERT INTO bill_consumer VALUES("21","9","16","10","Janwel Castillo","200","2023-04-10 12:12:03","PAID");
INSERT INTO bill_consumer VALUES("37","1","17","","Roiemar Escueta","200","","UNPAID");
INSERT INTO bill_consumer VALUES("38","1","30","","John Doe","200","","UNPAID");
INSERT INTO bill_consumer VALUES("39","1","31","","Amirah Lowery","200","","UNPAID");
INSERT INTO bill_consumer VALUES("40","1","32","","Kian Miller","200","","UNPAID");
INSERT INTO bill_consumer VALUES("41","1","33","","Leona Shepherd","200","","UNPAID");
INSERT INTO bill_consumer VALUES("42","1","34","","Sophie Warner","200","","UNPAID");
INSERT INTO bill_consumer VALUES("43","1","35","","Tristram Hudson","200","","UNPAID");
INSERT INTO bill_consumer VALUES("44","1","39","","Marco Ivan Sta. Maria","200","","UNPAID");
INSERT INTO bill_consumer VALUES("45","2","17","","Roiemar Escueta","200","","UNPAID");
INSERT INTO bill_consumer VALUES("46","2","30","","John Doe","200","","UNPAID");
INSERT INTO bill_consumer VALUES("47","2","31","","Amirah Lowery","200","","UNPAID");
INSERT INTO bill_consumer VALUES("48","2","32","","Kian Miller","200","","UNPAID");
INSERT INTO bill_consumer VALUES("49","2","33","","Leona Shepherd","200","","UNPAID");
INSERT INTO bill_consumer VALUES("50","2","34","","Sophie Warner","200","","UNPAID");
INSERT INTO bill_consumer VALUES("51","2","35","","Tristram Hudson","200","","UNPAID");
INSERT INTO bill_consumer VALUES("52","2","39","","Marco Ivan Sta. Maria","200","","UNPAID");
INSERT INTO bill_consumer VALUES("53","3","17","","Roiemar Escueta","200","","UNPAID");
INSERT INTO bill_consumer VALUES("54","3","30","","John Doe","200","","UNPAID");
INSERT INTO bill_consumer VALUES("55","3","31","","Amirah Lowery","200","","UNPAID");
INSERT INTO bill_consumer VALUES("56","3","32","","Kian Miller","200","","UNPAID");
INSERT INTO bill_consumer VALUES("57","3","33","","Leona Shepherd","200","","UNPAID");
INSERT INTO bill_consumer VALUES("58","3","34","","Sophie Warner","200","","UNPAID");
INSERT INTO bill_consumer VALUES("59","3","35","","Tristram Hudson","200","","UNPAID");
INSERT INTO bill_consumer VALUES("60","3","39","","Marco Ivan Sta. Maria","200","","UNPAID");
INSERT INTO bill_consumer VALUES("61","4","1","","Mon Carlo Delima","200","","UNPAID");
INSERT INTO bill_consumer VALUES("62","4","17","","Roiemar Escueta","200","","UNPAID");
INSERT INTO bill_consumer VALUES("63","4","30","","John Doe","200","","UNPAID");
INSERT INTO bill_consumer VALUES("64","4","31","","Amirah Lowery","200","","UNPAID");
INSERT INTO bill_consumer VALUES("65","4","32","","Kian Miller","200","","UNPAID");
INSERT INTO bill_consumer VALUES("66","4","33","","Leona Shepherd","200","","UNPAID");
INSERT INTO bill_consumer VALUES("67","4","34","","Sophie Warner","200","","UNPAID");
INSERT INTO bill_consumer VALUES("68","4","35","","Tristram Hudson","200","","UNPAID");
INSERT INTO bill_consumer VALUES("69","4","39","","Marco Ivan Sta. Maria","200","","UNPAID");
INSERT INTO bill_consumer VALUES("70","5","1","","Mon Carlo Delima","200","","UNPAID");
INSERT INTO bill_consumer VALUES("71","5","17","","Roiemar Escueta","200","","UNPAID");
INSERT INTO bill_consumer VALUES("72","5","30","","John Doe","200","","UNPAID");
INSERT INTO bill_consumer VALUES("73","5","31","","Amirah Lowery","200","","UNPAID");
INSERT INTO bill_consumer VALUES("74","5","32","","Kian Miller","200","","UNPAID");
INSERT INTO bill_consumer VALUES("75","5","33","","Leona Shepherd","200","","UNPAID");
INSERT INTO bill_consumer VALUES("76","5","34","","Sophie Warner","200","","UNPAID");
INSERT INTO bill_consumer VALUES("77","5","35","","Tristram Hudson","200","","UNPAID");
INSERT INTO bill_consumer VALUES("78","5","39","","Marco Ivan Sta. Maria","200","","UNPAID");
INSERT INTO bill_consumer VALUES("79","6","1","","Mon Carlo Delima","200","","UNPAID");
INSERT INTO bill_consumer VALUES("80","6","17","","Roiemar Escueta","200","","UNPAID");
INSERT INTO bill_consumer VALUES("81","6","30","","John Doe","200","","UNPAID");
INSERT INTO bill_consumer VALUES("82","6","31","","Amirah Lowery","200","","UNPAID");
INSERT INTO bill_consumer VALUES("83","6","32","","Kian Miller","200","","UNPAID");
INSERT INTO bill_consumer VALUES("84","6","33","","Leona Shepherd","200","","UNPAID");
INSERT INTO bill_consumer VALUES("85","6","34","","Sophie Warner","200","","UNPAID");
INSERT INTO bill_consumer VALUES("86","6","35","","Tristram Hudson","200","","UNPAID");
INSERT INTO bill_consumer VALUES("87","6","39","","Marco Ivan Sta. Maria","200","","UNPAID");
INSERT INTO bill_consumer VALUES("88","7","1","","Mon Carlo Delima","200","","UNPAID");
INSERT INTO bill_consumer VALUES("89","7","17","","Roiemar Escueta","200","","UNPAID");
INSERT INTO bill_consumer VALUES("90","7","30","","John Doe","200","","UNPAID");
INSERT INTO bill_consumer VALUES("91","7","31","","Amirah Lowery","200","","UNPAID");
INSERT INTO bill_consumer VALUES("92","7","32","","Kian Miller","200","","UNPAID");
INSERT INTO bill_consumer VALUES("93","7","33","","Leona Shepherd","200","","UNPAID");
INSERT INTO bill_consumer VALUES("94","7","34","","Sophie Warner","200","","UNPAID");
INSERT INTO bill_consumer VALUES("95","7","35","","Tristram Hudson","200","","UNPAID");
INSERT INTO bill_consumer VALUES("96","7","39","","Marco Ivan Sta. Maria","200","","UNPAID");
INSERT INTO bill_consumer VALUES("97","8","1","","Mon Carlo Delima","200","","UNPAID");
INSERT INTO bill_consumer VALUES("98","8","17","","Roiemar Escueta","200","","UNPAID");
INSERT INTO bill_consumer VALUES("99","8","30","","John Doe","200","","UNPAID");
INSERT INTO bill_consumer VALUES("100","8","31","","Amirah Lowery","200","","UNPAID");
INSERT INTO bill_consumer VALUES("101","8","32","","Kian Miller","200","","UNPAID");
INSERT INTO bill_consumer VALUES("102","8","33","","Leona Shepherd","200","","UNPAID");
INSERT INTO bill_consumer VALUES("103","8","34","","Sophie Warner","200","","UNPAID");
INSERT INTO bill_consumer VALUES("104","8","35","","Tristram Hudson","200","","UNPAID");
INSERT INTO bill_consumer VALUES("105","8","39","","Marco Ivan Sta. Maria","200","","UNPAID");
INSERT INTO bill_consumer VALUES("106","9","1","","Mon Carlo Delima","200","","UNPAID");
INSERT INTO bill_consumer VALUES("107","9","17","","Roiemar Escueta","200","","UNPAID");
INSERT INTO bill_consumer VALUES("108","9","30","","John Doe","200","","UNPAID");
INSERT INTO bill_consumer VALUES("109","9","31","","Amirah Lowery","200","","UNPAID");
INSERT INTO bill_consumer VALUES("110","9","32","","Kian Miller","200","","UNPAID");
INSERT INTO bill_consumer VALUES("111","9","33","","Leona Shepherd","200","","UNPAID");
INSERT INTO bill_consumer VALUES("112","9","34","","Sophie Warner","200","","UNPAID");
INSERT INTO bill_consumer VALUES("113","9","35","","Tristram Hudson","200","","UNPAID");
INSERT INTO bill_consumer VALUES("114","9","39","","Marco Ivan Sta. Maria","200","","UNPAID");
INSERT INTO bill_consumer VALUES("115","10","1","","Mon Carlo Delima","200","","UNPAID");
INSERT INTO bill_consumer VALUES("116","10","17","","Roiemar Escueta","200","","UNPAID");
INSERT INTO bill_consumer VALUES("117","10","16","","Janwel Castillo","200","","UNPAID");
INSERT INTO bill_consumer VALUES("118","10","30","","John Doe","200","","UNPAID");
INSERT INTO bill_consumer VALUES("119","10","31","","Amirah Lowery","200","","UNPAID");
INSERT INTO bill_consumer VALUES("120","10","32","","Kian Miller","200","","UNPAID");
INSERT INTO bill_consumer VALUES("121","10","33","","Leona Shepherd","200","","UNPAID");
INSERT INTO bill_consumer VALUES("122","10","34","","Sophie Warner","200","","UNPAID");
INSERT INTO bill_consumer VALUES("123","10","35","","Tristram Hudson","200","","UNPAID");
INSERT INTO bill_consumer VALUES("124","10","39","","Marco Ivan Sta. Maria","200","","UNPAID");
INSERT INTO bill_consumer VALUES("125","11","1","","Mon Carlo Delima","200","","UNPAID");
INSERT INTO bill_consumer VALUES("126","11","17","","Roiemar Escueta","200","","UNPAID");
INSERT INTO bill_consumer VALUES("127","11","16","","Janwel Castillo","200","","UNPAID");
INSERT INTO bill_consumer VALUES("128","11","30","","John Doe","200","","UNPAID");
INSERT INTO bill_consumer VALUES("129","11","31","","Amirah Lowery","200","","UNPAID");
INSERT INTO bill_consumer VALUES("130","11","32","","Kian Miller","200","","UNPAID");
INSERT INTO bill_consumer VALUES("131","11","33","","Leona Shepherd","200","","UNPAID");
INSERT INTO bill_consumer VALUES("132","11","34","","Sophie Warner","200","","UNPAID");
INSERT INTO bill_consumer VALUES("133","11","35","","Tristram Hudson","200","","UNPAID");
INSERT INTO bill_consumer VALUES("134","11","39","","Marco Ivan Sta. Maria","200","","UNPAID");
INSERT INTO bill_consumer VALUES("135","12","1","","Mon Carlo Delima","200","","UNPAID");
INSERT INTO bill_consumer VALUES("136","12","17","","Roiemar Escueta","200","","UNPAID");
INSERT INTO bill_consumer VALUES("137","12","16","","Janwel Castillo","200","","UNPAID");
INSERT INTO bill_consumer VALUES("138","12","30","","John Doe","200","","UNPAID");
INSERT INTO bill_consumer VALUES("139","12","31","","Amirah Lowery","200","","UNPAID");
INSERT INTO bill_consumer VALUES("140","12","32","","Kian Miller","200","","UNPAID");
INSERT INTO bill_consumer VALUES("141","12","33","","Leona Shepherd","200","","UNPAID");
INSERT INTO bill_consumer VALUES("142","12","34","","Sophie Warner","200","","UNPAID");
INSERT INTO bill_consumer VALUES("143","12","35","","Tristram Hudson","200","","UNPAID");
INSERT INTO bill_consumer VALUES("144","12","39","","Marco Ivan Sta. Maria","200","","UNPAID");



DROP TABLE billing_period;

CREATE TABLE `billing_period` (
  `billingPeriod_id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(45) NOT NULL,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`billingPeriod_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

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
INSERT INTO billing_period VALUES("25","January","2024");
INSERT INTO billing_period VALUES("26","February","2024");
INSERT INTO billing_period VALUES("27","March","2024");
INSERT INTO billing_period VALUES("28","April","2024");
INSERT INTO billing_period VALUES("29","May","2024");
INSERT INTO billing_period VALUES("30","June","2024");
INSERT INTO billing_period VALUES("31","July","2024");
INSERT INTO billing_period VALUES("32","August","2024");
INSERT INTO billing_period VALUES("33","September","2024");
INSERT INTO billing_period VALUES("34","October","2024");
INSERT INTO billing_period VALUES("35","November","2024");
INSERT INTO billing_period VALUES("36","December","2024");
INSERT INTO billing_period VALUES("37","January","2024");
INSERT INTO billing_period VALUES("38","February","2024");
INSERT INTO billing_period VALUES("39","March","2024");
INSERT INTO billing_period VALUES("40","April","2024");
INSERT INTO billing_period VALUES("41","May","2024");
INSERT INTO billing_period VALUES("42","June","2024");
INSERT INTO billing_period VALUES("43","July","2024");
INSERT INTO billing_period VALUES("44","August","2024");
INSERT INTO billing_period VALUES("45","September","2024");
INSERT INTO billing_period VALUES("46","October","2024");
INSERT INTO billing_period VALUES("47","November","2024");
INSERT INTO billing_period VALUES("48","December","2024");
INSERT INTO billing_period VALUES("49","January","2024");
INSERT INTO billing_period VALUES("50","February","2024");
INSERT INTO billing_period VALUES("51","March","2024");
INSERT INTO billing_period VALUES("52","April","2024");
INSERT INTO billing_period VALUES("53","May","2024");
INSERT INTO billing_period VALUES("54","June","2024");
INSERT INTO billing_period VALUES("55","July","2024");
INSERT INTO billing_period VALUES("56","August","2024");
INSERT INTO billing_period VALUES("57","September","2024");
INSERT INTO billing_period VALUES("58","October","2024");
INSERT INTO billing_period VALUES("59","November","2024");
INSERT INTO billing_period VALUES("60","December","2024");
INSERT INTO billing_period VALUES("61","January","2024");
INSERT INTO billing_period VALUES("62","February","2024");
INSERT INTO billing_period VALUES("63","March","2024");
INSERT INTO billing_period VALUES("64","April","2024");
INSERT INTO billing_period VALUES("65","May","2024");
INSERT INTO billing_period VALUES("66","June","2024");
INSERT INTO billing_period VALUES("67","July","2024");
INSERT INTO billing_period VALUES("68","August","2024");
INSERT INTO billing_period VALUES("69","September","2024");
INSERT INTO billing_period VALUES("70","October","2024");
INSERT INTO billing_period VALUES("71","November","2024");
INSERT INTO billing_period VALUES("72","December","2024");



DROP TABLE block;

CREATE TABLE `block` (
  `block_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_id` int(11) NOT NULL,
  `block` varchar(10) NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

INSERT INTO block VALUES("1","1","1");
INSERT INTO block VALUES("2","1","2");
INSERT INTO block VALUES("3","3","3");
INSERT INTO block VALUES("4","1","3");
INSERT INTO block VALUES("5","3","1");
INSERT INTO block VALUES("6","2","3");
INSERT INTO block VALUES("8","4","1");
INSERT INTO block VALUES("9","2","1");
INSERT INTO block VALUES("10","1","4");
INSERT INTO block VALUES("11","1","5");
INSERT INTO block VALUES("12","1","6");
INSERT INTO block VALUES("13","1","7");
INSERT INTO block VALUES("14","1","8");
INSERT INTO block VALUES("15","1","9");
INSERT INTO block VALUES("16","1","10");
INSERT INTO block VALUES("17","2","2");
INSERT INTO block VALUES("18","2","4");
INSERT INTO block VALUES("19","2","5");
INSERT INTO block VALUES("20","2","6");
INSERT INTO block VALUES("21","2","7");
INSERT INTO block VALUES("22","2","8");
INSERT INTO block VALUES("23","2","9");
INSERT INTO block VALUES("24","2","10");
INSERT INTO block VALUES("25","3","2");
INSERT INTO block VALUES("26","3","4");
INSERT INTO block VALUES("27","3","5");
INSERT INTO block VALUES("28","3","6");
INSERT INTO block VALUES("29","3","7");
INSERT INTO block VALUES("30","3","8");
INSERT INTO block VALUES("31","3","9");
INSERT INTO block VALUES("32","3","10");
INSERT INTO block VALUES("33","4","2");
INSERT INTO block VALUES("34","4","3");
INSERT INTO block VALUES("35","4","4");
INSERT INTO block VALUES("36","4","5");
INSERT INTO block VALUES("37","4","6");
INSERT INTO block VALUES("38","4","7");
INSERT INTO block VALUES("39","4","8");
INSERT INTO block VALUES("40","4","9");
INSERT INTO block VALUES("41","4","10");



DROP TABLE concern;

CREATE TABLE `concern` (
  `concern_id` int(11) NOT NULL AUTO_INCREMENT,
  `complainant_homeowner_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `complainee_homeowner_id` int(11) DEFAULT NULL,
  `complainee_full_name` varchar(100) DEFAULT NULL,
  `concern_subject` varchar(100) NOT NULL,
  `concern_description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `datetime_submitted` datetime DEFAULT NULL,
  PRIMARY KEY (`concern_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO concern VALUES("1","1","Mon Carlo Delima","","","Road concern","Unfixed potholes near court.","Processing","2023-04-07 15:07:44","2023-04-06 23:33:30");
INSERT INTO concern VALUES("2","16","Janwel Castillo","1","Mon Carlo Delima","Ipapa tulfo kita","wahahahaha","Processing","2023-04-07 15:07:47","2023-04-06 23:44:02");
INSERT INTO concern VALUES("3","1","Mon Carlo Delima","16","Janwel Castillo","Noise Complaint","Neighbor playing guitar loudly past midnight.","Resolved","2023-04-08 12:10:44","2023-04-06 23:59:18");
INSERT INTO concern VALUES("4","2","Kyle Andrei Casingal","4","John Doe","John Doe is doing it","Akala ko ikaw ay akin.","Processing","2023-04-08 18:02:58","2023-04-08 12:30:20");



DROP TABLE contact;

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




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
  `mobile_number` varchar(20) DEFAULT NULL,
  `employer` varchar(100) DEFAULT NULL,
  `vehicle_registration` varchar(20) DEFAULT NULL,
  `display_picture` varchar(255) NOT NULL,
  PRIMARY KEY (`homeowner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

INSERT INTO homeowner_profile VALUES("1","Delima","Mon Carlo","Zonio","N/A","Male","Lot 2 Block 2","Sunnyvale 1","Pantok","N/A","N/A","dmoncarlo6@gmail.com","2002-10-06","09157189636","N/A","LTO 5678","DELIMA_2x2.png");
INSERT INTO homeowner_profile VALUES("2","Casingal","Kyle Andrei","Morillo","N/A","Male","Lot 1 Block 1","Sunnyvale 3","Palangoy","N/A","N/A","kylecasingal36@gmail.com","2001-09-02","09123456789","N/A","N/A","316495100_870517180796101_3304939871151226288_n.jpg");
INSERT INTO homeowner_profile VALUES("3","Flores","Jeune Paolus","Damaso","N/A","Male","Lot 1 Block 3","Sunnyvale 2","Pantok","N/A","N/A","floresjeunepaolus@gmail.com","2002-06-16","09123123123","Inya","N/A","316156823_3360766927514073_2770550987709432568_n.jpg");
INSERT INTO homeowner_profile VALUES("51","","SV1_Guard","","","","","","","","","","","","","","default.png");
INSERT INTO homeowner_profile VALUES("8","Bendaña","Krishtalene","Edejer","N/A","Female","Lot 1 Block 5","Sunnyvale 2","Pantok","N/A","N/A","tissabendana@gmail.com","2002-10-19","09123456789","N/A","N/A","86705321_2748280675293170_833038108541845504_n.jpg");
INSERT INTO homeowner_profile VALUES("17","Escueta","Roiemar","Conchada","N/A","Male","Lot 4 Block 3","Sunnyvale 1","Palangoy","N/A","N/A","escuetaroiemar@gmail.com","2022-11-28","09123456789","N/A","N/A","default.png");
INSERT INTO homeowner_profile VALUES("16","Castillo","Janwel","","N/A","Male","Lot 2 Block 3 ","Sunnyvale 1","Palangoy","N/A","N/A","janweljigycastillo20@gmail.com","2022-11-25","09123456789","N/A","N/A","315887907_1137649846869408_655406644278059076_n.png");
INSERT INTO homeowner_profile VALUES("30","Doe","John","Smith","N/A","Male","Lot 1 Block 8","Sunnyvale 1","Palangoy","N/A","N/A","johndoe@gmail.com","2010-01-01","09123456789","N/A","N/A","default.png");
INSERT INTO homeowner_profile VALUES("28","","SV1_Secretary","","","","","","","","","","2022-11-29","","","","default.png");
INSERT INTO homeowner_profile VALUES("31","Lowery","Amirah","Meyers","N/A","Female","Lot 1 Block 7","Sunnyvale 1","Palangoy","N/A","N/A","amirahlowery@gmail.com","2009-01-15","09123456789","N/A","N/A","default.png");
INSERT INTO homeowner_profile VALUES("32","Miller","Kian","Smith","N/A","Female","Lot 2 Block 10","Sunnyvale 1","Palangoy","N/A","N/A","Kian Miller","1997-07-16","09123456789","N/A","N/A","default.png");
INSERT INTO homeowner_profile VALUES("33","Shepherd","Leona","Villegas","N/A","Female","Lot 2 Block 4","Sunnyvale 1","Palangoy","N/A","N/A","leonashepherd@gmail.com","2000-02-29","09123456789","N/A","N/A","default.png");
INSERT INTO homeowner_profile VALUES("34","Warner","Sophie","Manning","N/A","Female","Lot 3 Block 7","Sunnyvale 1","Palangoy","N/A","N/A","sophiewarner@gmail.com","1998-06-03","09123456789","N/A","N/A","default.png");
INSERT INTO homeowner_profile VALUES("35","Hudson","Tristram","Ray","N/A","Male","Lot 4 Block 1","Sunnyvale 1","Palangoy","N/A","N/A","tristramhudson","1982-07-29","09123456789","N/A","N/A","default.png");
INSERT INTO homeowner_profile VALUES("36","","SV1_Treasurer","","","","","","","","","","","","","","default.png");
INSERT INTO homeowner_profile VALUES("37","","SV2_Admin","","","","","","","","","","","","","","default.png");
INSERT INTO homeowner_profile VALUES("39","Sta. Maria","Marco Ivan","Quierrez","N/A","Male","Lot 4 Block 3","Sunnyvale 1","Palangoy","N/A","N/A","marcoivanstamaria@gmail.com","2001-06-13","09123456789","N/A","N/A","290509682_1413885909103188_6599438684369654480_n.jpg");
INSERT INTO homeowner_profile VALUES("40","Dalisay","Cardo","Dela Cruz","N/A","Male","Block 3 Lot 5","Sunnyvale 2","Palangoy","Palangoy","N/A","cardoDalisay@gmail.com","1977-11-07","09123456789","N/A","N/A","default.png");
INSERT INTO homeowner_profile VALUES("44","test","test","pogi","N/A","Male","Lot 1 Block 1","Sunnyvale 4","Pantok","N/A","N/A","test@gmail.com","2023-04-09","09987654321","N/A","LTO 1234","default.png");
INSERT INTO homeowner_profile VALUES("18","","SV1_Admin","","","","","","","","","","","","","","default.png");
INSERT INTO homeowner_profile VALUES("50","","SV3_Admin","","","","","","","","","","","","","","default.png");



DROP TABLE lot;

CREATE TABLE `lot` (
  `lot_id` int(11) NOT NULL AUTO_INCREMENT,
  `block_id` int(11) NOT NULL,
  `lot` varchar(10) NOT NULL,
  PRIMARY KEY (`lot_id`)
) ENGINE=MyISAM AUTO_INCREMENT=405 DEFAULT CHARSET=utf8;

INSERT INTO lot VALUES("1","1","2");
INSERT INTO lot VALUES("4","2","2");
INSERT INTO lot VALUES("5","5","1");
INSERT INTO lot VALUES("6","1","1");
INSERT INTO lot VALUES("7","1","3");
INSERT INTO lot VALUES("8","1","4");
INSERT INTO lot VALUES("9","1","5");
INSERT INTO lot VALUES("10","1","6");
INSERT INTO lot VALUES("11","1","7");
INSERT INTO lot VALUES("12","1","8");
INSERT INTO lot VALUES("13","1","9");
INSERT INTO lot VALUES("14","1","10");
INSERT INTO lot VALUES("15","2","1");
INSERT INTO lot VALUES("16","2","3");
INSERT INTO lot VALUES("17","2","4");
INSERT INTO lot VALUES("18","2","5");
INSERT INTO lot VALUES("19","2","6");
INSERT INTO lot VALUES("20","2","7");
INSERT INTO lot VALUES("21","2","8");
INSERT INTO lot VALUES("22","2","9");
INSERT INTO lot VALUES("23","2","10");
INSERT INTO lot VALUES("24","4","1");
INSERT INTO lot VALUES("25","4","2");
INSERT INTO lot VALUES("404","11","5");
INSERT INTO lot VALUES("27","4","4");
INSERT INTO lot VALUES("28","4","5");
INSERT INTO lot VALUES("29","4","6");
INSERT INTO lot VALUES("30","4","7");
INSERT INTO lot VALUES("31","4","8");
INSERT INTO lot VALUES("32","4","9");
INSERT INTO lot VALUES("33","4","10");
INSERT INTO lot VALUES("34","10","1");
INSERT INTO lot VALUES("35","10","2");
INSERT INTO lot VALUES("36","4","3");
INSERT INTO lot VALUES("37","10","3");
INSERT INTO lot VALUES("39","10","5");
INSERT INTO lot VALUES("40","10","6");
INSERT INTO lot VALUES("41","10","7");
INSERT INTO lot VALUES("42","10","8");
INSERT INTO lot VALUES("43","10","9");
INSERT INTO lot VALUES("44","10","10");
INSERT INTO lot VALUES("45","11","1");
INSERT INTO lot VALUES("46","11","2");
INSERT INTO lot VALUES("47","11","3");
INSERT INTO lot VALUES("48","10","4");
INSERT INTO lot VALUES("49","11","6");
INSERT INTO lot VALUES("50","11","7");
INSERT INTO lot VALUES("51","11","8");
INSERT INTO lot VALUES("52","11","9");
INSERT INTO lot VALUES("53","11","10");
INSERT INTO lot VALUES("54","12","1");
INSERT INTO lot VALUES("55","12","2");
INSERT INTO lot VALUES("56","12","3");
INSERT INTO lot VALUES("57","12","4");
INSERT INTO lot VALUES("58","12","5");
INSERT INTO lot VALUES("59","12","6");
INSERT INTO lot VALUES("60","12","7");
INSERT INTO lot VALUES("61","12","8");
INSERT INTO lot VALUES("62","11","4");
INSERT INTO lot VALUES("63","12","10");
INSERT INTO lot VALUES("64","12","9");
INSERT INTO lot VALUES("65","13","1");
INSERT INTO lot VALUES("66","13","2");
INSERT INTO lot VALUES("67","13","3");
INSERT INTO lot VALUES("68","13","4");
INSERT INTO lot VALUES("69","13","5");
INSERT INTO lot VALUES("70","13","6");
INSERT INTO lot VALUES("71","13","7");
INSERT INTO lot VALUES("72","13","8");
INSERT INTO lot VALUES("73","13","9");
INSERT INTO lot VALUES("74","13","10");
INSERT INTO lot VALUES("75","14","1");
INSERT INTO lot VALUES("76","14","2");
INSERT INTO lot VALUES("77","14","3");
INSERT INTO lot VALUES("78","14","4");
INSERT INTO lot VALUES("79","14","5");
INSERT INTO lot VALUES("80","14","6");
INSERT INTO lot VALUES("81","14","7");
INSERT INTO lot VALUES("82","14","8");
INSERT INTO lot VALUES("83","14","9");
INSERT INTO lot VALUES("84","14","10");
INSERT INTO lot VALUES("85","15","1");
INSERT INTO lot VALUES("86","15","2");
INSERT INTO lot VALUES("87","15","3");
INSERT INTO lot VALUES("88","15","4");
INSERT INTO lot VALUES("89","15","5");
INSERT INTO lot VALUES("90","15","6");
INSERT INTO lot VALUES("91","15","7");
INSERT INTO lot VALUES("92","15","8");
INSERT INTO lot VALUES("93","15","9");
INSERT INTO lot VALUES("94","15","10");
INSERT INTO lot VALUES("95","16","1");
INSERT INTO lot VALUES("96","16","2");
INSERT INTO lot VALUES("97","16","3");
INSERT INTO lot VALUES("98","16","4");
INSERT INTO lot VALUES("99","16","5");
INSERT INTO lot VALUES("100","16","6");
INSERT INTO lot VALUES("101","16","7");
INSERT INTO lot VALUES("102","16","8");
INSERT INTO lot VALUES("103","16","9");
INSERT INTO lot VALUES("104","16","10");
INSERT INTO lot VALUES("105","9","1");
INSERT INTO lot VALUES("106","9","2");
INSERT INTO lot VALUES("107","9","3");
INSERT INTO lot VALUES("108","9","4");
INSERT INTO lot VALUES("109","9","5");
INSERT INTO lot VALUES("110","9","6");
INSERT INTO lot VALUES("111","9","7");
INSERT INTO lot VALUES("112","9","8");
INSERT INTO lot VALUES("113","9","9");
INSERT INTO lot VALUES("114","9","10");
INSERT INTO lot VALUES("115","17","1");
INSERT INTO lot VALUES("116","17","2");
INSERT INTO lot VALUES("117","17","3");
INSERT INTO lot VALUES("118","17","4");
INSERT INTO lot VALUES("119","17","5");
INSERT INTO lot VALUES("120","17","6");
INSERT INTO lot VALUES("121","17","7");
INSERT INTO lot VALUES("122","17","8");
INSERT INTO lot VALUES("123","17","9");
INSERT INTO lot VALUES("124","17","10");
INSERT INTO lot VALUES("125","6","1");
INSERT INTO lot VALUES("126","6","2");
INSERT INTO lot VALUES("127","6","3");
INSERT INTO lot VALUES("128","6","4");
INSERT INTO lot VALUES("129","6","5");
INSERT INTO lot VALUES("130","6","7");
INSERT INTO lot VALUES("131","6","8");
INSERT INTO lot VALUES("132","6","9");
INSERT INTO lot VALUES("133","6","10");
INSERT INTO lot VALUES("134","18","1");
INSERT INTO lot VALUES("135","18","2");
INSERT INTO lot VALUES("136","18","3");
INSERT INTO lot VALUES("137","18","4");
INSERT INTO lot VALUES("138","18","5");
INSERT INTO lot VALUES("139","18","6");
INSERT INTO lot VALUES("140","18","7");
INSERT INTO lot VALUES("141","18","8");
INSERT INTO lot VALUES("142","18","9");
INSERT INTO lot VALUES("143","18","10");
INSERT INTO lot VALUES("144","19","1");
INSERT INTO lot VALUES("145","19","2");
INSERT INTO lot VALUES("146","19","3");
INSERT INTO lot VALUES("147","19","4");
INSERT INTO lot VALUES("148","19","5");
INSERT INTO lot VALUES("149","19","6");
INSERT INTO lot VALUES("150","19","7");
INSERT INTO lot VALUES("151","19","8");
INSERT INTO lot VALUES("152","19","9");
INSERT INTO lot VALUES("153","19","10");
INSERT INTO lot VALUES("154","20","1");
INSERT INTO lot VALUES("155","20","2");
INSERT INTO lot VALUES("156","20","3");
INSERT INTO lot VALUES("157","20","4");
INSERT INTO lot VALUES("158","20","5");
INSERT INTO lot VALUES("159","20","6");
INSERT INTO lot VALUES("160","20","7");
INSERT INTO lot VALUES("161","20","8");
INSERT INTO lot VALUES("162","20","9");
INSERT INTO lot VALUES("163","20","10");
INSERT INTO lot VALUES("164","21","1");
INSERT INTO lot VALUES("165","21","2");
INSERT INTO lot VALUES("166","21","3");
INSERT INTO lot VALUES("167","21","4");
INSERT INTO lot VALUES("168","21","5");
INSERT INTO lot VALUES("169","21","6");
INSERT INTO lot VALUES("170","21","7");
INSERT INTO lot VALUES("171","21","8");
INSERT INTO lot VALUES("172","21","9");
INSERT INTO lot VALUES("173","21","10");
INSERT INTO lot VALUES("174","22","1");
INSERT INTO lot VALUES("175","22","2");
INSERT INTO lot VALUES("176","22","3");
INSERT INTO lot VALUES("177","22","4");
INSERT INTO lot VALUES("178","22","5");
INSERT INTO lot VALUES("179","22","6");
INSERT INTO lot VALUES("180","22","7");
INSERT INTO lot VALUES("181","22","8");
INSERT INTO lot VALUES("182","22","9");
INSERT INTO lot VALUES("183","22","10");
INSERT INTO lot VALUES("184","23","1");
INSERT INTO lot VALUES("185","23","2");
INSERT INTO lot VALUES("186","23","3");
INSERT INTO lot VALUES("187","23","4");
INSERT INTO lot VALUES("188","23","5");
INSERT INTO lot VALUES("189","23","6");
INSERT INTO lot VALUES("190","23","7");
INSERT INTO lot VALUES("191","23","8");
INSERT INTO lot VALUES("192","23","9");
INSERT INTO lot VALUES("193","23","10");
INSERT INTO lot VALUES("194","24","1");
INSERT INTO lot VALUES("195","24","2");
INSERT INTO lot VALUES("196","24","3");
INSERT INTO lot VALUES("197","24","4");
INSERT INTO lot VALUES("198","24","5");
INSERT INTO lot VALUES("199","24","6");
INSERT INTO lot VALUES("200","24","7");
INSERT INTO lot VALUES("201","24","8");
INSERT INTO lot VALUES("202","24","9");
INSERT INTO lot VALUES("203","24","10");
INSERT INTO lot VALUES("204","6","6");
INSERT INTO lot VALUES("205","5","2");
INSERT INTO lot VALUES("206","5","3");
INSERT INTO lot VALUES("207","5","4");
INSERT INTO lot VALUES("208","5","5");
INSERT INTO lot VALUES("209","5","6");
INSERT INTO lot VALUES("210","5","7");
INSERT INTO lot VALUES("211","5","8");
INSERT INTO lot VALUES("212","5","9");
INSERT INTO lot VALUES("213","5","10");
INSERT INTO lot VALUES("214","25","1");
INSERT INTO lot VALUES("215","25","2");
INSERT INTO lot VALUES("216","25","3");
INSERT INTO lot VALUES("217","25","4");
INSERT INTO lot VALUES("218","25","5");
INSERT INTO lot VALUES("219","25","6");
INSERT INTO lot VALUES("220","25","7");
INSERT INTO lot VALUES("221","25","8");
INSERT INTO lot VALUES("222","25","9");
INSERT INTO lot VALUES("223","25","10");
INSERT INTO lot VALUES("224","3","1");
INSERT INTO lot VALUES("225","3","2");
INSERT INTO lot VALUES("226","3","3");
INSERT INTO lot VALUES("227","3","4");
INSERT INTO lot VALUES("228","3","5");
INSERT INTO lot VALUES("229","3","6");
INSERT INTO lot VALUES("230","3","7");
INSERT INTO lot VALUES("231","3","8");
INSERT INTO lot VALUES("232","3","9");
INSERT INTO lot VALUES("233","3","10");
INSERT INTO lot VALUES("234","26","1");
INSERT INTO lot VALUES("235","26","2");
INSERT INTO lot VALUES("236","26","3");
INSERT INTO lot VALUES("237","26","4");
INSERT INTO lot VALUES("238","26","5");
INSERT INTO lot VALUES("239","26","6");
INSERT INTO lot VALUES("240","26","7");
INSERT INTO lot VALUES("241","26","8");
INSERT INTO lot VALUES("242","26","9");
INSERT INTO lot VALUES("243","26","10");
INSERT INTO lot VALUES("244","27","1");
INSERT INTO lot VALUES("245","27","2");
INSERT INTO lot VALUES("246","27","3");
INSERT INTO lot VALUES("247","27","4");
INSERT INTO lot VALUES("248","27","5");
INSERT INTO lot VALUES("249","27","6");
INSERT INTO lot VALUES("250","27","8");
INSERT INTO lot VALUES("251","27","9");
INSERT INTO lot VALUES("252","27","10");
INSERT INTO lot VALUES("253","28","1");
INSERT INTO lot VALUES("254","28","2");
INSERT INTO lot VALUES("255","28","3");
INSERT INTO lot VALUES("256","28","4");
INSERT INTO lot VALUES("257","28","5");
INSERT INTO lot VALUES("258","28","6");
INSERT INTO lot VALUES("259","28","7");
INSERT INTO lot VALUES("260","28","8");
INSERT INTO lot VALUES("261","28","9");
INSERT INTO lot VALUES("262","28","10");
INSERT INTO lot VALUES("263","29","1");
INSERT INTO lot VALUES("264","29","2");
INSERT INTO lot VALUES("265","29","3");
INSERT INTO lot VALUES("266","29","4");
INSERT INTO lot VALUES("267","29","5");
INSERT INTO lot VALUES("268","29","6");
INSERT INTO lot VALUES("269","29","7");
INSERT INTO lot VALUES("270","29","8");
INSERT INTO lot VALUES("271","29","9");
INSERT INTO lot VALUES("272","29","10");
INSERT INTO lot VALUES("273","30","1");
INSERT INTO lot VALUES("274","30","2");
INSERT INTO lot VALUES("275","30","3");
INSERT INTO lot VALUES("276","30","4");
INSERT INTO lot VALUES("277","30","5");
INSERT INTO lot VALUES("278","30","6");
INSERT INTO lot VALUES("279","30","7");
INSERT INTO lot VALUES("280","30","8");
INSERT INTO lot VALUES("281","30","9");
INSERT INTO lot VALUES("282","30","10");
INSERT INTO lot VALUES("283","31","1");
INSERT INTO lot VALUES("284","31","2");
INSERT INTO lot VALUES("285","31","3");
INSERT INTO lot VALUES("286","31","4");
INSERT INTO lot VALUES("287","31","5");
INSERT INTO lot VALUES("288","31","6");
INSERT INTO lot VALUES("289","31","7");
INSERT INTO lot VALUES("290","31","8");
INSERT INTO lot VALUES("291","31","9");
INSERT INTO lot VALUES("292","31","10");
INSERT INTO lot VALUES("293","32","1");
INSERT INTO lot VALUES("294","32","2");
INSERT INTO lot VALUES("295","32","3");
INSERT INTO lot VALUES("296","32","4");
INSERT INTO lot VALUES("297","32","5");
INSERT INTO lot VALUES("298","32","6");
INSERT INTO lot VALUES("299","32","7");
INSERT INTO lot VALUES("300","32","8");
INSERT INTO lot VALUES("301","32","9");
INSERT INTO lot VALUES("302","32","10");
INSERT INTO lot VALUES("303","27","7");
INSERT INTO lot VALUES("304","8","1");
INSERT INTO lot VALUES("305","8","2");
INSERT INTO lot VALUES("306","8","3");
INSERT INTO lot VALUES("307","8","4");
INSERT INTO lot VALUES("308","8","5");
INSERT INTO lot VALUES("309","8","6");
INSERT INTO lot VALUES("310","8","7");
INSERT INTO lot VALUES("311","8","8");
INSERT INTO lot VALUES("312","8","9");
INSERT INTO lot VALUES("313","8","10");
INSERT INTO lot VALUES("314","33","1");
INSERT INTO lot VALUES("315","33","2");
INSERT INTO lot VALUES("316","33","3");
INSERT INTO lot VALUES("317","33","4");
INSERT INTO lot VALUES("318","33","5");
INSERT INTO lot VALUES("319","33","6");
INSERT INTO lot VALUES("320","33","7");
INSERT INTO lot VALUES("321","33","8");
INSERT INTO lot VALUES("322","33","9");
INSERT INTO lot VALUES("323","33","10");
INSERT INTO lot VALUES("324","34","1");
INSERT INTO lot VALUES("325","34","2");
INSERT INTO lot VALUES("326","34","3");
INSERT INTO lot VALUES("327","34","4");
INSERT INTO lot VALUES("328","34","5");
INSERT INTO lot VALUES("329","34","6");
INSERT INTO lot VALUES("330","34","7");
INSERT INTO lot VALUES("331","34","8");
INSERT INTO lot VALUES("332","34","9");
INSERT INTO lot VALUES("333","34","10");
INSERT INTO lot VALUES("334","35","1");
INSERT INTO lot VALUES("335","35","2");
INSERT INTO lot VALUES("336","35","3");
INSERT INTO lot VALUES("337","35","4");
INSERT INTO lot VALUES("338","35","5");
INSERT INTO lot VALUES("339","35","6");
INSERT INTO lot VALUES("340","35","7");
INSERT INTO lot VALUES("341","35","8");
INSERT INTO lot VALUES("342","35","9");
INSERT INTO lot VALUES("343","35","10");
INSERT INTO lot VALUES("344","36","1");
INSERT INTO lot VALUES("345","36","2");
INSERT INTO lot VALUES("346","36","3");
INSERT INTO lot VALUES("347","36","4");
INSERT INTO lot VALUES("348","36","5");
INSERT INTO lot VALUES("349","36","6");
INSERT INTO lot VALUES("350","36","7");
INSERT INTO lot VALUES("351","36","8");
INSERT INTO lot VALUES("352","36","9");
INSERT INTO lot VALUES("353","36","10");
INSERT INTO lot VALUES("354","37","1");
INSERT INTO lot VALUES("355","37","2");
INSERT INTO lot VALUES("356","37","3");
INSERT INTO lot VALUES("357","37","4");
INSERT INTO lot VALUES("358","37","5");
INSERT INTO lot VALUES("359","37","6");
INSERT INTO lot VALUES("360","37","7");
INSERT INTO lot VALUES("361","37","8");
INSERT INTO lot VALUES("362","37","9");
INSERT INTO lot VALUES("363","37","10");
INSERT INTO lot VALUES("364","38","1");
INSERT INTO lot VALUES("365","38","2");
INSERT INTO lot VALUES("366","38","3");
INSERT INTO lot VALUES("367","38","4");
INSERT INTO lot VALUES("368","38","5");
INSERT INTO lot VALUES("369","38","6");
INSERT INTO lot VALUES("370","38","7");
INSERT INTO lot VALUES("371","38","8");
INSERT INTO lot VALUES("372","38","9");
INSERT INTO lot VALUES("373","38","10");
INSERT INTO lot VALUES("374","40","1");
INSERT INTO lot VALUES("375","40","2");
INSERT INTO lot VALUES("376","40","3");
INSERT INTO lot VALUES("377","40","4");
INSERT INTO lot VALUES("378","40","5");
INSERT INTO lot VALUES("379","40","6");
INSERT INTO lot VALUES("380","40","7");
INSERT INTO lot VALUES("381","40","8");
INSERT INTO lot VALUES("382","40","9");
INSERT INTO lot VALUES("383","40","10");
INSERT INTO lot VALUES("384","41","1");
INSERT INTO lot VALUES("385","41","2");
INSERT INTO lot VALUES("386","41","3");
INSERT INTO lot VALUES("387","41","4");
INSERT INTO lot VALUES("388","41","5");
INSERT INTO lot VALUES("389","41","6");
INSERT INTO lot VALUES("390","41","7");
INSERT INTO lot VALUES("391","41","8");
INSERT INTO lot VALUES("392","41","9");
INSERT INTO lot VALUES("393","41","10");
INSERT INTO lot VALUES("394","39","1");
INSERT INTO lot VALUES("395","39","2");
INSERT INTO lot VALUES("396","39","3");
INSERT INTO lot VALUES("397","39","4");
INSERT INTO lot VALUES("398","39","5");
INSERT INTO lot VALUES("399","39","6");
INSERT INTO lot VALUES("400","39","7");
INSERT INTO lot VALUES("401","39","8");
INSERT INTO lot VALUES("402","39","9");
INSERT INTO lot VALUES("403","39","10");



DROP TABLE mission_vision;

CREATE TABLE `mission_vision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO mission_vision VALUES("1","Mission","Natatangi ka, paraluman
Kislap mo\'y \'di maiwan, \'di iiwan
Mamahalin kita nang marahan
Sayo\'y paroroon sa kalawakan");
INSERT INTO mission_vision VALUES("2","Vision","Palad ay basang-basa
Ang dagitab ay damang-dama
Sa \'king kalamnang punong-puno
Ng pananabik at ng kaba");
INSERT INTO mission_vision VALUES("3","Goals","Naaalala ko pa no\'ng tayo pang dalawa
Sine lang ay okay ka na
Pero ngayon, kolehiyala ka na
Mas trip mong magtoma");



DROP TABLE monthly_dues;

CREATE TABLE `monthly_dues` (
  `monthly_dues_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_id` int(11) NOT NULL,
  `subdivision_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`monthly_dues_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO monthly_dues VALUES("1","1","Sunnyvale 1","200","2022-11-27");
INSERT INTO monthly_dues VALUES("2","2","Sunnyvale 2","280","2023-04-07");
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
  `officer_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

INSERT INTO officers VALUES("1","Sunnyvale 1","Saddie Wheeler","President","pf1.jpg");
INSERT INTO officers VALUES("2","Sunnyvale 1","Bennett Cooke","Vice President","pf2.jpg");
INSERT INTO officers VALUES("3","Sunnyvale 1","Martin Craig","Secretary","pf3.jpg");
INSERT INTO officers VALUES("4","Sunnyvale 1","Audrey Benson","Treasurer","pf4.jpg");
INSERT INTO officers VALUES("5","Sunnyvale 1","Ruth Walsh","Auditor","pf5.jpg");
INSERT INTO officers VALUES("6","Sunnyvale 1","Hadley Steele","PIO","pf6.jpg");
INSERT INTO officers VALUES("20","Sunnyvale 2","Zakir Hodges","Treasurer","");
INSERT INTO officers VALUES("10","Sunnyvale 2","Bogart D. Explorer","President","");
INSERT INTO officers VALUES("18","Sunnyvale 2","Aya Price","Vice President","");
INSERT INTO officers VALUES("19","Sunnyvale 2","Maxim Diaz","Secretary","");
INSERT INTO officers VALUES("21","Sunnyvale 2","Gloria Sharp","Auditor","");
INSERT INTO officers VALUES("22","Sunnyvale 2","Dulcie Matthams","PIO","");



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
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

INSERT INTO post VALUES("1","28","Mon Carlo Delima","The moon is beautiful, isn\'t it?","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-04-11 01:09:01","","315906640_1753081135077201_6331420859846659098_n.png","No","Active");
INSERT INTO post VALUES("2","24","Jeune Paolus Flores","Fascinating art created by nature.","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-04-11 09:59:54","","316218368_829271824950879_360246867658747215_n.png","No","Active");
INSERT INTO post VALUES("3","23","Kyle Andrei Casingal","Reflection","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-04-11 10:03:11","","316189223_691988422233113_5145406262467036356_n.png","No","Active");
INSERT INTO post VALUES("4","23","Kyle Andrei Casingal","Windows of truth shows the real beauty of nature.","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-04-11 10:04:40","","313194508_684251046380877_4560164667618025920_n.png","No","Active");
INSERT INTO post VALUES("5","28","Mon Carlo Delima","Vintage mansion represents calm, warm, and peace.","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2022-11-24 10:05:22","","312140489_698881924813395_203606755662892340_n.png","No","Archived");
INSERT INTO post VALUES("15","52","Marco Ivan Sta. Maria","","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2022-12-01 06:37:21","","Picture2.jpg","No","Archived");
INSERT INTO post VALUES("17","53","Krishtalene Bendaña","","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2022-12-01 06:48:54","","Picture4.png","No","Archived");
INSERT INTO post VALUES("18","52","Marco Ivan Sta. Maria","","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2022-12-01 06:49:23","","Picture5.jpg","No","Archived");
INSERT INTO post VALUES("19","53","Krishtalene Bendaña","","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2022-12-01 06:50:15","","Picture6.jpg","No","Archived");
INSERT INTO post VALUES("20","52","Marco Ivan Sta. Maria","","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2022-12-01 06:51:00","","Picture3.png","No","Archived");
INSERT INTO post VALUES("24","55","Kyle Andrei Casingal","Light Bulb","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2022-12-01 10:13:20","","188-1889845_a-very-simple-concept-infinitustoken-medium-light-bulb.png","No","Archived");
INSERT INTO post VALUES("28","18","SV1_Admin","Water interruption","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-01-24 20:00:38","","","Yes","Active");
INSERT INTO post VALUES("29","18","SV1_Admin","Chinese New Year event","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-01-24 20:06:20","","","Yes","Archived");
INSERT INTO post VALUES("30","1","Mon Carlo Delima","URS","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-03-16 22:24:20","","URS.png","No","Archived");
INSERT INTO post VALUES("31","1","Mon Carlo Delima","Nihonjin Desu","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-04-02 12:59:46","","lockscreen.png","No","Archived");
INSERT INTO post VALUES("32","1","Mon Carlo Delima","Magical World","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-04-02 13:00:31","","sEt5ph.jpg","No","Archived");
INSERT INTO post VALUES("33","18","SV1_Admin","Power Interruption","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-02-04 13:06:44","1","","Yes","Archived");
INSERT INTO post VALUES("34","18","SV1_Admin","Basketball Tryouts","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-02-22 21:43:21","30","","Yes","Archived");
INSERT INTO post VALUES("35","18","SV1_Admin","Volleyball Tryouts","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-03-17 21:43:35","30","","Yes","Active");
INSERT INTO post VALUES("36","18","SV1_Admin","Swimming Lessons","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-01-04 21:43:46","30","","Yes","Archived");
INSERT INTO post VALUES("37","18","SV1_Admin","Founding Anniv. Celebration","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-02-01 21:44:01","30","","Yes","Archived");
INSERT INTO post VALUES("38","1","Mon Carlo Delima","Sun and Moon","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-04-14 14:19:37","","dsa.jpg","No","Active");
INSERT INTO post VALUES("39","61","Monkey D. Luffy","Japanese Street","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ipsum, porttitor eleifend condimentum nec, sollicitudin id mi. Aenean aliquet, mauris sit amet ultricies luctus, arcu ex facilisis lorem, eu lacinia ante sem id erat. Praesent quis blandit.","2023-04-14 14:23:15","","lockscreen.png","No","Active");



DROP TABLE privacy;

CREATE TABLE `privacy` (
  `privacy_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`privacy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO privacy VALUES("1","Privacy Policy for Sunnyvale Subdivisions","At Sunnyvale Subdivisions, we take your privacy seriously. This Privacy Policy outlines the types of personal information that we may collect from you when you visit our website and how we use and protect that information. By using our website, you agree to the terms of this Privacy Policy.");
INSERT INTO privacy VALUES("2","What information do we collect?","We may collect personal information such as your name, email address, mailing address, phone number, and other information that you voluntarily provide to us when you sign up for our newsletter, fill out a form, or contact us through our website.

We also automatically collect certain non-personal information about your visit to our website, such as your IP address, browser type, device type, and operating system. This information is used to analyze and improve the performance and usability of our website.");
INSERT INTO privacy VALUES("3","How do we use your information?","We may use the personal information that you provide to us to respond to your inquiries, send you our newsletter or marketing communications, process your orders, and provide you with other information or services that you request from us.

We may also use the non-personal information that we collect to analyze trends and usage patterns, improve our website, and to protect our website and our users from fraudulent or unauthorized activities.");
INSERT INTO privacy VALUES("4","Do we share your information?","We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as necessary to provide you with the services that you have requested from us. We may also share your information with our trusted service providers who assist us in operating our website, conducting our business, or servicing you, as long as those parties agree to keep this information confidential.

We may also disclose your information if we are required to do so by law or in response to a legal process, or if we believe that such disclosure is necessary to protect our rights, property, or safety, or the rights, property, or safety of our users or others.");
INSERT INTO privacy VALUES("5","How do we protect your information?","We take reasonable measures to protect your personal information from unauthorized access, use, disclosure, alteration, or destruction. However, no data transmission over the Internet or storage of electronic data can be guaranteed to be 100% secure, and we cannot guarantee the security of any information that you provide to us.");
INSERT INTO privacy VALUES("6","Your rights and choices","You have the right to access and modify the personal information that we have collected from you by contacting us at [Your Contact Information]. You may also opt-out of receiving our newsletter or marketing communications at any time by following the instructions provided in those communications.");
INSERT INTO privacy VALUES("7","Updates to this Privacy Policy","We may update this Privacy Policy from time to time by posting a new version on our website. You should check this page periodically to ensure that you are aware of any changes.");
INSERT INTO privacy VALUES("8","Contact Us","If you have any questions or concerns about this Privacy Policy, please contact us at subdivisionsunnyvale@gmail.com");



DROP TABLE subdivision;

CREATE TABLE `subdivision` (
  `subdivision_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdivision_name` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  PRIMARY KEY (`subdivision_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO subdivision VALUES("1","Sunnyvale 1","Pantok");
INSERT INTO subdivision VALUES("2","Sunnyvale 2","Palangoy");
INSERT INTO subdivision VALUES("3","Sunnyvale 3","Palangoy");
INSERT INTO subdivision VALUES("4","Sunnyvale 4","Pantok");



DROP TABLE tenant;

CREATE TABLE `tenant` (
  `tenant_id` int(11) NOT NULL AUTO_INCREMENT,
  `homeowner_id` int(11) NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `mobile_no` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `display_picture` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`tenant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO tenant VALUES("1","1","Monkey D. Luffy","2023-04-12","Male","dmoncarlo@gmail.com","09123456789","default.png");
INSERT INTO tenant VALUES("2","1","Bogart D. Explorer","2023-03-01","Male","bogartdexplorer@gmail.com","09123456789","default.png");
INSERT INTO tenant VALUES("3","1","Portgas D. Ace","2023-04-13","Male","donut@gmail.com","09123456789","default.png");



DROP TABLE transaction;

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO transaction VALUES("1","1","Mon Carlo Delima","1500","315887907_1137649846869408_655406644278059076_n.png","Amenity Renting","Approved","");
INSERT INTO transaction VALUES("2","48","SV1_Treasurer","180","315887907_1137649846869408_655406644278059076_n.png","Amenity Renting","Approved","");
INSERT INTO transaction VALUES("3","1","Mon Carlo Delima","2150","328148270_726681382138928_1391919010667224674_n.png","Amenity Renting","Approved","");
INSERT INTO transaction VALUES("4","1","Mon Carlo Delima","600","328148270_726681382138928_1391919010667224674_n.png","Monthly Dues","Paid","2023-04-11 22:06:01");
INSERT INTO transaction VALUES("5","55","Kyle Andrei Casingal","1500","328148270_726681382138928_1391919010667224674_n.png","Monthly Dues","Paid","");
INSERT INTO transaction VALUES("6","55","Kyle Andrei Casingal","1500","328148270_726681382138928_1391919010667224674_n.png","Monthly Dues","Paid","");
INSERT INTO transaction VALUES("9","48","SV1_Treasurer","800","","Monthly Dues","Paid","");
INSERT INTO transaction VALUES("10","48","SV1_Treasurer","1000","","Monthly Dues","Paid","");
INSERT INTO transaction VALUES("11","1","Mon Carlo Delima","50","328148270_726681382138928_1391919010667224674_n.png","Amenity Renting","Approved","2023-05-03 21:01:20");



DROP TABLE user;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_homeowner_id` int(11) DEFAULT NULL,
  `user_tenant_id` int(11) DEFAULT NULL,
  `full_name` varchar(50) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email_address` varchar(40) DEFAULT NULL,
  `account_status` varchar(15) NOT NULL,
  `verification_code` varchar(6) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

INSERT INTO user VALUES("55","2","","Kyle Andrei Casingal","Homeowner","password","kylecasingal36@gmail.com","Activated","248425","2022-12-01 10:11:20");
INSERT INTO user VALUES("3","3","","Jeune Paolus Flores","Homeowner","thisfeelsgud","floresjeunepaolus@gmail.com","Activated","943962","2022-11-10 22:51:58");
INSERT INTO user VALUES("1","1","","Mon Carlo Delima","Homeowner","12345","dmoncarlo6@gmail.com","Activated","286140","2022-11-24 13:48:07");
INSERT INTO user VALUES("27","16","","Janwel Castillo","Homeowner","dadada","janweljigycastillo20@gmail.com","Activated","943962","2022-11-15 20:43:59");
INSERT INTO user VALUES("58","50","","SV3_Admin","Admin","password","SV3_Admin","Activated","","");
INSERT INTO user VALUES("18","18","","SV1_Admin","Admin","password","SV1_Admin","Activated","","");
INSERT INTO user VALUES("42","17","","Roiemar Escueta","Homeowner","123","escuetaroiemar@gmail.com","Deactivated","135447","2022-11-28 23:28:23");
INSERT INTO user VALUES("46","28","","SV1_Secretary","Secretary","123","SV1_Secretary","Activated","","");
INSERT INTO user VALUES("48","36","","SV1_Treasurer","Treasurer","123","SV1_Treasurer","Activated","","");
INSERT INTO user VALUES("49","37","","SV2_Admin","Admin","password","SV2_Admin","Activated","","");
INSERT INTO user VALUES("52","39","","Marco Ivan Sta. Maria","Homeowner","123","marcoivanstamaria@gmail.com","Activated","257545","2022-12-01 06:31:28");
INSERT INTO user VALUES("53","8","","Krishtalene Bendaña","Homeowner","123","tissabendana@gmail.com","Activated","573856","2022-12-01 06:37:48");
INSERT INTO user VALUES("59","51","","SV1_Guard","Guard","123","SV1_Guard","Activated","","");
INSERT INTO user VALUES("61","","1","Monkey D. Luffy","Tenant","12345","dmoncarlo@gmail.com","Activated","665824","2023-04-14 22:46:46");



DROP TABLE vehicle_monitoring;

CREATE TABLE `vehicle_monitoring` (
  `vehicle_monitoring_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_registration` varchar(10) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `vehicle_color` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`vehicle_monitoring_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO vehicle_monitoring VALUES("10","XYZ 9876","Sedan","White","2023-04-09 14:23:51","INCOMING");
INSERT INTO vehicle_monitoring VALUES("11","XYZ 9876","Truck","Red","2023-04-09 14:24:00","INCOMING");
INSERT INTO vehicle_monitoring VALUES("9","LTO 1234","Van","Blue","2023-04-09 14:23:42","INCOMING");



DROP TABLE years;

CREATE TABLE `years` (
  `yearID` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(45) NOT NULL,
  PRIMARY KEY (`yearID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO years VALUES("1","2023");
INSERT INTO years VALUES("2","2024");
INSERT INTO years VALUES("3","2025");
INSERT INTO years VALUES("4","2026");
INSERT INTO years VALUES("5","2027");



