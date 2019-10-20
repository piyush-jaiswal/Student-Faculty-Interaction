
//For calling rateTopics when the student enters the rating
function callRateTopics(courseCode, topic, enrollmentID, topicRated, e) {

    //alert("yo");
    var topicRating = e.value;
    topic = encodeURI(topic); //encoding the topic to include spaces and special characters when sending through ajax

    $.ajax({
        url: "../student/student_editDatabase.php",
        type: "POST",
        data: {method:'rateTopics', courseCode:courseCode, topic:topic, enrollmentID:enrollmentID, topicRating:topicRating, topicRated:topicRated},
        /*success: function(output) {
           window.alert(output);
        }*/
    });
}


//For calling rateSubtopics when the student enters the rating
function callRateSubtopics(courseCode, topic, subtopic, enrollmentID, subtopicRated, e) {
    
    var subtopicRating = e.value;
    topic = encodeURI(topic); //encoding the topic to include spaces and special characters when sending through ajax
    subtopic = encodeURI(subtopic); //encoding the subtopic to include spaces and special characters when sending through ajax

    $.ajax({
        url: "../student/student_editDatabase.php",
        type: "POST",
        data: {method:'rateSubtopics', courseCode:courseCode, topic:topic, subtopic:subtopic, enrollmentID:enrollmentID, subtopicRating:subtopicRating, subtopicRated:subtopicRated},
        
        success: function(output) {
            
            topic = decodeURI(topic); //This will again get encoded when sent to callUpdateSubtopicStatus
            var radio = document.createElement('input');
            radio.type = "radio";
            radio.value = output[0];

            //If the output length is = 2, means true since for false length=1
            var topicRated = false;
            if(output.length == 2)
                topicRated = true;
            
            //Changing the rating of the topic based on the rating of subtopics, hence no need of refresing the page
            $(e).closest('.topic_and_subtopic').find('.rating-system').first().find('input:checked').prop("checked", "");
            $(e).closest('.topic_and_subtopic').find('.rating-system').first().find("input[value=" + radio.value + "]").prop("checked", "checked");
            
            callRateTopics(courseCode, topic, enrollmentID, topicRated, radio); //For inserting or updating the rating of the related topic
        }
    });
}
