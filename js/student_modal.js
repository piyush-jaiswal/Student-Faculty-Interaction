
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var btn1 = document.getElementById("sendmessage");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}



function validateForm() {
    var receiver = document.forms["myForm"]["receiver"].value;
    var subject = document.forms["myForm"]["subject"].value;
    var message = document.forms["myForm"]["message"].value;

    if (receiver == null || receiver == "") {
        alert("Name must be filled out");
        return false;
    }

    else if (subject == null || subject == "") {
            alert("subject must be filled out");
            return false;
    }

    else if (message == null || message == "") {
        alert("message must be filled out");
        return false;
    }


    else {
        receiver = encodeURI(receiver);
        subject = encodeURI(subject);
        message = encodeURI(message);

        //Sending meeting request through ajax
        $.ajax({
            url: "../student/student_editDatabase.php",
            type: "POST",
            data: {receiver:receiver, subject:subject, message:message},
            success: function(output) {
                if(!output) {
                    alert('No such user. Please type in the name correctly as seen in the profile');
                }

                else {
                    alert('Meeting request sent successfully!');
                }
            }
        });

        modal.style.display = "none";
        alert("Checking...");
    }

}




// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}