<!DOCTYPE html>
<html lang="de">
    <head>
        <title>Gastregister</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/theme.css" rel="stylesheet">
        <link href="css/base.css" rel="stylesheet">
        <link href="css/entry.css" rel="stylesheet">
    </head>
    <body>
        <?php
            $lang = parse_ini_file("lang/de.ini", TRUE)['registration'];
            include "menubar.php";
        ?>

        <div id="registrationContainer" class="container-fluid overlay">
            <h1>Gastregister</h1>
            <form class="text-center" action="registrationController.php" method="get">
                <div class="form-group">
                    <input type="email" id="email" name="email" class="input-text form-control" required placeholder=<?=$lang["email"]?> />
                </div>
                <div class="form-group mt-3">
                <select id="honorifics" name="honorifics" class="input-text form-control" required>
                        <option value selected disabled>Ihre Auswahl</option>
                        <option value="male">Herr</option>
                        <option value="female">Frau</option>,
                        <option value="other">Divers</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <input type="text" id="firstName" name="firstName" class="input-text form-control" required maxlength="50" placeholder="<?=$lang["firstName"]?>" />
                </div>
                <div class="form-group mt-3">
                    <input type="text" id="lastName" name="lastName" class="input-text form-control" required maxlength="50" placeholder="<?=$lang["lastName"]?>" /> 
                </div>
                <div class="form-group mt-3">
                    <input type="text" id="postalCode" name="postalCode" class="input-text form-control" required minlength="3" placeholder="<?=$lang["postalCode"]?>">   
                </div>
                <div class="form-group mt-3">
                    <input type="text" id="place" name="place" class="input-text form-control" required placeholder="<?=$lang["place"]?>">
                </div>
                <div class="form-group mt-3">
                    <input type="text" id="street" name="street" class="input-text form-control" required placeholder="<?=$lang["street"]?>">  
                </div>
                <div class="form-group mt-3">
                    <input type="text" id="housenumber" name="housenumber" class="input-text form-control" required maxlength="10" placeholder="<?=$lang["housenumber"]?>">
                </div>
                <p id="alreadyRegistered"><a href="login.php">Sie sind bereits registiert?</a></p>
                <button type="submit" class="btn btn-primary mt-4">Registrieren</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>

