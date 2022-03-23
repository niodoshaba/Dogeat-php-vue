<?php

use Bang\Lib\Bundle;
use Bang\Lib\ResponseBag;
use Bang\Lib\ViewBag;
use Bang\Lib\Url;

$bodyView = ResponseBag::Get("View");
$viewBag = ViewBag::Get();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title><?= $viewBag->GetTitle() ?></title>
        <meta name="description" content="<?= $viewBag->Description ?>" />
        <link rel="shortcut icon" type="image/x-icon" href="<?= Url::Img('logo.png') ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8" />
        <script data-ad-client="ca-pub-2779302797910336" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <?php
        Bundle::Css('test_css', array(
            'Content/css/aos.css',
        ));
        Bundle::Js('test_js', array(
            // 'Content/js/lazy-line-painter-1.9.6.min.js',
            'Content/js/jquery.min.js',
            'Content/js/lib/vue.js',
            'Content/js/TweenMax.min.js',
            'Content/js/aos.js',
            'Content/js/anime.min.js',
            'Content/js/main.js'
        ));
        ?>
        <script data-ad-client="ca-pub-8658390305128284" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </head>
    <body style="margin: 0;">
        <?php
        Bundle::PHP('layout', array(
            "Views/Shared/_Layout/_ShoppingCart.php",
            "Views/Shared/_Layout/_Header.php",
            "Views/{$bodyView}",
            "Views/Shared/_Layout/_Footer.php"
        ));
        ?>

    </body>
    <?php 
        Bundle::Js('test_js', array(
            'Content/js/facebook_login.js',
        ));
    ?>
</html>
