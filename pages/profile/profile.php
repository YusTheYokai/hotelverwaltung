<?php
    require_once "../../guard.php";
    require_once "../../db/logIntoDB.php";
    require_once "../../util/validation/validation.php";

    session_start();

    // Wenn die User-ID als Parameter übergeben wird soll das Profil dieses Users angezeigt werden.
    //$id = isset($_GET["userId"]) ? $_GET["userId"] : $_SESSION["user"]["ID"];

    $validator = new Validator(new NumberValidateable("USER_ID", $_GET, 0, PHP_INT_MAX));
    $validator->validate();
    if ($validator->hasFailed()) {
        header("Location: ../user/users.php?" . $validator->generateUrlErrorParams());
        exit;
    }

    // Laden des Users aus der Datenbank
    // Auch wenn man sein eigenes Profil bearbeiten möchte macht es Sinn,
    // den User erneut aus der Datenbank zu laden, da man nach dem Speichern
    // erneut auf dieser Seite landet und somit die Session-Variable für
    // den User refreshed werden kann.
    $query = "SELECT * FROM user WHERE ID LIKE ?;";
    $statement = $db->prepare($query);
    $statement->bind_param("i", $_GET["USER_ID"]);
    $statement->execute();
    $user = $statement->get_result()->fetch_assoc();

    $editingOwnProfile = $user["ID"] === $_SESSION["user"]["ID"];
    // Das Bearbeiten des Profil eines anderen Admins ist komplett verboten.
    if (!$editingOwnProfile && isUserAdmin($user)) {
        guard();
    // Wenn man das Profil eines anderen Users bearbeiten möchte
    // muss man ein Admin sein.
    } else if (!$editingOwnProfile) {
        guardAdmin();
    // Bearbeitet man sein eigenes Profil wird die Session-Variable neu gesetzt.
    } else {
        $_SESSION["user"] = $user;
    }

    // Wenn der User nicht Admin ist kann er seinen Nutzernamen nicht ändern.
    $usernameDisabled = !isAdmin();
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <title>Hotelverwaltung - Profil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/theme.css" rel="stylesheet">
        <link href="/css/entry.css" rel="stylesheet">
    </head>
    <body>
        <?php
            $lang = parse_ini_file("../../lang/de.ini", TRUE);
            include "../../menubar.php";
        ?>

        <div id="profileContainer" class="container-fluid overlay quarter-width">
            <h1>Profil</h1>
            <form class="text-center" method="POST" action="saveUser.php">
                <div class="form-group">
                    <input type="text" id="username" name="USERNAME" class="input-text form-control" required maxlength="20" placeholder="<?=$lang["USERNAME"]?>" value="<?=$user["USERNAME"]?>" <?= $usernameDisabled ? "disabled" : "" ?> />
                    <?php
                        if ($usernameDisabled) {
                            echo "<input type='hidden' id='usernameHidden' name='USERNAME' value='" . $user['USERNAME'] . "' />";
                        }
                    ?>
                </div>
                <div class="form-group mt-3">
                    <select id="honorific" name="HONORIFIC" class="input-text form-control" required>
                        <option value disabled><?=$lang["HONORIFIC"]?></option>
                        <option <?=$user["HONORIFIC"] === 0 ? "selected" : "" ?> value="0">Herr</option>
                        <option <?=$user["HONORIFIC"] === 1 ? "selected" : "" ?> value="1">Frau</option>
                        <option <?=$user["HONORIFIC"] === 2 ? "selected" : "" ?> value="2">Divers</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <input type="text" id="lastName" name="LAST_NAME" class="input-text form-control" required maxlength="30" placeholder="<?=$lang["LAST_NAME"]?>" value="<?=$user["LAST_NAME"]?>" /> 
                </div>
                <div class="form-group mt-3">
                    <input type="text" id="firstName" name="FIRST_NAME" class="input-text form-control" required maxlength="30" placeholder="<?=$lang["FIRST_NAME"]?>" value="<?=$user["FIRST_NAME"]?>" />
                </div>
                <div class="form-group mt-3">
                    <input type="email" id="email" name="EMAIL" class="input-text form-control" required maxlength="50" placeholder=<?=$lang["EMAIL"]?> value="<?=$user["EMAIL"]?>" />
                </div>
                <input type="hidden" id="userId" name="USER_ID" value="<?=$_GET["USER_ID"]?>" />
                <button type="submit" class="btn btn-primary mt-4">Speichern</button>
            </form>
        </div>
        <?php
            require "changePasswordOverlay.php";
            include "../../footer.php";
            include "../../util/toast/toastManager.php";
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <?php include "../../util/toast/toastManagerScript.php";?>
    </body>
</html>

