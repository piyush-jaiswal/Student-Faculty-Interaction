
//For calling topicStatus_Update when the topic checkbox is clicked
function callUpdateTopicStatus(topic, courseCode, e) {

    //window.alert('yo!');
    
    if (e.checked == true)
        var value = 'checked';
    else
        var value = 'notChecked';

    topic = encodeURI(topic); //encoding the topic to include spaces and special characters when sending through ajax

    //window.alert(courseCode);
    //window.alert(value);        
    //window.alert(topic);

    $.ajax({
        url: "../faculty/faculty_editDatabase.php",
        type: "POST",
        data: {method:'topicStatus_Update', topic:topic, value:value, courseCode:courseCode},
        /*success: function(output) {
           window.alert(output);
        }*/
    });
}



//For calling subtopicStatus_Update when the subtopic checkbox is clicked
function callUpdateSubtopicStatus(topic, subtopic, courseCode, e) {
    if (e.checked == true)
        var value = 'checked';
    else
        var value = 'notChecked';

    topic = encodeURI(topic); //encoding the topic to include spaces and special characters when sending through ajax
    subtopic = encodeURI(subtopic); //encoding the topic to include spaces and special characters when sending through ajax

    $.ajax({
        url: "../faculty/faculty_editDatabase.php",
        type: "POST",
        data: {method:'subtopicStatus_Update', topic:topic, subtopic:subtopic, value:value, courseCode:courseCode},
        success: function(output) { 

            topic = decodeURI(topic); //This will again get encoded when sent to callUpdateSubtopicStatus
            var checkbox = document.createElement('input');
            checkbox.type = "checkbox";
            checkbox.checked = output;
            
            //Changing the checked property of topic based on the subtopics(if checked or not). Thus no need of refreshing the page
            $(e).closest('.topic_and_subtopic').find('.topic_input').prop("checked", output);

            callUpdateTopicStatus(topic, courseCode, checkbox);
            
        }
    });
    
}
