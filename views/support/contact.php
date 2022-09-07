<div ng-controller="supportCtrl" ng-cloak>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <form name="contact" id="contact" ng-submit="postMessage(message)" >
                    <div class="card-title">{{web.links.contactus}}</div>
                    <p  ng-if="view.response.view" ng-class="{'red-text': view.response.status == false, 'green-text':view.response.status == true}">{{view.response.text}}</p>
                    <div ng-if="view.fillForm">
                        <div class="row" ng-if="!profile.fName">
                            <div class="input-field col s12 l4">
                                <input type="text" id="name" name="name" ng-model="message.name" placeholder="{{web.forms.name}}" class="validate" required>
                                <span class="helper-text red-text" ng-if="contact.name.$touched && contact.name.$invalid">{{web.data.invaliddata}}</span> 
                                <span class="helper-text red-text" ng-if="contact.name.$dirty && contact.name.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                            <div class="input-field col s12 l4">
                                <input type="email" id="email" name="email"  ng-model="message.email" placeholder="{{web.forms.email}}" class="validate" required>
                                <span class="helper-text red-text" ng-if="contact.email.$touched && contact.email.$invalid">{{web.data.invalidemail}}</span> 
                                <span class="helper-text red-text" ng-if="contact.email.$dirty && contact.email.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                            <div class="input-field col s12 l4">
                                <input type="tel" id="phone" name="phone" ng-model="message.phone" placeholder="{{web.forms.phone}}" ng-minlength="10" ng-maxlength="10" class="validate" required>
                                <span class="helper-text red-text" ng-if="contact.phone.$touched && contact.phone.$invalid">{{web.data.invalidphone}}, phone should be of 10 digits only</span> 
                                <span class="helper-text red-text" ng-if="contact.phone.$dirty && contact.phone.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                        </div>
                        <div class="row valign-wrapper" ng-if="profile.fName">
                            <div class="col s2">
                                <img ng-src="<?php echo URL; ?>{{message.image.source}}" alt="{{profile.fName}}" class="circle responsive-img"> <!-- notice the "circle" class -->
                            </div>
                            <div class="col s10">
                                <input id="name" name="name" ng-model="message.name" type="text" readonly>
                                <input id="email" name="email" ng-model="message.email" type="email" readonly>
                                <input id="phone" name="phone" ng-model="message.phone" type="tel" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="message" name="message" ng-model="message.message" ng-minlength="10" class="materialize-textarea" required></textarea>
                                <label for="message">{{web.forms.message}}</label>
                                <span class="helper-text red-text" ng-if="contact.message.$touched && contact.message.$invalid">{{web.data.invaliddata}}, minimum length should be 10</span> 
                                <span class="helper-text red-text" ng-if="contact.message.$dirty && contact.message.$error.required">{{web.data.requiredfield}}</span> 
                            </div>
                            <p class="col s12">
                                <label>
                                    <input type="checkbox" id="agreement" name="agreement" ng-model="message.wantToReach" checked="checked" />
                                    <span>{{web.forms.contactwanttoreach}}</span>
                                </label>
                            </p>
                            <div class="input-field col s12">
                                <input type="submit" value="{{web.actions.send}}"
                                       class="btn waves-effect waves-light"
                                       ng-disabled="!view.button.sendMessage || contact.$pristine || (contact.$dirty && contact.$invalid)">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m3 l3" ng-repeat="(department,_department) in departments | groupBy:'name'">
                <h4>{{department}}</h4>
                <div class="card" ng-repeat="dep in _department">
                    <div class="card-image">
                        <img ng-if="dep.head.images.length > 0" ng-src="<?php echo URL; ?>{{dep.head.images[0].source}}" alt="{{dep.head.fName}}">
                        <img ng-if="!dep.head.images.length > 0" ng-src="<?php echo URL; ?>{{web.data.emptyAccountImageUrl}}" alt="{{dep.head.fName}}">
                    </div>
                    <div class="card-content">
                        <div class="card-title">{{dep.head.fName}}</div>
                        <p style="margin:0px;"><a href="mailto:{{dep.head.emails[0].email}}">{{dep.head.emails[0].email}}</a></P>
                        <p style="margin:0px;"><a href="tel:{{dep.head.phones[0].phone}}">{{dep.head.phones[0].phone}}</a></P>
                    </div>
                </div>
            </div>
            <div class="col s12 m3 l3" ng-repeat="(subcategory,_event) in events | groupBy:'name'">
                <h4>{{subcategory}}</h4>
                <div class="card" ng-repeat="event in _event">
                    <div class="card-image">
                        <img ng-if="event.head.images.length > 0" ng-src="<?php echo URL; ?>{{event.head.images[0].source}}" alt="{{event.head.fName}}">
                        <img ng-if="!event.head.images.length > 0" ng-src="<?php echo URL; ?>{{web.data.emptyAccountImageUrl}}" alt="{{event.head.fName}}">
                    </div>
                    <div class="card-content">
                        <div class="card-title">{{event.head.fName}}</div>
                        <p style="margin:0px;"><a href="mailto:{{event.head.emails[0].email}}">{{event.head.emails[0].email}}</a></P>
                        <p style="margin:0px;"><a href="tel:{{event.head.phones[0].phone}}">{{event.head.phones[0].phone}}</a></P>  
                    </div>
                </div>                 
            </div>
            <div class="col s12 m3 l3" ng-repeat="(category,_members) in members | groupBy:'department.name'">
                <h4>{{category}}</h4>
                <div class="card" ng-repeat="member in _members">
                    <div class="card-image">
                        <img ng-if="member.member.images.length > 0" ng-src="<?php echo URL; ?>{{member.member.images[0].source}}" alt="{{member.member.fName}}">
                        <img ng-if="!member.member.images.length > 0" ng-src="<?php echo URL; ?>{{web.data.emptyAccountImageUrl}}" alt="{{member.member.fName}}">
                    </div>
                    <div class="card-content">
                        <div class="card-title">{{member.member.fName}}</div>
                        <p style="margin:0px;"><a href="mailto:{{member.member.emails[0].email}}">{{member.member.emails[0].email}}</a></P>
                        <p style="margin:0px;"><a href="tel:{{member.member.phones[0].phone}}">{{member.member.phones[0].phone}}</a></P>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>