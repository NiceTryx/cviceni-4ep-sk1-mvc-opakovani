<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC PHP</title>
</head>
<body>
    <header>
        <h1>MVC PHP</h1>
        <a href="<?php echo $zakladni_url; ?>index.php/stranky/default/">Domů</a>
        <?php
            if(isset($_SESSION["prihlaseny_uzivatel"]))
            {
        ?>
        <a href="<?php echo $zakladni_url; ?>index.php/stranky/profil/">Profil</a>
        <?php
            }
            else
            {
        ?>
        <a href="<?php echo $zakladni_url; ?>index.php/uzivatele/registrovat/">Registrace</a>
        <a href="<?php echo $zakladni_url; ?>index.php/uzivatele/prihlasit/">Přihlášení</a>
        <?php
            }
        ?>
    </header>
    <main>
        <?php require_once "router.php"; ?>
    </main>
    <footer>
        <p>&copy; 2020 Jakub Šenkýř</p>
    </footer>
</body>
</html>
