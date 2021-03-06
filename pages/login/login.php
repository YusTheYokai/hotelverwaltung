<?php
    session_start();
    if (isset($_SESSION["user"])) {
        header("Location: ../../index.php");
        exit;
    }

    $validationFailed = FALSE;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        require_once "../../util/validation/validation.php";
        $validator = new Validator(
            new TextValidateable("USERNAME", $_POST, 3, 20),
            new TextValidateable("PASSWORD", $_POST, 8, 50),
        );
        $validator->validate();
        if ($validator->hasFailed()) {
            header("Location: login.php?" . $validator->generateUrlErrorParams());
            exit;
        }

        require_once "../../db/logIntoDB.php";

        $username = $_POST["USERNAME"];
        $password = $_POST["PASSWORD"];
        $user = getUser($db, $username);
        if (!empty($user) && sha1($password) == $user["PASSWORD"] && $user["ACTIVE"]) {
            createFolderIfAbsent($username);
            $_SESSION["user"] = $user;
            header("Location: ../../index.php");
        } else {
            $validationFailed = TRUE;
        }
    }

    /**
     * Gibt das Ergebnis der Suche nach dem Password des übergebenen Usernames zurück.
     * @param mysqli $db Datenbankverbindung
     * @param string $username Username, für welchen das Passwort gesucht wird
     * @return array
     * Gibt das Datenbankergebnis, welches leer ist, falls es keinen User mit dem Username gibt, zurück.
     * Gibt es den User kann mit ["PASSWORD"] auf das gehashte Passwort zugegriffen werden.
     */
    function getUser($db, $username) {
        $query = "SELECT * FROM USER WHERE USERNAME LIKE ?";
        $statement = $db->prepare($query);
        $statement->bind_param("s", $username);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    function createFolderIfAbsent($username) {
        $path = "../../uploads/" . $username;
        if (!is_dir($path)) {
            $success = mkdir($path, 0777);
            if ($success) {
                $success = mkdir($path . "/thumbnails");
                if (!$success) {
                    error_log("Ordner für " . $username . " konnte nicht erstellt werden.");
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="icon" href="/icon/hotelIcon.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/css/theme.css" rel="stylesheet">
        <link href="/css/entry.css" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once "../../menubar.php";
        ?>
        <div id="loginContainer" class="container-fluid overlay quarter-width">
            <h1>Login</h1>
            <form class="text-center" method="POST">
                <div class="form-group">
                    <input id="inputUsername" name="USERNAME" type="text" class="input-text form-control" placeholder="Nutzername" minlength="3" maxlength="20" required>
                </div>
                <div class="form-group mt-3">
                    <input id="inputPassword" name="PASSWORD" type="password" class="input-text form-control" placeholder="Passwort" minlength="8" maxlength="50" required>
                </div>
                <?php 
                    if ($validationFailed) {
                        echo "<p id='wrongCredentials'>Benutzername oder Passwort falsch.</p>";
                    }
                ?>
                <button type="submit" class="btn btn-primary mt-4">Login</button>
            </form>
        </div>
        <?php require_once "../../util/bottomIncludes.php"; ?>
    </body>
</html>