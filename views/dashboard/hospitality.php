<div ng-controller="dashboardHospitalityCtrl">
    <div class="input-field col s12 l3">
        <input ng-model="searchAccomodation" type="text" placeholder="{{web.forms.search}}">
    </div>
    <div  class="card" ng-repeat="accomodation in accomodations| filter: searchAccomodation | orderBy:'fName'" ng-class="accomodation.allowed !== 'true' ? 'red lighten-1' : ''">
        <div class="card-content">
            <div class="row valign-wrapper">
                <div class="col s2">
                    <img ng-src="<?php echo URL; ?>{{accomodation.user.images[0].source}}" alt="{{accomodation.user.fName}}" class="circle responsive-img">
                </div>
                <div class="col s10">
                    <h5>{{accomodation.user.fName}}</h5>
                    <p style="margin:0px;"><strong>{{accomodation.user.userId}}</strong> {{accomodation.user.gender}}</p>
                    <div ng-if="accomodation.user.academics">
                        <p style="margin-top:5px;">{{accomodation.user.academics.branch}} ({{accomodation.user.academics.session}})</p>
                        <h5 style="margin:0px;"><strong>{{accomodation.user.academics.institute.name}}</strong></h5>
                        <p style="margin-bottom:5px;">{{accomodation.user.academics.institute.address}}</p>
                    </div>
                    <div class="row valign-wrapper" ng-if="accomodation.allowed == 'true'">
                        <div class="col s2">
                            <img ng-src="<?php echo URL; ?>{{accomodation.allowedBy.images[0].source}}" alt="{{accomodation.allowedBy.fName}}" class="circle responsive-img">
                        </div>
                        <div class="col s10">
                            <h5 style="margin:0px;">{{accomodation.allowedBy.fName}}</h5>
                            <p style="margin:0px;"><strong>{{accomodation.allowedBy.userId}}</strong></p>
                        </div>
                    </div>
                    <p>Last modified on <strong>{{accomodation.lastModifiedOn}}</strong></p>
                </div>
            </div>
        </div>
        <div class="card-action">
            <button class="btn" ng-disabled="!view.button.toggleAccomodationAllowance" ng-click="toggleAccomodationAllowance(accomodation.accomodationId)" >{{accomodation.allowed=='true'?'Disallow':'Allow'}}</button>                    
        </div>
    </div>
</div>
