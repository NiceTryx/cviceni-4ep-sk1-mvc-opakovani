<?php

class Uzivatele
{
    private function registracni_udaje_jsou_kompletni()
    {
        if(!isset($_POST["jmeno"]))
            return false;
        if(empty(trim($_POST["jmeno"])))
            return false;

        if(!isset($_POST["heslo"]))
            return false;
        if(empty(trim($_POST["heslo"])))
            return false;

        if(!isset($_POST["heslo_znovu"]))
            return false;
        if(empty(trim($_POST["heslo_znovu"])))
            return false;

        return true;
    }

    private function registracni_udaje_jsou_v_poradku($jmeno, $heslo, $heslo_znovu)
    {
        // TO DO
    }

    public function registrovat()
    {
        if(registracni_udaje_jsou_kompletni())
        {
            // zpracovani dat z formulare
            $jmeno = trim($_POST["jmeno"]);
            $heslo = trim($_POST["heslo"]);
            $heslo_znovu = trim($_POST["heslo_znovu"]);

            if(registracni_udaje_jsou_v_poradku($jmeno, $heslo, $heslo_znovu))
                $uzivatel = new Uzivatel($jmeno, $heslo);
        }
        else
        {
            // zobrazeni formulare k vyplneni
            require_once "views/uzivatele/registrovat.php";
        }
    }

    public function prihlasit()
    {

    }

    public function odhlasit()
    {

    }
}
