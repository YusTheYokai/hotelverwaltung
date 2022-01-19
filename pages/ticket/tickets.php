<?php
    session_start();
    require_once "../../displayUtils.php";
    require_once "../../translator.php";
    require_once "../../guard.php";

    // Nur einloggte User dürfen zu den Tickets.
    guardLoggedIn();

    require_once "../../db/logIntoDB.php";

    // SQL-Statement erstellen
    $columns = "ticket.ID,TITLE,PICTURE,CONTENT,LAST_NAME,FIRST_NAME,CREATION_TIME,STATUS,USERNAME";
    $ignoreColumns = "USERNAME";
    $query = "SELECT $columns FROM ticket JOIN user ON (ticket.USER_ID = user.ID)";

    // Wenn der User nicht Servicetechniker*in oder Admin ist darf er nur seine Tickets einsehen.
    if (!isTechnician()) {
        $query = $query . " WHERE USER_ID = ?";
    }

    require_once "../../table/tableLogic.php";
    $statement = $db->prepare($query);

    // User-ID setzen, falls der User eben nicht Servicetechniker*in oder Admin ist.
    if (!isTechnician()) {
        $statement->bind_param("i", $_SESSION['user']['ID']);
    }

    $statement->execute();
    $statement->bind_result($ID, $TITLE, $PICTURE, $CONTENT, $LAST_NAME, $FIRST_NAME,  $CREATION_TIME, $STATUS, $USERNAME);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tickets</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/css/theme.css" rel="stylesheet">
        <link href="/css/ticket.css" rel="stylesheet">
    </head>
    <body>
        <?php 
            require_once "../../menubar.php";

            $tableTitle = "Tickets";
            $entity = "ticket.php";
            require_once "../../table/table.php";

            require_once "../../util/bottomIncludes.php";
        ?>
    </body>
</html>