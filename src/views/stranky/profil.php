<?php
    if(!isset($_SESSION["prihlaseny_uzivatel"]))
        die();
    else
        $prihlaseny_uzivatel = $_SESSION["prihlaseny_uzivatel"];
?>

<p>Jste přihlášeni jako <b><?php echo $prihlaseny_uzivatel; ?></b>.</p>

<form action="<?php echo $zakladni_url; ?>index.php/uzivatele/odhlasit.php">
    <input type="submit" value="Odhlásit" />
</form>
