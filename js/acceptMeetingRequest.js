
        // Get the modal
        var acceptMeetingmodal = document.getElementById('acceptMeetingModal');

        // Get the button that opens the modal
        var acceptbtn = document.getElementById("AcceptBtn");

        var accept = document.getElementById("acceptMeeting");

        var cancel = document.getElementById("RejectMeeting");

        var Acceptform = document.getElementById("Acceptanceform");

        // Get the <span> element that closes the modal
        var spanRequest = document.getElementsByClassName("closeme")[0];

        // When the user clicks the button, open the modal

        acceptbtn.onclick = function() {
            acceptMeetingmodal.style.display = "block";
        }

        accept.onclick = function() {
            Acceptform.style.display = "block";
        }

        cancel.onclick = function() {
            acceptMeetingmodal.style.display = "none";
            alert("Request cancled");
        }


        function validateAcceptanceForm() {
            var x = document.forms["acceptMeetingModal"]["Date"].value;
            var y = document.forms["acceptMeetingModal"]["Time"].value;

            if (x == null || x == "") {
                alert("Date must be filled out");
                return false;
            }

            else 
		        if (y == null || y == "") {
                	alert("Time must be filled out");
                	return false;
                }
                       else {
                            acceptMeetingmodal.style.display = "none";
                            alert("Request sent");
                        }

        }

        // When the user clicks on <span> (x), close the modal
        spanRequest.onclick = function() {
            Acceptform.style.display= "none";
            acceptMeetingmodal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == acceptMeetingmodal) {
                Acceptform.style.display= "none";
                acceptMeetingmodal.style.display = "none";
            }
        }