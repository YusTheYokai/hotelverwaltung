<?php
    session_start();
    require_once "db/logIntoDB.php";
    require_once "guard.php";

    // Wenn der logout-Parameter geschickt wird soll überprüft werden,
    // ob dieser true ist. Ist dies der Fall wird der User ausgeloggt.
    if (isset($_GET["logout"])) {
        $logout = $_GET["logout"];
        if (isset($logout) && $logout) {
            session_unset();
            session_destroy();
        }
    }

    // Laden aller News-Posts aus der Datenbank.
    $selectAllQuery = "SELECT TITLE, CONTENT, PICTURE, CREATION_TIME, FIRST_NAME, LAST_NAME, USERNAME FROM news_post JOIN user ON (news_post.USER_ID = user.ID) ORDER BY CREATION_TIME DESC;";
    $selectAllStatement = $db->prepare($selectAllQuery);
    $selectAllStatement->execute();
    $selectAllStatement->bind_result($title, $content, $picture, $creationTime, $firstName, $lastName, $username);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hotelverwaltung</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/css/theme.css" rel="stylesheet">
        <link href="/css/index.css" rel="stylesheet">
        <link href="/css/newsPost.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include "menubar.php";
            if (isAdmin()) {
                include "index/createNewsPostButton.php";
                include "index/newsPostDialog.php";
            }
        ?>
        <div class="footer-margin-bottom" style="margin-top: <?=isAdmin() ? '20' : '80'?>px;">
            <?php
                while ($selectAllStatement->fetch()) {
                    include "entities/newsPost.php";
                }
            ?>
        </div>
        <?php
            include "footer.php";
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>