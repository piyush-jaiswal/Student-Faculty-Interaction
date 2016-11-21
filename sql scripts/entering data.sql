USE StudentFacultyInteraction;


#Entering values into student
INSERT INTO student VALUES('U101114FCS203', 'PIYUSH', 'piyush.jaiswal@st.niituniversity.in');
INSERT INTO student VALUES('U101114FCS222', 'RAJJAT CHHAJER', 'rajjat.chhajer@st.niituniversity.in');
INSERT INTO student VALUES('U101114FCS253', 'PRIYAMWAD PATHAK', 'priyamwad.pathak@st.niituniversity.in');
INSERT INTO student VALUES('U101114FCS212', 'SOMYA PAREEK', 'somya.pareek@st.niituniversity.in');


#Entering values into faculty
INSERT INTO faculty VALUES('E101114FCS236', 'VIKAS UPADHYAYA', 'vikas.upadhyaya@niituniversity.in', '8094240172', 'Logical Circuits');
INSERT INTO faculty VALUES('E101114FCS206', 'AMIT KUMAR', 'amit.kumar@niituniversity.in', '80942406592', 'Data Management');
INSERT INTO faculty VALUES('E101114FCS208', 'PROSENJIT GUPTA', 'prosenjit.gupta@niituniversity.in', '80942406552', 'Algorithms and GIS');


#Entering values into meetings
INSERT INTO meetings VALUES('PIYUSH JAISWAL', 'PROSENJIT GUPTA', 'Doubt in graphs', 'Pending', '2016-08-25');
INSERT INTO meetings VALUES('VIKAS UPADHYAYA', 'SOMYA PAREEK', 'Poor performance', 'Pending', '2016-10-25');
INSERT INTO meetings VALUES('PROSENJIT GUPTA', 'AMIT KUMAR', 'Regular Meeting', 'Pending', '2016-06-21');


#Entering values into courses
INSERT INTO courses VALUES('EL101', 'Digital Logic and Circuits', '3', '2015-16');
INSERT INTO courses VALUES('CS201', 'Design and Analysis of Algorithms', '4', '2016-16');
INSERT INTO courses VALUES('CS351', 'Compiler Design', '5', '2016-17');
INSERT INTO courses VALUES('CS223', 'Database Management System', '4', '2016-16');


#Entering values into studentCoursesEnrolled
INSERT INTO studentCoursesEnrolled VALUES('U101114FCS203', 'CS351', '5', '2016-17');
INSERT INTO studentCoursesEnrolled VALUES('U101114FCS203', 'CS201', '4', '2016-16');
INSERT INTO studentCoursesEnrolled VALUES('U101114FCS222', 'EL101', '3', '2015-16');
INSERT INTO studentCoursesEnrolled VALUES('U101114FCS253', 'EL101', '3', '2015-16');
INSERT INTO studentCoursesEnrolled VALUES('U101114FCS222', 'CS223', '4', '2016-16');


#Entering values into hodCoursesIncharge
INSERT INTO hodCoursesIncharge VALUES('E101114FCS208', 'CS201', '4', '2016-16');
INSERT INTO hodCoursesIncharge VALUES('E101114FCS208', 'CS351', '5', '2016-17');
INSERT INTO hodCoursesIncharge VALUES('E101114FCS208', 'CS223', '4', '2016-16');


#Entering values into facultyCoursesConducting
INSERT INTO facultyCoursesConducting VALUES('E101114FCS208', 'CS201', '4', '2016-16');
INSERT INTO facultyCoursesConducting VALUES('E101114FCS236', 'EL101', '3', '2015-16');
INSERT INTO facultyCoursesConducting VALUES('E101114FCS206', 'CS223', '4', '2016-16');


#Entering values into courseTopics
INSERT INTO courseTopics VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', 'Covered');
INSERT INTO courseTopics VALUES('EL101', '2015-16', 'Complement notations and Binary codes', 'Not Covered');
INSERT INTO courseTopics VALUES('EL101', '2015-16', 'Logic gates and Logic & Arithmetic operations', 'Not Covered');
INSERT INTO courseTopics VALUES('EL101', '2015-16', 'Boolean algebra and minimization techniques', 'Not Covered');
INSERT INTO courseTopics VALUES('EL101', '2015-16', 'Designing of Arithmetic Combinational circuits', 'Not Covered');


#Entering values into courseTopicLinks
INSERT INTO courseTopicLinks VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', 'http://www.diffen.com/difference/Analog_vs_Digital');
INSERT INTO courseTopicLinks VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', 'http://www.schoolelectronic.com/2012/01/difference-between-analog-and-digital.html');
INSERT INTO courseTopicLinks VALUES('EL101', '2015-16', 'Complement notations and Binary codes', 'http://www.tfinley.net/notes/cps104/twoscomp.html');
INSERT INTO courseTopicLinks VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', 'http://www.tfinley.net/notes/cps104/twoscomp.html');


#Entering values into courseTopicRating
INSERT INTO courseTopicRating VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', 'U101114FCS203', '4');
INSERT INTO courseTopicRating VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', 'U101114FCS222', '5');
INSERT INTO courseTopicRating VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', 'U101114FCS253', '3');


#Entering values into courseSubtopics
INSERT INTO courseSubtopics VALUES('EL101', '2015-16', 'Complement notations and Binary codes', '1s complement' , 'Covered');
INSERT INTO courseSubtopics VALUES('EL101', '2015-16', 'Complement notations and Binary codes', '2s complement' , 'Not Covered');
INSERT INTO courseSubtopics VALUES('EL101', '2015-16', 'Complement notations and Binary codes', '10s complement' , 'Not Covered');


#Entering values into courseSubtopicRating
INSERT INTO courseSubtopicRating VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', '1s complement', 'U101114FCS203', '4');
INSERT INTO courseSubtopicRating VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', '1s complement', 'U101114FCS222', '5');
INSERT INTO courseSubtopicRating VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', '1s complement', 'U101114FCS253', '3');


#Entering values into courseSubtopicLinks
INSERT INTO courseSubtopicLinks VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', '1s complement', 'https://en.wikipedia.org/wiki/Ones%27_complement');
INSERT INTO courseSubtopicLinks VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', '2s complement', 'http://academic.evergreen.edu/projects/biophysics/technotes/program/2s_comp.htm');
INSERT INTO courseSubtopicLinks VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', '2s complement', 'https://www.youtube.com/watch?v=u01imtvqsrU');
INSERT INTO courseSubtopicLinks VALUES('EL101', '2015-16', 'Analog & Digital signals and Number system', '10s complement', 'http://www.electrical4u.com/9s-complement-and-10s-complement/');


#Some editing of data
UPDATE courseTopics
SET topicStatus='Covered'
WHERE courseCode='EL101' and session='2015-16' and topic='Analog & Digital signals and Number system';