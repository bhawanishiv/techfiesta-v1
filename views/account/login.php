<form  name="account" class="form-login"  ng-controller="userCtrl" ng-cloak novalidate>  
    <a href="<?php echo URL; ?>"><img class="responsive-img" style="max-height:10rem;" ng-src="<?php echo URL; ?>public/images/techfiestaFullColor.svg" alt="{{web.links.login}}"></a>
    <h1 >{{web.links.login}}</h1>
    <p>{{web.data.aboutaccount}}</p>
    <p>{{web.data.donthaveaccount}}&nbsp;<a href="<?php echo account ?>create">{{web.links.createaccount}}</a></p>                      
    <p ng-if="view.response.view" ng-class="{'red-text':!view.response.status, 'greem-text':view.response.status}">{{view.response.text}}</p>
    <div ng-if="view.userLogin" class="row">
        <div ng-if="view.process.verifyEmail" class="row">
            <div class="input-field">
                <input id="emailNPhone" name="emailNPhone" ng-model="user.email" type="text" placeholder="{{web.forms.emailorphone}}" class="validate" required>
                <span class="helper-text red-text" ng-if="account.email.$touched && account.email.$invalid">{{web.data.invalidemail}}</span> 
                <span class="helper-text red-text" ng-if="account.email.$dirty && account.email.$error.required">{{web.data.requiredfield}}</span> 
                <button class="btn waves-effect waves-light" ng-if="view.button.checkEmail" ng-disabled="!view.button.checkEmail || account.email.$pristine || (account.email.$dirty && (account.email.$invalid))" ng-click="login.checkEmail(user.email)">{{web.actions.next}}</button>
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
        <div ng-if="view.process.password" class="row">
            <div ng-if="view.userImage">
                <div class="row valign-wrapper">
                    <div class="col s4">
                        <img ng-src="<?php echo URL; ?>{{user.images[0].source}}" alt="{{user.fName}}" class="circle responsive-img"> <!-- notice the "circle" class -->
                    </div>
                    <div class="col s8">
                        <h5>{{user.fName}}</h5>
                        <p>{{user.emails[0].email}}</p>
                    </div>
                </div>                
            </div>
            <div class="input-field col-12">
                <input  type="password" id="password" name="password" ng-model="user.pswd" class="validate" required>
                <label for="password">{{web.forms.password}}</label>
                <span class="helper-text red-text" ng-if="account.password.$dirty && account.password.$error.required">{{web.data.requiredfield}}</span> 
            </div>
            <p><a href="<?php echo account ?>forgotPassword">{{web.links.forgotpassword}}?</a></p> 
            <button class="btn waves-effect waves-light" ng-if="view.button.login" ng-disabled="!view.button.login || account.password.$pristine || (account.password.$dirty && (account.email.$error.required))" ng-click="login.postLogin(user)">{{web.links.login}}</button>   
             <div ng-if="!view.button.login" class="preloader-wrapper small active">
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
        <button class="waves-effect waves-light btn" ng-click="gSignIn()"><i class="pr-com-icons left">google</i>Sign In</button>
        <!--<button class="waves-effect waves-light btn" ng-click="fbSignIn()"><i class="pr-com-icons left">facebook</i>Sign In</button>-->
    </div>
    <div ng-if="!view.userLogin">
        <div class="row valign-wrapper">
            <div class="col s4">
                <img ng-src="{{user.image}}" alt="{{user.fName}}" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s8">
                <h5>{{user.fName}}</h5>
                <p>{{user.email}}</p>
            </div>
        </div> 
        <div class="input-field">
            <input id="image" name="image" type="file"  ng-file="user.image" ng-if="false" placeholder="{{web.forms.phone}}" class="validate" required>
            <input id="phone" name="phone" type="text"  ng-model="user.phone" placeholder="{{web.forms.phone}}" ng-maxlength="10" ng-minlength="10" class="validate" required>
            <span class="helper-text red-text" ng-if="account.phone.$touched && account.phone.$invalid">{{web.data.invalidphone}}, phone should be of 10 digits only</span> 
            <span class="helper-text red-text" ng-if="account.phone.$dirty && account.phone.$error.required">{{web.data.requiredfield}}</span> 
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
        <div class="input-field">
            <p>
                <label>
                    <input type="checkbox" id="agreement" name="agreement" ng-model="user.agreement" checked="checked" required />
                    <span>I have read the <a href="<?php echo document; ?>view/account">rules and conditions of opening account</a>&nbsp; in techfiesta.org carefully and thus I agree for that. </span>
                    <span class="helper-text red-text" ng-if="account.agreement.$dirty && account.agreement.$error.required">Please accept the agreement</span> 
                </label>
            </p>
        </div>           
        <div class="input-field">
            <input type="submit"
                   value="{{web.actions.login}}"
                   class="btn waves-effect waves-light"
                   ng-click="googleSignIn(user)" 
                   ng-disabled="!view.button.googleSignIn || account.$pristine || (account.$dirty && account.$invalid)">
        </div>
    </div>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p>{{web.data.copyright}} &copy <?php echo date("Y"); ?>&nbsp;{{web.organization.name}}</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="<?php echo document; ?>view/privacy">{{web.data.privacynsecurity}}</a></li>
            <li class="list-inline-item"><a href="<?php echo document; ?>view/terms">{{web.data.termsnconditions}}</a></li>
        </ul>
    </footer>
</form>