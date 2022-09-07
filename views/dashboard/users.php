<div ng-controller="dashboardUsersCtrl">
    <div class="row">
        <div class="input-field col s12 l3">
            <div class="switch">
                <label>
                    Ascending
                    <input type="checkbox" ng-model="sortSearchUser">
                    <span class="lever"></span>
                    Descending
                </label>
            </div>
        </div>
        <div class="input-field col s12 l6">
            <input ng-model="searchUser" type="text" placeholder="{{web.forms.search}}">
        </div>
        <div class="input-field col s12 l3">
            <select id="filterSearchEvent" name="filterSearchEvent" ng-model="filterSearchUser" required class="browser-default">
                <option value="" disabled selected>{{web.forms.selectoption}}</option>
                <option value="userId">User ID</option>
                <option value="fName">User Name</option>
                <option value="type">User Type</option>
                <option value="gender">Gender</option>
                <option value="academics.institute.instituteId" >Academic Institute Name</option>
                <option value="academics.branch" >Academic Branch</option>
                <option value="academics.session" >Academic Session</option>
                <option value="verficiation.account" >Account Verification</option>
                <option value="addedOn" >Last Added</option>
                <option value="lastModifiedOn" >Last Modified</option>
            </select>
        </div>
    </div>
    <div class="card-panel" ng-repeat="user in users| orderBy: sortSearchUser?'-' + filterSearchUser:filterSearchUser | filter:searchUser" ng-class="user.permission.account == 'true' ? '' : 'red lighten-1'" ng-if="profile.type == 'superadmin' || (profile.type == 'admin' && user.type !== 'superadmin')">
        <div class="row valign-wrapper">
            <div class="col s3">
                <img ng-src="<?php echo URL; ?>{{user.images[0].source}}" alt="{{user.fName}}" class="circle responsive-img">
            </div>
            <div class="col s9">
                <h4>{{user.fName}}</h4>
                <p><strong>{{user.type}}</strong> | <strong>{{user.userId}}</strong> | <strong>{{user.gender}}</strong><i ng-if="user.verification.account == 'true'" class="material-icons left">done</i></p>
                <p class="black-text" ng-repeat="email in user.emails"><i ng-if="email.type == 'default'" class="material-icons left">verified_user</i><strong>{{email.email}}</strong></p>
                <p ng-repeat="phone in user.phones"><i ng-if="phone.type == 'default'" class="material-icons left">verified_user</i><strong>{{phone.phone}}</strong></p>
                <p style="margin:0px;">Last modified on <strong>{{user.lastModifiedOn}}</strong></p>
                <div ng-if="user.academics">
                    <p style="margin-bottom:5px;">{{user.academics.branch}} ({{user.academics.session}})</p>
                    <h5 style="margin:0px;"><strong>{{user.academics.institute.name}}</strong></h5>
                    <p style="margin:0px;">{{user.academics.institute.address}}</p>
                </div> 
            </div>
        </div>
        <div class="card-action">
            <button class="btn" ng-if="view.button.toggleUserPermission"  ng-disabled="!view.button.toggleUserPermission" ng-click="toggleUserPermission(user.userId)" ng-if="profile.type == 'superadmin' || (profile.type == 'admin' && (user.type !== 'superadmin' && user.type !== 'admin'))">{{user.permission.account=='true'?web.actions.block:web.actions.unblock}}</button>
            <div ng-if="!view.button.toggleUserPermission" class="preloader-wrapper small active">
                <div class="spinner-layer spinner-green-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <button class="btn" ng-if="view.button.toggleUserType" ng-disabled="!view.button.toggleUserType" ng-click="toggleUserType(user.userId)" ng-if="profile.type == 'superadmin' || (profile.type == 'admin' && (user.type !== 'superadmin' && user.type !== 'admin'))">{{(user.type == 'admin'|| user.type=='superadmin')?web.actions.removefromadmin:web.actions.makeadmin}}</button>
            <div ng-if="!view.button.toggleUserType" class="preloader-wrapper small active">
                <div class="spinner-layer spinner-green-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
