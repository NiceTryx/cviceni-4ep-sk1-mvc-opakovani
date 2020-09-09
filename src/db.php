<?php

require_once "../../config.php";

class DB
{
    static private $spojeni;

    static public function pripojit()
    {
        if(self::$spojeni != null)
            self::$spojeni = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        return self::$spojeni;
    }
}
