<div style="background: url(<?php echo URL ?>public/images/home/back.gif);
     background-repeat: no-repeat;background-size: cover;
     background-position: center center;
     background-attachment:fixed;">
    <div class="row">
        <img class="responsive-img" src="<?php echo URL ?>public/images/home/upper.png">
    </div>
    <div class="container">
        <div class="row">
            <!--<div class="col s2 m2 l2"> <img class="img-responsive" src="<?php echo URL ?>public/images/home/left.png"></div>-->
            <div class="col s2 m2 l2">
                <a class="tooltipped" data-position="right" data-tooltip="{{web.data.about}}" href="<?php echo about; ?>">
                    <img class="responsive-img auto-vertical" ng-src="<?php echo URL; ?>public/images/books.png">
                </a>
            </div>
            <div class="col s8 m8 l8 circle1 center-align">
                <img class="responsive-img" id="firstcircle" src="<?php echo URL ?>public/images/home/circle2.png">
            </div>
            <div class="col s2 m2 l2">
                <a class="tooltipped" data-position="left" data-tooltip="{{web.data.events}}" href="<?php echo events; ?>">
                    <img class="responsive-img auto-vertical" ng-src="<?php echo URL; ?>public/images/events_white.png">
                </a>
            </div>
            <!--<div class="bars col s2 m2 l2"> <img class="img-responsive pull-right" src="<?php echo URL ?>public/images/home/right.png">  </div>-->

        </div>
    </div>    
</div>
<div class = "section black darken-4 white-text">
    <div class = "row container">
        <p>Download resulsts here</p>
        <a class="btn waves-effect" href="<?php echo events;?>results">Results</a>
    </div>
</div>