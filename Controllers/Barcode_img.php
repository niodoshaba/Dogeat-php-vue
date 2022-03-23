<?php

namespace Controllers;

use Bang\MVC\ControllerBase;
use Models\DogcUrl;

/**
 * 主頁面Controller
 * @author Bang
 */
class Barcode_img extends ControllerBase {
    public function Barcode_img1() {
        header('Content-type: image/gif');
        $fontSize = 10;   // GD1 in px ; GD2 in point
        $marge    = 10;   // between barcode and hri in pixel
        $x        = 250;  // barcode center
        $y        = 30;  // barcode center
        $height   = 50;   // barcode height in 1D ; module size in 2D
        $width    = 2;    // barcode height in 1D ; not use in 2D
        $angle    = 0;   // rotation in degrees : nb : non horizontable barcode might not be usable because of pixelisation
        $code     = $_SESSION["Barcode1"]; // barcode, of course ;)
        $type     = 'code39';

        $im     = imagecreatetruecolor(500, 60);
        $black  = ImageColorAllocate($im,0x00,0x00,0x00);
        $white  = ImageColorAllocate($im,0xff,0xff,0xff);
        imagefilledrectangle($im, 0, 0, 500, 100, $white);
        \Bang\Lib\Barcode::gd($im, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);
        imagegif($im);
        imagedestroy($im);
        unset($_SESSION["Barcode1"]);
        //echo $_SESSION["ecpay_return_info"]["Barcode1"];
    }
    public function Barcode_img2() {
        header('Content-type: image/gif');
        $fontSize = 10;   // GD1 in px ; GD2 in point
        $marge    = 10;   // between barcode and hri in pixel
        $x        = 250;  // barcode center
        $y        = 30;  // barcode center
        $height   = 50;   // barcode height in 1D ; module size in 2D
        $width    = 2;    // barcode height in 1D ; not use in 2D
        $angle    = 0;   // rotation in degrees : nb : non horizontable barcode might not be usable because of pixelisation
        $code     = $_SESSION["Barcode2"]; // barcode, of course ;)
        $type     = 'code39';

        $im     = imagecreatetruecolor(500, 60);
        $black  = ImageColorAllocate($im,0x00,0x00,0x00);
        $white  = ImageColorAllocate($im,0xff,0xff,0xff);
        imagefilledrectangle($im, 0, 0, 500, 100, $white);
        \Bang\Lib\Barcode::gd($im, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);
        imagegif($im);
        imagedestroy($im);
        unset($_SESSION["Barcode2"]);
        //echo $_SESSION["ecpay_return_info"]["Barcode1"];
    }
    public function Barcode_img3() {
        header('Content-type: image/gif');
        $fontSize = 10;   // GD1 in px ; GD2 in point
        $marge    = 10;   // between barcode and hri in pixel
        $x        = 250;  // barcode center
        $y        = 30;  // barcode center
        $height   = 50;   // barcode height in 1D ; module size in 2D
        $width    = 2;    // barcode height in 1D ; not use in 2D
        $angle    = 0;   // rotation in degrees : nb : non horizontable barcode might not be usable because of pixelisation
        $code     = $_SESSION["Barcode3"]; // barcode, of course ;)
        $type     = 'code39';

        $im     = imagecreatetruecolor(500, 60);
        $black  = ImageColorAllocate($im,0x00,0x00,0x00);
        $white  = ImageColorAllocate($im,0xff,0xff,0xff);
        imagefilledrectangle($im, 0, 0, 500, 100, $white);
        \Bang\Lib\Barcode::gd($im, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);
        imagegif($im);
        imagedestroy($im);
        unset($_SESSION["Barcode3"]);
        //echo $_SESSION["ecpay_return_info"]["Barcode1"];
    }
}
