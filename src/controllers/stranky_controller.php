<?php

class Stranky
{
    public function default()
    {
        require_once "views/stranky/default.php";
    }

    public function error()
    {
        require_once "views/stranky/error.php";
    }

    public function profil()
    {
        require_once "views/stranky/profil.php";
    }
}
