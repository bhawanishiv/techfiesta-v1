<div ng-controller="dashboardPaymentsCtrl">
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li><a class="btn-floating green " target="blank" href="<?php echo dashboard . 'getFiles/payments' ?>"><i class="material-icons">get_app</i></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="input-field col s12 l3">
            <div class="switch">
                <label>
                    Ascending
                    <input type="checkbox" ng-model="sortSearchPayment">
                    <span class="lever"></span>
                    Descending
                </label>
            </div>
        </div>
        <div class="input-field col s12 l6">
            <input ng-model="searchPayment" type="text" placeholder="{{web.forms.search}}">
        </div>
        <div class="input-field col s12 l3">
            <select id="filterSearchEvent" name="filterSearchEvent" ng-model="filterSearchPayment" required class="browser-default">
                <option value="" disabled selected>{{web.forms.selectoption}}</option>
                <option value="paymentId">Payment ID</option>
                <option value="payee.fName">Payee Name</option>
                <option value="payee.type">Payee Type</option>
                <option value="payee.gender">Payee Gender</option>
                <option value="payee.academics.institute.instituteId" >Academic Institute Name</option>
                <option value="payee.academics.branch" >Academic Branch</option>
                <option value="payee.academics.session" >Academic Session</option>
                <option value="amount" >Amount</option>
                <option value="mode" >Payment Method</option>
                <option value="remarks" >Payment Remarks</option>
                <option value="addedOn" >Last Added</option>
                <option value="lastModifiedOn" >Last Modified</option>
            </select>
        </div>
    </div>
    <div class="card-panel" ng-repeat="pay in payments| orderBy: sortSearchPayment?'-' + filterSearchPayment:filterSearchPayment| filter:searchPayment" ng-class="pay.verified == 'true' ? '' : 'red lighten-1'" ng-if="profile.type == 'superadmin' || profile.type == 'admin'">
        <div class="row valign-wrapper">
            <div class="col s2">
                <img ng-src="<?php echo URL; ?>{{pay.payee.images[0].source}}" alt="{{pay.payee.fName}}" class="circle responsive-img">
            </div>
            <div class="col s10">
                <h4 style="margin:0px;">{{pay.payee.fName}}</h4>
                <p style="margin:0px;"><strong>{{pay.payee.userId}}</strong> | <strong>{{pay.payee.type}}</strong> | <strong>{{pay.payee.gender}}</strong></p>
                <h3 style="margin:0px;"><strong>{{pay.amount}} </strong><span>{{pay.remarks}}</span></h3>
                <p style="margin:0px;">Payment method <strong>{{pay.mode}}</strong></p>
                <p style="margin-bottom:5px;">Paid on <strong>{{pay.date}}</strong></p>
                <div class="row valign-wrapper" ng-if="pay.verified == 'true'">
                    <div class="col s2">
                        <img ng-src="<?php echo URL; ?>{{pay.verifiedBy.images[0].source}}" alt="{{pay.verifiedBy.fName}}" class="circle responsive-img">
                    </div>
                    <div class="col s10">
                        <h5 style="margin:0px;">{{pay.verifiedBy.fName}}</h5>
                        <p style="margin:0px;"><strong>{{pay.verifiedBy.userId}}</strong></p>
                    </div>
                </div>
                <div ng-if="pay.payee.academics">
                    <p style="margin:0px;">{{pay.payee.academics.branch}} ({{pay.payee.academics.session}})</p>
                    <h5 style="margin:0px;"><strong>{{pay.payee.academics.institute.name}}</strong></h5>
                    <p style="margin:0px;">{{pay.payee.academics.institute.address}}</p>
                </div> 
                <p style="margin:0px;">Last modified on <strong>{{pay.lastModifiedOn}}</strong></p>
            </div>
        </div>
        <div class="card-action">
            <button class="btn" ng-disabled="!view.button.togglePaymentVerification" ng-click="togglePaymentVerification(pay.paymentId)" ng-if="profile.type == 'superadmin' || profile.userId == 'TFUR00000008'">{{pay.verified=='true'?'Unverify':'Verify'}}</button>
        </div>
    </div>
</div>