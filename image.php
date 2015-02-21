<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require_once (__DIR__ . '/vendor/autoload.php');

require_once ('scraper.php');

use GDText\Box;
use GDText\Color;

$res = scrape();

$w = 800;
$h = 600;

if ($res['vesselCount'] > 0) {
	$text = "Yes";
} else {
	$text = "No";
}

$im = imagecreatetruecolor($w, $h);

$white = "255, 255, 255";

$white = imagecolorallocate($im, 255, 255, 255);

imagefill($im, 0, 0, $white);

$box = new Box($im);
$box -> setFontFace(__DIR__ . '/Vera-Bold.ttf');
$box -> setFontSize(200);
$box -> setFontColor(new Color(0, 0, 0));
$box -> setBox(0, 0, $w, $h);
$box -> setTextAlign('center', 'center');
$box -> draw($text);

header("Content-type: image/png");
imagepng($im);
