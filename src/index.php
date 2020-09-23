<?php

require_once "db.php";

$url = $_SERVER["REQUEST_URI"];

$zacatek_index_php = strpos($url, "index.php");
$zacatek_zajimave_casti = $zacatek_index_php + strlen("index.php");

if($zacatek_index_php)
{
    $zakladni_url = substr($url, 0, $zacatek_index_php);

    $zajimava_cast = substr($url, $zacatek_zajimave_casti);
    $casti_url = explode("/", $zajimava_cast);
}
else
{
    $zakladni_url = $url;

    $zajimava_cast = "";
    $casti_url = [];
}

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
{
    $controller = "stranky";
    $akce = "default";
}
else if($akce == null)
{
    $controller = "stranky";
    $akce = "error";
}

// nastavili jsme defaultni chovani pri neuplne URL

require_once "views/layout.php";

// zbytek se resi na strance s layoutem
