<style>
    .h1{
        font-size:2.5em;
    }
    .body{
        background:#f1f1f1;
    }
    .h1 a{
        color:#6b6b6b;
    }
    .brand-logo{
        width:8%;
        height:8%;
    }
</style>
<div class=body>
    <div class="container">
        <h1 class="h1">
            <a href="<?php echo URL ?>">
                <img class="brand-logo" src="<?php nURL ?>public/images/lipikaar_color.svg">
                लिपिकार
            </a>
        </h1>
        <div class="card">
            <div class="card-content">
                <div class="card-title"><?php echo $mail['title']; ?></div>
                    <p><?php echo $mail['content']; ?><p>
                </div>
                <div class="card-action">
                    <a href="<?php echo $mail['btnHref']; ?>" class="btn">
                        <?php echo $mail['btnTitle'];?>
                    </a>
                </div>
            </div>
        </div>
    </div>