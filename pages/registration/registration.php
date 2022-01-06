<?php
    require "../../guard.php";
    session_start();

    guardAdmin($_SESSION["user"]);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        include("logIntoDB.php");
        $username = $_POST["username"];
        $honorific = $_POST["honorific"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $password = sha1($_POST["password"]);
        $query = "INSERT INTO USER (HONORIFIC, FIRST_NAME, LAST_NAME, EMAIL, USERNAME, PASSWORD) VALUES (?, ?, ?, ?, ?, ?);";
        $statement = $db->prepare($query);
        $statement->bind_param("ssssss", $honorific, $firstName, $lastName, $email, $username, $password);
        $statement->execute();
    }
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <title>Registrierung</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/theme.css" rel="stylesheet">
        <link href="/css/base.css" rel="stylesheet">
        <link href="/css/entry.css" rel="stylesheet">
    </head>
    <body>
        <?php
            $lang = parse_ini_file("lang/de.ini", TRUE)['registration'];
            include "../menubar.php";
        ?>

        <div id="registrationContainer" class="container-fluid overlay quarter-width">
            <h1>Registrierung</h1>
            <form class="text-center" method="POST"> <!-- action="registrationController.php" -->
                <div class="form-group">
                    <input type="text" id="username" name="username" class="input-text form-control" required maxlength="20" placeholder="<?=$lang["username"]?>" />
                </div>
                <div class="form-group mt-3">
                    <select id="honorific" name="honorific" class="input-text form-control" required>
                        <option value selected disabled>Anrede</option>
                        <option value="male">Herr</option>
                        <option value="female">Frau</option>
                        <option value="other">Divers</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <input type="text" id="firstName" name="firstName" class="input-text form-control" required maxlength="30" placeholder="<?=$lang["firstName"]?>" />
                </div>
                <div class="form-group mt-3">
                    <input type="text" id="lastName" name="lastName" class="input-text form-control" required maxlength="30" placeholder="<?=$lang["lastName"]?>" /> 
                </div>
                <div class="form-group mt-3">
                    <input type="email" id="email" name="email" class="input-text form-control" required maxlength="50" placeholder=<?=$lang["email"]?> />
                </div>
                <div class="form-group mt-3">
                    <input type="password" id="password" name="password" class="input-text form-control" required maxlength="50" placeholder=<?=$lang["password"]?> />
                </div>
                <button type="submit" class="btn btn-primary mt-4">Registrieren</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>

