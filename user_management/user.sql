CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(50) DEFAULT NULL,
  `Lastname` varchar(50) DEFAULT NULL,
  `Gender` char(15) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phonenumber` varchar(50) DEFAULT NULL,
  `Address` text,
  `District` varchar(50) DEFAULT NULL,
  `Amphoe` varchar(50) DEFAULT NULL,
  `Province` varchar(50) DEFAULT NULL,
  `Zipcode` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `user` (`ID`, `Firstname`, `Lastname`, `Gender`, `Birthdate`, `Email`, `Phonenumber`, `Address`, `District`, `Amphoe`, `Province`, `Zipcode`) VALUES
	(1, 'ศิริชัย', 'วันทอง', 'Male', '1992-01-21', 'sirichai.se@gmail.com', '0888378243', '167/1 หมู่ 9', 'นาเริก', 'พนัสนิคม', 'ชลบุรี', '20240'),
	(2, 'อันดา', 'สวีท', 'Female', '1989-02-01', 'testnaga@gmail.com', '0901212367', '254', 'ห้วยขวาง', 'ห้วยขวาง', 'กรุงเทพมหานคร', '10310'),
	(3, 'บรรจงไท', 'สรรค์ธรรม', 'Male', '1991-01-26', 'testnaja@gmail.com', '0901212389', '28', 'สนามจันทร์', 'เมือง', 'นครปฐม', '73000');
