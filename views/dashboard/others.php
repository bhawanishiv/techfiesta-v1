<div class="input-field col s12 l3">
    <input ng-model="searchInstitute" type="text" placeholder="{{web.forms.search}}">
</div>
<div class="card" ng-repeat="institute in institutes| filter:searchInstitute">
    <div class="card-content">
        <h4 style="margin:0px;">{{institute.name}}</h4>
        <p style="margin:0px;">{{institute.address}}</p>
        <p style="margin:0px;"><span>{{institute.email}}</span></p>
        <p style="margin:0px;"><span>{{institute.phone}}</span></p>
        <p style="margin:0px;">Last modified on <strong>{{institute.lastModifiedOn}}</strong></p>
    </div>
</div>
<div class="card" ng-if="profile.permission.account && profile.type == 'superadmin'">
    <div class="card-content">
        <div class="card-title">{{web.data.addinstitute}}</div>
        <form name="frmAddInstitute" validate ng-submit="postInstitute(_institute)">
            <div class="row">
                <div class="input-field col s12 l6">
                    <input id="name" name="name" ng-model="_institute.name" type="text" placeholder="{{web.forms.name}}" class="validate" required>
                    <span class="helper-text red-text" ng-if="frmAddInstitute.name.$touched && frmAddInstitute.name.$error.required">{{web.data.requiredfield}}</span> 
                </div>
                <div class="input-field col s12 l6">
                    <input id="address" name="address" ng-model="_institute.address" type="text" placeholder="{{web.forms.address}}" class="validate" required>
                    <span class="helper-text red-text" ng-if="frmAddInstitute.address.$touched && frmAddInstitute.address.$error.required">{{web.data.requiredfield}}</span> 
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 l3">
                    <input id="email" name="email" ng-model="_institute.email" type="email" placeholder="{{web.forms.email}}" class="validate" required>
                    <span class="helper-text red-text" ng-if="frmAddInstitute.email.$touched && frmAddInstitute.email.$invalid">{{web.data.invalidemail}}</span> 
                    <span class="helper-text red-text" ng-if="frmAddInstitute.email.$dirty && frmAddInstitute.email.$error.required">{{web.data.requiredfield}}</span> 
                </div>
                <div class="input-field col s12 l3">
                    <input id="phone" name="phone" ng-model="_institute.phone" type="tel" ng-maxlength="10" ng-minlength="10" placeholder="{{web.forms.phone}}" class="validate" required>
                    <span class="helper-text red-text" ng-if="frmAddInstitute.phone.$touched && frmAddInstitute.phone.$invalid">{{web.data.invalidphone}}, phone should have 10 digits only</span> 
                    <span class="helper-text red-text" ng-if="frmAddInstitute.phone.$dirty && frmAddInstitute.phone.$error.required">{{web.data.requiredfield}}</span> 
                </div>
            </div>                
            <div class="input-field col s12 l4">
                <input type="submit" value="{{web.actions.save}}"
                       class="btn waves-effect waves-light"
                       ng-disabled="!view.button.sendInstitute || frmAddInstitute.$pristine || frmAddInstitute.$invalid">
            </div>
        </form>
    </div>
</div>
