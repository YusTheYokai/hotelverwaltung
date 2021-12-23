<?php
    require "../../db/logIntoDB.php";
    require "../../guard.php";
    require "../../translator.php";

    session_start();
    guardAdmin();

    $columns = "ID,HONORIFIC,LAST_NAME,FIRST_NAME,USERNAME,ACTIVE";
    $query = "SELECT $columns FROM user";
   
    require "../../table/tableLogic.php";

    $statement = $db->prepare($query);
    if (!$statement) {
        error_log($db->error);
    }
    $statement->execute();
    $statement->bind_result($id, $honorific, $firstName, $lastName, $username, $active);
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Benutzer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/css/theme.css" rel="stylesheet">
    </head>
    <body>
        <?php
            include "../../menubar.php";

            $tableTitle = "Benutzer";
            $entity = "user.php";
            include "../../table/table.php";
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>