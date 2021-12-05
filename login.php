<?php
    session_start();
    $validationFailed = FALSE;
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if (isset($username) && isset($password)) {
            if ($password === "passwort") {
                createFolderIfAbsent($username);
                $_SESSION["user"] = $username;
                header("Location: index.php");
            } else {
                $validationFailed = TRUE;
            }
        }
    }
    
    function createFolderIfAbsent($username) {
        $path = "uploads/" . $username;
        if (!is_dir($path)) {
            mkdir($path, 0777);
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="css/theme.css" rel="stylesheet">
        <link href="css/base.css" rel="stylesheet">
        <link href="css/entry.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include "menubar.php";
        ?>
        <!-- Login -->
        <div id="loginContainer" class="container-fluid overlay quarter-width">
            <h1>Login</h1>
            <form class="text-center" method="POST">
                <div class="form-group">
                    <input id="inputUsername" name="username" type="text" class="input-text form-control" placeholder="Nutzername" required>
                </div>
                <div class="form-group mt-3">
                    <input id="inputPassword" name="password" type="password" class="input-text form-control" placeholder="Passwort" required>
                </div>
                <?php 
                    if ($validationFailed) {
                        echo "<p id='wrongCredentials'>Benutzername oder Passwort falsch.</p>";
                    }
                ?>
                <p id="notRegistered"><a href="registration.php">Sie sind noch nicht registiert?</a></p>
                <button type="submit" class="btn btn-primary mt-4">Login</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>