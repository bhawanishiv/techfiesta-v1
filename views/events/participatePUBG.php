<div class="container">
    <div class="card">
        <div class="card-content">
            <div class="card-title">Create Team</div>
            <div class="row">
                <form name="frmAcademic" validate ng-submit="postAcademic(_academic)">
                    <div class="input-field col s12 l6">
                        <select id="instituteId" name="instituteId" ng-model="_academic.instituteId" required class="browser-default">
                            <option value="" disabled selected>{{web.forms.institute}}</option>
                            <option ng-repeat="institute in institutes" value="{{institute.instituteId}}">{{institute.name}}</option>
                        </select>
                        <!--<label>{{web.forms.institute}}</label>-->
                        <span class="helper-text red-text" ng-if="frmAcademic.instituteId.$touched && frmAcademic.instituteId.$error.required">{{web.data.requiredfield}}</span> 
                    </div>
                    <div class="input-field col s12 l3">
                        <input id="branch" name="branch" ng-model="_academic.branch" type="text" placeholder="{{web.forms.branch}}" class="validate" required>
                        <span class="helper-text red-text" ng-if="frmAcademic.branch.$touched && frmAcademic.branch.$error.required">{{web.data.requiredfield}}. If you non higher educational student, give your class</span> 
                    </div>
                    <div class="input-field col s12 l3">
                        <input id="session" name="session" ng-model="_academic.session" type="text" placeholder="{{web.forms.session}}" class="validate" required>
                        <span class="helper-text red-text" ng-if="frmAcademic.session.$touched && frmAcademic.session.$error.required">{{web.data.invaliddata}}, please give your session</span> 
                    </div>
                    <div class="input-field col s12 l6">
                        <input id="studentId" name="studentId" ng-model="_academic.studentId" type="text" placeholder="{{web.forms.studentid}}" class="validate">
                        <span class="helper-text red-text" ng-if="frmAcademic.studentId.$touched && frmAcademic.studentId.$invalid">{{web.data.invaliddata}}</span> 
                        <div ng-if="view.button.sendAcademic">
                            <input type="submit" value="{{web.actions.save}}"
                                   class="btn waves-effect waves-light"
                                   ng-disabled="!view.button.sendAcademic || frmAcademic.$pristine || frmAcademic.$invalid">
                        </div>  
                        <div ng-if="!view.button.sendAcademic" class="preloader-wrapper small active">
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