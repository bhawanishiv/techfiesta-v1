<div ng-controller="eventCtrl">
    <?php foreach ($this->departments as $department) {
        ?>
        <div class = "parallax-container">
            <div class = "parallax"><img ng-src = "<?php echo URL . $department['image'][0]['source']; ?>" alt = "<?php echo $department['name']; ?>"></div>
        </div>
        <div class = "section black darken-4 white-text">
            <div class = "row container">
                <h2 class = "header"><?php echo $department['name']; ?></h2>
                <a class = "waves-effect waves-light btn" href = "<?php echo events . 'view/' . $department['departmentId']; ?>">{{web.actions.view}}</a>                
            </div>
        </div>

        <?php
    }
    ?>
</div>