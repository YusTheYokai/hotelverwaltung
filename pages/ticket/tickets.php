<?php
    session_start();
    require_once "../../db/logintoDB.php";
    require_once "../../displayUtils.php";
    require_once "../../translator.php";

    $columns = "ticket.ID,TITLE,PICTURE,CONTENT,LAST_NAME,FIRST_NAME,CREATION_TIME,STATUS,USERNAME";
    $ignoreColumns = "USERNAME";
    $query = "SELECT $columns FROM ticket JOIN user ON (ticket.USER_ID = user.ID)";

    if ($_SESSION['user']['ROLE'] === 0) {
        $query = $query . " WHERE USER_ID = ?";
        $statement = $db->prepare($query);
        $statement->bind_param("i", $_SESSION['user']['ID']);
    } else {
        $statement = $db->prepare($query);
    }

    require "../../table/tableLogic.php";

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
            include "../../menubar.php";

            $tableTitle = "Tickets";
            $entity = "ticket.php";
            include "../../table/table.php";

            include "../../footer.php";
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>