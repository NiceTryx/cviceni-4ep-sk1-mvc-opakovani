<?php

require_once "db.php";

$url = $_SERVER["REQUEST_URI"];

$zacatek = strpos($url, "index.php") + strlen("index.php");
$zajimava_cast = substr($url, $zacatek);
$casti_url = explode("/", $zajimava_cast);

$controller = null;
$akce = null;
$parametry = [];

if(count($casti_url) > 1)
    $controller = $casti_url[1];
if(count($casti_url) > 2)
    $akce = $casti_url[2];
if(count($casti_url) > 3)
    for($i = 3; $i < count($casti_url); $i++)
        $parametry[] = $casti_url[$i];

// z URL jsme ziskali pozadovany controller, akci a jeji pripadne parametry

if($controller == null)
    $controller = "stranky";
else if($akce == null)
    $akce = "default";

// nastavili jsme defaultni chovani pri neuplne URL

require_once "views/layout.php";

// zbytek se resi na strance s layoutem
