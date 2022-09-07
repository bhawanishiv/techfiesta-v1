<div ng-controller="eventCtrl">
    <?php
    foreach ($this->events as $event) {
        ?>
        <div class="parallax-container">
            <div class="parallax"><img ng-src="<?php echo URL . $event['file'][0]['source']; ?>" alt="<?php echo $event['name']; ?>"></div>
        </div>   
        <div class="section black darken-4 white-text">
            <div class="row container">
                <h2 class="header"><?php echo $event['name']; ?></h2>
                <h4>{{web.data.about}}</h4>
                <p><?php echo $event['about']; ?></p>
                <h4>{{web.data.challenge}}</h4>
                <p><?php echo $event['challenge']; ?></p>
                <a class="waves-effect waves-light btn" href="<?php echo URL . $event['file'][1]['source'] ?>" target="_blank">{{web.actions.view}}</a>
            </div>
        </div>  

        <?php
    }
    ?>

</div>