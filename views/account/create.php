<form class="form-createAccount" name="account" novalidate ng-submit="signUp.createUser(user)" ng-controller="userCtrl" ng-cloak >
    <a href="<?php echo URL; ?>"><img class="responsive-img" style="max-height:10rem;" ng-src="<?php echo URL; ?>public/images/techfiestaFullColor.svg" alt="{{web.links.login}}"></a>
    <h1 class="h3 mb-3 font-weight-normal">{{web.links.createaccount}}</h1>
    <p>{{web.data.alreadyregistered}}&nbsp;<a href="<?php echo account ?>login">{{web.links.login}}</a></p>
    <p ng-if="view.response.view" ng-class="{'red-text': view.response.status == false, 'green-text':view.response.status == true}">{{view.response.text}}</p>
    <div ng-if="view.process.all">
        <div ng-if="view.process.verifyEmail" class="row">
            <div class="input-field">
                <input id="email" name="email" ng-model="user.email" type="email" placeholder="{{web.forms.email}}" class="validate" ng-pattern="emailPattern" required>
                <span class="helper-text red-text" ng-if="account.email.$touched && account.email.$invalid">{{web.data.invalidemail}}</span> 
                <span class="helper-text red-text" ng-if="account.email.$dirty && account.email.$error.required">{{web.data.requiredfield}}</span> 
                <button class="btn waves-effect waves-light"  ng-click="signUp.checkEmail(user.email)" ng-if="view.button.checkEmail" ng-disabled="!view.button.checkEmail || account.email.$pristine || (account.email.$dirty && (account.email.$invalid))">{{web.actions.next}}</button>
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
            <div class="input-field" ng-if="false">
                <input id="otpId" name="otpId" ng-model="user.otpId"  readonly type="text" class="validate" required>
            </div>
            <div class="input-field">
                <input id="otp" name="otp" ng-model="user.otp" type="text" placeholder="{{web.forms.otp}}" class="validate" required>
                <span class="helper-text red-text" ng-if="account.otp.$dirty && account.otp.$error.required">{{web.data.requiredfield}}</span> 
                <button class="btn waves-effect waves-light" ng-if="view.button.checkOTP"  ng-disabled="!view.button.checkOTP" ng-click="signUp.checkOTP(user.otp, user.otpId)">{{web.actions.next}}</button>
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
        <div ng-if="view.process.verifyPhone">
            <div class="input-field">
                <input id="phone" name="phone" ng-model="user.phone" type="text" placeholder="{{web.forms.phone}}" ng-maxlength="10" ng-minlength="10" class="validate" required>
                <span class="helper-text red-text" ng-if="account.email.$touched && account.email.$invalid">{{web.data.invalidemail}}</span> 
                <span class="helper-text red-text" ng-if="account.email.$dirty && account.email.$error.required">{{web.data.requiredfield}}</span> 
                <button class="btn waves-effect waves-light" ng-click="toVerifyEmail()">{{web.actions.back}}</button>
                <button class="btn waves-effect waves-light" ng-if="view.button.checkPhone" ng-click="signUp.checkPhone(user.phone)"  ng-disabled="!view.button.checkPhone || account.phone.$pristine || (account.phone.$dirty && (account.phone.$invalid))">{{web.actions.next}}</button>
                <div ng-if="!view.button.checkPhone" class="preloader-wrapper small active">
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

        <div ng-if="view.process.userDetail">
            <div class="input-field">
                <input  id="fName" name="fName" ng-model="user.fName" placeholder="{{web.forms.name}}" class="validate" required>
                <span class="helper-text red-text" ng-if="account.fName.$dirty && account.fName.$error.required">{{web.data.requiredfield}}</span> 
            </div>
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
            <div class="input-field col s12">
                <select id="gender" name="gender" ng-model="user.gender" required class="browser-default">
                    <option value="" disabled selected>{{web.forms.gender}}</option>
                    <option value="Male">Male</option>
                    <option value="Femmale">Female</option>
                    <option value="other">Other</option>
                </select>
                <!--<label>{{web.forms.event}}</label>-->
                <span class="helper-text red-text" ng-if="account.gender.$dirty && account.gender.$error.required">{{web.data.requiredfield}}</span> 
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>Image</span>
                    <input type="file" name="image" id="image" ng-file="user.image" required>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
                <span class="helper-text red-text" ng-if="account.image.$dirty && account.image.$error.required">{{web.data.requiredfield}}</span> 
            </div>          
            <p>
                <label>
                    <input type="checkbox" id="agreement" name="agreement" ng-model="user.agreement" checked="checked" required />
                    <span>I have read the <a href="<?php echo document; ?>view/account">rules and conditions of opening account</a>&nbsp; in techfiesta.org carefully and thus I agree for that. </span>
                    <span class="helper-text red-text" ng-if="account.agreement.$dirty && account.agreement.$error.required">Please accept the agreement</span> 
                </label>
            </p>
            <div class="input-field">
                <button class="btn waves-effect waves-light" ng-click="toVerifyPhone()">{{web.actions.back}}</button>
                <div ng-if="view.button.createUser">
                    <input type="submit" value="{{web.actions.register}}"
                           class="btn waves-effect waves-light"
                           ng-disabled="!view.button.createUser || account.$pristine || account.$invalid"
                           ng-click="signUpCreateUser(user)">
                </div>
                <div ng-if="!view.button.createUser" class="preloader-wrapper small active">
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
        <p class="mb-1">{{web.data.copyright}} &copy <?php echo date("Y"); ?>&nbsp;{{web.organization.name}}</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="<?php echo document; ?>view/privacy">{{web.data.privacynsecurity}}</a></li>
            <li class="list-inline-item"><a href="<?php echo document; ?>view/terms">{{web.data.termsnconditions}}</a></li>
        </ul>
    </footer>
</form>