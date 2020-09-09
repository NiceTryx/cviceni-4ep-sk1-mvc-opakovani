<?php

require_once "db.php";

$url = $_SERVER["REQUEST_URI"];

$odkud = strpos($url, "index.php") + strlen("index.php");
$zajimava_cast = substr($url, $odkud);
$casti_url = explode("/", $zajimava_cast);

$controller = $casti_url[1];
$akce = $casti_url[2];

$parametry = [];

for($i = 3; $i < count($casti_url); $i++)
    $parametry[] = $casti_url[$i];

// z URL jsme ziskali pozadovany controller, akci a jeji pripadne parametry

