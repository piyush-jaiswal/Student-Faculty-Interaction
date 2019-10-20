CREATE DATABASE  IF NOT EXISTS `StudentFacultyInteraction` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `StudentFacultyInteraction`;
-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: StudentFacultyInteraction
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `courseSubtopicLinks`
--

DROP TABLE IF EXISTS `courseSubtopicLinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseSubtopicLinks` (
  `courseCode` varchar(11) NOT NULL,
  `session` varchar(15) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `subtopic` varchar(100) NOT NULL,
  `subtopicLink` varchar(150) NOT NULL,
  PRIMARY KEY (`courseCode`,`session`,`topic`,`subtopic`,`subtopicLink`),
  KEY `subtopicLink_session_idx` (`session`),
  KEY `subtopicLink_topic_idx` (`topic`),
  KEY `subtopicLink_subtopic_idx` (`subtopic`),
  CONSTRAINT `subtopicLink_courseCode` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subtopicLink_session` FOREIGN KEY (`session`) REFERENCES `courses` (`session`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subtopicLink_subtopic` FOREIGN KEY (`subtopic`) REFERENCES `courseSubtopics` (`subtopic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subtopicLink_topic` FOREIGN KEY (`topic`) REFERENCES `courseTopics` (`topic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseSubtopicLinks`
--

LOCK TABLES `courseSubtopicLinks` WRITE;
/*!40000 ALTER TABLE `courseSubtopicLinks` DISABLE KEYS */;
INSERT INTO `courseSubtopicLinks` VALUES ('EL101','2015-2016','Complement notations and Binary codes','10s complement','http://www.electrical4u.com/9s-complement-and-10s-complement/'),('EL101','2015-2016','Complement notations and Binary codes','1s complement','https://en.wikipedia.org/wiki/Ones%27_complement'),('EL101','2015-2016','Complement notations and Binary codes','2s complement','http://academic.evergreen.edu/projects/biophysics/technotes/program/2s_comp.htm'),('EL101','2015-2016','Complement notations and Binary codes','2s complement','https://www.youtube.com/watch?v=u01imtvqsrU');
/*!40000 ALTER TABLE `courseSubtopicLinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseSubtopicRating`
--

DROP TABLE IF EXISTS `courseSubtopicRating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseSubtopicRating` (
  `courseCode` varchar(11) NOT NULL,
  `session` varchar(15) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `subtopic` varchar(100) NOT NULL,
  `enrollmentID` varchar(45) NOT NULL,
  `subtopicRating` int(11) DEFAULT NULL,
  `subtopicRatingTimestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`courseCode`,`session`,`topic`,`subtopic`,`enrollmentID`),
  KEY `subtopicRating_session_idx` (`session`),
  KEY `subtopicRating_topic_idx` (`topic`),
  KEY `subtopicRating_enrollmentID_idx` (`enrollmentID`),
  KEY `subtopicRating_subtopic_idx` (`subtopic`),
  CONSTRAINT `subtopicRating_courseCode` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subtopicRating_enrollmentID` FOREIGN KEY (`enrollmentID`) REFERENCES `student` (`enrollmentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subtopicRating_session` FOREIGN KEY (`session`) REFERENCES `courses` (`session`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subtopicRating_subtopic` FOREIGN KEY (`subtopic`) REFERENCES `courseSubtopics` (`subtopic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subtopicRating_topic` FOREIGN KEY (`topic`) REFERENCES `courseTopics` (`topic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseSubtopicRating`
--

LOCK TABLES `courseSubtopicRating` WRITE;
/*!40000 ALTER TABLE `courseSubtopicRating` DISABLE KEYS */;
INSERT INTO `courseSubtopicRating` VALUES ('EL101','2015-2016','Analog & Digital signals and Number system','Binary number system','U101114FCS222',4,'2016-11-21 18:31:12'),('EL101','2015-2016','Complement notations and Binary codes','10s complement','U101114FCS222',4,'2016-11-21 18:31:16'),('EL101','2015-2016','Complement notations and Binary codes','1s complement','U101114FCS203',4,NULL),('EL101','2015-2016','Complement notations and Binary codes','1s complement','U101114FCS222',3,'2016-11-21 17:57:04'),('EL101','2015-2016','Complement notations and Binary codes','1s complement','U101114FCS253',3,NULL);
/*!40000 ALTER TABLE `courseSubtopicRating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseSubtopics`
--

DROP TABLE IF EXISTS `courseSubtopics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseSubtopics` (
  `courseCode` varchar(11) NOT NULL,
  `session` varchar(15) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `subtopic` varchar(100) NOT NULL,
  `subtopicStatus` varchar(45) DEFAULT NULL,
  `subtopicStatusTimestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`courseCode`,`session`,`topic`,`subtopic`),
  KEY `session_idx` (`session`),
  KEY `subtopic_idx` (`subtopic`),
  KEY `subtopic_topic_idx` (`topic`),
  CONSTRAINT `subtopic_courseCode` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subtopic_session` FOREIGN KEY (`session`) REFERENCES `courses` (`session`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subtopic_topic` FOREIGN KEY (`topic`) REFERENCES `courseTopics` (`topic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseSubtopics`
--

LOCK TABLES `courseSubtopics` WRITE;
/*!40000 ALTER TABLE `courseSubtopics` DISABLE KEYS */;
INSERT INTO `courseSubtopics` VALUES ('EL101','2015-2016','Analog & Digital signals and Number system','Binary number system','checked','2016-11-21 18:55:46'),('EL101','2015-2016','Complement notations and Binary codes','10s complement','checked','2016-11-20 17:45:45'),('EL101','2015-2016','Complement notations and Binary codes','1s complement','checked','2016-11-20 16:47:18'),('EL101','2015-2016','Complement notations and Binary codes','2s complement','checked','2016-11-20 14:21:39');
/*!40000 ALTER TABLE `courseSubtopics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseTopicLinks`
--

DROP TABLE IF EXISTS `courseTopicLinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseTopicLinks` (
  `courseCode` varchar(11) NOT NULL,
  `session` varchar(15) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `topicLink` varchar(150) NOT NULL,
  PRIMARY KEY (`courseCode`,`session`,`topic`,`topicLink`),
  KEY `session_topicLink_idx` (`session`),
  KEY `topic_idx` (`topic`),
  KEY `topicLink_idx` (`topic`),
  CONSTRAINT `topicLink_courseCode` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `topicLink_session` FOREIGN KEY (`session`) REFERENCES `courses` (`session`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `topicLink_topic` FOREIGN KEY (`topic`) REFERENCES `courseTopics` (`topic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseTopicLinks`
--

LOCK TABLES `courseTopicLinks` WRITE;
/*!40000 ALTER TABLE `courseTopicLinks` DISABLE KEYS */;
INSERT INTO `courseTopicLinks` VALUES ('EL101','2015-2016','Analog & Digital signals and Number system','http://www.diffen.com/difference/Analog_vs_Digital');
/*!40000 ALTER TABLE `courseTopicLinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseTopicRating`
--

DROP TABLE IF EXISTS `courseTopicRating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseTopicRating` (
  `courseCode` varchar(11) NOT NULL,
  `session` varchar(15) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `enrollmentID` varchar(45) NOT NULL,
  `topicRating` int(11) DEFAULT NULL,
  `topicRatingTimestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`courseCode`,`session`,`topic`,`enrollmentID`),
  KEY `topicRatng_session_idx` (`session`),
  KEY `topicRating_idx` (`topic`),
  KEY `topic2_idx` (`topic`),
  KEY `topicRating2_idx` (`topic`),
  KEY `enrollmentID_idx` (`enrollmentID`),
  CONSTRAINT `topicRating_courseCode` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `topicRating_enrollmentID` FOREIGN KEY (`enrollmentID`) REFERENCES `student` (`enrollmentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `topicRating_session` FOREIGN KEY (`session`) REFERENCES `courses` (`session`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `topicRating_topic` FOREIGN KEY (`topic`) REFERENCES `courseTopics` (`topic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseTopicRating`
--

LOCK TABLES `courseTopicRating` WRITE;
/*!40000 ALTER TABLE `courseTopicRating` DISABLE KEYS */;
INSERT INTO `courseTopicRating` VALUES ('EL101','2015-2016','Analog & Digital signals and Number system','U101114FCS203',4,NULL),('EL101','2015-2016','Analog & Digital signals and Number system','U101114FCS222',4,'2016-11-21 18:31:12'),('EL101','2015-2016','Analog & Digital signals and Number system','U101114FCS253',2,NULL),('EL101','2015-2016','Boolean algebra and minimization techniques','U101114FCS222',1,'2016-11-21 18:31:14'),('EL101','2015-2016','Complement notations and Binary codes','U101114FCS222',3,'2016-11-21 18:31:18'),('EL101','2015-2016','Designing of Arithmetic Combinational circuits','U101114FCS222',5,'2016-11-21 18:31:18');
/*!40000 ALTER TABLE `courseTopicRating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseTopics`
--

DROP TABLE IF EXISTS `courseTopics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseTopics` (
  `courseCode` varchar(11) NOT NULL,
  `session` varchar(15) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `topicStatus` varchar(45) DEFAULT NULL,
  `topicStatusTimestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`courseCode`,`session`,`topic`),
  KEY `session_idx` (`session`),
  KEY `session_topic_idx` (`session`),
  KEY `topic_idx` (`topic`),
  CONSTRAINT `topic_courseCode` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `topic_session` FOREIGN KEY (`session`) REFERENCES `courses` (`session`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseTopics`
--

LOCK TABLES `courseTopics` WRITE;
/*!40000 ALTER TABLE `courseTopics` DISABLE KEYS */;
INSERT INTO `courseTopics` VALUES ('EL101','2015-2016','Analog & Digital signals and Number system','checked','2016-11-21 18:55:46'),('EL101','2015-2016','Boolean algebra and minimization techniques','checked','2016-11-21 10:18:45'),('EL101','2015-2016','Complement notations and Binary codes','checked','2016-11-20 17:45:45'),('EL101','2015-2016','Designing of Arithmetic Combinational circuits','checked','2016-11-20 12:42:38'),('EL101','2015-2016','Logic gates and Logic & Arithmetic operations','notChecked','2016-11-21 19:22:33');
/*!40000 ALTER TABLE `courseTopics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `courseCode` varchar(11) NOT NULL,
  `courseName` varchar(60) NOT NULL,
  `sem` int(11) DEFAULT NULL,
  `session` varchar(15) NOT NULL,
  PRIMARY KEY (`courseCode`,`session`),
  KEY `session_idx` (`session`),
  KEY `courseName_idx` (`courseName`),
  KEY `sem_idx` (`sem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES ('CS201','Design and Analysis of Algorithms',4,'2016-2016'),('CS223','Database Management System',4,'2016-2016'),('CS351','Compiler Design',5,'2016-2017'),('EL101','Digital Logic and Circuits',3,'2015-2016');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `employeeID` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `researchArea` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES ('E101114FCS206','AMIT KUMAR','amit.kumar@niituniversity.in','80942406592','Data Management'),('E101114FCS208','PROSENJIT GUPTA','prosenjit.gupta@niituniversity.in','80942406552','Algorithms and GIS'),('E101114FCS236','VIKAS UPADHYAYA','vikas.upadhyaya@niituniversity.in','8094240172','Logical Circuits');
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facultyCoursesConducting`
--

DROP TABLE IF EXISTS `facultyCoursesConducting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facultyCoursesConducting` (
  `employeeID` varchar(45) NOT NULL,
  `courseCode` varchar(11) NOT NULL,
  `sem` int(11) DEFAULT NULL,
  `session` varchar(15) NOT NULL,
  PRIMARY KEY (`employeeID`,`courseCode`,`session`),
  KEY `session_idx` (`session`),
  KEY `courseName_idx` (`courseCode`),
  CONSTRAINT `facultyCoursesConducting_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `faculty` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `faculty_courseName` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `faculty_session` FOREIGN KEY (`session`) REFERENCES `courses` (`session`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultyCoursesConducting`
--

LOCK TABLES `facultyCoursesConducting` WRITE;
/*!40000 ALTER TABLE `facultyCoursesConducting` DISABLE KEYS */;
INSERT INTO `facultyCoursesConducting` VALUES ('E101114FCS206','CS223',4,'2016-2016'),('E101114FCS208','CS201',4,'2016-2016'),('E101114FCS236','EL101',3,'2015-2016');
/*!40000 ALTER TABLE `facultyCoursesConducting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hodCoursesIncharge`
--

DROP TABLE IF EXISTS `hodCoursesIncharge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hodCoursesIncharge` (
  `employeeID` varchar(45) NOT NULL,
  `courseCode` varchar(11) NOT NULL,
  `sem` int(11) DEFAULT NULL,
  `session` varchar(15) NOT NULL,
  PRIMARY KEY (`employeeID`,`courseCode`,`session`),
  KEY `courseName_idx` (`courseCode`),
  KEY `session_idx` (`session`),
  CONSTRAINT `hodCoursesIncharge_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `faculty` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hod_courseName` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hod_session` FOREIGN KEY (`session`) REFERENCES `courses` (`session`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hodCoursesIncharge`
--

LOCK TABLES `hodCoursesIncharge` WRITE;
/*!40000 ALTER TABLE `hodCoursesIncharge` DISABLE KEYS */;
INSERT INTO `hodCoursesIncharge` VALUES ('E101114FCS208','CS201',4,'2016-2016'),('E101114FCS208','CS223',4,'2016-2016'),('E101114FCS208','CS351',5,'2016-2017'),('E101114FCS208','EL101',3,'2015-2016');
/*!40000 ALTER TABLE `hodCoursesIncharge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meetings` (
  `meetingID` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(15) NOT NULL,
  `recipient` varchar(15) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `dateRequested` datetime NOT NULL,
  `approvedMeetingDate` datetime DEFAULT NULL,
  PRIMARY KEY (`meetingID`),
  UNIQUE KEY `date_UNIQUE` (`dateRequested`),
  KEY `meetings_recipient_idx` (`recipient`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
INSERT INTO `meetings` VALUES (1,'U101114FCS203','E101114FCS208','Doubt in graphs','DFS','pending','2016-11-12 13:51:25',NULL),(2,'E101114FCS208','U101114FCS222','Attendance','Meet me at 6 today!','pending','2016-11-12 19:28:02',NULL),(3,'U101114FCS222','E101114FCS208','Big O','Doubt in Big O notation.','pending','2016-11-12 22:55:22',NULL),(4,'E101114FCS208','U101114FCS222','TEST','Testing','pending','2016-11-14 12:52:37',NULL),(5,'U101114FCS222','E101114FCS208','TEST','Ready to meet!','pending','2016-11-14 15:45:25',NULL),(6,'U101114FCS222','E101114FCS236','Doubt','Flip FLops','pending','2016-11-16 11:05:43',NULL),(7,'E101114FCS208','U101114FCS203','Regarding project','Meet me as soon as possible!','pending','2016-11-20 00:31:46',NULL);
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `notificationID` int(11) NOT NULL AUTO_INCREMENT,
  `meetingID` int(11) DEFAULT NULL,
  `recipient` varchar(15) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`notificationID`),
  KEY `notifications_meetingID_idx` (`meetingID`),
  KEY `notifications_recipient_idx` (`recipient`),
  CONSTRAINT `notifications_meetingID` FOREIGN KEY (`meetingID`) REFERENCES `meetings` (`meetingID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notifications_recipient` FOREIGN KEY (`recipient`) REFERENCES `meetings` (`recipient`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,1,'E101114FCS208','unseen'),(2,2,'U101114FCS222','unseen'),(3,3,'E101114FCS208','unseen'),(4,4,'U101114FCS222','unseen'),(5,5,'E101114FCS208','unseen'),(6,6,'E101114FCS236','unseen'),(7,7,'U101114FCS203','unseen');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `enrollmentID` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`enrollmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('U101114FCS203','PIYUSH JAISWAL','piyush.jaiswal@st.niituniversity.in'),('U101114FCS212','SOMYA PAREEK','somya.pareek@st.niituniversity.in'),('U101114FCS222','RAJJAT CHHAJER','rajjat.chhajer@st.niituniversity.in'),('U101114FCS253','PRIYAMWAD PATHAK','priyamwad.pathak@st.niituniversity.in');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentCoursesEnrolled`
--

DROP TABLE IF EXISTS `studentCoursesEnrolled`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentCoursesEnrolled` (
  `enrollmentID` varchar(45) NOT NULL,
  `courseCode` varchar(11) NOT NULL,
  `sem` int(11) DEFAULT NULL,
  `session` varchar(15) NOT NULL,
  PRIMARY KEY (`enrollmentID`,`courseCode`,`session`),
  KEY `session_idx` (`session`),
  KEY `courseName_idx` (`courseCode`),
  CONSTRAINT `courseCode` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `session` FOREIGN KEY (`session`) REFERENCES `courses` (`session`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `studentCoursesEnrolled_ibfk_1` FOREIGN KEY (`enrollmentID`) REFERENCES `student` (`enrollmentID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentCoursesEnrolled`
--

LOCK TABLES `studentCoursesEnrolled` WRITE;
/*!40000 ALTER TABLE `studentCoursesEnrolled` DISABLE KEYS */;
INSERT INTO `studentCoursesEnrolled` VALUES ('U101114FCS203','CS201',4,'2016-2016'),('U101114FCS203','CS351',5,'2016-2017'),('U101114FCS222','CS223',4,'2016-2016'),('U101114FCS222','EL101',3,'2015-2016'),('U101114FCS253','EL101',3,'2015-2016');
/*!40000 ALTER TABLE `studentCoursesEnrolled` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-21 20:19:15
