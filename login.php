<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hotelverwaltung</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="css/theme.css" rel="stylesheet">
        <link href="css/base.css" rel="stylesheet">
        <link href="css/entry.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include "menubar.html";
        ?>
        <!-- Login -->
        <div id="loginContainer" class="container-fluid" style="width: 25%; min-width: 300px;">
            <h1>Login</h1>
            <form class="text-center">
                <div class="form-group">
                    <input type="email" class="input-text form-control" id="inputEmail" placeholder="E-Mail">
                </div>
                <div class="form-group mt-3">
                    <input type="password" class="input-text form-control" id="inputPassword" placeholder="Passwort">
                </div>
                <p id="notRegistered"><a href="registration.php">Sie sind noch nicht registiert?</a></p>
                <button type="submit" class="btn btn-primary mt-4">Login</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>