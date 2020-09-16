<?php

function spustit($pozadovany_controller, $pozadovana_akce)
{
    require_once "controllers/" . $pozadovany_controller . "_controller.php";

    switch($pozadovany_controller)
    {
        case "stranky":
            $aktivni_controller = new Stranky();
            break;
        case "uzivatele":
            $aktivni_controller = new Uzivatele();
            require_once "models/Uzivatel.php";
            $aktivni_model = new Uzivatel();
            break;
    }

    // hle, lifehack
    $aktivni_controller->{$pozadovana_akce}();
}

// co je povoleno
$controllery_a_akce = array(
    "stranky" => array(
        "default",
        "error",
    ),
    "uzivatele" => array(
        "registrovat",
        "prihlasit",
        "odhlasit",
    ),
);

if(array_key_exists($controller, $controllery_a_akce) &&
   in_array($akce, $controllery_a_akce[$controller]))
{
    spustit($controller, $akce);
}
else
{
    spustit("stranky", "error");
}
