<div ng-controller="hospitalityCtrl" ng-cloak>
    <div class="container">
        <div class="row">
            <div class="col s12 l8">
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">{{web.data.accomodation}}</div>
                        <p  ng-if="view.response.view" ng-bind-html="view.response.text" ng-class="{'text-danger': view.response.status == false, 'text-success':view.response.status == true}"></p>
                        <div ng-if="view.fillForm">
                            <form name="hospitality" id="hospitality" ng-submit="postAccomodation(accomodation)" ng-submit="postAccomodation(accomodationHandler)" validate>
                                <p ng-if="!accomodation.fName">You need to login fist. <a href="" ng-click="setRedirectLogin()">{{web.data.login}}</a></p>
                                <div ng-if="accomodation.fName">
                                    <div class="row valign-wrapper">
                                        <div class="col s2">
                                            <img ng-src="<?php echo URL; ?>{{accomodation.image.source}}" alt="{{profile.fName}}" class="circle responsive-img"> <!-- notice the "circle" class -->
                                        </div>
                                        <div class="col s10">
                                            <input id="userId" ng-if="false" name="userId" ng-model="accomodationHandler.userId" type="text" readonly>
                                            <input id="name" name="name" ng-model="accomodation.fName" type="text" readonly>
                                            <input id="email" name="email" ng-model="accomodation.email" type="email" readonly>
                                            <input id="phone" name="phone" ng-model="accomodation.phone" type="text" readonly>
                                            <input id="phone" name="phone" ng-model="accomodation.gender" type="text" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 l4">
                                            <input id="remerks" name="remarks" ng-model="accomodation.remarks" type="text" placeholder="{{web.forms.remarks}}" class="validate">
                                        </div>
                                        <div class="input-field col s12">
                                            <input type="submit" value="{{web.actions.send}}"
                                                   class="btn waves-effect waves-light"
                                                   ng-disabled="!view.button.sendAccomodation || hospitality.$prestine || hospitality.$invalid">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>        
            <div class="col s12 l4">                
            </div>
        </div>
    </div>
</div>