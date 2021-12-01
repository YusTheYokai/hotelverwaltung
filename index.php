<?php
    session_start();
    if (isset($_GET["logout"])) {
        $logout = $_GET["logout"];
        if (isset($logout) && $logout) {
            session_unset();
            session_destroy();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hotelverwaltung</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="css/base.css" rel="stylesheet">
        <link href="css/theme.css" rel="stylesheet">
        <link href="css/newsPost.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include "menubar.php";
        ?>
        <div style="margin-top: 80px;">
            <?php
                include "newsPost.php";
                include "newsPost.php";
                include "newsPost.php";
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>