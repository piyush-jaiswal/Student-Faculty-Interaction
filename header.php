

<body>
    <div class="outer-border">
        <div class="inner-padding">
            <div class="container-fluid">
                <div class="row" style="background-color: #e3dfd4">
                    <div class="col-md-12">
                        <p id="head">You are logged in as <a href="#"><?php echo $name; ?></a> | <a href="return_to_moodle.php">Return back to moodle</a> |</p>
                    </div>
                </div>

                <div class="row" style="background-color: #e3dfd4">
                    <div class="col-md-4 col-sm-5 col-xs-7"><img id="logo" src="/images/logo.png" alt="NU-logo" /></div>
                    <div class="col-md-8 col-sm-7 col-xs-5">
                        <h1 id="portal-name"><b>Student-Faculty Interaction Portal</b></h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr style="border-top: 1px solid darkslategrey; margin-top: 0px; margin-bottom: 0px;" />
                </div>
            </div>

            <div class="container-fluid">
                <div class="row" style="background-color: #c3bca9">
                    <div class="col-md-1 col-xs-2">
                        <a href="#">
                            <h4>Home</h4>
                        </a>
                    </div>
                    <div class="col-md-1 col-xs-2">
                        <a href="#">
                            <h4>Back</h4>
                        </a>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <a href="#" id="myBtn" >
                            <h4>Request Meeting</h4>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <div class="dropnotificationdown">
                            <img class="dropnotification" id="notification" src="/images/notification.png" alt="Notification" onclick="shownotificationFunction()"/>
                            <div id="mydropnotificationdown" class="dropnotificationdown-content">
                                <?php 
                                    foreach($notifications as $row) {
                                        echo "<a href='#home' id='AcceptBtn'><b>$row[blurb]</b></a>";
                                    }
                                ?>


                                <div id="acceptMeetingModal" class="modal">

                                                <!-- Modal content -->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <span class="closeme" style:"color: white;float: right;font-size: 28px;font-weight: bold;">&#9747;</span>
                                                    <h2 style="color:white;">Message</h2>
                                                    </div>
                                                    
                                                        <br>
                                                        <b>From:</b> <input type="text" name="receiver" value="z" class=shorttxt disabled><br>
                                                        <br>
                                                        <b>Subject:</b> <input type="text" name="Subject" value="z" class=shorttxt disabled><br>
                                                        <br>
                                                        <b>Message:</b> <br><textarea rows=6 cols=80 name="message" wrap=soft class=bigtxt disabled>z</textarea><br>
                                                        <br>
                                                        <button id=acceptMeeting onclick="ActivateDateTime()">Accept</button>
                                                        <button id=RejectMeeting>Cancel</button>
                                                        <br>
                                                        <form class="modal-body" id="Acceptanceform" name="acceptForm" action="" onsubmit="return validateAcceptanceForm()" method="POST" style="Display:none;">
                                                        <lable><b>Date:</b></label><input type="date" name="Date" id=MeetingDate> <br>
                                                        <br>
                                                        <lable><b>Time:</b></label>
                                                                <select name="Hour">
                                                                    <option value="hr">hour</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                </select>

                                                                <select name="Min">
                                                                    <option value="min">min</option>
                                                                    <option value="0">0</option>
                                                                    <option value="10">10</option>
                                                                    <option value="20">20</option>
                                                                    <option value="30">30</option>
                                                                    <option value="40">40</option>
                                                                    <option value="50">50</option>
                                                                </select>

                                                                <select name="am">
                                                                    <option value="AM">AM</option>
                                                                    <option value="PM">PM</option>
                                                                </select>

                                                        <br>
                                                        <br>
                                                        <input type="submit" value="Send Request" id=sendmessage >    
                                                    </form>
                                                </div>

                                                </div>






                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                    <span class="close"> &#9747; </span>
                    <h2 style="color:white;">Message</h2>
                    </div>
                    <form class="modal-body" name="myForm" onsubmit="return validateForm()" method="POST">
                        <br>
                        <b>TO:</b> <input type="text" name="receiver" placeholder="Username" id='shorttxt' style="width:60%"><br>
                        <br>
                        <b>Subject:</b><input type="text" name="subject" PLACEHOLDER="Subject of your message" id='shorttxt' style="width:60%" maxlength="100"><br>
                        <br>
                        <b >Message:</b> <br><textarea rows=6 cols=100 name="message" placeholder="Your message" wrap='soft' id='bigtxt' maxlength="500"></textarea><br>
                        <br>
                        <input type="submit" value="Send Request" id='sendmessage' >    
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <hr style="border-top: 1px solid darkslategrey; margin-top: 0px; margin-bottom: 0px;" />
                </div>
            </div>