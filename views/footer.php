<footer class="page-footer grey darken-4" ng-controller="footerCtrl" ng-cloak>
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">About Techfiesta</h5>
                <p class="grey-text text-lighten-4"><strong>Techfiesta</strong> is annual science and technology fest of Ramgarh Engineering College, Conceived in 2016, 2017 as a platform for engineering students to 
                    showcase their skills and knowledge in fun, practical and innovative ways. Previous edition of techfiesta saw participation from different 
                    colleges in jharkhand. Techfiesta 2k18 will continue to expand on the success of previous editions and create milestones of its own.   </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="<?php echo about; ?>">{{web.data.about}}</a></li>
                    <li><a class="grey-text text-lighten-3" href="<?php echo events; ?>">{{web.data.events}}</a></li>
                    <li><a class="grey-text text-lighten-3" href="<?php echo hospitality; ?>">{{web.data.hospitality}}</a></li>
                    <li><a class="grey-text text-lighten-3" href="<?php echo support . 'contact/'; ?>">{{web.data.contactus}}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            {{web.data.copyright}} &copy <?php echo date("Y"); ?>&nbsp;{{web.organization.name}}, Developed by the Team <strong>Techfiesta 3.0</strong>

            <a ng-repeat="sm in web.socialMedia" ng-if="sm.visible" href="{{sm.link}}" class="grey-text text-lighten-4 right" style="margin:5px;"><i class="pr-com-icons">{{sm.ligature}}</i></a>
        </div>
    </div>
</footer>

