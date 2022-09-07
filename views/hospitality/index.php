<div class="row" ng-controller="hospitalityCtrl">
    <div class="col s12 m9 l10">
        <div class="container">
            <div id="introduction" class="section scrollspy">
                <h2 class="header">Introduction</h2>
                <div class="grey-text text-darken-3 lighten-3">
                    <h4>To register for accomodation, <a href="<?php echo hospitality ?>accomodation">Click here</a></h4>
                    <p>
                        Techfiesta has been an example in achieving huge feats with unparalleled figures ever since 2016. Techfiesta has grown in stature in terms of its content, infrastructure and logistics. The overwhelming crowd of such a high magnitude and a world-class technological display along with a tinge of enjoyment has made our dream a technological extravaganza.
                        With such vastness and diversity, the hospitality of the guests is of paramount importance.
                    </p>
                    <p>
                        We, at Techfeista, constantly strive towards the satisfaction of everyone. We shall leave no stone unturned in fulfilling the needs of a secure accommodation away from home. We strive to make your stay comfortable and your experience, a memorable one. Hospitality management would be one of the prime focuses of <strong>Team Techfiesta 3.0</strong>.
                    </p>
                    <p>
                        Hope to see you at <strong>Techfiesta 3.0</strong>. We will be more than happy to receive your suggestions and queries.
                    </p>
                </div>
            </div>
            <div id="accomodationcharges" class="section scrollspy">            
                <div class="grey-text text-darken-3 lighten-3">
                    <h4>Accomodation Charges</h4>
                    <p>Accommodation to the guest would be provided in the campus of <strong>Ramgarh Engineering College, Ramgarh</strong> and it will be purely on a shared basis. These facilities would be separate for girls and boys.</p>
                    <p>Charges for accommodation is free. Only mesh charges are payable which is INR 100 to 150 par day per head. This includes three times meal.</p>
                    <p>Accommodation facility would be made available from 5 PM on 26th of November, 2018 onwards and you would be required to vacate the room on or before 10 AM on 30th November, 2018.</p>

                </div>
            </div>
            <div id="register" class="section scrollspy">            
                <div class="grey-text text-darken-3 lighten-3">
                    <h4>Register</h4>
                    <p>Accomodation would be given after the registration.</p>
                    <p>To register, <a href="<?php echo hospitality ?>accomodation">Click here</a></p>
                </div>
            </div>
            <div id="contactus" class="section scrollspy">
                <h4>Cotact us</h4>
                <div class="row valign-wrapper" ng-repeat="member in members" ng-if="member.department.name=='hospitality'">
                    <div class="col s2">
                        <img ng-src="<?php echo URL; ?>{{member.member.images[0].source}}" alt="{{member.member.fName}}" class="circle responsive-img">
                    </div>
                    <div class="col s10">
                        <h5>{{member.member.fName}}</h5>
                        <p style="margin:0px">{{member.member.emails[0].email}}</p>
                        <p style="margin:0px">{{member.member.phones[0].phone}}</p>
                    </div>
                </div>
                <p>Contact us for any query, <a href="<?php echo support; ?>contact">Contact us</a></p>
            </div>
        </div>
    </div>
    <div class="col hide-on-small-only m3 l2">
        <ul class="section table-of-contents">
            <li><a href="#introduction">Introduction</a></li>
            <li><a href="#accomodationcharges">Accomodation Charges</a></li>
            <li><a href="#register">Register</a></li>
            <li><a href="#contactus">Contact us</a></li>
        </ul>
    </div>
</div>