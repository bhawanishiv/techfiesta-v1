<form  name="account" class="form-login"  ng-controller="userCtrl" ng-cloak novalidate>      
    <div ng-if="view.forgotPassword" class="row">
        <a href="<?php echo URL; ?>"><img class="responsive-img" style="max-height:10rem;" ng-src="<?php echo URL; ?>public/images/techfiestaFullColor.svg" alt="{{web.links.login}}"></a>
        <h1 >{{web.links.forgotpassword}}</h1>
        <p>{{web.data.alreadyregistered}}&nbsp;<a href="<?php echo account ?>login">{{web.links.login}}</a></p>                 
        <p ng-if="view.response.view" ng-class="{'red-text':!view.response.status, 'greem-text':view.response.status}">{{view.response.text}}</p>
        <div ng-if="view.process.verifyEmail" class="row">
            <div class="input-field">
                <input id="email" name="email" ng-model="user.email" type="email" placeholder="{{web.forms.email}}" class="validate" required>
                <span class="helper-text red-text" ng-if="account.email.$touched && account.email.$invalid">{{web.data.invalidemail}}</span> 
                <span class="helper-text red-text" ng-if="account.email.$dirty && account.email.$error.required">{{web.data.requiredfield}}</span> 
                <button  class="btn waves-effect waves-light"
                         ng-if="view.button.checkEmail"
                         ng-disabled="!view.button.checkEmail || account.email.$pristine || (account.email.$dirty && (account.email.$invalid))"
                         ng-click="forgotPassword.checkEmail(user.email)"> {{web.actions.next}}</button>
                <div ng-if="!view.button.checkEmail" class="preloader-wrapper small active">
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
        <div ng-if="view.process.otp">
            <div ng-if="view.userImage">
                <div class="row valign-wrapper">
                    <div class="col s4">
                        <img ng-src="<?php echo URL; ?>{{user.image.source}}" alt="{{user.image.caption}}" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s8">
                        <h5>{{user.fName}}</h5>
                        <p>{{user.email}}</p>
                    </div>
                </div>                
            </div>
            <div class="input-field" ng-if="false">
                <input id="otpId" name="otpId" ng-model="user.otpId"  readonly type="text" class="validate" required>
            </div>
            <div class="input-field">
                <input id="otp" name="otp" ng-model="user.otp" type="text" placeholder="{{web.forms.otp}}" class="validate" required>
                <span class="helper-text red-text" ng-if="account.otp.$dirty && account.otp.$error.required">{{web.data.requiredfield}}</span> 
                <button class="btn waves-effect waves-light" ng-if="view.button.checkOTP" ng-disabled="!view.button.checkOTP" ng-click="forgotPassword.checkOTP(user.otp, user.otpId)">{{web.actions.next}}</button>
                <div ng-if="!view.button.checkOTP" class="preloader-wrapper small active">
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
        <div ng-if="view.process.changePassword">            
            <div class="input-field">
                <input id="pswd" name="pswd" type="password"  ng-model="user.pswd" placeholder="{{web.forms.password}}" ng-pattern="pswdPattern" class="validate" required>
                <span class="helper-text red-text" ng-if="account.pswd.$touched && account.pswd.$invalid">Wrong password patten! must have character, number and alphanumeric keys</span> 
                <span class="helper-text red-text" ng-if="account.pswd.$dirty && account.pswd.$error.required">{{web.data.requiredfield}}</span> 
            </div>
            <div class="input-field">
                <input id="cPswd" name="cPswd" type="password" ng-model="user.cPswd" placeholder="{{web.forms.repeatpassword}}" class="validate" required>
                <span class="helper-text red-text" ng-if="account.cPswd.$touched && (user.pswd !== user.cPswd)">Passwords did not match</span> 
                <span class="helper-text red-text" ng-if="account.cPswd.$dirty && account.cPswd.$error.required">{{web.data.requiredfield}}</span> 
            </div>          
            <div class="input-field">
                <div ng-if="view.button.changePassword">
                    <input type="submit" value="{{web.actions.changepassword}}" class="btn waves-effect waves-light"  ng-disabled="!view.button.changePassword || account.$prestine || account.$invalid" ng-click="forgotPassword.changePassword(user.pswd, user.cPswd)">
                </div>
                <div ng-if="!view.button.changePassword" class="preloader-wrapper small active">
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

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">{{web.data.copyright}} &copy <?php echo date("Y"); ?>&nbsp;{{web.orgBasic.name}}</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="<?php echo document; ?>view/privacy">{{web.data.privacynsecurity}}</a></li>
            <li class="list-inline-item"><a href="<?php echo document; ?>view/terms">{{web.data.termsnconditions}}</a></li>
        </ul>    
    </footer>
</form>
