USE StudentFacultyInteraction;

SELECT courses.courseName FROM courses,hodCoursesIncharge 
WHERE hodCoursesIncharge.employeeID='E101114FCS208' AND hodCoursesIncharge.courseCode = courses.courseCode;

SELECT researchArea FROM faculty WHERE employeeID='E101114FCS208';

SELECT courseName FROM courses WHERE courseCode='CS201';

SELECT topic,topicStatus FROM courseTopics WHERE courseCode='EL101'AND session='2015-2016';

SELECT subtopic,subtopicStatus FROM courseSubtopics WHERE courseCode='EL101'AND session='2015-2016' AND topic='Complement notations and Binary codes';

SELECT topicLink FROM courseTopicLinks WHERE courseCode='EL101' AND session='2015-2016' AND topic='Complement notations and Binary codes';

SELECT subtopicLink FROM courseSubtopicLinks WHERE courseCode='EL101' AND session='2015-2016' AND topic='Analog & Digital signals and Number system' AND subtopic='1s complement';

SELECT subtopicLink FROM courseSubtopicLinks WHERE courseCode='EL101' AND session='2015-2016' AND topic='Complement notations and Binary codes' AND subtopic='10s complement';

UPDATE courseTopics SET topicStatus='checked' WHERE courseCode='EL101' AND session='2015-2016' AND topic='Analog & Digital signals and Number system';

UPDATE courseSubtopics SET subtopicStatus='checked' WHERE courseCode='EL101' 
AND session='2015-2016' AND topic='Analog & Digital signals and Number system' AND subtopic='Binary number system';

SELECT subtopicStatus FROM courseSubtopics WHERE courseCode='EL101' 
AND session='2015-2016' AND topic='Complement notations and Binary codes';

UPDATE courseTopics SET topicStatus='checked', topicStatusTimestamp='2016-11-08 14:23:23' WHERE courseCode='EL101' AND session='2015-2016' AND topic='Analog & Digital signals and Number system';

SELECT courses.courseName,courses.courseCode FROM courses, studentCoursesEnrolled 
WHERE studentCoursesEnrolled.enrollmentID='U101114FCS203' AND studentCoursesEnrolled.session='2016-2017' AND studentCoursesEnrolled.courseCode = courses.courseCode;

SELECT courses.courseName,courses.courseCode FROM courses,facultyCoursesConducting 
WHERE facultyCoursesConducting.employeeID='E101114FCS208' AND facultyCoursesConducting.session='2015-2016' AND facultyCoursesConducting.courseCode = courses.courseCode;

INSERT INTO meetings (sender, recipient, subject, reason, status, date) VALUES ('ASDASD', 'DASDA', 'dasdas', 'dasdad', 'dasd', '2016-10-26 13:25:20');

SELECT enrollmentID FROM student WHERE name='PIYUSH JAISWAL';

SELECT employeeID FROM student WHERE name='PROSENJIT GUPTA';

INSERT INTO notifications (meetingID, status) VALUES ('11', 'unseen');

ALTER TABLE meetings AUTO_INCREMENT = 1;

ALTER TABLE notifications AUTO_INCREMENT = 1;

SELECT meetingID FROM notifications WHERE recipient="U101114FCS222" AND status='unseen';

SELECT sender,date FROM meetings WHERE meetingID='1';

SELECT sender,date_format(date, '%Y-%m-%d') AS date FROM meetings WHERE meetingID='1' ;

SELECT meetingID FROM notifications WHERE recipient='E101114FCS208' AND status='unseen';

INSERT INTO courseTopicRating (courseCode, session, topic, enrollmentID, topicRating) VALUES ('EL101', '2015-2016', 'Boolean algebra and minimization techniques', 'U101114FCS222', '5');

INSERT INTO courseSubtopicRating (courseCode, session, topic, subtopic, enrollmentID, subtopicRating) VALUES ('EL101', '2015-2016', 'Complement notations and Binary codes', '10s complement', 'U101114FCS222', '5');

SELECT faculty.name FROM faculty,facultyCoursesConducting 
WHERE facultyCoursesConducting.courseCode='CS201' AND facultyCoursesConducting.employeeID = faculty.employeeID;

SELECT topicRating FROM courseTopicRating WHERE courseCode='EL101' AND session='2015-2016' AND topic='Analog & Digital signals and Number system' AND enrollmentID='U101114FCS203';

SELECT subtopicRating FROM courseSubtopicRating WHERE courseCode='El101' AND session='2015-2016' AND topic='Analog & Digital signals and Number system' AND subtopic='1s complement' AND enrollmentID='U101114FCS203';

UPDATE courseTopicRating SET topicRating='2' WHERE courseCode='EL101' AND session='2015-2016' AND topic='Analog & Digital signals and Number system' and enrollmentID='U101114FCS253';

SELECT AVG(subtopicRating) AS AVG FROM courseSubtopicRating WHERE courseCode='EL101' AND session='2015-2016' AND topic='Complement notations and Binary codes' and enrollmentID='U101114FCS222';

INSERT INTO courseSubtopicRating (courseCode, session, topic, subtopic, enrollmentID, subtopicRating, subtopicRatingTimestamp) VALUES ('EL101', '2015-2016', 'Analog & Digital signals and Number system', 'Binary number system', 'U101114FCS222', '3', '2016-10-26 13:25:20');

SELECT AVG(topicRating) AS AVG FROM courseTopicRating WHERE courseCode='EL101' AND session='2015-2016' AND topic='Analog & Digital signals and Number system';

SELECT AVG(subtopicRating) AS AVG FROM courseSubtopicRating WHERE courseCode='EL101' AND session='2015-2016' AND topic='Analog & Digital signals and Number system' AND subtopic='Binary number system';