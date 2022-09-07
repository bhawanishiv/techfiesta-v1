<div ng-controller="dashboardTeamCtrl">
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li><a class="btn-floating red modal-trigger" href="#modalAddTeam"><i class="material-icons">add</i></a></li>
            <li><a class="btn-floating yellow red modal-trigger" href="#modalEditTeam"><i class="material-icons">edit</i></a></li>
            <li><a class="btn-floating green " target="blank" href="<?php echo dashboard . 'getFiles/teamMembers' ?>"><i class="material-icons">get_app</i></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="input-field col s12 l3">                    
            <div class="switch">
                <label>
                    Ascending
                    <input type="checkbox" ng-model="sortSearchMember">
                    <span class="lever"></span>
                    Descending
                </label>
            </div>
        </div>
        <div class="input-field col s12 l6">
            <input ng-model="searchMember" type="text" placeholder="{{web.forms.search}}">
        </div>
        <div class="input-field col s12 l3">
            <select id="filterSearchEvent" name="filterSearchEvent" ng-model="filterSearchMember" required class="browser-default">
                <option value="" disabled selected>{{web.forms.selectoption}}</option>
                <option value="memberId">Member ID</option>
                <option value="member.fName">Member Name</option>
                <option value="member.type">Member Type</option>
                <option value="member.gender">Member Gender</option>
                <option value="member.department.departmentId">Department</option>
                <option value="role">Role</option>
                <option value="member.academics.institute.instituteId" >Academic Institute Name</option>
                <option value="member.academics.branch" >Academic Branch</option>
                <option value="member.academics.session" >Academic Session</option>
                <option value="addedOn" >Last Added</option>
                <option value="lastModifiedOn" >Last Modified</option>
            </select>
        </div>
    </div>
    <div ng-repeat="(category, _members) in members | groupBy:'department.name'">
        <h4>{{category}}</h4>
        <div class="card" ng-repeat="member in _members|  orderBy: sortSearchMember?'-' + filterSearchMember:filterSearchMember| filter:searchMember">
            <div class="card-content">
                <div class="row valign-wrapper">
                    <div class="col s2">
                        <img ng-src="<?php echo URL; ?>{{member.member.images[0].source}}" alt="{{member.member.fName}}" class="circle responsive-img">
                    </div>
                    <div class="col s10">
                        <h5>{{member.member.fName}}</h5>
                        <p style="margin-bottom:5px;"><strong>{{member.member.type}}</strong> | <strong>{{member.member.userId}}</strong> | <strong>{{member.member.gender}}</strong></p>
                        <div ng-if="member.member.academics">
                            <p style="margin:0px;">{{member.member.academics.branch}} ({{member.member.academics.session}})</p>
                            <h5 style="margin:0px;"><strong>{{member.member.academics.institute.name}}</strong></h5>
                            <p style="margin:0px;">{{member.member.academics.institute.address}}</p>
                        </div>
                        <p style="margin-top:5px;">Last modified on <strong>{{member.lastModifiedOn}}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="modalAddTeam" class="modal bottom-sheet">
        <div ng-if="profile.permission.account && (profile.type == 'superadmin' || profile.userId == 'TFUR00000008')">
            <form name="frmAddMember" ng-submit="postTeamMember(_team)">
                <div class="modal-content">
                    <h3>{{web.data.addmembers}}</h3>
                    <div class="row">
                        <div class="input-field col s12 l3">
                            <select id="departmentId" name="departmentId" ng-model="_team.departmentId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.departmentname}}</option>
                                <option ng-repeat="department in departments| orderBy:'name'" value="{{department.departmentId}}">{{department.name}}</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmAddMember.departmentId.$touched && frmAddMember.departmentId.$error.required">{{web.data.requiredfield}}</span> 
                        </div> 
                        <div class="input-field col s12 l3">
                            <select id="memberId" name="memberId" ng-model="_team.memberId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.member}}</option>
                                <option ng-repeat="user in users| orderBy:'fName'" ng-if="user.permission && (user.type == 'admin' || user.type == 'superadmin')" value="{{user.userId}}">{{user.fName}} [{{user.userId}}]</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmAddMember.memberId.$touched && frmAddMember.memberId.$error.required">{{web.data.requiredfield}}</span> 
                        </div> 
                        <div class="input-field col s12 l3">
                            <input id="role" name="role" ng-model="_team.role" type="text" placeholder="{{web.forms.role}}" >
                            <span class="helper-text red-text" ng-if="frmAddMember.role.$touched && frmAddMember.role.$nvalid">{{web.data.invaliddata}}</span> 
                        </div>
                        <div class="input-field col s12 l3">
                            <div ng-if="view.button.sendTeamMember">
                                <input type="submit" value="{{web.actions.save}}"
                                       class="btn waves-effect waves-light"
                                       ng-disabled="!view.button.sendTeamMember || frmAddMember.$pristine || frmAddMember.$invalid">
                            </div>
                            <div ng-if="!view.button.sendTeamMember" class="preloader-wrapper small active">
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
            </form>
        </div>
    </div>




    <div class="card" ng-if="profile.permission.account && (profile.type == 'superadmin' || profile.userId == 'TFUR00000008')">
        <div class="card-content">
            <div class="card-title">{{web.data.addmembers}}</div>
            <form name="frmAddMember" ng-submit="postTeamMember(_team)">
                <div class="row">
                    <div class="input-field col s12 l4">
                        <select id="departmentId" name="departmentId" ng-model="_team.departmentId" required class="browser-default">
                            <option value="" disabled selected>{{web.forms.departmentname}}</option>
                            <option ng-repeat="department in departments| orderBy:'name'" value="{{department.departmentId}}">{{department.name}}</option>
                        </select>
                        <!--<label>{{web.forms.event}}</label>-->
                        <span class="helper-text red-text" ng-if="frmAddMember.departmentId.$touched && frmAddMember.departmentId.$error.required">{{web.data.requiredfield}}</span> 
                    </div> 
                    <div class="input-field col s12 l4">
                        <select id="memberId" name="memberId" ng-model="_team.memberId" required class="browser-default">
                            <option value="" disabled selected>{{web.forms.member}}</option>
                            <option ng-repeat="user in users| orderBy:'fName'" ng-if="user.permission && (user.type == 'admin' || user.type == 'superadmin')" value="{{user.userId}}">{{user.fName}} [{{user.userId}}]</option>
                        </select>
                        <!--<label>{{web.forms.event}}</label>-->
                        <span class="helper-text red-text" ng-if="frmAddMember.memberId.$touched && frmAddMember.memberId.$error.required">{{web.data.requiredfield}}</span> 
                    </div> 
                    <div class="input-field col s12 l4">
                        <input id="role" name="role" ng-model="_team.role" type="text" placeholder="{{web.forms.role}}" >
                        <span class="helper-text red-text" ng-if="frmAddMember.role.$touched && frmAddMember.role.$nvalid">{{web.data.invaliddata}}</span> 
                    </div>
                    <div class="input-field col s12 l4">
                        <div ng-if="view.button.sendTeamMember">
                            <input type="submit" value="{{web.actions.save}}"
                                   class="btn waves-effect waves-light"
                                   ng-disabled="!view.button.sendTeamMember || frmAddMember.$pristine || frmAddMember.$invalid">
                        </div>
                        <div ng-if="!view.button.sendTeamMember" class="preloader-wrapper small active">
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
            </form>
        </div>
    </div>
</div>
