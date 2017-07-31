
// Get the modal
var modal2 = document.getElementById('hisModal');


function topic_viewFrequency(courseCode, topic) {

    //alert(courseCode);
    //alert(topic);

    modal2.style.display = "block";

    $('#bar-five').css("width", 0);
    $('#bar-four').css("width", 0);
    $('#bar-three').css("width", 0);
    $('#bar-two').css("width", 0);
    $('#bar-one').css("width", 0);

    topic = encodeURI(topic); //encoding the topic to include spaces and special characters when sending through ajax

    $.ajax({
        url: "../faculty/faculty_editDatabase.php",
        type: "POST",
        data: {method:'topic_getFrequency', courseCode:courseCode, topic:topic},
        success: function(output) {
           //window.alert(output);

           var obj = JSON.parse(output);
           var sum = 0;
           //alert(obj.one)
           for(var key in obj) {

               var s = parseInt(obj[key]);
               sum+= s;
           }


        $('.bar span').hide();
        $('#bar-five').animate({
            width: obj.five/sum*100+'%' }, 1300);

        $('#bar-four').animate({
            width: obj.four/sum*100+'%' }, 1300);

        $('#bar-three').animate({
            width: obj.three/sum*100+'%' }, 1300);

        $('#bar-two').animate({
            width: obj.two/sum*100+'%' }, 1300);

        $('#bar-one').animate({
            width: obj.one/sum*100+'%' }, 1300);

        setTimeout(function() {
        $('.bar span').fadeIn('slow');
        }, 500);



        $('#bar-five span').text(obj.five);
        $('#bar-four span').text(obj.four);
        $('#bar-three span').text(obj.three);
        $('#bar-two span').text(obj.two);
        $('#bar-one span').text(obj.one);
        $('.rating-users').append("<i class='icon-user'></i>"+sum+" total");

        }
    });

}








function subtopic_viewFrequency(courseCode, topic, subtopic) {

    //alert('asd');

    modal2.style.display = "block";

    $('#bar-five').css("width", 0);
    $('#bar-four').css("width", 0);
    $('#bar-three').css("width", 0);
    $('#bar-two').css("width", 0);
    $('#bar-one').css("width", 0);

    topic = encodeURI(topic); //encoding the topic to include spaces and special characters when sending through ajax
    subtopic = encodeURI(subtopic); //encoding the subtopic to include spaces and special characters when sending through ajax

    $.ajax({
        url: "../faculty/faculty_editDatabase.php",
        type: "POST",
        data: {method:'subtopic_getFrequency', courseCode:courseCode, topic:topic, subtopic:subtopic},
        success: function(output) {
           //window.alert(output);

           var obj = JSON.parse(output);
           var sum = 0;
           //alert(obj.one)
           for(var key in obj) {

               var s = parseInt(obj[key]);
               sum+= s;
           }
           

        $('.bar span').hide();
        $('#bar-five').animate({
            width: obj.five/sum*100+'%' }, 1300);

        $('#bar-four').animate({
            width: obj.four/sum*100+'%' }, 1300);

        $('#bar-three').animate({
            width: obj.three/sum*100+'%' }, 1300);

        $('#bar-two').animate({
            width: obj.two/sum*100+'%' }, 1300);

        $('#bar-one').animate({
            width: obj.one/sum*100+'%' }, 1300);

        setTimeout(function() {
        $('.bar span').fadeIn('slow');
        }, 500);



        $('#bar-five span').text(obj.five);
        $('#bar-four span').text(obj.four);
        $('#bar-three span').text(obj.three);
        $('#bar-two span').text(obj.two);
        $('#bar-one span').text(obj.one);
        $('.rating-users').append("<i class='icon-user'></i>"+sum+" total");

        }
    });

}




        
// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("closeFre")[0];


// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
    modal2.style.display = "none";
    $('.rating-users').text("");
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
        $('.rating-users').text("");
    }
}