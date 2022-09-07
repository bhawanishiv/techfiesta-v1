<div ng-controller="dashboardEventsCtrl">
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li><a class="btn-floating red modal-trigger" href="#modalAddEvent"><i class="material-icons">add</i></a></li>
            <li><a class="btn-floating  blue modal-trigger" href="#modalEditEvent"><i class="material-icons">edit</i></a></li>
            <li><a class="btn-floating  orange modal-trigger" href="#modalAddEventDate"><i class="material-icons">event</i></a></li>
            <li><a class="btn-floating  purple modal-trigger" href="#modalAddEventVenue"><i class="material-icons">edit_location</i></a></li>
            <li><a class="btn-floating green " target="blank" href="<?php echo dashboard . 'getFiles/events' ?>"><i class="material-icons">get_app</i></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="input-field col s12 l3">
            <div class="switch">
                <label>
                    Ascending
                    <input type="checkbox" ng-model="sortSearchEvent">
                    <span class="lever"></span>
                    Descending
                </label>
            </div>
        </div>
        <div class="input-field col s12 l6">
            <input ng-model="searchEvent" type="text" placeholder="{{web.forms.search}}">
        </div>
        <div class="input-field col s12 l3">
            <select id="filterSearchEvent" name="filterSearchEvent" ng-model="filterSearchEvent" required class="browser-default">
                <option value="" disabled selected>{{web.forms.selectoption}}</option>
                <option value="eventId">Event ID</option>
                <option value="name">Event Name</option>
                <option value="head.fName" >Event Head Name</option>
                <option value="department.head.fName" >Department Head Name</option>
                <option value="addedOn" >Last Added</option>
                <option value="lastModifiedOn" >Last Modified</option>
            </select>
        </div>
    </div>
    <ul class="collapsible popout">
        <li ng-repeat="event in events| orderBy: sortSearchEvent?'-' + filterSearchEvent:filterSearchEvent | filter:searchEvent">
            <div class="collapsible-header">
                <div class="row valign-wrapper">
                    <div class="col s4">
                        <img ng-src="<?php echo URL; ?>{{event.image[0].source}}" alt="{{event.image[0].caption}}" class="responsive-img">
                    </div>
                    <div class="col s8">
                        <h5>{{event.name}} [{{event.department.name}}]</h5>
                        <p style="margin:0px;">Event head <strong>{{event.head.fName}}</strong></p>
                        <p style="margin:0px;">Department head <strong>{{event.department.head.fName}}</strong></p>
                    </div>
                </div>
            </div>
            <div class="collapsible-body">
                <h4>{{web.data.about}}</h4>
                <p>{{event.about}}</p>
                <h4>{{web.data.challenge}}</h4>
                <p>{{event.challenge}}</p>
                <a class="btn waves-effect waves-light" href="<?php echo URL; ?>{{event.file[1].source}}">{{web.actions.view}}</a>                        
            </div>
        </li>
    </ul>     

    <div id="modalAddEvent" class="modal bottom-sheet">
        <div ng-if="profile.permission.account && profile.type == 'superadmin'">
            <form name="frmAddEvent" validate ng-submit="postEvent(_event)">  .
                <div class="modal-content">
                    <h3>{{web.data.addevent}}</h3>
                    <div class="row">
                        <div class="input-field col s12 l2">
                            <select id="departmentId" name="departmentId" ng-model="_event.departmentId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.departmentname}}</option>
                                <option ng-repeat="department in departments" ng-if="department.type == 'event'" value="{{department.departmentId}}">{{department.name}}</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmAddEvent.departmentId.$touched && frmAddEvent.departmentId.$error.required">{{web.data.requiredfield}}</span> 
                        </div> 
                        <div class="input-field col s12 l3">
                            <input id="name" name="name" ng-model="_event.name" type="text" placeholder="{{web.forms.eventname}}" class="validate" required>
                            <span class="helper-text red-text" ng-if="frmAddEvent.name.$touched && frmAddEvent.name.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l3">
                            <select id="headId" name="headId" ng-model="_event.headId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.eventHead}}</option>
                                <option ng-repeat="user in users| orderBy:'fName'" ng-if="user.permission.account && (user.type == 'admin' || user.type == 'superadmin')" value="{{user.userId}}">{{user.fName}} [{{user.userId}}]</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmAddEvent.headId.$touched && frmAddEvent.headId.$error.required">{{web.data.requiredfield}}</span> 
                        </div>     
                        <div class="file-field input-field col s12 l2">
                            <div class="btn">
                                <span>{{web.forms.image}}</span>
                                <input type="file" id="image" name="image" ng-file="_event.image">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                            <span class="helper-text red-text" ng-if="frmAddEvent.image.$touched && frmAddEvent.image.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="file-field input-field col s12 l2">
                            <div class="btn">
                                <span>{{web.forms.file}}</span>
                                <input type="file" id="file" name="file" ng-file="_event.file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                            <span class="helper-text red-text" ng-if="frmAddEvent.file.$touched && frmAddEvent.file.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l6">
                            <textarea id="about" name="about" ng-model="_event.about" ng-minlength="10" class="materialize-textarea" required></textarea>
                            <label for="about">{{web.forms.about}}</label>
                            <span class="helper-text red-text" ng-if="frmAddEvent.about.$touched && frmAddEvent.about.$invalid">Should have minimum 10 characters</span> 
                            <span class="helper-text red-text" ng-if="frmAddEvent.about.$dirty && frmAddEvent.about.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l6">
                            <textarea id="challenge" name="challenge" ng-model="_event.challenge"  ng-minlength="10" class="materialize-textarea" required></textarea>
                            <label for="challenge">{{web.forms.challenge}}</label>
                            <span class="helper-text red-text" ng-if="frmAddEvent.challenge.$touched && frmAddEvent.challenge.$invalid">Should have minimum 10 characters</span> 
                            <span class="helper-text red-text" ng-if="frmAddEvent.challenge.$dirty && frmAddEvent.challenge.$error.required">{{web.data.requiredfield}}</span> 
                        </div>                              
                    </div>                  
                    <div class="row">
                        <div class="input-field col s12 l3">
                            <div ng-if="view.button.sendEvent">
                                <input type="submit" value="{{web.actions.save}}"
                                       class="btn waves-effect waves-light"
                                       ng-disabled="!view.button.sendEvent || frmAddEvent.$pristine || frmAddEvent.$invalid">
                            </div>
                            <div ng-if="!view.button.sendEvent" class="preloader-wrapper small active">
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
    
      <div id="modalEditEvent" class="modal bottom-sheet">
        <div ng-if="profile.permission.account && profile.type == 'superadmin'">
            <form name="frmEditEvent" validate ng-submit="updateEvent(__event)">  .
                <div class="modal-content">
                    <h3>{{web.data.addevent}}</h3>
                    <div class="row">
                        <div class="input-field col s12 l2">
                            <select id="eventId" name="eventId" ng-model="__event.eventId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.eventname}}</option>
                                <option ng-repeat="event in events" value="{{event.eventId}}">{{event.name}}</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmEditEvent.eventId.$touched && frmEditEvent.eventId.$error.required">{{web.data.requiredfield}}</span> 
                        </div> 
                        <div class="input-field col s12 l2">
                            <select id="departmentId" name="departmentId" ng-model="__event.departmentId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.departmentname}}</option>
                                <option ng-repeat="department in departments" value="{{department.departmentId}}">{{department.name}}</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmEditEvent.departmentId.$touched && frmEditEvent.departmentId.$error.required">{{web.data.requiredfield}}</span> 
                        </div> 
                        <div class="input-field col s12 l3">
                            <input id="name" name="name" ng-model="__event.name" type="text" placeholder="{{web.forms.eventname}}" class="validate" required>
                            <span class="helper-text red-text" ng-if="frmEditEvent.name.$touched && frmEditEvent.name.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l3">
                            <select id="headId" name="headId" ng-model="__event.headId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.eventHead}}</option>
                                <option ng-repeat="user in users| orderBy:'fName'" ng-if="user.permission.account && (user.type == 'admin' || user.type == 'superadmin')" value="{{user.userId}}">{{user.fName}} [{{user.userId}}]</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmEditEvent.headId.$touched && frmEditEvent.headId.$error.required">{{web.data.requiredfield}}</span> 
                        </div>     
                        <div class="file-field input-field col s12 l2">
                            <div class="btn">
                                <span>{{web.forms.file}}</span>
                                <input type="file" id="file" name="file" ng-file="__event.file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                            <span class="helper-text red-text" ng-if="frmEditEvent.file.$touched && frmEditEvent.file.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l6">
                            <textarea id="about" name="about" ng-model="__event.about" ng-minlength="10" class="materialize-textarea" required></textarea>
                            <label for="about">{{web.forms.about}}</label>
                            <span class="helper-text red-text" ng-if="frmEditEvent.about.$touched && frmEditEvent.about.$invalid">Should have minimum 10 characters</span> 
                            <span class="helper-text red-text" ng-if="frmEditEvent.about.$dirty && frmEditEvent.about.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l6">
                            <textarea id="challenge" name="challenge" ng-model="__event.challenge"  ng-minlength="10" class="materialize-textarea" required></textarea>
                            <label for="challenge">{{web.forms.challenge}}</label>
                            <span class="helper-text red-text" ng-if="frmEditEvent.challenge.$touched && frmEditEvent.challenge.$invalid">Should have minimum 10 characters</span> 
                            <span class="helper-text red-text" ng-if="frmEditEvent.challenge.$dirty && frmEditEvent.challenge.$error.required">{{web.data.requiredfield}}</span> 
                        </div>                              
                    </div>                  
                    <div class="row">
                        <div class="input-field col s12 l3">
                            <div ng-if="view.button.sendUpdateEvent">
                                <input type="submit" value="{{web.actions.save}}"
                                       class="btn waves-effect waves-light"
                                       ng-disabled="!view.button.sendUpdateEvent || frmEditEvent.$pristine || frmEditEvent.$invalid">
                            </div>
                            <div ng-if="!view.button.sendUpdateEvent" class="preloader-wrapper small active">
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


    <div id="modalAddEventDate" class="modal bottom-sheet">
        <div ng-if="profile.permission.account && profile.type == 'superadmin'">
            <form name="frmAddEventDate" ng-submit="postEventDate(_event)">
                <div class="modal-content">
                    <h3>{{web.data.addeventdate}}</h3>
                    <div class="row">
                        <div class="input-field col s12 l3">
                            <select id="eventId" name="eventId" ng-model="_event.eventId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.eventname}}</option>
                                <option ng-repeat="event in events" value="{{event.eventId}}">{{event.name}} [{{event.department.name}}]</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmAddEventDate.eventId.$touched && frmAddEventDate.eventId.$error.required">{{web.data.requiredfield}}</span> 
                        </div> 
                        <div class="input-field col s12 l2">
                            <input id="date" name="date" ng-model="_event.date" type="text" placeholder="{{web.forms.date}}"  class="datepicker"  required>
                            <span class="helper-text red-text" ng-if="frmAddEventDate.date.$touched && frmAddEventDate.date.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l3">
                            <input id="activity" name="activity" ng-model="_event.activity" type="text" placeholder="{{web.forms.activity}}" required>
                            <span class="helper-text red-text" ng-if="frmAddEventDate.activity.$touched && frmAddEventDate.activity.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s6 l2">
                            <input id="start" name="start" ng-model="_event.start" type="text" placeholder="{{web.forms.starttime}}" class="timepicker"  required>
                            <span class="helper-text red-text" ng-if="frmAddEventDate.start.$touched && frmAddEventDate.start.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s6 l2">
                            <input id="end" name="end" ng-model="_event.end" type="text"  placeholder="{{web.forms.endtime}}" class="timepicker"  required>
                            <span class="helper-text red-text" ng-if="frmAddEventDate.end.$touched && frmAddEventDate.end.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div ng-if="view.button.sendEventDate">
                                <input type="submit" value="{{web.actions.save}}"
                                       class="btn waves-effect waves-light"
                                       ng-disabled="!view.button.sendEventDate || frmAddEventDate.$pristine || frmAddEventDate.$invalid">
                            </div>
                            <div ng-if="!view.button.sendEventDate" class="preloader-wrapper small active">
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


    <div id="modalAddEventVenue" class="modal bottom-sheet">
        <div ng-if="profile.permission.account && profile.type == 'superadmin'">
            <form name="frmAddEventVenue" ng-submit="postEventDate(_event)">
                <div class="modal-content">
                    <h3>{{web.data.addeventdate}}</h3>
                    <div class="row">
                        <div class="input-field col s12 l3">
                            <select id="eventId" name="eventId" ng-model="_event.eventId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.eventname}}</option>
                                <option ng-repeat="event in events" value="{{event.eventId}}">{{event.name}} [{{event.department.name}}]</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmAddEventVenue.eventId.$touched && frmAddEventVenue.eventId.$error.required">{{web.data.requiredfield}}</span> 
                        </div> 
                        <div class="input-field col s12 l3">
                            <select id="activity" name="activity" ng-model="_event.activity" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.activity}}</option>
                                <option ng-repeat="date in eventActivities" value="{{date.activity}}">{{date.activity}}</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmAddEventVenue.activity.$touched && frmAddEventVenue.activity.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l3">
                            <input id="venue" name="venue" ng-model="_event.venue" type="text" placeholder="{{web.forms.venue}}" required>
                            <span class="helper-text red-text" ng-if="frmAddEventVenue.venue.$touched && frmAddEventVenue.venue.$error.required">{{web.data.requiredfield}}</span> 
                        </div>                         
                        <div class="input-field col s12 l3">
                            <div ng-if="view.button.sendEventVenue">
                                <input type="submit" value="{{web.actions.save}}"
                                       class="btn waves-effect waves-light"
                                       ng-disabled="!view.button.sendEventVenue || frmAddEventVenue.$pristine || frmAddEventVenue.$invalid">
                            </div>
                            <div ng-if="!view.button.sendEventVenue" class="preloader-wrapper small active">
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

