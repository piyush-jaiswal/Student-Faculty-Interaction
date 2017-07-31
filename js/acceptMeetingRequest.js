
        // Get the modal
        var acceptMeetingmodal = document.getElementById('acceptMeetingModal');

        var accept = document.getElementById("acceptMeeting");

        var cancel = document.getElementById("RejectMeeting");

        var Acceptform = document.getElementById("Acceptanceform");

        // Get the <span> element that closes the modal
        var spanRequest = document.getElementsByClassName("closeme");

        var global_meetingID;

        function getDetails(meetingID) {

            //alert('yay');
            global_meetingID = meetingID;
            acceptMeetingmodal.style.display = "block";

            $.ajax({
            url: "../common_features.php",
            type: "POST",
            data: {method:'getNotificationDetail', meetingID:meetingID},
            
            success: function(output) {
                
                //window.alert(output);

                var obj = JSON.parse(output);

                //alert(obj.dateRequested);
                $('#requestDate').val(obj.dateRequested);
                $('#acceptMeetingModal [name="receiver"]').val(obj.sender);
                $('#acceptMeetingModal [name="Subject"]').val(obj.subject);
                $('#acceptMeetingModal [name="message"]').val(obj.reason);

            }
        });
        }


        accept.onclick = function() {
            Acceptform.style.display = "block";
        }

        cancel.onclick = function() {
            acceptMeetingmodal.style.display = "none";
            alert("Request canclled");
        }


        function validateAcceptanceForm() {

            //alert(global_meetingID);
           /* var x = document.forms["acceptMeetingModal"]["Date"].value;
            alert(x);
            //var y = document.forms["acceptMeetingModal"]["Time"].value;

            if (x == null || x == "") {
                alert("Date must be filled out");
                return false;
            }


            else { 
		        
                if (y == null || y == "") {
                	alert("Time must be filled out");
                	return false;
                }
                
                       else {*/

                           alert('asd');
                           alert(meetingID);

                           $.ajax({
                                url: "../common_features.php",
                                type: "POST",
                                data: {method:'acceptMeetingRequest', meetingID:global_meetingID, date:x, time:y},
                                
                                success: function(output) {
                                window.alert(output);
                                }
                            });

                            acceptMeetingmodal.style.display = "none";
                            alert("Request sent");
                            return true;
                        //}
            //}

        }

        // When the user clicks on <span> (x), close the modal
        for(var i=0;i<spanRequest.length;i++)
        {
                spanRequest[i].onclick = function() {
                    Acceptform.style.display= "none";
                    acceptMeetingmodal.style.display = "none";
                }
        }


        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == acceptMeetingmodal) {
                Acceptform.style.display= "none";
                acceptMeetingmodal.style.display = "none";
            }
        }