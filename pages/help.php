<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Hotelverwaltung - Hilfe</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/css/theme.css" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once "../menubar.php";
        ?>
        <div id="helpContainer" class="container-fluid overlay quarter-width text-center footer-margin-bottom">
            <h1>Hotelverwaltung</h1>
            <p>Anonyme User können über Home auf unseren News Feed zugreifen und auch das Impressum, sowie die Hilfeseite aufrufen. </a>
            <p>Bei jeglichen Fragen und Beschwerden rund um das Hotel senden Sie bitte eine E-Mail an
            <a href="mailto: hotelverwaltung-hu-lerchl@technikum-wien.at">hotelverwaltung-hu-lerchl@technikum-wien.at</a>
            </p>
            <p>Für registrierte Gäste steht auch ein Ticket-System zur Verfügung, auf welches Sie Zugriff haben, wenn Sie eingeloggt sind.</p>
            <p>Bei Problemen mit der Anmeldung oder bei einem vergessenem Passwort melden Sie sich bitte beim Empfang.</p>
        </div>
        <?php
            require_once "../util/bottomIncludes.php";
        ?>
    </body>
</html>
