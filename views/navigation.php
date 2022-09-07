<div ng-controller="navigationCtrl" ng-cloak>

    <div class="navbar-fixed">
        <ul id="dropdownAccount" class="dropdown-content">
            <li ng-if="user.type == 'admin' || user.type == 'superadmin'" ><a href="<?php echo dashboard; ?>"><i class="material-icons left">account_circle</i>{{web.actions.dashboard}}</a></li>
            <li><a href="<?php echo account; ?>profile" ><i class="material-icons left">account_circle</i>{{web.actions.profile}}</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo account; ?>logout" ><i class="material-icons left">exit_to_app</i>{{web.actions.logout}}</a></li>
        </ul>
        <ul id="dropdownThrowback" class="dropdown-content">
            <li><a href="../throwback/2k16">Techfiesta 2016</a></li>
            <li><a href="../throwback/2k17">Techfiesta 2017</a></li>
        </ul>
        <nav>
            <div class="nav-wrapper  grey darken-4">
                <a href="<?php echo URL; ?>" class="brand-logo"><img class="responsive-img" style="max-height:3rem; margin-left:10px; margin-top:8px;" ng-src="<?php echo URL; ?>public/images/techfiesta_full_color.png"></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="<?php echo URL; ?>">{{web.data.home}}</a></li>
                    <li><a href="<?php echo about; ?>">{{web.data.about}}</a></li>
                    <li><a href="<?php echo events; ?>">{{web.data.events}}</a></li>
                    <li><a href="<?php echo events.'school'; ?>">{{web.data.schoolevents}}</a></li>
                    <li><a href="<?php echo support . 'contact'; ?>">{{web.data.contactus}}</a></li>
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdownThrowback">{{web.data.throwbacks}}<i class="material-icons right">keyboard_arrow_down</i></a></li>
                    <li ng-if="!view.account"><a href="<?php echo account; ?>login">{{web.links.login}}</a></li>
                    <li ng-if="!view.account"><a href="<?php echo account; ?>create">{{web.links.createaccount}}</a></li>
                    <li>
                        <a class="dropdown-trigger" href="#!" data-target="dropdownAccount">
                            <img ng-if="view.account" ng-src="<?php echo URL; ?>{{user.images[0].source}}" style="max-height: 2.5rem; margin-top:6px;" class="circle responsive-img">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <ul class="sidenav collapsible collapsible-accordion" id="mobile-demo">
        <li><a href="<?php echo URL; ?>">{{web.data.home}}</a></li>
        <li><a href="<?php echo about; ?>">{{web.data.about}}</a></li>
        <li><a href="<?php echo events; ?>">{{web.data.events}}</a></li>
        <li><a href="<?php echo events.'/school'; ?>">{{web.data.schoolevents}}</a></li>
        <li><a href="<?php echo support . 'contact'; ?>">{{web.data.contactus}}</a></li>
        <li class="bold"><a class="collapsible-header waves-effect" tabindex="0"><i class="material-icons right">keyboard_arrow_down</i>{{web.data.throwbacks}}</a>
            <div class="collapsible-body">
                <ul>
                    <li><a href="../throwback/2k16">Techfiesta 2016</a></li>
                    <li><a href="../throwback/2k17">Techfiesta 2017</a></li>
                </ul>
            </div>
        </li>
        <li ng-if="!view.account"><a href="<?php echo account; ?>login">{{web.links.login}}</a></li>
        <li ng-if="!view.account"><a href="<?php echo account; ?>create">{{web.links.createaccount}}</a></li>
        <li  ng-if="view.account" class="bold"><a class="collapsible-header waves-effect" tabindex="1"><i class="material-icons right">keyboard_arrow_down</i><img ng-src="<?php echo URL; ?>{{user.images[0].source}}" style="max-height: 2.5rem; margin-top:5px; padding-right:10px;" class="circle responsive-img left"> {{user.fName}}</a>
            <div class="collapsible-body">
                <ul>
                    <li ng-if="user.type == 'admin' || user.type == 'superadmin'" ><a href="<?php echo dashboard; ?>"><i class="material-icons left">account_circle</i>{{web.actions.dashboard}}</a></li>
                    <li><a href="<?php echo account; ?>profile" ><i class="material-icons left">account_circle</i>{{web.actions.profile}}</a></li>
                    <li><a href="<?php echo account; ?>logout" ><i class="material-icons left">exit_to_app</i>{{web.actions.logout}}</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>



