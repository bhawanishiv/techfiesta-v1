<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
        <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
        <li><a class="btn-floating green " target="blank" href="<?php echo dashboard . 'getFiles/participation' ?>"><i class="material-icons">get_app</i></a></li>
    </ul>
</div>
<div class="row">
    <div class="input-field col s12 l3">
        <div class="switch">
            <label>
                Ascending
                <input type="checkbox" ng-model="sortSearchParticipation">
                <span class="lever"></span>
                Descending
            </label>
        </div>
    </div>
    <div class="input-field col s12 l6">
        <input ng-model="searchParticipation" type="text" placeholder="{{web.forms.search}}">
    </div>
    <div class="input-field col s12 l3">
        <select id="filterSearchEvent" name="filterSearchEvent" ng-model="filterSearchParticipation" required class="browser-default">
            <option value="" disabled selected>{{web.forms.selectoption}}</option>
            <option value="participatoinId">Participation ID</option>
            <option value="participant.fName">Participant Name</option>
            <option value="participant.type">Participant Type</option>
            <option value="participant.gender">Participant Gender</option>
            <option value="participant.academics.institute.instituteId" >Academic Institute Name</option>
            <option value="participant.academics.branch" >Academic Branch</option>
            <option value="participant.academics.session" >Academic Session</option>
            <option value="event.eventId" >Event</option>
            <option value="event.department.departmentId" >Department</option>
            <option value="agreement" >Agreement</option>
            <option value="addedOn" >Last Added</option>
            <option value="lastModifiedOn" >Last Modified</option>
        </select>
    </div>
</div>
<div class="card-panel" ng-repeat="part in participation| orderBy: sortSearchParticipation?'-' + filterSearchParticipation:filterSearchParticipation | filter:searchParticipation">
    <div class="row valign-wrapper">
        <div class="col s2">
            <img ng-src="<?php echo URL; ?>{{part.participant.images[0].source}}" alt="{{part.participant.images[0].caption}}" class="circle responsive-img">
        </div>
        <div class="col s10">
            <h4 >{{part.event.name}} [{{part.event.department.name}}]</h4>
            <h5 style="margin:0px;">{{part.participant.fName}}</h5>
            <p style="margin:0px;"><strong>{{part.participant.userId}}</strong> | <strong>{{part.participant.type}}</strong> | <strong>{{part.participant.gender}}</strong></p>
            <div ng-if="part.participant.academics">
                <p style="margin-bottom:5px;">{{part.participant.academics.branch}} ({{part.participant.academics.session}})</p>
                <h5 style="margin:0px;"><strong>{{part.participant.academics.institute.name}}</strong></h5>
                <p style="margin:0px;">{{part.participant.academics.institute.address}}</p>
            </div>
            <p>Participated on <strong>{{part.addedOn}}</strong></p>
        </div>
    </div>
</div>>