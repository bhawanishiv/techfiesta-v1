<!doctype html>
<html ng-app="techfiesta" ng-controller="languageCtrl" ng-cloak>
    <head>
        <title><?php echo $this->web['title']; ?></title>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?php echo $this->web['icon']; ?>">
        <meta name="theme-color" content="<?php echo $this->web['themeColor']; ?>">
        <meta name="description" content="<?php echo $this->web['description']; ?>">
        <meta name="keywords" content="<?php echo $this->web['keywords']; ?>">
        <meta name="image" content="<?php echo $this->web['imageUrl']; ?>">
        <meta name="author" content="<?php echo $this->web['author']; ?>">
        <meta name="google-signin-scope" content="<?php echo $this->web['gSignInScope']; ?>">
        <meta name="google-signin-client_id" content="<?php echo $this->web['gSignInClientId']; ?>">        

        <!--Essential Meta Tags-->
        <meta property="og:title" content="<?php echo $this->web['title']; ?>">
        <meta property="og:description" content="<?php echo $this->web['description']; ?>">
        <meta property="og:image" content="<?php echo $this->web['imageUrl']; ?>">
        <meta property="or:url" content="<?php echo $this->web['url']; ?>">
        <meta property="twitter-card" content="<?php echo $this->web['imageUrl']; ?>">

        <!--Non-Essential, But Recommended--> 
        <meta property="og:site_name" content="<?php echo $this->web['title']; ?>">
        <meta property="twitter:image:alt" content="<?php echo $this->web['imageAlt']; ?>">

        <!--Non-Essential, But Required for Analytics-->
        <meta property="fb:app_id" content="<?php echo $this->web['fbAppId']; ?>">
        <meta property="twitter:site" content="<?php echo $this->web['twitter']; ?>">

        <link rel="me" href="<?php echo $this->web['twitter']; ?>">
        <?php foreach ($this->web['styles'] as $key => $value) {
            ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $value; ?>">
        <?php }
        ?>
    </head>
    <body>

