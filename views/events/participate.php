<div ng-controller="participationTeamCtrl">
    <div class="container">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Create Team</div>
                <div class="row">
                    <form name="frmParticipationTeam" validate ng-submit="postParticipantTeam(_team)">
                        <div class="input-field col s12 l6">
                            <select id="eventId" name="eventId" ng-model="_team.eventId" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.event}}</option>
                                <option ng-repeat="event in events" value="{{event.eventId}}">{{event.name}}</option>
                            </select>
                            <!--<label>{{web.forms.institute}}</label>-->
                            <span class="helper-text red-text" ng-if="frmParticipationTeam.instituteId.$touched && frmParticipationTeam.instituteId.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l6">
                            <input id="name" name="name" ng-model="_team.name" type="text" placeholder="Team Name" class="validate" required>
                            <span class="helper-text red-text" ng-if="frmParticipationTeam.branch.$touched && frmParticipationTeam.branch.$error.required">{{web.data.requiredfield}}. If you non higher educational student, give your class</span> 
                        </div>
                        <div class="row">
                            <div class="input-field col s16 l6">
                                <select id="memberId" name="memberId" ng-model="_team.memberId" required class="browser-default">
                                    <option value="" disabled selected>{{web.forms.member}}</option>
                                    <option ng-repeat="part in participation| filter:{'eventId':_team.eventId}" value="{{part.participant.userId}}">{{part.participant.fName}} [{{part.participant.userId}}]</option>
                                </select>
                                <!--<label>{{web.forms.institute}}</label>-->
                                <span class="helper-text red-text" ng-if="frmParticipationTeam.memberId.$touched && frmParticipationTeam.memberId.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                            <div class="input-field col s16 l6">
                                <input id="value" name="value" ng-model="_team.value" type="text" placeholder="Member User Name" class="validate" required>
                                <span class="helper-text red-text" ng-if="frmParticipationTeam.value.$touched && frmParticipationTeam.value.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                        </div>  
                        <div class="row">
                            <div class="input-field col s16 l6">
                                <select id="memberId" name="memberId" ng-model="_team.memberId" required class="browser-default">
                                    <option value="" disabled selected>{{web.forms.member}}</option>
                                    <option ng-repeat="part in participation| filter:{'eventId':_team.eventId}" value="{{part.participant.userId}}">{{part.participant.fName}} [{{part.participant.userId}}]</option>
                                </select>
                                <!--<label>{{web.forms.institute}}</label>-->
                                <span class="helper-text red-text" ng-if="frmParticipationTeam.memberId.$touched && frmParticipationTeam.memberId.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                            <div class="input-field col s16 l6">
                                <input id="value" name="value" ng-model="_team.value" type="text" placeholder="Member User Name" class="validate" required>
                                <span class="helper-text red-text" ng-if="frmParticipationTeam.value.$touched && frmParticipationTeam.value.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                        </div>  
                        <div class="row">
                            <div class="input-field col s16 l6">
                                <select id="memberId" name="memberId" ng-model="_team.memberId" required class="browser-default">
                                    <option value="" disabled selected>{{web.forms.member}}</option>
                                    <option ng-repeat="part in participation| filter:{'eventId':_team.eventId}" value="{{part.participant.userId}}">{{part.participant.fName}} [{{part.participant.userId}}]</option>
                                </select>
                                <!--<label>{{web.forms.institute}}</label>-->
                                <span class="helper-text red-text" ng-if="frmParticipationTeam.memberId.$touched && frmParticipationTeam.memberId.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                            <div class="input-field col s16 l6">
                                <input id="value" name="value" ng-model="_team.value" type="text" placeholder="Member User Name" class="validate" required>
                                <span class="helper-text red-text" ng-if="frmParticipationTeam.value.$touched && frmParticipationTeam.value.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                        </div>  
                        <div class="row">
                            <div class="input-field col s16 l6">
                                <select id="memberId" name="memberId" ng-model="_team.memberId" required class="browser-default">
                                    <option value="" disabled selected>{{web.forms.member}}</option>
                                    <option ng-repeat="part in participation| filter:{'eventId':_team.eventId}" value="{{part.participant.userId}}">{{part.participant.fName}} [{{part.participant.userId}}]</option>
                                </select>
                                <!--<label>{{web.forms.institute}}</label>-->
                                <span class="helper-text red-text" ng-if="frmParticipationTeam.memberId.$touched && frmParticipationTeam.memberId.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                            <div class="input-field col s16 l6">
                                <input id="value" name="value" ng-model="_team.value" type="text" placeholder="Member User Name" class="validate" required>
                                <span class="helper-text red-text" ng-if="frmParticipationTeam.value.$touched && frmParticipationTeam.value.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                        </div>  
                        <div class="row">
                            <div class="input-field col s16 l6">
                                <select id="memberId" name="memberId" ng-model="_team.memberId" required class="browser-default">
                                    <option value="" disabled selected>{{web.forms.member}}</option>
                                    <option ng-repeat="part in participation| filter:{'eventId':_team.eventId}" value="{{part.participant.userId}}">{{part.participant.fName}} [{{part.participant.userId}}]</option>
                                </select>
                                <!--<label>{{web.forms.institute}}</label>-->
                                <span class="helper-text red-text" ng-if="frmParticipationTeam.memberId.$touched && frmParticipationTeam.memberId.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                            <div class="input-field col s16 l6">
                                <input id="value" name="value" ng-model="_team.value" type="text" placeholder="Member User Name" class="validate" required>
                                <span class="helper-text red-text" ng-if="frmParticipationTeam.value.$touched && frmParticipationTeam.value.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                        </div>  
                        <div class="row">
                            <div class="input-field col s16 l6">
                                <select id="memberId" name="memberId" ng-model="_team.memberId" required class="browser-default">
                                    <option value="" disabled selected>{{web.forms.member}}</option>
                                    <option ng-repeat="part in participation| filter:{'eventId':_team.eventId}" value="{{part.participant.userId}}">{{part.participant.fName}} [{{part.participant.userId}}]</option>
                                </select>
                                <!--<label>{{web.forms.institute}}</label>-->
                                <span class="helper-text red-text" ng-if="frmParticipationTeam.memberId.$touched && frmParticipationTeam.memberId.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                            <div class="input-field col s16 l6">
                                <input id="value" name="value" ng-model="_team.value" type="text" placeholder="Member User Name" class="validate" required>
                                <span class="helper-text red-text" ng-if="frmParticipationTeam.value.$touched && frmParticipationTeam.value.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                        </div>  
                </div>  
                <div class="input-field col s12 l6">
                    <div ng-if="view.button.postParticipantTeam">
                        <input type="submit" value="{{web.actions.save}}"
                               class="btn waves-effect waves-light"
                               ng-disabled="!view.button.postParticipantTeam || frmParticipationTeam.$pristine || frmParticipationTeam.$invalid">
                    </div>  
                    <div ng-if="!view.button.postParticipantTeam" class="preloader-wrapper small active">
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
                </form>
            </div>
        </div>
    </div>
</div>
</div>