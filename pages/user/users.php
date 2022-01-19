<?php
    require_once "../../guard.php";
    require_once "../../translator.php";
    require_once "../../displayUtils.php";

    session_start();

    guardAdmin();

    require_once "../../db/logIntoDB.php";

    $columns = "ID,HONORIFIC,LAST_NAME,FIRST_NAME,USERNAME,EMAIL,ROLE,ACTIVE";
    $ignoreColumns = "";
    $query = "SELECT $columns FROM user";

    require_once "../../table/tableLogic.php";

    $statement = $db->prepare($query);
    if (!$statement) {
        error_log($db->error);
    }
    $statement->execute();
    $statement->bind_result($id, $honorific, $firstName, $lastName, $username, $email, $role, $active);
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hu-Lerchl | Benutzer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/css/theme.css" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once "../../menubar.php";
            $tableTitle = "Benutzer";
            $entity = "user.php";
            require_once "../../table/table.php";
            require_once "../../util/bottomIncludes.php";
        ?>
    </body>
</html>