

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
                                        echo "<a href='#home'><b>$row[blurb]</b></a>";
                                    }
                                ?>
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
                    <h2>Message</h2>
                    </div>
                    <form class="modal-body" name="myForm" onsubmit="return validateForm()" method="POST">
                        <br>
                        <label><b>TO:</b></lable> <input type="text" name="receiver" placeholder="Username" id='shorttxt' style="width:60%"><br>
                        <br>
                        <label><b>Subject:</b></lable> <input type="text" name="subject" PLACEHOLDER="Subject of your message" id='shorttxt' style="width:60%" maxlength="100"><br>
                        <br>
                        <label><b >Message:</b></label> <textarea rows=6 cols=80 name="message" placeholder="Your message" wrap='soft' id='bigtxt' maxlength="500"></textarea><br>
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