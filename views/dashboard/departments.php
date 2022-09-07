<div ng-controller="dashboardDepartmentsCtrl">
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li><a class="btn-floating red modal-trigger" href="#modalAddDepartment"><i class="material-icons">add</i></a></li>
            <li><a class="btn-floating yellow red modal-trigger" href="#modalEditDepartment"><i class="material-icons">edit</i></a></li>
            <li><a class="btn-floating green " target="blank" href="<?php echo dashboard . 'getFiles/departments' ?>"><i class="material-icons">get_app</i></a></li>
        </ul>
    </div>

    <div class="row">
        <div class="input-field col s12 l3">
            <div class="switch">
                <label>
                    Ascending
                    <input type="checkbox" ng-model="sortSearchDepartment">
                    <span class="lever"></span>
                    Descending
                </label>
            </div>
        </div>
        <div class="input-field col s12 l6">
            <input ng-model="searchDepartment" type="text" placeholder="{{web.forms.search}}">
        </div>
        <div class="input-field col s12 l3">
            <select id="filterSearchEvent" name="filterSearchEvent" ng-model="filterSearchDepartment" required class="browser-default">
                <option value="" disabled selected>{{web.forms.selectoption}}</option>
                <option value="departmentId">Department ID</option>                        
                <option value="name">Depart Name</option>
                <option value="head.fName" >Department Head Name</option>
                <option value="addedOn" >Last Added</option>
                <option value="lastModifiedOn" >Last Modified</option>
            </select>
        </div>            
    </div>
    <div class="card horizontal" ng-repeat="department in departments| orderBy: sortSearchDepartment?'-' + filterSearchDepartment:filterSearchDepartment | filter:searchDepartment">
        <div class="card-image">
            <img ng-src="<?php echo URL; ?>{{department.image[0].source}}" alt="{{department.head.fName}}" class="responsive-img">
        </div>
        <div class="card-stacked">
            <div class="card-content">
                <h3 style="margin:0px;">{{department.name}}</h3>
                <p style="margin-bottom:2px;"><strong>#{{department.type}}</strong></p>
                <div class="row valign-wrapper">
                    <div class="col s3">
                        <img ng-src="<?php echo URL; ?>{{department.head.images[0].source}}" alt="{{department.head.fName}}" class="circle responsive-img">
                    </div>
                    <div class="col s9">
                        <h5>{{department.head.fName}}</h5>
                    </div>
                </div>
                <p style="margin:0px;">Last modified on <strong>{{department.lastModifiedOn}}</strong></p>
            </div>
        </div>
    </div>

    <div id="modalAddDepartment" class="modal bottom-sheet">
        <div ng-if="profile.permission.account && profile.type == 'superadmin'">
            <form name="frmDepartment" ng-submit="postDepartment(_department)">
                <div class="modal-content">
                    <h3>{{web.data.adddepartment}}</h3>
                    <div class="row">
                        <div class="input-field col s12 l3">
                            <input id="name" name="name" ng-model="_department.name" type="text" placeholder="{{web.forms.departmentname}}" class="validate" required>
                            <span class="helper-text red-text" ng-if="frmDepartment.name.$touched && frmDepartment.name.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="file-field input-field col s12 l3">
                            <div class="btn">
                                <span>{{web.forms.image}}</span>
                                <input type="file" id="image" name="image" ng-file="_department.image" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                            <span class="helper-text red-text" ng-if="frmDepartment.image.$touched && frmDepartment.image.$error.required">{{web.data.requiredfield}}</span> 
                        </div>                        
                        <div class="input-field col s12 l3">
                            <select id="type" name="type" ng-model="_department.type" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.departmenttype}}</option>
                                <option value="event">Event</option>
                                <option value="nonevent">Non Event</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmDepartment.type.$touched && frmDepartment.type.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l3">
                            <select id="headId" name="headId" ng-model="_department.headId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.departmenthead}}</option>
                                <option ng-repeat="user in users| orderBy:'fName'" ng-if="user.permission.account && (user.type == 'admin' || user.type == 'superadmin')" value="{{user.userId}}">{{user.fName}} [{{user.userId}}]</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmDepartment.headId.$touched && frmDepartment.headId.$error.required">{{web.data.requiredfield}}</span> 
                        </div>   
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l3">
                            <div ng-if="view.button.sendDepartment">
                                <input type="submit" value="{{web.actions.save}}"
                                       class="btn waves-effect waves-light"
                                       ng-disabled="!view.button.sendDepartment || frmDepartment.$pristine || frmDepartment.$invalid">
                            </div>
                            <div ng-if="!view.button.sendDepartment" class="preloader-wrapper small active">
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

    <div id="modalEditDepartment" class="modal bottom-sheet">
        <div ng-if="profile.permission.account && profile.type == 'superadmin'">
            <form name="frmEditDepartment" ng-submit="updateDepartment(__department)">
                <div class="modal-content">
                    <h3>{{web.data.changedepartment}}</h3>
                    <div class="row">
                        <div class="input-field col s12 l3">
                            <select id="headId" name="headId" ng-model="__department.departmentId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.departmentname}}</option>
                                <option ng-repeat="department in departments| orderBy:'name'" value="{{department.departmentId}}">{{department.name}}</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmEditDepartment.departmentId.$touched && frmEditDepartment.departmentId.$error.required">{{web.data.requiredfield}}</span> 
                        </div>  
                        <div class="input-field col s12 l3">
                            <input id="name" name="name" ng-model="__department.name" type="text" placeholder="{{web.forms.departmentname}}" class="validate" required>
                            <span class="helper-text red-text" ng-if="frmEditDepartment.name.$touched && frmEditDepartment.name.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l3">
                            <select id="type" name="type" ng-model="__department.type" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.departmenttype}}</option>
                                <option value="event">Event</option>
                                <option value="nonevent">Non Event</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmEditDepartment.type.$touched && frmEditDepartment.type.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l3">
                            <select id="headId" name="headId" ng-model="__department.headId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.departmenthead}}</option>
                                <option ng-repeat="user in users| orderBy:'fName'" ng-if="user.permission.account && (user.type == 'admin' || user.type == 'superadmin')" value="{{user.userId}}">{{user.fName}} [{{user.userId}}]</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmEditDepartment.headId.$touched && frmEditDepartment.headId.$error.required">{{web.data.requiredfield}}</span> 
                        </div>   
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l3">
                            <div ng-if="view.button.sendUpdateDepartment">
                                <input type="submit" value="{{web.actions.save}}"
                                       class="btn waves-effect waves-light"
                                       ng-disabled="!view.button.sendUpdateDepartment || frmEditDepartment.$pristine || frmEditDepartment.$invalid">
                            </div>
                            <div ng-if="!view.button.sendUpdateDepartment" class="preloader-wrapper small active">
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
</div>
