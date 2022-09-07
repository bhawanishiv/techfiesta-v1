<div class="input-field col s12 l3">
    <input ng-model="searchMessage" type="text" placeholder="{{web.forms.search}}">
</div>
<div ng-repeat="(email, msgs) in messages | groupBy:'email'">
    <div ng-repeat="(name, _msgs) in msgs | groupBy:'name'">
        <div  class="card" ng-repeat="(phone, __msgs) in _msgs | groupBy:'phone'">
            <div class="card-content">
                <h5><strong>{{name}}</strong> [<a href="mailto:{{email}}">{{email}}</a>] [<a href="tel:{{phone}}">{{+phone}}</a>]</h5>
                <div ng-repeat="msg in __msgs| filter:searchMessage | orderBy:'-addedOn'">
                    <h6><span><strong>{{msg.addedOn}}</strong> - {{msg.message}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
