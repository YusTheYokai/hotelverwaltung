<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hotelverwaltung - Impressum</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/css/theme.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include "../menubar.php";
        ?>

        <div id="imprintContainer" class="container-fluid overlay quarter-width text-center footer-margin-bottom">
            <h1>Impressum</h1>
            <p>Hotelverwaltung Hu-Lerchl</p>
            <p>Inhaber Hu Janko und Lerchl Nico</p>
            <picture> 
              <img style="width: 10vh; height: auto;" src="/images/bild_janko.gif"> 
              <img style="width: 10vh; height: auto;" src="/images/bild_nico.jpg"> 
            </picture>  
            <p>Eingetragenes Einzelunternehmen</p>
            <p>Hotel</p>
            <p>UID-Nr: ATU12345678</p>
            <p>FN: 123456a</p>
            <p>FB Gericht: Wien</p>
            <p>Sitz: 1200 Wien</p>
            <p>Höchstädtplatz 6 | Österreich</p>
            <p>Tel: +43 699 18989999</p>
            <p>E-Mail:  <a href="mailto: if21b056@technikum-wien.at">Hu</a> 
                        <a href="mailto: if21b236@technikum-wien.at">Lerchl</a>
            </p>
            <p>Verbraucher haben die Möglichkeit,
                Beschwerden an die Online Streitbeilegungsplattform der EU zu
                richten: <a href="http://ec.europa.eu/odr">http://ec.europa.eu/odr</a>.
                Sie können allfällige Beschwerde auch an
                die oben angegebene E-Mail-Adresse
                richten.</p>
        </div>    
        <?php
            require_once "../util/bottomIncludes.php";
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
