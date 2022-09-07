<div class="container" ng-controller="profileCtrl" ng-cloak>
    <div class="card-panel grey lighten-5 z-depth-1">
        <div class="row valign-wrapper">
            <div class="col s2">
                <a class='dropdown-trigger' href='#' data-target='dropdown2'><img ng-src="<?php echo URL; ?>{{user.images[0].source}}" alt="{{user.fName}}" class="circle responsive-img"></a>
                <ul id='dropdown2' class='dropdown-content'>
                    <li><a id="file-input" href="#!">Upload Picture</a></li>
                    <!--<li><a href="#!"><i class="material-icons">cloud</i>five</a></li>-->
                </ul>
                <input type="file" name="image" id="input-file-hidden" ng-file="image_">
                <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
                <h3>{{user.fName}}</h3>
                <p style="margin:0px;">User Id <strong> {{user.userId}}</strong> | {{user.gender}}</p>
                <div class="input-field" ng-if="view.updateEmail">
                    <div ng-if="view.processChangeEmail.email">
                        <input type="email" name="email" id="email" ng-model="processEmailChange.email" placeholder="{{web.forms.email}}">
                        <button ng-click="processEmailChangeEmail(processEmailChange.email)" ng-if="view.button.sendEmailChangeEmail" ng-disabled="!view.button.sendEmailChangeEmail" class="btn waves-effect">Next</button>
                        <div ng-if="!view.button.sendEmailChangeEmail" class="preloader-wrapper small active">
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
                    <div ng-if="view.processChangeEmail.otp">
                        <input ng-if="false" type="text" name="otpId" id="otpId" ng-model="processEmailChange.otpId">
                        <input type="text" name="otp" id="otp" ng-model="processEmailChange.otp" placeholder="{{web.forms.otp}}">
                        <button ng-if="view.button.sendEmailChangeOtp" ng-disabled="!view.button.sendEmailChangeOtp"  ng-click="processEmailUpdate(processEmailChange)"  class="btn waves-effect">Save</button>
                        <div ng-if="!view.button.sendEmailChangeOtp" class="preloader-wrapper small active">
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
                <div class="input-field">
                    <button ng-click="toggleChangeEmail()" class="btn waves-effect">{{!user.emails[0].email?'Add Email':'Change Email'}}</button>
                </div>
                <p  class="black-text"ng-repeat="email in user.emails"><i ng-if="email.type == 'default'" class="material-icons left">verified_user</i>{{email.email}}</p>
                <p ng-repeat="phone in user.phones"><i ng-if="phone.type == 'default'" class="material-icons left">verified_user</i>{{phone.phone}}</p>
            </div>
        </div>
    </div>       

    <div class="card">
        <div class="card-content">
            <div class="card-title">{{web.data.academics}}</div>
            <div class="row" ng-if="has.academic">
                <h6>{{user.academic.branch}} ({{user.academic.session}})</h6>
                <h4 style="margin:0px;">{{user.academic.institute.name}}</h4>
                <h6>{{user.academic.institute.email}}</h6>
                <h6>{{user.academic.institute.phone}}</h6>
                <h6>{{user.academic.institute.address}}</h6>
            </div>
            <div class="row" ng-if="!has.academic">
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

    <div class="card">
        <div class="card-content">
            <div class="card-title">{{web.data.payment}}</div>
            <div ng-if="has.payment" ng-repeat="payment in payments" >
                <h4 ng-class="payment.verified == 'true' ? '' : 'red-text'"><strong><i class="material-icons left" ng-if="payment.verified == 'true'">done</i>{{payment.amount}} <span>{{payment.remarks}}</span></strong></h4>
                <h6>Payment method<strong> {{payment.mode}}</strong></h6>
                <h6>Paid on <strong>{{payment.date}}</strong></h6>
            </div>
            <div ng-if="!has.payment">
                <p>You can pay us by our <strong>UPI methods</strong>, details are to be given below. You can even pay <strong>Cash in Hand</strong>.</p>
                <p>You can pay using <strong>PhonePe</strong>, <strong>Paytm</strong> or <strong>Tez</strong>.</p>
                <p>For Coordinators, the payable amount is <strong>INR 800</strong>. For more information, please refer to the <a href="<?php echo support; ?>contact">Contact us</a> page. <p>

                <form name="frmPayment" validate ng-submit="postPayment(_payment)">
                    <div class="row">
                        <div class="input-field col s12 l4">
                            <select id="mode" name="mode" ng-model="_payment.mode" required class="browser-default">
                                <option value="" disabled selected>{{web.forms.paymentmode}}</option>
                                <option value="upi">UPI</option>
                                <option value="cashInHand">Cash in Hand</option>
                            </select>
                            <!--<label>{{web.forms.event}}</label>-->
                            <span class="helper-text red-text" ng-if="frmPayment.mode.$touched && frmPayment.mode.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l3">
                            <input id="amount" name="amount" ng-model="_payment.amount" type="number" placeholder="{{web.forms.amount}}" class="validate">
                            <span class="helper-text red-text" ng-if="frmPayment.amount.$touched && frmPayment.mode.$invalid">{{web.data.invaliddata}}</span> 
                            <span class="helper-text red-text" ng-if="frmPayment.amount.$dirty && frmPayment.mode.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l3">
                            <input id="date" name="date" ng-model="_payment.date" placeholder="{{web.forms.paymentdate}}" class="datepicker" required>
                            <span class="helper-text red-text" ng-if="frmPayment.date.$touched && frmPayment.date.$invalid">{{web.data.invaliddata}}</span> 
                            <span class="helper-text red-text" ng-if="frmPayment.date.$dirty && frmPayment.date.$error.required">{{web.data.requiredfield}}</span> 
                        </div>
                        <div class="input-field col s12 l3">
                            <input id="remarks" name="remarks" ng-model="_payment.remarks" type="text" placeholder="{{web.forms.remarks}}" class="validate">
                            <span class="helper-text">Please give the Transaction Id, if paid by UPI</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div ng-if="view.button.sendPayment">
                                <input type="submit" value="{{web.actions.save}}"
                                       class="btn waves-effect waves-light"
                                       ng-disabled="!view.button.sendPayment || frmPayment.$pristine || frmPayment.$invalid">
                            </div>
                            <div ng-if="!view.button.sendPayment" class="preloader-wrapper small active">
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

    <div class="card">
        <div class="card-tabs">
            <ul class="tabs tabs-fixed-width">
                <li class="tab"><a class="active" href="#myparticipation">{{web.data.myparticipation}}</a></li>
                <li class="tab"><a href="#participate">{{web.data.participate}}</a></li>
            </ul>
        </div>
        <div class="card-content grey lighten-4">
            <div id="myparticipation">
                <div class="row">
                    <div class="col s12 l4" ng-repeat="participation in participations">
                        <div class="row valign-wrapper">
                            <div class="col s4">
                                <img ng-src="<?php echo URL; ?>{{participation.event.file[0].source}}" alt="{{participation.event.name}}" class="responsive-img">
                            </div>
                            <div class="col s8">
                                <h5 style="margin:0px;"><a href="<?php echo URL; ?>{{participation.event.file[1].source}}">{{participation.event.name}}</a></h5>
                                <p  style="margin:0px;"><strong>#{{participation.event.department.name}}</strong></p>
                                <p style="margin:0px;">Participated on <strong>{{participation.addedOn}}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="participate">
                <div ng-if="has.payment && has.academic">
                    <form name="frmParticipate" ng-submit="postParticipation(_participation)">
                        <div class="row">
                            <div class="input-field col s12 ">
                                <select id="eventId" name="eventId" ng-model="_participation.eventId" required class="browser-default">
                                    <option value="" disabled selected>{{web.forms.event}}</option>
                                    <option ng-repeat="event in events" value="{{event.eventId}}">{{event.name}}</option>
                                </select>
                                <!--<label>{{web.forms.event}}</label>-->
                                <span class="helper-text red-text" ng-if="frmParticipate.eventId.$dirty && participate.eventId.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                            <p class="col s12">
                                <label>
                                    <input type="checkbox" id="agreement" name="agreement" ng-model="_participation.agreement" checked="checked" required/>
                                    <span>{{web.data.participationagreement}}</span>
                                    <span class="helper-text red-text" ng-if="frmParticipate.agreement.$dirty && participate.agreement.$error.required">Please accept the agreement</span> 
                                </label>
                            </p>
                        </div>  
                        <div class="row">
                            <div class="input-field col s12">
                                <div ng-if="view.button.sentParticipation">
                                    <input type="submit" value="{{web.actions.save}}"
                                           class="btn waves-effect waves-light"
                                           ng-disabled="!view.button.sentParticipation || frmParticipate.$prestine || frmParticipate.$invalid">
                                </div>
                                <div ng-if="!view.button.sentParticipation" class="preloader-wrapper small active">
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
                <p ng-hide="has.academic" class="red-text">{{web.data.fillacademic}}</p>
                <p ng-hide="has.payment" class="red-text">{{web.data.dopayment}}</p>
            </div>
        </div>
    </div>
</div>
