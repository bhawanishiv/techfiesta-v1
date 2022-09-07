<div ng-controller="dashboardCtrl" ng-cloak>  
    <ul id="dropdownAccount" class="dropdown-content">
        <li ng-if="profile.type == 'admin' || profile.type == 'superadmin'" ><a href="<?php echo dashboard; ?>"><i class="material-icons left">account_circle</i>{{web.actions.dashboard}}</a></li>
        <li><a href="<?php echo account; ?>profile" ><i class="material-icons left">account_circle</i>{{web.actions.profile}}</a></li>
        <li class="divider"></li>
        <li><a href="<?php echo account; ?>logout" ><i class="material-icons left">exit_to_app</i>{{web.actions.logout}}</a></li>
    </ul>
    <ul id="dropdownThrowback" class="dropdown-content">
        <li><a href="../throwback/2k16">Techfiesta 2016</a></li>
        <li><a href="../throwback/2k17">Techfiesta 2017</a></li>
    </ul>

    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="<?php echo URL; ?>" class="brand-logo"><img class="responsive-img" style="max-height:3rem; margin-left:10px; margin-top:8px;" ng-src="<?php echo URL; ?>public/images/techfiesta_full_color.png"></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="<?php echo dashboard; ?>">{{web.data.home}}</a></li>
                    <li><a href="<?php echo dashboard . 'departments/'; ?>">{{web.data.departments}}</a></li>
                    <li><a href="<?php echo dashboard . 'events/'; ?>">{{web.data.events}}</a></li>
                    <li><a href="<?php echo dashboard . 'school/'; ?>">{{web.data.school}}</a></li>
                    <li><a href="<?php echo dashboard . 'users/'; ?>">{{web.data.users}}</a></li>
                    <li><a href="<?php echo dashboard . 'participation/'; ?>">{{web.data.participation}}</a></li>
                    <li><a href="<?php echo dashboard . 'payments/'; ?>">{{web.data.payments}}</a></li>
                    <li><a href="<?php echo dashboard . 'team/'; ?>">{{web.data.team}}</a></li>
                    <li><a href="<?php echo dashboard . 'messages/'; ?>">{{web.data.messages}}</a></li>
                    <li><a href="<?php echo dashboard . 'hospitality/'; ?>">{{web.data.hospitality}}</a></li>
                    <li><a href="<?php echo dashboard . 'others/'; ?>">{{web.data.others}}</a></li>
                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdownAccount">
                            <img ng-if="view.profile" ng-src="<?php echo URL; ?>{{profile.images[0].source}}" style="max-height: 2.5rem; margin-top:6px;" class="circle responsive-img">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <ul class="sidenav collapsible collapsible-accordion" id="mobile-demo">
        <li><a href="<?php echo dashboard; ?>">{{web.data.home}}</a></li>
        <li><a href="<?php echo dashboard . 'departments/'; ?>">{{web.data.departments}}</a></li>
        <li><a href="<?php echo dashboard . 'events/'; ?>">{{web.data.events}}</a></li>
        <li><a href="<?php echo dashboard . 'school/'; ?>">{{web.data.school}}</a></li>
        <li><a href="<?php echo dashboard . 'users/'; ?>">{{web.data.users}}</a></li>
        <li><a href="<?php echo dashboard . 'participation/'; ?>">{{web.data.participation}}</a></li>
        <li><a href="<?php echo dashboard . 'payments/'; ?>">{{web.data.payments}}</a></li>
        <li><a href="<?php echo dashboard . 'team/'; ?>">{{web.data.team}}</a></li>
        <li><a href="<?php echo dashboard . 'messages/'; ?>">{{web.data.messages}}</a></li>
        <li><a href="<?php echo dashboard . 'hospitality/'; ?>">{{web.data.hospitality}}</a></li>
        <li><a href="<?php echo dashboard . 'others/'; ?>">{{web.data.others}}</a></li>     
        <li  ng-if="view.profile" class="bold"><a class="collapsible-header waves-effect" tabindex="1"><i class="material-icons right">keyboard_arrow_down</i><img ng-src="<?php echo URL; ?>{{profile.images[0].source}}" style="max-height: 2.5rem; margin-top:5px; padding-right:10px;" class="circle responsive-img left"> {{profile.fName}}</a>
            <div class="collapsible-body">
                <ul>
                    <li ng-if="profile.type == 'admin' || profile.type == 'superadmin'" ><a href="<?php echo dashboard; ?>"><i class="material-icons left">account_circle</i>{{web.actions.dashboard}}</a></li>
                    <li><a href="<?php echo account; ?>profile" ><i class="material-icons left">account_circle</i>{{web.actions.profile}}</a></li>
                    <li><a href="<?php echo account; ?>logout" ><i class="material-icons left">exit_to_app</i>{{web.actions.logout}}</a></li>
                </ul>
            </div>
        </li>
    </ul>
    <div class="container">
