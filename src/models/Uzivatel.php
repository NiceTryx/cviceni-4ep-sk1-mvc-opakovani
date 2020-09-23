<?php

require_once "db.php";

class Uzivatel
{
    private $jmeno;
    private $heslo;

    public function __construct($jmeno, $heslo)
    {
        $this->jmeno = $jmeno;
        $this->heslo = $heslo;
    }

    public function zaregistrovat()
    {
        $spojeni = DB::pripojit();

        $dotaz = "INSERT INTO 4ep_sk1_mvc_uzivatele (jmeno, heslo) VALUES ('$this->jmeno', '$this->heslo')";
        mysqli_query($spojeni, $dotaz);

        return (mysqli_affected_rows($spojeni) == 1);
    }
}
