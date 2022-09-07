<style>
    body {font-family: "Lato", sans-serif}
    .mySlides {display: none}
</style>

<!-- Page content -->
<div class="w3-content">
    <!-- Automatic Slideshow Images -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?php echo URL . 'public/images/pubg/pubg.jpg' ?>">
            </div>

            <div class="item">
                <img ng-src="<?php echo URL . 'public/images/pubg/pubg.jpg' ?>">
            </div>

            <div class="item">
                <img ng-src="<?php echo URL . 'public/images/pubg/pubg.jpg' ?>">       
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- The Band Section -->
    <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
        <h2 class="w3-wide">RULES AND REGULATION PUBG MOBILE.</h2>
        <p class="w3-opacity"><i>TECHFIESTA 2K18.</i></p>
        <ul>
            <li style="text-align:left;">Registration for PUBG will done online only.</li>
            <li style="text-align:left;">Only registered members are allowed to participate in PUBG Mobile Event.Registration for pubg mobile will start from <b>24 NOV 2018 </b>and will end on <b>27 NOV 2018</b>.It will be played in total of three round on <b>28 and 29 NOV 2018</b>.</li>
            <li style="text-align:left;">Only squad are allowed to participate in this event.</li>
            <li style="text-align:left;">Only android devices are allowed to play PUBG Mobile in this event. </li>
            <li style="text-align:left;">No pc emulator and third party app will allowed which increases the graphics quality or frame rate like gfx toos.Each team will get spectated,if any team found hacking or any type of cheating whole squad will be disqualified. </li>
            <li style="text-align:left;">Every team have to register their details like character name,character id etc through website.</li>
            <li style="text-align:left;">Every match will be played in Classic(Erangel).</li>
            <li style="text-align:left;">Event coordinator will not be responsible if any player get kill due to freezing of his mobile or any other device problem.He will be responsible himself.</li>
            <li style="text-align:left;">If any player get kill due to higher ping.Event coordinator are not responsible,so each team are recommended to test their network before starting the game.</li>
            <li style="text-align:left;">Event coordinator will decide how many team will get selected for the second round according to number of participant.</li>
            <li style="text-align:left;">Each kill will get 5 points and those team which will get chicken dinner will be awarded with extra 15 points.</li>
            <li style="text-align:left;">Team with Higher point will go to the next round.And the last runner up  will be the winner.</li> 
            <li style="text-align:left;">If two team or more than two gets same point then the team with higher survival time will get selected.</li>
            <li style="text-align:left;">Points of each team and those who are selected for next round will be displayed in the website or whatsapp group.</li>
            <li style="text-align:left;">If any other rule get implimented it will be updated in the website so keep in touch with the website.</li>
        </ul>

    </div>

    <!-- The Tour Section -->
    <div class="w3-black" id="tour">
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
            <h2 class="w3-wide w3-center">TEAM DETAILS</h2>
            <p class="w3-opacity w3-center"><i>For Participating In PUBG</i></p><br>

            <form action="/action_page.php">
                <div class="form-group">
                    <label for="Teamname">Team name:</label>
                    <input type="text" class="form-control" id="">
                </div>
                <h4>MEMBER DETAILS.</h4>
                <div class="form-group">
                    <label for="">First member name:</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Second member name:</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Third member name:</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Fourth member name:</label>
                    <input type="text" class="form-control" id="">
                </div>
                <h4>PUBG PROFILE DETAILS OF EACH MEMBER.</h4>
                <div class="form-group">
                    <label for="">First member PUBG character Name:</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Second member PUBG character Name:</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Third member PUBG character Name:</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Fourth member PUBG character Name:</label>
                    <input type="text" class="form-control" id="">
                </div>
                <h4>PUBG CHARACTER ID OF EACH MEMBER.</h4>
                <div class="form-group">
                    <label for="">First member PUBG character ID:</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Second member PUBG character ID:</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Third member PUBG character ID:</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Fourth member PUBG character ID:</label>
                    <input type="text" class="form-control" id="">
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>


        </div>
    </div>
    <!-- The Contact Section -->
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
        <h2 class="w3-wide w3-center">CONTACT</h2>
        <p class="w3-opacity w3-center"><i>Fan? Drop a note!</i></p>
        <div class="w3-row w3-padding-32">
            <div class="w3-col m6 w3-large w3-margin-bottom">
                <i class="fa fa-map-marker" style="width:30px"></i> Ramgarh Engineering College,Ramgarh.<br>
                <i class="fa fa-phone" style="width:30px"></i> Phone:8102030310,7004815962<br>
                <i class="fa fa-envelope" style="width:30px"> </i> Email:premmshankarr@gmail.com<br>
            </div>
            <div class="w3-col m6">
                <form action="/action_page.php" target="_blank">
                    <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
                        </div>
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                        </div>
                    </div>
                    <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
                    <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
                </form>
            </div>
        </div>
    </div>

    <!-- End Page Content -->
</div>
