  <div class="row" ng-controller="eventRegistration">
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" id="mainevent">
          <div ng-repeat="mevent in allmaievent">
            <!-- an-attr-id="{{mevent.meid}}"  -->
            <h4><a  ng-click="getSubEvent(mevent.meid)">{{mevent.mevent_name}}</a></h4>
          </div>
        </div>
         <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" id="subevent">
          <div ng-repeat="sevent in allsubevent">
            <!-- an-attr-id="{{sevent.meid}}"  -->
          <h4><a ng-click="selectEvent(sevent.subevent_name)">{{sevent.subevent_name}}</a></h4>
          </div>
        </div>
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-md-offset-1 col-xs-offset-1">
      <div class="row">
        <input class="inputf col-xs-7 col-ms-5 col-md-5 col-md-offset-1" type="text" name="selectedevent" id="selectedevent" placeholder="selected event" required ng-attr-value="{{selectedevent}}">
        <input class="inputf col-xs-4 col-ms-5 col-md-5 col-md-offset-1 col-xs-offset-1" placeholder="techfiesta id" type="text" name="techid" id="techid" required>
      </div>
          
      <input type="button" class="fbutton btn btn-primary btn-sm col-xs-5 col-ms-3 col-md-3 col-md-offset-5 col-xs-offset-5" ng-click="eventRegister('eventreg')" value="Event Register">
        </div>
    </div>