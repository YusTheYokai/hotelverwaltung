<?php
    require_once "../../guard.php";
    session_start();
    guardAdmin();
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <title>Hotelverwaltung - Nutzerregistrierung</title>
        <link rel="icon" href="/icon/hotelIcon.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/theme.css" rel="stylesheet">
        <link href="/css/entry.css" rel="stylesheet">
    </head>
    <body>
        <?php
            $lang = parse_ini_file("../../lang/de.ini", TRUE);
            require_once "../../menubar.php";
        ?>

        <div id="registrationContainer" class="container-fluid overlay quarter-width">
            <h1>Nutzerregistrierung</h1>
            <form class="text-center" method="POST" action="registerUser.php">
                <div class="form-group">
                    <input type="text" id="username" name="USERNAME" class="input-text form-control" required minlength="3" maxlength="20" placeholder="<?=$lang["USERNAME"]?>" />
                </div>
                <div class="form-group mt-3">
                    <select id="honorific" name="HONORIFIC" class="input-text form-control" required>
                        <option value selected disabled><?=$lang["HONORIFIC"]?></option>
                        <option value="0">Herr</option>
                        <option value="1">Frau</option>
                        <option value="2">Divers</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <input type="text" id="lastName" name="LAST_NAME" class="input-text form-control" required minlength="2" maxlength="30" placeholder="<?=$lang["LAST_NAME"]?>" /> 
                </div>
                <div class="form-group mt-3">
                    <input type="text" id="firstName" name="FIRST_NAME" class="input-text form-control" required minlength="2" maxlength="30" placeholder="<?=$lang["FIRST_NAME"]?>" />
                </div>
                <div class="form-group mt-3">
                    <input type="email" id="email" name="EMAIL" class="input-text form-control" required minlength="5" maxlength="50" placeholder=<?=$lang["EMAIL"]?> />
                </div>
                <div class="form-group mt-3">
                    <input type="password" id="password" name="PASSWORD" class="input-text form-control" required minlength="8" maxlength="50" placeholder=<?=$lang["PASSWORD"]?> />
                </div>
                <div class="form-group btn-group mt-3" style="display: flex;">
                    <input type="radio" id="guestRadioButton" name="ROLE" class="btn-check" value="0" autocomplete="off" checked>
                    <label class="btn btn-primary" style="width: 50%;" for="guestRadioButton">Gast</label>

                    <input type="radio" id="technicianRadionButton" name="ROLE" class="btn-check" value="1" autocomplete="off">
                    <label class="btn btn-primary" style="width: 50%;" for="technicianRadionButton">Servicetechniker*in</label>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Registrieren</button>
            </form>
        </div>
        <?php
            require_once "../../util/bottomIncludes.php";
        ?>
    </body>
</html>

