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
        if(strlen($jmeno) < 1)
            return false;
        if(strlen($heslo) < 1)
            return false;
        if($heslo_znovu != $heslo)
            return false;

        return true;
    }

    public function registrovat()
    {
        if($this->registracni_udaje_jsou_kompletni())
        {
            // zpracovani dat z formulare
            $jmeno = trim($_POST["jmeno"]);
            $heslo = trim($_POST["heslo"]);
            $heslo_znovu = trim($_POST["heslo_znovu"]);

            if($this->registracni_udaje_jsou_v_poradku($jmeno, $heslo, $heslo_znovu))
            {
                $heslo = password_hash($heslo, PASSWORD_DEFAULT);
                $uzivatel = new Uzivatel($jmeno, $heslo);
                
                if($uzivatel->zaregistrovat())
                    return spustit("uzivatele", "prihlasit");
                else
                    return spustit("stranky", "error");
            }
            else
                require_once "views/uzivatele/registrovat.php";
        }
        else
        {
            // zobrazeni formulare k vyplneni
            require_once "views/uzivatele/registrovat.php";
        }
    }

    public function prihlasit()
    {
        require_once "views/uzivatele/prihlasit.php";
    }

    public function odhlasit()
    {

    }
}
