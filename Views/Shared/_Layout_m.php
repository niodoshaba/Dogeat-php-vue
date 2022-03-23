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
        <title> <?= $viewBag->GetTitle() ?></title>
        <meta name="description" content="<?= $viewBag->Description ?>" />
        <link rel="shortcut icon" type="image/x-icon" href="<?= Url::Img('logo.png') ?>" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8" />
        <meta name="viewport" content="user-scalable=no">

        <?php
        Bundle::Css('test_css', array(
            'Content/css/aos.css',
            'Content/css/css_m/header_footer.css',
            'Content/css/css_m/style.css?a=3456',
        ));
        Bundle::Js('test_js', array(
            // 'Content/js/lazy-line-painter-1.9.6.min.js',
            'Content/js/jquery.min.js',
            'Content/js/TweenMax.min.js',
            'Content/js/aos.js',
            'Content/js/anime.min.js',
            'Content/js/lib/owl.carousel.min.js',
            'Content/js/main.js',
        ));
        ?>
    </head>
    <body>

    <?php
        Bundle::PHP('layout', array(
            "Views/Shared/_Layout_m/_Header.php",
            "Views/{$bodyView}",
            "Views/Shared/_Layout_m/_ShoppingCart.php",
            "Views/Shared/_Layout_m/_Footer.php"
        ));
        Bundle::Js('test_js', array(
            'Content/js/facebook_login.js'
        ));
    ?>

    </body>
</html>
